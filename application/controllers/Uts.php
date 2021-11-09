<?php 
class Uts extends CI_Controller { 




	public function index() 
	{ 
		

		$data['judul']="Form Input Data Pegawai";
		$data['pegawai']=$this->m_uts->tampilUts()->result();

		$this->load->view('v_uts',$data); 
	} 




	










	public function cetak() 
	{


		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		$this->form_validation->set_rules('nama', 'Nama Pegawai', 'trim|required|min_length[3]',  

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 


		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		
		$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		


		if ($this->form_validation->run() != true) 
		{ 

				$data['judul']="Form Input Data Mata Kuliah";
				$data['pegawai']=$this->m_uts->tampilUts()->result();

				$this->load->view('v_uts',$data); 
				
		} 
		else
		{ 

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			if($_FILES["photo"]['name']=="")
			{
				$new_name ='';
			}
			else
			{
				$new_name = time().$_FILES["photo"]['name'];
			}


			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('photo');
			
			
			$datafoto=$this->upload->data();
				
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'status' =>  $this->input->post('status'),
				'jabatan' => $this->input->post('jabatan'),
				'gaji' => $this->input->post('gaji'),
				'tunjangan' => $this->input->post('tunjangan'),
				'photo' => $datafoto['file_name'],
				);

			$proses=$this->m_uts->simpanUts($input);	
						
		
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diTambahkan...');
				redirect('Uts');
			}

			

		}

	} 



	public function edit()
	{
		
		$pegawai=$this->m_uts->pegawaiWhere(['nip'=>$this->uri->segment('3')])->result_array();
		$data = array(
			'judul' => 'View Edit Pegawai',
			'nip' =>$pegawai[0]['nip'],
			'nama' =>$pegawai[0]['nama'],
			'status' =>$pegawai[0]['status'],
			'jabatan' =>$pegawai[0]['jabatan'],
			'gaji' =>$pegawai[0]['gaji'],
			'tunjangan' =>$pegawai[0]['tunjangan'],
			'photo' =>$pegawai[0]['photo'],
		 );

		$this->load->view('v_uts_edit', $data); 
	}






	public function update() 
	{


		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		$this->form_validation->set_rules('nama', 'Nama Pegawai', 'trim|required|min_length[3]',  

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 


		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		
		$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required|min_length[3]', 

			array( 

				'required' => '%s Wajib diisi', 
				'min_lenght' => '%s terlalu pendek' 
			)


		); 
		
		


		if ($this->form_validation->run() != true) 
		{ 

				$data['judul']="Form Input Data Mata Kuliah";
				$data['pegawai']=$this->m_uts->tampilUts()->result();

				$this->load->view('v_uts',$data); 
		} 
		else
		{ 
				


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$new_name = time().$_FILES["photo"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('photo');
			
			
			$datafoto=$this->upload->data();

			if($_FILES["photo"]['name']=="")
			{
				$nama_photo=$_POST['hidden_photo'];
			}
			else
			{
				
				$nama_photo=$datafoto['file_name'];

				unlink("./uploads/".$_POST['hidden_photo']);
			}



				
			$input = array(
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'status' =>  $this->input->post('status'),
				'jabatan' => $this->input->post('jabatan'),
				'gaji' => $this->input->post('gaji'),
				'tunjangan' => $this->input->post('tunjangan'),
				'photo' => $nama_photo,
				);

				$where=array('nip'=> $this->input->post('nip_hidden'));

				$proses=$this->m_uts->updateUts($input, $where);		
	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('Uts');
			}

					










			

		}

	} 














	
	
	
	public function hapus($nip)
	{
		
		$cek=$this->db->query("select * from data_pegawai  where  nip='".$nip."'");
		
		 foreach($cek->result_array() as $a)    
		{
			
			unlink("./uploads/".$a['photo']);

			
			$proses=$this->db->query("delete from data_pegawai  where nip='".$nip."'");
			if($proses)
			{
				$this->session->set_flashdata('data','Gambar Sudah Dihapus....');
				redirect('uts');	
			}		
		
		}//foreach($cek->result_array() as $a)
	
		
	}		
	
	
	
	
	
	
	
	
	
	



}

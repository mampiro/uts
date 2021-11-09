<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Uts extends CI_Model {

	
	public function tampilUts()
	{
		return $this->db->get('data_pegawai');
	}


	public function simpanUts($data=null)
	{
		return $this->db->insert('data_pegawai',$data);
	}

	public function hapusUts($where=null)
	{
		return $this->db->delete('data_pegawai',$where);
	}

	public function pegawaiWhere($where)
	{
		return $this->db->get_where('data_pegawai',$where);
	}


	public function updateUts($data=null,$where=null)
	{
		
		return $this->db->update('data_pegawai',$data,$where);

		
	}


}

<html>
    <head>
        <title><?=$judul;?></title>
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    </head>
    <body>
    
    
    <div class="container-fluid">
    
        <center><h2><?=$judul;?></h2></center>

		<br>
      

 				<?php 
                if ($this->session->flashdata('data')) 
                { 
                ?>
                 <div class="alert alert-success"> <?= $this->session->flashdata('data') ?>  </div>
                <hr>
                <?php 
                }
                elseif ($this->session->flashdata('dataeror')) 
                {
                ?>
                <div class="alert alert-danger"> <?= $this->session->flashdata('dataeror') ?> </div>
                <?php 
                }
                ?>    


         <form  method="post" action="<?php echo base_url();?>index.php/uts/cetak" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="5" >
                <tr>
                    <td width="15%">
                       NIP</td>
                  <td  width="85%">
                        <input type="text" name="nip" id="nip" placeholder="Required" >
                        <?=form_error('nip');?>
                    </td>
                </tr>
                <tr>
                    <td width="15%">
                        Nama</td>
                    <td  width="85%"><input type="text" name="nama" id="nama"  placeholder="Required">
                    <?=form_error('nama');?></td>
                	    
                </tr>

                <tr>
                    <td width="15%">
                        Status</td>
                    <td  width="85%">
					
					<input type="radio" name="status" value="Menikah">Menikah
					<input type="radio" name="status" value="Belum Menikah">Belum Menikah
					
					
                   <?=form_error('status');?></td>
                </tr>                  
                
                
                
                

                <tr>
                    <td width="15%">Jabatan
                    
                    </td>
                    <td  width="85%">
                    <select name="jabatan" >
                      <option value="">Pilih..</option>
                      <option value="Staff">Staff</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Marketing">Marketing</option>
                    </select>
                    <?=form_error('jabatan');?>
                    
                    
                    
                    </td>
                </tr>
                <tr>
                  <td>Gaji</td>
                  <td><input type="text" name="gaji" id="gaji"  placeholder="Required">
                  <?=form_error('gaji');?></td>
                </tr>
                <tr>
                  <td>Tunjangan</td>
                  <td><input type="text" name="tunjangan" id="tunjangan"  placeholder="Required">
                  <?=form_error('tunjangan');?></td>
                </tr>
                <tr>
                  <td>Photo</td>
                  <td><input type="file" name="photo" id="photo"  placeholder="Required" accept="image/*">
                  <?=form_error('photo');?></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                  <button type="submit" class="btn btn-info">Simpan</button>
                 
                  <button type="reset" class="btn btn-danger">Batal</button>
                  </td>
                </tr>              



            </table>

        </form>




        <table border="1pt"   width="100%">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Tunjangan</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>

            <?php
            $no=1;
            foreach ($pegawai as $pegawai) 
            {
            ?>
           
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$pegawai->nip;?></td>
                    <td><?=$pegawai->nama;?></td>
                    <td><?=$pegawai->status;?></td>
                    <td><?=$pegawai->jabatan;?></td>
                    <td><?=$pegawai->gaji;?></td>
                    <td><?=$pegawai->tunjangan;?></td>
                    <td align="center">
					
                     <?php
				   if($pegawai->photo=="")
				   {
				   ?>
					<img src="<?php echo base_url();?>assets/images/noimage.jpg"  width="100"  >
					<?php
				   }
					else
					{
					?>
					<img src="<?php echo base_url();?>uploads/<?=$pegawai->photo;?>" width="100"  >
					<?php
					}
					?>
                    
                    </td>
                    
                    <td>
                        <a href="<?=base_url('uts/edit/'.$pegawai->nip)?>">Edit</a>
                        |
                        <a href="<?=base_url('uts/hapus/'.$pegawai->nip)?>"  onclick="return confirm('Anda Yakin Ingin Menghapus Data ini ?');">Hapus</a>
                    </td>
                </tr>
        
            <?php
            }
            ?>


        </table>









	</div>





    </body>
</html>
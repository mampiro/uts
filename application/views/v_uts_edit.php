<html>
    <head>
        <title><?=$judul;?></title>
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    </head>
    <body>
    
    
    <div class="container-fluid">
    
        <center><h2><?=$judul;?></h2></center>

		<br>
         <table  border="0" cellpadding="5" >
            <tr>
                <td>

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
                </td>
            </tr>
        </table>




         <form  method="post" action="<?php echo base_url();?>index.php/uts/update" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="5" >
                <tr>
                    <td width="15%">
                       NIP</td>
                  <td  width="85%">
                        <input type="text" name="nip" id="nip" placeholder="Required" value="<?=$nip;?>" >
                        <?=form_error('nip');?>
                    </td>
                </tr>
                <tr>
                    <td width="15%">
                        Nama</td>
                    <td  width="85%"><input type="text" name="nama" id="nama"  placeholder="Required" value="<?=$nama;?>">
                    <?=form_error('nama');?></td>
                	    
                </tr>

                <tr>
                    <td width="15%">
                        Status</td>
                    <td  width="85%">
					
					<input type="radio" name="status" value="Menikah" <?php if($status=="Menikah") echo 'checked';?>>Menikah
					<input type="radio" name="status" value="Belum Menikah" <?php if($status=="Belum Menikah") echo 'checked';?>>Belum Menikah
					
					
                   <?=form_error('status');?></td>
                </tr>                  
                
                
                
                

                <tr>
                    <td width="15%">Jabatan
                    
                    </td>
                    <td  width="85%">
                    <select name="jabatan" >
                      <option value="">Pilih..</option>
                      <option value="Staff" <?php if($jabatan=="Staff") echo 'selected';?>>Staff</option>
                      <option value="Sekretaris" <?php if($jabatan=="Sekretaris") echo 'selected';?>>Sekretaris</option>
                      <option value="Marketing" <?php if($jabatan=="Marketing") echo 'selected';?>>Marketing</option>
                    </select>
                    <?=form_error('jabatan');?>
                    
                    
                    
                    </td>
                </tr>
                <tr>
                  <td>Gaji</td>
                  <td><input type="text" name="gaji" id="gaji" value="<?=$gaji;?>"  placeholder="Required">
                  <?=form_error('gaji');?></td>
                </tr>
                <tr>
                  <td>Tunjangan</td>
                  <td><input type="text" name="tunjangan" id="tunjangan" value="<?=$tunjangan;?>"  placeholder="Required">
                  <?=form_error('tunjangan');?></td>
                </tr>
                <tr>
                  <td>Photo</td>
                  <td><input type="file" name="photo" id="photo"  placeholder="Required" accept="image/*">
                   <?=form_error('photo');?><br><br>
                    <?php
				   if($photo=="")
				   {
				   ?>
					<img src="<?php echo base_url();?>assets/images/noimage.jpg"  width="100"  >
					<?php
				   }
					else
					{
					?>
					<img src="<?php echo base_url();?>uploads/<?=$photo;?>" width="100"  >
					<?php
					}
					?>
                  
                      
                  
                  <input type="hidden" name="nip_hidden"   value="<?=$nip;?>" >
                  <input type="hidden" name="hidden_photo"   value="<?=$photo;?>" >
                  
                  
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                  <button type="submit" class="btn btn-info">Update</button>
                 
                  <button type="button" class="btn btn-danger" onclick="history.back(-1)">Kembali</button>
                  </td>
                </tr>              



            </table>

        </form>










	</div>





    </body>
</html>
<?php $this->load->view('header') ?>

<div id="content">
<div class="column full fl">
		
		<div class="box">
		<div class="box-header">Daftar Kontrak</div>
		<div class="box-content box-table">
		<br />
		
		<?php echo isAccess('pegawai','ktp','add') ? anchor('pegawai/kontrakPegawai/add/nip/'.$uri_to_assoc['nip'], '<span class="icon_text addnew"></span>Tambah Kontrak', 'class="button white fr"') : ''; ?> 
		<div class="clear"></div>
			<?php  echo form_open('pegawai/kontrakPegawai/view/nip/'.$uri_to_assoc['nip'] ,array('name'=>'formAddpegawai','id'=>'formAddpegawai'),array('kirim'=>'kirim')); ?>
			<table>
			 	<tr>
                    <td width="100">Nip </td>
                    <td>
                        <?php echo form_input(array('name'=>'nip','value'=>get_data($uri_to_assoc,'nip'),'class'=>'form-field'));?>
                        <?php echo form_submit('submit','Cari', 'class="button themed"');?>
                    </td>
                </tr>  
			</table>
			</form>
		
        	<?php if (isset($errorMessage)) : ?>
            	<div class="notification <?php echo ((isset($isSuccess) && $isSuccess) ? 'success' : 'error');?>"><?php echo $errorMessage; ?></div>
	        <?php endif; ?>    	
	        
            <?php echo $paging?>
            <table class="tablebox">
            <thead class="table-header" style="border-top:1px solid #ccc;border-bottom:1px solid #ccc">
                <tr>
                	<th width="50">No</th>
                	<th width="200">NIP</th>  
                    <th width="200">Nomor Kontrak</th>  
                     <th width="120">Tanngal Mulai</th> 
                     <th width="120">Tanggal Selesai</th>  
                    <th width="600">Action</th>
                </tr>
            </thead>
            <tbody>
            	<?php $no = $uri_to_assoc['page'] + 1;?>
                <?php if ($dataView) foreach($dataView as $row) : ?>
                <?php $class = $no % 2 == 0 ? 'even' : 'odd' ?>
                <tr class=<?php echo $class?>>
                	<td><?php echo $no++ ?></td>
                	<td><?php echo $row['nip_karyawan']?></td>  
                    <td><?php echo $row['nomor_kontrakPegawai']?></td>  
                       <td><?php echo $row['tanggalAwal_kontrakPegawai'] ?></td> 
                        <td><?php echo $row['tanggalAkhir_kontrakPegawai'] ?></td>  
                    <td>
                        <?php echo isAccess('pegawai','kontrakPegawai','edit') ? anchor('pegawai/kontrakPegawai/edit/id/' . $row['id_kontrakPegawai'].'/nip/'.$uri_to_assoc['nip'],'<span class="icon_text edit"></span>Edit', 'class="button white"', 'class="button white"') : ''?>
                        
                        <?php echo isAccess('pegawai','kontrakPegawai','delete') ? anchor('pegawai/kontrakPegawai/view/page/'.$uri_to_assoc['page'].'/action/delete/id/' . $row['id_kontrakPegawai'].'/nip/'.$uri_to_assoc['nip'],'<span class="icon_text cancel"></span>Hapus', array('onClick' => "return confirm('".$this->lang->line('global_confirm_delete')."')" , 'class' => "button white")) : ''?>
                    </td>
                </tr> 
                <?php endforeach;?>
            </tbody>
            </table>
            <div id="paging">
            <?php echo $paging?>
            </div>
		</div>
		</div>
	
	</div>

<?php $this->load->view('footer') ?>
<?php $this->load->view('header') ?>

<!-- CONTENT -->
<div id="content">
<div class="column full">
		
		<div class="box">
		<div class="box-header">Tambah Jenis Cuti</div>
		<div class="box-content">
        <?php echo isAccess('absensi','jenisCuti','view') ? anchor('absensi/jenisCuti/view', '<span class="icon_text preview"></span>Daftar Jenis Cuti', 'class="button white"') : ''; ?>
        <br /><br />      
        
			<div id="loading" style="display:none;"><img src="loading.gif" alt="loading..." /></div>
        	<div id="result" style="display:none;"></div>
        	
            <?php if (isset($errorMessage)) : ?>
            	<div class="notification <?php echo ((isset($isSuccess) && $isSuccess) ? 'success' : 'error');?>"><?php echo $errorMessage; ?></div>
	        <?php endif; ?>    	
	        
	        <?php if (!(isset($isSuccess) && $isSuccess)) : ?>
            <?php  echo form_open('absensi/jenisCuti/add/time/' . time(),array('name'=>'formAddjenisCuti','id'=>'formAddjenisCuti'),array('kirim'=>'kirim')); ?>
            <table> 
                <tr>
                    <td width="200">Nama</td>
                    <td><br />
                        <?php echo form_input(array('name'=>'nama','value'=>get_data($_POST,'nama'),'class'=>'form-field'));?>
                    </td>
                </tr>
		<tr>
                    <td>Jangka Waktu</td>
                    <td><br />
                        <?php echo form_input(array('name'=>'jangkawaktu','value'=>get_data($_POST,'jangkawaktu'),'class'=>'form-field'));?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <?php echo form_submit('submit','Simpan', 'class="button themed"');?>
                    </td>
                </tr>
            </table>
            </form>
			<?php endif;?>
			
          </div>
        </div>
      </div>
      <!-- End Widget-->
      
      <div class="clear"></div>
    </div>
  </div>
  
<?php $this->load->view('footer') ?>
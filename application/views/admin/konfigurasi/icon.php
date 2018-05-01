<?php 
// Notifikasi
if ($this->session->flashdata('sukses')) {
  echo "<div class='alert alert-success'>";
  echo $this->session->flashdata('sukses');;
  echo "</div>";
}
?>


<div class="box-body">
<!-- Form open -->
<?php echo form_open_multipart(base_url('admin/konfigurasi/icon')); ?>

<!-- error upload -->
<?php if (isset($error_upload)) {
	echo '<div class="alert-warning">'.$errors_upload.'</div>';
} ?>

<!-- Warning error -->
<?php echo validation_errors('<div class="alert-warning">','</div>'); ?> <br>
<!-- end warning error -->

	<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
	<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">

	<div class="col-md-6">
		<div class="form-group">
			<label for="icon">Icon Perusahaan</label><br>
			<input type="file" name="icon" id="icon" class="form-control" required="required">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success" value="Simpan">
		</div>
		
	</div>
	<div class="col-md-6">
		<?php if ($konfigurasi->icon != "") { ?>
		<img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" alt="<?php echo $konfigurasi->namaweb ?>" class="img img-responsive img-thumbnail">
		<?php }else{ ?>
				<p class="alert alert-warning text-center">Belum ada icon</p>
		<?php } ?>
	</div>

</div>



<!-- form close -->
<?php echo form_close(); ?>














</div>
</div>
</div>
</div>
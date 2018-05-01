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
<?php echo form_open(base_url('admin/konfigurasi')); ?>

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
			<label for="namaweb">Nama Perusahaan</label><br>
			<input type="text" name="namaweb" id="namaweb" class="form-control" placeholder="Nama Web" value="<?php echo $konfigurasi->namaweb ?>">
		</div>
		<div class="form-group">
			<label for="tagline">Tagline Perusahaan</label><br>
			<input type="text" name="tagline" id="tagline" class="form-control" placeholder="Tagline Web" value="<?php echo $konfigurasi->tagline ?>">
		</div>
		<div class="form-group">
			<label for="email">Email Perusahaan</label><br>
			<input type="text" name="email" id="email" class="form-control" placeholder="Email Web" value="<?php echo $konfigurasi->email ?>">
		</div>
		<div class="form-group">
			<label for="telepon">Telepon</label><br>
			<input type="text" name="telepon" id="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>">
		</div>
		<div class="form-group">
			<label for="website">Website</label><br>
			<input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>">
		</div>
		<div class="form-group">
			<label for="facebook">Link Facebook</label><br>
			<input type="text" name="facebook" id="facebook" class="form-control" placeholder="Link Facebook" value="<?php echo $konfigurasi->facebook ?>">
		</div>
		<div class="form-group">
			<label for="instagram">Link Instagram</label><br>
			<input type="text" name="instagram" id="instagram" class="form-control" placeholder="Link Instagram" value="<?php echo $konfigurasi->instagram ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="keywords">Keywords</label><br>
			<textarea name="keywords" id="keywords" class="form-control" placeholder="Keywords"><?php echo $konfigurasi->keywords; ?></textarea>
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi</label><br>
			<textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $konfigurasi->deskripsi; ?></textarea>
		</div>
		<div class="form-group">
			<label for="metatext">Metatext - Google Analytics</label><br>
			<textarea name="metatext" id="metatext" class="form-control" placeholder="Metatext - Google Analytics"><?php echo $konfigurasi->metatext; ?></textarea>
		</div>
		<div class="form-group">
			<label for="map">Google Map</label><br>
			<textarea name="map" id="map" class="form-control" placeholder="Google Map"><?php echo $konfigurasi->map; ?></textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan">
			
		</div>
	</div>

</div>



<!-- form close -->
<?php echo form_close(); ?>














</div>
</div>
</div>
</div>
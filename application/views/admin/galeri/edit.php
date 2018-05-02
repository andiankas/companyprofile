<?php
// attribute
$attribute = "";

//form open
 echo form_open_multipart(base_url('admin/galeri/edit/'.$galeri->id_galeri),$attribute); 

 ?>

<div class="box-body">

<?php

//warning error
echo validation_errors('<div class="alert-warning">','</div>'); 
//end warning error

// error upload
if (isset($error_upload)) {
	echo '<div class="alert-warning">'.$errors_upload.'</div>';
}

?>

	<br>
	<div class="col-md-12">
		<div class="form-group form-group-md">
			<label for="judul_galeri">Judul Galeri</label>
			<input type="text" name="judul_galeri" class="form-control" placeholder="Judul Galeri" value="<?php echo $galeri->judul_galeri ?>" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label for="posisi_galeri">Status Galeri</label>
			<select name="posisi_galeri" class="form-control">
				<option value="Galeri">Galeri</option>
				
				<option value="Hompage" <?php if ($galeri->posisi_galeri=="Hompage") {
					echo 'selected';
				} ?>>Homepage Slider</option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label for="website">Link/URL Galeri</label>
			<input type="url" name="website" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $galeri->website ?>">
		</div>
	</div>
	<div class="col-md-3">
		<!-- <div class="form-group form-group-md">
			<label for="id_kategori">Kategori Galeri</label>
			
		</div> -->
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label>Upload Gambar</label>
			<input type="file" name="gambar" class="form-control">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group form-group-md">
			<label for="isi_galeri">Isi Galeri</label>
			<textarea name="isi_galeri" id="isi_galeri" class="form-control tinymce" placeholder="Isi Galeri"><?php echo $galeri->isi_galeri ?></textarea>
		</div>


		<div class="form-group form-group-md">
			<!-- <label for="keywords">Keyword</label>
			<input type="text" name="keywords" id="keywords" class="form-control" placeholder="Keywords" value=""> -->
		</div>
		<div class="form-group text-right">
			<button type="submit" name="submit" class="btn btn-success btn-md"><i class="fa fa-save"></i> Simpan</button>
			<button type="reset" name="reset" class="btn btn-warning btn-md"><i class="fa fa-times"></i> Reset</button>
		</div>
	</div>
</div>



<!-- form close -->
<?php echo form_close(); ?>














</div>
</div>
</div>
</div>
<?php
// attribute
$attribute = "";

//form open
 echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita),$attribute); 

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
			<label for="judul_berita">Judul Berita</label>
			<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita ?>" required>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label for="status_berita">Status Berita</label>
			<select name="status_berita" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if ($berita->status_berita=="Draft") {
					echo 'selected';
				} ?>>Draft</option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label for="jenis_berita">Jenis Berita</label>
			<select name="jenis_berita" class="form-control">
				<option value="Berita">Berita</option>
				<option value="Profil"<?php if ($berita->jenis_berita=="Profil") {
					echo 'selected';
				} ?>>Profil</option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label for="id_kategori">Kategori Berita</label>
			<select name="id_kategori" class="form-control">
			<?php foreach ($kategori as $kategori):?>
				<option value="<?php echo $kategori->id_kategori ?>" <?php if ($kategori->id_kategori=="$kategori->id_kategori") {
					echo 'selected';
				} ?> ><?php echo $kategori->nama_kategori ?></option>
			<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group form-group-md">
			<label>Upload Gambar</label>
			<input type="file" name="gambar" class="form-control" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group form-group-md">
			<label for="isi_berita">Isi Berita</label>
			<textarea name="isi_berita" id="isi_berita" class="form-control tinymce" placeholder="Isi Berita"><?php echo $berita->isi_berita ?></textarea>
		</div>


		<div class="form-group form-group-md">
			<label for="keywords">Keyword</label>
			<input type="text" name="keywords" id="keywords" class="form-control" placeholder="Keywords" value="<?php echo $berita->keywords; ?>">
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
<?php
	
	// validasi
    echo validation_errors('<div class="alert-warning">','</div>');

	// attribute
	$attribute = "class='form-horizontal'";
	// form open
	echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori), $attribute);
?>

<div class="form-group">
	<label for="nama_kategori" class="col-sm-3 control-label">Nama Kategori</label>
	<div class="col-sm-9">
		<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required value="<?php echo $kategori->nama_kategori ?>">
	</div>
</div>

<div class="form-group">
	<label for="urutan" class="col-sm-3 control-label">Urutan Kategori</label>
	<div class="col-sm-5">
		<input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan Kategori" value="<?php echo $kategori->urutan ?>">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label"></label>
	<div class="col-sm-5">
		<input type="submit" class="btn btn-success" name="submit" value="Simpan">
	</div>
</div>
<br><br>
<?php echo form_close(); ?>
<!-- form close -->




</div>
</div>
</div>
</div>
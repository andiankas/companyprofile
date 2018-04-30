<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah">
<i class="fa fa-plus"></i> Tambah baru
</button>

<div class="modal modal-default fade" id="Tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<?php 
					// attribute
					$attribute = "class='form-horizontal'";


					// form open
					echo form_open(base_url('admin/kategori'), $attribute);
				 ?>
				 <div class="form-group">
		          <label for="nama_kategori" class="col-sm-3 control-label">Nama Kategori</label>

		          <div class="col-sm-9">
		            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>
		          </div>
		        </div>
		        
		        <div class="form-group">
		          <label for="urutan" class="col-sm-3 control-label">Urutan Kategori</label>

		          <div class="col-sm-5">
		            <input type="number" class="form-control" id="urutan" name="urutan" placeholder="Urutan Kategori">
		          </div>
		        </div>
		        <br><br>
		        <div class="form-group">
		          <label class="col-sm-3 control-label"></label>

		          <div class="col-sm-5">
		            <input type="submit" class="btn btn-success" name="submit" value="Simpan">
		          </div>
		        </div>
				<?php echo form_close(); ?>
				<!-- form close -->
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary pull-right" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>		
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
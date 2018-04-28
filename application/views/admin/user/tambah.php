

<!-- Form open -->
<?php echo form_open(base_url('admin/user/tambah')); ?>

<div class="box-body">

<!-- Warning error -->
<?php echo validation_errors('<div class="alert-warning">','</div>'); ?> <br>
<!-- end warning error -->

	<div class="col-md-6">
		<div class="form-group">
			<label for="nama">Nama User</label>
			<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap" value="<?php echo set_value('nama') ?>" required>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" id="email" placeholder="your@email.com" value="<?php echo set_value('email') ?>" required>
		</div>
		<div class="form-group">
			<label for="akses_level">Level Hak Akses User</label>
			<select name="akses_level" id="akses_level" class="form-control">
				<option value="Admin">Admin</option>
				<option value="User">User</option>
			</select>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo set_value('username') ?>" required>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
			<input type="reset" name="reset" class="btn btn-warning btn-lg" value="Reset">
		</div>
	</div>

</div>



<!-- form close -->
<?php echo form_close(); ?>














</div>
</div>
</div>
</div>
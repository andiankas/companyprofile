
            <div class="box-body">
              
              <?php 

                // Notifikasi
                if ($this->session->flashdata('sukses')) {
                  echo "<div class='alert alert-success'>";
                  echo $this->session->flashdata('sukses');;
                  echo "</div>";
                }

               ?>

              <p>
                <a href="<?php echo base_url('admin/layanan/tambah') ?>" title="Tambah Layanan" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Baru</a>
              </p>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Gambar</th>
                  <th>Nama Layanan</th>
                  <th>Status</th>
                  <th>Penulis</th>
                  <th>Tanggal</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php 
                    $i=1;
                    foreach ($layanan as $layanan): 
                  ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" width="60px" class="img img-thumbnail"></td>
                  <td><?php echo $layanan->judul_layanan; ?></td>
                  <td><?php echo $layanan->status_layanan; ?></td>
                  <td><?php echo $layanan->nama; ?></td>
                  <td><?php echo $layanan->tanggal_post; ?></td>
                  <td>
                    <!-- Edit -->
                    <a href="<?php echo base_url('admin/layanan/edit/'.$layanan->id_layanan) ?>" title="Edit layanan" class="btn btn-warning btn-xs">
                      <i class="fa fa-edit"></i>
                      Edit
                    </a> 
                    
                    <!-- Delete -->
                    <?php include('delete.php'); ?>

                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
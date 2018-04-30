
            <div class="box-body">
              
              <?php 

                // Notifikasi
                if ($this->session->flashdata('sukses')) {
                  echo "<div class='alert alert-success'>";
                  echo $this->session->flashdata('sukses');;
                  echo "</div>";
                }

                // validasi
                echo validation_errors('<div class="alert-warning">','</div>');

                // include tambah
                include('tambah.php');

               ?>
              <br><br>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Nama Kategori</th>
                  <th>Slug</th>
                  <th>No Urut Kategori</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php 
                    $i=1;
                    foreach ($kategori as $kategori): 
                  ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $kategori->nama_kategori; ?></td>
                  <td><?php echo $kategori->slug_kategori; ?></td>
                  <td><?php echo $kategori->urutan; ?></td>
                  <td>
                    <!-- Edit -->
                    <a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" title="Edit kategori" class="btn btn-warning btn-xs">
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
  
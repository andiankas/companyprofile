<div class="album text-muted">
				<div class="container">
					<br><br>
					<!-- Start artikel -->
					<div class="row artikel">
						<div class="col-md-8">
							<div class="artikel">
								<h1><?php echo $berita->judul_berita ?></h1>
								<p><img src="<?php echo base_url('assets/upload/image/'.$berita->gambar) ?>" alt="<?php echo $berita->judul_berita ?>" class="img img-thumbnail img-responsive"></p>
								<?php echo $berita->isi_berita; ?>
							</div>

							<br>
							<hr>

							<div class="komentar">
								<h4>Komentar</h4>
								<br>
								<p>
									<label for="email"><b>Email : </b></label><br>
									<input type="email" name="email" id="email" placeholder="your@email.com">
								</p>
								<p>
									<label for="komentar"><b>Komentar : </b></label><br>
									<textarea name="komentar" id="komentar" cols="80" rows="5" placeholder="Tambahkan Komentarmu"></textarea>
								</p>
								<p>
									<input type="submit" name="submit" value="Kirim">
								</p>
								
							</div>

						</div>
						<!-- berita lainnya -->
						<div class="col-md-4">
							<hr>
							<center><h4>Berita Lainnya</h4></center>
							<hr>
							<div class="row">
								
								<?php foreach ($listing as $listing) : ?>

								<div class="col-md-12">
									<div class="artikel">
										<p><img src="<?php echo base_url('assets/upload/image/'.$listing->gambar) ?>" alt="<?php echo $listing->judul_berita ?>" class="img img-thumbnail img-responsive"></p>
										<a href="<?php echo base_url('berita/read/'.$listing->slug_berita) ?>"><h4><?php echo $listing->judul_berita ?></h4></a>
										<hr>
									</div>
									
								</div>

								<?php endforeach; ?>
								
							</div>
							
						</div>
						<!-- end berita lainnya -->
					</div>
		
					
					<!-- End artikel -->

				</div>
			</div>

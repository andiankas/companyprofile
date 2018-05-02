<!-- /.container -->
			<div class="album py-5 bg-light">
			<center><h1>Berita</h1></center><br>
				<div class="container">
					<div class="row">
						
						<?php foreach ($berita as $berita) : ?>
						<div class="col-md-4">
							<div class="card mb-4 box-shadow">
								<img class="card-img-top" src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="<?php echo $berita->judul_berita; ?>">
								<div class="card-body">
									<h3><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita; ?></a></h3>
									<p class="card-text"><?php echo character_limiter(strip_tags($berita->isi_berita), 150); ?></p>
									<p class="text-right"><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-outline-info">Read More...</a></p>
								</div>
							</div>
						</div>	
						<?php endforeach; ?>
					</div>
					<!-- pagination -->
					<div class="row">
						<?php if (isset($paginasi)) : ?>
						<div class="paginasi col-md-12 text-center">
							 <?php echo $paginasi; ?>
							<div class="clearfix"></div>
						</div>
						<?php endif; ?>
					</div>
				</div>	
			</div>	

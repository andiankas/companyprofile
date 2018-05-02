<main role="main">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<!-- foreach -->
					<?php

						$i = 1;
						foreach ($slider as $slider) {
					?>
					
					<div class="carousel-item <?php if($i==1) { echo 'active'; }?>">
						<img class="first-slide" src="<?php echo base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?php echo $slider->judul_galeri ?>">
						<div class="container">
							<div class="carousel-caption text-left">
								<h1><?php echo $slider->judul_galeri ?></h1>
								<p><?php echo strip_tags($slider->judul_galeri) ?></p>
								<p><a class="btn btn-lg btn-primary" href="<?php echo $slider->website ?>" role="button">Sign up today</a></p>
							</div>
						</div>
					</div>

					<?php $i++; } ?> 
					<!-- end foreach -->
				</div>
				<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- Marketing messaging and featurettes
			================================================== -->
			<!-- Wrap the rest of the page in another container to center all the content. -->
			<div class="container marketing">
				<!-- Three columns of text below the carousel -->
				<center><h2>Services</h2></center>
				<br><br>
				<div class="row">
					<?php

						foreach ($layanan as $layanan) {
					?>
					<div class="col-lg-4">
						<img class="rounded-circle" src="<?php echo base_url('assets/upload/image/thumbs/'.$layanan->gambar) ?>" alt="<?php echo $layanan->judul_layanan ?>" width="140" height="140">
						<br><br>
						<h3><?php echo $layanan->judul_layanan; ?></h3>
						<br><br>
						<p><a class="btn btn-outline-info" href="<?php echo base_url('layanan') ?>" role="button">View details &raquo;</a></p>
					</div>
					<!-- /.col-lg-4 -->
					<?php } ?>
				</div>
				<!-- /.row -->
				
			</div>
			<!-- /.container -->
			<div class="album py-5 bg-light">
				<div class="container">
					<div class="row">

						<?php 
							foreach ($berita as $berita) {
									
						 ?>
						<div class="col-md-4">
							<div class="card mb-4 box-shadow">
								<img class="card-img-top" src="<?php echo base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" alt="Card image cap">
								<div class="card-body">
									<h3><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita; ?></a></h3>
									<p class="card-text"><?php echo character_limiter(strip_tags($berita->isi_berita), 150); ?></p>
									<p class="text-right"><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-outline-info">Read More...</a></p>
								</div>
							</div>
						</div>
						
						<?php } ?>
					</div>
					
				</div>
			</div>

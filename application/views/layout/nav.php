<?php 
// menu berita
$menu_berita = $this->konfigurasi_model->menu_berita();
// $menu_layanan = $this->konfigurasi_model->menu_layanan();
$site_info = $this->konfigurasi_model->listing();
$menu_profil = $this->konfigurasi_model->menu_profil();

 ?>

<body>
		
		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #22a6b3;">
				<div class="container">
					<a class="navbar-brand" href="<?php echo base_url() ?>"><?php echo $site_info->namaweb; ?></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav mr-auto">
							
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('profile') ?>">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('layanan') ?>">Services</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('contact') ?>">Contact</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="berita.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Berita
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">

									<?php foreach ($menu_berita as $menu_berita) : ?>
									
									<a class="dropdown-item" href="<?php echo base_url('berita/kategori/'.$menu_berita->slug_kategori) ?>"><?php echo $menu_berita->nama_kategori; ?></a>
									
									<?php endforeach; ?>
									
									<a class="dropdown-item" href="<?php echo base_url('berita') ?>">Index Berita</a>
									
								
								</div>
							</li>
						</ul>
						
					</div>
				</div>
			</nav>
		</header>

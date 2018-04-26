<body>
		
		<header>
			<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #22a6b3;">
				<div class="container">
					<a class="navbar-brand" href="<?php echo base_url() ?>">M</a>
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
									<a class="dropdown-item" href="<?php echo base_url('berita') ?>">Halaman Berita</a>
									<a class="dropdown-item" href="<?php echo base_url('berita/read/') ?>">Detail Berita</a>
									
								</div>
							</li>
						</ul>
						
					</div>
				</div>
			</nav>
		</header>

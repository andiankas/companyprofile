<?php 
// site dari konfigurasi
$site_info = $this->konfigurasi_model->listing();

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title; ?></title>
		
		<!-- icon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/'.$site_info->icon) ?>">
		<!-- description -->
		<meta name="description" content="<?php echo $site_info->deskripsi; ?>">
		<!-- keywords -->
		<meta name="keywords" content="<?php echo $title.', '.$site_info->keywords; ?>">
		<!-- author -->
		<meta name="author" content="<?php echo $title; ?>">
		<!-- CSS Booststrap -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/bootstrap/css/bootstrap.min.css">
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/style.css">
		<!-- fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/fontawesome/web-fonts-with-css/css/fontawesome.min.css">
	</head>

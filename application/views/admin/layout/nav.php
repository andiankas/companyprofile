  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Dashboard -->
        <li>
          <a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>

        <!-- menu berita -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Berita / Profile </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/berita') ?>"><i class="fa fa-table"></i> Data Berita / Profile </a></li>
            <li><a href="<?php echo base_url('admin/berita/tambah') ?>"><i class="fa fa-plus"></i> Tambah Berita / Profile</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Berita</a></li>
          </ul>
        </li>
      
        <!-- end menu berita -->

        <!-- menu user -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>User Administrator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> User Administrator</a></li>
            <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i> Tambah User Administrator</a></li>
          </ul>
        </li>
      </ul>
      <!-- end menu user -->
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/'.$this->uri->segment(2)) ?>"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))); ?></a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>
     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title; ?></h3>
            </div>
            <!-- /.box -->
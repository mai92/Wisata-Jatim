<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$title?> | WisataJatim</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?=base_url('assets')?>/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets')?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url('assets')?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-green">
    <div class="wrapper">

      <header class="main-header">
        <a href="<?=base_url()?>" class="logo"><b>WisataJatim</b> Admin</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- Notifications: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="user user-menu">
                <a href="<?=base_url('admin/logout')?>">
                  <span class="hidden-xs">Log Out</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?=base_url()?>">
                <i class="fa fa-envelope"></i> <span>Welcome</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url('kabkot')?>">
                <i class="fa fa-envelope"></i> <span>Kabupaten/Kota</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url('wisata')?>">
                <i class="fa fa-envelope"></i> <span>Wisata</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url('kuliner')?>">
                <i class="fa fa-envelope"></i> <span>Kuliner</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url('kerajinan')?>">
                <i class="fa fa-envelope"></i> <span>Kerajinan</span>
              </a>
            </li>


        </section>
        <!-- /.sidebar -->
      </aside>
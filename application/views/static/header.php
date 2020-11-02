<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LPeg | <?= $judul; ?> </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/asset/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
  <!-- ==============================================
  Header
  =============================================== -->
  <header class="main-header">
    <a href="<?= base_url(); ?>" class="logo">
      <span class="logo-mini"><b>L</b>Peg</span>
      <span class="logo-lg"><b> Laporan </b> Pegawai </span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="<?= base_url(); ?>autentikasi/keluar"><i class="fa fa-sign-out fa-lg"></i>Keluar</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- ==============================================
  SideBar
  =============================================== -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(); ?>assets/img/default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="info-box-text">
            <?= $pegawai[0]['peg_nama'] ?> <br>
            <i><small><?= $pegawai[0]['peg_nip'] ?></small></i>
          </p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">MENU UTAMA</li>
        <li <?php echo $menu1; ?> >
          <a href="<?= base_url(); ?>home/index">
            <i class="fa fa-dashboard"></i> <span>Halaman Utama</span>
          </a>
        </li>
        <li <?php echo $menu2; ?> >
          <a href="<?= base_url(); ?>masukan/index">
            <i class="fa fa-edit"></i>
            <span>Masukan Data</span>
          </a>
        </li>
        <li <?php echo $menu3; ?> >
          <a href="<?= base_url(); ?>lihat/index">
            <i class="fa fa-files-o"></i>
            <span>Laporan Harian</span>
          </a>
        </li>
        <li <?php echo $menu4; ?> >
          <a href="<?= base_url(); ?>lihat/bulanan">
            <i class="fa fa-folder"></i>
            <span>Rekap Bulanan</span>
          </a>
        </li>
        <?php if($this->session->status == 1){ ?>
          <li <?php echo $menu5; ?> >
            <a href="<?= base_url(); ?>admin/index">
              <i class="fa fa-cogs"></i>
              <span>Kelola Pengguna</span>
            </a>
          </li>
        <?php } ?>
        <li <?php echo $menu6; ?> >
          <a href="<?= base_url() ?>tentang/index">
            <i class="fa fa-info"></i> <span>Tentang</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

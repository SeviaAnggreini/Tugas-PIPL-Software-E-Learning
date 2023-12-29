<?php
  include '../Config/koneksi.php';
  include '../Config/akun.php';
  include '../Config/function.php';
  include '../Config/excel_reader2.php';

  if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
        ?>
        <script type="text/javascript">
            alert('Anda Belum Melakukan Login.');
            setTimeout("location.href='../index.php'", 1000);
        </script>
        <?php
    }else{
      if ($_SESSION['level']!='Admin') {
        ?>
        <script type="text/javascript">
            alert('Anda tidak berhak login di sini.');
            setTimeout("location.href='../Config/logout.php?id=akses'", 1000);
        </script>
        <?php
      }else{
        $idletime = 30 * 60;
        if (time()-$_SESSION['timestamp']>$idletime){
          ?>
          <script type="text/javascript">
              alert('Waktu akses anda telah habis. Silahkan login kembali.');
              setTimeout("location.href='../Config/logout.php?id=timeout'", 1000);
          </script>
          <?php
        }else{
          $_SESSION['timestamp']=time();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-LEARNING</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../Assets/img/apnet.png"/>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Theme style -->
  <link rel="stylesheet" href="../Assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../Assets/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- js -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?page=beranda&aksi=aktif" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../Assets/img/apnet.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../Assets/img/apnet.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" height="40px" width="40px" style="opacity: .8"><b> E - </b>SKR1</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../Assets/img/<?php echo $ft_akun;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $data['nip'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../Assets/img/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $data['nama_admin'];?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../Config/logout.php?id=logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
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
          <img src="../Assets/img/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $data['nama_admin'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Data Pribadi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=akun_dosen&aksi=aktif"><i class="fa fa-circle-o"></i> Data Pribadi Dosen</a></li>
            <li><a href="?page=akun_mahasiswa&aksi=aktif"><i class="fa fa-circle-o"></i> Data Pribadi Mahasiswa</a></li>
          </ul>
        <li>
          <a href="?page=matkul&aksi=aktif">
            <i class="fa fa-book"></i> <span>Data Matakuliah</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="?page=prodi&aksi=aktif">
            <i class="fa fa-book"></i> <span>Data Prodi</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="?page=matakuliah&aksi=aktif">
            <i class="fa fa-book"></i> <span>Data Kelas</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class=""></i> <span>Logout</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hak Akses : <?php echo $_SESSION['level']; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hak Akses : <?php echo $_SESSION['level']; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!--//Tulis Script-->
        <?php
          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          if($page=='matakuliah'){
            if($aksi=='aktif'){
              include 'matakuliah/tampil_matakuliah.php';
            } else if ($aksi=='tambahdata_matakuliah') {
              include 'matakuliah/tambah_matakuliah.php';
            } else if ($aksi=='simpandata_matakuliah') {
              include 'matakuliah/proses/simpan_matakuliah.php';
            } else if ($aksi=='editdata_matakuliah') {
              include 'matakuliah/edit_matakuliah.php';
            } else if ($aksi=='updatedata_matakuliah') {
              include 'matakuliah/proses/update_matakuliah.php';
            } else if ($aksi=='hapusdata_matakuliah') {
              include 'matakuliah/proses/hapus_matakuliah.php';
            } else if ($aksi=='dosen_matakuliah') {
              include 'matakuliah/dosen_matakuliah.php';
            } else if ($aksi=='mahasiswa_matakuliah') {
              include 'matakuliah/mahasiswa_matakuliah.php';
            } else if ($aksi=='hapusdatadosen_matakuliah') {
              include 'matakuliah/proses/hapusdosen_matakuliah.php';
            } else if ($aksi=='tambahdatadosen_matakuliah') {
              include 'matakuliah/tambahdosen_matakuliah.php';
            } else if ($aksi=='simpandatadosen_matakuliah') {
              include 'matakuliah/proses/simpandosen_matakuliah.php';
            } else if ($aksi=='hapussemua_matakuliah') {
              include 'matakuliah/proses/hapus_semua_matakuliah.php';
            }         
          }else if($page=='akun_dosen'){
            if($aksi=='aktif'){
              include 'akun/dosen/tampil_dosen.php';
            } else if ($aksi=='detail_dosen') {
              include 'akun/dosen/rincian_dosen.php';
            } else if ($aksi=='tambahdata_dosen') {
              include 'akun/dosen/tambah_dosen.php';
            } else if ($aksi=='simpandata_dosen') {
              include 'akun/dosen/proses/simpan_dosen.php';
            } else if ($aksi=='editdata_dosen') {
              include 'akun/dosen/edit_dosen.php';
            } else if ($aksi=='updatedata_dosen') {
              include 'akun/dosen/proses/update_dosen.php';
            } else if ($aksi=='editpassword_dosen') {
              include 'akun/dosen/password_dosen.php';
            } else if ($aksi=='updatepassword_dosen') {
              include 'akun/dosen/proses/ganti_password_dosen.php';
            } else if ($aksi=='hapusdata_dosen') {
              include 'akun/dosen/proses/hapus_dosen.php';
            } else if ($aksi=='import_dosen') {
              include 'akun/dosen/import_dosen.php';
            } else if ($aksi=='upload_dosen') {
              include 'akun/dosen/proses/upload_dosen.php';
            }        
          }else if($page=='akun_mahasiswa'){
            if($aksi=='aktif'){
              include 'akun/mahasiswa/tampil_mahasiswa.php';
            } else if ($aksi=='detail_mahasiswa') {
              include 'akun/mahasiswa/rincian_mahasiswa.php';
            } else if ($aksi=='tambahdata_mahasiswa') {
              include 'akun/mahasiswa/tambah_mahasiswa.php';
            } else if ($aksi=='simpandata_mahasiswa') {
              include 'akun/mahasiswa/proses/simpan_mahasiswa.php';
            } else if ($aksi=='editdata_mahasiswa') {
              include 'akun/mahasiswa/edit_mahasiswa.php';
            } else if ($aksi=='updatedata_mahasiswa') {
              include 'akun/mahasiswa/proses/update_mahasiswa.php';
            } else if ($aksi=='editpassword_mahasiswa') {
              include 'akun/mahasiswa/password_mahasiswa.php';
            } else if ($aksi=='updatepassword_mahasiswa') {
              include 'akun/mahasiswa/proses/ganti_password_mahasiswa.php';
            } else if ($aksi=='hapusdata_mahasiswa') {
              include 'akun/mahasiswa/proses/hapus_mahasiswa.php';
            } else if ($aksi=='cari_mahasiswa') {
              include 'akun/mahasiswa/cari_mahasiswa.php';
            } else if ($aksi=='import_mahasiswa') {
              include 'akun/mahasiswa/import_mahasiswa.php';
            } else if ($aksi=='upload_mahasiswa') {
              include 'akun/mahasiswa/proses/upload_mahasiswa.php';
            } else if ($aksi=='hapussemua_akun') {
              include 'akun/mahasiswa/proses/hapus_semua_mahasiswa.php';
            }
          }else if($page=='prodi'){
            if($aksi=='aktif'){
              include 'prodi/tampil_prodi.php';
            } else if ($aksi=='tambahdata_prodi') {
              include 'prodi/tambah_prodi.php';
            } else if ($aksi=='detail_prodi') {
              include 'prodi/rincian_prodi.php';
            } else if ($aksi=='tambahmatakuliah_prodi') {
              include 'prodi/tambahmatakuliah_prodi.php';
            } else if ($aksi=='tambahmahasiswa_prodi') {
              include 'prodi/tambahmahasiswa_prodi.php';
            } else if ($aksi=='simpandata_prodi') {
              include 'prodi/proses/simpan_prodi.php';
            } else if ($aksi=='editdata_prodi') {
              include 'prodi/edit_prodi.php';
            } else if ($aksi=='updatedata_prodi') {
              include 'prodi/proses/update_prodi.php';
            } else if ($aksi=='hapusdata_prodi') {
              include 'prodi/proses/hapus_prodi.php';
            } else if ($aksi=='mahasiswa_prodi_ganjil') {
              include 'prodi/mahasiswa_prodi_ganjil.php';
            } else if ($aksi=='mahasiswa_prodi_genap') {
              include 'prodi/mahasiswa_prodi_genap.php';
            } else if ($aksi=='hapusdatamahasiswa_prodi') {
              include 'prodi/proses/hapusmahasiswa_prodi.php';
            } else if ($aksi=='tambahdatamahasiswa_prodi') {
              include 'prodi/tambahmahasiswa_prodi.php';
            } else if ($aksi=='simpandatamahasiswa_prodi') {
              include 'prodi/proses/simpanmahasiswa_prodi.php';
            } else if ($aksi=='hapussemua_prodi') {
              include 'prodi/proses/hapus_semua_prodi.php';
            }
          }else if($page=='matkul'){
            if($aksi=='aktif'){
              include 'matkul/tampil_matkul.php';
            } else if ($aksi=='tambahdata_matkul') {
              include 'matkul/tambah_matkul.php';
            } else if ($aksi=='mahasiswa_matkul') {
              include 'matkul/mahasiswa_matkul.php';
            } else if ($aksi=='tambahmatakuliah_matkul') {
              include 'matkul/tambahmatakuliah_matkul.php';
            } else if ($aksi=='tambahmahasiswa_matkul') {
              include 'matkul/tambahmahasiswa_matkul.php';
            } else if ($aksi=='simpandata_matkul') {
              include 'matkul/proses/simpan_matkul.php';
            } else if ($aksi=='editdata_matkul') {
              include 'matkul/edit_matkul.php';
            } else if ($aksi=='updatedata_matkul') {
              include 'matkul/proses/update_matkul.php';
            } else if ($aksi=='hapusdata_matkul') {
              include 'matkul/proses/hapus_matkul.php';
            } else if ($aksi=='mahasiswa_matkul_ganjil') {
              include 'matkul/mahasiswa_matkul_ganjil.php';
            } else if ($aksi=='mahasiswa_matkul_genap') {
              include 'matkul/mahasiswa_matkul_genap.php';
            } else if ($aksi=='hapusdatamahasiswa_matkul') {
              include 'matkul/proses/hapusmahasiswa_matkul.php';
            } else if ($aksi=='tambahdatamahasiswa_matkul') {
              include 'matkul/tambahmahasiswa_matkul.php';
            } else if ($aksi=='simpandatamahasiswa_matkul') {
              include 'matkul/proses/simpanmahasiswa_matkul.php';
            } else if ($aksi=='hapussemua_matkul') {
              include 'matkul/proses/hapus_semua_matkul.php';
            }
          }else if($page=='beranda'){
              if ($aksi=='aktif') {
                include 'beranda/index.php';
              }
          }
        ?>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row -->

          </div>
          <!-- /.box -->


<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="index.php?page=beranda&aksi=aktif">E-LEARNING</a>.</strong> All rights
    reserved.
  </footer>

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./ckeditor -->
<script src="//cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
<!-- jQuery 2.2.3 -->
<script src="../Assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../Assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../Assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../Assets/dist/js/demo.js"></script>
</body>
</html>

<?php
    }
  }
}
?>

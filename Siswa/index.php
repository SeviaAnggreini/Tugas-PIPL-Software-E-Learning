<?php
  include '../Config/koneksi.php';
  include '../Config/akun.php';
  include '../Config/function.php';

  if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
        ?>
        <script type="text/javascript">
            alert('Anda Belum Melakukan Login.');
            setTimeout("location.href='../index.php'", 1000);
        </script>
        <?php
    }else{
      if ($_SESSION['level']!='Siswa') {
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
  <title>E-LEARNING APLIKASI PENDIDIKAN</title>
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
              <span class="hidden-xs"><?php echo $data['nis'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../Assets/img/<?php echo $ft_akun;?>" class="img-circle" alt="User Image">

                <p>
                <?php echo $data['nama_siswa'];?>
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
        <p><?php echo $data['nama_siswa'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="?page=beranda&aksi=aktif">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Data MataKuliah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=mata_pelajaran&aksi=aktif"><i class="fa fa-circle-o"></i> Daftar MataKuliah</a></li>
            <li><a href="?page=nilai_mata_pelajaran&aksi=aktif"><i class="fa fa-circle-o"></i> Data Nilai Akhir </a></li>
          </ul>
        </li>
        <li>
          <a href="?page=ujian&aksi=mapel">
            <i class="fa fa-th-list"></i> <span>Data Kelas</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Data Kelompok</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=nilai_kel&aksi=tampil_kinerja"><i class="fa fa-circle-o"></i> Data Kinerja Kelompok</a></li>
            <li><a href="?page=nilai_kel&aksi=aktif"><i class="fa fa-circle-o"></i> Data Nilai Kelompok </a></li>
          </ul>
        </li>
        </li>
        <li>
          <a href="?page=akun_siswa&aksi=detail_siswa&id=<?php echo $data['nis'];?>">
            <i class="fa fa-user"></i> <span>Akun</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="../Config/logout.php?id=logout">
            <i class="fa fa-arrow-circle-left"></i> <span>Logout</span>
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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Hak Akses : <?php echo $_SESSION['level']; ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!--//Tulis Script-->
        <?php
          $page = $_GET['page'];
          $aksi = $_GET['aksi'];

          if($page=='nilai_mata_pelajaran'){
            if($aksi=='aktif'){
              include 'nilai/tampil_nilai_mata_pelajaran.php';
            } else if ($aksi=='detail_nilai_mata_pelajaran') {
              include 'nilai/rincian_nilai_mata_pelajaran.php';
            } else if ($aksi=='detail_tugas_mata_pelajaran') {
              include 'nilai/rincian_tugas_mata_pelajaran.php';
            } else if ($aksi=='edit_nilai_mata_pelajaran') {
              include 'nilai/tambah_nilai_mata_pelajaran.php';
            }  else if ($aksi=='simpandata_tugas_mata_pelajaran') {
              include 'nilai/proses/simpan_nilai_mata_pelajaran.php';
            } 
          } else if($page=='mata_pelajaran'){
              if($aksi=='aktif'){
                include 'mata_pelajaran/tampil_mata_pelajaran.php';
              }
          }else if($page=='tugas_mata_pelajaran'){
            if($aksi=='aktif'){
              include 'tugas_mata_pelajaran/tampil_tugas_mata_pelajaran.php';
            } else if ($aksi=='detail_tugas') {
              include 'tugas_mata_pelajaran/detail_tugas_mata_pelajaran.php';
            } else if ($aksi=='unggah_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/unggah_tugas_mata_pelajaran.php';
            } else if ($aksi=='upload_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/proses/upload_tugas_mata_pelajaran.php';
            } else if ($aksi=='rekapdata_tugas_mata_pelajaran') {
              include 'tugas_mata_pelajaran/rekap_tugas_mata_pelajaran.php';
            } 
          } else if($page=='ujian'){
              if ($aksi=='mapel') {
                include 'ujian/tampil_mata_pelajaran.php';
              } elseif ($aksi=='lk') {
                include 'ujian/tampil_lk_mata_pelajaran.php';
              } elseif ($aksi=='bs') {
                include 'ujian/tampil_bs_mata_pelajaran.php';
              } elseif ($aksi=='jawab_ujian_mata_pelajaran') {
                include 'ujian/proses/simpan_ujian_mata_pelajaran.php';
              }
            }else if($page=='akun_siswa'){
              if($aksi=='aktif'){
                 include 'akun/siswa/tampil_siswa.php';
               } else if ($aksi=='detail_siswa') {
                 include 'akun/siswa/rincian_siswa.php';
               } else if ($aksi=='tambahdata_siswa') {
                 include 'akun/siswa/tambah_siswa.php';
               } else if ($aksi=='simpandata_siswa') {
                 include 'akun/siswa/proses/simpan_siswa.php';
               } else if ($aksi=='editdata_siswa') {
                 include 'akun/siswa/edit_siswa.php';
               } else if ($aksi=='updatedata_siswa') {
                 include 'akun/siswa/proses/update_siswa.php';
               } else if ($aksi=='editpassword_siswa') {
                 include 'akun/siswa/password_siswa.php';
               } else if ($aksi=='updatepassword_siswa') {
                 include 'akun/siswa/proses/ganti_password_siswa.php';
               } else if ($aksi=='hapusdata_siswa') {
                 include 'akun/siswa/proses/hapus_siswa.php';
               } else if ($aksi=='cari_siswa') {
                 include 'akun/siswa/cari_siswa.php';
               } else if ($aksi=='import_siswa') {
                 include 'akun/siswa/import_siswa.php';
               } else if ($aksi=='upload_siswa') {
                 include 'akun/siswa/proses/upload_siswa.php';
               } else if ($aksi=='hapussemua_akun') {
                 include 'akun/siswa/proses/hapus_semua_siswa.php';
               }           
              }else if($page=='nama_kelompok'){
                if($aksi=='aktif'){
                  include 'nama_kelompok/tampil_mata_pelajaran.php';
                } else if ($aksi=='tambahdata_mata_pelajaran') {
                  include 'nama_kelompok/tambah_mata_pelajaran.php';
                } else if ($aksi=='simpandata_mata_pelajaran') {
                  include 'nama_kelompok/proses/simpan_mata_pelajaran.php';
                } else if ($aksi=='editdata_mata_pelajaran') {
                  include 'nama_kelompok/edit_mata_pelajaran.php';
                } else if ($aksi=='updatedata_mata_pelajaran') {
                  include 'nama_kelompok/proses/update_mata_pelajaran.php';
                } else if ($aksi=='hapusdata_mata_pelajaran') {
                  include 'nama_kelompok/proses/hapus_mata_pelajaran.php';
                } else if ($aksi=='guru_mata_pelajaran') {
                  include 'nama_kelompok/guru_mata_pelajaran.php';
                } else if ($aksi=='hapusdataguru_mata_pelajaran') {
                  include 'nama_kelompok/proses/hapusguru_mata_pelajaran.php';
                } else if ($aksi=='tambahdataguru_mata_pelajaran') {
                  include 'nama_kelompok/tambahguru_mata_pelajaran.php';
                } else if ($aksi=='simpandataguru_mata_pelajaran') {
                  include 'nama_kelompok/proses/simpanguru_mata_pelajaran.php';
                } else if ($aksi=='hapussemua_mata_pelajaran') {
                  include 'nama_kelompok/proses/hapus_semua_mata_pelajaran.php';
                }
              }else if($page=='tugas_mata_pelajaran'){
                if($aksi=='aktif'){
                  include 'tugas_mata_pelajaran/tampil_tugas_mata_pelajaran.php';
                } else if ($aksi=='tambahdata_tugas_mata_pelajaran') {
                  include 'tugas_mata_pelajaran/tambah_tugas_mata_pelajaran.php';
                } else if ($aksi=='simpandata_tugas_mata_pelajaran') {
                  include 'tugas_mata_pelajaran/proses/simpan_tugas_mata_pelajaran.php';
                } else if ($aksi=='editdata_tugas_mata_pelajaran') {
                  include 'tugas_mata_pelajaran/edit_tugas_mata_pelajaran.php';
                } else if ($aksi=='updatedata_tugas_mata_pelajaran') {
                  include 'tugas_mata_pelajaran/proses/update_tugas_mata_pelajaran.php';
                } else if ($aksi=='hapusdata_tugas_mata_pelajaran') {
                  include 'tugas_mata_pelajaran/proses/hapus_tugas_mata_pelajaran.php';
                }
              }else if($page=='nilai_kelompok'){
                if($aksi=='aktif'){
                  include 'nilai_kelompok/tampil_nilai_akhir.php';
                } else if ($aksi=='detail_nilai_mata_pelajaran') {
                  include 'nilai_kelompok/rincian_nilai_mata_pelajaran.php';
                } else if ($aksi=='detail_tugas_mata_pelajaran') {
                  include 'nilai_kelompok/rincian_tugas_mata_pelajaran.php';
                } else if ($aksi=='edit_nilai_mata_pelajaran') {
                  include 'nilai_kelompok/tambah_nilai_mata_pelajaran.php';
                }  else if ($aksi=='simpandata_tugas_mata_pelajaran') {
                  include 'nilai_kelompok/proses/simpan_nilai_mata_pelajaran.php';
                }else if ($aksi=='editdata_mata_pelajaran') {
                  include 'nilai_kelompok/edit_mata_pelajaran.php';
                }
              }else if($page=='nilai_kel'){
                  if($aksi=='aktif'){
                  include 'nilai_kel/tampil_nilai_kel.php';
                } else if ($aksi=='detail_guru') {
                  include 'nilai_kel/guru/rincian_guru.php';
                } else if ($aksi=='tampil_kinerja') {
                  include 'nilai_kel/tampil_kinerja.php';
                } else if ($aksi=='tambahdata_guru') {
                  include 'nilai_kel/tambah_guru.php';
                } else if ($aksi=='simpandata_guru') {
                  include 'nilai_kel/proses/simpan_guru.php';
                } else if ($aksi=='editdata_guru') {
                  include 'nilai_kel/edit_guru.php';
                } else if ($aksi=='updatedata_guru') {
                  include 'nilai_kel/proses/update_guru.php';
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
      <b>Version</b> 1.1.1.1
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">APLIKASI SYSTEM E-LEARNING </a>.</strong> Kelompok 2 PIPL
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

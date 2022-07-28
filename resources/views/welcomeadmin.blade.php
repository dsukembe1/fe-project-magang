@extends('dashboard')
@section('container')
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <style>
  ul.pagination {
  display: inline-block;
  padding: 0;
  margin: 0;
  }
  ul.pagination li {display: inline;}
  ul.pagination li a {
  color: black;
  float: left;
  padding: 6px 12px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  }
  ul.pagination li a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
  }
  ul.pagination li a:hover:not(.active) {background-color: #ddd;}
  div.center {text-align: center;}
  </style>
</head>

<body class="hold-transition skin-black-light sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="index2.html" class="logo">
        <span class="logo-mini"><b>A</b>LT</span>
        <span class="logo-lg"><img src="dist/img/school.png" alt=""><b> Sekolah</b>XYZ</span>
      </a>
    </header>
    <!-- Header -->
    <section class="content-header">
      <h1>
        <p>
          Pengumuman<br>
          <small>Tahun Ajaran 20xx/20xx Semester x</small>
        </p>
      </h1>
    </section>
    <!-- Isi Konten Pengumuman -->
    <div class="content-wrapper">
      <section class="content">
        <div style="text-align:justify;width:75%; padding:8px;">
          <img src="dist/img/foto1.png" style="float:left; margin:0 8px 4px 0;" width="150"/><h4>Libur Idul Fitri 1442 H</h4>
          <small>Libur Idul Fitri</small>
          <h5>Disini Masukan Text</h5>
        </div>
      </section>
      <div class="center">
          <ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a class="active" href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">»</a></li>
          </ul>
      </div>
    </div>
    </section>

    <!-- Side Bar -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu skin-black">
          <li class="header">Sistem Manajemen Sekolah</li>
          <li>
            <a href="pages/widgets.html">
              <img src="dist/img/pengumuman.png" alt=""><span> Pengumuman</span>
            </a>
          </li>
          <li>
            <a href="#">
              <img src="dist/img/nilai.png" alt=""><span> Nilai</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active br-5"><a href="index.html">
                  <p> Daftar Nilai</p>
                </a></li>
            </ul>
          </li>
          <li>
            <a href="#">
              <img src="dist/img/bola.png" alt=""><span> Extrakulikuler</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active br-5"><a href="index.html">
                  <p> Nilai Ekskul</p>
                </a></li>
            </ul>
            <ul class="treeview-menu">
              <li class="active br-5"><a href="index.html">
                  <p> Daftar Ekskul</p>
                </a></li>
            </ul>
          </li>
          <li>
            <a href="">
              <img src="dist/img/piala.png" alt=""><span> Prestasi</span>
            </a>
          </li>
          <li>
            <a href="">
              <img src="dist/img/admin.png" alt=""><span> Administrasi</span>
            </a>
          </li>
          <li>
            <a href="">
              <img src="dist/img/user.png" alt=""><span> Admin</span>
            </a>
          </li>
      </section>
    </aside>

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>
</html>
@endsection
<?php
  session_start();
  if($_SESSION['status']!="login"){
    header("location:index.php"); 
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>NOTULENSI RAPAT </title>

  <!-- Bootstrap -->
  <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <!-- untuk table -->
  <link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="?f=home" class="site_title"></i> <span>NOTULENSI RAPAT</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
              <div class="profile_pic">
                <img src="awalbrosnew.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
              <span>Welcome,</span>
              <h2>ADMIN</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="?f=home"><i class="fa fa-home"></i> Home</a></li>
                <?php
                // Cek role user
                if($_SESSION['role'] == 'user'){ // Jika role-nya user
                ?>
                <li><a href="?f=lihatnotulen"><i class="fa fa-user"></i> Notulen </a></li>
                <?php
                }
                ?> 
                <?php
                // Cek role user
                if($_SESSION['role'] == 'admin'){ // Jika role-nya admin
                ?>
                <li><a href="?f=notulen"><i class="fa fa-user"></i> Notulen</a></li>
                <?php
                }
                ?>
                <li><a href="index.php"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
         
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <?php 
          $folder = $_GET['f'];

          if($folder == 'home'){
            include "home/index.php";

          }elseif($folder == 'lihatnotulen'){
            include "lihatnotulen/index.php";

          }elseif($folder == 'editlihatnotulen'){
            include "lihatnotulen/edit.php";

          }elseif($folder == 'notulen'){
            include "notulen/index.php";

          }elseif($folder == 'tambahnotulen'){
            include "notulen/tambah.php";

          }elseif($folder == 'editnotulen'){
            include "notulen/edit.php";

          }elseif($folder == 'deletenotulen'){
            include "notulen/delete.php";

          }elseif($folder == 'editnotulen'){
            include "notulen/simpan_pembahasan.php";



          }else{

            echo "modul belum ada";

          }
        ?>
      </div>
       



  <!-- jQuery -->
  <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="assets/vendors/nprogress/nprogress.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="assets/vendors/iCheck/icheck.min.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="assets/vendors/moment/min/moment.min.js"></script>
  <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-wysiwyg -->
  <script src="assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
  <script src="assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
  <script src="assets/vendors/google-code-prettify/src/prettify.js"></script>
  <!-- jQuery Tags Input -->
  <script src="assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
  <!-- Switchery -->
  <script src="assets/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="assets/vendors/select2/dist/js/select2.full.min.js"></script>
  <!-- Parsley -->
  <script src="assets/vendors/parsleyjs/dist/parsley.min.js"></script>
  <!-- Autosize -->
  <script src="assets/vendors/autosize/dist/autosize.min.js"></script>
  <!-- jQuery autocomplete -->
  <script src="assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- starrr -->
  <script src="assets/vendors/starrr/dist/starrr.js"></script>
  <!-- Datatables -->
  <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="assets/vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="assets/build/js/custom.min.js"></script>

</body></html>












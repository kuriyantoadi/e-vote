<?php
ob_start();

session_start();
if (!isset($_SESSION['id_admin'])) {
   header('location: ./');
}
define('BASEPATH', dirname(__FILE__));

include('../include/connection.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
    <style>
      .box {
        padding: 30px;
      }
      img.kandidat {
        width:250px;
        height: 230px;
      }
      .suara {
        position: absolute;
        right: 20px;
        bottom: 120px;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>-V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>E</b>-Voting</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><i class="fa fa-user"></i> Administrator</span> &nbsp;<i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li>
                    <a href="?page=edit_profil">Edit Profil</a>
                  </li>
                  <li>
                    <a href="?page=change_password">Ganti Password</a>
                  </li>
                  <li>
                    <a data-toggle="modal" href="#myModal">Sign out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php if (!isset($_GET['page'])) { echo 'class="active"'; } ?>>
                <a href="./" ><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'user') { echo 'class="active"'; } ?>>
                <a href="?page=user"><i class="fa fa-users"></i>  <span>Yang Sudah Milih</span></a>
            </li>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kandidat') { echo 'class="active"'; } ?>>
                <a href="?page=kandidat"><i class="fa fa-users"></i> <span>Manajemen Kandidat</span></a>
            </li>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kelas') { echo 'class="active"'; } ?>>
                <a href="?page=kelas"><i class="fa fa-university"></i> <span>Manajemen Kelas</span></a>
            </li>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'perolehan') { echo 'class="active"'; } ?>>
                <a href="?page=perolehan"><i class="fa fa-bar-chart"></i> <span>Perolehan</span></a>
            </li>


            <!-- Penambahan Submenu -->
            <li class="header">Data Siswa</li>
            <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Data TKJ - RPL</span>
                  <span class="pull-right-container">
                      <span class="label label-primary pull-right"></span>
                  </span>
              </a>
              <ul class="treeview-menu">
              <?php
                include ('menu/tkj-rpl.php');
              ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Data AK - APK</span>
                  <span class="pull-right-container">
                      <span class="label label-primary pull-right"></span>
                  </span>
              </a>
              <ul class="treeview-menu">
              <?php
                include ('menu/ak-apk.php');
              ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Data Mesin - OTO</span>
                  <span class="pull-right-container">
                      <span class="label label-primary pull-right"></span>
                  </span>
              </a>
              <ul class="treeview-menu">
              <?php
                include ('menu/mesin-oto.php');
              ?>
              </ul>
            </li>

            <!-- Penambahan Submenu -->
            <li class="header">Data Pemilih</li>

            <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Pemilih TKJ - RPL</span>
                  <span class="pull-right-container">
                      <span class="label label-primary pull-right"></span>
                  </span>
              </a>
              <ul class="treeview-menu">
                <!-- Kelas TKJ -->
              <?php
                include ('pemilih/tkj-rpl.php');
              ?>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Pemilih AK - APK</span>
                  <span class="pull-right-container">
                      <span class="label label-primary pull-right"></span>
                  </span>
              </a>
              <ul class="treeview-menu">
              <?php
                include ('pemilih/ak-apk.php');
              ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Pemilih Mesin - OTO</span>
                  <span class="pull-right-container">
                      <span class="label label-primary pull-right"></span>
                  </span>
              </a>
              <ul class="treeview-menu">
              <?php
                include ('pemilih/mesin-oto.php');
              ?>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Sign Out</h4>
                </div>
                <div class="modal-body">
                  Apakah anda yakin ingin keluar dari aplikasi ini?
                </div>
                <div class="modal-footer">
                  <a href="?page=logout" class="btn btn-danger">Sign Out</a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-success">
              <?php
                  if(isset($_GET['page'])) {
                      switch ($_GET['page']) {

                        //Daftar Siswa

                        // kelas TKJ
                        case 'X-TKJ-1':
                            include('./siswa-kelas/X-TKJ-1.php');
                            break;
                        case 'X-TKJ-2':
                            include('./siswa-kelas/X-TKJ-2.php');
                            break;
                        case 'XI-TKJ-1':
                            include('./siswa-kelas/XI-TKJ-1.php');
                            break;
                        case 'XI-TKJ-2':
                            include('./siswa-kelas/XI-TKJ-2.php');
                            break;
                        case 'XII-TKJ-1':
                            include('./siswa-kelas/XII-TKJ-1.php');
                            break;
                        case 'XII-TKJ-2':
                            include('./siswa-kelas/XII-TKJ-2.php');
                            break;

                        // Kelas RPL
                        case 'X-RPL-1':
                            include('./siswa-kelas/X-RPL-1.php');
                            break;
                        case 'X-RPL-2':
                            include('./siswa-kelas/X-RPL-2.php');
                            break;
                        case 'XI-RPL-1':
                            include('./siswa-kelas/XI-RPL-1.php');
                            break;
                        case 'XI-RPL-2':
                            include('./siswa-kelas/XI-RPL-2.php');
                            break;
                        case 'XII-RPL-1':
                            include('./siswa-kelas/XII-RPL-1.php');
                            break;
                        case 'XII-RPL-2':
                            include('./siswa-kelas/XII-RPL-2.php');
                            break;

                        //AK
                        case 'X-AK-1':
                            include('./siswa-kelas/X-AK-1.php');
                            break;
                        case 'X-AK-2':
                            include('./siswa-kelas/X-AK-2.php');
                            break;
                        case 'XI-AK-1':
                            include('./siswa-kelas/XI-AK-1.php');
                            break;
                        case 'XI-AK-2':
                            include('./siswa-kelas/XI-AK-2.php');
                            break;
                        case 'XII-AK-1':
                            include('./siswa-kelas/XII-AK-1.php');
                            break;
                        case 'XII-AK-2':
                            include('./siswa-kelas/XII-AK-2.php');
                            break;

                        //APK
                        case 'X-APK-1':
                            include('./siswa-kelas/X-APK-1.php');
                            break;
                        case 'X-APK-2':
                            include('./siswa-kelas/X-APK-2.php');
                            break;
                        case 'XI-APK-1':
                            include('./siswa-kelas/XI-APK-1.php');
                            break;
                        case 'XI-APK-2':
                            include('./siswa-kelas/XI-APK-2.php');
                            break;
                        case 'XII-APK-1':
                            include('./siswa-kelas/XII-APK-1.php');
                            break;
                        case 'XII-APK-2':
                            include('./siswa-kelas/XII-APK-2.php');
                            break;

                        //OTO
                        case 'X-OTO-1':
                            include('./siswa-kelas/X-OTO-1.php');
                            break;
                        case 'X-OTO-2':
                            include('./siswa-kelas/X-OTO-2.php');
                            break;
                        case 'XI-OTO-1':
                            include('./siswa-kelas/XI-OTO-1.php');
                            break;
                        case 'XI-OTO-2':
                            include('./siswa-kelas/XI-OTO-2.php');
                            break;
                        case 'XII-OTO-1':
                            include('./siswa-kelas/XII-OTO-1.php');
                            break;
                        case 'XII-OTO-2':
                            include('./siswa-kelas/XII-OTO-2.php');
                            break;

                        //MESIN
                        case 'X-MESIN-1':
                            include('./siswa-kelas/X-MESIN-1.php');
                            break;
                        case 'X-MESIN-2':
                            include('./siswa-kelas/X-MESIN-2.php');
                            break;
                        case 'X-MESIN-3':
                            include('./siswa-kelas/X-MESIN-3.php');
                            break;
                        case 'X-MESIN-4':
                            include('./siswa-kelas/X-MESIN-4.php');
                            break;
                        case 'XI-MESIN-1':
                            include('./siswa-kelas/XI-MESIN-1.php');
                            break;
                        case 'XI-MESIN-2':
                            include('./siswa-kelas/XI-MESIN-2.php');
                            break;
                        case 'XI-MESIN-3':
                            include('./siswa-kelas/XI-MESIN-3.php');
                            break;
                        case 'XII-MESIN-1':
                            include('./siswa-kelas/XII-MESIN-1.php');
                            break;
                        case 'XII-MESIN-2':
                            include('./siswa-kelas/XII-MESIN-2.php');
                            break;
                        case 'XII-MESIN-3':
                            include('./siswa-kelas/XII-MESIN-3.php');
                            break;


                        //Siswa Pemilih

                        // kelas TKJ
                        case 'PIL-X-TKJ-1':
                            include('./siswa-pemilih/X-TKJ-1.php');
                            break;
                        case 'PIL-X-TKJ-2':
                            include('./siswa-pemilih/X-TKJ-2.php');
                            break;
                        case 'PIL-XI-TKJ-1':
                            include('./siswa-pemilih/XI-TKJ-1.php');
                            break;
                        case 'PIL-XI-TKJ-2':
                            include('./siswa-pemilih/XI-TKJ-2.php');
                            break;
                        case 'PIL-XII-TKJ-1':
                            include('./siswa-pemilih/XII-TKJ-1.php');
                            break;
                        case 'PIL-XII-TKJ-2':
                            include('./siswa-pemilih/XII-TKJ-2.php');
                            break;

                        // Kelas RPL
                        case 'PIL-X-RPL-1':
                            include('./siswa-pemilih/X-RPL-1.php');
                            break;
                        case 'PIL-X-RPL-2':
                            include('./siswa-pemilih/X-RPL-2.php');
                            break;
                        case 'PIL-XI-RPL-1':
                            include('./siswa-pemilih/XI-RPL-1.php');
                            break;
                        case 'PIL-XI-RPL-2':
                            include('./siswa-pemilih/XI-RPL-2.php');
                            break;
                        case 'PIL-XII-RPL-1':
                            include('./siswa-pemilih/XII-RPL-1.php');
                            break;
                        case 'PIL-XII-RPL-2':
                            include('./siswa-pemilih/XII-RPL-2.php');
                            break;

                        //AK
                        case 'PIL-X-AK-1':
                            include('./siswa-pemilih/X-AK-1.php');
                            break;
                        case 'PIL-X-AK-2':
                            include('./siswa-pemilih/X-AK-2.php');
                            break;
                        case 'PIL-XI-AK-1':
                            include('./siswa-pemilih/XI-AK-1.php');
                            break;
                        case 'PIL-XI-AK-2':
                            include('./siswa-pemilih/XI-AK-2.php');
                            break;
                        case 'PIL-XII-AK-1':
                            include('./siswa-pemilih/XII-AK-1.php');
                            break;
                        case 'PIL-XII-AK-2':
                            include('./siswa-pemilih/XII-AK-2.php');
                            break;

                        //APK
                        case 'PIL-X-APK-1':
                            include('./siswa-pemilih/X-APK-1.php');
                            break;
                        case 'PIL-X-APK-2':
                            include('./siswa-pemilih/X-APK-2.php');
                            break;
                        case 'PIL-XI-APK-1':
                            include('./siswa-pemilih/XI-APK-1.php');
                            break;
                        case 'PIL-XI-APK-2':
                            include('./siswa-pemilih/XI-APK-2.php');
                            break;
                        case 'PIL-XII-APK-1':
                            include('./siswa-pemilih/XII-APK-1.php');
                            break;
                        case 'PIL-XII-APK-2':
                            include('./siswa-pemilih/XII-APK-2.php');
                            break;

                        //OTO
                        case 'PIL-X-OTO-1':
                            include('./siswa-pemilih/X-OTO-1.php');
                            break;
                        case 'PIL-X-OTO-2':
                            include('./siswa-pemilih/X-OTO-2.php');
                            break;
                        case 'PIL-XI-OTO-1':
                            include('./siswa-pemilih/XI-OTO-1.php');
                            break;
                        case 'PIL-XI-OTO-2':
                            include('./siswa-pemilih/XI-OTO-2.php');
                            break;
                        case 'PIL-XII-OTO-1':
                            include('./siswa-pemilih/XII-OTO-1.php');
                            break;
                        case 'PIL-XII-OTO-2':
                            include('./siswa-pemilih/XII-OTO-2.php');
                            break;

                        //MESIN
                        case 'PIL-X-MESIN-1':
                            include('./siswa-pemilih/X-MESIN-1.php');
                            break;
                        case 'PIL-X-MESIN-2':
                            include('./siswa-pemilih/X-MESIN-2.php');
                            break;
                        case 'PIL-X-MESIN-3':
                            include('./siswa-pemilih/X-MESIN-3.php');
                            break;
                        case 'PIL-X-MESIN-4':
                            include('./siswa-pemilih/X-MESIN-4.php');
                            break;
                        case 'PIL-XI-MESIN-1':
                            include('./siswa-pemilih/XI-MESIN-1.php');
                            break;
                        case 'PIL-XI-MESIN-2':
                            include('./siswa-pemilih/XI-MESIN-2.php');
                            break;
                        case 'PIL-XI-MESIN-3':
                            include('./siswa-pemilih/XI-MESIN-3.php');
                            break;
                        case 'PIL-XII-MESIN-1':
                            include('./siswa-pemilih/XII-MESIN-1.php');
                            break;
                        case 'PIL-XII-MESIN-2':
                            include('./siswa-pemilih/XII-MESIN-2.php');
                            break;
                        case 'PIL-XII-MESIN-3':
                            include('./siswa-pemilih/XII-MESIN-3.php');
                            break;


                        case 'user':
                            include('./user/index.php');
                            break;
                        case 'kelas':
                            include('./kelas/index.php');
                            break;

                        case 'kandidat':
                            include('./kandidat/index.php');
                            break;
                        case 'user':
                            include('./user/index.php');
                            break;
                        case 'perolehan':
                            include('./perolehan.php');
                            break;
                        case 'edit_profil':
                            include('./edit.php');
                            break;
                        case 'change_password':
                            include('./pass.php');
                            break;
                        case 'logout':
                            unset($_SESSION['id_admin']);
                            unset($_SESSION['user']);

                            header('location:./');
                            break;
                        default:
                            include('./welcome.php');
                            break;
                      }
                  } else {
                      include('./welcome.php');
                  }
                  ?>
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. Powered by :  Melati107</a>
      </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="../assets/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/app.min.js"></script>
    <?php if (isset($_GET['page']) && $_GET['page'] == 'perolehan') { ?>
    <script type="text/javascript" src="../assets/js/chart-bundle.js"></script>
    <script type="text/javascript" src="../assets/js/utils.js"></script>
    <script type="text/javascript" src="../assets/js/FileSaver.min.js"></script>
    <script type="text/javascript" src="../assets/js/canvas-toBlob.js"></script>
    <?php } ?>
    <script type="text/javascript">
    // slideToggle()
    $(document).ready(function() {
      $(".dropdown-toggle").click(function() {
          $(this).parent().find(".dropdown-menu").slideToggle();
      });
      $("#menu-toggle").click(function() {
          $(this).parent().find(".menu").slideToggle();
      });
    });

    $("#save-img").click(function(){
      $('#canvas').get(0).toBlob(function(blob){
          saveAs(blob, 'chart.png');
      });
    });
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'kandidat') { ?>
      function tampil() {
          $.ajax({
            url: 'ajax.php',
            method: "GET",
            success: function(data) {
              $('#data').html(data);
            }
          });
      }

      $(document).ready(function(){
          $('#periode').change(function(){
            var periode = $('#periode').val();

            $.ajax({
              url: "ajax.php",
              method: "POST",
              data: {periode : periode},
              success: function(data) {
                $('#data').html(data);
              }
            });
          });
      });

      window.onload = function(){
          tampil();
      };
      <?php
    }
    ?>
    <?php
    if (isset($_GET['page']) && $_GET['page'] == 'perolehan') {
      $thn = date('Y');
      $dpn = date('Y') + 1;
      $periode = $thn.'/'.$dpn;
      $kan = $con->prepare("SELECT * FROM t_kandidat WHERE periode = ?") or die($con->error);
      $kan->bind_param('s', $periode);
      $kan->execute();
      $kan->store_result();
      $numb = $kan->num_rows();
      $label = '';
      $data = '';
      for ($i = 1; $i <= $numb; $i++) {
          $kan->bind_result($id, $nama, $foto, $visi, $misi, $suara, $kandidat);
          $kan->fetch();
          $label .= "'".$nama."',";
          $data .= $suara.',';
      }
      $labels = trim($label, ',');
      $datas  = trim($data, ',');
    ?>
    var chartData = {
      labels: [
          <?php
          echo $labels;
          ?>
      ],
        datasets: [{
          type: 'bar',
          label: 'Jumlah Suara',
          borderColor: window.chartColors.green,
          backgroundColor: [
            window.chartColors.blue,
            window.chartColors.red,
            window.chartColors.green,
          ],
          borderWidth: 2,
          fill: false,
          data: [
            <?php
            echo $datas;
            ?>
          ]
        }],
    };
    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myMixedChart = new Chart(ctx, {
          type: 'bar',
          data: chartData,
          options: {
                responsive: true,
                title: {
                  display: true,
                  text: 'Perolehan Suara',
                  fontSize: 30
                },
                legend: {
                    labels: {
                        fontSize: 20
                    }
                },
                scales: {
                  xAxes: [{
                      ticks: {
                          fontSize:15
                      }
                  }],
                  yAxes: [{
                      ticks: {
                          fontSize:14,
                          min:0
                      }
                  }]
                }
            }
        });
    };
    <?php
    }
    ?>
    </script>
  </body>
</html>
<?php ob_flush(); ?>

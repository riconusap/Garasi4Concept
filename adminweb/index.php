<?php
include('setting_metatag.php');
include('security.php');
include('sql.php');
$data_setting = mysqli_fetch_assoc($hasil_setting);
?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <center>
              <a href="index.php"><span>
                  <font size="4.95" color="white" face="Helvetica Neue">GARASI4CONCEPT</font>
              </a></span>
            </center>
          </div>

          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="col profile clearfix">
            <div class="row ">
              <div class="col d-lg-flex justify-content-lg-center align-items-lg-center"><img alt="<?= $admin['foto_admin'] ?>" class="img-circle d-lg-flex justify-content-lg-center align-items-lg-center" src="assets/images/admin/<?= $admin['foto_admin'] ?>" style=" width: 150px;height: 150px;" /></div>
            </div>
            <div class="row " style="margin-top: 10px;">
              <div class="col d-lg-flex justify-content-lg-center align-items-lg-center">
                <h2>Welcome,</h2>
                <div class="clearfix"></div>
                <h2><?= $admin['nama_admin'] ?></h2>
              </div>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!--SIDEBAR-->
          <?php
          include('setting_navbar.php')
          ?>
        </div>
      </div>

      <!-- top navigation -->
      <div class=" top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open">
                <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="assets/images/admin/<?= $admin['foto_admin'] ?>" alt=""><?= $admin['nama_admin'] ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?page=edit_profile&id=<?= $admin['email_admin'] ?>"> Profile</a>
                  <a class="dropdown-item" href="../index.php" target="_blank">
                    <span>Cek Website</span>
                  </a>
                  <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content - HALAMAN UTAMA ISI DISINI -->
      <div class="right_col" role="main">
        <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
          case 'tampil_produk':
            # code...
            include 'module/module_product/tampil.php';
            break;
          case 'tambah_produk':
            # code...
            include 'module/module_product/tambah.php';
            break;
          case 'edit_produk':
            # code...
            include 'module/module_product/edit.php';
            break;
          case 'edit_produk_save':
            # code...
            include 'module/module_product/edit.php';
            break;

          case 'tampil_galeri':
            # code...
            include 'module/module_galeri/tampil.php';
            break;
          case 'tambah_galeri':
            # code...
            include 'module/module_galeri/tambah.php';
            break;
          case 'edit_galeri':
            # code...
            include 'module/module_galeri/edit.php';
            break;
          case 'edit_galeri_save':
            # code...
            include 'module/module_galeri/edit.php';
            break;

          case 'tampil_team':
            # code...
            include 'module/module_team/tampil.php';
            break;
          case 'tambah_team':
            # code...
            include 'module/module_team/tambah.php';
            break;
          case 'edit_team':
            # code...
            include 'module/module_team/edit.php';
            break;
          case 'edit_team_save':
            # code...
            include 'module/module_team/edit.php';
            break;

          case 'edit_setting':
            # code...
            include 'module/module_setting/edit.php';
            break;
          case 'edit_setting_save':
            # code...
            include 'module/module_setting/edit.php';
            break;

          case 'edit_profile':
            # code...
            include 'module/module_profile/edit.php';
            break;
          case 'edit_profile_save':
            # code...
            include 'module/module_profile/edit.php';
            break;

          case 'tampil_admin':
            # code...
            include 'module/module_admin/tampil.php';
            break;
          case 'tambah_admin':
            # code...
            include 'module/module_admin/tambah.php';
            break;

          default:
            #code...
            include 'home.php';
            break;
        }
        ?>
      </div>
      <!-- /page content -->
      <?php
      include('setting_footer.php')
      ?>
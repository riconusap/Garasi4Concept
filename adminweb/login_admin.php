<?php
//abaikan error yang muncul pada browser
error_reporting(0);
//sesi dimulai
session_start();
//panggil koneksi.php untuk menghubungkan ke database
include "koneksi.php";

//jika sesi sudah admin (sudah pernah login)  maka akan  di direct ke halaman home.php
if (isset($_SESSION["data_admin"]) && isset($_SESSION["data_admin_super"])) {
  header("location:");
}

// function input terdapat di file koneksi.php

$user = mysqli_real_escape_string($conect, $_POST['email_admin']);
$pass = mysqli_real_escape_string($conect, $_POST['password_admin']);
$pass_md5 = md5($pass);

if (isset($_POST['login'])) {
  if ($user == "") {
    $er_email = "<div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Username Kosong !</strong> <br> Username wajib diisi</div>";
  } else if ($pass == "") {
    $er_pass = "<div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Password Kosong !</strong> <br> Password Wajib diisi</div>";
  } else {
    //cek apakah username terdaftar atau tidak di tb_admin
    $sql_cek = mysqli_query($conect, "SELECT * FROM tb_admin where email_admin='$user' and password_admin='$pass_md5'");
    $cek_admin = mysqli_num_rows($sql_cek);
    if ($cek_admin == "0") {
      //jika username dan password tidak terdaftar di tb_admin
      $er_email = "<div class='alert alert-danger alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button><strong>Login Gagal !</strong> <br>Username dan Password tidak valid</div>";
      //jika username dan password terdaftar di tb_admin maka akan menuju halaman home.php
    } else {
      $row = mysqli_fetch_assoc($sql_cek);
      if ($row['level_admin'] == "Super Admin") {
        $_SESSION['data_admin_super'] = $user;
        echo "<script>alert('Welcome ! Anda Masuk Sebagai Super Admin !');document.location='index.php'</script>";
      } else {
        $_SESSION['data_admin'] = $user;
        echo "<script>alert('Welcome ! Anda Masuk Sebagai Admin');document.location='index.php'</script>";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | GARASI4CONCEPT</title>
  <link rel="Shortcut Icon" href="<?php echo $hostname; ?>assets/images/navbrand.svg" type="image/x-icon" />
  <!-- Bootstrap core CSS -->
  <link href="<?php echo $hostname; ?>assets/css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles template ini-->
  <link href="<?php echo $hostname; ?>assets/css/styles.css" rel="stylesheet">
  <!-- Custom Fonts Awesome-->
  <link href="<?php echo $hostname; ?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container">
    <!-- start container -->
    <div class="row">
      <!-- start row -->
      <div class="col-lg-12">
        <!-- start col lg 12-->
        <div class="login">
          <!-- start class login -->
          <h1><i class="fa fa-key fa-fw"></i> LOGIN ADMIN</h1>
          <hr>

          <!-- start form login -->
          <form action="" method="post">
            <div class="form-group">
              <!--start form-group-->
              <label>Username</label>
              <div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input type="text" name="email_admin" placeholder="Username" class="form-control" maxlength="40" value="<?php echo $_POST['email_admin']; ?>" autofocus>
              </div>
            </div>
            <!--/form-group-->

            <?php echo $er_email; ?>

            <div class="form-group">
              <!--start form-group-->
              <label>Password</label>
              <div class="input-group  input-group-sm">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span><input id="pass1" type="password" name="password_admin" placeholder="Password" class="form-control" value="<?php echo $_POST['password_admin']; ?>" maxlength="15">
              </div>
            </div>
            <!--/form-group-->
            <?php echo $er_pass; ?>

            <hr>
            <button class="btn btn-primary btn-sm btn-block" type="submit" name="login">Log In</button>
          </form>
          <!-- end form login -->
        </div><!-- end class login -->
      </div><!-- end col lg 12 -->
    </div><!-- end row -->
  </div><!-- end container -->

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo $hostname; ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo $hostname; ?>/assets/js/bootstrap.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="<?php echo $hostname; ?>/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
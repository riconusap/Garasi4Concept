<?php
//session dimulai
session_start();
//abaikan error pada browser
error_reporting(0);
//panggil file koneksi untuk mengkoneksinkan dengan database
include "koneksi.php";
//panggil file security untuk mengecek session admin
include "security.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/setting/icon.svg" type="image/ico" />

  <title> Sistem Admin Garasi4Concept </title>

  <!-- Bootstrap -->
  <link href="<?php echo $hostname; ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo $hostname; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo $hostname; ?>assets/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo $hostname; ?>assets/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="<?php echo $hostname; ?>assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo $hostname; ?>assets/css/custom.min.css" rel="stylesheet">
</head>
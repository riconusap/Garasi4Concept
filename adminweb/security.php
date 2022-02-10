<?php

//jika session tidak sesuai dengan data_admin  maka akan diarahkan ke halaman logout.php atau keluar dari sistem
if (isset($_SESSION['data_admin']) || isset($_SESSION['data_admin_super'])) {
        if (isset($_SESSION['data_admin'])) {
                $akun = $_SESSION['data_admin'];
                $admin = mysqli_fetch_array(mysqli_query($conect, "SELECT * FROM tb_admin where email_admin='$akun'"));
        } else {
                $akun = $_SESSION['data_admin_super'];
                $admin = mysqli_fetch_array(mysqli_query($conect, "SELECT * FROM tb_admin where email_admin='$akun' AND level_admin='Super Admin'"));
        }
} else {
        //jika session sesuai maka session akan digunakan untuk memanggil data dari tb_admin
        header('location:logout.php');
}

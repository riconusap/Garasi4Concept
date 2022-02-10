<?php
//set time zone location sesuai negara, jadikan Asia Jakarta
date_default_timezone_set('Asia/Jakarta');

//**************************start koneksi ***************************//

//set koneksi ke server sesuai host, user, password dan database
$server = "sql302.epizy.com";
$user = "epiz_27543323";
$pass = "wUE4q8yFa1du";
$database = "epiz_27543323_garasi";

//koneksikan ke server
$conect = mysqli_connect($server, $user, $pass, $database) or die('Error Connection Network');

// **************************end koneksi *********************************//

//*********************pengaturan lainnya*****************************//

//buat parameter untuk mempercepat penulisan url misal

$hostname = "http://garasi4concept.42web.io/adminweb/";
$abspath = $_SERVER['DOCUMENT_ROOT'];
$newpath = $abspath . '/garasirev2/assets/images/';

$path_product = $abspath . '/adminweb/assets/images/product/';
$path_galeri = $abspath . '/adminweb/assets/images/galeri/';
$path_team = $abspath . '/adminweb/assets/images/team/';
$path_setting = $abspath . '/adminweb/assets/images/setting/';
$path_admin = $abspath . '/adminweb/assets/images/admin/';

<?php
$hasil_produk = mysqli_query($conect, "SELECT * FROM produk");
$hasil_galeri = mysqli_query($conect, "SELECT * FROM gambar");
$hasil_team = mysqli_query($conect, "SELECT * FROM team");
$hasil_setting = mysqli_query($conect, "SELECT * FROM setting");

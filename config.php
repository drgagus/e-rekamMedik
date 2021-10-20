<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "rekammedis";
$db = mysqli_connect($server, $user, $password, $nama_database);

mysqli_connect($server, $user, $password, $nama_database);
mysqli_select_db($db,$nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>

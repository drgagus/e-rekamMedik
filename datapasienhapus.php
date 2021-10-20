<?php
include ("config.php") ;

if( isset($_GET['nik']) ){

    $nik = (int)$_GET['nik'];
    $sql = "DELETE FROM datapasien WHERE nik='$nik' ";
    $querydel = mysqli_query($db, $sql);
    header('Location: pendaftaran.php');
   
} else {
    header('Location: pendaftaran.php');
}
	
?>
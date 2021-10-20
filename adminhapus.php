<?php
include ("config.php") ;
if( isset($_GET['user']) ){

    $user = mysqli_real_escape_string($db,$_GET['user']);
    $sql = "DELETE FROM userpass WHERE pengguna='$user' ";
    $querydel = mysqli_query($db, $sql);
    header('Location: admin.php');
} else {
    header('Location: admin.php');
}
	
?>
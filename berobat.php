<?php
include("config.php");
if(isset($_POST["berobat"])){
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
	$norm = $_POST["norm"];
	
	$sqlcek = "SELECT * FROM pasienhariini";
	$querycek = mysqli_query($db,$sqlcek);
	$jumlah = mysqli_num_rows($querycek);
	$noantri = $jumlah + 1;
	
	$sqlpasien = "INSERT INTO pasienhariini ( noantri, nik, norm, nama) values ('$noantri', '$nik', '$norm', '$nama') ";
	$querypasien = mysqli_query ($db, $sqlpasien) ;
	$sqlinsert = "INSERT INTO ruangtunggu ( noantri, nik, norm, nama) values ( '$noantri', '$nik', '$norm', '$nama') ";
	$queryinsert = mysqli_query ($db, $sqlinsert) ;
	
	if( $queryinsert ) {    
        header("Location: pasienhariini.php");
    } else {
         header("Location: datapasienview.php?nik=$nik");
    }

}else{
	header("Location: datapasienview.php?nik=$nik");
}
?>
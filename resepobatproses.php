<?php
include("config.php");

if (isset($_POST['obatkeluar'])) {
	$nik = $_POST['nik'] ;
	$nama = $_POST['nama'] ;
	$tanggal = $_POST['tanggal'] ;
	$poli = $_POST['poli'];
	$nakes = $_POST['nakes'];
	$apoteker = $_POST['apoteker'] ;
	$obat1=$_POST['namaobat1'];
	$jumlah1=$_POST['jumlahobat1'];
	$obat2=$_POST['namaobat2'];
	$jumlah2=$_POST['jumlahobat2'];
	$obat3=$_POST['namaobat3'];
	$jumlah3=$_POST['jumlahobat3'];
	$obat4=$_POST['namaobat4'];
	$jumlah4=$_POST['jumlahobat4'];
	$obat5=$_POST['namaobat5'];
	$jumlah5=$_POST['jumlahobat5'];
	$sql= "INSERT INTO pengeluaranobat ( nik, nama, tanggal, poli, nakes, obat1, jumlah1, obat2, jumlah2, obat3, jumlah3, obat4, jumlah4, obat5, jumlah5, apoteker) VALUES ('$nik', '$nama', '$tanggal', '$poli', '$nakes', '$obat1', '$jumlah1', '$obat2', '$jumlah2', '$obat3', '$jumlah3', '$obat4', '$jumlah4', '$obat5', '$jumlah5', '$apoteker') " ;

	if (isset($_POST['namaobat1'])) {
		$obat1 = $_POST["namaobat1"];
		$jumlah1 = $_POST["jumlahobat1"] ;
		$sqlobat1 = " SELECT * from stockobat where namaobat='$obat1'";
		$queryobat1 = mysqli_query ($db, $sqlobat1) ;
		$stockobat1 = mysqli_fetch_array ( $queryobat1 ) ;
		$stocklamaobat1 = $stockobat1['stock'] ;
		$stockbaruobat1 = $stocklamaobat1 - $jumlah1 ;
		$sqluobt1 = "UPDATE stockobat SET stock='$stockbaruobat1' where namaobat='$obat1' " ;
		$queryuobt1 = mysqli_query ($db, $sqluobt1) ;
	}
	
	if (isset($_POST['namaobat2'])) {
		$obat2 = $_POST["namaobat2"];
		$jumlah2 = $_POST["jumlahobat2"] ;
		$sqlobat2 = " SELECT * from stockobat where namaobat='$obat2'";
		$queryobat2 = mysqli_query ($db, $sqlobat2) ;
		$stockobat2 = mysqli_fetch_array ( $queryobat2 ) ;
		$stocklamaobat2 = $stockobat2['stock'] ;
		$stockbaruobat2 = $stocklamaobat2 - $jumlah2 ;
		$sqluobt2 = "UPDATE stockobat SET stock='$stockbaruobat2' where namaobat='$obat2' " ;
		$queryuobt2 = mysqli_query ($db, $sqluobt2) ;
	}
	
	if (isset($_POST['namaobat3'])) {
		$obat3 = $_POST["namaobat3"];
		$jumlah3 = $_POST["jumlahobat3"] ;
		$sqlobat3 = " SELECT * from stockobat where namaobat='$obat3'";
		$queryobat3 = mysqli_query ($db, $sqlobat3) ;
		$stockobat3 = mysqli_fetch_array ( $queryobat3 ) ;
		$stocklamaobat3 = $stockobat3['stock'] ;
		$stockbaruobat3 = $stocklamaobat3 - $jumlah3 ;
		$sqluobt3 = "UPDATE stockobat SET stock='$stockbaruobat3' where namaobat='$obat3' " ;
		$queryuobt3 = mysqli_query ($db, $sqluobt3) ;
	}
	
	if (isset($_POST['namaobat4'])) {
		$obat4 = $_POST["namaobat4"];
		$jumlah4 = $_POST["jumlahobat4"] ;
		$sqlobat4 = " SELECT * from stockobat where namaobat='$obat4'";
		$queryobat4 = mysqli_query ($db, $sqlobat4) ;
		$stockobat4 = mysqli_fetch_array ( $queryobat4 ) ;
		$stocklamaobat4 = $stockobat4['stock'] ;
		$stockbaruobat4 = $stocklamaobat4 - $jumlah4 ;
		$sqluobt4 = "UPDATE stockobat SET stock='$stockbaruobat4' where namaobat='$obat4' " ;
		$queryuobt4 = mysqli_query ($db, $sqluobt4) ;
	}
	
	if (isset($_POST['namaobat5'])) {
		$obat5 = $_POST["namaobat5"];
		$jumlah5 = $_POST["jumlahobat5"] ;
		$sqlobat5 = " SELECT * from stockobat where namaobat='$obat5'";
		$queryobat5 = mysqli_query ($db, $sqlobat5) ;
		$stockobat5 = mysqli_fetch_array ( $queryobat5 ) ;
		$stocklamaobat5 = $stockobat5['stock'] ;
		$stockbaruobat5 = $stocklamaobat5 - $jumlah5 ;
		$sqluobt5 = "UPDATE stockobat SET stock='$stockbaruobat5' where namaobat='$obat5' " ;
		$queryuobt5 = mysqli_query ($db, $sqluobt5) ;
	}
				
	$queryi = mysqli_query($db, $sql);
		if( $queryi ) {
			header('Location: antrianapotek.php');
		} else {
			header('Location: resepobat.php?nik=".$nik."');
		}
}else {
			header('Location: resepobat.php?nik=".$nik."');
}
?>
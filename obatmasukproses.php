<?php 
include("config.php");

if(isset($_POST["kurang"])) {
	$obat = $_POST["namaobat"];
	$kurang = $_POST["jumlah"] ;
	$sqls = " SELECT * from stockobat where namaobat='$obat'";
	$querys = mysqli_query ($db, $sqls) ;
	
		$stockobat = mysqli_fetch_array ( $querys ) ;
		$namaobat = $stockobat['namaobat'] ;
		$stocklama = $stockobat['stock'] ;
		$stockbaru = $stocklama + $kurang ;
		
		$sqlu = "UPDATE stockobat SET stock='$stockbaru' where namaobat='$namaobat' " ;
		$queryu = mysqli_query ($db, $sqlu) ;
	
			if ($queryu) {
				header('Location: stockobat.php');
			} else {
				header('Location: obatmasuk.php?namaobat=".$namaobat."');
			}
	
	} else {
	header('Location: stockobat.php');
}
?>
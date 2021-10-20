<?php
include ("config.php");
if (isset($_POST['hapusdaftar'])){
	$pasienhariini = "DELETE FROM pasienhariini" ;
	$querypasienhariini = mysqli_query( $db, $pasienhariini);
	
	$ruangtunggu = "DELETE FROM ruangtunggu" ;
	$queryruangtunggu = mysqli_query( $db, $ruangtunggu);
	
	$ruangtunggupoli = "DELETE FROM ruangtunggupoli" ;
	$queryruangtunggupoli = mysqli_query( $db, $ruangtunggupoli);
	
	$sqltrunruangtunggupoli = "TRUNCATE TABLE ruangtunggupoli";
	$querytrunruangtunggupoli = mysqli_query( $db, $sqltrunruangtunggupoli);
	
	$ruangtunggulab = "DELETE FROM ruangtunggulab" ;
	$queryruangtunggulab = mysqli_query( $db, $ruangtunggulab);
	
	$sqltrunruangtunggulab = "TRUNCATE TABLE ruangtunggulab";
	$querytrunruangtunggulab = mysqli_query( $db, $sqltrunruangtunggulab);
	
	$ruangtungguapotek = "DELETE FROM ruangtungguapotek" ;
	$queryruangtungguapotek = mysqli_query( $db, $ruangtungguapotek);
	
	$periksaawal = "DELETE FROM pemeriksaanawal" ;
	$queryperiksaawal = mysqli_query( $db, $periksaawal);
	header ('Location: pasienhariini.php');
}else{
	header ('Location: pendaftaran.php');
}

?>
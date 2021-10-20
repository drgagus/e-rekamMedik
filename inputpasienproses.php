<?php
include("config.php");
if(isset($_POST["inputpasien"])){
	
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
	$kk = $_POST["kk"] ;
	$kepalakeluarga = $_POST["kepalakeluarga"] ;
	$tempatlahir = $_POST["tempatlahir"] ;
	$tgllahir = $_POST["tgllahir"] ;
    $jeniskelamin = $_POST["jeniskelamin"];
    $status = $_POST["status"];
    $agama = $_POST["agama"];
    $pendidikan = $_POST["pendidikan"];
    $pekerjaan = $_POST["pekerjaan"];
    $alamat = $_POST["alamat"];
	$rt = $_POST["rt"] ;
	$rw = $_POST["rw"] ;
	$desakelurahan = $_POST["desakelurahan"] ;
    $nohape = $_POST["nohape"];
    $katpas = $_POST["katpas"];
	$nokartu = $_POST["nokartu"];
	
	$cekkksql = " select * from norekammedis WHERE kk='$kk' " ;
	$cekkkquery = mysqli_query( $db , $cekkksql) ;
	$normkk = mysqli_num_rows($cekkkquery);
	$pasien = mysqli_fetch_array($cekkkquery) ; 
	
	if ($normkk >= 1){
		$norm = $pasien['norm'] ;
	}else{
		$ceksql = "SELECT * FROM norekammedis where desakelurahan='$desakelurahan'" ;
		$cekquery = mysqli_query( $db , $ceksql) ;
		$jumlah = mysqli_num_rows($cekquery);
		
		if ($desakelurahan == "Desa Kelarik") {
			$norm = 16010000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Kelarik Utara") {
			$norm = 16020000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Kelarik Air Mali") {
			$norm = 16030000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Kelarik Barat") {
			$norm = 16040000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Gunung Durian") {
			$norm = 16050000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Teluk Buton") {
			$norm = 16060000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Belakang Gunung") {
			$norm = 16070000 + $jumlah + 1 ;
		}elseif ($desakelurahan == "Desa Seluan Barat") {
			$norm = 16080000 + $jumlah + 1 ;
		}else{
			$norm = 16000000 + $jumlah + 1 ;
		}
	}
	
	$sqlrm = "INSERT INTO norekammedis ( norm, kk, kepalakeluarga, desakelurahan) VALUES ('$norm', '$kk', '$kepalakeluarga', '$desakelurahan')" ;
	$queryrm = mysqli_query($db, $sqlrm);
	
	$sqlinsert = "INSERT INTO datapasien ( norm, nik, nama, kk, kepalakeluarga, tempatlahir, tgllahir, jeniskelamin, status, agama, pendidikan, pekerjaan, alamat, rt, rw, desakelurahan, nohape, katpas, nokartu) values ( '$norm', '$nik', '$nama', '$kk', '$kepalakeluarga', '$tempatlahir', '$tgllahir', '$jeniskelamin', '$status', '$agama', '$pendidikan', '$pekerjaan', '$alamat', '$rt', '$rw', '$desakelurahan', '$nohape', '$katpas', '$nokartu') ";
	$queryinsert = mysqli_query ($db, $sqlinsert) ;
	
	if( $queryinsert ) {    
        header('Location: pendaftaran.php');
    } else {
         header('Location: inputpasien.php');
    }
  
} else {
    header('Location: inputpasien.php');
}

?>

<?php

include("config.php");
if(isset($_POST['simpan'])){

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

    $sql = "UPDATE datapasien SET nama='$nama', kepalakeluarga='$kepalakeluarga', kk='$kk', tempatlahir='$tempatlahir', tgllahir= '$tgllahir', jeniskelamin='$jeniskelamin', status='$status', agama='$agama', pendidikan='$pendidikan', pekerjaan='$pekerjaan', alamat='$alamat', desakelurahan='$desakelurahan', rt='$rt', rw='$rw', nohape='$nohape', katpas='$katpas', nokartu='$nokartu' WHERE nik=$nik ";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: datapasienview.php?nik='.$nik.'');
    } else {
        header('Location: datapasienedit.php?nik='.$nik.'');
    }

} else {
    header('Location: pendaftaran.php');
}

?>
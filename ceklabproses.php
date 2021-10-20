<?php
include("config.php");
if(isset($_POST["ceklab"])){
	
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
	$norm = $_POST["norm"];
	$poli = $_POST["poli"];
	$nakes = $_POST["nakes"];
	$tanggal = $_POST["tanggal"] ;
	$hb = $_POST["hb"] ;
	$leukosit = $_POST["leukosit"] ;
	$trombosit = $_POST["trombosit"] ;
    $haematokrit = $_POST["haematokrit"];
    $hcgtest = $_POST["hcgtest"];
    $golongandarah = $_POST["golongandarah"];
    $dengue = $_POST["dengue"];
    $antihiv = $_POST["antihiv"];
    $urinerutin = $_POST["urinerutin"];
	$urinelengkap = $_POST["urinelengkap"] ;
	$cholesterol = $_POST["cholesterol"] ;
	$asamurat = $_POST["asamurat"] ;
	$guladarahsewaktu = $_POST["guladarahsewaktu"];
    $guladarahpuasa = $_POST["guladarahpuasa"];
	$guladarahpostprandia = $_POST["guladarahpostprandia"];
	$malaria = $_POST["malaria"];
	$sewaktu = $_POST["sewaktu"];
	$pagi = $_POST["pagi"];
	
	$sqlinsert = "INSERT INTO ceklab ( nik, nama, poli, nakes, tanggal, hb, leukosit, trombosit, haematokrit, hcgtest, golongandarah, dengue, antihiv, urinerutin, urinelengkap, cholesterol, asamurat, guladarahsewaktu, guladarahpuasa, guladarahpostprandia, malaria, sewaktu, pagi) values ( '$nik', '$nama', '$poli', '$nakes', '$tanggal', '$hb', '$leukosit', '$trombosit', '$haematokrit', '$hcgtest', '$golongandarah', '$dengue', '$antihiv', '$urinerutin', '$urinelengkap', '$cholesterol', '$asamurat', '$guladarahsewaktu', '$guladarahpuasa', '$guladarahpostprandia', '$malaria', '$sewaktu', '$pagi') ";
	$queryinsert = mysqli_query ($db, $sqlinsert) ;
	
	$sqlantri = "INSERT INTO ruangtunggulab (norm, nik, nama, poli) VALUES ('$norm', '$nik', '$nama','$poli') " ;
	$queryantri = mysqli_query($db, $sqlantri);
	
	if( $queryinsert ) {    
        header('Location: close.php');
    } else {
        header('Location: ceklab.php?nik='.$nik.'');
    }
  
} else {
     header('Location: ceklab.php?nik='.$nik.'');
}

?>

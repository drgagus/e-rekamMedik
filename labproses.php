<?php
include("config.php");
if(isset($_POST["inputhasil"])){
	
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
	$poli = $_POST["poli"];
	$nakes = $_POST["nakes"];
	$tanggal = $_POST["tanggal"] ;
	$hb = $_POST["hb2"] ;
	$leukosit = $_POST["leukosit2"] ;
	$trombosit = $_POST["trombosit2"] ;
    $haematokrit = $_POST["haematokrit2"];
    $hcgtest = $_POST["hcgtest2"];
    $golongandarah = $_POST["golongandarah2"];
    $dengue = $_POST["dengue2"];
    $antihiv = $_POST["antihiv2"];
    $urinerutin = $_POST["urinerutin2"];
	$urinelengkap = $_POST["urinelengkap2"] ;
	$cholesterol = $_POST["cholesterol2"] ;
	$asamurat = $_POST["asamurat2"] ;
	$guladarahsewaktu = $_POST["guladarahsewaktu2"];
    $guladarahpuasa = $_POST["guladarahpuasa2"];
	$guladarahpostprandia = $_POST["guladarahpostprandia2"];
	$malaria = $_POST["malaria2"];
	$sewaktu = $_POST["sewaktu2"];
	$pagi = $_POST["pagi2"];
	$ankes = $_POST["ankes"];
	
	$sqlinsert = "INSERT INTO hasillab ( nik, nama, poli, nakes, tanggal, hb, leukosit, trombosit, haematokrit, hcgtest, golongandarah, dengue, antihiv, urinerutin, urinelengkap, cholesterol, asamurat, guladarahsewaktu, guladarahpuasa, guladarahpostprandia, malaria, sewaktu, pagi, ankes) values ( '$nik', '$nama', '$poli', '$nakes', '$tanggal', '$hb', '$leukosit', '$trombosit', '$haematokrit', '$hcgtest', '$golongandarah', '$dengue', '$antihiv', '$urinerutin', '$urinelengkap', '$cholesterol', '$asamurat', '$guladarahsewaktu', '$guladarahpuasa', '$guladarahpostprandia', '$malaria', '$sewaktu', '$pagi', '$ankes') ";
	$queryinsert = mysqli_query ($db, $sqlinsert) ;
	
	$sqldel = "DELETE FROM ruangtunggulab WHERE nik='$nik' ";
	$querydel = mysqli_query($db, $sqldel);
				
	if( $queryinsert ) {    
        header('Location: laboratorium.php');
    } else {
        header('Location: lab.php?nik='.$nik.'');
    }
  
} else {
     header('Location: laboratorium.php');
}

?>
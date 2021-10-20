
<?php
include("config.php");

if(isset($_POST['PERAWATAN'])){

	$nik = $_POST["nik"];
	$nama = $_POST["nama"];
	$gigi11 = $_POST["gigi11"];
	$gigi12 = $_POST["gigi12"];
	$gigi13 = $_POST["gigi13"];
	$gigi14 = $_POST["gigi14"];
	$gigi15 = $_POST["gigi15"];
	$gigi16 = $_POST["gigi16"];
	$gigi17 = $_POST["gigi17"];
	$gigi18 = $_POST["gigi18"];
	$gigi21 = $_POST["gigi21"];
	$gigi22 = $_POST["gigi22"];
	$gigi23 = $_POST["gigi23"];
	$gigi24 = $_POST["gigi24"];
	$gigi25 = $_POST["gigi25"];
	$gigi26 = $_POST["gigi26"];
	$gigi27 = $_POST["gigi27"];
	$gigi28 = $_POST["gigi28"];
	$gigi31 = $_POST["gigi31"];
	$gigi32 = $_POST["gigi32"];
	$gigi33 = $_POST["gigi33"];
	$gigi34 = $_POST["gigi34"];
	$gigi35 = $_POST["gigi35"];
	$gigi36 = $_POST["gigi36"];
	$gigi37 = $_POST["gigi37"];
	$gigi38 = $_POST["gigi38"];
	$gigi41 = $_POST["gigi41"];
	$gigi42 = $_POST["gigi42"];
	$gigi43 = $_POST["gigi43"];
	$gigi44 = $_POST["gigi44"];
	$gigi45 = $_POST["gigi45"];
	$gigi46 = $_POST["gigi46"];
	$gigi47 = $_POST["gigi47"];
	$gigi48 = $_POST["gigi48"];
	$periodontal = $_POST["periodontal"];
	$karanggigi = $_POST['karanggigi'];
	$sikatgigi = $_POST['sikatgigi'];
	$indeb16 = $_POST['indeb16'];
	$indeb11 = $_POST['indeb11'];
	$indeb26 = $_POST['indeb26'];
	$indeb46 = $_POST['indeb46'];
	$indeb31 = $_POST['indeb31'];
	$indeb36 = $_POST['indeb36'];
	$inkal16 = $_POST['inkal16'];
	$inkal11 = $_POST['inkal11'];
	$inkal26 = $_POST['inkal26'];
	$inkal46 = $_POST['inkal46'];
	$inkal31 = $_POST['inkal31'];
	$inkal36 = $_POST['inkal36'];
	$ohis = ($indeb16 + $indeb11 + $indeb26 + $indeb36 + $indeb31 + $indeb46 + $inkal16 + $inkal11 + $inkal26 + $inkal46 +$inkal31 + $inkal36)/6 ;
    
	$sql = "INSERT INTO odontogram (nik, nama, gigi11, gigi12, gigi13, gigi14, gigi15, gigi16, gigi17, gigi18, gigi21, gigi22, gigi23, gigi24, gigi25, gigi26, gigi27, gigi28, gigi31, gigi32, gigi33, gigi34, gigi35, gigi36, gigi37, gigi38, gigi41, gigi42, gigi43, gigi44, gigi45, gigi46, gigi47, gigi48, periodontal, karanggigi, sikatgigi, ohis) VALUES ('$nik', '$nama', '$gigi11', '$gigi12', '$gigi13', '$gigi14', '$gigi15', '$gigi16', '$gigi17', '$gigi18', '$gigi21', '$gigi22', '$gigi23', '$gigi24', '$gigi25', '$gigi26', '$gigi27', '$gigi28', '$gigi31', '$gigi32', '$gigi33', '$gigi34', '$gigi35', '$gigi36', '$gigi37', '$gigi38', '$gigi41', '$gigi42', '$gigi43', '$gigi44', '$gigi45', '$gigi46', '$gigi47', '$gigi48', '$periodontal', '$karanggigi', '$sikatgigi', '$ohis')" ;
	$queryi = mysqli_query($db, $sql);

    if( $queryi ) {
        header('Location: polidrg.php?nik='.$nik.'');
    } else {
        header('Location: polidrg.php?nik='.$nik.'');
    }


} else {
    header('Location: polidrg.php?nik='.$nik.'');
}

?>

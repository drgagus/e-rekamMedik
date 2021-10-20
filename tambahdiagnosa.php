<html>
<head>
		<title>DIAGNOSA BARU</TITLE>
</head>
<header>
		<h3><b>DIAGNOSA BARU</b><h3>
</header>
<body
background="blue.jpg">

<table>
<form action="tambahdiagnosa.php" method="POST">
<tr><td><label>DIAGNOSA :</label></td><td><input type="text" name="diagnosa" required/></td></tr>
<tr><td></td><td><input type="submit" name="masuk" value="MASUK" /></td></tr>
</FORM>

<?php
include("config.php");

if (isset($_POST['masuk'])) {
	$diagnosa=$_POST['diagnosa'];
	$sql= "INSERT INTO daftardiagnosa (diagnosa) VALUES ('$diagnosa') " ;
	$queryi = mysqli_query($db, $sql);
		if( $queryi ) {
			header('Location: tambahdiagnosa.php');
		} else {
			
		}
} else {
    
}
?>
</body>
</html>
<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "pendaftaran"){
						header("location:pendaftaran.php");
					}elseif ($_SESSION['posisi'] == "nurse"){
						header("location:pemeriksaan.php");
					}elseif ($_SESSION['posisi'] == "dokterumum"){
						header("location:poliumum.php");
					}elseif ($_SESSION['posisi'] == "doktergigi"){
						header("location:poligigi.php");
					}elseif ($_SESSION['posisi'] == "bidan"){
						header("location:polikia.php");
					}elseif ($_SESSION['posisi'] == "analiskesehatan"){
						header("location:laboratorium.php");
					}elseif ($_SESSION['posisi'] == "apoteker" or  $_SESSION['posisi'] == "drgpython" ){
					}elseif ($_SESSION['posisi'] == "dokterugd"){
						header("location:ugd.php");
					}else{
						header("location:index.php");
					}
?>
<html oncontextmenu='return false;' ondragstart='return false;' onselectstart='return false;'>
<head>
<title>APOTEK - OBAT KELUAR</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">

<script>
document.onkeydown = function(e) {
	if (e.ctrlKey && 
		(e.keyCode == 65 ||
		 e.keyCode == 67 || 
		 e.keyCode == 83 ||
		 e.keyCode == 86 || 
		 e.keyCode == 85 || 		 
		 e.keyCode == 117 )) {
		alert ('dilarang!!!') ;
		return false;
	}else {
		return true ;
	}
} ;
</script>
<form action="indexproses.php" method="POST">
<input type="submit" name="keluar" value="LOGOUT" style="background:red; color:yellow"; />
</form>
<form action="menu.php" method="POST" >
<input type="submit" name="pendaftaran" value="PENDAFTARAN" Style="WIDTH:150; color:blue"; /> 
<input type="submit" name="pemeriksaan" value="PEMERIKSAAN" Style="WIDTH:150; color:blue"; />  
<input type="submit" name="poliumum" value="POLI UMUM" Style="WIDTH:150; color:blue"; />  
<input type="submit" name="poligigi" value="POLI GIGI" Style="WIDTH:150; color:blue";/>
<input type="submit" name="polikia" value="POLI KIA" Style="WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="background:lime; WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; />  
</form>

<fieldset style="background:lightblue";>
<table>
<tr><td><b><a href='stockobat.php' Style='color:darkblue'; >STOK OBAT</a></b></td><td> - </td><td><b><a href='obatbaru.php' Style='color:darkblue'; >OBAT BARU</a></b></td></tr>
<tr><td></td></tr>
</table>
<table>
<form action="obatkeluarproses.php" method="POST">
<tr><td><label>NAMA OBAT</label></td><td>:</td><td>
<?php 
include("config.php");
    if(isset($_GET['namaobat'])) {    
        $obat = mysqli_real_escape_string($db,$_GET['namaobat']);
		$sql = " SELECT * FROM stockobat WHERE namaobat='$obat' ";
		$query = mysqli_query($db, $sql);
		$daftobat = mysqli_fetch_array($query);
	
	echo $obat ; 
	}else{
	}
	?>
<input type="hidden" name="namaobat" value="<?php 
											include("config.php");
												if(isset($_GET['namaobat'])) {    
													$obat = mysqli_real_escape_string($db,$_GET['namaobat']);
													$sql = " SELECT * FROM stockobat WHERE namaobat='$obat' ";
													$query = mysqli_query($db, $sql);
													$daftobat = mysqli_fetch_array($query);
												
												echo $obat ; 
												}else{
												}
												?>" />
</td></tr>
<tr><td><label>JUMLAH</label></td><td>:</td><td><input type="number" name="jumlah" required/>
<tr><td></td><td></td><td><input type="submit" name="kurang" value="OK" /></td><tr>
</FORM>
</table>
</fieldset>
</body>
</html>
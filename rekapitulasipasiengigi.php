<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "pendaftaran"){
					header("location:pendaftaran.php");
					}elseif ($_SESSION['posisi'] == "nurse"){
						header("location:pemeriksaan.php");
					}elseif ($_SESSION['posisi'] == "dokterumum"){
						header("location:poliumum.php");
					}elseif ($_SESSION['posisi'] == "doktergigi" or  $_SESSION['posisi'] == "drgpython" ){
					}elseif ($_SESSION['posisi'] == "bidan"){
						header("location:polikia.php");
					}elseif ($_SESSION['posisi'] == "analiskesehatan"){
						header("location:laboratorium.php");
					}elseif ($_SESSION['posisi'] == "apoteker"){
						header("location:apotek.php");
					}elseif ($_SESSION['posisi'] == "dokterugd"){
						header("location:ugd.php");
					}else{
						header("location:index.php");
					}
?>
<html oncontextmenu='return false;' ondragstart='return false;' onselectstart='return false;'>
<head>
<title>REKAPITULASI</title>
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
<input type="submit" name="pendaftaran" value="PENDAFTARAN" Style="WIDTH:150; color:blue" /> 
<input type="submit" name="pemeriksaan" value="PEMERIKSAAN" Style="WIDTH:150; color:blue"; />
<input type="submit" name="poliumum" value="POLI UMUM" Style="WIDTH:150; color:blue"; />  
<input type="submit" name="poligigi" value="POLI GIGI" Style="background:lime; WIDTH:150; color:blue";/>
<input type="submit" name="polikia" value="POLI KIA" Style="WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; />
</form>

<fieldset style="background:lightblue";>
<table>
<Tr><td><h3><u>REKAPITULASI PASIEN POLI GIGI</u><h3></td></tr>
</table>
<table>
<form action="laporanpoligigi.php" target='_blank'; method="POST">
<tr><td><label>Bulan</label></td><td><select name="bulan" Style="WIDTH:150" required> 
	<option value="">--pilih bulan--</option>
	<option value="01">JANUARI</option> 
	<option value="02">FEBRUARI</option> 
	<option value="03">MARET</option> 
	<option value="04">APRIL</option> 
	<option value="05">MEI</option> 
	<option value="06">JUNI</option> 
	<option value="07">JULI</option> 
	<option value="08">AGUSTUS</option> 
	<option value="09">SEPTEMBER</option> 
	<option value="10">OKTOBER</option> 
	<option value="11">NOVEMBER</option> 
	<option value="12">DESEMBER</option>
	</select></td></tr>

<tr><td><label>Tahun</label></td><td><select name="tahun" Style="WIDTH:150" required> 
	<option value="">---pilih tahun--</option> 
	<option value="2019">2019</option>
	<option value="2020">2020</option>
	<option value="2021">2021</option>
	<option value="2022">2022</option>		
	<option value="2023">2023</option>
	</select></td></tr>
<tr><td></td><td><input type="submit" name="OK" value="OK" /></td></tr>
</form>
</table>

</fieldset>

</body>
</html>


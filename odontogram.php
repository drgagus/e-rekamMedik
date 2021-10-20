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
<title>POLI GIGI</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">
<?php
include ("config.php");
	if (isset($_GET['nik'])){
		$nik = (int)$_GET['nik'];
		$sqlcek = "SELECT * from odontogram where nik=$nik";
		$querycek = mysqli_query($db,$sqlcek);
		$cek = mysqli_num_rows($querycek);
		if ($cek == 1){
			header ("location:polidrg.php?nik=$nik");
		}else{
		}
	}
?>
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
<input type="submit" name="poligigi" value="POLI GIGI" Style="background:lime; WIDTH:150; color:blue";/>
<input type="submit" name="polikia" value="POLI KIA" Style="WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; />  
</form>

<fieldset style="background:#EEE7DB";>
<table>
<?php 
include("config.php");

if(isset($_GET['nik'])) {
	$nik = (int)$_GET['nik'];
    $sql = " SELECT * FROM datapasien WHERE nik=$nik ";
	$query = mysqli_query($db, $sql);
	$pasien = mysqli_fetch_array($query); 

echo "<tr>";
echo "<td>" ; echo "NO REKAM MEDIS  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo  $pasien['norm']  ; echo "</td>" ;
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NAMA  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['nama'] ;  '</td>';  
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "UMUR  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  
			$lahir = $pasien['tgllahir'] ;
			$tgl_lahir= date('d', strtotime($lahir));
			$bln_lahir= date('m', strtotime($lahir));
			$thn_lahir= date('Y', strtotime($lahir));
			$tgl_today = date('d');
			$bln_today= date('m');
			$thn_today = date('Y');
			
			if ($tgl_today >= $tgl_lahir) {
				$hari = $tgl_today - $tgl_lahir ; 
					if ($bln_today >= $bln_lahir) {
						$bulan = $bln_today - $bln_lahir ;
						$tahun = $thn_today - $thn_lahir ;
					}else if ($bln_today < $bln_lahir) {
						$bulan = ($bln_today + 12 )  - $bln_lahir ;	
						$tahun = ($thn_today - 1 ) - $thn_lahir ;
					}else{ 
					}
			}else if ($tgl_today < $tgl_lahir) {
				$hari = ($tgl_today + 30 )  - $tgl_lahir ;
					if (($bln_today-1) >= $bln_lahir) {
						$bulan = ($bln_today-1) - $bln_lahir ;
						$tahun = $thn_today - $thn_lahir ;
					}else if (($bln_today-1) < $bln_lahir) {
						$bulan = ($bln_today+11) - $bln_lahir ;
						$tahun = ($thn_today-1) - $thn_lahir ;
					}else{
					}
			}else{
			}
			
			$umur = $tahun." tahun ".$bulan." bulan ".$hari." hari" ;
			echo "<td>".$umur."</td>" ;
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "JENIS KELAMIN  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['jeniskelamin'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "ALAMAT  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>"; echo "<td>".$pasien['alamat']." RT/RW ".$pasien['rt']."/".$pasien['rw']." ".$pasien['desakelurahan']."</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "KATEGORI PASIEN  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['katpas'] ; echo "</td>"; 
echo "</tr>";
	
	}else{
}

?>
</table>
</fieldset >
<fieldset style="background:#F5C8BF";>
<center><h3><b style="background:yellow">ODONTOGRAM</B><H3></center>
<table>
<form action="odontogramproses.php" method="post">
	

<input type="hidden" name="nik"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query); 
											$nik = $pasien ['nik'] ;
											echo $nik ;
											}else{
											}
											?>" />
											
<input type="hidden" name="nama"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query); 
											$nama = $pasien ['nama'] ;
											echo $nama ;
											}else{
											}
											?>" />
<table>
	<tr>
	<td><label><b><u>MAXILA</u></label></td><td><td></td></td><td><b><u>MANDIBULA</u></td>
	</tr>
	<tr>
	<td><label>GIGI 11 </label><select type="text" name="gigi11" > <option value="1">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 21 </label><select type="text" name="gigi21"> <option value="1">ada</option> <option value="x"> tidak ada </option></select></td><td Style="WIDTH:37";></td><td><label>GIGI 31 </label><select type="text" name="gigi31"> <option value="1">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 41 </label><select type="text" name="gigi41"> <option value="1">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	<tr>
	<td><label>GIGI 12 </label><select type="text" name="gigi12"> <option value="2">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 22 </label><select type="text" name="gigi22"> <option value="2">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 32 </label><select type="text" name="gigi32"> <option value="2">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 42 </label><select type="text" name="gigi42"> <option value="2">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	<tr>
	<td><label>GIGI 13 </label><select type="text" name="gigi13"> <option value="3">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 23 </label><select type="text" name="gigi23"> <option value="3">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 33 </label><select type="text" name="gigi33"> <option value="3">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 43 </label><select type="text" name="gigi43"> <option value="3">ada</option> <option value="x"> tidak ada </option></select></td><td>
	</tr>
	<tr>
	<td><label>GIGI 14 </label><select type="text" name="gigi14"> <option value="4">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 24 </label><select type="text" name="gigi24"> <option value="4">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 34 </label><select type="text" name="gigi34"> <option value="4">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 44 </label><select type="text" name="gigi44"> <option value="4">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	<tr>
	<td><label>GIGI 15 </label><select type="text" name="gigi15"> <option value="5">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 25 </label><select type="text" name="gigi25"> <option value="5">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 35 </label><select type="text" name="gigi35"> <option value="5">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 45 </label><select type="text" name="gigi45"> <option value="5">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	<tr>
	<td><label>GIGI 16 </label><select type="text" name="gigi16"> <option value="6">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 26 </label><select type="text" name="gigi26"> <option value="6">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 36 </label><select type="text" name="gigi36"> <option value="6">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 46 </label><select type="text" name="gigi46"> <option value="6">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	<tr>
	<td><label>GIGI 17 </label><select type="text" name="gigi17"> <option value="7">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 27 </label><select type="text" name="gigi27"> <option value="7">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 37 </label><select type="text" name="gigi37"> <option value="7">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 47 </label><select type="text" name="gigi47"> <option value="7">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	<tr>
	<td><label>GIGI 18 </label><select type="text" name="gigi18"> <option value="8">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 28 </label><select type="text" name="gigi28"> <option value="8">ada</option> <option value="x"> tidak ada </option></select></td><td></td><td><label>GIGI 38 </label><select type="text" name="gigi38"> <option value="8">ada</option> <option value="x"> tidak ada </option></select></td><td><label>GIGI 48 </label><select type="text" name="gigi48"> <option value="8">ada</option> <option value="x"> tidak ada </option></select></td>
	</tr>
	
</table>

<table>
	<p>
	<tr>
	<td><label>PERIODONTAL</LABEL></td><td>:</td><td> <select name="periodontal" style="width:120"><option value="SEHAT">SEHAT</option><option value="GINGIVITIS">GINGIVITIS</option></select></td>
	</tr>
	</p>
	<p>
	<tr>
	<td><label>KARANG GIGI</label></td><td>:</td><td><select name="karanggigi" style="width:120"><option value="TIDAK ADA">TIDAK ADA</option><option value="ADA">ADA</option> </select></td>
	</tr>
	</p>
	<p>
	<tr>
	<td><label>MENYIKAT GIGI</label></td><td>:</td><td><select name="sikatgigi" style="width:120"><option value="1x sehari">1x SEHARI</option><option value="2x sehari">2x SEHARI</option><option value="3x sehari">3x SEHARI</option> <option value="tidak tentu">TIDAK TENTU</option></select></td>
	</tr>
	</p>
</table>

<table>
	<p>
	<tr>
	<td><label><u>INDEKS DEBRIS</u></label></td><td></td><td><label><u>INDEKS KALKULUS</u></label></td>
	</tr>
	</p>
	<p>
	<tr>
	<td><label>GIGI 16 </label> <select name="indeb16"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 11 </label> <select name="indeb11"><option value=0>0</option><option value="1">1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 26 </label> <select name="indeb26"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select></td><td Style="WIDTH:20";></td><td><label>GIGI 16 </label> <select name="inkal16"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 11 </label> <select name="inkal11"><option value="0">0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 26 </label> <select name="inkal26"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select></td>
	</tr>
	</p>
	<p>
	<tr>
	<td><label>GIGI 46 </label> <select name="indeb46"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 31 </label> <select name="indeb31"><option value="0">0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 36 </label> <select name="indeb36"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select></td><td Style="WIDTH:20";></td><td><label>GIGI 46 </label> <select name="inkal46"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 31 </label> <select name="inkal31"><option value="0">0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select><label>GIGI 36 </label> <select name="inkal36"><option value=0>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option></select></td>
	</tr>
	</p>
	<p>
</table>

	<p>
	<input type="submit" name="PERAWATAN" value="SELESAI"/>
	</p>
</form>
</fieldset>
</body>
</html>
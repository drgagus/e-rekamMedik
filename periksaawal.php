<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "pendaftaran"){
						header("location:pendaftaran.php");
					}elseif ($_SESSION['posisi'] == "nurse"  or  $_SESSION['posisi'] == "drgpython" ){
					}elseif ($_SESSION['posisi'] == "dokterumum"){
						header("location:poliumum.php");
					}elseif ($_SESSION['posisi'] == "doktergigi"){
						header("location:poligigi.php");
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
<title>PEMERIKSAAN AWAL</title>
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
<input type="submit" name="pemeriksaan" value="PEMERIKSAAN" Style="background:lime; WIDTH:150; color:blue"; /> 
<input type="submit" name="poliumum" value="POLI UMUM" Style=" WIDTH:150; color:blue"; />  
<input type="submit" name="poligigi" value="POLI GIGI" Style="WIDTH:150; color:blue";/>
<input type="submit" name="polikia" value="POLI KIA" Style="WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; /> 
</form>

<fieldset style="background:#EEE7DB">
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
</fieldset>

<fieldset style="background:#F5C8BF";>
<center><h3><b style="background:yellow">PEMERIKSAAN AWAL</B><H3></center>
<?php 
	include ("config.php") ;
	
	if(isset($_GET['nik'])){
		$nik = (int)$_GET['nik'];
		$sql = " select * from ruangtunggu WHERE nik='$nik' " ;
		$query = mysqli_query($db, $sql);
		$antri = mysqli_fetch_array($query);
	}
?>

<form action="periksaawalproses.php" method="POST">
<table>
<input type="hidden" name="nik"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query);
											echo $pasien ['nik'] ;
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
											echo $pasien ['nama'] ;
											}else{
											}
											?>" />
											
	<input type="hidden" name="norm"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query); 
											echo $pasien['norm'] ;
											}else{
											}
											?>" />
	<tr>
	<td style="width:200"><LABEL>NO ANTRIAN<LABEL></td><td>:</td>
	<td><?php echo $antri['noantri'] ; ?></td>
	</tr>										
	<tr>
	<td style="width:200"><LABEL>TANGGAL<LABEL></td><td>:</td>
	<td><input type="date" name="tanggal" value=<?php echo date('Y-m-d') ; ?> style="width:500" required/></td>
	</tr>
	<tr><td>KELUHAN UTAMA</td><td>:</td><td><input type="text" name="keluhan" style="width:500" required/></td></tr>
	</table>
	<table>
	<tr>
	<td style="width:200"></td><td></td><td style="width:120">Tinggi Badan</td><td></td><td style="width:120">Berat Badan</td><td style="width:120">Lingkar Perut</td></tr>
	<tr>
	<td></td><td></td><td><input type="text" name="tb" style="width:50" required/> cm</td><td></td><td><input type="text" name="bb" style="width:50" required/> Kg</td><td><input type="text" name="lp" style="width:50"/> cm</td></tr>
	<tr>
	<td style="width:200"></td><td></td><td>Tekanan Darah</td><td></td><td>Respiratory Rate</td><td>Heart Rate</td><td style="width:137">Temp Axila</td></tr>
	<tr>
	<td></td><td></td><td><input type="text" name="td" style="width:50" required/> mm/Hg</td><td></td><td><input type="text" name="rr" style="width:50" required/> /menit</td><td><input type="text" name="hr" style="width:50" required/> bpm</td><td><input type="text" name="temp" style="width:50" required/> celcius</td></tr>
	</table>
	<table>
	<tr>
	<td style="width:200"><label>PEMERIKSAAN AWAL<label></td><td>:</td>
	<td><textarea name="pemeriksaanawal" style="height:50 ; width:500" required/></textarea></td>
	</tr>
	<tr><td style="width:200">POLI</td><td>:</td><td><select name="poli" required ><option value="">--pilih poli--</OPTION><option value="POLI UMUM">POLI UMUM</OPTION><option value="POLI GIGI">POLI GIGI</OPTION><option value="POLI KIA">POLI KIA</OPTION></select></td></tr>
	<tr>
	<td></td><td></td><td><input type="submit" name="SELESAI" value="SELESAI"/></td>
	</tr>
</form>
</fieldset>
</body>
</html>
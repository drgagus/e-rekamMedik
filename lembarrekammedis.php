<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "pendaftaran" or  $_SESSION['posisi'] == "drgpython" ){
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
<title>LEMBAR REKAM MEDIS</title>
<IMG src="PuskesmasKelarik2.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background=>
<style>
table.cinereousTable {
  

}
table.cinereousTable td, table.cinereousTable th {
  padding: 4px 4px;
}
table.cinereousTable tbody td {
  font-size: 13px;
}
table.cinereousTable thead {
  background: #948473;
  background: -moz-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
  background: -webkit-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
  background: linear-gradient(to bottom, #afa396 0%, #9e9081 66%, #948473 100%);
  text-align: center;
}
table.cinereousTable thead th {
  font-size: 17px;
  font-weight: bold;
  color: #F0F0F0;
  text-align: left;
  border-left: 2px solid #948473;
}
table.cinereousTable thead th:first-child {
  border-left: none;
}

</style>

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
<fieldset>
<table class="cinereousTable">
<?php
include ("config.php") ;
if(isset($_POST['nik'])) {
	$nik = mysqli_real_escape_string($db,$_POST['nik']);
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


	}elseif(isset($_GET['nik'])) {
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
<fieldset>
<table>
<tr><td><b><u>REKAM MEDIS</u></b></td></tr>
</table>
<?php include("config.php");
    if(isset($_POST['rekammedis'])) {    
        $nik = mysqli_real_escape_string($db,$_POST['nik']);
		$tanggal = $_POST['tanggal'];
		$sqlper = " SELECT * FROM perawatan WHERE nik='$nik' and tanggal='$tanggal' order by tanggal ASC";
		$queryper = mysqli_query($db, $sqlper);
	
	

		while($pasienper = mysqli_fetch_array($queryper)){
		echo "<table class='cinereousTable'>" ;
		echo "<tr><td>TANGGAL</td><td>:</td><td>".date("d-m-Y ", strtotime($pasienper['tanggal']))."</td></tr>" ;
		echo "<tr><td>POLI</td><td>:</td><td>".$pasienper['poli']."</td></tr>" ;
		echo "</table>";
		echo "<table class='cinereousTable'>";
		echo "<tr><td><u>PEMERIKSAAN FISIK</u></td><td></td><td><u>TANDA-TANDA VITAL</u></td></tr>" ;
		echo "<tr><td>Tinggi Badan: ".$pasienper['tb']." cm</td><td></td><td>TD : ".$pasienper['td']." mmHg</td></tr>" ;
		echo "<tr><td>Berat Badan: ".$pasienper['bb']." Kg</td><td></td><td>HR: ".$pasienper['hr']." bpm</td></tr>" ;
		echo "<tr><td>Lingkar Pinggang: ".$pasienper['lp']." cm</td><td></td><td>RR: ".$pasienper['rr']." /menit</td></tr>" ;
		echo "<tr><td></td><td></td><td>Temp: ".$pasienper['temp']." celcius</td></tr>" ;
		
		echo "<tr><td>KELUHAN</td><td>:</td><td>".$pasienper['keluhan']."</td></tr>" ;
		echo "<tr><td>PEMERIKSAAN AWAL</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['pemeriksaanawal']))."</td></tr>" ;
		echo "<tr><td>PEMERIKSAAN LANJUTAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['pemeriksaanlanjutan']))."</td></tr>" ;
		echo "<tr><td ><label>HASIL LAB<label></td><td>:</td><td>";
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " SELECT * FROM hasillab WHERE nik='$nik' and tanggal='$tanggal' ";
		$query = mysqli_query($db, $sql);
		$pasienlab = mysqli_fetch_array($query); 
		if (empty ($pasienlab['hb'])){	
		}else{	echo "<br>HB : ".$pasienlab['hb']." gram/dl" ;
		}
		if (empty ($pasienlab['leukosit'])){
		}else{	echo "<br>Leukosit : ".$pasienlab['leukosit']." mikroliter" ;
		}
		if (empty ($pasienlab['trombosit'])){
		}else{	echo "<br>Trombosit : ".$pasienlab['trombosit']." mikroliter" ;
		}
		if (empty ($pasienlab['haematokrit'])){
		}else{	echo "<br>Haematokrit : ".$pasienlab['haematokrit']." %(persen)" ;
		}
		if (empty ($pasienlab['hcgtest'])){
		}else{	echo "<br>HCG Test : ".$pasienlab['hcgtest'] ;
		}
		if (empty ($pasienlab['golongandarah'])){
		}else{	echo "<br>Golongan Darah : ".$pasienlab['golongandarah'] ;
		}
		if (empty ($pasienlab['dengue'])){
		}else{	echo "<br>Dengue IgG/IgM : ".$pasienlab['dengue'] ;
		}
		if (empty ($pasienlab['antihiv'])){
		}else{	echo "<br>Anti HIV : ".$pasienlab['antihiv'] ;
		}
		if (empty ($pasienlab['urine rutin'])){
		}else{	echo "<br>Urine Rutin : ".$pasienlab['urinerutin'] ;
		}
		if (empty ($pasienlab['urinelengkap'])){
		}else{	echo "<br>Urine Lengkap : ".$pasienlab['urinelengkap'] ;
		}
		if (empty ($pasienlab['cholesterol'])){
		}else{	echo "<br>Cholesterol : ".$pasienlab['cholesterol']." mg/dl" ;
		}
		if (empty ($pasienlab['asamurat'])){
		}else{	echo "<br>Asam Urat : ".$pasienlab['asamurat']." mg/dl" ;
		}
		if (empty ($pasienlab['guladarahsewaktu'])){
		}else{	echo "<br>Gula Darah Sewaktu : ".$pasienlab['guladarahsewaktu']." mg/dl" ;
		}
		if (empty ($pasienlab['guladarahpuasa'])){
		}else{	echo "<br>Gula Darah Puasa : ".$pasienlab['guladarahpuasa']." mg/dl" ;
		}
		if (empty ($pasienlab['guladarahpostprandia'])){
		}else{	echo "<br>Gula Darah Post Prandia : ".$pasienlab['guladarahpostprandia']." mg/dl" ;
		}
		if (empty ($pasienlab['malaria'])){
		}else{	echo "<br>Malaria : ".$pasienlab['malaria'] ;
		}
		if (empty ($pasienlab['sewaktu'])){
		}else{	echo "<br>Sputum Mikroskopis Sewaktu : ".$pasienlab['sewaktu'];
		}
		if (empty ($pasienlab['pagi'])){
		}else{	echo "<br>Sputum Mikroskopis Pagi : ".$pasienlab['pagi'] ;
		}
		if (empty ($pasienlab['ankes'])){
		}else{	echo "<br>Analis Kesehatan : ".$pasienlab['ankes'] ;
		}
	
		ECHO "</td></tr>" ;
		echo "<tr><td>DIAGNOSA</td><td>:</td><td>".$pasienper['diagnosa']."</td></tr>" ;
		echo "<tr><td>PERAWATAN/TINDAKAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['perawatan']))."</td></tr>" ;
		echo "<tr><td>PENGOBATAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['pengobatan']))."</td></tr>" ;
		echo "<tr><td>KETERANGAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['keterangan']))."</td></tr>" ;
		echo "<tr><td>NAMA DOKTER/BIDAN</td><td>:</td><td>".$pasienper['nakes']."</td></tr>" ;
		echo "</table>";
		echo "</table>";
		echo "<tr><td><br></td></tr>" ;
		}
		
	}elseif(isset($_GET['nik'])) {    
        $nik = (int)$_GET['nik'];
		$tanggal = date("Y-m-d");
		$sqlper = " SELECT * FROM perawatan WHERE nik='$nik' and tanggal='$tanggal' order by tanggal ASC";
		$queryper = mysqli_query($db, $sqlper);

		while($pasienper = mysqli_fetch_array($queryper)){
		echo "<table class='cinereousTable'>" ;
		echo "<tr><td>TANGGAL</td><td>:</td><td>".date("d-m-Y ", strtotime($pasienper['tanggal']))."</td></tr>" ;
		echo "<tr><td>POLI</td><td>:</td><td>".$pasienper['poli']."</td></tr>" ;
		echo "</table>";
		echo "<table class='cinereousTable'>";
		echo "<tr><td><u>PEMERIKSAAN FISIK</u></td><td></td><td><u>TANDA-TANDA VITAL</u></td></tr>" ;
		echo "<tr><td>Tinggi Badan: ".$pasienper['tb']." cm</td><td></td><td>TD : ".$pasienper['td']." mmHg</td></tr>" ;
		echo "<tr><td>Berat Badan: ".$pasienper['bb']." Kg</td><td></td><td>HR: ".$pasienper['hr']." bpm</td></tr>" ;
		echo "<tr><td>Lingkar Pinggang: ".$pasienper['lp']." cm</td><td></td><td>RR: ".$pasienper['rr']." /menit</td></tr>" ;
		echo "<tr><td></td><td></td><td>Temp: ".$pasienper['temp']." celcius</td></tr>" ;
		
		echo "<tr><td>KELUHAN</td><td>:</td><td>".$pasienper['keluhan']."</td></tr>" ;
		echo "<tr><td>PEMERIKSAAN AWAL</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['pemeriksaanawal']))."</td></tr>" ;
		echo "<tr><td>PEMERIKSAAN LANJUTAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['pemeriksaanlanjutan']))."</td></tr>" ;
		echo "<tr><td ><label>HASIL LAB<label></td><td>:</td><td>";
		$nik = (int)$_GET['nik'];
		$tanggal = date("Y-m-d");
		$sql = " SELECT * FROM hasillab WHERE nik='$nik' and tanggal='$tanggal' ";
		$query = mysqli_query($db, $sql);
		$pasienlab = mysqli_fetch_array($query); 
		if (empty ($pasienlab['hb'])){	
		}else{	echo "<br>HB : ".$pasienlab['hb']." gram/dl" ;
		}
		if (empty ($pasienlab['leukosit'])){
		}else{	echo "<br>Leukosit : ".$pasienlab['leukosit']." mikroliter" ;
		}
		if (empty ($pasienlab['trombosit'])){
		}else{	echo "<br>Trombosit : ".$pasienlab['trombosit']." mikroliter" ;
		}
		if (empty ($pasienlab['haematokrit'])){
		}else{	echo "<br>Haematokrit : ".$pasienlab['haematokrit']." %(persen)" ;
		}
		if (empty ($pasienlab['hcgtest'])){
		}else{	echo "<br>HCG Test : ".$pasienlab['hcgtest'] ;
		}
		if (empty ($pasienlab['golongandarah'])){
		}else{	echo "<br>Golongan Darah : ".$pasienlab['golongandarah'] ;
		}
		if (empty ($pasienlab['dengue'])){
		}else{	echo "<br>Dengue IgG/IgM : ".$pasienlab['dengue'] ;
		}
		if (empty ($pasienlab['antihiv'])){
		}else{	echo "<br>Anti HIV : ".$pasienlab['antihiv'] ;
		}
		if (empty ($pasienlab['urine rutin'])){
		}else{	echo "<br>Urine Rutin : ".$pasienlab['urinerutin'] ;
		}
		if (empty ($pasienlab['urinelengkap'])){
		}else{	echo "<br>Urine Lengkap : ".$pasienlab['urinelengkap'] ;
		}
		if (empty ($pasienlab['cholesterol'])){
		}else{	echo "<br>Cholesterol : ".$pasienlab['cholesterol']." mg/dl" ;
		}
		if (empty ($pasienlab['asamurat'])){
		}else{	echo "<br>Asam Urat : ".$pasienlab['asamurat']." mg/dl" ;
		}
		if (empty ($pasienlab['guladarahsewaktu'])){
		}else{	echo "<br>Gula Darah Sewaktu : ".$pasienlab['guladarahsewaktu']." mg/dl" ;
		}
		if (empty ($pasienlab['guladarahpuasa'])){
		}else{	echo "<br>Gula Darah Puasa : ".$pasienlab['guladarahpuasa']." mg/dl" ;
		}
		if (empty ($pasienlab['guladarahpostprandia'])){
		}else{	echo "<br>Gula Darah Post Prandia : ".$pasienlab['guladarahpostprandia']." mg/dl" ;
		}
		if (empty ($pasienlab['malaria'])){
		}else{	echo "<br>Malaria : ".$pasienlab['malaria'] ;
		}
		if (empty ($pasienlab['sewaktu'])){
		}else{	echo "<br>Sputum Mikroskopis Sewaktu : ".$pasienlab['sewaktu'];
		}
		if (empty ($pasienlab['pagi'])){
		}else{	echo "<br>Sputum Mikroskopis Pagi : ".$pasienlab['pagi'] ;
		}
	
		ECHO "</td></tr>" ;
		echo "<tr><td>DIAGNOSA</td><td>:</td><td>".$pasienper['diagnosa']."</td></tr>" ;
		echo "<tr><td>PERAWATAN/TINDAKAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['perawatan']))."</td></tr>" ;
		echo "<tr><td>PENGOBATAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['pengobatan']))."</td></tr>" ;
		echo "<tr><td>KETERANGAN</td><td>:</td><td>".nl2br(htmlspecialchars($pasienper['keterangan']))."</td></tr>" ;
		echo "<tr><td>NAMA DOKTER/BIDAN</td><td>:</td><td>".$pasienper['nakes']."</td></tr>" ;
		echo "</table>";
		echo "</table>";
		echo "<tr><td><br></td></tr>" ;
		}
	}
?>


</fieldset>

</body>

<html>
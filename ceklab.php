<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "pendaftaran"){
						header("location:pendaftaran.php");
					}elseif ($_SESSION['posisi'] == "nurse"){
						header("location:pemeriksaan.php");
					}elseif ($_SESSION['posisi'] == "dokterumum" or $_SESSION['posisi'] == "doktergigi" or $_SESSION['posisi'] == "bidan" or  $_SESSION['posisi'] == "drgpython" ){
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
<title>CEK LABORATORIUM</title>
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

<fieldset style="background:#EEE7DB";>
<table>
<?php
include ("config.php") ;
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
<form action="ceklabproses.php" method="POST">
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
											
	<input type="hidden" name="norm"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query); 
											$nama = $pasien ['norm'] ;
											echo $nama ;
											}else{
											}
											?>" />
											
	<input type="hidden" name="nakes"  value="<?php echo $_SESSION['nama'] ; ?>" />
	<h3><b>CEK LABORATORIUM</B><H3>
	<table>
	<tr>
	<td><LABEL>TANGGAL<LABEL></td>
	<td><input type="date" name="tanggal" value=<?php echo date('Y-m-d') ; ?> style="width:137" required/></td>
	</tr>
	<tr><td>POLI</td><td><select name="poli" style="width:137" required ><option value="">--pilih poli--</OPTION><option value="POLI UMUM">POLI UMUM</OPTION><option value="POLI GIGI">POLI GIGI</OPTION><option value="POLI KIA">POLI KIA</OPTION></select></td></tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>KIMIA KLINIK ==></td><td><input type="checkbox" name="cholesterol" value="Cholesterol">Cholesterol</td>
							<td><input type="checkbox" name="asamurat" value="Asam Urat">Asam Urat</td>
							<td><input type="checkbox" name="guladarahsewaktu" value="Gula Darah Sewaktu">Gula Darah Sewaktu</td></tr>
							<tr><td></td><td><input type="checkbox" name="guladarahpuasa" value="Gula Darah Puasa">Gula Darah Puasa</td>
							<td><input type="checkbox" name="guladarahpostprandia" value="Gula Darah Post Prandia">Gula Darah Post Prandia</td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>HAEMATOLOGI ==></td><td><input type="checkbox" name="hb" value="Hb">Hb</td>
							<td><input type="checkbox" name="leukosit" value="Leukosit">Leukosit</td></tr>
							<tr><td></td><td><input type="checkbox" name="trombosit" value="Trombosit">Trombosit</td>
							<td><input type="checkbox" name="haematokrit" value="Haematokrit">Haematokrit</td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>SEROLOGI ==></td><td><input type="checkbox" name="hcgtest" value="HCG Test">HCG Test</td>
							<td><input type="checkbox" name="golongandarah" value="Golongan Darah">Golongan Darah</td></tr>
							<tr><td></td><td><input type="checkbox" name="dengue" value="Dengue IgG/IgM">Dengue IgG/IgM</td>
							<td><input type="checkbox" name="antihiv" value="Anti HIV">Anti HIV</td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>URINALISA ==></td><td><input type="checkbox" name="urinerutin" value="Urine Rutin">Urine Rutin</td>
							<td><input type="checkbox" name="urinelengkap" value="Urine Lengkap">Urine Lengkap</td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>PARASITOLOGI ==></td><td><input type="checkbox" name="malaria" value="Malaria">Malaria</td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>MIKROBIOLOGI ==></td><td><input type="checkbox" name="sewaktu" value="Sewaktu">Sewaktu</td>
							<td><input type="checkbox" name="pagi" value="Pagi">Pagi </td>
							</tr>
	<tr><td>(Sputum Mikroskopis)</td></tr>
	<tr><td></td><td><input type="submit" name="ceklab" value="CEK LAB"/></td></tr>
	
<table>
</form>

</fieldset>

</body>

</html>

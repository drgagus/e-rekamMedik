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
					}elseif ($_SESSION['posisi'] == "bidan" or  $_SESSION['posisi'] == "drgpython" ){
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
<title>POLI KIA</title>
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
<input type="submit" name="polikia" value="POLI KIA" Style="background:lime; WIDTH:150; color:blue";/>
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

</fieldset>



<fieldset style="background:#F5C8BF";>
<center><h3><b style="background:yellow">POLI KESEHATAN IBU DAN ANAK</B><H3></center>
<table>
<tr><td>
<?php 
include("config.php");
    if(isset($_GET['nik'])) {    
        $nik = (int)$_GET['nik'];
		$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
		$query = mysqli_query($db, $sql);
		$pasien = mysqli_fetch_array($query);
	
	echo "<table><tr><td><H4><a href='riwayatmedis.php?nik=".$pasien['nik']."' target='_blank' Style='color:darkblue';> RIWAYAT MEDIS</a> | <a href='kartuibu.php?nik=".$pasien['nik']."' Style='color:darkblue';> KARTU IBU </a></h4></td></tr><tr><td><br></td></tr><table>"; 
	}else{
	}
?>
</td></tr>
</table>
<form action="polikebproses.php" method="POST">
<table>
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
											$norm = $pasien ['norm'] ;
											echo $norm ;
											}else{
											}
											?>" />

	<input type="hidden" name="nakes"  value="<?php echo $_SESSION['nama'] ; ?>" />
	
	<input type="hidden"  name="poli" value="POLI KIA" />
	<tr>
	<td style="width:250"><LABEL>TANGGAL<LABEL></td><td>:</td>
	<td><input type="date" name="tanggal" value=<?php echo date('Y-m-d') ; ?> style="width:500" required/></td></tr>
	</table>
	<?php
							include("config.php");
							if(isset($_GET['nik'])) {
							$nik = (int)$_GET['nik'];
							$rujukaninternal = " SELECT * FROM rujukaninternal WHERE nik=$nik ";
							$qrujukaninternal = mysqli_query($db, $rujukaninternal);
							$rujukan = mysqli_fetch_array($qrujukaninternal); 
							if (mysqli_num_rows($qrujukaninternal) > 0 ){
									echo "<fieldset style='background:pink'><legend><b>rujukan internal</b></legend>";
									echo "<table>";
									echo "<tr><td style='width:235'>ALASAN RUJUK</td><td>:</td><td>".$rujukan['alasanrujuk']."</td></tr>" ;
									echo "<tr><td>ASAL POLI</td><td>:</td><td>".$rujukan['poliasal']."</td></tr>";
									echo "</table>";
									echo "</fieldset>";
											}
							}
											?>	
	<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sqlnurse = " SELECT * FROM pemeriksaanawal WHERE nik=$nik ";
											$querynurse = mysqli_query($db, $sqlnurse);
											$nurse = mysqli_fetch_array($querynurse); 
											}
											?>
	<table>
	<tr><td  style="width:250">KELUHAN UTAMA</td><td>:</td><td><input type="text" name="keluhan" style="width:500" value="<?php echo $nurse['keluhan'] ; ?>" required/></td></tr>
	</table>
	
	<table>
	<tr>
	<td style="width:255"></td><td></td><td style="width:120">Tinggi Badan</td><td></td><td style="width:120">Berat Badan</td><td style="width:120">Lingkar Perut</td></tr>
	<tr>
	<td></td><td></td><td><input type="text" name="tb" style="width:50" value="<?php echo $nurse['tb'] ; ?>" required/> cm</td><td></td><td><input type="text" name="bb" style="width:50" value="<?php echo $nurse['bb'] ; ?>" required/> Kg</td><td><input type="text" name="lp" style="width:50" value="<?php echo $nurse['lp'] ; ?>" /> cm</td></tr>
	<tr>
	<td style="width:200"></td><td></td><td>Tekanan Darah</td><td></td><td>Respiratory Rate</td><td>Heart Rate</td><td style="width:137">Temp Axila</td></tr>
	<tr>
	<td></td><td></td><td><input type="text" name="td" style="width:50" value="<?php echo $nurse['td'] ; ?>" required/> mm/Hg</td><td></td><td><input type="text" name="rr" style="width:50" value="<?php echo $nurse['rr'] ; ?>" required/> /menit</td><td><input type="text" name="hr" style="width:50" value="<?php echo $nurse['hr'] ; ?>" required/> bpm</td><td><input type="text" name="temp" style="width:50" value="<?php echo $nurse['temp'] ; ?>" required/> celcius</td></tr>
	</table>
	
	<table>
	<tr>
	<td style="width:250"><label>PEMERIKSAAN AWAL<label></td><td>:</td>
	<td><textarea name="pemeriksaanawal" style="height:50 ; width:500" required/><?php echo $nurse['pemeriksaanawal'] ; ?></textarea></td>
	</tr>
	<tr><td>PEMERIKSAAN LANJUTAN</td><td>:</td><td><textarea name="pemeriksaanlanjutan" style="height:50 ; width:500" required/></textarea></td>
	</tr>
	<tr>
	<td style="width:250"><label><?php
	$nik = (int)$_GET['nik'];
	echo "<a href='ceklab.php?nik=".$nik."' Style='color:darkblue'; target='_blank' >PEMERIKSAAN LABORATORIUM</a>" ;
	?>
	<label></td><td>:</td>
	<td>
	<?php
		include("config.php");
		$nik = (int)$_GET['nik'];
		$tanggal = date('Y-m-d') ;
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
		
	?>
	
	</td></tr>
	<tr>
	<td style="width:250"><label>DIAGNOSA<label></td><td>:</td>
	<td><select name="diagnosa" style="width:500" required><option value="">--pilih diagnosa--</option> <?php
		include("config.php");
		$sql = " SELECT * FROM daftardiagnosa order by diagnosa ASC";
		$diag = mysqli_query($db, $sql);		
			while($pasien = mysqli_fetch_array($diag)){
			echo '<option value="' . $pasien['diagnosa'] . '">' . $pasien['diagnosa'] . '</option>' . "\r\n" ;
			}
		?> </select></td>
	</tr>
	<tr>
	<td ><label>PERAWATAN/TINDAKAN <label></td><td>:</td>
	<td><textarea name="perawatan" style="height:50 ; width:500" required/></textarea></td>
	</tr>
	<tr>
	<td ><label>PENGOBATAN - <label><a href='stokobat.php' target='_blank'>Stock Obat</a></td><td>:</td>
	<td><textarea name="pengobatan" style="height:50 ; width:500" required/></textarea></td>
	</tr>
	<tr>
	<td ><label>KETERANGAN <label></td><td>:</td>
	<td><textarea name="keterangan" style="height:50 ; width:500" /></textarea></td>
	</tr>
	</table>
<fieldset style="background:pink">
<table  style="width: 100%">
	<tr>
	<td  style="color:darkblue"><label><u>RUJUKAN INTERNAL</u><label></TD></TR>
	<tr><td  style="width:235">ALASAN RUJUK</td><td>:</td>
	<td><input type="text" name="alasanrujuk" style="width:500" /></td>
	</tr>
	<tr><td>POLI TUJUAN</td><td>:</td>
	<td><select name="politujuan"><option value="">--pilih poli--</OPTION>
								<option value="POLI UMUM">POLI UMUM</OPTION>
								<option value="POLI GIGI">POLI GIGI</OPTION>
								<option value="POLI KIA">POLI KIA</OPTION></select></td>
	</tr>
</table>
<input type="hidden"  name="poliasal" value="POLI KIA" />
</fieldset>
<table style="width: 100%">
	<tr><td><br></td></tr>
	<tr>
	<td style="width:250"></td><td><input type="submit" name="SELESAI" value="SELESAI"/></td>
	</tr>
</table>
</form>
</fieldset>
</body>
</html>
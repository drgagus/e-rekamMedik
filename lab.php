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
					}elseif ($_SESSION['posisi'] == "analiskesehatan" or  $_SESSION['posisi'] == "drgpython" ){
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
<title>LABORATORIUM</title>
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
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="background:lime; WIDTH:150; color:blue";/>
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
	$nik = $pasien['nik'];
	$nama= $pasien['nama'];

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
<table>
<form action="lab.php?nik=<?php echo (int)$_GET['nik']; ?>" method="POST">
<tr><td>TANGGAL PERMINTAAN CEK-LAB</td><td>:</td><td><input type="date" name="tanggal" />
<input type="hidden" name="nik" value="<?php $nik = (int)$_GET['nik']; ?>" />
<input type="submit" name="ceklab" value="CEK LAB"/></td></tr>
</form>

</table>
</fieldset>

<fieldset style="background:#F5C8BF";>
<center><h3><b style="background:yellow">PEMERIKSAAN LABORATORIUM</B><H3></center>

<form action="labproses.php" method="POST">
<input type="hidden" name="nik"  value="<?php
											include("config.php");
											if(isset($_POST['ceklab'])) {
											$nik = (int)$_GET['nik'];
											$tanggal = $_POST['tanggal'] ;
											$sqllab = " SELECT * FROM ceklab WHERE nik='$nik' and tanggal='$tanggal' ";
											$querylab = mysqli_query($db, $sqllab);
											$pasienlab = mysqli_fetch_array($querylab) ;
											echo $pasienlab['nik'] ;
											}
											?>" />
											
<input type="hidden" name="nakes"  value="<?php
											include("config.php");
											if(isset($_POST['ceklab'])) {
											$nik = (int)$_GET['nik'];
											$tanggal = $_POST['tanggal'] ;
											$sqllab = " SELECT * FROM ceklab WHERE nik='$nik' and tanggal='$tanggal' ";
											$querylab = mysqli_query($db, $sqllab);
											$pasienlab = mysqli_fetch_array($querylab) ;
											echo $pasienlab['nakes'] ;
											}else{
											$nik = (int)$_GET['nik'];
											$tanggal = date("d-m-Y") ;
											$sqllab = " SELECT * FROM ceklab WHERE nik='$nik' and tanggal='$tanggal' ";
											$querylab = mysqli_query($db, $sqllab);
											$pasienlab = mysqli_fetch_array($querylab) ;
											}
											?>" />
	<input type="hidden" name="ankes"  value="<?php echo $_SESSION['nama'] ; ?>" />		
	<input type="hidden" name="nama"  value="<?php echo $pasienlab['nama'] ; ?>" />
	<table>
	<tr>
	<td><LABEL>TANGGAL<LABEL></td>
	<td>: <input type="date" name="tanggal" value="<?php echo date('Y-m-d') ; ?>" style="width:" required/></td>
	</tr>
	<tr>
	<td><LABEL>ASAL POLI<LABEL></td><?php $poli=$pasienlab['poli'] ; ?>
	<td>: <select name="poli" style="width:137" required >
	<option value="">--pilih poli--</OPTION>
	<option <?php echo ($poli == 'POLI UMUM') ? "selected": "" ?>>POLI UMUM</OPTION>
	<option <?php echo ($poli == 'POLI GIGI') ? "selected": "" ?>>POLI GIGI</OPTION>
	<option <?php echo ($poli == 'POLI KIA') ? "selected": "" ?>>POLI KIA</OPTION></select>
	</td>
	</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>KIMIA KLINIK ==></td><td><input type="checkbox" name="cholesterol" value="Cholesterol" <?php 
	echo ($pasienlab['cholesterol'] == 'Cholesterol') ? "Checked": "" ?>>Cholesterol</td><td><input type="text" name="cholesterol2" STYLE="WIDTH:37"/>mg/dl</td></tr>
							<tr><td></td><td><input type="checkbox" name="asamurat" value="Asam Urat" <?php echo ($pasienlab['asamurat'] == 'Asam Urat') ? "Checked": "" ?>>Asam Urat</td><td><input type="text" name="asamurat2" STYLE="WIDTH:37"/>mg/dl</td></tr>
							<tr><td></td><td><input type="checkbox" name="guladarahsewaktu" value="Gula Darah Sewaktu" <?php echo ($pasienlab['guladarahsewaktu'] == 'Gula Darah Sewaktu') ? "Checked": "" ?>>Gula Darah Sewaktu</td><td><input type="text" name="guladarahsewaktu2" STYLE="WIDTH:37"/>mg/dl</td></tr>
							<tr><td></td><td><input type="checkbox" name="guladarahpuasa" value="Gula Darah Puasa" <?php echo ($pasienlab['guladarahpuasa'] == 'Gula Darah Puasa') ? "Checked": "" ?>>Gula Darah Puasa</td><td><input type="text" name="guladarahpuasa2" STYLE="WIDTH:37"/>mg/dl</td></tr>
							<tr><td></td><td><input type="checkbox" name="guladarahpostprandia" value="Gula Darah Post Prandia" <?php echo ($pasienlab['guladarahpostprandia'] == 'Gula Darah Post Prandia') ? "Checked": "" ?>>Gula Darah Post Prandia</td><td><input type="text" name="guladarahpostprandia2" STYLE="WIDTH:37"/>mg/dl</td></tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>HAEMATOLOGI ==></td><td><input type="checkbox" name="hb" value="Hb" <?php echo ($pasienlab['hb'] == 'Hb') ? "Checked": "" ?>>Hb</td><td><input type="text" name="hb2" STYLE="WIDTH:57"/>gram/dl</td></tr>
							<tr><td></td><td><input type="checkbox" name="leukosit" value="Leukosit" <?php echo ($pasienlab['leukosit'] == 'Leukosit') ? "Checked": "" ?>>Leukosit</td><td><input type="text" name="leukosit2" STYLE="WIDTH:57"/>/mikroliter</td></tr>
							<tr><td></td><td><input type="checkbox" name="trombosit" value="Trombosit" <?php echo ($pasienlab['trombosit'] == 'Trombosit') ? "Checked": "" ?>>Trombosit</td><td><input type="text" name="trombosit2" STYLE="WIDTH:57"/>/mikroliter</td></tr>
							<tr><td></td><td><input type="checkbox" name="haematokrit" value="Haematokrit" <?php echo ($pasienlab['haematokrit'] == 'Haematokrit') ? "Checked": "" ?>>Haematokrit</td><td><input type="text" name="haematokrit2" STYLE="WIDTH:57"/>%(persen)</td></tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>SEROLOGI ==></td><td><input type="checkbox" name="hcgtest" value="HCG Test" <?php echo ($pasienlab['hcgtest'] == 'HCG Test') ? "Checked": "" ?>>HCG Test</td><td><select type="text" name="hcgtest2" ><option value="">--pilih--</option><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select></td></tr>
							<tr><td></td><td><input type="checkbox" name="golongandarah" value="Golongan Darah" <?php echo ($pasienlab['golongandarah'] == 'Golongan Darah') ? "Checked": "" ?>>Golongan Darah</td><td><select type="text" name="golongandarah2"><option value="">--pilih--</option><option value="A+">A+</option><OPTION VALUE="B+">B+</option><option value="AB+">AB+</option><option value="O+">O+</option> </select></td></tr>
							<tr><td></td><td><input type="checkbox" name="dengue" value="Dengue IgG/IgM" <?php echo ($pasienlab['dengue'] == 'Dengue IgG/IgM') ? "Checked": "" ?>>Dengue IgG/IgM</td><td><select type="text" name="dengue2" ><option value="">--pilih--</option><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select></td></tr>
							<tr><td></td><td><input type="checkbox" name="antihiv" value="Anti HIV" <?php echo ($pasienlab['antihiv'] == 'Anti HIV') ? "Checked": "" ?>>Anti HIV</td><td><select type="text" name="antihiv2" ><option value="">--pilih--</option><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select></td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>URINALISA ==></td><td><input type="checkbox" name="urinerutin" value="Urine Rutin" <?php echo ($pasienlab['urinerutin'] == 'Urine Rutin') ? "Checked": "" ?>>Urine Rutin</td><td><input type="text" name="urinerutin2" STYLE="WIDTH:137"/></td></tr>
							<tr><td></td><td><input type="checkbox" name="urinelengkap" value="Urine Lengkap" <?php echo ($pasienlab['urinelengkap'] == 'Urine Lengkap') ? "Checked": "" ?>>Urine Lengkap</td><td><input type="text" name="urinelengkap2" STYLE="WIDTH:137"/></td>
							</tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>PARASITOLOGI ==></td><td><input type="checkbox" name="malaria" value="Malaria" <?php echo ($pasienlab['malaria'] == 'Malaria') ? "Checked": "" ?>>Malaria</td><td><select type="text" name="malaria2" ><option value="">--pilih--</option><option value="Positif">Positif</option><option value="Negatif">Negatif</option></select></td></tr>
	</table>
	<table>
	<tr><td><br></td></tr>
	<tr><td>MIKROBIOLOGI ==></td><td><input type="checkbox" name="sewaktu" value="Sewaktu" <?php echo ($pasienlab['sewaktu'] == 'Sewaktu') ? "Checked": "" ?>>Sewaktu</td><td><select type="text" name="sewaktu2" ><option value="">--pilih--</option><option value="Negatif">Negatif</option><option value="Positif +">Positif +</option><option value="Positif ++">Positif ++</option><option value="Positif +++">Positif +++</option></select></td></tr>
							<tr><td></td><td><input type="checkbox" name="pagi" value="Pagi" <?php echo ($pasienlab['pagi'] == 'Pagi') ? "Checked": "" ?>>Pagi</td><td><select type="text" name="pagi2" ><option value="">--pilih--</option><option value="Negatif">Negatif</option><option value="Positif +">Positif +</option><option value="Positif ++">Positif ++</option><option value="Positif +++">Positif +++</option></select></td>
							</tr>
	<tr><td>(Sputum Mikroskopis)</td></tr>
	<tr><td></td><td><input type="submit" name="inputhasil" value="INPUT HASIL"/></td></tr>
	
<table>
</form>

</fieldset>
</body>
</html>
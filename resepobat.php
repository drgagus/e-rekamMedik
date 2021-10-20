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
<title>APOTEK- RESEP OBAT</title>
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
</fieldset>
<fieldset style="background:#F5C8BF";>
<center><h3><b style="background:yellow">RESEP OBAT</B><H3></center>
<table>
<form action="resepobat.php?nik=<?php echo (int)$_GET['nik']; ?>" method="POST">
	<tr>
	<td><label>TANGGAL</label>
	<input type="date" name="tanggal"  Style="WIDTH:150"; required/>
	<input type="hidden" name="nik" value="<?php echo (int)$_GET['nik']; ?>" Style="WIDTH:150"; required/>
	<input type="submit" name="cari" value="CARI"/></td>
	</tr>
</form>
 
<?php 
	include ("config.php") ;
	
	if(isset($_POST['cari'])){
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " select * from perawatan WHERE tanggal = '$tanggal' AND nik = '$nik' ";
		$query = mysqli_query($db, $sql);
		$no = 1;
		
		echo "
		<table border='1'>
	<tr>
		<th>No</th>
		<th>TANGGAL BEROBAT</th>
		<th>POLI</th>
		<th>DOKTER/BIDAN</th>
		<TH>DIAGNOSA</TH>
		<th>RESEP OBAT</th>
	</tr> " ;
		while($pasien = mysqli_fetch_array($query)){
	
			echo "<tr>" ;
			echo "<td>" ; echo $no++; echo "</td>" ;
			echo "<td>".date("d-m-Y ", strtotime($pasien['tanggal']))."</td>" ;
			echo "<td>".$pasien['poli']."</td>";
			echo "<td>".$pasien['nakes']."</td>";
            echo "<td>".$pasien['diagnosa']. "</td>";
			echo "<td>".nl2br(htmlspecialchars($pasien['pengobatan']))."</td>";
		}
	}
	?>
</table>
</fieldset>
<fieldset style="background:#EEE7DB";>
<br>
<form action="resepobatproses.php" method="POST">
	<input type="hidden" name="tanggal" value="<?php if(isset($_POST['cari'])){
									$tanggal = $_POST['tanggal'];
									echo $tanggal ;
									}
									?>" />
	<input type="hidden" name="nik" value="<?php if(isset($_POST['nik'])){
									$nik = $_POST['nik'];
									echo $nik ;
									}
									?>" />
	<input type="hidden" name="nama" value="<?php 
	include ("config.php") ;
	if(isset($_POST['cari'])){
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " select * from datapasien WHERE nik = '$nik' ";
		$query = mysqli_query($db, $sql);
		$pasien = mysqli_fetch_array($query) ;
		echo $pasien['nama'];
	}
		?>" />
	
	<input type="hidden" name="nakes" value="<?php 
	include ("config.php") ;
	if(isset($_POST['cari'])){
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " select * from perawatan WHERE tanggal = '$tanggal' AND nik = '$nik' ";
		$query = mysqli_query($db, $sql);
		$pasien = mysqli_fetch_array($query) ;
		echo $pasien['nakes'] ;
	}
			?>" />
			
	<input type="hidden" name="poli" value="<?php 
	include ("config.php") ;
	if(isset($_POST['cari'])){
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " select * from perawatan WHERE tanggal = '$tanggal' AND nik = '$nik' ";
		$query = mysqli_query($db, $sql);
		$pasien = mysqli_fetch_array($query) ;
		echo $pasien['poli'] ;
	}
			?>" />
			
	<input type="hidden" name="apoteker" value="<?php echo $_SESSION['nama'] ; ?>" />
<table>
<?php 
	include ("config.php") ;
	if(isset($_POST['cari'])){
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " select * from perawatan WHERE tanggal = '$tanggal' AND nik = '$nik' ";
		$query = mysqli_query($db, $sql);
		
		echo "<tr><td>Poli</td><td>:</td><td><select name='poli'>";
		while($resepobatpoli = mysqli_fetch_array($query)){	
		echo '<option value="' . $resepobatpoli['poli'] . '">' . $resepobatpoli['poli'] . '</option>' . "\r\n" ;
			}
			echo "</select></td></tr>";
	}
		?>

<?php 
	include ("config.php") ;
	if(isset($_POST['cari'])){
		$nik = $_POST['nik'];
		$tanggal = $_POST['tanggal'];
		$sql = " select * from perawatan WHERE tanggal = '$tanggal' AND nik = '$nik' ";
		$query = mysqli_query($db, $sql);
		
		echo "<tr><td>Dokter/Bidan</td><td>:</td><td><select name='nakes'>";
		while($resepobatnakes = mysqli_fetch_array($query)){	
		echo '<option value="' . $resepobatnakes['nakes'] . '">' . $resepobatnakes['nakes'] . '</option>' . "\r\n" ;
			}
			echo "</select></td></tr>";
	}
		?>		
</table>
<table>
<tr>
	<td><label>NAMA OBAT<label></td><td style="width:37"> </td><td>JUMLAH</Td></tr>
<tr>	<td><select name="namaobat1"><option value="">--pilih obat--</option> <?php
		include("config.php");
		$sql = " SELECT * FROM stockobat order by namaobat ASC";
		$diag = mysqli_query($db, $sql);		
			while($obat = mysqli_fetch_array($diag)){
			echo '<option value="' .$obat['namaobat']. '">' . $obat['namaobat']. '</option>' . "\r\n" ;
			}
		?> </select></td><td></td><TD><input type="number" name="jumlahobat1" /></td></tr>
	</tr>
	
<tr>	<td><select name="namaobat2"><option value="">--pilih obat--</option> <?php
		include("config.php");
		$sql = " SELECT * FROM stockobat order by namaobat ASC";
		$diag = mysqli_query($db, $sql);		
			while($obat = mysqli_fetch_array($diag)){
			echo '<option value="' .$obat['namaobat']. '">' . $obat['namaobat']. '</option>' . "\r\n" ;
			}
		?> </select></td><td></td><TD><input type="number" name="jumlahobat2" /></td></tr>
	</tr>
	
<tr>	<td><select name="namaobat3"><option value="">--pilih obat--</option> <?php
		include("config.php");
		$sql = " SELECT * FROM stockobat order by namaobat ASC";
		$diag = mysqli_query($db, $sql);		
			while($obat = mysqli_fetch_array($diag)){
			echo '<option value="' .$obat['namaobat']. '">' . $obat['namaobat']. '</option>' . "\r\n" ;
			}
		?> </select></td><td></td><TD><input type="number" name="jumlahobat3" /></td></tr>
	</tr>
	
<tr>	<td><select name="namaobat4"><option value="">--pilih obat--</option> <?php
		include("config.php");
		$sql = " SELECT * FROM stockobat order by namaobat ASC";
		$diag = mysqli_query($db, $sql);		
			while($obat = mysqli_fetch_array($diag)){
			echo '<option value="' .$obat['namaobat']. '">' . $obat['namaobat']. '</option>' . "\r\n" ;
			}
		?> </select></td><td></td><TD><input type="number" name="jumlahobat4" /></td></tr>
	</tr>
	
<tr>	<td><select name="namaobat5"><option value="">--pilih obat--</option> <?php
		include("config.php");
		$sql = " SELECT * FROM stockobat order by namaobat ASC";
		$diag = mysqli_query($db, $sql);		
			while($obat = mysqli_fetch_array($diag)){
			echo '<option value="' .$obat['namaobat']. '">' . $obat['namaobat']. '</option>' . "\r\n" ;
			}
		?> </select></td><td></td><TD><input type="number" name="jumlahobat5" /></td></tr>
	</tr>
	<tr><td><br></td></tr>
<tr><td></td><td></td><td><input type="submit" name="obatkeluar" value="OBAT KELUAR"/></td></tr>
</table>
</form>
</fieldset>
</body>

<html>
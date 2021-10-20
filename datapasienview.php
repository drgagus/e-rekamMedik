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
<title>PENDAFTARAN - DATA PASIEN</title>
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
<input type="submit" name="pendaftaran" value="PENDAFTARAN" Style="background:lime; WIDTH:150; color:blue"; />
<input type="submit" name="pemeriksaan" value="PEMERIKSAAN" Style="WIDTH:150; color:blue"; />  
<input type="submit" name="poliumum" value="POLI UMUM" Style="WIDTH:150; color:blue"; />  
<input type="submit" name="poligigi" value="POLI GIGI" Style="WIDTH:150; color:blue";/>
<input type="submit" name="polikia" value="POLI KIA" Style="WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; /> 
</form>

<fieldset style="background:#F5C8BF";>
<?php include("config.php");
$nik=(int)$_GET['nik'];
echo "<a href='datapasienview.php?nik=".$nik."' Style='color:darkblue'; >LIHAT DATA</a> | " ;
echo "<a href='datapasienedit.php?nik=".$nik."' Style='color:darkblue'; >EDIT DATA</a> | " ;
echo "<a href='datapasienhapus.php?nik=".$nik."'  Style='color:darkblue'; onclick = 'return confirm(\"Yakin ingin menghapus data ini?\");'>HAPUS DATA</a> | " ;
echo "<a href='datapasiencetak.php?nik=".$nik."' Style='color:darkblue'; >CETAK DATA</a>  " ;
?>

<table>
<h3><b><u>DATA PASIEN</u></b></h3>
<?php 
include("config.php");

if(isset($_GET['nik'])) {
	$nik = (int)$_GET['nik'];
    $sql = " SELECT * FROM datapasien WHERE nik=$nik ";
	$query = mysqli_query($db, $sql);
	$pasien = mysqli_fetch_array($query); 

function tgl_indo($tanggal) {
	$bulan = array (
				1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember') ;
	$pecahkan = explode ('-', $tanggal) ;
	return $pecahkan[2].' '.$bulan[(int)$pecahkan[1]].' '.$pecahkan[0] ;
}

echo "<tr>";
echo "<td>" ; echo "NO REKAM MEDIS  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo  $pasien['norm']  ; echo "</td>" ;
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NAMA  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['nama'] ;  "</td>";  
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NO KTP (NIK)  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo  $pasien['nik'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NAMA KEPALA KELUARGA  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo  $pasien['kepalakeluarga'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NO KARTU KELUARGA  " ; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo  $pasien['kk'] ; echo "</td>"; 
echo "</tr>";
echo "<TR><TD>TEMPAT/TANGGAL LAHIR</TD><TD>:</TD><TD>".$pasien['tempatlahir'].", ".tgl_indo(date("Y-m-d ", strtotime($pasien['tgllahir'])))."</TD></TD>" ;
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
echo "<tr>";
echo "<td>" ; echo "UMUR  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $umur ; echo "</td>"; 
echo "<tr>";
echo "<td>" ; echo "JENIS KELAMIN  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['jeniskelamin'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "STATUS  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['status'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "AGAMA  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['agama'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "PENDIDIKAN  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['pendidikan'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "PEKERJAAN  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['pekerjaan'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "ALAMAT  "; echo "</td>" ;   echo "<td>:</td>" ; echo "<td>".$pasien['alamat']." RT/RW ".$pasien['rt']."/".$pasien['rw']." ".$pasien['desakelurahan']."</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "KATEGORI PASIEN  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['katpas'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NO KARTU  KIS/BPJS"; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['nokartu'] ; echo "</td>"; 
echo "</tr>";
echo "<tr>";
echo "<td>" ; echo "NO HANDPHONE  "; echo "</td>" ; echo "<td>";  echo ":" ; echo "</td>";  echo "<td>" ; echo $pasien['nohape'] ; echo "</td>"; 
echo "</tr>";
	}else{
		
}

?>
<form action="berobat.php" method="POST" >
<input type="hidden" name="nik" value="<?php  
	echo  $pasien['nik'] ; ?>" />
<input type="hidden" name="norm" value="<?php  
	echo  $pasien['norm'] ; ?>" />
<input type="hidden" name="nama" value="<?php  
	echo  $pasien['nama'] ; ?>" />
<tr><td></td><td></td><td><input type="submit" name="berobat" value="BEROBAT" /></td></tr>
</form>
</table>
</fieldset>

</body>
</html>

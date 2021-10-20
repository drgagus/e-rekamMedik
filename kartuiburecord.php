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
<title>RIWAYAT MEDIS</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">
<style>
table.cinereousTable {
  border: 6px solid #948473;
  background-color: #FFE3C6;
  width: 100%;
  
}
table.cinereousTable td, table.cinereousTable th {
  border: 1px solid #948473;
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

table.cinereousTable tfoot {
  font-size: 16px;
  font-weight: bold;
  color: #F0F0F0;
  background: #948473;
  background: -moz-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
  background: -webkit-linear-gradient(top, #afa396 0%, #9e9081 66%, #948473 100%);
  background: linear-gradient(to bottom, #afa396 0%, #9e9081 66%, #948473 100%);
}
table.cinereousTable tfoot td {
  font-size: 16px;
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
<fieldset style="background:#FF6347";><b><center>RIWAYAT MEDIS</center></b></fieldset>
<fieldset style="background:#FFFACD";>
<?php include ("config.php") ;
$nik = (int)$_GET['nik'];
echo "<a href='riwayatmedis.php?nik=".$nik."' Style='color:darkblue'; >RIWAYAT KUNJUNGAN</a> | " ;
echo "<a href='odontogramrecord.php?nik=".$nik."' Style='color:darkblue'; >ODONTOGRAM</a> | " ;
echo "<a href='kartuiburecord.php?nik=".$nik."'  Style='color:darkblue'; >KARTU IBU</a> | " ;
echo "<a href='laboratoriumrecord.php?nik=".$nik."' Style='color:darkblue'; >PEMERIKSAAN LABORATORIUM</a>  " ;
?>
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
<fieldset style="background:#F5DEB3";>	
<?php include("config.php");
    if(isset($_GET['nik'])) {    
        $nik = (int)$_GET['nik'];
		$sqlper = " SELECT * FROM kartuibu WHERE nik=$nik ";
		$queryper = mysqli_query($db, $sqlper);
		$kartuibu = mysqli_fetch_array($queryper) ;
		
	echo '<table>' ;
	echo "<tr>" ;
	echo "<td>" ; echo "<h4><u>KARTU IBU</u></h4>" ; echo "</td>" ;
	echo "</tr>" ;
echo '<tr>'.'<td>'.'TANGGAL PENDAFTARAN PERTAMA : '.date ("d-m-Y", strtotime($kartuibu['tanggal'])).'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Kontrasepsi Terakhir : '.$kartuibu['kontrasepsi'].'</td>'.'</tr>' ;
echo '<tr>'.'</tr>' ;
echo '<tr>'.'<td>'.'<b>RIWAYAT KONTRASEPSI KEHAMILAN TERDAHULU</b>'.'</td>'.'</tr>' ;
echo '</table>' ;

echo '<table class="cinereousTable" >' ;
echo '<tr>'.'<th>'.'Hamil<br>ke-'.'</th>'.'<th>'.'Umur<br>(tahun)'.'</th>'.'<th>'.'Berat<br>(gram)'.'</th>'.'<th>'.'Penolong Persalinan'.'</th>'.'<th>'.'Cara Persalinan'.'</th>'.'<th>'.'Keadaan Bayi'.'</th>'.'<th>'.'Komplikasi'.'</th>'.'</th>'.'</tr>' ;
echo '<tr>'.'<td><center>'.'1'.'</center></td>'.'<td>'.$kartuibu['ankiumur'].'</td>'.'<td>'.$kartuibu['ankiberat'].'</td>'.'<td>'.$kartuibu['ankipesalin'].'</td>'.'<td>'.$kartuibu['ankicasalin'].'</td>'.'<td>'.$kartuibu['ankikeadaan'].'</td>'.'<td>'.$kartuibu['ankikomplikasi'].'</td>'.'</tr>' ;
echo '<tr>'.'<td><center>'.'2'.'</center></td>'.'<td>'.$kartuibu['ankiiumur'].'</td>'.'<td>'.$kartuibu['ankiiberat'].'</td>'.'<td>'.$kartuibu['ankiipesalin'].'</td>'.'<td>'.$kartuibu['ankiicasalin'].'</td>'.'<td>'.$kartuibu['ankiikeadaan'].'</td>'.'<td>'.$kartuibu['ankiikomplikasi'].'</td>'.'</tr>' ;
echo '<tr>'.'<td><center>'.'3'.'</center></td>'.'<td>'.$kartuibu['ankiiiumur'].'</td>'.'<td>'.$kartuibu['ankiiiberat'].'</td>'.'<td>'.$kartuibu['ankiiipesalin'].'</td>'.'<td>'.$kartuibu['ankiiicasalin'].'</td>'.'<td>'.$kartuibu['ankiiikeadaan'].'</td>'.'<td>'.$kartuibu['ankiiikomplikasi'].'</td>'.'</tr>' ;
echo '</table>' ;

echo '<table>' ;
echo '<tr>'.'<td>'.'<b>RIWAYAT KEHAMILAN SEKARANG</b>'.'</td>'.'</tr>' ;
echo '</table>' ;

echo '<table>' ;
echo '<tr>'.'<td>'.'Haid Terakhir'.'</td>'.'<td>:</td>'.'<td>'.date("d-m-Y ", strtotime($kartuibu['tglhaid'])).'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Perkiraan Partus'.'</td>'.'<td>:</td>'.'<td>'.date("d-m-Y ", strtotime($kartuibu['tglpartus'])).'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Keluhan Utama Pasien'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['keluhanutama'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Nafsu Makan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['nafsumakan'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Muntah - muntah'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['muntah'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'pusing - pusing'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['pusing'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Nyeri Perut'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['nyeriperut'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Oedema'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['oedema'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Penyakit'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['penyakit'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Riwayat Kesehatan Keluarga'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['riwayatkeluarga'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Kebiasaan Yang Mempengaruhi Kehamilan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['kebiasaan'].'</td>'.'</tr>' ;
echo '</table>' ;

echo '<table>' ;
echo '<tr>'.'<td>'.'<b>PEMERIKSAAN UMUM</b>'.'</td>'.'<td>'.'</td>'.'<td Style="WIDTH:150">'.'</td>'.'<td>'.'<b>PEMERIKSAAN FISIK</b>'.'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Pucat'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['pucat'].'</td>'.'<td>'.'Muka'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['muka'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Kesadaran'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['kesadaran'].'</td>'.'<td>'.'Mulut'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['mulut'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Bentuk Tubuh'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['bentuktubuh'].'</td>'.'<td>'.'Gigi'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['gigi'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Suhu Badan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['suhubadan'].'</td>'.'<td>'.'Paru - Paru'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['paru'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Kuning'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['kuning'].'</td>'.'<td>'.'Jantung'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['jantung'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'LILA'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['lila'].' cm'.'</td>'.'<td>'.'Payudara'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['payudara'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Tinggi Badan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['tinggibadan'].' cm'.'</td>'.'<td>'.'Hati'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['hati'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Berat Badan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['beratbadan'].' kg'.'</td>'.'<td>'.'Abdomen'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['abdomen'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Tekanan Darah'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['tekanandarah'].' mm/Hg'.'</td>'.'<td>'.'Tangan Tungkai'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['tangantungkai'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Nadi'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['nadi'].' /menit'.'</tr>' ;
echo '<tr>'.'<td>'.'Pernafasan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['pernafasan'].' /menit'.'</td>'.'</tr>' ;
echo '</table>' ;

echo '<table>' ;
echo '<tr>'.'<td>'.'<b>PEMERIKSAAN KEBIDANAN</b>'.'</td>'.'<td>'.'</td>'.'<td Style="WIDTH:150">'.'</td>'.'<td>'.'<b>PEMERIKSAAN LABORATORIUM</b>'.'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Tinggi Fundus Uteri'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['tinggifundus'].' cm'.'</td>'.'<td>'.'Hb (haemoglobin)'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['hb'].' gr/dl'.'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'</td>'.'<td>'.'</td>'.'<td>'.$kartuibu['bentukfundus'].'</td>'.'<td>'.'URINE'.'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Bentuk Uterus'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['bentukuterus'].'</td>'.'<td>'.'=> albumine'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['albumine'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Letak Janin'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['letakjanin'].'</td>'.'<td>'.'=> reduksi'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['reduksi'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Gerak Janin'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['gerakjanin'].'</td>'.'<td>'.'Faeces'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['faeces'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Detak Jantung Janin'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['detakjantungjanin'].' /menit'.'</td>'.'<td>'.'Darah Tepi'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['malaria'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Inspekulo'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['inspekulo'].'</td>'.'<td>'.'Golongan Darah'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['golda'].'</td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Perdarahan'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['perdarahan'].'</td>'.'<td>'.'</tr>' ;
echo '<tr>'.'<td>'.'Pemeriksaan Dalam Atas Indikasi'.'</td>'.'<td>:</td>'.'<td>'.$kartuibu['pemeriksaanindikasi'].'</td>'.'</tr>' ;
echo '</table>' ;
}else{
	}
?>

</fieldset>
</body>
</html>

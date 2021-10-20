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
<h4><u>KUNJUNGAN BEROBAT SEBELUMNYA</u></h4>
<table class="cinereousTable">
    
        <tr>
			<th>NO</th>
            <th>TANGGAL</th>
			<th>PEMERIKSAAN<br>VITAL</th>
            <th>KELUHAN<br>UTAMA</th>
			<th>PEMERIKSAAN</th>
            <th>DIAGNOSA</th>
            <th>PERAWATAN<br>TINDAKAN</th>
            <th>PENGOBATAN</th>
			<th>KETERANGAN</th>
			<th>POLI</th>
			<th>DOKTER/<br>BIDAN</th>
        </tr>
		</thead>
    <tbody>
    
<?php include("config.php");
    if(isset($_GET['nik'])) {    
        $nik = (int)$_GET['nik'];
		$sqlper = " SELECT * FROM perawatan WHERE nik=$nik order by tanggal ASC";
		$queryper = mysqli_query($db, $sqlper);
		$no = 1 ;

        while($pasienper = mysqli_fetch_array($queryper)){
            echo "<tr>";
			echo "<td>"; echo $no++ ; echo "</td>";
            echo "<td>".date("d-m-Y ", strtotime($pasienper['tanggal']))."</td>";
			echo "<td>" ;
			echo "TD : ".$pasienper['td']." mmHg" ;
			echo "<br>HR : ".$pasienper['hr']." bpm" ;
			echo "<br>RR : ".$pasienper['rr']." /menit" ;
			echo "<br>Temp : ".$pasienper['temp']." celcius" ;
			echo "</td>";
			echo "<td>".$pasienper['keluhan']."</td>";
            echo "<td>".nl2br(htmlspecialchars($pasienper['pemeriksaanawal']))."<br>".nl2br(htmlspecialchars($pasienper['pemeriksaanlanjutan']))."</td>";
            echo "<td>".$pasienper['diagnosa']."</td>";
            echo "<td>".nl2br(htmlspecialchars($pasienper['perawatan']))."</td>";
            echo "<td>".nl2br(htmlspecialchars($pasienper['pengobatan']))."</td>";
            echo "<td>".nl2br(htmlspecialchars($pasienper['keterangan']))."</td>";
			echo "<td>".$pasienper['poli']."</td>";
			echo "<td>".$pasienper['nakes']."</td>";
            echo "</tr>";
        }
	}else{
}

?>

    </tbody>
    </table>
	
<p>JUMLAH KUNJUNGAN BEROBAT : <?php echo mysqli_num_rows($queryper) ?></p>

</fieldset>

</body>

</html>

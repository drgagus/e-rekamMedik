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
</fieldset >

<fieldset style="background:#F5DEB3";>
<h4><u>PEMERIKSAAN LABORATORIUM</u></h4>
<table class="cinereousTable">
    
        <tr>
			<th>NO</th>
            <th>TANGGAL</th>
			<th>POLI</th>
			<th>PEMERIKSAAN</th>
            <th>HASIL</th>
            
			
        </tr>
		</thead>
    <tbody>
    
<?php include("config.php");
    if(isset($_GET['nik'])) {    
        $nik = (int)$_GET['nik'];
		$sql = " SELECT * FROM hasillab WHERE nik=$nik order by tanggal ASC";
		$query = mysqli_query($db, $sql);
		$no = 1 ;

        while($pasien = mysqli_fetch_array($query)){
            echo "<tr>";
			echo "<td><center>"; echo $no++ ; echo "<center></td>";
            echo "<td>".date("d-m-Y ", strtotime($pasien['tanggal']))."</td>";
            echo "<td>".$pasien['poli']."</td>";
            echo "<td>" ;
			if (empty ($pasien['hb'])){	
		}else{	echo "<br>HB" ;
		}
		if (empty ($pasien['leukosit'])){
		}else{	echo "<br>Leukosit" ;
		}
		if (empty ($pasien['trombosit'])){
		}else{	echo "<br>Trombosit" ;
		}
		if (empty ($pasien['haematokrit'])){
		}else{	echo "<br>Haematokrit" ;
		}
		if (empty ($pasien['hcgtest'])){
		}else{	echo "<br>HCG Test" ;
		}
		if (empty ($pasien['golongandarah'])){
		}else{	echo "<br>Golongan Darah" ;
		}
		if (empty ($pasien['dengue'])){
		}else{	echo "<br>Dengue IgG/IgM" ;
		}
		if (empty ($pasien['antihiv'])){
		}else{	echo "<br>Anti HIV" ;
		}
		if (empty ($pasien['urine rutin'])){
		}else{	echo "<br>Urine Rutin" ;
		}
		if (empty ($pasien['urinelengkap'])){
		}else{	echo "<br>Urine Lengkap" ;
		}
		if (empty ($pasien['cholesterol'])){
		}else{	echo "<br>Cholesterol" ;
		}
		if (empty ($pasien['asamurat'])){
		}else{	echo "<br>Asam Urat" ;
		}
		if (empty ($pasien['guladarahsewaktu'])){
		}else{	echo "<br>Gula Darah Sewaktu" ;
		}
		if (empty ($pasien['guladarahpuasa'])){
		}else{	echo "<br>Gula Darah Puasa" ;
		}
		if (empty ($pasien['guladarahpostprandia'])){
		}else{	echo "<br>Gula Darah Post Prandia" ;
		}
		if (empty ($pasien['malaria'])){
		}else{	echo "<br>Malaria" ;
		}
		if (empty ($pasien['sewaktu'])){
		}else{	echo "<br>Sputum Mikroskopis Sewaktu";
		}
		if (empty ($pasien['pagi'])){
		}else{	echo "<br>Sputum Mikroskopis Pagi" ;
		}
			echo"</td>";
			echo "<td>";
		if (empty ($pasien['hb'])){	
		}else{	echo "<br>".$pasien['hb']." gram/dl" ;
		}
		if (empty ($pasien['leukosit'])){
		}else{	echo "<br>".$pasien['leukosit']." mikroliter" ;
		}
		if (empty ($pasien['trombosit'])){
		}else{	echo "<br>".$pasien['trombosit']." mikroliter" ;
		}
		if (empty ($pasien['haematokrit'])){
		}else{	echo "<br>".$pasien['haematokrit']." %(persen)" ;
		}
		if (empty ($pasien['hcgtest'])){
		}else{	echo "<br>".$pasien['hcgtest'] ;
		}
		if (empty ($pasien['golongandarah'])){
		}else{	echo "<br>".$pasien['golongandarah'] ;
		}
		if (empty ($pasien['dengue'])){
		}else{	echo "<br>".$pasien['dengue'] ;
		}
		if (empty ($pasien['antihiv'])){
		}else{	echo "<br>".$pasien['antihiv'] ;
		}
		if (empty ($pasien['urine rutin'])){
		}else{	echo "<br>".$pasien['urinerutin'] ;
		}
		if (empty ($pasien['urinelengkap'])){
		}else{	echo "<br>".$pasien['urinelengkap'] ;
		}
		if (empty ($pasien['cholesterol'])){
		}else{	echo "<br>".$pasien['cholesterol']." mg/dl" ;
		}
		if (empty ($pasien['asamurat'])){
		}else{	echo "<br>".$pasien['asamurat']." mg/dl" ;
		}
		if (empty ($pasien['guladarahsewaktu'])){
		}else{	echo "<br>".$pasien['guladarahsewaktu']." mg/dl" ;
		}
		if (empty ($pasien['guladarahpuasa'])){
		}else{	echo "<br>".$pasien['guladarahpuasa']." mg/dl" ;
		}
		if (empty ($pasien['guladarahpostprandia'])){
		}else{	echo "<br>".$pasien['guladarahpostprandia']." mg/dl" ;
		}
		if (empty ($pasien['malaria'])){
		}else{	echo "<br>".$pasien['malaria'] ;
		}
		if (empty ($pasien['sewaktu'])){
		}else{	echo "<br>".$pasien['sewaktu'];
		}
		if (empty ($pasien['pagi'])){
		}else{	echo "<br>".$pasien['pagi'] ;
		}
            echo "</tr>";
        }
	}else{
}

?>

    </tbody>
    </table>
	
</fieldset>

</body>

</html>

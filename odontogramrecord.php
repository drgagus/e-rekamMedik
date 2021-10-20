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
    
<?php 
include("config.php");
    if(isset($_GET['nik'])) {    
        $nik = (int)$_GET['nik'];
		$sql = " SELECT * FROM odontogram WHERE nik=$nik ";
		$query = mysqli_query($db, $sql);
		$pasien = mysqli_fetch_array($query);
		
	echo "<table>";	
	echo "<tr>" ;
	echo "<td>" ; echo "<h4><u>ODONTOGRAM</u></h4>" ; echo "</td>" ;
	echo "</tr>" ;

    
    echo "<tr style='text-align: center'>";
	echo "<td>" ; echo "</td>" ;
	echo "<td>" .$pasien ['gigi18']. "</td>" ; 
	echo "<td>" .$pasien ['gigi17']. "</td>";  
	echo "<td>" .$pasien ['gigi16']. "</td>" ; 
	echo "<td>" .$pasien ['gigi15']. "</td>" ; 
	echo "<td>" .$pasien ['gigi14']. "</td>" ; 
	echo "<td>" .$pasien ['gigi13']. "</td>" ; 
	echo "<td>" .$pasien ['gigi12']. "</td>" ; 
	echo "<td>" .$pasien ['gigi11']. "</td>" ; 
	echo "<td>" ."|". "</td>" ; 
	echo "<td>" .$pasien ['gigi21']. "</td>" ; 
	echo "<td>" .$pasien ['gigi22']. "</td>" ; 
	echo "<td>" .$pasien ['gigi23']. "</td>" ; 
	echo "<td>" .$pasien ['gigi24']. "</td>" ; 
	echo "<td>" .$pasien ['gigi25']. "</td>" ; 
	echo "<td>" .$pasien ['gigi26']. "</td>" ; 
	echo "<td>" .$pasien ['gigi27']. "</td>" ; 
	echo "<td>" .$pasien ['gigi28']. "</td>" ;
	echo "</tr>";

	echo "<tr  style='text-align: center'>";
	echo "<td>"."</td>" ;
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ;  
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."|"."</td>"; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ;  
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "<td>"."--------"."</td>" ; 
	echo "</tr>";

	echo "<tr  style='text-align: center'>";
	echo "<td>"."</td>" ;
	echo "<td>" .$pasien ['gigi48']. "</td>" ; 
	echo "<td>" .$pasien ['gigi47']. "</td>" ;  
	echo "<td>" .$pasien ['gigi46']. "</td>" ; 
	echo "<td>" .$pasien ['gigi45']. "</td>" ; 
	echo "<td>" .$pasien ['gigi44']. "</td>" ; 
	echo "<td>" .$pasien ['gigi43']. "</td>" ; 
	echo "<td>" .$pasien ['gigi42']. "</td>" ; 
	echo "<td>" .$pasien ['gigi41'] ."</td>" ; 
	echo "<td>"."|"."</td>" ;
	echo "<td>" .$pasien ['gigi31']. "</td>" ; 
	echo "<td>" .$pasien ['gigi32']. "</td>" ; 
	echo "<td>" .$pasien ['gigi33']. "</td>" ; 
	echo "<td>" .$pasien ['gigi34']. "</td>" ; 
	echo "<td>" .$pasien ['gigi35']. "</td>" ; 
	echo "<td>" .$pasien ['gigi36']. "</td>" ; 
	echo "<td>" .$pasien ['gigi37']. "</td>" ; 
	echo "<td>" .$pasien ['gigi38']. "</td>" ;
	echo "</tr>";
	echo "</table>";
	
	echo "<table>";
	echo "<tr><td>PERIODONTAL</td><td>:</td><td>".$pasien['periodontal']."</td></tr>";
	echo "<tr><td>KARANG GIGI</td><td>:</td><td>".$pasien['karanggigi']."</td></tr>";
	echo "<tr><td>MENYIKAT GIGI</td><td>:</td><td>".$pasien['sikatgigi']."</td></tr>";
	echo "<tr><td></td></tr>";
	echo "</table>";
	
	echo "<table>";
	echo "<tr><td>Oral Hygiene Index Simplified (OHIS)</td><td>:</td><td>".$pasien['ohis']."</td></tr>";
	echo "</table>";
	
	}else{
}

?>

</table>
</fieldset>
</body>
</html>

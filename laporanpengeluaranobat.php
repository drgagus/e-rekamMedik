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
<title>PENGELUARAN OBAT</title>
<IMG src="PuskesmasKelarik2.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>
<body
background=>
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  text-align: center;
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
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
<center>
<table>
	<tr><td><b><center>LAPORAN PENGELUARAN OBAT</center></b></td></tr>
	<tr><td><b><center>RAWAT JALAN TINGKAT PERTAMA (RJTP)</center></b></td></tr>
	<tr><td><b><center>
<?php 
if(isset($_POST['OK'])){
	$cari = $_POST['OK'];
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	echo "Bulan " ;
		if ($bulan == "01") {echo "Januari " ;
		} else if ($bulan == "02") {echo "Februari " ;
		} else if ($bulan == "03") {echo "Maret " ;
		} else if ($bulan == "04") {echo "April " ;
		} else if ($bulan == "05") {echo "Mei " ;
		} else if ($bulan == "06") {echo "Juni " ;
		} else if ($bulan == "07") {echo "Juli " ;
		} else if ($bulan == "08") {echo "Agustus " ;
		} else if ($bulan == "09") {echo "September " ;
		} else if ($bulan == "10") {echo "Oktober " ;
		} else if ($bulan == "11") {echo "November " ;
		} else {echo "Desember " ;
	}
	echo " Tahun ".$tahun ;
}else {
}
?></b></center></td></tr>
</table>
</center>

<table class="blueTable">
	<tr>
		<th>No</th>
		<th>TANGGAL</th>
        <th>KATEGORI<br>PASIEN</th>
        <th>NAMA</th>
        <th>UMUR</th>
        <th>JENIS<br>KELAMIN</th>
		<th>POLI</th>
		<th>DOKTER/<br>BIDAN</th>
		<th>OBAT KELUAR</th>
		<th>JUMLAH</th>
		<th>APOTEKER</th>
	</tr>
	
<?php 
	include ("config.php") ;
	
	if(isset($_POST['OK'])){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$sql = " select * from pengeluaranobat JOIN datapasien using (nik) WHERE MONTH(tanggal) = $bulan AND YEAR (tanggal) = $tahun order by tanggal";
		$query = mysqli_query($db, $sql);
	
	$no = 1;
	while($pasien = mysqli_fetch_array($query)){
	
			echo "<tr>" ;
			echo "<td>" ; echo $no++; echo "</td>" ;
			echo "<td>".date("d-m-Y ", strtotime($pasien['tanggal']))."</td>";
            echo "<td>".$pasien['katpas']."</td>";
            echo "<td>".$pasien['nama']."</td>";
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
            echo "<td>".$pasien['jeniskelamin']."</td>";
			echo "<td>".$pasien['poli']."</td>";
			echo "<td>".$pasien['nakes']."</td>";
            echo "<td>" ;
		if (empty ($pasien['obat1'])){	
		}else{	echo $pasien['obat1']."<br>" ;
		}
		if (empty ($pasien['obat2'])){	
		}else{	echo $pasien['obat2']."<br>" ;
		}
		if (empty ($pasien['obat3'])){	
		}else{	echo $pasien['obat3']."<br>" ;
		}
		if (empty ($pasien['obat4'])){	
		}else{	echo $pasien['obat4']."<br>" ;
		}
		if (empty ($pasien['obat5'])){	
		}else{	echo $pasien['obat5'] ;
		}
			echo"</td>";
			echo "<td>" ;
		if (empty ($pasien['jumlah1'])){	
		}else{	echo $pasien['jumlah1']."<br>" ;
		}
		if (empty ($pasien['jumlah2'])){	
		}else{	echo $pasien['jumlah2']."<br>" ;
		}
		if (empty ($pasien['jumlah3'])){	
		}else{	echo $pasien['jumlah3']."<br>" ;
		}
		if (empty ($pasien['jumlah4'])){	
		}else{	echo $pasien['jumlah4']."<br>" ;
		}
		if (empty ($pasien['jumlah5'])){	
		}else{	echo $pasien['jumlah5'] ;
		}
			echo"</td>";
			echo "<td>".$pasien['apoteker']."</td>";
            echo "</tr>";
			
	}		
		
	}else{
		echo "<tr>" ;
			echo "<td>" ; echo $no++ ; echo "</td>" ;
			echo "<td>"; echo "</td>";
            echo "<td>"; echo "</td>";
            echo "<td>"; echo "</td>";
			echo "<td>"; echo "</td>";
            echo "<td>"; echo "</td>";
            echo "<td>"; echo "</td>";
            echo "</tr>";
		
		}
	
?>
</table>
<p></p>
<?php 
	include ("config.php") ;
	
	if(isset($_POST['OK'])){
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$sql = " select * from pengeluaranobat JOIN datapasien using (nik) WHERE MONTH(tanggal) = $bulan AND YEAR (tanggal) = $tahun  order by tanggal";
		$query = mysqli_query($db, $sql);
		echo "JUMLAH PASIEN RESEP OBAT : ".mysqli_num_rows($query)." kunjungan" ;
	}else{
	}

?>

</body>

<html>
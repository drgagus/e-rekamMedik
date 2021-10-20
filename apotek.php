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
<title>APOTEK</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">
<style>
table.redTable {
  border: 2px solid #A40808;
  background-color: #EEE7DB;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
}
table.redTable td, table.redTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.redTable tbody td {
  font-size: 13px;
}
table.redTable tr:nth-child(even) {
  background: #F5C8BF;
}
table.redTable thead {
  background: #A40808;
}
table.redTable thead th {
  font-size: 19px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #A40808;
}
table.redTable thead th:first-child {
  border-left: none;
}

table.redTable tfoot {
  font-size: 13px;
  font-weight: bold;
  color: #FFFFFF;
  background: #A40808;
}
table.redTable tfoot td {
  font-size: 13px;
}
table.redTable tfoot .links {
  text-align: right;
}
table.redTable tfoot .links a{
  display: inline-block;
  background: #FFFFFF;
  color: #A40808;
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

<fieldset style="background:lightblue";>
<form action="menu.php" method="POST">
<input type="submit" name="antrianapotek" value="ANTRIAN OBAT" Style="WIDTH:110"; /> 
<input type="submit" name="stokobat" value="STOK OBAT" Style="WIDTH:110"; /> 
<input type="submit" name="rekapitulasiobat" value="REKAPITULASI" Style="WIDTH:110"; /> 
</form>

<h4><b>SELAMAT DATANG <?php echo $_SESSION['nama'] ; ?></b></h4>

<table Style="background:lightblue"; >
<form action="apotek.php" method="POST" >
	<tr><td><label>Cari Pasien (Nama Pasien)</label><td>:</td></td>
	<td><input type="text" name="nama" required/></td>
	<td><input type="submit" name="carinama" value="CARI"/></td></tr>
</form>
<form action="apotek.php" method="POST" >
	<tr><td><label>Cari Pasien (No. Rekam Medis)</label><td>:</td></td>
	<td><input type="text" name="norm" required/></td>
	<td><input type="submit" name="carinorm" value="CARI"/></td></tr>
</form>
</table>
 
<p><u><b>Daftar Pasien</b></u>
<table class="redTable">
	<tr>
		<th>No</th>
		<th>NO REKAM MEDIS</th>
        <th>NAMA</th>
        <th>UMUR</th>
        <th>JENIS KELAMIN</th>
        <th>ALAMAT</th>
		<th></th>
	</tr>
	
<?php 
	include ("config.php") ;
	
	if(isset($_POST['carinama'])){
		$nama = mysqli_real_escape_string($db,$_POST['nama']);
		$sql = " select * from datapasien WHERE nama like '%".$nama."%' " ;
		$query = mysqli_query($db, $sql);
	
	$no = 1;
	while($pasien = mysqli_fetch_array($query)){
	
			echo "<tr>" ;
			echo "<td>" ; echo $no++; echo "</td>" ;
			echo "<td>".$pasien['norm']."</td>";
            echo "<td style='text-align:left'>".$pasien['nama']. "</td>";
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
            echo "<td style='text-align:left'>".$pasien['alamat']." RT/RW ".$pasien['rt']."/".$pasien['rw']." ".$pasien['desakelurahan']."</td>";
			
			echo "<td>" ;
            echo "<a href='poliumum.php?nik=".$pasien['nik']."' >RESEP OBAT</a>";
			echo "</td>";

            echo "</tr>";
	}		
		
	}elseif(isset($_POST['carinorm'])){
		$norm = mysqli_real_escape_string($db,$_POST['norm']);
		$sql = " select * from datapasien WHERE norm='$norm' " ;
		$query = mysqli_query($db, $sql);
	
	$no = 1;
	while($pasien = mysqli_fetch_array($query)){
	
			echo "<tr>" ;
			echo "<td>" ; echo $no++; echo "</td>" ;
			echo "<td>".$pasien['norm']."</td>";
            echo "<td style='text-align:left'>".$pasien['nama']. "</td>";
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
            echo "<td style='text-align:left'>".$pasien['alamat']." RT/RW ".$pasien['rt']."/".$pasien['rw']." ".$pasien['desakelurahan']."</td>";
			
			echo "<td>" ;
            echo "<a href='resepobat.php?nik=".$pasien['nik']."'>RESEP OBAT</a>";
			echo "</td>";

            echo "</tr>";
	}		
		
	}else{
		
		$sql = "SELECT * FROM datapasien order by norm";
        $query = mysqli_query($db, $sql);
		$no = 1;
        while($pasien = mysqli_fetch_array($query)){
            echo "<tr>";
			echo "<td>" ; echo $no++; echo "</td>" ;
            echo "<td>".$pasien['norm']."</td>";
            echo "<td style='text-align:left'>".$pasien['nama']."</td>";
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
            echo "<td style='text-align:left'>".$pasien['alamat']." RT/RW ".$pasien['rt']."/".$pasien['rw']." ".$pasien['desakelurahan']."</td>";
	
			echo "<td>" ;
            echo "<a href='resepobat.php?nik=".$pasien['nik']."'>RESEP OBAT</a>";
			echo "</td>";

            echo "</tr>";
		}
	}
	
?>
</table>
</fieldset>

</body>
</html>


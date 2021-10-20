<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "pendaftaran"){
						header("location:pendaftaran.php");
					}elseif ($_SESSION['posisi'] == "nurse"  or  $_SESSION['posisi'] == "drgpython" ){
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
<title>PEMERIKSAAN AWAL</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta http-equiv="refresh" content="60" />
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">
<style>
table.customTable {
  background-color: #FFFFFF;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #7ea8f8;
  border-style: solid;
  color: #000000;
}

table.customTable td, table.customTable th {
  border-width: 2px;
  border-color: #7ea8f8;
  border-style: solid;
  padding: 5px;
}

table.customTable thead {
  background-color: #7ea8f8;
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
<input type="submit" name="pemeriksaan" value="PEMERIKSAAN" Style="background:lime; WIDTH:150; color:blue"; />  
<input type="submit" name="poliumum" value="POLI UMUM" Style="WIDTH:150; color:blue"; />  
<input type="submit" name="poligigi" value="POLI GIGI" Style="WIDTH:150; color:blue";/>
<input type="submit" name="polikia" value="POLI KIA" Style="WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; />  
</form>

<fieldset  style="background:#FFFACD";>
<h4><b>SELAMAT DATANG <?php echo $_SESSION['nama'] ; ?></b></h4>
<h3><label>DAFTAR ANTRIAN</label></h3>
<table class="customTable">
	<tr>
		<th>NO ANTRIAN</th>
		<th>NO REKAM MEDIS</th>
        <th>NAMA</th>
		<th></th>
	</tr>
	
<?php 
	include ("config.php") ;
	
	if(isset($_POST['carinama'])){
		$nama = mysqli_real_escape_string($db,$_POST['nama']);
		$sql = " select * from ruangtunggu WHERE nama like '%".$nama."%' order by noantri " ;
		$query = mysqli_query($db, $sql);
	
	while($pasien = mysqli_fetch_array($query)){
			echo "<tr>" ;
			echo "<td><center>".$pasien['noantri']."</center></td>";
			echo "<td><center>".$pasien['norm']."</center></td>";
            echo "<td>".$pasien['nama']. "</td>";
			echo "<td>" ;
            echo "<a href='periksaawal.php?nik=".$pasien['nik']."' >PEMERIKSAAN</a>";
			echo "</td>";
            echo "</tr>";
	}		
		
	}elseif(isset($_POST['carinorm'])){
		$norm = mysqli_real_escape_string($db,$_POST['norm']);
		$sql = " select * from ruangtunggu WHERE norm='$norm' order by noantri " ;
		$query = mysqli_query($db, $sql);
	
	while($pasien = mysqli_fetch_array($query)){
			echo "<tr>" ;
			echo "<td><center>".$pasien['noantri']."</center></td>";
			echo "<td><center>".$pasien['norm']."</center></td>";
            echo "<td>".$pasien['nama']. "</td>";
			echo "<td>" ;
            echo "<a href='periksaawal.php?nik=".$pasien['nik']."' >PEMERIKSAAN</a>";
			echo "</td>";
            echo "</tr>";
	}		
		
	}else{
		
		$sql = "SELECT * FROM ruangtunggu order by noantri";
        $query = mysqli_query($db, $sql);
		while($pasien = mysqli_fetch_array($query)){
			echo "<tr>" ;
			echo "<td><center>".$pasien['noantri']."</center></td>";
			echo "<td><center>".$pasien['norm']."</center></td>";
            echo "<td>".$pasien['nama']. "</td>";
			echo "<td>" ;
            echo "<a href='periksaawal.php?nik=".$pasien['nik']."' >PEMERIKSAAN</a>";
			echo "</td>";
            echo "</tr>";
		}
	}
	
?>
</table>
</fieldset>

</body>

</html>

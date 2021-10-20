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
<title>APOTEK - STOK OBAT</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
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
<table>
<tr><td><b><a href='stockobat.php' Style='color:darkblue'; >STOK OBAT</a></b></td><td> - </td><td><b><a href='obatbaru.php' Style='color:darkblue'; >OBAT BARU</a></b></td></tr>
	<tr><td></td></tr>
</table>
<form action="stockobat.php" method="POST">
<table>
	<tr>
	<td><label>Cari Nama Obat</label></td>
	<td>:</td>
	<td><input type="text" name="namaobat" required/></td>
	<td><input type="submit" name="cari" value="Cari"/></td>
	</tr>
</table>
</form>

<?php 
if(isset($_POST['cari'])){
	$obat = mysqli_real_escape_string($db,$_POST['namaobat']);
	echo "<b>Hasil pencarian nama obat: ".$obat."</b>";
}
?>


<table class="blueTable">
	<tr>
		<th>No</th>
		<th>NAMA OBAT</th>
        <th>JUMLAH</th>
		<th></th>
	</tr>
	
<?php 
	include ("config.php") ;
	
	if(isset($_POST['cari'])){
		$obat = mysqli_real_escape_string($db,$_POST['namaobat']) ;
		$sql = " select * from stockobat WHERE namaobat like '%".$obat."%' " ;
		$query = mysqli_query($db, $sql);
	
	$no = 1;
	while($daftarobat = mysqli_fetch_array($query)){
	
			echo "<tr>" ;
			echo "<td>" ; echo $no++; echo "</td>" ;
			echo "<td>".$daftarobat['namaobat']."</td>";
            echo "<td><center>".$daftarobat['stock']. "</center></td>";
			echo "<td>";
			echo "<a href='obatkeluar.php?namaobat=".$daftarobat['namaobat']."'>KELUAR</a> - ";
			echo "<a href='obatmasuk.php?namaobat=".$daftarobat['namaobat']."'> MASUK</a>";
			echo "</td>";
            echo "</tr>";
            
	}		
		
	}else{
		
		$sql = "SELECT * FROM stockobat order by namaobat";
        $query = mysqli_query($db, $sql);
		$no = 1;
        while( $daftarobat = mysqli_fetch_array($query)){
            echo "<tr>";
			echo "<td>" ; echo $no++; echo "</td>" ;
            echo "<td>".$daftarobat['namaobat']."</td>";
            echo "<td><center>".$daftarobat['stock']. "</center></td>";
            echo "<td>";
			echo "<a href='obatkeluar.php?namaobat=".$daftarobat['namaobat']."'>KELUAR</a> - ";
			echo "<a href='obatmasuk.php?namaobat=".$daftarobat['namaobat']."'> MASUK</a>";
			echo "</td>";
            echo "</tr>";
		}
	}
	
?>
</table>
</fieldset>

</body>
</html>
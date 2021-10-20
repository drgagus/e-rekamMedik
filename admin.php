<?php
SESSION_START() ;
				if($_SESSION['posisi'] == "drgpython" ){
					}elseif ($_SESSION['posisi'] == "pendaftaran"){
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
<title>ADMIN</TITLE>
</head>



<body
background="blue.jpg">
<style>
table.blueTable {
	width:100%;
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  border-collapse: collapse;
}
table.blueTable td {

  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}

table.blueTable th {
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

<?PHP
include ("config.php");
if (isset($_POST['registrasi'])){
	$nama = $_POST['nama'];
	$user = $_POST['pemakai'];
	$posisi = $_POST['posisi'];
	$katasandi = password_hash($_POST['katasandi'], PASSWORD_DEFAULT);
	$pass = "INSERT INTO userpass VALUES ('$posisi', '$nama', '$user', '$katasandi')";
	$querpass = mysqli_query($db, $pass);
	
}elseif (isset($_POST['selesai'])){
	include ("config.php");
   
	$katasandi = password_hash($_POST['katasandi'], PASSWORD_DEFAULT);
	$sqlup = "UPDATE userpass SET katasandi='$katasandi' WHERE pengguna='$user' ";
	$queryup = mysqli_query($db, $sqlup);
	
	
}
?>
<fieldset  style="background:#FFFACD; color:red";>
<center><table><td style="color:red";><b><h2>|==HALAMAN   ADMIN==|</h2></b></label></td></tr></table></center>
<table><tr><td>

</td></tr></table>
</fieldset>
<fieldset style="background:#FF6347";>

 | 
<a href='pendaftaran.php' target="_blank" Style='color:darkblue'; ><b>PENDAFTARAN</b></a> | 
<a href='pemeriksaan.php' target="_blank" Style='color:darkblue'; ><b>PEMERIKSAAN AWAL</b></a> | 
<a href='poliumum.php'  target="_blank" Style='color:darkblue'; ><b>POLI UMUM</b></a> | 
<a href='poligigi.php' target="_blank" Style='color:darkblue'; ><b>POLI GIGI</b></a> | 
<a href='polikia.php' target="_blank" Style='color:darkblue'; ><b>POLI KIA</b></a> | 
<a href='laboratorium.php' target="_blank" Style='color:darkblue'; ><b>LABORATORIUM</b></a> | 
<a href='apotek.php' target="_blank" Style='color:darkblue'; ><b>APOTEK</b></a> | 
<a href='ugd.php' target="_blank" Style='color:darkblue'; ><b>UGD</b></a> | 

<h4><b>SELAMAT DATANG <a href='admin.php' Style='color:darkblue'; ><?php echo $_SESSION['nama'] ; ?></a></b></h4>
<table style="background:YELLOW";>

<tr><td><b><u>TAMBAH AKUN</u></B></td></tr>
</table>
<table style="background:YELLOW";>
<form action="admin.php" method="POST")>
<tr><td><label>NAMA LENGKAP</label></td><td><input type="text" name="nama" style="width:200" required/></td></tr>
<tr><td><label>USERNAME</label></td><td><input type="text" name="pemakai" style="width:200" required/></td></tr>
<tr><td><label>POSISI</label></td><td><select type="text" name="posisi" style="width:200" required/>
		<option value="">--pilih posisi--</option>
		<option value="pendaftaran">PENDAFTARAN</option> 
		<option value="nurse">PEMERIKSAAN AWAL</option> 
		<option value="dokterumum">POLI UMUM</option> 
		<option value="doktergigi">POLI GIGI</option> 
		<option value="bidan">POLI KIA</option> 
		<option value="analiskesehatan">LABORATORIUM</option>
		<option value="apoteker">APOTEK</option> 
		<option value="dokterugd">UGD</option> 
</select></td></tr>
<tr><td><label>PASSWORD</label></td><td><input type="password" name="katasandi" style="width:200" required/></td></tr>
<tr><td></td><td><input type="submit" name="registrasi" value="registrasi" /></td></tr>
</form>

</table>

<table class="blueTable">
	<tr>
		<th>NO</th>
		<th>POSISI</th>
		<th>NAMA LENGKAP</th>
        <th>USERNAME</th>
		<th>PASSWORD</th>
		<th></th>
	</tr>
	
<?php 
	include ("config.php") ;
	
	
		$sql = "SELECT * FROM userpass order by nakes";
        $query = mysqli_query($db, $sql);
		$no = 1;
        while( $user = mysqli_fetch_array($query)){
            echo "<tr>";
			echo "<td><center>" ; echo $no++; echo "</center></td><td>" ;
            if ($user['posisi'] == "drgpython"){
				echo "Admin e-rekamMedik";
			}elseif ($user['posisi'] == "pendaftaran"){
				echo "PENDAFTARAN";
			}elseif($user['posisi'] == "nurse"){
				echo "PEMERIKSAAN AWAL";
				}elseif($user['posisi'] == "dokterumum"){
				echo "POLI UMUM";
			}elseif($user['posisi'] == "doktergigi"){
				echo "POLI GIGI";
			}elseif($user['posisi'] == "bidan"){
				echo "POLI KIA";
			}elseif($user['posisi'] == "analiskesehatan"){
				echo "LABORATORIUM";
			}elseif($user['posisi'] == "apoteker"){
				echo "APOTEK";
			}elseif($user['posisi'] == "dokterugd"){
				echo "UGD";
			}else{	
			}
            echo "</td><td>".$user['nakes']. "</td>";
			echo "<td><center>".$user['pengguna']. "</center></td>";
			echo "<td>********</td>";
			echo "<td><center><a href='adminhapus.php?user=".$user['pengguna']."'  Style='color:darkblue'; onclick = 'return confirm(\"Yakin ingin menghapus user ini?\");'>HAPUS AKUN</a></center>";
            echo "</tr>";
		}

	
?>
</table>
<br>
<form action="indexproses.php" method="POST">
<input type="submit" name="keluar" value="LOGOUT" style="background:red; color:yellow"; />
</form>
</fieldset>
</body>
</html>
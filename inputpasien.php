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
<title>PENDAFTARAN</title>
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

<table>
<form action="inputpasienproses.php" method="POST">
	<tr><td><h3><u>INPUT DATA PASIEN</u><h3></td></tr>
	<td><label>NAMA </LABEL></td><td>:</td><td><input type="text" name="nama" title="isi dengan HURUF KAPITAL" style="width:400px" required/></td>
	</tr>
	<tr>
	<td><label>NO KTP (NIK) </LABEL></td><td>:</td><td><input type="text" name="nik" title="isi dengan ANGKA"  pattern="[0-9]+" style="width:400px" required/></td>
	</tr>
	<tr>
	<td><label>NAMA KEPALA KELUARGA </LABEL></td><td>:</td><td><input type="text" name="kepalakeluarga" title="isi dengan HURUF KAPITAL"  style="width:400px" required/></td>
	</tr>
	<tr>
	<td><label>NO KARTU KELUARGA </LABEL></td><td>:</td><td><input type="text" name="kk" title="isi dengan ANGKA"   pattern="[0-9]+" style="width:400px" required/></td>
	</tr>
	<tr>
	<td>TEMPAT LAHIR</td><td>:</td>
	<td><input type="text" name="tempatlahir" STYLE="WIDTH:400" required/></td>
	</tr> 
	<tr>
	<td><label>TANGGAL LAHIR </LABEL></td><td>:</td><td><input type="date" name="tgllahir" style="width:400px" required/></td>
	</tr>
	<tr>
	<td><label>JENIS KELAMIN </LABEL></td><td>:</td><td><input type="radio" id="cow" name="jeniskelamin" value="Laki - laki"><label for="cow">Laki - Laki</label> <input type="radio" id="cew" name="jeniskelamin" Value="Perempuan" ><label for="cew">Perempuan</label> </td>
	</tr>
	<tr>
	<td><label>STATUS </LABEL></td><td>:</td><td><select name="status" STYLE="WIDTH:400" required > <option value="">--pilih--</option> <option value="BELUM MENIKAH">BELUM MENIKAH</option> <option value="MENIKAH"> MENIKAH </option> </select></td>
	</tr>
	<tr>
	<td><label>AGAMA </LABEL></td><td>:</td><td><select name="agama" STYLE="WIDTH:400" required > 
		<option value="">--pilih agama--</option>
		<option value="ISLAM">ISLAM</option> 
		<option value="KRISTEN">KRISTEN</option> 
		<option value="KATOLIK">KATOLIK</option> 
		<option value="BUDHA">BUDHA</option> 
		<option value="HINDU">HINDU</option> 
		<option value="KONG HU CHU">KONG HU CHU</option></select></td>
	</tr>
	<tr>
	<td><label>PENDIDIKAN </label></td><td>:</td><td> <select name="pendidikan" STYLE="WIDTH:400" required > 
		<option value="">--pilih pendidikan--</option>
		<option value="Belum/Tidak Tamat SD/Sederajat">Tidak/Belum Tamat SD/Sederajat</option> 
		<option value="SD/MI/Sederajat">SD/MI/Sederajat</option> 
		<option value="SLTP/MTs/Sederajat">SLTP/MTs/Sederajat</option> 
		<option value="SLTA/SMK/MA/Sederajat">SLTA/SMK/MA/Sederajat</option> 
		<option value="Diploma I/II">Diploma I/II</option> 
		<option value="Diploma III/Sarjana Muda">Diploma III/Sarjana Muda</option> 
		<option value="Diploma IV/S1">Diploma IV/S1</option> 
		<option value="S2/S3">S2/S3</option> 
	</select></td>
	</tr>
	<tr>
	<td><label>PEKERJAAN </LABEL></td><td>:</td><td><select name="pekerjaan" STYLE="WIDTH:400" required >
		<option value="">--pilih pekerjaan--</option>
		<option value="PEGAWAI NEGERI SIPIL">PEGAWAI NEGERI SIPIL</option> 
		<option value="PEGAWAI BUMN">PEGAWAI BUMN</option> 
		<option value="TNI AD/AL/AU">TNI AD/AL/AU</option> 
		<option value="PEGAWAI SWASTA">PEGAWAI SWASTA</option> 
		<option value="PEGAWAI KONTRAK">PEGAWAI KONTRAK</option>
		<option value="WIRASWASTA">WIRASWASTA</option> 
		<option value="NELAYAN">NELAYAN</option> 
		<option value="PETANI">PETANI</option> 
		<option value="IBU RUMAH TANGGA">IBU RUMAH TANGGA</option> 
		<option value="SISWA/MAHASISWA">SISWA/MAHASISWA</option>
		<option value="LAIN-LAIN">LAIN-LAIN</option> </select></td>
	</tr>
	<tr>
	<td>ALAMAT</td><td>:</td>
	<td><INPUT type="text" name="alamat" STYLE="WIDTH:238" required/> RT 
	<SELECT NAME="rt" required><option value="001">001</option><option value="002">002</option><option value="003">003</option></select> 
	RW <SELECT NAME="rw" required><option value="001">001</option><option value="002">002</option><option value="003">003</option></select></td>
	</tr>
	<tr>
	<td><label>DESA/KELURAHAN </LABEL></td><td>:</td><td><select name="desakelurahan" STYLE="WIDTH:400" required > 
		<option value="">--pilih desa/kelurahan--</option>
		<option value="Desa Kelarik">Desa Kelarik</option>
		<option value="Desa Kelarik Utara">Desa Kelarik Utara</option>
		<option value="Desa Kelarik Air Mali">Desa Kelarik Air Mali</option>
		<option value="Desa Kelarik Barat">Desa Kelarik Barat</option>
		<option value="Desa Gunung Durian">Desa Gunung Durian</option>
		<option value="Desa Teluk Buton">Desa Teluk Buton</option>
		<option value="Desa Belakang Gunung">Desa Belakang Gunung</option>
		<option value="Desa Seluan Barat">Desa Seluan Barat</option> 
		</select></td>
	</tr>
	<tr>
	<td><label>KATEGORI PASIEN</label></td><td>:</td><td> <select name="katpas" STYLE="WIDTH:400" required > 
		<option value="">--pilih--</option>
		<option value="Pasien KIS/BPJS">Pasien KIS/BPJS</option>
		<option value="Pasien Umum">Pasien Umum</option>
		</select></td>
	</tr>
	<tr>
	<td><label>NO KARTU KIS/BPJS</LABEL></td><td>:</td><td><input type="text" name="nokartu" pattern="[0-9]+" title="isi dengan ANGKA" STYLE="WIDTH:400" required/></td>
	</tr>
	<tr>
	<td><label>NO HANDPHONE </LABEL></td><td>:</td><td><input type="text" name="nohape" pattern="[0-9]+" title="isi dengan ANGKA" STYLE="WIDTH:400" /></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type="submit" name="inputpasien" value="DAFTAR"/></td>
	</tr>
</form>
</table>
</fieldset>
</body>
</html>

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
<title>PENDAFTARAN - EDIT DATA PASIEN</title>
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
<?php
include ("config.php") ;
$nik= (int)$_GET['nik'] ;
echo "<a href='datapasienview.php?nik=".$nik."' Style='color:darkblue'; >LIHAT DATA</a> | " ;
echo "<a href='datapasienedit.php?nik=".$nik."' Style='color:darkblue'; >EDIT DATA</a> | " ;
echo "<a href='datapasienhapus.php?nik=".$nik."'  Style='color:darkblue'; onclick = 'return confirm(\"Yakin ingin menghapus data ini?\");'>HAPUS DATA</a> | " ;
echo "<a href='datapasiencetak.php?nik=".$nik."' Style='color:darkblue'; >CETAK DATA</a>  " ;
?>

<h3><b><u>EDIT DATA PASIEN</u></b></h3>
    	
<?php

include("config.php");

if( isset($_GET['nik']) ){
	$nik = (int)$_GET['nik'];
    $sql = "SELECT * FROM datapasien WHERE nik=$nik";
	$query = mysqli_query($db, $sql);
	$pasien = mysqli_fetch_array($query);
	
}else{
}

?>

<table>
<form action="datapasieneditproses.php" method="POST">
	<tr>
	<td><label>NAMA </LABEL></td><td>:</td><td><input type="text" name="nama" title="isi dengan HURUF KAPITAL" value="<?php echo $pasien['nama'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<td><label>NIK </LABEL></td><td>:</td><td><input type="text" name="nik"  title="isi dengan ANGKA" pattern="[0-9]+" value="<?php echo $pasien['nik'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<td><label>NAMA KEPALA KELUARGA </LABEL></td><td>:</td><td><input type="text" name="kepalakeluarga"  title="isi dengan HURUF KAPITAL" value="<?php echo $pasien['kepalakeluarga'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<td><label>NO KARTU KELUARGA </LABEL></td><td>:</td><td><input type="text" name="kk"  title="isi dengan ANGKA" pattern="[0-9]+" value="<?php echo $pasien['kk'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<TD>TEMPAT LAHIR</TD><TD>:</TD><TD><INPUT TYPE="text" NAME="tempatlahir" value="<?php echo $pasien['tempatlahir'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<TD>TANGGAL LAHIR</TD><TD>:</TD><TD><INPUT TYPE="date" NAME="tgllahir" value="<?php echo $pasien['tgllahir'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr><td>JENIS KELAMIN</td><TD>:</TD><?php $jeniskelamin = $pasien['jeniskelamin'] ?>
<td><input type="radio" id="cow" name="jeniskelamin" value="Laki - laki" <?php echo ($jeniskelamin == 'Laki - laki') ? "Checked": "" ?>><label for="cow">Laki - Laki</label> 
<input type="radio" id="cew" name="jeniskelamin" Value="Perempuan" <?php echo ($jeniskelamin == 'Perempuan') ? "Checked": "" ?>><label for="cew">Perempuan</label> </td></tr>
	<tr>
	<td><label>STATUS </LABEL><?php $status = $pasien['status']; ?></td><td>:</td><td><select name="status"> 
				<option <?php echo ($status == 'BELUM MENIKAH') ? "selected": "" ?>>BELUM MENIKAH</option>
                <option <?php echo ($status == 'MENIKAH') ? "selected": "" ?>>MENIKAH</option> </select></td>
	</tr>
	<tr>
	<td><label>AGAMA </LABEL><?php $agama = $pasien['agama']; ?></td><td>:</td><td><select name="agama" STYLE="WIDTH:400"> 
				<option <?php echo ($agama == 'ISLAM') ? "selected": "" ?>>Islam</option>
                <option <?php echo ($agama == 'KRISTEN') ? "selected": "" ?>>KRISTEN</option>
				<option <?php echo ($agama == 'KATOLIK') ? "selected": "" ?>>KATOLIK</option>
				<option <?php echo ($agama == 'BUDHA') ? "selected": "" ?>>BUDHA</option>
                <option <?php echo ($agama == 'HINDU') ? "selected": "" ?>>HINDU</option>
                <option <?php echo ($agama == 'KONG HU CHU') ? "selected": "" ?>>KONG HU CHU</option> </select></td>
	</tr>
	<tr>
	<td><label>PENDIDIKAN </label><?php $pendidikan = $pasien['pendidikan']; ?></td><td>:</td><td><select name="pendidikan" STYLE="WIDTH:400"> 
				<option <?php echo ($pendidikan == 'Belum/Tidak Tamat SD/Sederajat') ? "selected": "" ?>>Belum/Tidak Tamat SD/Sederajat</option>
                <option <?php echo ($pendidikan == 'SD/MI/Sederajat') ? "selected": "" ?>>SD/MI/Sederajat</option>
				<option <?php echo ($pendidikan == 'SLTP/MTs/Sederajat') ? "selected": "" ?>>SLTP/MTs/Sederajat</option>
				<option <?php echo ($pendidikan == 'SLTA/SMK/MA/Sederajat') ? "selected": "" ?>>SLTA/SMK/MA/Sederajat</option>
                <option <?php echo ($pendidikan == 'Diploma I/II') ? "selected": "" ?>>Diploma I/II</option> </option>
				<option <?php echo ($pendidikan == 'Diploma III/Sarjana Muda') ? "selected": "" ?>>Diploma III/Sarjana Muda</option>
				<option <?php echo ($pendidikan == 'Diploma IV/S1') ? "selected": "" ?>>Diploma IV/S1</option>
				<option <?php echo ($pendidikan == 'S2/S3') ? "selected": "" ?>>S2/S3</option>
				</select></td>
	</tr>
	<tr>
	<td><label>PEKERJAAN </LABEL><?php $pekerjaan = $pasien['pekerjaan']; ?></td><td>:</td><td><select name="pekerjaan" STYLE="WIDTH:400"> 
				<option <?php echo ($pekerjaan == 'PEGAWAI NEGERI SIPIL') ? "selected": "" ?>>PEGAWAI NEGERI SIPIL</option>
                <option <?php echo ($pekerjaan == 'PEGAWAI BUMN') ? "selected": "" ?>>PEGAWAI BUMN</option>
				<option <?php echo ($pekerjaan == 'TNI AD/AL/AU') ? "selected": "" ?>>TNI AD/AL/AU</option>
				<option <?php echo ($pekerjaan == 'PEGAWAI SWASTA') ? "selected": "" ?>>PEGAWAI SWASTA</option>
				<option <?php echo ($pekerjaan == 'PEGAWAI KONTRAK') ? "selected": "" ?>>PEGAWAI KONTRAK</option>
                <option <?php echo ($pekerjaan == 'WIRASWASTA') ? "selected": "" ?>>WIRASWASTA</option>
				<option <?php echo ($pekerjaan == 'NELAYAN') ? "selected": "" ?>>NELAYAN</option>
				<option <?php echo ($pekerjaan == 'PETANI') ? "selected": "" ?>>PETANI</option>
				<option <?php echo ($pekerjaan == 'IBU RUMAH TANGGA') ? "selected": "" ?>>IBU RUMAH TANGGA</option> 
				<option <?php echo ($pekerjaan == 'SISWA/MAHASISWA') ? "selected": "" ?>>SISWA/MAHASISWA</option>
				<option <?php echo ($pekerjaan == 'LAIN - LAIN') ? "selected": "" ?>>LAIN - LAIN</option> </select></td>
	</tr>
	<tr><td>ALAMAT</td><td>:</td>
<td><INPUT type="text" name="alamat" value="<?php echo $pasien['alamat'] ?>" STYLE="WIDTH:238"/> 
RT 
<SELECT NAME="rt" ><?php $rt = $pasien['rt']; ?><option <?php echo ($rt == '001') ? "selected": "" ?>>001</option><option <?php echo ($rt == '002') ? "selected": "" ?>>002</option><option <?php echo ($rt == '003') ? "selected": "" ?>>003</option></select> 
RW 
<SELECT NAME="rw" ><?php $rw = $pasien['rw']; ?><option <?php echo ($rw == '001') ? "selected": "" ?>>001</option><option <?php echo ($rw == '002') ? "selected": "" ?>>002</option><option <?php echo ($rw == '003') ? "selected": "" ?>>003</option></select></td></tr>
	<tr>
	<td><label>DESA/KELURAHAN </LABEL><?php $desakelurahan = $pasien['desakelurahan']; ?></td><td>:</td><td><select name="desakelurahan" STYLE="WIDTH:400"> 
			<option <?php echo ($desakelurahan == 'Desa Kelarik') ? "selected": "" ?>>Desa Kelarik</option>
            <option <?php echo ($desakelurahan == 'Desa Kelarik Utara') ? "selected": "" ?>>Desa Kelarik Utara</option>
			<option <?php echo ($desakelurahan == 'Desa Kelarik Air Mali') ? "selected": "" ?>>Desa Kelarik Air Mali</option>
			<option <?php echo ($desakelurahan == 'Desa Kelarik Barat') ? "selected": "" ?>>Desa Kelarik Barat</option>
            <option <?php echo ($desakelurahan == 'Desa Gunung Durian') ? "selected": "" ?>>Desa Gunung Durian</option>
			<option <?php echo ($desakelurahan == 'Desa Teluk Buton') ? "selected": "" ?>>Desa Teluk Buton</option>
			<option <?php echo ($desakelurahan == 'Desa Belakang Gunung') ? "selected": "" ?>>Desa Belakang Gunung</option>
			<option <?php echo ($desakelurahan == 'Desa Seluan Barat') ? "selected": "" ?>>Desa Seluan Barat</option>
            </select></td>
	</tr>
	<tr>
	<td><label>KATEGORI PASIEN</label><?php $katpas = $pasien['katpas']; ?></td><td>:</td><td><select name="katpas" STYLE="WIDTH:400"> 
				<option <?php echo ($katpas == 'Pasien KIS/BPJS') ? "selected": "" ?>>Pasien KIS/BPJS</option>
				<option <?php echo ($katpas == 'Pasien Umum') ? "selected": "" ?>>Pasien Umum</option> </select></td>
	</tr>
	<tr>
	<td><label>NO KARTU KIS/BPJS</LABEL></td><td>:</td><td><input type="text" name="nokartu" value="<?php echo $pasien['nokartu'] ?>" title="isi dengan ANGKA SAJA" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<td><label>NO HANDPHONE </LABEL></td><td>:</td><td><input type="text" name="nohape" pattern="[0-9]+" title="isi dengan ANGKA SAJA" value="<?php echo $pasien['nohape'] ?>" STYLE="WIDTH:400"/></td>
	</tr>
	<tr>
	<td></td><td></td><td><input type="submit" name="simpan" value="SIMPAN"/></td>
	</tr>
</form>
</table>
</fieldset>

</body>
</html>
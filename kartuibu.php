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
					}elseif ($_SESSION['posisi'] == "bidan" or  $_SESSION['posisi'] == "drgpython" ){
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
<title>POLI KIA</title>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>
<meta name="author" content="drg.teukuagussurya" />
</head>

<body
background="blue.jpg">
<?php
include ("config.php");
	if (isset($_GET['nik'])){
		$nik = (int)$_GET['nik'];
		$sqlcek = "SELECT * from kartuibu where nik=$nik";
		$querycek = mysqli_query($db,$sqlcek);
		$cek = mysqli_num_rows($querycek);
		if ($cek == 1){
			header ("location:polikeb.php?nik=$nik");
		}else{
		}
	}
?>
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
<input type="submit" name="polikia" value="POLI KIA" Style="background:lime; WIDTH:150; color:blue";/>
<input type="submit" name="laboratorium" value="LABORATORIUM" Style="WIDTH:150; color:blue";/>
<input type="submit" name="apotek" value="APOTEK" Style="WIDTH:150; color:blue";/>
<input type="submit" name="ugd" value="UGD" Style="WIDTH:150; color:blue"; /> 
</form>

<fieldset style="background:#EEE7DB";>
<table>
<?php 
include("config.php");

if(isset($_GET['nik'])) {
	$nik = mysqli_real_escape_string($db,$_GET['nik']);
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

<form action="kartuibuproses.php" method="POST">

<input type="hidden" name="nik"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = mysqli_real_escape_string($db,$_GET['nik']);
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query); 
											$nik = $pasien ['nik'] ;
											echo $nik ;
											}else{
											}
											?>" />
											
	<input type="hidden" name="nama"  value="<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = mysqli_real_escape_string($db,$_GET['nik']);
											$sql = " SELECT * FROM datapasien WHERE nik=$nik ";
											$query = mysqli_query($db, $sql);
											$pasien = mysqli_fetch_array($query); 
											$nama = $pasien ['nama'] ;
											echo $nama ;
											}else{
											}
											?>" />
<fieldset style="background:#F5C8BF";>
<center><h3><b style="background:yellow">KARTU IBU</B><H3></center>
	<table>
	<tr><td><LABEL>TANGGAL <LABEL></td><td><input type="date" name="tanggal" value=<?php echo date('Y-m-d') ; ?> /></td><td></td><td><U><b>RIWAYAT KONTRASEPSI TERAKHIR<b></u></td></tr>
	<tr><td></td><td></td><td></td><td><input type="checkbox" name="kontrasepsi1" value="tak menggunakan" />tak menggunakan</td><td><input type="checkbox" name="kontrasepsi2" value="suntikan" />suntikan</td></tr>
	<tr><td></td><td></td><td></td><td><input type="checkbox" name="kontrasepsi3" value="lain-lain" />lain-lain</td><td><input type="checkbox" name="kontrasepsi4" value="pil" />pil</td></tr>
	<tr><td></td><td></td><td></td><td><input type="checkbox" name="kontrasepsi5" value="susuk" />susuk</td><td><input type="checkbox" name="kontrasepsi6" value="IUD" />IUD</td></tr>
	</table>

	<h4><b><U>RIWAYAT KEHAMILAN TERDAHULU</U></b></h4>
<table>
	<tr><td style="color:brown"><label>ANAK KE-1<label></td></tr>
</table>
<table>
	<tr><td style="width:150"><label>UMUR<br>(tahun)<label></td><td style="width:150"><label>BERAT LAHIR<br>(gram)<label></td><td style="width:200"><label>PENOLONG<br>PERSALIANAN<label></td><td style="width:200"><label>CARA<br>PERSALINAN<label></td><td style="width:200"><label>KEADAAN<br>BAYI<label></td><td style="width:200"><label>KOMPLIKASI<label></td></tr>
	<tr><td><input type="text" name="ankiumur" style="width:30"/></td><td><input type="text" name="ankiberat" style="width:40"/></td><td><select name="ankipesalin"><option value="-">-</option><option value="Dokter">Dokter</option><option value="Bidan Paramedis">Bidan Paramedis</option> <option value="Dukun Terlatih">Dukun Terlatih</option><option value="Dukun Tidak Terlatih">Dukun Tidak Terlatih</option></select></td><td><select name="ankicasalin"><option value="-">-</option><option value="Normal">Normal</option><option value="Sungsang">Sungsang</option> <option value="Alat">Alat</option><option value="Seksio">Seksio</option></select></td><td><select name="ankikeadaan"><option value="-">-</option><option value="Sehat">Sehat</option><option value="Sakit/Cacat">Sakit/Cacat</option> <option value="Mati">Mati</option></select></td><td><select name="ankikomplikasi"><option value="-">-</option><option value="Pend Ante Partum">Pend Ante Partum</option><option value="Post Ante Partum">Bidan Paramedis</option> <option value="Hypertensi">Hypertensi</option><option value="Infeksi">Infeksi</option><option value="Partus Lama">Partus Lama</option><option value="Partus Preterm">Partus Preterm</option></select></td></tr>
</table>
<table>
	<tr><td style="color:brown"><label>ANAK KE-2<label></td></tr>
</table>
<table>
	<tr><td style="width:150"><label>UMUR<br>(tahun)<label></td><td style="width:150"><label>BERAT LAHIR<br>(gram)<label></td><td style="width:200"><label>PENOLONG<br>PERSALIANAN<label></td><td style="width:200"><label>CARA<br>PERSALINAN<label></td><td style="width:200"><label>KEADAAN<br>BAYI<label></td><td style="width:200"><label>KOMPLIKASI<label></td></tr>
	<tr><td><input type="text" name="ankiiumur" style="width:30"/></td><td><input type="text" name="ankiiberat" style="width:40"/></td><td><select name="ankiipesalin"><option value="-">-</option><option value="Dokter">Dokter</option><option value="Bidan Paramedis">Bidan Paramedis</option> <option value="Dukun Terlatih">Dukun Terlatih</option><option value="Dukun Tidak Terlatih">Dukun Tidak Terlatih</option></select></td><td><select name="ankiicasalin"><option value="-">-</option><option value="Normal">Normal</option><option value="Sungsang">Sungsang</option> <option value="Alat">Alat</option><option value="Seksio">Seksio</option></select></td><td><select name="ankiikeadaan"><option value="-">-</option><option value="Sehat">Sehat</option><option value="Sakit/Cacat">Sakit/Cacat</option> <option value="Mati">Mati</option></select></td><td><select name="ankiikomplikasi"><option value="-">-</option><option value="Pend Ante Partum">Pend Ante Partum</option><option value="Post Ante Partum">Bidan Paramedis</option> <option value="Hypertensi">Hypertensi</option><option value="Infeksi">Infeksi</option><option value="Partus Lama">Partus Lama</option><option value="Partus Preterm">Partus Preterm</option></select></td></tr>
</table>
<table>
	<tr><td style="color:brown"><label>ANAK KE-3<label></td></tr>
</table>
<table>
	<tr><td style="width:150"><label>UMUR<br>(tahun)<label></td><td style="width:150"><label>BERAT LAHIR<br>(gram)<label></td><td style="width:200"><label>PENOLONG<br>PERSALIANAN<label></td><td style="width:200"><label>CARA<br>PERSALINAN<label></td><td style="width:200"><label>KEADAAN<br>BAYI<label></td><td style="width:200"><label>KOMPLIKASI<label></td></tr>
	<tr><td><input type="text" name="ankiiiumur" style="width:30"/></td><td><input type="text" name="ankiiiberat" style="width:40"/></td><td><select name="ankiiipesalin"><option value="-">-</option><option value="Dokter">Dokter</option><option value="Bidan Paramedis">Bidan Paramedis</option> <option value="Dukun Terlatih">Dukun Terlatih</option><option value="Dukun Tidak Terlatih">Dukun Tidak Terlatih</option></select></td><td><select name="ankiiicasalin"><option value="-">-</option><option value="Normal">Normal</option><option value="Sungsang">Sungsang</option> <option value="Alat">Alat</option><option value="Seksio">Seksio</option></select></td><td><select name="ankiiikeadaan"><option value="-">-</option><option value="Sehat">Sehat</option><option value="Sakit/Cacat">Sakit/Cacat</option> <option value="Mati">Mati</option></select></td><td><select name="ankiiikomplikasi"><option value="-">-</option><option value="Pend Ante Partum">Pend Ante Partum</option><option value="Post Ante Partum">Bidan Paramedis</option> <option value="Hypertensi">Hypertensi</option><option value="Infeksi">Infeksi</option><option value="Partus Lama">Partus Lama</option><option value="Partus Preterm">Partus Preterm</option></select></td></tr>
</table>
<p></p>
<h4><b><U>RIWAYAT KEHAMILAN SEKARANG</U></b></h4>
<table>
	<tr><td><label>HAID (haid terakhir)<label></td><td><input type="date" name="tglhaid" /></td></tr>
	<tr><td><label>PERKIRAAN PARTUS<LABEL></td><td><input type="date" name="tglpartus" /></td></tr>
</table>
<p></p>
<table>
<tr><td><label>KELUHAN UTAMA PASIEN <label><input type="text" name="keluhanutama" style="width:900" /></td></tr>
</table>
<table>
	<tr><td><label>NAFSU MAKAN<LABEL></td><td><input type="checkbox" name="nafsumakan1" value="baik" />baik</td><td><input type="checkbox" name="nafsumakan2" value="kurang" />kurang</td></tr>
	<tr><td><label>MUNTAH - MUNTAH<LABEL></td><td><input type="checkbox" name="muntah1" value="biasa, gejala hamil muda" />biasa, gejala hamil muda</td><td><input type="checkbox" name="muntah2" value="terus menerus" />terus menerus</td></tr>
	<tr><td><label>PUSING - PUSING<LABEL></td><td><input type="checkbox" name="pusing1" value="biasa, gejala hamil muda" />biasa, gejala hamil muda</td><td><input type="checkbox" name="pusing2" value="terus menerus" />terus menerus</td></tr>
	<tr><td><label>NYERI PERUT<LABEL></td><td><input type="checkbox" name="nyeriperut1" value="ada" />ada</td><td><input type="checkbox" name="nyeriperut2" value="tidak ada" />tidak ada</td></tr>
	<tr><td><label>OEDEMA<LABEL></td><td><input type="checkbox" name="oedema1" value="tidak" />tidak</td><td><input type="checkbox" name="oedema2" value="umum" />umum</td></tr>
</table>
<p></p>
<table>
<tr><td><label>PENYAKIT YANG DIDERITA<LABEL></td><td><input type="checkbox" name="penyakit1" value="paru-paru" />paru-paru</td><td><input type="checkbox" name="penyakit2" value="jantung" />jantung</td><td><input type="checkbox" name="penyakit3" value="penyakit hati" />penyakit hati</td><td><input type="checkbox" name="penyakit4" value="penyakit ginjal" />penyakit ginjal</td></tr>
<tr><td></td><td><input type="checkbox" name="penyakit5" value="diabetes" />diabetes</td><td><input type="checkbox" name="penyakit6" value="malaria" />malaria</td><td><input type="checkbox" name="penyakit7" value="psikosis" />psikosis</td><td><input type="checkbox" name="penyakit8" value="epilepsi" />epilepsi</td></tr>
<tr><td><label>RIWAYAT KESEHATAN KELUARGA<LABEL></td><td><input type="checkbox" name="riwayatkeluarga1" value="hipertensi" />hipertensi</td><td><input type="checkbox" name="riwayatkeluarga2" value="diabetes" />diabetes</td><td><input type="checkbox" name="riwayatkeluarga3" value="jantung" />jantung</td></tr>
<tr><td></td><td><input type="checkbox" name="riwayatkeluarga4" value="psikosis" />psikosis</td><td><input type="checkbox" name="riwayatkeluarga5" value="cacat bawaan" />cacat bawaan</td><td><input type="checkbox" name="riwayatkeluarga6" value="gemelli" />gemelli</td></tr>
</table>
<p></p>
<table>
<tr><td><label>KEBIASAAN YANG MEMPENGARUHI KEHAMILAN<LABEL></td><td><input type="checkbox" name="kebiasaan1" value="merokok" />merokok</td><td><input type="checkbox" name="kebiasaan2" value="minum minuman keras" />minum minuman keras</td></tr>
<tr><td></td><td><input type="checkbox" name="kebiasaan3" value="minum obat penenang" />minum obat penenang</td><td><input type="checkbox" name="kebiasaan4" value="narkotik" />narkotik</td></tr>
</table>
<p></p>
<table>
<tr><td><U><b>PEMERIKSAAN UMUM<b></u></td><td></td><td Style="WIDTH:200"></td><td><U><b>PEMERIKSAAN FISIK<b></u></td></tr>
<tr><td><label>PUCAT<LABEL></td><td><input type="checkbox" name="pucat1" value="tidak" />tidak</td><td><input type="checkbox" name="pucat2" value="ya" />ya</td><td><label>MUKA<LABEL></td><td><input type="checkbox" name="muka1" value="normal" />normal</td><td><input type="checkbox" name="muka2" value="konjungtiva pucat" />konjungtiva pucat</td></tr>
<tr><td><label>KESADARAN<LABEL></td><td><input type="checkbox" name="kesadaran1" value="baik" />baik</td><td><input type="checkbox" name="kesadaran2" value="ada gangguan" />ada gangguan</td><td><label>MULUT<LABEL></td><td><input type="checkbox" name="mulut1" value="normal" />normal</td><td><input type="checkbox" name="mulut2" value="kelainan" />kelainan</td></tr>
<tr><td><label>BENTUK TUBUH<LABEL></td><td><input type="checkbox" name="bentuktubuh1" value="normal" />normal</td><td><input type="checkbox" name="bentuktubuh2" value="kelainan panggul" />kelainan panggul</td><td><label>GIGI<LABEL></td><td><input type="checkbox" name="gigi1" value="normal" />normal</td><td><input type="checkbox" name="gigi2" value="kelainan" />kelainan</td></tr>
<tr><td></td><td><input type="checkbox" name="bentuktubuh3" value="kelainan tulang belakang" />kelainan tulang belakang</td><td><input type="checkbox" name="bentuktubuh4" value="kelainan tungkai" />kelainan tungkai</td><td><label>PARU - PARU<LABEL></td><td><input type="checkbox" name="paru1" value="normal" />normal</td><td><input type="checkbox" name="paru2" value="kelainan" />kelainan</td></tr>
<tr><td><label>SUHU BADAN<LABEL></td><td><input type="checkbox" name="suhubadan1" value="normal" />normal</td><td><input type="checkbox" name="suhubadan2" value="demam" />demam</td><td><label>JANTUNG<LABEL></td><td><input type="checkbox" name="jantung1" value="normal" />normal</td><td><input type="checkbox" name="jantung2" value="kelainan" />kelainan</td></tr>
<tr><td><label>KUNING<LABEL></td><td><input type="checkbox" name="kuning1" value="tidak" />tidak</td><td><input type="checkbox" name="kuning2" value="ya" />ya</td><td><label>PAYUDARA<LABEL></td><td><input type="checkbox" name="payudara1" value="normal" />normal</td><td><input type="checkbox" name="payudara2" value="benjolan" />benjolan</td></tr>

<?php
											include("config.php");
											if(isset($_GET['nik'])) {
											$nik = (int)$_GET['nik'];
											$sqlnurse = " SELECT * FROM pemeriksaanawal WHERE nik=$nik ";
											$querynurse = mysqli_query($db, $sqlnurse);
											$nurse = mysqli_fetch_array($querynurse); 
											}
											?>

<tr><td><label>LILA<label></td><td><input type="text" name="lila" style="width:40" /><label>cm<label></td><td></td><td><label>HATI<LABEL></td><td><input type="checkbox" name="hati1" value="normal" />normal</td><td><input type="checkbox" name="hati2" value="pembesaran" />pembesaran</td></tr>
<tr><td><label>TINGGI BADAN<label></td><td><input type="text" name="tinggibadan" style="width:40" value="<?php echo $nurse['tb'] ; ?>" /><label>cm<label></td><td></td><td><label>ABDOMEN<LABEL></td><td><input type="checkbox" name="abdomen1" value="pembesaran normal" />pembesaran normal</td><td><input type="checkbox" name="abdomen2" value="pembesaran berlebihan" />pembesaran berlebihan</td></tr>
<tr><td><label>BERAT BADAN<label></td><td><input type="text" name="beratbadan" style="width:40" value="<?php echo $nurse['bb'] ; ?>" /><label>kg<label></td><td></td><td><label>TANGAN TUNGKAI<LABEL></td><td><input type="checkbox" name="tangantungkai1" value="normal" />normal</td><td><input type="checkbox" name="tangantungkai2" value="oedema" />oedema</td></tr>
<tr><td><label>TEKANAN DARAH<label></td><td><input type="text" name="tekanandarah" style="width:60" value="<?php echo $nurse['td'] ; ?>" /><label>mm/Hg<label></td></tr>
<tr><td><label>NADI<label></td><td><input type="text" name="nadi" style="width:40" value="<?php echo $nurse['hr'] ; ?>" /><label>/menit<label></td></tr>
<tr><td><label>PERNAFASAN<label></td><td><input type="text" name="pernafasan" style="width:40" value="<?php echo $nurse['rr'] ; ?>" /><label>/menit<label></td></tr>
</table>
<p></p>
<table>
<tr><td><U><b>PEMERIKSAAN KEBIDANAN<b></u></td><td></td><td Style="WIDTH:250"></td><td><U><b>PEMERIKSAAN LABORATORIUM<b></u></td></tr>
<tr><td><label>TINGGI FUNDUS UTERI<label></td><td><input type="text" name="tinggifundus" style="width:40" /><label>cm<label></td><td></td><td><label>Hb (HAEMOGLOBIN)<label></td><td><input type="text" name="hb" style="width:40"/><label>gr/dl<label></td></tr>
<tr><td></td><td><input type="checkbox" name="bentukfundus1" value="sesuai kurva" />sesuai kurva</td><td><input type="checkbox" name="bentukfundus2" value="tidak sesuai kurva" />tidak sesuai kurva</td><td><label>URINE<label></td></tr>
<tr><td><label>BENTUK UTERUS<LABEL></td><td><input type="checkbox" name="bentukuterus1" value="normal" />normal</td><td><input type="checkbox" name="bentukuterus2" value="kelainan" />kelainan</td><td><label>=> albumine <label><select name="albumine"><option value="">--pilih--</option><option value="negatif">negatif</option><option value="positif +">positif +</option><option value="positif ++">positif ++</option><option value="positif +++">positif +++</option><option value="positif ++++">positif ++++</option></select></td></tr>
<tr><td><label>LETAK JANIN<LABEL></td><td><input type="checkbox" name="letakjanin1" value="kepala" />kepala</td><td><input type="checkbox" name="letakjanin2" value="sungsang" />sungsang</td><td><label>=> reduksi <label><select name="reduksi" ><option value="">--pilih--</option><option value="negatif">negatif</option><option value="positif +">positif +</option><option value="positif ++">positif ++</option><option value="positif +++">positif +++</option><option value="positif ++++">positif ++++</option></select></td></tr>
<tr><td></td><td><input type="checkbox" name="letakjanin3" value="melintang" />melintang</td><td></td><td><label>FAECES<label></td><td><input type="text" name="faeces" /></td></tr>
<tr><td><label>GERAK JANIN<LABEL></td><td><input type="checkbox" name="gerakjanin1" value="aktif" />aktif</td><td><input type="checkbox" name="gerakjanin2" value="jarang" />jarang</td><td><label>DARAH TEPI (MALARIA)<label></td><td><select name="malaria"><option value="">--pilih--</option><option value="negatif">negatif</option><option value="positif">positif</option></select></tr>
<tr><td></td><td><input type="checkbox" name="gerakjanin3" value="tidak aktif" />tidak aktif</td><td></td><td><label>GOLONGAN DARAH<label></td><td><select name="golda"><option value="">--pilih--</option><option value="A+">A+</option><option value="B+">B+</option><option value="AB+">AB+</option><option value="O+">O+</option></select></td></tr>
<tr><td><label>DETAK JANTUNG JANIN<label></td><td><input type="text" name="detakjantungjanin" style="width:40" /><label>/menit<label></td><td></td><td></td></tr>
<tr><td><label>INSPEKULO<LABEL></td><td><input type="checkbox" name="inspekulo1" value="normal" />normal</td><td><input type="checkbox" name="inspekulo2" value="tumor/ca cervix" />tumor/ca cervix</td></tr>
<tr><td><label>PERDARAHAN<LABEL></td><td><input type="checkbox" name="perdarahan1" value="ya" />ya</td><td><input type="checkbox" name="perdarahan2" value="tidak" />tidak</td></tr>
</table>
<table>
<tr><td><label>PEMERIKSAAN DALAM ATAS INDIKASI<LABEL></td><td><input type="checkbox" name="pemeriksaanindikasi1" value="panggul normal" />panggul normal</td><tr>
<tr><td></td><td><input type="checkbox" name="pemeriksaanindikasi2" value="panggul sempit" />panggul sempit</td></tr>
</table>
<table>	
<tr><p></p></tr>
	<tr><td><input type="submit" name="SELESAI" value="SELESAI"/></td></tr>
</table>
</form>

</fieldset>

</body>
</html>
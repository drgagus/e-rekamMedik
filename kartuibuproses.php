
<?php
include("config.php");

if(isset($_POST["SELESAI"])){

	$nik = $_POST["nik"];
	$nama = $_POST["nama"];
	$tanggal = $_POST["tanggal"];
	
	if (isset ($_POST["kontrasepsi1"])) {
		$kontrasepsi = "tak menggunakan" ;
	}else if (isset ($_POST["kontrasepsi2"])) { 
		$kontrasepsi = "suntikan" ;
	}else if (isset ($_POST["kontrasepsi3"])) { 
		$kontrasepsi = "lain lain" ;
	}else if (isset ($_POST["kontrasepsi4"])) { 
		$kontrasepsi = "pil" ;
	}else if (isset ($_POST["kontrasepsi5"])) { 
		$kontrasepsi = "susuk" ;
		}else if (isset ($_POST["kontrasepsi6"])) { 
		$kontrasepsi = "IUD" ;
	} else {
		$kontrasepsi = "tidak pakai kontrasepsi" ; 
		}
	
	$ankiumur = $_POST["ankiumur"];
	$ankiberat = $_POST["ankiberat"];
	$ankipesalin = $_POST["ankipesalin"];
	$ankicasalin = $_POST["ankicasalin"];
	$ankikeadaan = $_POST["ankikeadaan"];
	$ankikomplikasi = $_POST["ankikomplikasi"];
	
	$ankiiumur = $_POST["ankiiumur"];
	$ankiiberat = $_POST["ankiiberat"];
	$ankiipesalin = $_POST["ankiipesalin"];
	$ankiicasalin = $_POST["ankiicasalin"];
	$ankiikeadaan = $_POST["ankiikeadaan"];
	$ankiikomplikasi = $_POST["ankiikomplikasi"];
	
	$ankiiiumur = $_POST["ankiiiumur"];
	$ankiiiberat = $_POST["ankiiiberat"];
	$ankiiipesalin = $_POST["ankiiipesalin"];
	$ankiiicasalin = $_POST["ankiiicasalin"];
	$ankiiikeadaan = $_POST["ankiiikeadaan"];
	$ankiiikomplikasi = $_POST["ankiiikomplikasi"];
	
	$tglhaid = $_POST["tglhaid"];
	$tglpartus = $_POST["tglpartus"];
	$keluhanutama = $_POST["keluhanutama"] ;
	
	if (isset ($_POST["nafsumakan1"])) {
		$nafsumakan = "baik" ;
	}else if (isset ($_POST["nafsumakan2"])) { 
		$nafsumakan = "kurang" ;
	} else {
		$nafsumakan = "baik baik saja" ; 
		}
	
	if (isset ($_POST["muntah1"])) {
		$muntah = "biasa,gejala hamil muda" ;
	}else if (isset ($_POST["muntah2"])) { 
		$muntah = "terus menerus" ;
	} else {
		$muntah = "baik baik saja" ; 
		}
	
	if (isset ($_POST["pusing1"])) {
		$pusing = "biasa,gejala hamil muda" ;
	}else if (isset ($_POST["pusing2"])) { 
		$pusing = "terus menerus" ;
	} else {
		$muntah = "baik baik saja" ; 
		}
	
	if (isset ($_POST["nyeriperut1"])) {
		$nyeriperut = "ada" ;
	}else if (isset ($_POST["nyeriperut2"])) { 
		$nyeriperut = "tidak ada" ;
	} else {
		$nyeriperut = "baik baik saja" ; 
		}
	
	if (isset ($_POST["oedema1"])) {
		$oedema = "tidak" ;
	}else if (isset ($_POST["oedema2"])) { 
		$oedema = "umum" ;
	} else {
		$oedema = "baik baik saja" ; 
		}
	
	if (isset ($_POST["penyakit1"])) {
		$penyakit = "paru" ;
	}else if (isset ($_POST["penyakit2"])) { 
		$penyakit = "jantung" ;
	}else if (isset ($_POST["penyakit3"])) { 
		$penyakit = "penyakit hati" ;
	}else if (isset ($_POST["penyakit4"])) { 
		$penyakit = "penyakit ginjal" ;
	}else if (isset ($_POST["penyakit5"])) { 
		$penyakit = "diabetes" ;
	}else if (isset ($_POST["penyakit6"])) { 
		$penyakit = "malaria" ;
	}else if (isset ($_POST["penyakit7"])) { 
		$penyakit = "psikosis" ;
	}else if (isset ($_POST["penyakit8"])) { 
		$penyakit = "epilepsi" ;
	} else {
		$penyakit = "tidak ada" ; 
		}
	
	if (isset ($_POST["riwayatkeluarga1"])) {
		$riwayatkeluarga = "hipertensi" ;
	}else if (isset ($_POST["riwayatkeluarga2"])) { 
		$riwayatkeluarga = "diabetes" ;
	}else if (isset ($_POST["riwayatkeluarga3"])) { 
		$riwayatkeluarga = "jantung" ;
	}else if (isset ($_POST["riwayatkeluarga4"])) { 
		$riwayatkeluarga = "psikosis" ;
	}else if (isset ($_POST["riwayatkeluarga5"])) { 
		$riwayatkeluarga = "cacat bawaan" ;
	}else if (isset ($_POST["riwayatkeluarga6"])) { 
		$riwayatkeluarga = "gemeli" ;
	} else {
		$riwayatkeluarga = "tidak ada" ; 
		}
	
	if (isset ($_POST["kebiasaan1"])) {
		$kebiasaan = "merokok" ;
	}else if (isset ($_POST["kebiasaan2"])) { 
		$kebiasaan = "minum minuman keras" ;
	}else if (isset ($_POST["kebiasaan3"])) { 
		$kebiasaan = "minum obat penenang" ;
	}else if (isset ($_POST["kebiasaan4"])) { 
		$kebiasaan = "narkotik" ;
	} else {
		$kebiasaan = "tidak ada" ; 
		}
		
	if (isset ($_POST["pucat1"])) {
		$pucat = "tidak" ;
	}else if (isset ($_POST["pucat2"])) { 
		$pucat = "ya" ;
	} else {
		$pucat = "baik baik saja" ; 
		}
	
	if (isset ($_POST["kesadaran1"])) {
		$kesadaran = "baik" ;
	}else if (isset ($_POST["kesadaran2"])) { 
		$kesadaran = "ada gangguan" ;
	} else {
		$kesadaran = "baik baik saja" ; 
		}
	
	if (isset ($_POST["bentuktubuh1"])) {
		$bentuktubuh = "normal" ;
	}else if (isset ($_POST["bentuktubuh2"])) { 
		$bentuktubuh = "kelainan panggul" ;
	}else if (isset ($_POST["bentuktubuh3"])) { 
		$bentuktubuh = "kelainan tulang belakang" ;
	}else if (isset ($_POST["bentuktubuh4"])) { 
		$bentuktubuh = "kelainan tungkai" ;
	} else {
		$bentuktubuh = "baik baik saja" ; 
		}
	
	if (isset ($_POST["suhubadan1"])) {
		$suhubadan = "normal" ;
	}else if (isset ($_POST["suhubadan2"])) { 
		$suhubadan = "demam" ;
	} else {
		$suhubadan = "baik baik saja" ; 
		}
	
	if (isset ($_POST["kuning1"])) {
		$kuning = "tidak" ;
	}else if (isset ($_POST["kuning2"])) { 
		$kuning = "ya" ;
	} else {
		$kuning = "baik baik saja" ; 
		}
	
	$lila = $_POST["lila"];
	$tinggibadan = $_POST["tinggibadan"];
	$beratbadan = $_POST["beratbadan"];
	$tekanandarah = $_POST["tekanandarah"];
	$nadi = $_POST["nadi"];
	$pernafasan = $_POST["pernafasan"];
	
	if (isset ($_POST["muka1"])) {
		$muka = "normal" ;
	}else if (isset ($_POST["muka2"])) { 
		$muka = "konjungtiva pucat" ;
	} else {
		$muka = "baik baik saja" ; 
		}
		
	if (isset ($_POST["mulut1"])) {
		$mulut = "normal" ;
	}else if (isset ($_POST["mulut2"])) { 
		$mulut = "kelainan" ;
	} else {
		$mulut = "baik baik saja" ; 
		}
		
	if (isset ($_POST["gigi1"])) {
		$gigi = "normal" ;
	}else if (isset ($_POST["gigi2"])) { 
		$gigi = "kelainan" ;
	} else {
		$gigi = "baik baik saja" ; 
		}

	if (isset ($_POST["paru1"])) {
		$paru = "normal" ;
	}else if (isset ($_POST["paru2"])) { 
		$paru = "kelainan" ;
	} else {
		$paru = "baik baik saja" ; 
		}
		
	if (isset ($_POST["jantung1"])) {
		$jantung = "normal" ;
	}else if (isset ($_POST["jantung2"])) { 
		$jantung = "kelainan" ;
	} else {
		$jantung = "baik baik saja" ; 
		}
		
	if (isset ($_POST["payudara1"])) {
		$payudara = "normal" ;
	}else if (isset ($_POST["payudara2"])) { 
		$payudara = "benjolan" ;
	} else {
		$payudara = "baik baik saja" ; 
		}
	
	if (isset ($_POST["hati1"])) {
		$hati = "normal" ;
	}else if (isset ($_POST["hati2"])) { 
		$hati = "pembesaran" ;
	} else {
		$hati = "baik baik saja" ; 
		}
		
	if (isset ($_POST["abdomen1"])) {
		$abdomen = "pebesaran normal" ;
	}else if (isset ($_POST["abdomen2"])) { 
		$abdomen = "pembesaran berlebihan" ;
	} else {
		$abdomen = "baik baik saja" ; 
		}
	
if (isset ($_POST["tangantungkai1"])) {
		$tangantungkai = "normal" ;
	}else if (isset ($_POST["tangantungkai2"])) { 
		$tangantungkai = "oedema" ;
	} else {
		$tangantungkai = "baik baik saja" ; 
		}	
	
	$tinggifundus = $_POST["tinggifundus"];
	
	if (isset ($_POST["bentukfundus1"])) {
		$bentukfundus = "sesuai kurva" ;
	}else if (isset ($_POST["bentukfundus2"])) { 
		$bentukfundus = "tidak sesuai kurva" ;
	} else {
		$bentukfundus = "baik baik saja" ; 
		}
	
	if (isset ($_POST["bentukuterus1"])) {
		$bentukuterus = "normal" ;
	}else if (isset ($_POST["bentukuterus2"])) { 
		$bentukuterus = "kelainan" ;
	} else {
		$bentukuterus = "baik baik saja" ; 
		}
		
	if (isset ($_POST["letakjanin1"])) {
		$letakjanin = "kelapa" ;
	}else if (isset ($_POST["letakjanin2"])) { 
		$letakjanin = "sungsang" ;
	}else if (isset ($_POST["letakjanin3"])) { 
		$letakjanin = "melintang" ;
	} else {
		$letakjanin = "baik baik saja" ; 
		}
		
	if (isset ($_POST["gerakjanin1"])) {
		$gerakjanin = "aktif" ;
	}else if (isset ($_POST["gerakjanin2"])) { 
		$gerakjanin = "jarang" ;
	}else if (isset ($_POST["gerakjanin3"])) { 
		$gerakjanin = "tidak aktif" ;
	} else {
		$gerakjanin = "baik baik saja" ; 
		}
	
	$detakjantungjanin = $_POST["detakjantungjanin"];
	
	if (isset ($_POST["inspekulo1"])) {
		$inspekulo = "normal" ;
	}else if (isset ($_POST["inspekulo2"])) { 
		$inspekulo = "tumor/ca servix" ;
	} else {
		$inspekulo = "baik baik saja" ; 
		}
	
	if (isset ($_POST["perdarahan1"])) {
		$perdarahan = "ya" ;
	}else if (isset ($_POST["perdarahan2"])) { 
		$perdarahan = "tidak" ;
	} else {
		$perdarahan = "baik baik saja" ; 
		}
		
	if (isset ($_POST["pemeriksaanindikasi1"])) {
		$pemeriksaanindikasi = "panggul normal" ;
	}else if (isset ($_POST["pemeriksaanindikasi2"])) { 
		$pemeriksaanindikasi = "panggul sempit" ;
	} else {
		$pemeriksaanindikasi = "baik baik saja" ; 
		}
	
	$hb = $_POST["hb"];
	$albumine = $_POST["albumine"];
	$reduksi = $_POST["reduksi"];
	$faeces = $_POST["faeces"];
	$malaria = $_POST["malaria"];
	$golda = $_POST["golda"];
    
	$sql = "INSERT INTO kartuibu VALUES ( '$nik', '$nama', '$tanggal', '$kontrasepsi', '$ankiumur', '$ankiberat', '$ankipesalin', '$ankicasalin', '$ankikeadaan', '$ankikomplikasi', '$ankiiumur', '$ankiiberat', '$ankiipesalin', '$ankiicasalin', '$ankiikeadaan', '$ankiikomplikasi', '$ankiiiumur', '$ankiiiberat', '$ankiiipesalin', '$ankiiicasalin', '$ankiiikeadaan', '$ankiiikomplikasi', '$tglhaid', '$tglpartus', '$keluhanutama', '$nafsumakan', '$muntah', '$pusing', '$nyeriperut', '$oedema', '$penyakit', '$riwayatkeluarga', '$kebiasaan', '$pucat', '$kesadaran', '$bentuktubuh', '$suhubadan', '$kuning', '$lila', '$tinggibadan', '$beratbadan', '$tekanandarah', '$nadi', '$pernafasan', '$muka', '$mulut', '$gigi', '$paru', '$jantung', '$payudara', '$hati', '$abdomen', '$tangantungkai', '$tinggifundus', '$bentukfundus', '$bentukuterus', '$letakjanin', '$gerakjanin', '$detakjantungjanin', '$inspekulo', '$perdarahan', '$pemeriksaanindikasi', '$hb', '$albumine', '$reduksi', '$faeces', '$malaria', '$golda')" ;
	
	$queryi = mysqli_query($db, $sql);

    if( $queryi ) {
        header('Location: polikeb.php?nik='.$nik.'');
		
    } else {
        header('Location: polikeb.php?nik='.$nik.'');
    }

} else {
    header('Location: polikeb.php?nik='.$nik.'');
}

?>

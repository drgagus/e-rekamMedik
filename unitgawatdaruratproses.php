<?php
include("config.php");
if(isset($_POST["SELESAI"])){
				$nik = mysqli_real_escape_string($db,$_POST["nik"]) ;
				$nama = $_POST["nama"] ;
				$tanggalkejadian = $_POST["tanggalkejadian"];
				$jamkejadian = $_POST['jamkejadian'];
				$tanggal = $_POST['tanggaldatang'];
				$jam = $_POST['jamdatang'];
				
			if (isset ($_POST["alasan1"])) {
				$alasan = "Sakit" ;
			}else if (isset ($_POST["alasan2"])) { 
				$alasan = "Kecelakaan" ;
			} else {
				$alasan = "" ; 
			}	

			if (isset ($_POST["gejalapenyerta1"])) {
				$gejalapenyerta = "Pingsan" ;
			}else if (isset ($_POST["gejalapenyerta2"])) { 
				$gejalapenyerta = "Pusing" ;
			}else if (isset ($_POST["gejalapenyerta3"])) { 
				$gejalapenyerta = "Muntah" ;
			}else if (isset ($_POST["gejalapenyerta4"])) { 
				$gejalapenyerta = "Amnesia" ;
			} else {
				$alasan = "" ; 
			}	

			if (isset ($_POST["pengantar1"])) {
				$pengantar = "Keluarga" ;
			}else if (isset ($_POST["pengantar2"])) { 
				$pengantar = "Penolong" ;
			}else if (isset ($_POST["pengantar3"])) { 
				$pengantar = "Polisi" ;
			}else if (isset ($_POST["pengantar4"])) { 
				$pengantar = "Sendiri" ;
			} else {
				$alasan = "" ; 
			}

			if (isset ($_POST["katpas1"])) {
				$katpas = "Pasien KIS/BPJS" ;
			}else if (isset ($_POST["katpas2"])) { 
				$katpas = "Pasien Umum" ;
			} else {
				$katpas = "" ; 
			}	
				
				
				$mekanisme = $_POST["mekanisme"];
				$keluhan = $_POST["keluhan"];
				$pemeriksaanawal = $_POST["anamnesis"];
				$gcs = $_POST["gcs"];
				$td = $_POST["td"];
				$rr = $_POST["rr"];
				$hr= $_POST["hr"];
				$temp= $_POST["temp"];
				$pemeriksaanlanjutan = $_POST["statuslokalis"];
				$diagnosa = $_POST["diagnosa"];
				$perawatan = $_POST["perawatan"];
				$pengobatan = $_POST["pengobatan"];
				$pemeriksaantambahan = $_POST["pemeriksaantambahan"];
				$hasillab = $_POST["hasillab"];
				$monitoring = $_POST["monitoring"];
				$keterangan = $_POST["keterangan"];
				$poli= $_POST["poli"];
				$nakes= $_POST["nakes"];
				

				$sqlugd = "INSERT INTO ugd (nik, nama, tanggal, jam, tanggalkejadian, jamkejadian, alasan, mekanisme, gejalapenyerta, pengantar, katpas, keluhan, pemeriksaanawal, gcs, td, rr, hr, temp, pemeriksaanlanjutan, diagnosa, perawatan, pengobatan, pemeriksaantambahan, hasillab, monitoring, keterangan, poli, nakes) VALUES ('$nik', '$nama', '$tanggal', '$jam', '$tanggalkejadian', '$jamkejadian', '$alasan', '$mekanisme', '$gejalapenyerta', '$pengantar', '$katpas', '$keluhan', '$pemeriksaanawal',  '$gcs', '$td', '$rr', '$hr', '$temp', '$pemeriksaanlanjutan', '$diagnosa', '$perawatan', '$pengobatan', '$pemeriksaantambahan', '$hasillab', '$monitoring', '$keterangan', '$poli', , '$nakes') " ;
				$queryugd = mysqli_query($db, $sqlugd);

				$sqli = "INSERT INTO perawatan (nik, nama, tanggal, keluhan, pemeriksaanawal, tb, bb, lp, td, rr, hr, temp, pemeriksaanlanjutan, diagnosa, perawatan, pengobatan, keterangan, poli, nakes) VALUES ('$nik', '$nama', '$tanggal', '$keluhan', '$pemeriksaanawal',  '$tb', '$bb', '$lp', '$td', '$rr', '$hr', '$temp','$pemeriksaanlanjutan', '$diagnosa', '$perawatan', '$pengobatan', '$keterangan', '$poli', '$nakes') " ;
				$queryi = mysqli_query($db, $sqli);

    			if($queryi) {
      				  header('Location: ugd.php');
    			} else {
       				header('Location: unitgawatdarurat.php?nik='.$nik.'');
  			  }

} else {
		header('Location: unitgawatdarurat.php?nik='.$nik.'');
}
?>

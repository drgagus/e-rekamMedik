<?php
include("config.php");
if(isset($_POST["SELESAI"])){
				$nama = $_POST["nama"];
				$nik = $_POST["nik"];
				$norm = $_POST["norm"];
				$tanggal = $_POST["tanggal"];
				$keluhan = $_POST["keluhan"];
				$pemeriksaanawal = $_POST["pemeriksaanawal"];
				$tb = $_POST["tb"];
				$bb = $_POST["bb"];
				$lp= $_POST["lp"];
				$td = $_POST["td"];
				$rr = $_POST["rr"];
				$hr= $_POST["hr"];
				$temp= $_POST["temp"];
				$poli = $_POST["poli"] ;

				$sqli = "INSERT INTO pemeriksaanawal (nik, nama, tanggal, keluhan, pemeriksaanawal, tb, bb, lp, td, rr, hr, temp, poli) VALUES ('$nik', '$nama', '$tanggal', '$keluhan', '$pemeriksaanawal', '$tb', '$bb', '$lp', '$td', '$rr', '$hr', '$temp', '$poli') " ;
				$queryi = mysqli_query($db, $sqli);

				$sqldel = "DELETE FROM ruangtunggu WHERE nik='$nik' ";
				$querydel = mysqli_query($db, $sqldel);
				
				$sqlantri = "INSERT INTO ruangtunggupoli (norm, nik, nama, poli) VALUES ('$norm', '$nik', '$nama','$poli') " ;
				$queryantri = mysqli_query($db, $sqlantri);
				
    			if($queryi) {
      				  header('Location: pemeriksaan.php');
    			} else {
       				header('Location: periksaawal.php?nik='.$nik.'');
  			  }

} else {
		header('Location: periksaawal.php?nik='.$nik.'');
}
?>

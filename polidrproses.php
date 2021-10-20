<?php
include("config.php");
if(isset($_POST["SELESAI"])){
				$norm =$_POST['norm'];
				$nik = $_POST["nik"] ;
				$nama = $_POST["nama"] ;
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
				$pemeriksaanlanjutan = $_POST["pemeriksaanlanjutan"];
				$diagnosa = $_POST["diagnosa"];
				$perawatan = $_POST["perawatan"];
				$pengobatan = $_POST["pengobatan"];
				$keterangan = $_POST["keterangan"];
				$poli= $_POST["poli"];
				$nakes= $_POST["nakes"];

				$sqli = "INSERT INTO perawatan (nik, nama, tanggal, keluhan, pemeriksaanawal, tb, bb, lp, td, rr, hr, temp, pemeriksaanlanjutan, diagnosa, perawatan, pengobatan, keterangan, poli, nakes) VALUES ('$nik', '$nama', '$tanggal', '$keluhan', '$pemeriksaanawal',  '$tb', '$bb', '$lp', '$td', '$rr', '$hr', '$temp','$pemeriksaanlanjutan', '$diagnosa', '$perawatan', '$pengobatan', '$keterangan', '$poli', '$nakes') " ;
				$queryi = mysqli_query($db, $sqli);

				$sqldel = "DELETE FROM ruangtunggupoli WHERE nik='$nik' ";
				$querydel = mysqli_query($db, $sqldel);
				
				$sqlantri = "INSERT INTO ruangtungguapotek (norm, nik, nama, poli) VALUES ('$norm', '$nik', '$nama','$poli') " ;
				$queryantri = mysqli_query($db, $sqlantri);
				
				$sqlcek = "SELECT * FROM rujukaninternal where nik=$nik";
				$querycek= mysqli_query($db, $sqlcek);
				if (mysqli_num_rows($querycek)>0){
					$delrujukan = "DELETE FROM rujukaninternal WHERE nik=$nik ";
					$querydelrujukan = mysqli_query($db, $delrujukan);
				}
				
				if (empty ($_POST['politujuan'])){
				}else{
					$norm =$_POST['norm'];
					$nik = $_POST["nik"] ;
					$nama = $_POST["nama"] ;
					$alasanrujuk=$_POST['alasanrujuk'];
					$poliasal = $_POST['poliasal'];
					$politujuan = $_POST['politujuan'];
					
					$sqlrujukinternal = "INSERT INTO rujukaninternal (nik, nama, alasanrujuk, poliasal, politujuan) values ('$nik', '$nama', '$alasanrujuk', '$poliasal', '$politujuan')";
					$queryrujukinternal = mysqli_query ($db, $sqlrujukinternal);
					
					$sqlantri = "INSERT INTO ruangtunggupoli (norm, nik, nama, poli) VALUES ('$norm', '$nik', '$nama','$politujuan') " ;
					$queryantri = mysqli_query($db, $sqlantri);
				}
				
    			if($queryi) {
      				  header('Location: poliumum.php');
    			} else {
       				header('Location: polidr.php?nik='.$nik.'');
  			  }

} else {
		header('Location: polidr.php?nik='.$nik.'');
}
?>

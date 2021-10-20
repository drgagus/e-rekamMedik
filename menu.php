<?php 	
		if(isset ($_POST["pendaftaran"])){
				header ('Location: pendaftaran.php');
				
		}else if(isset ($_POST["pemeriksaan"])){
				header ('Location: pemeriksaan.php');
				
		}else if(isset ($_POST["poliumum"])){
				header ('Location: poliumum.php');
			
		}else if(isset ($_POST["poligigi"])){
				header ('Location: poligigi.php');	
		
		}else if(isset ($_POST["polikia"])){
				header ('Location: polikia.php');	
				
		}else if(isset ($_POST["laboratorium"])){
				header ('Location: laboratorium.php');
				
		}else if(isset ($_POST["apotek"])){
				header ('Location: apotek.php');
				
		}else if(isset ($_POST["ugd"])){
				header ('Location: ugd.php');
		
		}else if(isset ($_POST["inputpasien"])){
				header ('Location: inputpasien.php');
				
		}else if(isset ($_POST["rekapitulasipasien"])){
				header ('Location: rekapitulasipasien.php');
				
		}else if(isset ($_POST["pasienhariini"])){
				header ('Location: pasienhariini.php' );
		
		}else if(isset ($_POST["antrianpoliumum"])){
				header ('Location: antrianpoliumum.php');
		
		}else if(isset ($_POST["rekapitulasipasienumum"])){
				header ('Location: rekapitulasipasienumum.php');
				
		}else if(isset ($_POST["antrianpoligigi"])){
				header ('Location: antrianpoligigi.php');
		
		}else if(isset ($_POST["rekapitulasipasiengigi"])){
				header ('Location: rekapitulasipasiengigi.php');
				
		}else if(isset ($_POST["antrianpolikia"])){
				header ('Location: antrianpolikia.php');
		
		}else if(isset ($_POST["rekapitulasipasienkia"])){
				header ('Location: rekapitulasipasienkia.php');
				
		}else if(isset ($_POST["antrianlab"])){
				header ('Location: antrianlab.php');
		
		}else if(isset ($_POST["rekapitulasilab"])){
				header ('Location: rekapitulasilab.php');

		}else if(isset ($_POST["antrianapotek"])){
				header ('Location: antrianapotek.php');
		
		}else if(isset ($_POST["stokobat"])){
				header ('Location: stockobat.php');
				
		}else if(isset ($_POST["rekapitulasiobat"])){
				header ('Location: rekapitulasiobat.php');

		}else if(isset ($_POST["rekapitulasipasienugd"])){
				header ('Location: rekapitulasipasienugd.php');
		
		}else{
				header ('Location: index.php');
		}
?>
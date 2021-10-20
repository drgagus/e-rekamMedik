<?php
SESSION_START() ;
include("config.php") ;
	if (isset ($_POST['pemakai'])) {
			$user = mysqli_real_escape_string($db,$_POST['pemakai']) ;
			$pass = mysqli_real_escape_string($db,$_POST['password']) ;
			$sql = "SELECT * FROM userpass WHERE pengguna='$user' " ;
			$query = mysqli_query ( $db, $sql ) ;
			$login = mysqli_fetch_array($query) ;
			if ( password_verify ($pass, $login['katasandi'])){
				if($login['posisi']=="pendaftaran"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:pendaftaran.php");
			 
				}else if($login['posisi']=="nurse"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:pemeriksaan.php");
					
				}else if($login['posisi']=="dokterumum"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:poliumum.php");
					
				}else if($login['posisi']=="doktergigi"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:poligigi.php");
					
				}else if($login['posisi']=="bidan"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:polikia.php");
					
				}else if($login['posisi']=="analiskesehatan"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:laboratorium.php");
					
				}else if($login['posisi']=="apoteker"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:apotek.php");
					
				}else if($login['posisi']=="dokterugd"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:ugd.php");
					
				}else if($login['posisi']=="drgpython"){
					$_SESSION['posisi'] = $login['posisi'];
					$_SESSION['nama'] = $login['nakes'] ;
					header("location:admin.php");
					
				}else{
					header('location:index.php');
				}
			}else{
					header('location:index.php');
				}
			
	}elseif (isset ($_POST['keluar'])) {
				unset($_SESSION['posisi']) ;
				unset($_SESSION['nama']) ;
				session_destroy() ;
				header('location:index.php');			
	}else{
		header('location:index.php');		
	}
?>
<?php
SESSION_START() ;
include("config.php") ;
	if (empty ($_SESSION['posisi'])) {
	}else{
		header("location:admin.php");
	}
?>

<html oncontextmenu='return false;' ondragstart='return false;' onselectstart='return false;'>

<style>
body{
	margin: 0;
	padding: 0;
	font-family: Arial;
	font-size: 12px;
}

.header{
	position: absolute;
	top: calc(50% - 55px);
	left: calc(50% - 270px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>
<body background="login.jpg">

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
<div class="body"></div>

		<div class="grad"></div>
		<div class="header">
			<div >e-rekam<span style="color:red">Medik</span></div>
			<br><div><label style="font-size: 30; font-weight: 200; color:yellow">Created by: </label><a href="https:\\www.drgagus.com" style="color:red">me</a></div>
			<label style="font-size: 20; font-weight: 200; color:red"></label>
		</div>
		<br>
		<div class="login">
		<form action="indexproses.php" method="post" >
				<input type="text" placeholder="username" name="pemakai"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" name="login" value="Login">
		</form>
		</div>


</body>
</html>
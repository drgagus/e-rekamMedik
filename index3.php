<html oncontextmenu='return false;' ondragstart='return false;' onselectstart='return false;'>
<head>
<title>LOGIN</TITLE>
<IMG src="PuskesmasKelarik.jpg" style="width:100%"/>

</head>

<fieldset>

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

<h3><b>LOGIN</B><h3>
<table>

<form action="indexproses.php" method="POST")

<tr><td><label>USER</label></td><td><input type="text" name="pemakai" required/></td></tr>
<tr><td><label>PASSWORD</label></td><td><input type="password" name="katasandi" required/></td></tr>

<tr><td></td><td><input type="submit" name="masuk" value="MASUK" /></td></tr>
</form>

</table>
</fieldset>
</body>
</html>
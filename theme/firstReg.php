<?php 
	require_once("database.php");
	
	$ref = mysql_query("INSERT INTO users (name, password, level, role) VALUES ('" . mysql_real_escape_string($_GET["name"]) . "','" . sha1(mysql_real_escape_string($_GET['password'])) . "','0',"."'10')");
	
	$result = mysql_result($ref,0);
	
	$content = "Admin Registered Sucessfully";
?>

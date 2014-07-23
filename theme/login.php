<?php	
error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	require_once("database.php");
	$pass=$_POST["password"];
	$password = sha1(mysql_real_escape_string($pass));
	$sql = "SELECT * FROM users WHERE name = '" . $_POST["name"] . "'";
	$ref = mysql_query($sql);
	$row = mysql_fetch_assoc($ref);
	
	if($row == NULL)
	{
		$content = "Its not your friends we asked";
		$log = "Tried login in with wrong username and password was " . $_POST["password"];
	}
	else if($row["password"] == $password)
	{
		Header("Location: index.php");
		$_SESSION["ids"] = $row["id"];
		$_SESSION["valid_user"]= $_POST["name"];
		$_SESSION["level"] = $row["level"];
		$_SESSION["valid_fname"] = $row["fname"];
	$_SESSION["name"] = $row["name"];

		$content .= "Welcome back!";
		if($row["role"] == NULL)
		{
			$_SESSION["role"] = 0;
		}
		else 
			$_SESSION["role"] = $row["role"];
		$log = "Has logged in correctly";
	
	}
	else
	{
		$content .= "What were you thinking? That wasn't your password!";
		$log = "Has entered the wrong password ie " . $_POST["password"];
	}
	$sqllog = "INSERT INTO accesslogs (ip, user, val) VALUES ('". mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . "','" . mysql_real_escape_string($_POST["name"]) . "','" . mysql_real_escape_string($log) . "')";
	$ref = mysql_query($sqllog);
	$content .= "</div><br /><br />";
	require_once("theme/clueless/theme.php");
?>

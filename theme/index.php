<?php 
	session_start();
	require_once("database.php");
	
	if (!$_SESSION["valid_user"])
	{
	Header("Location: loginform.php");
	}
	else if($_SESSION["role"] == 10)
	{
		$content = "<h2>Levels</h2>";
		
		$pagetype = "admin";
		$sql = "SELECT * FROM levels ORDER BY name";
		$ref = mysql_query($sql);
		while($row = mysql_fetch_assoc($ref))
		{
			$content = $content . "<br>" . $row["name"] . "&nbsp; : &nbsp; <a href = \"editlevels.php?l=" . $row["name"] ."\">" . $row["title"] . "</a>";
		}
		$sql = "SELECT * FROM accesslogs ORDER BY time DESC LIMIT 0,100";
		$ref = mysql_query($sql);
		$content = $content . "<br><br><h2>Access Logs</h2>";
		while($row = mysql_fetch_assoc($ref))
		{
			$content = $content . "<br>" . $row['user'] . ":&nbsp;" . $row['val'] . "&nbsp; From" . $row['ip'];
		}
		$sql = "SELECT * FROM users WHERE role != 10 ORDER BY level DESC,passtime ASC";
		$ref = mysql_query($sql);
		$sidebaradmin = "<h2>leaderboard</h2>";
		while($row = mysql_fetch_assoc($ref))
		{
			
			 $sidebaradmin = $sidebaradmin . "<br><a href = \"edituser.php?id=" . $row["id"] . "\">" . $row["name"] . "</a>&nbsp;" . $row["level"] . "&nbsp;" . $row["fname"];
		}
		$sql = "SELECT * FROM logs ORDER BY time DESC LIMIT 0,100";
		$ref = mysql_query($sql);
		$sidebaradmin = $sidebaradmin . "<br><br><h2>logs</h2>";
		while($row = mysql_fetch_assoc($ref))
		{
			
			 $sidebaradmin = $sidebaradmin . "<br>" . $row["user"] . "&nbsp; : &nbsp;" . $row["val"];
		}
	}
	else if($_SESSION["role"] >= 6)
	{
		$pagetype = "admin";
		$content = "<h2>Levels</h2><br>";
		$sql = "SELECT * FROM levels ORDER BY name";
		$ref = mysql_query($sql);
		while($row = mysql_fetch_assoc($ref))
		{
			$content .= "<br>" . $row["name"] . "&nbsp; : &nbsp; <a href = \"editlevels.php?l=" . $row["name"] ."\">" . $row["title"] . "</a>";
		}
		$sql = "SELECT * FROM users WHERE role != 10 ORDER BY level DESC, passtime ASC";
		$ref = mysql_query($sql);
		$sidebaradmin = "<h2>leaderboard</h2>";
		while($row = mysql_fetch_assoc($ref))
		{
			
			 $sidebaradmin .= "<br><a href = \"edituser.php?id=" . $row["id"] . "\">" . $row["name"] . "</a>&nbsp;" . $row["level"];
		}
		$sql = "SELECT * FROM logs ORDER BY time DESC LIMIT 0,100";
		$ref = mysql_query($sql);
		$sidebaradmin .= "<br><br><h2>logs</h2>";
		while($row = mysql_fetch_assoc($ref))
		{
			
			 $sidebaradmin .= "<br>" . $row["user"] . "&nbsp; : &nbsp;" . $row["val"];
		}
		$content .= "</div><br /><br />";
		$sidebaradmin .= "</div>";
	}
	

	else if($_SESSION["role"] >=0)
	{
		$id = $_SESSION["level"];

		$sql = "SELECT * FROM levels WHERE name = '" . mysql_real_escape_string($id) . "'" ;
		$ref = mysql_query($sql);
		$row = mysql_fetch_assoc($ref);
		
		$content = $row['contents'] ;
	
		if(!($content))	
			$content = "Waiting for the remaining levels to be uploaded";
		else
			$content = $content . "<br><div id = \"answerbox\"><br><br><form action = \"answer.php\" name = \"answer\">Answer: <input type = \"text\" name = \"answer\">&nbsp;&nbsp;&nbsp;&nbsp;<input type = \"submit\" value = \"Check\"></form></center>";
			$content = $content . "<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=200261173495887\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>"; 

			$content = $content . "<div class=\"fb-comments\" data-href=\"http://www.revozo.in\" data-colorscheme=\"light\" data-width=\"900\"></div>";
		$cookie = $row['cookie'];
		$javascript = $row['javascript'];
		$title = $row['title'];
		$pagetype = "player";

	}	
	else
	{
		$content = "You have been banned from playing. Please contact admin for details";
	}
	require_once("theme/theme.php");
?>
	
<?php 
session_start();
	require_once("database.php");
	
	if (!$_SESSION["valid_user"])
	{
	  ?> <script>window.location.replace("loginform.php");</script> <?php	  
	  
	  
	
	}
	else if($_SESSION["role"] == 10)
	{
		$content = "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46786932-1', 'revozo.in');
  ga('send', 'pageview');

</script><h2>Levels</h2>";
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
				$content =  $content . "<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=200261173495887\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
				$content = $content . "<br><div id = \"answerbox\"><br><br><form action = \"answer.php\" name = \"answer\">Answer: <input type = \"text\" name = \"answer\">&nbsp;&nbsp;&nbsp;&nbsp;<input type = \"submit\" value = \"Check\"><a style='margin-left:20px;background:#8BBD3A;padding:8px 10px;cursor:pointer;border-radius:5px;box-shadow:0 0 10px #000;text-transform:uppercase;text-decoration:none;color:#000;font-size:12px;border-top:#fff solid 2px;border-left:#fff solid 2px;' href=\"http://www.revozo.wordpress.com\" >Discuss</a></form></center>";
				$content = $content . "<div class=\"fb-comments\" data-href=\"http://www.revozo.in\" data-colorscheme=\"light\" data-width=\"500\"></div>";
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
	
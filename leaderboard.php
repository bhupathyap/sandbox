<?php
error_reporting(0); 
	session_start();
	require_once("database.php");
	$sql = "SELECT * FROM users WHERE role != 10 AND role != -1 ORDER BY level DESC";
	$ref = mysql_query($sql);
	$content = "<h2>Who's On Top</h2><br><br><table width = \"60%\" border=\"2\" align = \"center\"><tr><th>S.No</th><th>Name</th><th>Level</th><th>College/Organization</th></tr>";
	$i = 1;
	$level1=$row["level"];
	$newlevel=$level1+1;
	while($row = mysql_fetch_assoc($ref))
	{
		$content = $content ."<tr><td>" . $i. ".</td><td> " . $row["fname"] . "</td><td>" .$row["level"]. "</td><td>" . $row["college"]. "</td></tr>";
		$i++;
	}
	$content = $content . "</table>";
	$title = "Leaderboard";
	
	require_once("theme/clueless/theme.php");
?>
	

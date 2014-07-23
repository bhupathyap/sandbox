
<?php 
	require_once("database.php");
	session_start();
	if (!$_SESSION["valid_user"])
	{
	Header("Location: loginform.php");
	}
	$content = "<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=514433401978520\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>"; 
	if($_SESSION["role"] >= 5)
	{
		$content = $content . "";
		$sql = "SELECT * FROM forum ORDER BY time DESC";
	}
	else
	{
		$sql = "SELECT * FROM forum WHERE level = " . $_SESSION["level"] . " AND status != 0 ORDER BY time DESC";
	}
	$content = $content . "<div class=\"fb-comments\" data-href=\"http://www.razzmatazz13.org\" data-colorscheme=\"dark\" data-width=\"470\"></div>";
	$ref = mysql_query($sql);
	while($row = mysql_fetch_assoc($ref))
	{
		$content = $content . "<p";
		if($row["status"] == 2)
			$content = $content . " style = \"color:#f4b1b1\"";
		if($row["status"] == 0)
			$content = $content . " style = \"color:#3cf4f2\"";
		$content = $content . ">";
		$content = $content . "<br><br>" . $row["user"];
		if($row["status"] == 2)
			$content = $content . "(admin)";
		$content = $content . ": " . $row["val"];
		if($_SESSION["role"] >= 5)
		{
			$content = $content . "<br>Current status:" . $row["status"] . " And level: " . $row["level"] . " <form name = \"moderatepost\" action = \"moderatepost.php\"><select name =\"opt\"><option value =\"1\">Allow</option><option value = \"0\">Block</option></select><input type = \"hidden\" name = \"id\" value = \"" . $row["id"] . "\"><input type = \"submit\" value = \"change\"></form>";
		}
		$content = $content . "</p>";
	}
	require_once("theme/clueless/theme.php");
?>

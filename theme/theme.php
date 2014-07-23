<html>
<head>
	<title><?php error_reporting(0); if ($title) print $title; ?><?php if (!$title) print "SANDBOX||REVOZO'14||ONLINE TREASURE HUNT" ?></title>
	<link href = "theme/clueless/style.css" media = "all" rel = "stylesheet" type = "text/css">
	<link href = "http://fonts.googleapis.com/css?family=Aldrich" rel = "stylesheet" type = "text/css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
	function positionContent() {
		var w = 0;
		var h = 0;
		//IE
		if(!window.innerWidth)
		{
			//strict mode
			if(!(document.documentElement.clientWidth == 0))
			{
				w = document.documentElement.clientWidth;
				h = document.documentElement.clientHeight;
			}
			//quirks mode
			else
			{
				w = document.body.clientWidth;
				h = document.body.clientHeight;
			}
		}
		//w3c
		else
		{
			w = window.innerWidth;
			h = window.innerHeight;
		}
		if(document.getElementById('center_content')!=null) {
			document.getElementById('center_content').style.left = (w-900)/2 + "px";
		}
		if(document.getElementById('center_contentadmin')!=null) {
			document.getElementById('center_contentadmin').style.left = (w-900)/2 + "px";
		}
		if(document.getElementById('center_contentplayer')!=null) {
			document.getElementById('center_contentplayer').style.left = (w-900)/2 + "px";
		}
	}
	</script>
</head>
<body onLoad="javascript:positionContent()">
	<div id = "watermarkleft"></div>
	<div id = "watermarkright"></div>
	<div id="hbar">
	<ul id = "navbar">
		<li><a href = "index.php">Home</a></li>
		<li><a href = "leaderboard.php">Leaderboard</a></li>
		<li><a href = "rules.php">Rules</a></li>
		
		<?php if($_SESSION["valid_user"]) :?>
		<li><a href = "http://www.revozo.wordpress.com">Forum</a></li>
		<?php endif; ?>
		<?php if($_SESSION["role"] >= 6) :?>
		<li><a href = "addlevels.php">Add levels</a></li>
		<?php endif; ?>
	</ul>
	
	<?php if($_SESSION["valid_user"]) :?>
	<div id = "welcome">	
	Welcome, <?php echo $_SESSION["valid_user"]; ?>!(<a href = "logout.php">Logout</a>)
	</div>	
    	</div>
	<?php endif; ?>	
	
    <div id = "header">
		<div id = "logo" <?php if($_SESSION["valid_user"]) :?>style="left:0px;margin-left:20px;margin-top:70px;width:250px;height:55px"<?php endif; ?>	>
			<img src = "theme/clueless/logo.jpg" <?php if($_SESSION["valid_user"]) { ?> height="55" width="250"<?php } else { ?>height = "75px" width = "340px" <?php } ?>>
		</div>
	</div>
	<div class="col2">
	</ul>
    </div>
	
	<div id = "center_content<?php if($pagetype) print $pagetype ;?>">
    <br>
    
    
	<?php print $content; ?>
	</div>
	<?php if($_SESSION["role"] >= 6) :?>
		<div id = "sidebaradmin">
		<?php if($sidebaradmin) print $sidebaradmin; ?>
		</div>
	<?php endif; ?>
</div>
		<div id="footer">
	&copy; SANDBOX , in association with <a href="http://www.revozo.in" target="_blank">REVOZO - 2014</a>
	</div>	
</body>
</html>
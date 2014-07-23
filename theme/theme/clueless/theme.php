<html>
<head>
<meta itemprop="image" content="images/favicon.ico">
	<title><?php  
error_reporting(0); 
if ($title) print $title; ?><?php if (!$title) print "REVOZO'14" ?></title>
	<link href = "theme/clueless/style.css" media = "all" rel = "stylesheet" type = "text/css">
	<link href = "http://fonts.googleapis.com/css?family=Aldrich" rel = "stylesheet" type = "text/css">
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id = "watermarkleft"></div>
	<div id = "watermarkright"></div>
<div id = "header">
    <div id="hbar">
    	<ul id = "navbar">
						<li><a href = "index.php">Home</a></li>
						<li><a href = "leaderboard.php">Leaderboard</a></li>
						<li><a href = "rules.php">Rules</a></li>
						
					
					
						<?php if($_SESSION["role"] >= 6) :?>
						<li><a href = "addlevels.php">Add levels</a></li>
						<?php endif; ?>
					</ul>
	<?php  if($_SESSION["valid_user"]) :?>
	<div id = "welcome">
		How you doing, <?php echo $_SESSION["valid_user"]; ?>?<?php if($_SESSION["valid_user"]) :?>
						(<a href = "logout.php">Logout</a>)
						<?php endif; ?>
	</div>		
	<?php else: ?>	
 <div id = "welcome" style="margin-right:10px;font-size:16px">   <a href = "register.php">Register</a>
    </div>
    <?php endif;?>
					</div>
		<br>
        
        <div id = "logo">
			<img src = "theme/clueless/logo.jpg" height = "75px" width = "340px">
		</div>
	</div>
	<div class="colmask threecol">
		<div class="colmid">
			<div class="colleft">
				<div class="col1"> 
				<!-- Second column starts -->
					<div id = "center_content<?php if($pagetype) print $pagetype ;?>">
					<?php print $content; ?>
					</div>
				<!-- Second column ends -->
				</div>
				<div class="col2">
				<!-- First column starts -->
				<!-- First column ends -->
				</div>
				<div class="col3">
				<!-- Third column start -->
				<?php if($_SESSION["role"] >= 6) :?>
					<div id = "sidebaradmin">
					<?php if($sidebaradmin) print $sidebaradmin; ?>
					</div>
                    
				<?php endif; ?>
				<!-- Third column ends -->
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
	&copy; SANDBOX, in association with <a href="http://www.revozo.in" target="_blank">REVOZO - 2014</a>
	</div>	
</body>
</html>
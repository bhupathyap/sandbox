<?php 
	$content = "<br><form action=\"login.php\" method=\"post\">Username:<input type=\"text\" name=\"name\" /><br /><br />Password:<input type=\"password\" name=\"password\" /><br><br><br><input type=\"submit\" value=\"Start hunting\" style='padding: 10px 15px;width:200px;font-size:15px;font-weight:100'/></form><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46786932-1', 'revozo.in');
  ga('send', 'pageview');

</script><br><br>Or Join our <a title = \"Register\" href = \"register.php\">Hunt</a><br><p>Like us to contest our<a href=\"https://www.facebook.com/revozo14\" style=\"color:#6C0\">FB Challege</a>.May Luck be in your favor</p>";
	$content =  $content . "<div id=\"fb-root\"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=200261173495887\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
$content = $content . "<div class=\"fb-like\" data-href=\"https://www.facebook.com/revozo14\" data-width=\"400\" data-layout=\"standard\" data-action=\"like\" data-show-faces=\"true\" data-share=\"true\"></div>";
	require_once("theme/clueless/theme.php");
?>
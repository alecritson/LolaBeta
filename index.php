<?php include('system/config.php'); ?>
<?php include('system/functions.php'); ?>
<?php 
		$url = "system/lola_websites.xml";
		$xml = simplexml_load_file($url);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Lola - Local Launcher</title>
	<!-- load up our stylesheet -->
	<?php lola_stylesheet(); ?>
</head>
<body>
	<header>
		<h1 id="logo">Lola - Local Launcer</h1>	
	</header>
	<div class="wrap">
	<div id="lola-form">
	<form  action="system/init.php" method="post">
		<label for="website-name">Website name</label>
		<input type="text" name="website_name">
		<label for="domain">Domain</label>
		<input type="text" name="domain" id="domain" placeholder="yourwebsite"> <span class="dot">.</span> <input type="text" name="domain-ext" id="domain-ext" placeholder="local">
		<input type="submit" value="Create website">
	</form>
	<em>Remember to restart apache afterwards</em>
	</div>
	<section id="website-feed">
		<h2>Your websites</h2>
		<p>If you think some websites are missing, try running <a href="system/xml_cron.php">xml_cron.php</a></p>
		<ul>
	

		<?php foreach($xml->website as $website) { ?>
		<section class="website-block">
		<section class="website-info">
		<h3><?= $website->title ?></h3>
		<em>Created <?= $website->datestamp ?></em>
		</section>
		<a href="http://<?=$website->url?>" class="view-website" target="_blank">View site</a>
	</section><!-- website-block -->
	 <?php } ?>
	</section><!-- website-feed -->
	</div><!-- wrap -->
	<footer>
	<div id="footer-content" class="wrap">
	<a href="http://www.alecritson.co.uk" title="Visit alecritson.co.uk">Alec Ritson</a>
	<p>
	<em>Lola (Local Launch) is a project
by Alec Ritson</em>
	</p>
	</div>	
	</footer>
</body>
</html>
<?php require_once('lola/init.lola.php') ?>
<?php 
		$url = "lola/websites.xml";
		$xml = simplexml_load_file($url);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lola</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="system/interface/style.css">
</head>
<body>

		<div class="settings-panel">
			<h2>Configure lola</h2>	 <a class="close-sidebar"><img src="system/interface/images/cross.png" alt=""></a>
			<form action="" method="" id="update-settings">
			<label for="web-root">Web root <span class="helper">Specify the folder your websites will reside</span>
			</label>
			<input type="text" name="web-root" value="<?php echo $webRoot; ?>">

			<label for="hosts-file">Hosts file<span class="helper">Specify your hosts file location</span>
			</label>
			<input type="text" name="hosts-file" value="<?php echo $hostsFile; ?>">

			<label for="vhosts-file">vhosts file <span class="helper">Specify your vhosts.conf location</span>
			</label>
			<input type="text" name="vhosts-file" value="<?php echo $vhostsFile; ?>">

			<label for="root-httpd">Root httpd <span class="helper">Where do you put your websites?</span>
			</label>
			<input type="text" name="root-httpd" value="<?php echo $rootHttpd; ?>">
			<input type="hidden" value="true" name="settingsCheck">
			<input type="submit" value="Save settings" id="save-settings" name="saveSettings">
			</form>

		</div>
		<a href="#" class="button" id="edit-settings"><img src="system/interface/images/cog.png" alt=""></a>
		<div class="header-wrap">
			<header>
				<img src="system/interface/images/lola-logo.png" alt="Lola">
				<a href="#" class="button" id="add-website">Add a website</a>
			</header>
		</div><!-- headerwrap -->
		<div class="dark-panel">
			<div class="content-wrap">
			<section class="add-website">
				<h1>Add a website</h1>
				<form action="lola/init.lola.php" method="post" id="process-website">
				<label for="website-name">Website name</label>
				<input type="text" id="website-name" name="website-name">

				<label for="domain">Domain</label>
				<input type="text" name="domain" id="domain" placeholder="yourwebsite"> <span class="dot">.</span> <input type="text" name="domain-ext" id="domain-ext" placeholder="dev">

				<label for="website-location">Website location</label>
				<span class="helper">Leave blank to use default location set in <strong>config.php</strong></span>

				<input type="text" name="website-location" id="website-location" placeholder="yourwebsite">
					<input type="hidden" value="true" name="createWebsite">
			<input type="submit" value="Create website" id="create-website">



			</form>
			</section>
		</div>
		</div>
			<div id="websites-list" class="cf">
				<h1>Your websites</h1>
					<?php foreach($xml->website as $website) { ?>
					<section class="website-block">
						<section class="website-info">
							<h3><?= ucfirst($website->title) ?></h3>
							<small>Created <?= $website->datestamp ?></small>
						</section>
						<a href="http://<?=$website->url?>" class="view-website" target="_blank">View site</a>
					</section><!-- website-block -->
		 			<?php } ?>

			</div><!-- website-list -->

			<footer>
				Lola Beta - a project by <a href="http:///www.alecritson.co.uk">Alec Ritson</a>
			</footer>		
		<script src="system/interface/js/jquery.js"></script>
		<script src="system/interface/js/lola.min.js"></script>
</body>
</html>
<?php 
	
	include 'config.php';

	function __autoload($className) {

		$dir = 'helpers/';
		if (file_exists($dir . $className . '.class.php')) { 
          require_once $dir . $className . '.class.php'; 
      	} else {
      		$dir = 'controllers/';
      		require_once $dir . $className . '.class.php'; 
      	}
	}
	if(isset($_POST['settingsCheck'])) {
		$modifySettings = new modifySettings;
		$modifySettings->createNewConfig();
	}
	
	if(isset($_POST['createWebsite'])) {
		$updateFiles = new updateFiles;
		$createFolders = new createFolders;
	}
 ?>
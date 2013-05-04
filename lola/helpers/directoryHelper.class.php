<?php 
// Include our config file so we have access to its variables.
include 'config.php';
class directoryHelper extends websiteFields
{
	public function __construct() {
		parent::__construct();
		global $rootHttpd;
		global $webRoot;
		global $websiteLocation;
	}
}

 ?>



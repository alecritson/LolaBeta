<?php 
// Include our config file so we have access to its variables.
include 'config.php';
class createFolders extends directoryHelper
{
	public function __construct() {
		parent::__construct();
		global $vhostsFile;
  		  global $rootHttpd;
          global $webRoot;
	  // Desired folder structure
	   if(isset($this->websiteLocation) && $this->websiteLocation !== "") {
	    $structure = $this->websiteLocation . "/" . $webRoot . "/";
	   } else {
	        $structure = $rootHttpd . "/" . $this->domain . "/" . $webRoot . "/";
	   }


	  // To create the nested structure, the $recursive parameter 
	  // to mkdir() must be specified.
	  if (!mkdir($structure, 0775, true)) {
	     header("createWebsite: Error: Check folder permissions");
	  } else {
	  	header("createWebsite: 1");
	  }

	  // This simply creates a default page for the website you create
	  $old = 'defaultPage/index.php';
	  $new = $structure . 'index.php';
	  copy($old, $new) or die("Unable to copy $old to $new.");

}
}
 ?>
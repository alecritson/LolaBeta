<?php 

/** 
 * Update the relevant files for website creation
 * 
 * This class is used to update lola's settings 
 *  
 * @author Alec Ritson <alec@builtwithmomentum.com> 
 * @copyright 2013 Momentum studios
 * @license http://www.php.net/license/3_01.txt PHP License 3.01 
 */  

// Include our config file so we have access to its variables.
include 'config.php';
class updateFiles extends websiteFields 
{	
	public function __construct() {

		/** 
		 * Inherit the parent construct so that we have
		 * access to our post data.
		 */

		parent::__construct();


		$this->updateHost();
		$this->updateVhosts();
		$this->updateXML();
	}
	public function updateHost() {
		global $hostsFile;
		  $fh = fopen($hostsFile, 'a');
		  // Add localhost ip to hosts file
		  $stringData = "\n127.0.0.1   ";
		  fwrite($fh, $stringData);
		  // Attach the domain to the IP
		  $stringData =  $this->domain.".".$this->domainExt;
		  fwrite($fh, $stringData);
		  fclose($fh);
	}
	public function updateVhosts() {
		  global $vhostsFile;
  		  global $rootHttpd;
          global $webRoot;

	  $fh = fopen($vhostsFile, 'a') or die("can't open v-hosts");

	  $stringData = "\n<VirtualHost *:80>\n";

	  $stringData .= "  ServerAdmin webmaster@" . $this->domain . "." . $this->domainExt . "\n";

	  if(isset($this->websiteLocation) && $this->websiteLocation !== "") {
	    $stringData .= " DocumentRoot \"" . $this->websiteLocation . "/" . $webRoot . "\" \n";
	   } else {
	       $stringData .= "  DocumentRoot \"" . $rootHttpd . "/" . $this->domain . "/" . $webRoot ."\" \n";
	   }
	  $stringData .= "  ServerName " . $this->domain . "." . $this->domainExt . "\n";
	  $stringData .= "</VirtualHost>";

	  fwrite($fh, $stringData);
	  fclose($fh);

	  return ('v-hosts updated');
	}
	public function updateXml() {
		// Create the full url of our domain
$siteUrl = $this->domain.".".$this->domainExt;

$doc = new DOMDocument();

	  // Setting formatOutput to true will turn on xml formating so it looks nicely
	  // however if you load an already made xml you need to strip blank nodes if you want this to work
	  $doc->load( 'websites.xml', LIBXML_NOBLANKS);
	  $doc->formatOutput = true;

	  // Get the root element "links"
	  $root = $doc->documentElement;

	  // Create new link element
	  $link = $doc->createElement("website");

	  // Create and add the website title
	  $title = $doc->createElement("title", $this->websiteName);
	  $link->appendChild($title);

	  // Create and add datestamp
	  $datestamp = date("d/m/Y");
	  $date = $doc->createElement("datestamp", $datestamp);
	  $link->appendChild($date);

	  // Create and add the website url
	  $title = $doc->createElement("url", $siteUrl);
	  $link->appendChild($title);

	  // Append new link to root element
	  $root->appendChild($link);

	  return $doc->save('websites.xml');
	}
}


 ?>
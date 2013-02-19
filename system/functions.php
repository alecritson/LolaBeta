<?php
// Load up a stylesheet depending on what theme you have
function lola_stylesheet() {
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"themes/".THEME."/".THEME.".css\">";
}

function lola_update_hosts($domain, $ext) {
	$fh = fopen(HOSTS_FILE, 'a') or die("can't open hosts file");
	// Add localhost ip to hosts file
	$stringData = "\n127.0.0.1   ";
	fwrite($fh, $stringData);
	// Attach the domain to the IP
	$stringData =  $domain.".".$ext;
	fwrite($fh, $stringData);
	fclose($fh);

	return ('hosts file updated');
}
function lola_update_vhosts($domain, $ext){

	$fh = fopen(VHOSTS_FILE, 'a') or die("can't open v-hosts");

	$stringData = "\n<VirtualHost *:80>\n";
	$stringData .= "  ServerAdmin webmaster@" . $domain . "." . $ext . "\n";
	$stringData .= "  DocumentRoot \"" . DOC_ROOT . "/" . $domain . "/" . WEB_ROOT ."\" \n";
	$stringData .= "  ServerName " . $domain . "." . $ext . "\n";
	$stringData .= "  ServerAlias " . "www." . $domain . "." . $ext . "\n";
	$stringData .= "  ErrorLog " . "\"logs/" . $domain . "." . $ext . "-error.log\" \n";
	$stringData .= "  CustomLog " . "\"logs/" . $domain . "." . $ext . "-access.log\" common \n";
	$stringData .= "  <directory " . "\"". DOC_ROOT . $domain . "/" . WEB_ROOT . "\"> \n";
	$stringData .= "    Options Indexes FollowSymLinks
	  AllowOverride all
	  Order Deny,Allow
	  Deny from all
	  Allow from 127.0.0.1";
	$stringData .= "  \n</directory>\n";
	$stringData .= "</VirtualHost>";

	fwrite($fh, $stringData);
	fclose($fh);

	return ('v-hosts updated');
}
function lola_make_dir($domain) {

	// Desired folder structure
	$structure = DOC_ROOT . "/" . $domain . "/" . WEB_ROOT . "/";

	// To create the nested structure, the $recursive parameter 
	// to mkdir() must be specified.
	if (!mkdir($structure, 0775, true)) {
	    die('Failed to create folders...');
	}

	$old = 'defaultPage/index.php';
	$new = $structure . 'index.php';
	copy($old, $new) or die("Unable to copy $old to $new.");

}

function lola_add_to_xml($website_name, $domain, $ext) {
	$site_url = $domain.".".$ext;
	$url = "lola_websites.xml";
	$xml = simplexml_load_file($url);

	$datestamp = date("d/m/Y");

	$sxe = new SimpleXMLElement($xml->asXML()); //In this line it create a SimpleXMLElement object with the source of the XML file. 
	//The following lines will add a new child and others child inside the previous child created. 
	$websites = $sxe->addChild("website"); 
	$websites->addChild("title", $website_name); 
	$websites->addChild("datestamp", $datestamp);
	$websites->addChild("url", $site_url);
	//This next line will overwrite the original XML file with new data added 
	$sxe->asXML($url);  
}
?>

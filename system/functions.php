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

	// This simply creates a default page for the website you create
	$old = 'defaultPage/index.php';
	$new = $structure . 'index.php';
	copy($old, $new) or die("Unable to copy $old to $new.");

}

function lola_add_to_xml($website_name, $domain, $ext) {

// Create the full url of our domain
$site_url = $domain.".".$ext;

$doc = new DOMDocument();

	// Setting formatOutput to true will turn on xml formating so it looks nicely
	// however if you load an already made xml you need to strip blank nodes if you want this to work
	$doc->load( 'lola_websites.xml', LIBXML_NOBLANKS);
	$doc->formatOutput = true;

	// Get the root element "links"
	$root = $doc->documentElement;

	// Create new link element
	$link = $doc->createElement("website");

	// Create and add the website title
	$title = $doc->createElement("title", $website_name);
	$link->appendChild($title);

	// Create and add datestamp
	$datestamp = date("d/m/Y");
	$date = $doc->createElement("date", $datestamp);
	$link->appendChild($date);

	// Create and add the website url
	$title = $doc->createElement("url", $site_url);
	$link->appendChild($title);

	// Append new link to root element
	$root->appendChild($link);

	return $doc->save('lola_websites.xml');

}
?>

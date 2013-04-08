<? ob_start(); ?>
<?php include('config.php'); ?>
<?php include('functions.php'); ?>

<?php

	$domain = $_POST['domain'];
	$domain_ext = $_POST["domain-ext"];
	$website_name = $_POST["website_name"];

	if (isset($domain) && isset($domain_ext) && isset($website_name)) {

		lola_update_hosts($domain, $domain_ext);

		lola_update_vhosts($domain, $domain_ext);

		lola_make_dir($domain);

		lola_add_to_xml($website_name, $domain, $domain_ext);

		header( 'Location: '.LOLA_URL ) ;

	} else {
		echo "you need to fill all fields out";
	}
	
?>
<? ob_flush(); ?>
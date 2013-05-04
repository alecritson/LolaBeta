<?php

/** 
 * Lola's base settings
 * 
 * This class is used to update lola's settings 
 *  
 * @author Alec Ritson <alec@builtwithmomentum.com> 
 * @copyright 2013 Momentum studios
 * @license http://www.php.net/license/3_01.txt PHP License 3.01 
 */  

class baseSettings 
{
	public  $webRoot,
			$hostsFile,
			$vhostsFile,
			$rootHttpd,
			$newSettings,
			/**
			* Sets the filepath of the config file
			*
			* @var string stores the config file location
			*/
			$filePath = 'config.php';

	public function __construct() 
	{
		/**
		* returns web root i.e public_html
		*
		* @var string stores the top directory for the website, i.e public_html
		*/

		$this->webRoot 		=	$_POST['web-root'];

		/**
		* returns hosts file location
		*
		* @var returns hosts file location
		*/

		$this->hostsFile 	=	$_POST['hosts-file'];

		/**
		* returns hosts file location
		*
		* @var string stores vhosts file path
		*/

		$this->vhostsFile 	=	$_POST['vhosts-file'];

		/**
		* Stores the location of your websites, you can set a specific
		* location of each website on the front-page
		*
		* @var string stores root path of your server
		*/

		$this->rootHttpd 	=	$_POST['root-httpd'];
	}
}
?>
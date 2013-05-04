<?php
	
	/** 
	 * Fields relating to creating websites.
	 *
	 * This class is used to update lola's settings 
	 *  
	 * @author Alec Ritson <alec@builtwithmomentum.com> 
	 * @copyright 2013 Momentum studios
	 * @license http://www.php.net/license/3_01.txt PHP License 3.01 
	 */  

	class websiteFields extends baseSettings
{	
	/** 
	 * Create our variables for creating our website.
	 *
	 * @var Set up our variables that will be used.
	 *
	 */

	public  $domain,
			$domainExt,
			$websiteName,
			$websiteLocation;

	// Set the variables as soon as the class is instegated.
	public function __construct() 
	{

		/** 
		 *
		 * Stores the domain name, which is (mydomain).dev, for example
		 *
		 * @var String stores domain name
		 *
	 	 */

		$this->domain =	$_POST['domain'];

		/** 
		 *
		 * Stores the domain extention, which is mydomain.(dev), for example
		 *
		 * @var String stores domain extension
		 *
	 	 */

		$this->domainExt = $_POST["domain-ext"];

		/** 
		 *
		 * Stores the website title set on creation of a website
		 *
		 * @var String stores website name
		 *
	 	 */

		$this->websiteName = $_POST["website-name"];

		/** 
		 *
		 * Sets the website location (if set)
		 * This is not the location from the default config.php
		 * and would only be used if the website location differs
		 * from the default.
		 *
		 * @var String stores website location
		 *
	 	 */

		$this->websiteLocation = $_POST['website-location'];
	}
}
	
?>
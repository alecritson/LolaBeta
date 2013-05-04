<?php 

/** 
 * Modify lola's core configuration
 * 
 * This class is used to update lola's settings 
 *  
 * @author Alec Ritson <alec@builtwithmomentum.com> 
 * @copyright 2013 Momentum studios
 * @license http://www.php.net/license/3_01.txt PHP License 3.01 
 */  


class modifySettings extends baseSettings 
{
	public $fileSettings,
		    $oldVar,
			$newVar,
			$newSettings,
			$newFileStr,
			$error;

	
	public function __construct()
	{
		/** 
		 * Inherit the parent construct so that we have
		 * access to our post data.
		 */

		parent::__construct();

		/** 
		 * Using the fields from baseSettings, assign a new entry
		 * to each variable.
		 *
		 * @param Each array has the new setting plus a description of each entry
		 */  

		$this->newSettings = array(
	 	'webRoot'		=> 	array($this->webRoot,	'Specify the folder your websites will reside'),
	  	'hostsFile'		=> 	array($this->hostsFile,	'Specify your hosts file location'),
	  	'vhostsFile'	=> 	array($this->vhostsFile,	'Specify your vhosts.conf location'),
	  	'rootHttpd'		=> 	array($this->rootHttpd,	'Where do you put your websites?')
	  	);

		var_dump($this->newSettings);

	  	/** 
		 * Get a list of the variables in the scope before including the file
		 *
		 * @var stores current variables
		 */

		$this->oldVar = get_defined_vars();

		/** 
		 * Include the config file and get it's values
		 *
		 * @var stores variables of current config (before update)
		 */


		if (is_file($this->filePath))
		{
		    require_once($this->filePath);
		    header("settingsSaved: 1");
		} else {
			header("settingsSaved: Error: unable to load config");
		}
		/** 
		 * Get a list of the variables in the scope after including the file
		 *
		 * @var stores variables of current config (after update)
		 */

		$this->newVar = get_defined_vars();

		/** 
		 * Find the difference - after this, $fileSettings 
		 * contains only the variables declared in the file
		 *
		 * @var stores contains new variables.
		 */

		$this->fileSettings = array_diff($this->newVar, $this->oldVar);

		/** 
		 * Update $fileSettings with any new values 
		 *
		 * @var string stores new variables.
		 */

		// 
		$this->fileSettings = array_merge($this->fileSettings, $this->newSettings);

	}
	public function createNewConfig() {

		/** 
		 *
		 * Function used to create the new config file
		 * with the updated settings.
		 *
		 */ 

		/** 
		 * Start by creating the top of the php file
		 *
		 */
		$this->newFileStr = "<?php\n\n";

		/** 
		 * We want to loop through the new config variables
		 * and concatenate the variable
		 *
		 * @var string stores new variables.
		 */

		foreach ($this->fileSettings as $name => $val) {

		/** 
		 * Output our config variables comment
		 * and concatenate the variable
		 *
		 * @var string stores new config comment
		 */

		$this->newFileStr .= "\n\n//" . $val['1'] . "\n";
		

		/** 
		 *
		 * Using var_export() allows you to set complex values 
		 * such as arrays and also ensures types will be correct
		 *
		 * @var string stores new config setting
		 */
		
		$this->newFileStr .= "$".$name." = ".var_export($val['0'], TRUE).";\n";


		} // end of foreach

		/** 
		 *
		 * End our php file
		 *
		 */

		$this->newFileStr .= "\n?>";

		/** 
		 *
		 * Create out new config
		 *
		 */
		file_put_contents($this->filePath, $this->newFileStr, LOCK_EX);

	}
}
 ?>




<?php
// Make sure this is referenced correctly
include('config.php');
include('functions.php');

// Add whatever you want to exclude from the cron here.
$exclude_list = array(
					".", 
					"..", 
					'index.php', 
					'.DS_store', 
					'Thumbs.db', 
					'testmysql.php', 
					'public_html',
					'.git',
					'.gitignore'
				);

if (isset($_POST['submit'])) {

$dir   = $_SERVER['DOCUMENT_ROOT'];
$directories = array_diff(scandir($dir), $exclude_list);

	foreach($directories as $website) {
 	lola_add_to_xml($website, $website, 'local');
 }	
}

 
	
 ?>
<h1>What is this?</h1>
<p>Basically lola will search through the root directory (<?php echo $_SERVER['DOCUMENT_ROOT']; ?>), look for folders and add them to the lola_websites.xml</p>
<p>Right now there is nothing in place to say "Finished!" but I will add this in the future</p>
<p><strong>This will assume your websites end with .local</strong>, if this is not the case, you will need to manually change that in <strong>lola_websites.xml</strong> under the &lt;url&gt; child <br>
or you can change what extension is used in the source on line 22</p> 
<p>I have included a basic list of things to exclude, you should look in the source and change the list to your needs, before you run the script</p>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<input type="submit" id="submit" name="submit" value="Run script">
</form>
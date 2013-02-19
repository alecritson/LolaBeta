<?php

/*
This is where you configure how lola works
*/


// Specify what theme to use (default ships with lola)
// Make sure your CSS file is the same as this i.e default.css
// This also applies to the folder name of the theme.
define('THEME', 'default');

// This is the full url of lola
define('LOLA_URL', 'http://localhost/lola');

//Name of the webroot folder on each install, change this to whatever
// you want. Examples: httpdocs, www, web_files, web
define('WEB_ROOT', 'public_html');

// Set the location of your HOSTS file
define('HOSTS_FILE', '/path/to/your/hosts');

// Set the location of your VHOSTS
define('VHOSTS_FILE', '/path/to/your/httpd-vhosts.conf');

// Where do you put your websites? eg D:/wamp/www
define('DOC_ROOT', '/root/path');

?>
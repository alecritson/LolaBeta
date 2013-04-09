# Lola - Making local development a little easier

## About
lola stands for local launch and makes setting up localhost websites a breeze, cutting out the need to edit multiple files just to add a website with a TLD. It is entirely filebased and it has been designed to be highly customisable.

**In the future**

Depending on how this free version goes I will look at creating a more indepth/premium version in Codeigniter or something, with databases and git etc.

I will be starting work on ways to automatically install a CMS into the directory, this will come after the XML fix listed under known issues.

## How it works
Lola simply takes the info you specify in the input fields and then adds them to the following files in the following ways:

  1. **hosts file** - Creates alias at the end of the hosts file e.g 127.0.0.1 yourwebsite.local
  2. **v-hosts file** - Takes the same information and passes it through a function which then fills out all the relevant blocks in the v-hosts.
  3. **lola_websites.xml** - Add the same data to an xml file which is then looped on index.php to display all the websites   



 _Lola DOES NOT restart apache, so you will need to do that manually_

## Known issues ##

**lola\_websites.xml**  
~~Right now there is no formatting on the output of this file, this is something thats on the top of the list as I want the file to be readable and easily customised/edited, atm its basically minified.~~  
		
This has been fixed, if you already have websites added thats fine when you add another website it should sort out the format for all of them :)  

**If you have any issues using Lola, feel free to email me at [info@alecritson.co.uk]("mailto:info@alecritson.co.uk")**

## OSX users
By default OSX will not let you edit the hosts file, the way round this would be to find the hosts file and allow write permissions for your user.  

## Getting started
Download the files and add to a sub directory of Localhost, such as http://localhost/lola. You can put the files in whatever directory you want, Lola runs from its own directory.

### Edit config.php
This file is the only file you need to edit to get going, everything should be pretty obvious as to its use, but I will go through them below.

**Theme definition**

	Line 11: define('THEME', 'default');

Because I wanted lola to be flexible, you can theme it however you want. You can add your own theme in the themes directory, just be sure that the name of your stylesheet is the same name as the folder in which it resides

**Where is lola?**  

	Line 14: define('LOLA_URL', 'http://localhost/lola');

This is the full url of lola.

**Website root**  

	Line 18: define('WEB_ROOT', 'public_html');

Here you can specify where the web files of your new websites are located. Some people will call this 'www', others 'httpdocs', its entirely up to you. This will apply to all websites created with lola

**Hosts file**

	Line 21: define('HOSTS_FILE', 'C:\Windows\System32\Drivers\etc\hosts');

Set the location of your hosts file, if you are running windows you can most likely leave this as it is. Lola edits the hosts file to add an alias of your website domain. **Please remember to back up your hosts file**

_You might need to check you have the correct permissions to edit this file_  
 
**V-Hosts file**

	Line 24: define('VHOSTS_FILE', 'D:\wamp\bin\apache\apache2.4.2\conf\extra\httpd-vhosts.conf');

Set the location of your v-hosts, the location of this file depends on how you use your local dev area, as you can see I use WAMP and so, this is where my v-hosts is set. **Please remember to back up your v-hosts file**

_You might need to check you have the correct permissions to edit this file_

**Document Root**

	Line 27: define('DOC_ROOT', 'D:/wamp/www');

Set the location of all your websites, again this will depend on your dev environment.

## First steps

Once you have updated config.php, load up lola through the browser. You may notice it does not list all the websites you have on your system to start with.
I created **xml\_cron.php** to basically go through the folders and hook them into the **lola\_websites.xml** file, you should only need to do this once as it might duplicate all the entries, so be careful.

Once thats sorted though you should be good to crack on and add websites, these will then automatically appear in your website list.

##Disclaimer  
Since this is file-based please just make sure you back everything up, especially the files listed above, I have tested this and created tons and tons of websites with it to test it out and everything works as it should, but you know how these things go, if you experience issues then please let me know and I will try and work out a fix!

This is not intended, nor should it ever be used, for production environments. If you choose to do this you do so entirely at your own risk, I havent even tried to test it on a live server, because thats not its intended purpose. If you need something like this for your live server, then you should really look into something like WHM.

Apart from that, have fun! if you need more explanation of something then please feel free to ask and I will update the readme or comments in the code!

##Licence

The free version is licenced under a Creative Commons Attribution 3.0 Unported License.

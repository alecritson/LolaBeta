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

Getting started
------------------
This is a simple guide to get you up and running with Lola. If you run into any issues, please do not hesitate to get in touch.

**1. Download & extract lola-master.zip**

Once you have downloaded Lola, simply extract the contents into a directory of your choice, just remember you will want to access it through your browser.

**2. Configure Lola**

Open up Lola in your browser, presumably http://localhost/lola , and click the settings cog to bring up the available fields to edit her core settings. Once you have filled the fields out, click save.

Remember you will need write permissions to your websites directory, your hosts file and your vhosts file.

**3. Create a website**

Now you are all set up and ready to start adding websites! Simply click the 'add a website' button  and fill out the fields, this will then update all the relevant files to create your site.

Remember to restart apache I have put together a little script to help you with this, but this might not work with all apache installs and its OSX only, you can download it here
##Licence

The free version is licenced under a Creative Commons Attribution 3.0 Unported License.

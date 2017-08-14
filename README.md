# CyberSecurityGame 
A prototype of a Cyber Security Game that is meant for two players

README file is best viewed through gedit for Linux or in notepad for Windows

Based off the content found in this github repository: https://github.com/m3doc/Cyber

Instructions for installing the game
Step 1. Install Xampp server on your machine
	1a) Go to https://www.apachefriends.org/download.html
	1b) Download Xampp version no greater than 5.6 with a PHP version no greater than 5.6
	For Linux: 
	1c) In the terminal give the xampp-linux-x64-5.6.3-0-installer.run file permission by entering command: "sudo chmod +x xampp-linux-x64-5.6.3-0-installer.run
	1d) Then enter the command: "sudo ./xampp-linux-x64-5.6.3-0-installer.run"
	1e) After running the installer setup the xampp server
	1f) Enter the command: "sudo /opt/lampp/lampp start" to start the Xampp service
	1g) Then in your browser enter http://localhost/ to verify that the server is running
	1h) Enter the command: "sudo /opt/lampp/lampp security" to configure the security settings of the server
	1i) The Xampp server has now been succesfully installed 
	For Windows: 
	1j) Open the CD or DVD drive from My Computer, install the program, and click on run
	1k) When given the initial installation prompt just hit the enter key and accept the default settings
	1l) Once the installation is finished start the Xampp control panel 
	1m) Start the Apache and MYSQL services 
	1n) Verify the Apache and MYSQL installations by clickling on the administration link for both
	1o) Then enter http://localhost/ to verify that the server is running
	1p) The Xampp server has now been succesfully installed 
Step 2. Copy the folder "cyber" into the root directory of your xampp server. For Windows C:\\xampp\htdocs\
	For Linux \opt\lampp\htdocs
Step 3. For Linux: give the folder root permission by doing the command: chmod 777 -R /opt/lampp/htdocs/cyber/
	For Windows: Not required 
Step 4. Install the database in the xampp server
	4a) Start xampp server with apache and mysq service
	4b) Go to browser open localhost/phpmyadmin
	4c) Create a database named "acs_cyber" or any name of your choice
	4d) Open the Sql prompt on the same page in the "acs_cyber" database
	4e) Paste the content of the file acs_cyber.sql provided in the cyber_master folder 
	4f) Enter Go.
Step 5. Now you are ready with the deployment
	Register at least two players and start playing with each other.
	
	



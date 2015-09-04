# Cyber
A Multi Player Game Based on Cyber Security


#####################################Instruction for installing the game#######################################

Step 1. Install xampp server on your machine 
Step 2. Copy folder cyber into the root directory of your xampp server i.e. for windows C:\\xampp\htdocs\
	for linux \opt\lampp\htdocs
Step 3.( In case of Linux)
	give folder the root permission by doing chmod 777 -R /opt/lampp/htdocs/cyber/
	(In case of windows )
	No such thing required
Step 4. Install the database in the xampp server
	start xampp server with apache and mysq service
	Go to browser open localhost/phpmyadmin
	Create a database named "acs_cyber" or any name of your choice
	Open the Sql prompt on the same page for "acs_cyber" database
	paste the content of database file acs_cyber.sql provided in database folder outside of this directory
	Enter Go.
Step 5. Change the credentials in configuration file
	open cyber/application/config/database.php
	change the following according to your setting of the server and database(If you have changed them)
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = '';
	$db['default']['database'] = 'acs_cyber';
Step 6. If you plan to upload this game on another web server
	open file cyber/application/config/config.php
	change the value of url in the following with your url like 'http://jagmohan.acslab.org/cyber/'
	$config['base_url']	= 'http://localhost/cyber/';
Step 7. Now you are ready with the deployment
	Register at least two players and start playing with each other.
Step 8. For any problem and query contact 1308js@gmail.com.

	
	



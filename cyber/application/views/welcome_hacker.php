<?php //print_r($this->session->all_userdata()); ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><font color="white">Protocol Destroyer</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/new.css'?>">
</head>
<body background="<?php echo base_url().'images/background.gif'?>" >



<div>
	


<br>

</div>

<div class="centered" style="position:relative; ">
	<a class="btn right" href='<?php echo base_url()."main/logout"?>'>Logout</a>
	<h1><p><font color="white"> <?php echo 'Welcome Hacker of The Protocols'.$this->session->userdata('');?></p></h1>

<font color="white"><p><b>Currently, this game is in the prototyping stage, but we are glad you took the time to download it. You probably learned a lot about computers in the process of getting to this stage. Since you are so committed, we are happy to provide you with our best attempt at educating you about cyber security (without being bored out of your mind). 

<p><b><font color="red">hackmeifyoucan!.com<font color="white"> is your local bank's website where they conduct transactions. Due to an increase in customers, the bank owner has become paranoid about a possible cyber-attack. 
The owner of the bank asks two different sets of people to hack the system and defend the system against some cyber-attacks.
Some terms related to hacking which are used in this game:</p>
<p><b><font color="red">Protocol: <font color = "white">a set of rules that allow computers to communicate</p>
<p><b><font color="red">Vulnerability: <font color = "white">a flaw in software that leaves it open to attack</p>
<p><b><font color="red">Exploit: <font color = "white">piece of code used to attack a system at its weak points</p>
<p><b><font color="red">Port:  <font color = "white">a channel through which information is sent between computers</p>

<p><b>Today you have chosen the role of hacker to play the game.</p>
<h1><b><p class="cen"> Instructions </p></b></h1>


<p><b>Your single task is to hack the system as soon as possible to gain the maximum points by using certain commands. Your hacking process contains 6 steps:</p>
1.	Scanning the system ("nmap url")
<br>2.	Finding the vulnerability (use "vulnerability" command) 
<br>3.	Finding the exploit (use "eSearch" command)
<br>4.	Using the exploit (use "use_exploit" command)
<br>5.	Setting the target (use "set_target" command)
<br>6.	Setting the port (use "set_port" command)

<p><b><b>There are 600 seconds on the clock per round, and there are 3 rounds total. Try to exploit as many vulnerabilities as you can before the defender patches them. The person with the highest score at the end of the round wins!</b></p>
<p>Good Luck!</p>

	<a class="cen btn" href="<?php echo base_url().'main/wait' ;?>">Enter  into Game</a>
</div>

<br>
</br>


	
</div>
</body>
</html>

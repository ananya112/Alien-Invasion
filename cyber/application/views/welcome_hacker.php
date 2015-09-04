<?php //print_r($this->session->all_userdata()); ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hack it!</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/new.css'?>">
</head>
<body background="<?php echo base_url().'images/background.gif'?>" >



<div>
	


<br>

</div>

<div class="centered" style="position:relative; ">
	<a class="btn right" href='<?php echo base_url()."main/logout"?>'>Logout</a>
	<h1><p> <?php echo 'Welcome '.$this->session->userdata('role');?></p></h1>

<p>In today’s world the more technical (more electronics you use) you are the more is the danger of you being hacked. As a saying goes there are only two type of people the one who know they are being hacked and the one who don’t. So just to be on the safe side of not being hacked you have to be more knowledgeable in terms of hacking (cyber-attacks). There is a great need for the people to be aware of these type of hacks so that they can know how to save themselves from the same. And the same need arises for professionals and company as anyone can be the target of cyber theft (attacks). 

<p>So for the purpose of making people aware of cyber security we are conducting a study. Which includes two people who will play against each other as a defender and a hacker. Please read the scenario carefully.</p>

<p><b>hackmeifyoucan!.com</b> is a very popular website which does online bitcoin transaction. It does have a lot of user information including their PayPal accounts. Due to increase in the traffic on website, owner of <b>hackmeifyoucan!.com</b> is a bit more worried about cyber-attack. As the hackers are more attracted towards the websites which have a good amount of traffic so they will get more data on successful hack.
So owner of the website hires a programmer to replicate the architecture of his website on some other server without any sensitive information. Then he asks two different sets of people to hack the system and defend the system against some cyber-attacks. So that he can get the amount of loss analysed in case of a real cyber-attack or the amount of information that can be saved by implementing a hacking detection system.
Some terms related to hacking which are used in this game:</p>
<p><b>Vulnerability:</b> vulnerability can be defined as a loop whole in some piece of software which leads to making the software hackable. <b>e.g. CVE-2010-5431</b></p>
<p><b>Exploit:</b> Piece of code which is used to hack the system. These exploits are different for each vulnerability. <b>e.g. /sbin/service/shell/vsftpd</b></p>
<p><b>Port:</b> This can be defined as way into the computer. Like every room has some window or door to get into in the same way ports are the way to get into a computer or system. <b>e.g. 21, 65, 819 etc.</b></p>

<p>Today you have chosen the role of <b>hacker</b> to play the game.</p>
<h1><b><p class="cen"> Instructions </p></b></h1>

<p>Your single task is to hack the system as soon as possible to gain the maximum points. Your hacking process contains 7 steps:</p>
1.	Scanning the system
<br>2.	Finding the vulnerability 
<br>3.	Finding the exploit 
<br>4.	Using the exploit 
<br>5.	Setting the target 
<br>6.	Setting the port
<br>7.	Exploiting the system
<p>Every steps contains different points.</p>

<p>At second step you will have to specifically choose the vulnerability with which you will play. There may be more than one false vulnerability which will lead to no gain or less gain than others. So choose wisely. At any stage if you think you have chosen the wrong vulnerability or you have no other way to go forward, you can always come back by specifying the command <b>change</b>. But for this step you will have to lose some points. And for gaining maximum points you have to hack all the possible vulnerabilities in the game as soon as possible because time elapsed between your hack and the patch done by defender will be taken into account while counting for your bonus.
In the game you will get the set of commands you have to use. You need to figure out the commands with the right sequence to use. You can know how to use a command by typing command name. <b>e.g. vulnerability</b></p>
<p>So make your time count. </p>
<p>Good Luck!</p>

	<a class="cen btn" href="<?php echo base_url().'main/wait' ;?>">Enter  into Game</a>
</div>

<br>
</br>


	
</div>
</body>
</html>

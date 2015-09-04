<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/new.css'?>">
</head>
<body background="<?php echo base_url().'images/background.gif'?>" >


<div id="container">
	<h1 align="center"><font color="blue">Hack it !</font></h1>
<?php
	echo form_open('main/login_validation');
	// If there are errors then this echos them out
	echo validation_errors();
	$signup_url = base_url()."main/signup";
	
?>	<h1 align="right"> <font color='blue'>Login and Registration</font></h1>
	<table align="right" width="30%">
	<tr>
      <td align="right"><font size='5' color='blue'>Username:</font></td>
      <td align="right" width="200"><?php echo form_input('username');?></td>
    </tr>
    <br>
    </br>
    <tr>
      <td align="right"><font size='5' color='blue'>Password:</font></td>
      <td align="right"><?php echo form_password('password');?></td>
    </tr>
    <tr>
    <td> </td>
      <td align="right"><font color='blue' size='5'><?php echo form_submit('login_submit','Login');?></font></td>
      
    </tr>
    <tr><td align="center"></td>
    	<td align="right"><font color='blue' size='5'><?php echo "<a href=".$signup_url.">Register</a>";?></font></td>
    </tr>
  </table>

<?php
	
	echo form_close();
?>
</div>

</body>
</html>

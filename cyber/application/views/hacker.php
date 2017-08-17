<?php 


//print_r($this->session->userdata());
$id= $this->session->userdata('id');

header('Refresh: 0.5;isMatched');

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hack it!</title>

</head>
<body background="<?php echo base_url().'images/background.gif'?>" >


<p align="center" ><font size="6"> Welcome <?php echo $this->session->userdata('role');?></font></p>
<div>
<p align="center" ><font size="4"> Please Wait for another User</font></p>	


<br>

</div>

<div id="contentframe" style="position:relative; top: -400px; left: 60%;">
</div>

<br>
</br>


	<a href='<?php echo base_url()."main/logout"?>'>Logout</a>
	
</div>
</body>
</html>

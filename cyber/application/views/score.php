<?php //print_r($this->session->all_userdata()); ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hack it!</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/new.css'?>">

</head>
<body background="<?php echo base_url().'images/background.gif'?>" >
    <br><a class=" btn " href='<?php echo base_url()."main/logout"?>'>Logout</a>
  



<div>
	
<p id="varun"> </p>

<script>
/*function checkPlayer(){
      
      

        $.ajax({
          type:"post",
          url:"http://localhost/cyber/js/check.php",
          data:"id=<php echo $this->session->userdata('id')  ?>"+"&action=check",
          success:function(data){
                               $("#varun").html(data);
                                  
                              }
        });
      }

for(;;)
{
	checkPlayer();
}*/

</script>	
<br>

</div>

<div id="contentframe" style="position:relative; top: -400px; left: 60%;">
</div>

<br>
</br>



</div>
</body>
</html>

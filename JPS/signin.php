<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  
     
	 
	 
  
  
 

  
  
  
  </head>
<body>



<?php
 
 
 $temple =  $_GET['tstr'];
  $GLOBALS['loginname'] =  $_GET['loginname'];
 $password =  $_GET['password'];

 if($temple!=$password){
	 
	echo '<script type="text/javascript">
           window.location = "regsignup.php"
      </script>'; 
	 
	 
 }
 
 
 
 
 ?>
 
                           
 <div style=" color:blue;background-color:orange;text-align:right">
 Welcome! &nbsp<?php echo $GLOBALS['loginname'];?> 
 <br>
 <a href="regsignup.php">logout</a>
 <div>
 </body>
 </html>
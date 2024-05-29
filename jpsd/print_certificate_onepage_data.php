<<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<style media="all" type="text/css" >


 
	
	</style>
	</head>

	
<body>


 <?php

 include 'function.php';
		$si=1; 
     $q0  = json_decode($_POST['myData'],true);
	 $q0  ;
	$q=idatetoreg($q0);
	  
	 
	echo "<table>";
	 foreach($q as $reg){
		
		
	 
	 	  $ss=substr($reg, 0, 6);
  
	

   

	
	
	echo "<tr><td><div style='margin-left: .6cm;'>
	
	<p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p>
		 		
		<p style='font-family:SutonnyMJ; font-size:40px;'>".regtoiserial($reg)."</p>
		<p style='font-family:SutonnyMJ; margin-top: -.5cm;'>স্থান: ইসকন, সিলেট;    <span style='font-family:SutonnyMJ; font-size:20px;'> ".regtoidate($reg)." </span>ইং; </p>
		<p>	নাম: ".bname($reg)." [".ename($reg)."]</p>
		<p style='font-size:20px;'> <b>দীক্ষা নাম: ".finalname_b($reg)."</b></p>
		<p > [".finalname($reg)."] </p>
		<p>	মন্দির : ".tbname($ss)." </p>
		<p>Reg:".$reg.";  Address : ".address($reg)." </p>
		<p>&nbsp</p><p>&nbsp</p>
		 </div></td></tr>";	 
	//echo " <tr> <td></td><td style='text-align:right; font-family:SutonnyMJ;'> ".regtoiserial($reg)."</td>   <td>".bname($reg)."</td> <td>".address($reg)."</td>";
	 	 


	 
}

		
		
 	
		
		
		
	$si=$si+1;	 
		 
		 
 
	 
	 
 echo "</table>";
	 
	
	
	 
	?>
	
	
	
	
	
	
	
	
	
	
	
	</body>
	</html>
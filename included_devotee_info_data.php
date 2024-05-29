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

<table>
 <?php

 include 'function.php';
		 
     $nm= $_POST['included_names'];
	 $names = explode(',', $nm);
	 foreach($names as $reg){
		
		
	 
	 	  
  
	

   

	
	
	echo "<tr><td><div style='margin-left: 1.3cm;'>
	
	<p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p>
		 		
		<p style='font-family:SutonnyMJ; font-size:40px;'>".regtoiserial($reg)."</p>
		<p style='font-family:SutonnyMJ; margin-top: -.5cm;'>স্থান: ইসকন, সিলেট;    <span style='font-family:SutonnyMJ; font-size:20px;'> ".regtoidate($reg)." </span>ইং; &nbsp ".tithi($reg)."</p>
		<p>	নাম: ".bname($reg)." [".ename($reg)."]</p>
		<p> <b>দীক্ষা নাম: ".finalname_b($reg)."</b> [".finalname($reg)."] </p>
		<p>	মন্দির : ".tbname($ss)." </p>
		<p>Reg:".$reg."   Address : ".address($reg)." </p>
		
		 </div></td></tr>";	 
	//echo " <tr> <td></td><td style='text-align:right; font-family:SutonnyMJ;'> ".regtoiserial($reg)."</td>   <td>".bname($reg)."</td> <td>".address($reg)."</td>";
	 	 


	 
}

		
		
 	
		
		
		
	$si=$si+1;	 
		 
		 
 
	 
	 

	 
	
	
	 
	?>
	
</table>	
	
	
	
	
	
	
	
	
	
	</body>
	</html>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<style>
	body {
	background:#1f1f1f;
    font-family: 'Open Sans', sans-serif;
}


th {
    border: 0.25px solid black;
    text-align: center;
    padding: 0px;
}


	</style>
	</head>
<body>


 <?php

 include 'function.php';
	$si=1; 
    $q0  = json_decode($_POST['myData'],true);
	 
	$q=idatetoreg($q0);
	  
	 echo "<table  style= 'font-family: arial, sans-serif;	font-size: 12px; border-collapse: collapse; width: 100%;'>	 
	<tr><th>#</th>   <th>নাম</th> <th>Address</th><th>#</th>   <th>নাম</th> <th>Address</th> </tr>";
	
	 foreach($q as $reg){
		$qq=substr($reg, 0, 6);
	 	if(empty($st)){
		 	$st=1; 
		 	 } 
	 	  $ss=substr($reg, 0, 6);
 if($st!=$ss)
	 { 
 
 $GLOBALS['c']=2;
 
 echo "<tr> <td style='color:white;background-color:black; padding:5px; text-align:center;' colspan='8'>".tbname($ss)." </td> </tr>" ;
 
 
	 $st=substr($reg, 0, 6);
	}
	
	if ($GLOBALS['c'] % 2 == 0) {
   

	echo "<tr><td style='text-align:center;font-family:SutonnyMJ; border: 0.25px solid black; padding: 1px 5px 1px 5px;'>".regtoiserial($reg)."</td><td style='border: 0.25px solid black; padding: 1px 5px 1px 5px;' >".bname(ispostponed($reg))."</td><td style='font-size: 10px; border: 0.25px solid black; padding: 1px 5px 1px 5px; '>".address(ispostponed($reg))."</td>";	 


	 
}
else{
	
	
echo "<td style='text-align:center;font-family:SutonnyMJ;border: 0.25px solid black; padding: 1px 5px 1px 5px;'>".regtoiserial($reg)."</td> <td style='border: 0.25px solid black; padding: 1px 5px 1px 5px;' >".bname(ispostponed($reg))."</td><td style='font-size: 10px;border: 0.25px solid black; padding: 1px 5px 1px 5px;'>".address(ispostponed($reg))."</td></tr>";	
}
		
		
$GLOBALS['c']=$GLOBALS['c']+1;	
	
	$si=$si+1;	 
}
echo"  </table>";?>
</body>
</html>
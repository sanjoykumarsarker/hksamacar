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
td{
	font-size: ;
	border: 0.25px solid black;
	padding: 1px 5px 1px 5px;

}



p {margin-bottom: 0em;
 margin-top: 0em;} 

	</style>
	</head>
<body>


 <?php

 
 

 include 'function.php';
		$si=1; 
     	$q0 = json_decode($_POST['myData'],true);
	 
	$q=idatetoreg($q0);
	  
	 echo "<table  style= 'font-family: arial, sans-serif;	font-size: 10px; border-collapse: collapse; width: 100%;'>	 
	<tr> <th>1</th>   <th>2</th> <th>3</th> <th>4</th> </tr>";
	
	 foreach($q as $reg){
		    $img="upload/i".$reg.".jpg";
		$qq=substr($reg, 0, 6);
		
	 	if(empty($st)){
		 	$st=1; 
		 	 } 
	 	  $ss=substr($reg, 0, 6);
 if($st!=$ss)
	 { 
 
 $GLOBALS['c']=2;
 
 echo "<tr> <td style='color:black; background-color:ghostwhite; padding:5px; text-align:center; ' colspan='4'>".tbname($ss)." </td> </tr>" ;
 
 
	 $st=substr($reg, 0, 6);
	}
	
	if ($GLOBALS['c'] % 2 == 0) {

	echo "<tr style='height:80px;'><td style='text-align: center'> <img src= '$img' style='float:left;border:1px solid black; ' height=60 width=55 border='1'></td>

	<td> <p> # : <span style='font-family: SutonnyMJ'>".regtoiserial($reg)." </span></p>
		 <p> নাম: ".bname(isabsent($reg))." </p>
		 <p> মন্দির: ".tbname($ss)." </p>
		 <p> Address: ".address(isabsent($reg))." </p> </td></td>";	 


	 
}
else{
	
	
echo "<td style='text-align: center'> <img src= '$img' style='float:left; border:1px solid black;' height=60 width=55 > </td>
	<td> <p> # : <span style='font-family: SutonnyMJ'>".regtoiserial($reg)." </span></p>
		 <p> নাম: ".bname(isabsent($reg))." </p>
		 <p> মন্দির: ".tbname($ss)." </p>
		 <p> Address: ".address(isabsent($reg))." </p> </td></tr>";	
}
		
		
$GLOBALS['c']=$GLOBALS['c']+1;	
	
	$si=$si+1;	 
}
echo"</table>";?>
</body>
</html>
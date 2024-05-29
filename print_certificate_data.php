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
	body {
	background:#1f1f1f;
    font-family: 'Open Sans', sans-serif;
}
	p {	
		margin-bottom: 0em;
		margin-top: 4px;}
	  
	 
	#cert1{
		height: 610px;
		width: 492px;
		display: inline-block; 	
		float:left;
		border: 0px solid blue;
		margin:10px;
		overflow: initial;
		position: relative;
}

	#cert1 img{
		z-index:-1;
		height: 100%;
		width: 100%;
		pointer-events: none;
    	position: absolute;
}

	



	#cert2{
		float:right;
		height: 610px;
		width: 492px;
		display: inline-block; 
		border: 0px solid blue;
		margin:10px;
		overflow: initial;
		position: relative;
}

	#cert2 img{
		z-index:-1;
		height: 100%;
		width: 100%;
		pointer-events: none;
    	position: absolute;	
}

 
	
	</style>
	</head>

	
<body>


 <?php

 include 'function.php';
		$si=1; 
     $q0  = json_decode($_POST['myData'],true);
	 
	$q=idatetoreg($q0);
	  
	 echo "<table>	 
	<tr><th>#</th>  <th>#</th>  </tr>";
	
	 foreach($q as $reg){
		
		
		$qq=substr($reg, 0, 6);
	 if(empty($st)){
		 	$st=1; 
		 	 } 
	 	  $ss=substr($reg, 0, 6);
 if($st!=$ss)
	 { 
 
 $GLOBALS['c']=2;
 
 $st=substr($reg, 0, 6);
	}
	
	 
if ($GLOBALS['c'] % 2 == 0) {
   

	
	
	echo "<tr><td><div id='cert2'>
		<img src='certificate.jpg'        >
		<div style='padding: 220px 30px 0px 20px; z-index:1;'>
		<p>
		<span style='float:left;'>Date: ".regtoidate($reg)."</span> &nbsp &nbsp 
		<span>Place: ".regtoplace($reg)." </span>  &nbsp &nbsp 
		<span>তিথি : ".tithi($reg)."</span> </p>
		<p> রেজি. নং:  <b style='font-family:SutonnyMJ; font-size:15px;'>".$reg." &nbsp    # ".regtoiserial($reg)."</b></p>
		<p>	নাম: ".bname($reg)."</p>
		<p> <b>দীক্ষা নাম: ".finalname_b($reg)." </b></p>
		<p>	মন্দির : ".tbname($st)." </p>
		<p>	<b>Initiated Name: ".finalname($reg)."</b> [".ename($reg)."]</p>
		<p>	ঠিকানা : ".address($reg)." </p>
		
		 </div>
		 </td>";	 
	//echo " <tr> <td></td><td style='text-align:right; font-family:SutonnyMJ;'> ".regtoiserial($reg)."</td>   <td>".bname($reg)."</td> <td>".address($reg)."</td>";
	 	 


	 
}
else{
	
	echo "<td><div id='cert1'>
	<img src='certificate.jpg'        >
	    <div style='padding: 220px 30px 0px 20px; z-index:111111111;'>
		<p>
		<span style='float:left;'>Date: ".regtoidate($reg)."</span> &nbsp &nbsp 
		<span>Place: ".regtoplace($reg)." </span>  &nbsp &nbsp 
		<span>তিথি : ".tithi($reg)."</span> </p>
		<p> রেজি. নং:  <b style='font-family:SutonnyMJ; font-size:15px;'>".$reg." &nbsp    # ".regtoiserial($reg)."</b></p>
		<p>	নাম: ".bname($reg)."</p>
		<p> <b>দীক্ষা নাম: ".finalname_b($reg)." </b></p>
		<p>	মন্দির : ".tbname($st)." </p>
		<p>	<b>Initiated Name: ".finalname($reg)."</b> [".ename($reg)."]</p>
		<p>	ঠিকানা : ".address($reg)." </p>
		
		 </div>
		 </td></tr>";
//echo " <td style='width:10px'></td>  <td style='text-align:right;font-family:SutonnyMJ;'> ".regtoiserial($reg)."</td>   <td>".bname($reg)."</td> <td>".address($reg)."</td></tr>";	
		

 
	
}
		
		
$GLOBALS['c']=$GLOBALS['c']+1;	
		
		
		
	$si=$si+1;	 
		 
		 
	 }
	 
	 
	echo"  </table>"	;
	 
	
	
	 
	?>
	
	
	
	
	
	
	
	
	
	
	
	</body>
	</html>
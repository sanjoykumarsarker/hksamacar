
<?php session_start();?>
<!DOCTYPE html>

<html>
 
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<title>
Registration
</title>
 <style>
h3:hover {
   background-color: yellow;
   color:red;
   font-size: 30px;
   font-weight: bold;
   underline:none;
}
 </style>

</head>
<body>
<br><br><br><br><br> <hr><hr> 
<div style= "text-align:center";>
<?php
 
  
   echo $t_div = $_POST['t_div'];
   echo $t_dist = $_POST['t_dist'];
   $t_ps = $_POST['t_ps'];
   $t_addr = $_POST['t_addr'];
   $tname_b = $_POST['tname_b'];
   $trecom_b = $_POST['trecom_b'];
   $tname = $_POST['tname'];
   $trecom = $_POST['trecom'];
   $t_ph = $_POST['t_ph'];
    
  
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

 
echo $sql1= "SELECT  *  FROM tmpl
WHERE t_dist='$t_dist'";

echo $sqldis= "SELECT  divcode, distcode  FROM dist_info
WHERE district='$t_dist'";


$sqltem= "SELECT  MAX(tregid)  FROM tmpl
WHERE t_dist='$t_dist'";
 
 
 $result1 = $conn->query($sql1);
 
 $resultdis = $conn->query($sqldis);
 
 $resulttem = $conn->query($sqltem);
 
 


 if ($resultdis->num_rows > 0) {
    // output data of each row
    while($rowdis = $resultdis->fetch_assoc()) {
		
		$GLOBALS['kk']=$rowdis["divcode"];
		
		$GLOBALS['kk2']=$rowdis["distcode"];
         
    }
}

 
  
    // output data of each row
    while($rowtem = $resulttem->fetch_assoc()) {
		
		$GLOBALS['kk3']=$rowtem["MAX(tregid)"];
       
		
		
		
		
		
    }
 

if($GLOBALS['kk3']===NULL){
	
$GLOBALS['kk3']	=$GLOBALS['kk'].$GLOBALS['kk2']."01";
$GLOBALS['kk4']=(string)$GLOBALS['kk3'];	
}
else{
$int = (int)$GLOBALS['kk3'];


  
	
$int=$int+1;
 
	
if($int<99998){
	
$GLOBALS['kk4']= "0".(string)$int;	
	
}

else{	
$GLOBALS['kk4']= (string)$int;

}



	
}

$k5= $GLOBALS['kk4'];

echo "Hare Krishna! <br> <br> Your Registration ID:$k5 <br><br>";





if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        
    }
} else {

}
$sql = "INSERT INTO tmpl (tregid,

t_div  ,
 t_dist , 
 t_ps  ,
 
 t_addr  ,
  tname_b , 
  
  trecom_b , 
  tname ,
   trecom , 
   t_ph  
  )
VALUES ('$k5' ,
 '$t_div',
   '$t_dist' , 
   '$t_ps' , 
   '$t_addr' , 
   '$tname_b'  ,
   '$trecom_b'  ,
   '$tname' , 
   '$trecom'  ,
   '$t_ph'   
  )";

if ($conn->query($sql) === TRUE) {
    echo 'Thank You <br> <h3 style= "color:red;">' .$tname_b. '</h3> <br> for Initiation Registration.<br>
    Your Phone Number:'.$t_ph. ' <br> 
     If any Mistake Call 01799778871  '; 
} 	else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<br><br><br> <hr><hr> <br><br>	
<a href="javascript:window.open('','_self').close();" style= "text-align:center; text-decoration:none;"; > <h3>Correction Done. <br> Thanks</h3> </a>

</div>
</body>

</html>
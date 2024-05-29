<?php

$a=$_POST['username'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection


 
define('HOST','localhost');
define('USER','sanpro_hksamacar');
define('PASS','01915876543');
define('DB','sanpro_diksa');
 
$con = mysqli_connect(HOST,USER,PASS,DB);
 
$sql = "select * from reg";
 
$res = mysqli_query($con,$sql);
 
$result = array();
  
while($row = mysqli_fetch_array($res)){  
	
 array_push($result,
array('id'=>"হরে কৃষ্ণ ,আপনার নাম ".$row[1],
'name'=>$row[1],
'address'=>$row[2],
'phone'=>$row[5]
));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
 
 
		
?>		
<?php
 echo $edit=$_POST['edit'];
echo $reg=$_POST['reg'];
echo $iserial=$_POST['iserial'];
echo $idate=$_POST['idate'];

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 


	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



  
echo $sqld = "update reg set iserial='".$iserial."' , idate='".$idate."'where reg='".$reg."'";
 
 if( $conn->query($sqld)==true)


 {
	 
	 //echo "<script>alert('Bangla Name ".$reg." updated'); </script>";
 }

 ?>
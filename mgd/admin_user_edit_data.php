<?php
  $btn=$_POST['btn'];
 
$a=$_POST['id'];
$b=$_POST['username'];
$c=$_POST['password'];
$d=$_POST['permission'];
 
  function edit(){
		$a=$_POST['id'];
		$b=$_POST['username'];
		$c=$_POST['password'];
		$d=$_POST['permission'];
	  
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
$sqld = "update users set user_name='".$b."', password='".$c."',permission='".$d."' where id='".$a."'";
 
 if( $conn->query($sqld)==true)

 {
	echo " <script>alert('Updated'); </script>";
 }
	
 }
 
 function del(){
	 $a=$_POST['id'];
$b=$_POST['username'];
$c=$_POST['password'];
$d=$_POST['permission'];
	 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqld = "delete from users  where id='$a'";
 
 if( $conn->query($sqld)==true)

 {
	 echo " <script>alert('Deleted'); </script>";
 }

 }
if($btn=='edit')
	 {
		edit();  
	 }
	 if($btn=='del')
	 
	 {
		del(); 	 
	 }
?>
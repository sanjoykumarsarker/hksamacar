<?php



$btn=$_POST['btn'];
 
$a=$_POST['u_id'];
$b=$_POST['username'];
$c=$_POST['password'];
$d=$_POST['permission'];
$e=$_POST['u_name'];
$f=$_POST['u_address'];
$g=$_POST['u_email'];
$h=$_POST['u_mobile'];

$l=$_POST['logoutby'];
  function edit(){
$a=$_POST['u_id'];
$b=$_POST['username'];
$c=$_POST['password'];
$d=$_POST['permission'];
$e=$_POST['u_name'];
$f=$_POST['u_address'];
$g=$_POST['u_email'];
$h=$_POST['u_mobile'];

$l=$_POST['logoutby'];


$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";


	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  
$sqld = "update users set user_name='".$b."', password='".$c."',permission='".$d."', u_name='".$e."', 
u_address='".$f."', u_email='".$g."',logoutby='".$l."', u_mobile='".$h."' where id='".$a."'";
 
 if( $conn->query($sqld)==true)

 {
	echo " <script>alert('Updated'); </script>";
 }
	
 }
 
 function del(){
$a=$_POST['u_id'];
$b=$_POST['username'];
$c=$_POST['password'];
$d=$_POST['permission'];
$e=$_POST['u_name'];
$f=$_POST['u_address'];
$g=$_POST['u_email'];
$h=$_POST['u_mobile'];


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
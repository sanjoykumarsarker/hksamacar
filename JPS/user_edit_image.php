<?php

$a=$_POST['u_id'];

$file_name = $_FILES['myimage']['name'];
$file_size = $_FILES['myimage']['size'];

if ($file_size== 0){

	echo "<script> alert('Image Size is more than 5mb'); </script>  ";
}

$file_tmp = $_FILES['myimage']['tmp_name'];



  
$target_dir = "usr_img/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
 
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


echo $iplace="usr_img/"."i".$a.".".$imageFileType;
echo $u_imgn= "i".$a.".".$imageFileType;



$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";


	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


move_uploaded_file($file_tmp,$iplace);

  
$sqld = "update users set u_img='".$u_imgn."' where id='".$a."'";
 
 if( $conn->query($sqld)==true)

 {
	echo " <script>alert('New Image Uploaded!'); </script>";
 }
	

?>
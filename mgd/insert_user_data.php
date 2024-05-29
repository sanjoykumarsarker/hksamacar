

<?php

include "function.php";

$a=$_POST['u_id'];
$b=$_POST['username'];
$pass=$_POST['password'];
$d=$_POST['permission'];
$e=$_POST['u_name'];
$f=$_POST['u_address'];
$g=$_POST['u_email'];
$h=$_POST['u_mobile'];



$file_name = $_FILES['myimage']['name'];
$file_size = $_FILES['myimage']['size'];

if ($file_size== 0){

	echo "<script> alert('Image Size is more than 5mb'); </script>  ";
}

$file_tmp = $_FILES['myimage']['tmp_name'];



  
$target_dir = "usr_img/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
 
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//$image_size=getimagesize($_FILES['myimage']['tmp_name']);





$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

date_default_timezone_set("Asia/Dhaka");
$tt= date("Y-m-d H:i:s");


$ss= userid_gen();


if ($ss== Null) {
			
			$ss=1001;
}

else {
	$ss=$ss+1;
}

if ($pass== "108") {
		
		$c="jps".$h;
}

else {
	$c=$pass;
}


$iplace="usr_img/"."i".$ss.".".$imageFileType;
$u_imgn= "i".$ss.".".$imageFileType;

move_uploaded_file($file_tmp,$iplace);



$stmt = $conn->prepare("INSERT INTO users (id,user_name, password, permission, u_name, u_address, u_email, u_mobile, rgd_date, u_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $ss, $b, $c, $d, $e, $f, $g, $h, $tt, $u_imgn);

// set parameters and execute
 
$stmt->execute();

    
$stmt->close();
$conn->close();




?>
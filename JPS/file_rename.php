<?php
 
	
	
	
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$dir = "/upload/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
     // echo "filename:" . $file . "<br>";

 $a= substr($file,0,-4);
$sqld = "SELECT  imagename,image_id FROM reg where  image_id='$a'";

$resultd = $conn->query($sqld);
 
  
 
 
    // output data of each row
     $row1 = $resultd->fetch_assoc();
	 $past="upload/".$file;
	$new="upload/".$row1['imagename'];
	 	
	rename($past,$new);
	//return $row1["user_name"];
	
	  }
    closedir($dh);
  }
}
	$conn->close();	
 
 


?>
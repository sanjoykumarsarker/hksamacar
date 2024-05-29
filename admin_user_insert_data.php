


<?php
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

$stmt = $conn->prepare("INSERT INTO users (id,user_name, password,permission) VALUES (?, ?, ?,?)");
$stmt->bind_param("ssss", $a, $b, $c,$d);

// set parameters and execute
 
if($stmt->execute())
{
	
alert("OK inserted as users ");	
	
}


else{
	
alert("Not inserted as users ");	
	
}
    
$stmt->close();
$conn->close();	 	
	
	 

 
 ?>

<?php
 
$to = $_POST['to'];
   $from = $_POST['from'];
   $loginname = $_POST['loginname'];
  
$body = $_POST['body'];
 

 

 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



 
$sqld = "insert into message(m_to_si,user_name,body,m_from_si,m_time) values('$to','$loginname','$body','$from',now())";

if($conn->query($sqld)){
 
  
 
	
	
$conn->close();	
}	
?>
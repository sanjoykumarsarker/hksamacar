<?php 

   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
 
?>

<!DOCTYPE html>





<html>

 
<body>

 <?php
  $reg = $_SESSION['reg'];
  $bname = $_SESSION['bname'];
  $ename = $_SESSION['ename'];
   $age = $_SESSION['age'];
   $address = $_SESSION['address'];
   $phone = $_SESSION['phone'];
   $service = $_SESSION['service'];
   $gender = $_SESSION['gender'];
   $education = $_SESSION['education'];
   $mstatus = $_SESSION['mstatus'];
   $nprefer = $_SESSION['nprefer'];
   $id = $_SESSION['id'];
  
 
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

$sql = "INSERT INTO reg (reg , 
  bname ,
   ename , 
   age , 
   address , 
   phone  ,
   service  ,
   gender , 
   education  ,
   mstatus , 
   nprefer , 
   id  
  )
VALUES ('$reg' , 
 '$bname',
   '$ename' , 
   '$age' , 
   '$address' , 
   '$phone'  ,
   '$service'  ,
   '$gender' , 
   '$education'  ,
   '$mstatus' , 
   '$nprefer' , 
   '$id'  
  )";

if ($conn->query($sql) === TRUE) {
    echo "Hare Krishna! <br>Thank You $ename for Initiation Registration.<br>
    Your Phone Number:$phone <br>Your Name Preference:$nprefer";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 

</body>
</html>
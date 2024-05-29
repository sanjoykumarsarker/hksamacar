<!DOCTYPE html>
<html>
<body>
 <?php
 
  $reg = $_POST['reg'];
  $bname = $_POST['bname'];
   $ename = $_POST['ename'];
   $age = $_POST['age'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $service = $_POST['service'];
   $gender = $_POST['gender'];
   $education = $_POST['education'];
   $mstatus = $_POST['mstatus'];
   $nprefer = $_POST['nprefer'];
   $id = $_POST['id'];
  
 
$servername = "localhost";
$username = "hksamacar";
$password = "876543";
$dbname = "diksa";

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
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
<button     onclick="location.href='res.php';"><span> output</span></button>

</body>
</html>
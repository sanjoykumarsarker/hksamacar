<?php session_start();?>
<!DOCTYPE html>

<html>
 
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>
h3:hover {
   background-color: yellow;
   color:red;
   font-size: 30px;
   font-weight: bold;
   underline:none;
}
 </style>
 
<title>
Registration
</title>
</head>
<body>
<br><br><br><br><br> 
<div style= "text-align:center";>
<?php
 
   $reg = $_POST['reg'];
     $deleting_code = $_POST['deleting_code'];

   if($deleting_code!="gone4")
   {

 

 exit("unable to delete");

   }

   echo $deleting_reason = $_POST['deleting_reason'];
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
   $istatus1 = $_POST['istatus1'];
   $istatus2 = $_POST['istatus2'];
   $comments = $_POST['comments'];
   $status_viva = $_POST['status_viva'];
   date_default_timezone_set("Asia/Dhaka");
    $time=date("Y-m-d=h:i:sa");
  $event_description=$reg.$bname.$ename.$age.$address.$phone.$service.$gender.$education.$mstatus.$nprefer.$deleting_reason;
  
 $user_name=$_SESSION['user_name'];
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
 
  $sqlu= "DELETE from reg  WHERE reg= '$reg'";

$sqlu_date= "INSERT INTO events (user_id, event_name, event_time,event_description)
VALUES ('$user_name', 'Delete Devotee Data', '$time','$event_description');";

   $conn->query($sqlu);
  $conn->query($sqlu_date);
  
 
 
$conn->close();

?>



<br><br><br> <br><br>	
<a href="javascript:window.open('','_self').close();" style= "text-align:center; text-decoration:none;"; > <h3>Correction Done. <br> Thanks</h3> </a>





</body>

</html>
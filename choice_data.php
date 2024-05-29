<!doctype html>
<html lang="en">
<head>
 <title>Namakarana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
  
  
  
  
   
  
  <style>

 
  
  
   </style>
  
  
 
 <body>
 
 <p id="demo"></p>
 <div>
 <?php
 
   echo $ch1=$_POST['nnn217'];
  echo $ch2=$_POST['nnn218'];
 echo $ch3=$_POST['nnn219'];


 echo  $pid=$_POST['nnnn20'];


  
 
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

 
$sqlu= "UPDATE reg SET nchoice1='$ch1',nchoice2='$ch2',nchoice3='$ch3'  WHERE reg= '$pid'";

 
 
 
 $resultu = $conn->query($sqlu);
 
$conn->close();

?>
 
  <body>
 </html >
 
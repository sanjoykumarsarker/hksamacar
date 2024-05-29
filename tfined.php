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
 
   $id = $_POST['id'];
   $t_ps = $_POST['t_ps'];
   $t_addr = $_POST['t_addr'];
   $tname_b = $_POST['tname_b'];
   $trecom_b = $_POST['trecom_b'];
   $tname = $_POST['tname'];
   $trecom = $_POST['trecom'];
   $t_ph = $_POST['t_ph'];
    
  
 
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
 
$sqlu= "UPDATE tmpl SET t_ps='$t_ps',t_addr='$t_addr',tname_b='$tname_b',trecom_b='$trecom_b',tname='$tname',trecom='$trecom',t_ph='$t_ph' WHERE tregid= '$id'";
 
$resultu = $conn->query($sqlu);
 
$conn->close();

?>
<br><br><br> <br><br>	
<a href="javascript:window.open('','_self').close();" style= "text-align:center; text-decoration:none;"; > <h3>Correction Done. <br> Thanks</h3> </a>
</div>
</body>

</html>
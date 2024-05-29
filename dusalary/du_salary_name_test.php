
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- CSS only -->
<style>
   .tbutton {
        background-color: Transparent;
        border: none;
        background-repeat:no-repeat;
        cursor:pointer;
        overflow: hidden;
        text-align: left;
        outline:none;
         
    }

    .tbutton:hover {
        background-color: yellow;
        border: none;
        background-repeat:no-repeat;
        cursor:pointer;
        overflow: hidden;
        text-align: left;
        outline:none;
        color:red;
    }
</style>
</head>
</body>  
<body>
<?php

session_start();
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "test";
// Create connection

$division=1;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$sql = "SELECT si,account,du,cbs from salary_name_test ";

$result = $conn->query($sql);

$flag="";
echo "<table class='table table-striped table-bordered table-hover'>
<tr>
<th> si</th>
<th> account</th>
<th> du</th>
<th> cbs</th>
<th> %</th>

</tr>

"
;
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
 
similar_text(strtoupper($row["du"]),strtoupper($row["cbs"]),$percent);
//echo $percent;
  

echo "<tr>
<td>".$row["si"]."</td>
<td>".$row["account"]."</td>
<td>".$row["du"]."</td>
<td>".$row["cbs"]."</td>
<td>$percent</td>


</tr>";




 

 }
}
else {
    echo "0 results";
}
echo "</table>";
$conn->close();

 ?>

</body>
</html>

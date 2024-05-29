
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
 
$sql = "SELECT a,b,c,d,e,f,g

 from salary ";

$result = $conn->query($sql);

$flag="";
echo "<table class='table table-striped table-bordered table-hover'>
<tr>
<th> si</th>
<th> des</th>
<th> cat</th>
<th> ref</th>
<th>  </th>
<th> name</th>
<th> account</th>
<th> amount</th>
</tr>

"
;
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
 

  
if($row["a"]=='Sonali Bank Ltd.'){
    $flag="sonali";
}

if($row["a"]=='Agrani Bank Ltd.'){
    $flag="agrani";
}

if($row["a"]=='Janata Bank Ltd.'){
    $flag="janata";
}
  
echo "<tr>
<td>".$row["si"]."</td>
<td>".$row["a"]."</td>
<td>".$row["b"]."</td>
<td>".$row["c"]."</td>
<td>".$flag."</td>
<td>".$row["e"]."</td>
<td>".$row["f"]."</td>
<td>".$row["g"]."</td>

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

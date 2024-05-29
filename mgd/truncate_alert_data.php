<?php


 
$gopon=$_POST["pa"];
 if($gopon!="1878")
 
 {
echo "Wrong Password";
die();


 }

  

 $division='International';
 
 
 
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";
    $now=date("YmdHis");
$table="tableint".$now;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    // sql to create table
    $sql = "CREATE TABLE  ".$table."  AS select * from reg";
    echo $sql1 = "delete from reg where division='".$division."'";

    if ($conn->query($sql) === TRUE) {
        echo "<h1 style='text-align:center;color:blue'>Table $table created successfully</h1> <hr>";
    } else {
        echo "Error   table: " . $conn->error;
    }
    if ($conn->query($sql1) === TRUE) {
      echo "<h1 style='color:red;text-align:center'>Table reg Truncated successfully</h1>";
  } else {
      echo "Error  table: " . $conn->error;
  }
    
    $conn->close();
   
?>
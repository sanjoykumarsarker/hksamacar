<?php

include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];

  $date=$_POST["hks_date"];
  $issue=$_POST["hks_issue"];
  $quantity=$_POST["hks_qty"];

 echo "Hare Krishna,Date:".$date.",Issue:".$issue."Quantity:".$quantity."has been Included to Database.";

 date_default_timezone_set("Asia/Dhaka");
  

 $NonConditioned="FALSE";
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO products (date,issue,quantity,user)
    VALUES (:date,:issue,:quantity,:user)");

 
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':issue', $issue);
    $stmt->bindParam(':quantity', $quantity);

    $stmt->bindParam(':user', $user);

    $stmt->execute();   echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
  

?>
<?php

include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];
  

    $issue=$_POST["issue"];

    $status=$_POST["status"];



 date_default_timezone_set("Asia/Dhaka");
 $cdate= date("m/d/Y h:i:sa");
 $rdate= date("m/d/Y");



 
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
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/

$stmt = $conn->prepare("update products set  status =:status where issue=:issue");




    

    $stmt->bindParam(':issue', $issue);
    $stmt->bindParam(':status', $status);
 

 
    $stmt->execute();   echo "Status of Issue ".$issue ."    Updated as $status ";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
$conn_trans = null;
 

?>  
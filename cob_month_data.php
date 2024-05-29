<?php

include_once "session_check.php";
session_start();
  echo $user=$_SESSION["id"];

  
  echo  $id=$_POST["hks_issue"];


  echo  $date_start=$_POST["date_start"];

  echo $date_end=$_POST["date_end"];

  echo  $status=$_POST["status"];

  echo  $comments=$_POST["comments"];


 



 



   

 
 date_default_timezone_set("Asia/Dhaka");
  

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
        $stmt = $conn->prepare("INSERT INTO cob_month (date_start,date_end,id,status,comments,user)
        VALUES (:date_start,:date_end,:id,:status,:comments,:user)");
    
     
        $stmt->bindParam(':date_start', $date_start);
        $stmt->bindParam(':date_end', $date_end);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':comments', $comments);
        $stmt->bindParam(':user', $user);

    
        $stmt->execute();   echo "New records created successfully";
        }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
$conn = null;
  
  

?>
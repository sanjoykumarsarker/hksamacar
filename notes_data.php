<?php

//include_once "session_check.php";
session_start();

 
  echo $id=$_SESSION["id"];
  


$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
    $ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
    $ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
    $ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
   $ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
    $ipaddress = getenv('REMOTE_ADDR');
else
    $ipaddress = 'UNKNOWN';
$ip=$ipaddress;
 
date_default_timezone_set("Asia/Dhaka");
  $time= date("Y-m-d h:i:sa");
 
  echo  $notes=$_POST["notes"];
 
 


 



   

 
   

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
 
   




        $stmt = $conn->prepare("INSERT INTO notes (  id,ip,notes,time)
        VALUES (  :id,:ip,:notes,:time)");
    
    // id	category	amount	date	date_time	user	ip	type	status	comments


  
        
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':ip',$ip);
        $stmt->bindParam(':notes',$notes);
        $stmt->bindParam(':time',$time);
         

    
        $stmt->execute();   echo "New records created successfully";
   
        }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
   
  

?>
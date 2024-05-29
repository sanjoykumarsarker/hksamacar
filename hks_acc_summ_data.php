<?php

include_once "session_check.php";
session_start();

$aaa=array();
$bbb=array();
$ccc=array();
$ddd=array();
$eee=array();
 

  echo $user=$_SESSION["id"];
  
$vouch_number=$_POST["vouch_number"];
$date=$_POST["send_single_date"];

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
$type="D";
$status="ok";
date_default_timezone_set("Asia/Dhaka");
  $date_time= date("Y-m-d h:i:sa");
$devotee=	"Devotee";										
$postage="Postage";												
$travelling=	"Travelling";											
$printing=	"Printing";											
$paper=		"paper";								
$entertainment=	"Entertainment";											
$internet="Internet";												
$book=	"Book";											
$legal=	"Legal";											
$repair="Repair";											
$asset=	"Asset";
  
  echo  $devotee_amount=$_POST["devotee_amount"];


  echo  $postage_amount=$_POST["postage_amount"];

  echo $travelling_amount=$_POST["travelling_amount"];

  echo  $printing_amount=$_POST["printing_amount"];


  echo  $paper_amount=$_POST["paper_amount"];
  echo  $entertainment_amount=$_POST["entertainment_amount"];
  echo  $internet_amount=$_POST["internet_amount"];
  echo  $book_amount=$_POST["book_amount"];
  echo  $legal_amount=$_POST["legal_amount"];
  echo  $repair_amount=$_POST["repair_amount"];
  echo  $asset_amount=$_POST["asset_amount"];
  
											
													
   
  
  
  
  
  
  
  
  
  
  												
													
													
													
													
  echo  $devotee_comments=$_POST["devotee_comments"];
  echo  $postage_comments=$_POST["postage_comments"];
  echo  $travelling_comments=$_POST["travelling_comments"];
  echo  $printing_comments=$_POST["printing_comments"];
  echo  $paper_comments=$_POST["paper_comments"];
  echo  $entertainment_comments=$_POST["entertainment_comments"];
  echo  $internet_comments=$_POST["internet_comments"];
  echo  $book_comments=$_POST["book_comments"];
  echo  $legal_comments=$_POST["legal_comments"];
  echo  $repair_comments=$_POST["repair_comments"];
  echo  $asset_comments=$_POST["asset_comments"];
  

  array_push($bbb,$devotee_comments);												

  array_push($bbb,$postage_comments);												
  array_push($bbb,$travelling_comments);												
  array_push($bbb,$printing_comments);												
  array_push($bbb,$paper_comments);												
  array_push($bbb,$entertainment_comments);												
  array_push($bbb,$internet_comments);												
  array_push($bbb,$book_comments);												
  array_push($bbb,$legal_comments);												
  array_push($bbb,$repair_comments);												
  array_push($bbb,$asset_comments);												

  
  
  
  
  
  
  													
  array_push($aaa,$devotee_amount);												
  array_push($aaa,$postage_amount);												
  array_push($aaa,$travelling_amount);												
  array_push($aaa,$printing_amount);												
  array_push($aaa,$paper_amount);												
  array_push($aaa,$entertainment_amount);												
  array_push($aaa,$internet_amount);												
  array_push($aaa,$book_amount);												
  array_push($aaa,$legal_amount);												
  array_push($aaa,$repair_amount);												
  array_push($aaa,$asset_amount);												
 											
													
														
  array_push($ccc,$devotee);												
  array_push($ccc,$postage);												
  array_push($ccc,$travelling);												
  array_push($ccc,$printing);												
  array_push($ccc,$paper);												
  array_push($ccc,$entertainment);												
  array_push($ccc,$internet);												
  array_push($ccc,$book);												
  array_push($ccc,$legal);												
  array_push($ccc,$repair);												
  array_push($ccc,$asset);	
  
  
  
  
  
  
  
  
  
  
  
  
  



 



   

 
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
        $stmt = $conn->prepare("INSERT INTO expense (  vouch_number,	category,	amount,	date,	date_time	,user,	ip,	type,	status,	comments)
        VALUES (   :vouch_number,	:category,	:amount,	:date,	:date_time	,:user,	:ip,	:type,	:status,	:comments)");
    
    // id	category	amount	date	date_time	user	ip	type	status	comments


    for($i=0;$i<sizeof($aaa);$i++){
 
        
        $stmt->bindParam(':vouch_number', $vouch_number);
        $stmt->bindParam(':category', $ccc[$i]);
        $stmt->bindParam(':amount', $aaa[$i]);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':date_time', $date_time);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':comments', $bbb[$i]);
    
    
        $stmt->execute();   echo "New records created successfully";
    }
        }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
$conn = null;
  
  

?>
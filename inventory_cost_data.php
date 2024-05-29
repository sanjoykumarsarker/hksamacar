<?php

include_once "session_check.php";
session_start();

$aaa=array();
$bbb=array();
$ccc=array();
$ddd=array();
$eee=array();
$fff=array();
  echo $user=$_SESSION["id"];
  


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
 
  echo  $received_date=$_POST["received_date"];
  echo  $received_qty=$_POST["received_qty"];
  echo  $wastage=$_POST["wastage"];
  echo  $issue=$_POST["issue"];
  echo  $date=$_POST["date"];

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

$stmt = $conn->prepare("update products set  quantity=:quantity,wastage =:wastage,date=:date where issue=:issue");




$stmt->bindParam(':date', $received_date);


    $stmt->bindParam(':issue', $issue);
    $stmt->bindParam(':wastage', $wastage);
    $stmt->bindParam(':quantity', $received_qty);


 
    $stmt->execute();   echo "Status of Issue ".$issue ."    Updated   ";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
$conn_trans = null;
 

 
  echo  $date=$_POST["date"];




  echo  $total_direct=$_POST["total_direct"];


  echo  $total_indirect=$_POST["total_indirect"];


echo  $paper_total=$_POST["paper_total"];

echo  $printing_total=$_POST["printing_total"];

echo $binding_total=$_POST["binding_total"];

echo  $layout_total=$_POST["layout_total"];
echo  $transport_total=$_POST["transport_total"];
echo  $others_total=$_POST["others_total"];
echo  $postage_total_i=$_POST["postage_total_i"];
echo  $transport_total_i=$_POST["transport_total_i"];
echo  $others_total_i=$_POST["others_total_i"];
 

echo  $paper_date=$_POST["paper_date"];

echo  $printing_date=$_POST["printing_date"];

echo $binding_date=$_POST["binding_date"];

echo  $layout_date=$_POST["layout_date"];


echo  $transport_date=$_POST["transport_date"];
echo  $others_date=$_POST["others_date"];
echo  $postage_date_i=$_POST["postage_date_i"];
echo  $transport_date_i=$_POST["transport_date_i"];
echo  $others_date_i=$_POST["others_date_i"];

 










echo  $paper_vouch=$_POST["paper_vouch"];


echo  $printing_vouch=$_POST["printing_vouch"];

echo $binding_vouch=$_POST["binding_vouch"];

echo  $layout_vouch=$_POST["layout_vouch"];


echo  $transport_vouch=$_POST["transport_vouch"];
echo  $others_vouch=$_POST["others_vouch"];
echo  $postage_vouch_i=$_POST["postage_vouch_i"];
echo  $transport_vouch_i=$_POST["transport_vouch_i"];
echo  $others_vouch_i=$_POST["others_vouch_i"];





  echo  $paper_qty=$_POST["paper_qty"];


  echo  $printing_qty=$_POST["printing_qty"];

  echo $binding_qty=$_POST["binding_qty"];

  echo  $layout_qty=$_POST["layout_qty"];


  echo  $transport_qty=$_POST["transport_qty"];
  echo  $others_qty=$_POST["others_qty"];
  echo  $postage_qty_i=$_POST["postage_qty_i"];
  echo  $transport_qty_i=$_POST["transport_qty_i"];
  echo  $others_qty_i=$_POST["others_qty_i"];
 
  











  echo  $paper_details=$_POST["paper_details"];


  echo  $printing_details=$_POST["printing_details"];

  echo $binding_details=$_POST["binding_details"];

  echo  $layout_details=$_POST["layout_details"];


  echo  $transport_details=$_POST["transport_details"];
  echo  $others_details=$_POST["others_details"];
  echo  $postage_details_i=$_POST["postage_details_i"];
  echo  $transport_details_i=$_POST["transport_details_i"];
  echo  $others_details_i=$_POST["others_details_i"];


 											
  array_push($aaa,$paper_details);												
  array_push($aaa,$printing_details);	
  array_push($aaa,$binding_details);												
  array_push($aaa,$layout_details);												
  array_push($aaa,$transport_details);												
  array_push($aaa,$others_details);												
  array_push($aaa,$postage_details_i);
  array_push($aaa,$transport_details_i);												
  
  array_push($aaa,$others_details_i);
  
  array_push($aaa,"");
  array_push($aaa,"");



  array_push($bbb,$paper_qty);												
  array_push($bbb,$printing_qty);	
  array_push($bbb,$binding_qty);												
  array_push($bbb,$layout_qty);												
  array_push($bbb,$transport_qty);												
  array_push($bbb,$others_qty);												
  array_push($bbb,$postage_qty_i);
  array_push($bbb,$transport_qty_i);												
  
  array_push($bbb,$others_qty_i);
  array_push($bbb,"");
  array_push($bbb,"");
  



     
  array_push($ccc,$paper_vouch);												
  array_push($ccc,$printing_vouch);	
  array_push($ccc,$binding_vouch);												
  array_push($ccc,$layout_vouch);												
  array_push($ccc,$transport_vouch);												
  array_push($ccc,$others_vouch);												
  array_push($ccc,$postage_vouch_i);
  array_push($ccc,$transport_vouch_i);												
  
  array_push($ccc,$others_vouch_i);
  
  array_push($ccc,"");

  array_push($ccc,"");

  
  
  
  array_push($ddd,$paper_date);												
  array_push($ddd,$printing_date);	
  array_push($ddd,$binding_date);												
  array_push($ddd,$layout_date);												
  array_push($ddd,$transport_date);												
  array_push($ddd,$others_date);												
  array_push($ddd,$postage_date_i);
  array_push($ddd,$transport_date_i);												
  
  array_push($ddd,$others_date_i);
  array_push($ddd,"");
  array_push($ddd,"");





    
  array_push($eee,$paper_total);												
array_push($eee,$printing_total);	
array_push($eee,$binding_total);												
array_push($eee,$layout_total);												
array_push($eee,$transport_total);												
array_push($eee,$others_total);												
array_push($eee,$postage_total_i);
array_push($eee,$transport_total_i);												

array_push($eee,$others_total_i);

array_push($eee,$total_direct);
array_push($eee,$total_indirect);

  
  
array_push($fff,"Paper");												
array_push($fff,"Printing");	
array_push($fff,"Binding");												
array_push($fff,"Layout");												
array_push($fff,"Transport");												
array_push($fff,"Others");												
array_push($fff,"Postage Indirect");
array_push($fff,"Transport Indirect");												

array_push($fff,"Others Indirect")	;									
													
array_push($fff,"direct")	;									
array_push($fff,"indirect")	;									
												
													
													
 
 												

  





  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  



 



   

 
 date_default_timezone_set("Asia/Dhaka");
  

 
 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
         $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
        $conn->query('SET NAMES "utf8"'); 
 
  
            $stmt_del = $conn->prepare("delete from  cost_accounting where issue= :issue ");
            $stmt_del->bindParam(":issue",$issue,PDO::PARAM_INT);

            $stmt_del->execute();




        $stmt = $conn->prepare("INSERT INTO cost_accounting (  details,	qty,	voucher,	date,	total,	ip,	status,	user,
        	type,  	date_time,category ,issue,received_date,received_qty,wastage )
        VALUES (  :details,	:qty,	:voucher,	:date,	:total,	:ip,	:status,	:user,
        :type, 	 	:date_time,:category,:issue,:received_date,:received_qty,:wastage )");
    
    // id	category	amount	date	date_time	user	ip	type	status	comments

$direct="direct";

$indirect="indirect";
    for($i=0;$i<sizeof($aaa);$i++){
 
        
        $stmt->bindParam(':details',$aaa[$i]);
        $stmt->bindParam(':qty',$bbb[$i]);
        $stmt->bindParam(':voucher',$ccc[$i]);
        $stmt->bindParam(':date',$ddd[$i]);
        $stmt->bindParam(':total',$eee[$i]);
        $stmt->bindParam(':category',$fff[$i]);
        $stmt->bindParam(':ip',$ip);
        $stmt->bindParam(':status',$status);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':type',$type);
         $stmt->bindParam(':date_time',$date_time);
         $stmt->bindParam(':issue',$issue);

         $stmt->bindParam(':received_date',$received_date);
         $stmt->bindParam(':received_qty',$received_qty);
         $stmt->bindParam(':wastage',$wastage);

    
        $stmt->execute();   echo "New records created successfully";
    }

 }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
   
  

?>
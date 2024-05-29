
  
 
<?php

include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];
    $arr=array();

for($i=0;$i<$_POST["k"];$i++){

   echo  $_POST["vp".$i];
  //  print_r($a);
 
 
    
  array_push($arr,$_POST["vp".$i]);





}



if(count($arr) !== count(array_unique($arr))){
    echo "Duplicate VP NO.!";


   // exit();

}


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
  
  $stmt = $conn->prepare("update tblIssue set VPNo=:VPNo,user=:user  where transaction_id=:transaction_id and sent_mode=:sent_mode");
  
  
  
  
       
for($i=0;$i<$_POST["k"];$i++){

     $transaction_id=  $_POST["id".$i];
   
     $VPNo= $_POST["vp".$i];
     $sent_mode="vp";
     if(strlen($VPNo)==4){

        $VPNo="0".$VPNo;

     }
     $stmt->bindParam(':VPNo', $VPNo);
       
     $stmt->bindParam(':transaction_id', $transaction_id);
     $stmt->bindParam(':user', $user);
     $stmt->bindParam(':sent_mode', $sent_mode);

     $stmt->execute();   echo "New records created successfully";

}
  
     
      }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
  $conn = null;
    
  $conn_trans = null;
   
  
  ?>  
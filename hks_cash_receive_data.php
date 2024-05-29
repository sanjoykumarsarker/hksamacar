<?php

  
include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];

echo $VPNo=$_POST["vp_no"];
echo"<hr>";
echo $Dr=$_POST["vp_receive"];
echo $transid=$_POST["transid"];

$dr=intval($_POST["vp_receive"]);

  $vp_comment=$_POST["vp_comment"];
  $sent_mode=$_POST["sent_mode"];


echo $Returned=$_POST["vp_return"];

$flag=1;
if($dr>0&&strval($Returned)=="TRUE"){


echo "<script> alert('Any amount Cant not be Returned!');</script>";
$flag=2;


}


echo"<hr><hr><hr>";



echo $newDateString=$_POST["vp_date"];
//$newDateString = date_format(date_create_from_format('m/d/Y', $VPDate), 'Y-m-d');


echo"<hr>";
echo $transaction_id=intval($_POST["transaction_id"]);


if($transaction_id==""||$transaction_id==null){

    $transaction_id="blank";

}


if(empty($transaction_id))
{
    $transaction_id="blank2";
}
echo"<hr>";
echo $idn=$_POST["idn"];

echo"<hr>";
  
  $servername = "localhost";
  $username = "HKSamacar_local";
  $password = "Jpsk/1866";
  $dbname = "HareKrishnaSamacar";
  if($flag==1){
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
  
  $stmt = $conn->prepare("update tblIssue set VPNo=:VPNo,Dr=:Dr,Returned=:Returned,RDate=:RDate,user=:user,comment=:comment,sent_mode=:sent_mode WHERE transaction_id=:transaction_id  AND transaction_id>0");
  
  
  
  
      
  
      $stmt->bindParam(':VPNo', $VPNo);
      $stmt->bindParam(':Dr', $Dr);
      $stmt->bindParam(':RDate', $newDateString);
      $stmt->bindParam(':Returned', $Returned);

      $stmt->bindParam(':transaction_id', $transaction_id);
      $stmt->bindParam(':user', $user);
      $stmt->bindParam(':comment', $vp_comment);
      $stmt->bindParam(':sent_mode', $sent_mode);

       
      $stmt->execute(); 
      
      echo "<script>alert('ID:".strval($transid).",TX:".$transaction_id." Updated')</script>";

      echo "New records created successfully";
      
    echo $transaction_id.$transaction_id.$transaction_id;
    
    }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
  $conn = null;
    
  $conn_trans = null;
    }
  
  ?>  
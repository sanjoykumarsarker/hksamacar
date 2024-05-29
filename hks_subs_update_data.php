<?php

include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];
  
echo $ag_number=$_POST["ag_number"];
echo $trans_id=$_POST["trans_id"];
echo $maxidx_tblmain=$_POST["maxidx_tblmain"];

echo $ag_name=$_POST["ag_name"];
echo $ag_addr=$_POST["ag_addr"];
echo $ag_dist=$_POST["ag_dist"];
echo $ag_ps=$_POST["ag_ps"];
echo $ag_po=$_POST["ag_po"];
echo $ag_poffice_bn=$_POST["ag_poffice_bn"];
echo $ag_mobile1=$_POST["ag_mobile1"];
echo $ag_mobile2=$_POST["ag_mobile2"];

echo $ag_email=$_POST["ag_email"];

echo $quantity=$_POST["ag_copies"];
 

echo $ag_cat=$_POST["ag_cat"];
echo $paymode=$_POST["ag_type"];

echo $message=$_POST["message"];

echo $ag_cont="Bangladesh";


 date_default_timezone_set("Asia/Dhaka");
 $cdate= date("m/d/Y h:i:sa");
 $rdate= date("m/d/Y");




 $price =$sb_taka;
  $period="";
 $payTypID="";
 $Resrcpy=$sb_issue;
 $Dis="";
  $AgCatId="";
 $Discontinued="FALSE";

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
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/

$stmt = $conn->prepare("update tblMem set  Name =:Name,vill=:vill,po=:po,po_bn=:po_bn,ps=:ps,dist=:dist,cont=:cont,phone=:phone,mob=:mob,email=:email,comment=:comment,paymode=:paymode,user=:user where ID_EN=:ID_EN");




    

    $stmt->bindParam(':ID_EN', $ag_number);
    $stmt->bindParam(':Name', $ag_name);
    $stmt->bindParam(':vill', $ag_addr);
    $stmt->bindParam(':po', $ag_po);

    $stmt->bindParam(':po_bn', $ag_poffice_bn);
    $stmt->bindParam(':ps', $ag_ps);
    $stmt->bindParam(':dist', $ag_dist);
    $stmt->bindParam(':cont', $ag_cont);
    $stmt->bindParam(':mob', $ag_mobile1);
    $stmt->bindParam(':phone', $ag_mobile2);
    $stmt->bindParam(':email', $ag_email);

    $stmt->bindParam(':comment', $message);

    $stmt->bindParam(':paymode', $paymode);
    $stmt->bindParam(':user', $user);

 
    $stmt->execute();   echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
$conn_trans = null;
 

?>  
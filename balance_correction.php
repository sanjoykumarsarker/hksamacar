<?php


$aaa=array();
$bbb=array();
$ccc=array();
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
$dbname_o = "harekrishnasamacar-12-01-19";

// Create connection
date_default_timezone_set("Asia/Dhaka");
$tran_date=strval(date("Y-m-d"));
?> 
 <?php
 
include_once "function.php";
// Create connection
$conn_id = new mysqli($servername, $username, $password, $dbname_o);
// Check connection
if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_id,"utf8");
$sql_id = "SELECT ID_EN ,balance FROM tblMem  ";
$result_id = $conn_id->query($sql_id);
$hhh=0;
if ($result_id->num_rows > 0) {
    // output data of each row
     while($row = $result_id->fetch_assoc()){
    array_push($aaa,$hhh);

    array_push($bbb,$row["ID_EN"]);
    array_push($ccc,$row["balance"]);

    $hhh=$hhh+1;
         // $GLOBALS['ret']= $row["ID_EN"];
     }  
} else {
    echo "0 results";
}
$conn_id->close();


for($jjj=0;$jjj<$hhh;$jjj++){

try {
    $conn_bal = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn_bal->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn_bal->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn_bal->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/

$stmt = $conn_bal->prepare("update tblMem set balance=:blance where ID_EN=:ID_EN");




    

    $stmt->bindParam(':ID_EN', intval($bbb[$jjj]));
       
 
    $stmt->bindParam(':blance',intval($ccc[$jjj]-1));


 

 
    $stmt->execute();
    
    
     echo " ".intval($bbb[$jjj])."/$jjj<hr>";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn_bal = null;

}
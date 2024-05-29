<?php
include_once "session_check.php";

echo "ID:"; 
echo $id=$_POST["id"];

echo "<br>";

echo "QUANTITY:"; 
echo $quantity=$_POST["quantity"];

echo "<br>";
echo "STATUS:"; 

echo $status=$_POST["status"];
echo "<br>";
echo "SKIP FOR (Month):"; 
echo $skip=$_POST["skip"];
echo "<br>";
echo "News Rate:"; 
echo $news_rate=$_POST["news_rate"];
session_start();
  $user=$_SESSION["id"];

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

$stmt = $conn->prepare("update tblMem set status=:status,user=:user,ag_quantity=:ag_quantity,skip=:skip,news_rate=:news_rate where ID_EN=:ID_EN");




    

    $stmt->bindParam(':ID_EN', $id);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':ag_quantity', $quantity);
     
    $stmt->bindParam(':skip', $skip);

    $stmt->bindParam(':user', $user);


    $stmt->bindParam(':news_rate', $news_rate);


 
    $stmt->execute();   echo " <br> New records created successfully by ".$user;
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
$conn_trans = null;
 

?>  
<?php   
  $vername=$_POST["vername"];



?>

  
 
<?php

    
 
  
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

$stmt = $conn->prepare("update tblIssue set despatch=0    where    vername=:vername and sent_mode='vpp'");


 









 
 
 


   $vername= $_POST["vername"];
 



 

     
 $stmt->bindParam(':vername', $vername);

 //$stmt->execute();  
 // echo "New records created successfully";






 








}

 
  
catch(PDOException $e)
  {
  echo "Error: " . $e->getMessage();
  }
$conn = null;
























try {
    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn2->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn2->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn2->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/

$stmt = $conn2->prepare("update tblIssue set despatch=:despatch    where  VPNo=:VPNo AND sent_mode='vpp' and vername=:vername");

 

    for($t=0;$t<$_POST["number"];$t++)

    {
    $ff="j".$t;
    $dd="k".intval($t);
    echo "<hr>";
    echo $_POST[$ff]."/".$_POST[$dd];
    
    $stmt->bindParam(':despatch',$_POST[$dd]);

$stmt->bindParam(':VPNo', $_POST[$ff]);
 

   echo "<br>";

   $stmt->bindParam(':vername', $vername);

    

      $stmt->execute();  
     echo "<br>New records created successfully";   //

    
    
    }
 





}








 
   
    
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn2 = null;
  
  

?>  
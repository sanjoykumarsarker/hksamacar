
  
 
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

$stmt = $conn->prepare("update tblIssue set despatch=0    where    vername=:vername");


 









 
 
 


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

$stmt = $conn2->prepare("update tblIssue set despatch=:despatch    where  VPNo=:VPNo AND sent_mode='vp' and vername=:vername");



  $rt= $_POST["n"];
     
for($u=1;$u<=$rt;$u++){

 
    $range= $_POST["range".$u];











    $vp_range=$range;
  
 $vp_range_arr=explode(",",$vp_range);
  $vp_range_size=sizeof($vp_range_arr);
 
 
 
 
 $range_all=array();
 
 
 
 for($i=0;$i<$vp_range_size;$i++){
 
   
 
   if (strpos($vp_range_arr[$i],"-") !== false) {
     $vp_range_arr_1=explode("-",$vp_range_arr[$i]);
        
 
     for($j=$vp_range_arr_1["0"];$j<=$vp_range_arr_1["1"];$j++){
 
 
         array_push($range_all,$j);	
 
     }
 
 
   }
   else{
     array_push($range_all,$vp_range_arr[$i]);
 
   }
 
 
 
 }
















foreach ($range_all as $range_each){




    $VPNo=$range_each;

if(strlen($VPNo)==4){

   $VPNo="0".$VPNo;


}

if(strlen($VPNo)==5){

    $VPNo=$VPNo;
 
 
 }
    echo  $despatch=  $_POST["despatch".$u];


     $vername= $_POST["vername"];




   $stmt->bindParam(':despatch', $despatch);

 
     $stmt->bindParam(':VPNo', $VPNo);
echo $VPNo;

   echo "<br>";

   $stmt->bindParam(':vername', $vername);

    if($VPNo>0) {

      $stmt->execute();  


    } 
 
   // echo "New records created successfully";
 





}








}

   
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn2 = null;
  
  

?>  
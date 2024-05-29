 

 
<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);   
 include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];


  $status="PENDING";

  $balance=0;


     echo "Date:";   
echo   $send_all_date=$_POST["send_all_date"];
echo "<hr>";
echo "Issue:"; 
echo $send_single_issue=$_POST["send_single_issue"];
$description="Pending Since".$send_single_issue;
echo "<hr>";
 

$year=date("Y");
 $date= date("m/d/Y") ;
 date_default_timezone_set("Asia/Dhaka");
  
 echo "Type:"; 
echo $type= $_POST["type"]; 
echo "<hr>"; 
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection



// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
 die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");
$sql_all = "SELECT date,issue,quantity,status from products where issue='".$send_single_issue."'";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
 // output data of each row
 $row = $result_all->fetch_assoc();
 
 
$status=$row["status"];
if($status!="krishna"){

    header("Location: hks_admin_login.php"); /* Redirect browser */
    exit();


}
 
 
} else {
 echo "0 results";
}
$conn_all->close();













$a=array();


if(($type=="Courier")||($type=="All")){

 

// Create connection
$conn_idc_cour = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_idc_cour->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_idc_cour,"utf8");
$m_id= $year.$send_single_issue."1";

$sql_id = "SELECT MAX(transaction_id)as maxid FROM tblIssue where transaction_id LIKE '$m_id%'";
$result_id = $conn_idc_cour->query($sql_id);

if ($result_id->num_rows > 0) {
    // output data of each row
    $row = $result_id->fetch_assoc();

 
    if(($row["maxid"]==null) || ($row["maxid"]=="")){
        $GLOBALS['m_id']=$m_id."0000";


    }
    else{
            $GLOBALS['m_id']= (int)$row["maxid"];

    }

    
} else {
      "0 results";
}
$conn_idc_cour->close(); 












$conn_cour = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_cour->connect_error) {
    die("Connection failed: " . $conn_cour->connect_error);
}

$sql = "SELECT ID_EN,status,ag_quantity,courier_name,news_rate,courier_description FROM tblMem where ID_EN <100 AND ID_EN >0 AND ag_quantity>0 AND status='CONT'";
$result = $conn_cour->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
           
 
      array_push($a,$row['ID_EN'] );



      $GLOBALS['m_id']=$GLOBALS['m_id']+1;


        $GLOBALS['courier_name']=$row['courier_name'];

        $courier_description=$row['courier_name'].$row['courier_description'];

 $news_price=(intval($row["ag_quantity"])*intval($row["news_rate"]));

 $news_rate=$row['news_rate'];
 $agcpy =(int)$row['ag_quantity'];

try {
    $conn_n_cour = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn_n_cour->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $conn_n_cour->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
            $conn_n_cour->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
    $stmt = $conn_n_cour->prepare("INSERT INTO tblIssue(transaction_id,transid,vername,SentDate,sent,agcpy,user,sent_mode,news_rate,news_price,courier_description,Specimen)
    VALUES (:transaction_id,:transid,:vername,:SentDate,:sent,:agcpy,:user,:sent_mode,:news_rate,:news_price,:courier_description,:Specimen)");
  $qty=0;
  if($agcpy>19 && $agcpy<100){

    $qty=2;
}
if($agcpy>99){

    $qty=3;
}
  
  $stmt->bindParam(':transaction_id', $transaction_id);
    $stmt->bindParam(':transid', $transid);
    $stmt->bindParam(':vername', $vername);
    $stmt->bindParam(':SentDate', $SentDate);
    $stmt->bindParam(':sent', $sent);
    $stmt->bindParam(':agcpy', $agcpy);

    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':sent_mode', $sent_mode);
    $stmt->bindParam(':news_rate', $news_rate);
    $stmt->bindParam(':news_price', $news_price);

    $stmt->bindParam(':courier_description', $courier_description);
    $stmt->bindParam(':Specimen', $qty);
   
   echo $transaction_id = (int)$GLOBALS['m_id'];
    echo "/";
  echo  $transid = (int)$row['ID_EN'];
    echo "<hr>";
    $vername = (int)$send_single_issue;
    $SentDate =  $send_all_date;
    $sent = "TRUE";
  //  $agcpy =(int)$row['ag_quantity'];
    

    // insert a row
    
  
     
    $sent_mode=$GLOBALS['courier_name'];
   


    
    $stmt->execute();

    // insert another row
    

     }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn_n_cour = null;











       
        
        
    }
 } else {
 }
$conn_cour->close();



 
 


}




if(($type=="Agents")||($type=="All")){
 
 
    // Create connection
    $conn_idc_ag = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_idc_ag->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn_idc_ag,"utf8");
    $m_id= $year.$send_single_issue."2";
    
    $sql_id = "SELECT MAX(transaction_id)as maxid FROM tblIssue where transaction_id LIKE '$m_id%'";
    $result_id = $conn_idc_ag->query($sql_id);
    
    if ($result_id->num_rows > 0) {
        // output data of each row
          $row = $result_id->fetch_assoc();
    
     
        if(($row["maxid"]==null) || ($row["maxid"]=="")){
            $GLOBALS['m_id_ag']=$m_id."0000";
    
    
        }
        else{
                $GLOBALS['m_id_ag']= (int)$row["maxid"];
    
        }
    
        
    } else {
        echo "0 results";
    }
    $conn_idc_ag->close(); 
    
    
    
    
    
    
    
    
    
    
    
    
    $conn_ag = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_ag->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT ID_EN,status,ag_quantity,courier_name,news_rate,courier_description FROM tblMem where ID_EN <10000 AND ID_EN >99 AND ag_quantity>0 AND status='CONT'";
    $result = $conn_ag->query($sql);
    
    if ($result->num_rows > 0) {
         // output data of each row
        while($row = $result->fetch_assoc()) {
               
     
          array_push($a,$row['ID_EN'] );
    
    
    
            $GLOBALS['m_id_ag']=$GLOBALS['m_id_ag']+1;
    
    
    
            $courier_description=$row['courier_name'].$row['courier_description'];

            $news_price=(intval($row["ag_quantity"])*intval($row["news_rate"]));
           
            $news_rate=$row['news_rate'];
            $agcpy =(int)$row['ag_quantity'];
     
    
    try {
        $conn_n_ag = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn_n_ag->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $conn_n_ag->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
                $conn_n_ag->query('SET NAMES "utf8"'); 
        // prepare sql and bind parameters
        $stmt = $conn_n_ag->prepare("INSERT INTO tblIssue(transaction_id,transid,vername,SentDate,sent,agcpy,user,sent_mode ,news_rate,news_price,courier_description,Specimen)
        VALUES (:transaction_id,:transid,:vername,:SentDate,:sent,:agcpy,:user,:sent_mode ,:news_rate,:news_price,:courier_description,:Specimen)");
    $qty=0;
   
   if($agcpy>19 && $agcpy<100){

        $qty=2;
    }
    if($agcpy>99){

        $qty=3;
    }
     
     $stmt->bindParam(':transaction_id', $transaction_id);
        $stmt->bindParam(':transid', $transid);
        $stmt->bindParam(':vername', $vername);
        $stmt->bindParam(':SentDate', $SentDate);
        $stmt->bindParam(':sent', $sent);
        $stmt->bindParam(':agcpy', $agcpy);
        $stmt->bindParam(':user', $user);

        $stmt->bindParam(':sent_mode', $sent_mode);
        $stmt->bindParam(':news_rate', $news_rate);
        $stmt->bindParam(':news_price', $news_price);
    
        $stmt->bindParam(':courier_description', $courier_description);
        $stmt->bindParam(':Specimen', $qty);

       /* if($agcpy>19 && $agcpy<100){

            $qty=2;
        }
        if($agcpy>99){
    
            $qty=3;
        }  

        */
       echo  $transaction_id = (int)$GLOBALS['m_id_ag'];
       echo "/";
       echo $transid = (int)$row['ID_EN'];
        echo "<hr>";
        $vername = (int)$send_single_issue;
        $SentDate =  $send_all_date;
        $sent = "TRUE";
       // $agcpy =(int)$row['ag_quantity'];
        $sent_mode="";
        if($agcpy==1){

            $sent_mode="rp";
        }
    
        if($agcpy>1&&$agcpy<71){

            $sent_mode="vp";
        }

        if($agcpy>70){

            $sent_mode="vpp";
        }
        // insert a row
        
      
         
    
    
    
        
        $stmt->execute();
    
        // insert another row
        
    
         }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn_n_ag = null;
    
    
    
    
    
    
    
    
    
    
    
           
            
            
        }
     } else {
     }
    $conn_ag->close();
    
    
    
    
 
     
    
    
    }





    if(($type=="Subscribers")||($type=="All")){


    // Create connection
    $conn_idc = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_idc->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn_idc,"utf8");
    $m_id= $year.$send_single_issue."3";
    
    $sql_id = "SELECT MAX(transaction_id)as maxid FROM tblIssue where transaction_id LIKE '$m_id%'";
    $result_id = $conn_idc->query($sql_id);
    
    if ($result_id->num_rows > 0) {
        // output data of each row
          $row = $result_id->fetch_assoc();
    
     
        if(($row["maxid"]==null) || ($row["maxid"]=="")){
            $GLOBALS['m_id_sub']=$m_id."0000";
    
    
        }
        else{
                $GLOBALS['m_id_sub']= (int)$row["maxid"];
    
        }
    
        
    } else {
        echo "0 results";
    }
    $conn_idc->close(); 
    
    
    
    
    
    
    
    
    
    
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT ID_EN,status,ag_quantity,balance FROM tblMem where ID_EN >10000 AND ID_EN >0 AND balance>0 AND status='CONT'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
         // output data of each row
        while($row = $result->fetch_assoc()) {
               
     
          array_push($a,$row['ID_EN'] );
    
    
    
          $GLOBALS['m_id_sub']=$GLOBALS['m_id_sub']+1;
    
    
          $agcpy =(int)$row['ag_quantity'];
    
    
     
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
                $conn->query('SET NAMES "utf8"'); 
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO tblIssue(transaction_id,transid,vername,SentDate,sent,agcpy,user,sent_mode,Specimen)
        VALUES (:transaction_id,:transid,:vername,:SentDate,:sent,:agcpy,:user,:sent_mode,:Specimen)");
       
       $qty=0;
       if($agcpy>19 && $agcpy<100){

        $qty=2;
    }
    if($agcpy>99){

        $qty=3;
    }
       
       $stmt->bindParam(':transaction_id', $transaction_id);
        $stmt->bindParam(':transid', $transid);
        $stmt->bindParam(':vername', $vername);
        $stmt->bindParam(':SentDate', $SentDate);
        $stmt->bindParam(':sent', $sent);
        $stmt->bindParam(':agcpy', $agcpy);
    
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':sent_mode', $sent_mode);
        $stmt->bindParam(':Specimen', $qty);

       
       echo  $transaction_id = (int)$GLOBALS['m_id_sub'];
       echo "/";
      echo  $transid = (int)$row['ID_EN'];
        echo "<hr>";
        $vername = (int)$send_single_issue;
        $SentDate =  $send_all_date;
        $sent = "TRUE";
        $agcpy =1;
        
    
        // insert a row
        
        $sent_mode="";
        if($agcpy==1){

            $sent_mode="rp";
        }
    
        if($agcpy>1&&$agcpy<71){

            $sent_mode="vp";
        }

        if($agcpy>70){

            $sent_mode="vpp";
        }
         
    
    
    
        
        $stmt->execute();
    
        // insert another row
        
    
         }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn = null;
    
    
    
// {subscriber balance value update




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
    
    $stmt = $conn_bal->prepare("update tblMem set balance=balance-1 where ID_EN=:ID_EN");
    
    
    
    $stmt001 = $conn_bal->prepare("update tblMem set description=:description,status=:status where balance=:balance and ID_EN=:ID_EN ");

        
    $sub_status="PENDING";
        $stmt->bindParam(':ID_EN',$row['ID_EN']);
           
        $stmt001->bindParam(':ID_EN',$row['ID_EN']);

       $stmt001->bindParam(':status', $sub_status);
    
       $stmt001->bindParam(':balance', $balance);

       $stmt001->bindParam(':description', $description);

    
     
        $stmt->execute();  

        $stmt001->execute();  

        
        // echo " <br> UPDATED ";
        }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }
    $conn_bal = null;






//  subscriber balance value update}






    
    
    
    
    
    
    
    
           
            
            
        }
     } else {
     }

    
    
    






    
    
     
    
    
    }



  


//print_r($a);
?>

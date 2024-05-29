<div style="text-align: center;">
<?php



ini_set('display_errors', 1);
date_default_timezone_set("Asia/Dhaka");
$date=date("Y-m-d h:i:s");
$maxsize = 20 * 1024 * 1024;
  $operator_id=$_SESSION['operator_id'];
$flag=0;
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
$division="International";

 $si_a = array();
 $name_a = array();
 $gender_a = array();
 $age_a = array();
 $occupation_a = array();
 $marital_a = array();
 $education_a = array();
 $address_a = array();
 $temple_a = array();
 $recommend_a = array();
 $lila_a = array();














$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
    // Check if the form was submittedz

   echo $temple_id=  $_POST["temple_id"];
     $templereg=$temple_id;

  
       echo "<h1>Hare Krishna</h1>";
 
 
?>

















<div style="background-color:lightblue;">
<h4> <h4>
<?php
$target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$GLOBALS["image1"]=$target_dir.$date.".".$imageFileType;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload1"]["size"] > $maxsize) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "xl" && $imageFileType != "xlsx" && $imageFileType != "xlx"
&& $imageFileType != "xls" ) {
    echo "Sorry, only excel file";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    
   

    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $GLOBALS["image1"])) {
        echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";

        chmod($GLOBALS["image1"],0777);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
</div>

 







<?php


  $inputFileName = $GLOBALS["image1"];
  $result = array();



// new from 12.01.2024 by sanjoy.smd
  
  //echo $value = $sheet->getCell( 'B2' )->getValue();
  require_once(__DIR__ . '/vendor/autoload.php');

# Create a new Xls Reader
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

// Tell the reader to only read the data. Ignore formatting etc.
$reader->setReadDataOnly(true);

// Read the spreadsheet file.
$spreadsheet = $reader->load($inputFileName);

$sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
  $highestRow = $sheet->getHighestRow();
echo "Heighest number of row=".$highestRow."/";

$countRow=0;
foreach ($sheet->getRowIterator() as $row) {
     if ($row->getRowIndex() === 1) {
        continue; //Skip heading
    } 
     $cells = iterator_to_array($row->getCellIterator("A", "K"));
     if(strlen($cells["B"]->getValue())>0) {

	     $countRow=$countRow+1;
   $si = $cells["A"]->getValue();
  $name = $cells["B"]->getValue();
  $gender = $cells["C"]->getValue();
 $age = $cells["D"]->getValue();
  $occupation = $cells["E"]->getValue();
  $marital =$cells["F"]->getValue();
 $education = $cells["G"]->getValue();
 $address = $cells["H"]->getValue();
 $temple = $cells["I"]->getValue();
 $recommend = $cells["J"]->getValue();
  $lila = $cells["K"]->getValue();







  array_push($si_a,$si);
  array_push($si_a ,$si);
  array_push($name_a ,$name);
  array_push($gender_a ,$gender);
  array_push($age_a,$age);
  array_push($occupation_a,$occupation);
  array_push($marital_a ,$marital);
  array_push($education_a ,$education);
  array_push($address_a ,$address);
  array_push($temple_a ,$temple);
  array_push($recommend_a ,$recommend);
  array_push($lila_a ,$lila);
 

}

//$condition = $sheet->getCell( 'E'.$row )->getValue();
//$rcpt = $sheet->getCell( 'G'.$row )->getValue();

	
 
  }
  json_encode(array("result"=>$result));	
  
  //echo $result[2][4];
				 		

    //Prints out data in each row.
    //Replace this with whatever you want to do with the data.
  
    //  print_r($rowData);
  
 











?>










    <?php






$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
       
        
      
      // Create connection
      $conn_all = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn_all->connect_error) {
          die("Connection failed: " . $conn_all->connect_error);
      }
      mysqli_set_charset($conn_all,"utf8");
      echo $sql_all = "SELECT ename,age,templereg FROM reg where templereg=".$temple_id."";
     echo "/";
      $result_all = $conn_all->query($sql_all);
      
      if ($result_all->num_rows > 0) {

        while($row = $result_all->fetch_assoc()) {
 
             $name=$row["ename"];
            $age=$row["age"];
for($nd=0;$nd< $countRow; $nd++){

if($name_a[$nd]==$name&&$age_a[$nd]==$age){

echo "<h1 style='color:red'>Duplicate:".$name_a[$nd]."(".$age_a[$nd].") at Line ".intval($nd+1)."   </h1>";
$flag=1;
}
 



     
          }
          
      }  

    }
      $conn_all->close();
      
                          






if($flag==1){


die();


}








$conn_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_id,"utf8");
$sql_id = "SELECT MAX(reg)as maxid FROM reg where templereg=".$temple_id."";
$result_id = $conn_id->query($sql_id);

if ($result_id->num_rows > 0) {
    // output data of each row
    $row = $result_id->fetch_assoc();

    if($row["maxid"]>0){
      echo  $GLOBALS['maxid']= "0".intval($row["maxid"]+1);


    }

else{

  echo  $GLOBALS['maxid']= $temple_id."0001";


}



    
} else {
    echo "0 results";
}
$conn_id->close();







 


























 
 
 


 
 
try {
    $conn_trans = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn_trans->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn_trans->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn_trans->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
     $stmt_trans = $conn_trans->prepare("INSERT INTO
     reg (reg,ename,bname,phone,gender,age,service,mstatus,education,address,templename,recom,nprefer,datetime,operator_id,templereg,division,ip)
    VALUES (:reg,:ename,:bname,:phone,:gender,:age,:service,:mstatus,:education,:address,:templename,:recom,:nprefer,:datetime,:operator_id,:templereg,:division,:ip)");




for($nd=0;$nd< $countRow; $nd++){
    $ip=$ipaddress;

    $ename=$name_a[$nd];
    $bname=$recommend_a[$nd];
    $phone=$temple_a[$nd];

    $gender=$gender_a[$nd];
    $age=$age_a[$nd];

    $service=$occupation_a[$nd]."(".$education_a[$nd].")";
    $mstatus=$marital_a[$nd];
    $education=$education_a[$nd];
    $address=$address_a[$nd];
    $templename=$temple_a[$nd];
    $recom=$recommend_a[$nd];
    $nprefer=$lila_a[$nd];

    $reg=0;
    if(strlen($GLOBALS['maxid'])==9){


        $reg="0".$GLOBALS['maxid'];

    }

    if(strlen($GLOBALS['maxid'])==10){


        $reg= $GLOBALS['maxid'];

    }
    
    
    $stmt_trans->bindParam(':reg', $reg);
    $stmt_trans->bindParam(':ip', $ip);

    $stmt_trans->bindParam(':ename', $ename);
    $stmt_trans->bindParam(':bname', $bname);
    $stmt_trans->bindParam(':phone', $mobile);

    $stmt_trans->bindParam(':gender', $gender);
    $stmt_trans->bindParam(':age', $age);
    $stmt_trans->bindParam(':service', $service);
    $stmt_trans->bindParam(':mstatus', $mstatus);
    $stmt_trans->bindParam(':education', $education);
    $stmt_trans->bindParam(':address', $address);
    $stmt_trans->bindParam(':education', $education);
    $stmt_trans->bindParam(':templename', $templename);
    $stmt_trans->bindParam(':recom', $recom);
    $stmt_trans->bindParam(':nprefer', $nprefer);

    $stmt_trans->bindParam(':datetime', $date);
    $stmt_trans->bindParam(':operator_id', $operator_id);


    $stmt_trans->bindParam(':templereg', $templereg);

    $stmt_trans->bindParam(':division', $division);





    // insert a row
 $stmt_trans->execute();
 echo "<hr> ID:".$GLOBALS['maxid']." created successfully for -".$ename."  ";

 
 $GLOBALS['maxid']=$GLOBALS['maxid']+1;

 
}
    }
catch(PDOException $e)
    {
    echo "Error: " .$e->getMessage();
    }
$conn_trans = null;




        
 











    
    ?>

</div>

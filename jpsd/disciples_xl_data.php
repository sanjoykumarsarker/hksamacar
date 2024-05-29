<div style="text-align: center;">
<?php
date_default_timezone_set("Asia/Dhaka");
$date=date("Y-m-d-h-i-sa");
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
$division="Dhaka";

 $si_a = array();
  














$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
    // Check if the form was submittedz

  

  
       echo "<h1>Hare Krishna</h1>";
       $now=date("YmdHis");
       $table="nnn".$now;
           // Create connection
           $conn = new mysqli($servername, $username, $password, $dbname);
           // Check connection
           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           } 
           
           // sql to create table
        //   $sql = "CREATE TABLE $table select * from ttt";
           $sql1 = "truncate table ttt";
       
           
           if ($conn->query($sql1) === TRUE) {
             echo "<h1 style='color:red;text-align:center'>Table   will be created  </h1>";
         } else {
             echo "Error  table: " . $conn->error;
         }
           
           $conn->close();
 
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

  //Had to change this path to point to IOFactory.php.
  //Do not change the contents of the PHPExcel-1.8 folder at all.
  include('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');
 
  
  //Use whatever path to an Excel file you need.
  $inputFileName = $GLOBALS["image1"];
  $result = array();
  try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
  } catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
        $e->getMessage());
  }

  $sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();


  
  //echo $value = $sheet->getCell( 'B2' )->getValue();
 for ($row = 1; $row <= $highestRow; $row++) { 
  
     //for ($row = 1; $row <=1 ; $row++) {
 //print_r($row);
  //  $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
		
 

       $si = $sheet->getCell( 'A'.$row )->getValue();
   $si;

   array_push($si_a,$si);
 

  //array_push($si_a,$si);
 



//$condition = $sheet->getCell( 'E'.$row )->getValue();
//$rcpt = $sheet->getCell( 'G'.$row )->getValue();

/*		
		 array_push($result,
array('id'=>"হরে কৃষ্ণ, ".$agent." এজেন্ট নং ".$an."। ২৪.৮.১৭ তারিখে আপনাকে পত্রিকা   পাঠানো হয়েছে। @ মাসিক হরেকৃষ্ণ সমাচার। ",
 
'phone'=>$num
));
 */
  }

 // print_r($si_a);
 // json_encode(array("result"=>$result));	
  
  //echo $result[2][4];
				 		

    //Prints out data in each row.
    //Replace this with whatever you want to do with the data.
  
    //  print_r($rowData);
  
 
  






$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
       
  
 
try {
    $conn_trans = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn_trans->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn_trans->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn_trans->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
    $stmt_trans = $conn_trans->prepare("INSERT INTO
     ttt (nnn)
    VALUES (:nnn)");




for($nd=0;$nd< $highestRow; $nd++){
 
     $nnn=trim($si_a[$nd]);

   
  echo "<p style='color:red'>$nnn <span style='color:blue'>----Uploaded</span></p> <br>";
  
    
    $stmt_trans->bindParam(':nnn', $nnn);
     





    // insert a row
   $stmt_trans->execute();
  
 
}
    }
catch(PDOException $e)
    {
    echo "Error: " .$e->getMessage();
    }
$conn_trans = null;




        
 














    
    ?>

</div>
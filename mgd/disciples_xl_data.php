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
     $cells = iterator_to_array($row->getCellIterator("A", "B"));
     if(strlen($cells["A"]->getValue())>0) {

	     $countRow=$countRow+1;
   $si = $cells["A"]->getValue();
  $name = $cells["B"]->getValue();








  array_push($si_a,$si);

 

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




for($nd=0;$nd< $countRow; $nd++){
   

    $nnn=$si_a[$nd];

 
    
    $stmt_trans->bindParam(':nnn', $nnn);



    // insert a row
 $stmt_trans->execute();
 echo "<hr>  created successfully for -".$nnn."  ";


 
}
    }
catch(PDOException $e)
    {
    echo "Error: " .$e->getMessage();
    }
$conn_trans = null;




        
 











    
    ?>

</div>


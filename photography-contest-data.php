<div style="text-align: center;">
<?php
date_default_timezone_set("Asia/Dhaka");
$date=date("Y/m/d/h:i:sa");
$maxsize = 20 * 1024 * 1024;

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
    // Check if the form was submittedz

 

      $name=  $_POST["name"];
        $address=  $_POST["address"];
       $email=  $_POST["email"];
       $phone=  $_POST["phone"];
       $message=  $_POST["message"];

       echo "<h1>Hare Krishna,".$name."</h1>";
       echo "<h3>Your Phone Number:".$phone."</h3>";

 
?>

<div style="background-color:lightblue;">
<h4>First Image:<h4>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$GLOBALS["image1"]=$target_dir.$phone."-1.".$imageFileType;
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
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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

<div style="background-color:orange;">
<h4>Second Image:<h4>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$GLOBALS["image2"]=$target_dir.$phone."-2.".$imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
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
if ($_FILES["fileToUpload2"]["size"] > $maxsize) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"],$GLOBALS["image2"])) {
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";

        chmod($GLOBALS["image2"],0777);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
</div>

<div style="background-color:purple;">
<h4>Third Image:<h4>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$GLOBALS["image3"]=$target_dir.$phone."-3.".$imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
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
if ($_FILES["fileToUpload3"]["size"] > $maxsize) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $GLOBALS["image3"])) {
        echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";

        chmod($GLOBALS["image3"],0777);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
 </div>

    <?php






 
       
        
      
      // Create connection
      $conn_all = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn_all->connect_error) {
          die("Connection failed: " . $conn_all->connect_error);
      }
      mysqli_set_charset($conn_all,"utf8");
      $sql_all = "SELECT name,phone FROM photography_contest where phone=".$phone."";
      $result_all = $conn_all->query($sql_all);
      
      if ($result_all->num_rows > 0) {
          // output data of each row
          while($row = $result_all->fetch_assoc()){
         echo $row["name"]."You have already Uploaded Photo. ";        
      
     
          }
          
      } else {
          echo "0 results";
      }
      $conn_all->close();
      
                          















 
        // Check if file was uploaded without errors

        if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){

            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

            echo   $filename = $_FILES["photo"]["name"];

            echo   $filetype = $_FILES["photo"]["type"];

            echo    $filesize = $_FILES["photo"]["size"];

        

            // Verify file extension

            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        

            // Verify file size - 5MB maximum

            

            if($filesize > $maxsize) die("Error: File size is larger than 20 MB.");

        

            // Verify MYME type of the file

            if(in_array($filetype, $allowed)){

                // Check whether file exists before uploading it

                if(file_exists("photography-contest-uploads/".$_FILES["photo"]["name"])){

                    echo $_FILES["photo"]["name"]." is already exists.";

                } else{

                    $uploaddir = '/var/www/html/HKS/images/';
                    $uploadfile = $uploaddir.basename($_FILES['photo']['name']);
                
                    move_uploaded_file($_FILES["photo"]["tmp_name"],$uploadfile);
                    move_uploaded_file($_FILES["photo"]["tmp_name"], "photography-contest-uploads/".$_FILES["photo"]["name"]);
                    echo $GLOBALS["image1"]=$_FILES["photo"]["tmp_name"];
                    echo "Your file was uploaded successfully.";

                } 

            } else{

                echo "Error: There was a problem uploading your file. Please try again."; 

            }

        } else{

            echo "Error: ".$_FILES["photo"]["error"];

        }









 


























 
 
 


 
 
try {
    $conn_trans = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn_trans->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn_trans->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn_trans->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
    $stmt_trans = $conn_trans->prepare("INSERT INTO photography_contest (name,phone,address,email,message,date)
    VALUES (:name,:phone,:address,:email,:message,:date)");

    $stmt_trans->bindParam(':name', $name);

    $stmt_trans->bindParam(':phone', $phone);
    $stmt_trans->bindParam(':address', $address);
    $stmt_trans->bindParam(':email', $email);
    $stmt_trans->bindParam(':message', $message);
    $stmt_trans->bindParam(':date', $date);

 
    // insert a row
 
    $stmt_trans->execute();

 
 

    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " .$e->getMessage();
    }
$conn_trans = null;




        
 











    
    ?>

</div>
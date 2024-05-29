<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>New Subscriber</title>


  <meta charset="utf-8">
 
 <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
 <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </head>
  <body>
 
<?php
 $servername = "localhost";
 $username = "HKSamacar_local";
 $password = "Jpsk/1866";
 $dbname = "HareKrishnaSamacar";

// Create connection
$conn_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_id,"utf8");
$sql_id = "SELECT ID FROM tblMem1";
$result_id = $conn_id->query($sql_id);

if ($result_id->num_rows > 0) {
    // output data of each row
     while($row = $result_id->fetch_assoc()) {
        
          $id_bn= $row["ID"];
       $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
       $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  
       $id_en = str_replace($bn, $en, $id_bn);
          


 
       $servername1 = "localhost";
       $username1 = "HKSamacar_local";
       $password1 = "Jpsk/1866";
       $dbname1 = "HareKrishnaSamacar";
       
       
        
       try {
           $conn = new PDO("mysql:host=$servername1;dbname=$dbname1", $username1, $password1);

           $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
           $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
           $conn->query('SET NAMES "utf8"'); 
           // set the PDO error mode to exception
          // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, "SET NAME'utf8'");
            // prepare sql and bind parameters
           $sql="update tblMem1 set ID_EN= '".$id_en."' where ID='".$id_bn."'";
            
 
       echo $id_en.$id_bn ;
        
           // insert a row
        
           $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
       
        
        
       
          // echo "New records created successfully";
           }
       catch(PDOException $e)
           {
           echo "Error: " . $e->getMessage();
           }
       $conn = null;



     }
    
} else {
    echo "0 results";
}
$conn_id->close();
?> 
  </body>
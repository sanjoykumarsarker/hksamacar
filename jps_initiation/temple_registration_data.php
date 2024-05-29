
<?php session_start();?>
<!DOCTYPE html>

<html>
 
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<title>
Registration
</title>
 <style>
h3:hover {
   background-color: yellow;
   color:red;
   font-size: 30px;
   font-weight: bold;
   underline:none;
}
 </style>

</head>
<body>
<br><br><br><br><br> <hr><hr> 
<div style= "text-align:center";>
<?php
 
  
  echo  $temple_province = $_POST['temple_province'];
 echo  $temple_city = $_POST['temple_city'];
   echo $temple_postcode = $_POST['temple_postcode'];
echo   $temple_address = $_POST['temple_address'];
 echo  $temple_name_native = $_POST['temple_name_native'];
echo   $temple_name = $_POST['temple_name'];
echo   $temple_recommendator = $_POST['temple_recommendator'];
 echo  $temple_email = $_POST['temple_email'];

 echo  $temple_website = $_POST['temple_website'];

echo   $temple_phone = $_POST['temple_phone'];
$temple_country_name_id =$_POST['temple_country_name'];
$temple_country_name_id_all = explode(",",$temple_country_name_id);


 $temple_country_name= $temple_country_name_id_all[0];
echo"<hr>". $temple_country_id= $temple_country_name_id_all[1];





 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$sql_con = new mysqli($servername, $username, $password, $dbname);

$sql_con_data = new mysqli($servername, $username, $password, $dbname);

/*
temple_bn_name 
temple_recommendator 
temple_phone 
temple_email 
temple_id 
temple_website 
temple_province 
temple_address 
temple_country_name 
temple_postcode 
temple_city 
*/

$temple_id_max="";
$sql_all = "SELECT temple_id FROM temple where temple_id like ? ";

// Attempt to prepare the query
if ($stmt = $sql_con->prepare($sql_all)) {

  // Pass the parameters
   $temple_country_id_string=$temple_country_id."%";
  $stmt->bind_param("s", $temple_country_id_string); 

  // Execute the query
  $stmt->execute();
  if (!$stmt->errno) {
    // Handle error here
  }

  // Pass a variable to hold the result
  // Remember you are binding a *column*, not a row
  $stmt->bind_result($temple_country_id_result);

  // Loop the results and fetch into an array
  $temple_id_all = array();
  while ($stmt->fetch()) {
echo  $temple_id_all[]=$temple_country_id_result;


   }

if($temple_id_all!=""||$temple_id_all!=null)

{


$temple_id_max=max($temple_id_all);


}

if($temple_id_max!=""||$temple_id_max!=null)

{
$temple_id_max_plus=(int)$temple_id_max+1;

echo $temple_id=$temple_id_max_plus;


}

if($temple_id_max==""||$temple_id_max==null)

{
 
echo $temple_id=$temple_country_id."001";

}

}
 $stmt->close();
  $sql_con->close();

 

$sql = "insert into temple (temple_en_name,temple_bn_name,temple_recommendator,temple_phone,
temple_email,temple_id,temple_website,temple_province,temple_address,
temple_country_name,temple_postcode ,temple_city ) values(?,?,?,?,?,?,?,?,?,?,?,?)";
 
// Attempt to prepare the query
if ($stmt_data = $sql_con_data->prepare($sql)) {

  // Pass the parameters
   
  $stmt_data->bind_param("ssssssssssss",$temple_name,$temple_name_native,$temple_recommendator,$temple_phone,
$temple_email,$temple_id,$temple_website,$temple_province,$temple_address,
$temple_country_name,$temple_postcode ,$temple_city); 

  // Execute the query
  $stmt_data->execute();
  if (!$stmt_data->errno) {
    // Handle error here
  }

  // Pass a variable to hold the result
  // Remember you are binding a *column*, not a row
 // $stmt_data->bind_result($country_name,$country_code);
/*
  // Loop the results and fetch into an array
  $logIds = array();
  while ($stmt_data->fetch()) {
   echo "<option value='$country_name,$country_code'>" .$country_name."</option>";
  }
*/
  // Tidy up

//}
  $stmt_data->close();
  $sql_con_data->close();

  // Do something with the results
 //echo$logIds["country_name"];

 }  




 





    
  ?>

<br><br><br> <hr><hr> <br><br>	
<a href="javascript:window.open('','_self').close();" style= "text-align:center; text-decoration:none;"; > <h3>Correction Done. <br> Thanks</h3> </a>

</div>
</body>

</html>
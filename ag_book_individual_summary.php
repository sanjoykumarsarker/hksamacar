<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Subscriber Book</title>


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
 
 

<style type="text/css">


body, html, .container-fluid {
     height: 100%;
}
 
 
/* ---Start of Wrapper style ---- */

#wrapper	{
		background-color: #787878;
	}

.card-header	{
	background-color: #3c3c3c;
	max-height: 40px;
	padding: 5px;
	}

.card-link {	
	color: white;
	}
	
.card-link:Hover {	
	color: yellow;
	}
	
.card-body {
	padding: 5px;
	background-color: #f0f0f0;
	
	}
	
.card-body a {	
	color: black;
	}




/* ---end of Wrapper style ---- */





</style>

</head>
 
<body>
 
<?php
   $ag_name=$_POST['ag_name'];
 
  $ag_id_en=$_POST['ag_id_en'];
 
?>
<div   >
 
 
 
 
            <h5> <?php  echo $ag_id_en.". &nbsp  ".$ag_name; ?></h5>
                        <div class="table-responsive">
        <table class="table table-bordered table-sm table-hover">
          <thead>
            <tr>
                <th>Sent Date</th>
            <th>Issue</th>
            <th>VP/ID</th>
                <th>QTY</th>
               
                <th>Received Taka</th>
                <th>Return</th>
                <th>Date</th>
                <th>Comments</th>
            </tr>
          </thead>
          <tbody>
                 
                
  <?php
 
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

date_default_timezone_set("Asia/Dhaka");
$cdate= date("m/d/Y h:i:sa");
$rdate= date("m/d/Y");
  

// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");


$sql_all = "SELECT 	idn , transid ,	SentCopy 	,vername ,	SentDate ,	sent ,	Returned ,
Resend, 	Dr ,	Cr ,	statusID ,	VPNo ,	VPDate ,	agcpy ,	Rdate ,	resrcpy ,
    Comment ,	id 	,Specimen FROM tblIssue WHERE 
 transid= '".$ag_id_en."'";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
    // output data of each row
    while($row = $result_all->fetch_assoc()){
           
       if($row["Comment"]!=""){

$GLOBALS["return"]="RETURN";

       }
echo '<tr>
 
<td>'.$row["SentDate"].'</td>
<td>'.$row["vername"].'</td>
<td>'.$row["VPNo"].'</td>
<td>'.$row["agcpy"].'</td>
<td>'.$row["Dr"].'</td>
<td>'.$row["Returned"].$GLOBALS["return"].'</td>
<td>'.$row["Rdate"]."  ".$row["VPDate"].'</td>
 
<td>'.$row["Comment"].'</td>
</tr>
';
    }
    
} else {
    echo "0 results";
}
$conn_all->close();

                    ?>
 </tbody>
</table>
</div>
</body>
</html>
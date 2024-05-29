


  <meta charset="utf-8">

 <link rel="shortcut icon" href="favicon1.ico" />
 <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

 <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

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


  <?php
include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];

  $VPNo=$_POST["vp_no"];

  $Dr=$_POST["vp_receive"];

  $transid=$_POST["transid"];

   $VPDate=$_POST["vp_date"];

  $transaction_id=intval($_POST["transaction_id"]);

  $idn=$_POST["idn"];

  $vp_comment=$_POST["vp_comment"];

  $vp_return=$_POST["vp_return"];



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

  $stmt = $conn->prepare("update tblIssue set VPNo=:VPNo,Dr=:Dr,RDate=:RDate,Comment=:Comment,Returned=:Returned,user=:user where transaction_id=:transaction_id");






      $stmt->bindParam(':VPNo', $VPNo);
      $stmt->bindParam(':Dr', $Dr);

      $stmt->bindParam(':Returned', $vp_return);
      $stmt->bindParam(':Comment', $vp_comment);



      $stmt->bindParam(':RDate', $VPDate);

      $stmt->bindParam(':transaction_id', $transaction_id);
      $stmt->bindParam(':user', $user);


      $stmt->execute();


      echo "<h2 style='background-color:red'> !!!  TX:".$transaction_id.",VP No:".$VPNo.", Dated: ".$VPDate."  has been Returned !</h2>";
      }
  catch(PDOException $e)
      {
      echo "Error: " . $e->getMessage();
      }
  $conn = null;

  $conn_trans = null;

  $conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");


$sql_all = "SELECT 	idn , transid ,	SentCopy 	,vername ,	SentDate ,	sent ,	Returned ,
Resend, 	Dr ,	Cr ,	statusID ,	VPNo ,	VPDate ,	agcpy ,	Rdate ,	resrcpy ,
    Comment ,	id 	,Specimen FROM tblIssue WHERE
    transid= '".$transid."' ORDER BY vername DESC";
$result_all = $conn_all->query($sql_all);
$return_count=1;

$return_result=0;
if ($result_all->num_rows > 0) {

  echo '
  <div   class="table-responsive">
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
  <tbody>';
    // output data of each row

    while($row = $result_all->fetch_assoc()){

    if(($return_count==1)&&($row["Returned"]=='TRUE'))
    {
      $return_result=$return_result+1;
    }
    if(($return_count==2)&&($row["Returned"]=='TRUE'))
    {
      $return_result=$return_result+1;
    }

    $return_count=$return_count+1;


echo '
<tr>


<td>'.$row["SentDate"].'</td>
<td>'.$row["vername"].'</td>
<td>'.$row["VPNo"].'</td>
<td>'.$row["agcpy"].'</td>
<td>'.$row["Dr"].'</td>
<td>'.$row["Returned"].'</td>
<td>'.$row["Rdate"]."  ".$row["VPDate"].'</td>




<td>'.$row["Comment"].'</td>
</tr>


';


    }
   echo ' </table>';

} else {
    echo "0 results";
}
if($return_result==2){

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




$stmt001 = $conn_bal->prepare("update tblMem set  status=:status where   ID_EN=:ID_EN ");


$sub_status="DISCONT";

    $stmt001->bindParam(':ID_EN',intval($transid));

   $stmt001->bindParam(':status', $sub_status);





    $stmt001->execute();


    // echo " <br> UPDATED ";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn_bal = null;
}
$conn_all->close();
  ?>
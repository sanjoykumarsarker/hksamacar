<?php


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
  $print_issue=$_SESSION["print_issue"];


 
 
?>

<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Post Office Despatch</title>


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

<style>
    .page {
        font-size:12px;
        orientaion:landscape;
        width: 11.69in;
        margin: 1cm auto;
        border: 0px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        page-break-after: always;
    }
	
	.bottom_aligner {
		display: inline-block;
		padding: .25in 0.15in 0.15in 0.15in;
		height: 100%;
		vertical-align: bottom;
		width: 0px;
	}
	
    table, th, tr,td {
        font-size:12px;
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {        
        padding: 2px;
        text-align: center;
    }

 
    @page {
        font-size:12px;
        size:landscape;
        page-break-after: always; 
    }
</style>

<body >
<?php 

include_once "function.php";
include_once 'classes/banglaNumberToWord.php';
$banglaNumber = new BanglaNumberToWord();

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
$flag=0;

 // Create connection
 $conn_id = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_id->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 mysqli_set_charset($conn_id,"utf8");

 
 $sql_id = "SELECT max(despatch) as maxid FROM tblIssue where VPNo IS NOT NULL AND vername =".$print_issue."";
 $result_id = $conn_id->query($sql_id);
 
 if ($result_id->num_rows > 0) {
     // output data of each row
     $row = $result_id->fetch_assoc();
           $GLOBALS['max_despatch']= $row["maxid"];
     
 } else {
     echo "0 results";
 }
 $conn_id->close();
 ?> 

 <?php
// Create connection

 $arr_sl=array();
 $arr_vp=array();
 $arr_name=array();

 for($g=1;$g<=$GLOBALS['max_despatch'];$g++){

    $hhh=1;
// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");
    $sql_all = "SELECT transid,vername,VPNo,transaction_id, SentDate,agcpy ,transid FROM tblIssue where (  sent_mode='vpp' AND despatch =".$g." AND vername =".$print_issue." ) order by cast(VPNo as unsigned) ";


$result_all = $conn_all->query($sql_all);
$m=0;
if ($result_all->num_rows > 0) {
	// output data of each row

    while($row = $result_all->fetch_assoc()){
           
     
 
$arr_vp[$m]=$row["VPNo"];
$arr_name[$m]= id_name($row["transid"]) ; 
  $m++;      

$flag=1;
}
    
} else {
  $flag=0;
}
$conn_all->close();
 
  $half_val=ceil(sizeof($arr_vp)/2);
  if($flag!=0){ 
echo '<div class="page">
  <div class="row">
    <div class="col-sm-6"> <br>
        <div style="text-align:center;">
            <span style="font-size:15  px;position: absolute;top: 8px;right: 25px;"> ভিপিপি-'.$g.'</span>
			<h6> ঢাকা সদর  </h6>
            <h6> পি ব্যাগ নং-</h6>
            <h6> ঢাকা এমএন্ড/এস ও/৩</h6>
        </div>		
        <table style="width:100%" >
            <tr>
                <th>#</th>
                <th>ভিপিপি</th>
                <th>নাম</th>
                <th>#</th>
                <th>ভিপিপি</th>
                <th>নাম</th>
            </tr>';
                    }

            for($b=1;$b<=$half_val;$b++){
                echo '
                    <tr>
                        <td>'.$b.'</td>
                        <td>'.intval(substr($arr_vp[$b-1],2)).'</td>
                        <td style="text-align:left;">'.$arr_name[$b-1].'</td>
                        <td>'.intval($b+$half_val).'</td>
                        <td>'.intval(substr($arr_vp[$half_val+$b-1],2)).'</td>
                        <td style="text-align:left;">'.$arr_name[$half_val+$b-1].'</td>
                    </tr>';
            }
            
            if($flag!=0){
            echo '
            
        </table><br>
        <div>
            <p style="font-weight:bolder;">সর্বমোট: ভিপিপি '. $banglaNumber->engToBn(sizeof($arr_vp)).'টি ('. $banglaNumber->numToWord(sizeof($arr_vp)) .'টি) মাত্র।</p>
        </div>
    </div>

    <div class="col-sm-6"> <br>
        <div style="text-align:center;">
            <span style="font-size:15px;position: absolute;top: 8px;right: 25px;"> ভিপিপি -'.$g.'</span>
            <h6> ঢাকা সদর </h6>
            <h6> পি ব্যাগ নং-</h6>
            <h6> ঢাকা এমএন্ড/এস ও/৩</h6>
        </div>			
		<table style="width:100%" >
            <tr><th>#</th><th>ভিপিপি</th><th>নাম</th><th>#</th><th>ভিপিপি</th><th>নাম</th></tr>';	        
            }
                
                for($b=1;$b<=$half_val;$b++){
            if($flag!=0){
                    echo '
                    <tr><td>'.$b.'</td><td>'.intval(substr($arr_vp[$b-1],2)).'</td><td style="text-align:left;" >'.$arr_name[$b-1].'</td><td>'.intval($b+$half_val).'</td><td>'.intval(substr($arr_vp[$half_val+$b-1],2)).'</td><td style="text-align: left;">'.$arr_name[$half_val+$b-1].'</td></tr>
                    ';}
            }
            
            if($flag!=0){
            echo '
        </table><br>
		<div>        
            <p style="font-weight:bolder;">সর্বমোট: ভিপিপি '. $banglaNumber->engToBn(sizeof($arr_vp)).'টি ('. $banglaNumber->numToWord(sizeof($arr_vp)) .'টি) মাত্র।</p>
        </div>
	</div>
  </div>



</div>
';


      


   }


 
$arr_vp=null;
$arr_name=null;
} 
?>




 

</body>
</html>

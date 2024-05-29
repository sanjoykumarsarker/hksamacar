<?php

//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

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

        font-size:16px;
        orientaion:portrait;
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
  text-align:center;
    font-size:16px;
    border: 0px solid black;
    border-collapse: collapse;
}
th, td {
  width: 50px;
    
    padding: 0px;
    text-align: center;
}

 
        @page {

                    font-size:16px;

            size:portrait;

           page-break-after: always; 
        }
    


</style>

<body >
<?php 

include_once "function.php";
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
    // echo "0 results";
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
   $sql_all = "SELECT transid,vername,VPNo,transaction_id, SentDate,agcpy ,transid FROM tblIssue where (sent_mode='rp'   AND despatch =".$g." AND vername =".$print_issue." ) order by cast(VPNo as unsigned) ";


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
   // echo "0 results";
}
$conn_all->close();
 
  $half_val=ceil(count((array)$arr_vp)/8);  //count((array)$XYZVariable)
 if($flag!=0){
echo '
<div class="page">


  <div class="row">
    <div style="text-align:center;" class="col-sm-6"  > <br>
        <div style="text-align:center;">
        <span style="font-size:16px; position: absolute;top: 8px;right: 80px;"> আর পি সেট- '.$g.'</span>  
      <h6> ঢাকা সদর </h6>
		<h6> আর পি ব্যাগ-</h6>
		<h6> ঢাকা এম এন্ড এস ও  <br> আর পি সেট </h6></div>
      <br>
		<table width="80%" style="margin: 0 auto; border:0px solid;text-align:center"  >
		<tr> <th>RP</th><th>RP</th><th>RP</th><th>RP</th><th>RP</th><th>RP</th><th>RP</th><th>RP</th></tr>
		';
 }

		for($b=1;$b<=$half_val;$b++){
		echo '
            <tr>
         <td>'.intval(substr($arr_vp[$b-1],2)).'</td>  <td>'.intval(substr($arr_vp[$half_val+$b-1],2)).'</td> 
            
        <td>'.intval(substr($arr_vp[2*$half_val+$b-1],2)).'</td> <td>'.intval(substr($arr_vp[3*$half_val+$b-1],2)).'</td> 
            
          <td>'.intval(substr($arr_vp[4*$half_val+$b-1],2)).'</td>  <td>'.intval(substr($arr_vp[5*$half_val+$b-1],2)).'</td> 
            
            <td>'.intval(substr($arr_vp[6*$half_val+$b-1],2)).'</td>  <td>'.intval(substr($arr_vp[7*$half_val+$b-1],2)).'</td> 
            
            </tr>
                     ';}
                     

                     if($flag!=0){

		echo '
		
            </table><br>
            


        
		<div style="text-align:center;">
			<p>মোট: '.number_en_bn(sizeof($arr_vp)).'টি মাত্র</p></div>
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

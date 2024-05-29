<?php
session_start();
  $print_issue=$_SESSION["print_issue"];


 
 
?>

<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Courier Summary</title>
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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>
  
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
   
 
</head>

<style>

    .page {

        page-break-after: always;

        orientation:landscape;
                width: 10.27in;
        min-height: 11.69in;
        padding: 10px 10px 20px 10px;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0);
    }
	
	
table,th, tr, td {
    border: 0.5px solid black;
    border-collapse: collapse;
}
tr, th, td {
    padding: 0px 0px 0px 0px;
    text-align: Center;
}
tr:nth-child(even) {background-color: ;}

 @media print {
        @page {

            size: landscape;
            
            page-break-after: always;
        }
    }


</style>

<body >

<div class="page">
<div style="text-align:center;">
<h5> মাসিক হরেকৃষ্ণ সমাচার - QS <?php echo $print_issue;?></h5></div>


<table style="width:100%" >
<tr><th>SL</th> <th>নাম</th><th>Barcode</th><th>মোবাইল</th><th>পরি.</th><th>কন্ডি.</th><th>প্রাপ্ত</th><th>তারিখ </th><th>কুরিয়ার</th><th style="width:1.0in">রসিদ</th></tr>
<?php 

include "function.php";
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

 
  

// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");
  $sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo,sent_mode FROM tblIssue  where (vername=".$print_issue.") AND (transid<99)AND(transid>0) order by sent_mode asc ";
$result_all = $conn_all->query($sql_all);
$p=1;
if ($result_all->num_rows > 0) {
    // output data of each row
      while($row = $result_all->fetch_assoc()){
 echo '
 <tr><td>'.$p.'</td><td style="text-align:left">'.id_name($row["transid"]).'
 ('.$row["transid"].')</td>
 
 <td> <svg style="width:170px;height:60px;" id="s'.$row["transaction_id"].'" >
    
 </svg> </td>
 
 <td>'.id_phone($row["transid"]).'</td>
 <td > '.$row["agcpy"].'</td>
 <td>'.intval(doubleval($row["agcpy"])*doubleval(id_news_rate($row["transid"]))).'</td>
  
 <td style="width:0.7in"></td> 
 <td style="width:0.7in"></td> 
 

 <td style="width:1.0in">'.id_cour_name($row["transid"]).'-'.id_courier_description($row["transid"]).'</td>
 <td style="width:0.7in">'.$row["VPNo"].'</td>

 </tr>





















 
           
 
 
 


<script> JsBarcode("#s'.$row["transaction_id"].'", "'.$row["transaction_id"].'");</script>


 

 ';
      
$p++;
   
}
}

$conn_all->close();
   
 
?>		
</table>
</div> <!-- end of container -->

</body>
</html>
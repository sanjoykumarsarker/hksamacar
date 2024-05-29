<?php session_start();?>
<!DOCTYPE html>
<html>
<head>



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
        width: 11.69in;
        min-height: 8.27in;
        padding: 0px 10px 10px 10px;
        margin: 1cm auto;
       
        background: white;
     }
	
	
table,th, tr, td {
    border: 0.5px solid black;
    border-collapse: collapse;
}
tr, th, td {
    padding: 0px 0px 0px 0px;
    text-align: Center;
}
tr:nth-child(even) {background-color: #f2f2f2;}

 @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

table td input {
 width: 100%;   height: 100%;
}
</style>

<script>    


function direct_total(){
 
  document.getElementById('total_direct').value=  
 
  (parseInt(document.getElementById('paper_total').value)||0)+
  (parseInt(document.getElementById('printing_total').value)||0)+
  (parseInt(document.getElementById('binding_total').value)||0)+
  (parseInt(document.getElementById('layout_total').value)||0)+
  (parseInt(document.getElementById('transport_total').value)||0)+
  (parseInt(document.getElementById('others_total').value)||0)
 ;
}



function indirect_total(){
 
 document.getElementById('total_indirect').value=  

 


 (parseInt(document.getElementById('postage_details_i').value)||0)+
 (parseInt(document.getElementById('transport_details_i').value)||0)+
 (parseInt(document.getElementById('others_details_i').value)||0) 
;
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


<body >
<?php  

$issue=$_POST["issue"];


 
	


 
 
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

 // Create connection
 $conn_all = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_all->connect_error) {
     die("Connection failed: " . $conn_all->connect_error);
 }
 mysqli_set_charset($conn_all,"utf8");
 $sql_all = "SELECT date,quantity,wastage FROM products  where issue=".$issue."";
 $result_all = $conn_all->query($sql_all);
 
 if ($result_all->num_rows > 0) {
     // output data of each row
    $row = $result_all->fetch_assoc();
            
 $GLOBALS["date"]= $row["date"];
     
 
 $GLOBALS["quantity"]= $row["quantity"];
 $GLOBALS["wastage"]= $row["wastage"];   
 } else {
 
 }
 $conn_all->close();
 
 
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

 

$sql_all = "SELECT details,
qty,
voucher,
date,
total,
ip,
status,
user,
type,
comments,
id,
date_time,
category,
issue,received_date,received_qty,wastage  FROM cost_accounting WHERE 
 issue= '".$issue."'";
$result_all = $conn_all->query($sql_all);

//if ($result_all->num_rows > 0) {

  mysqli_data_seek($result_all, 0);

  $row = $result_all->fetch_assoc();
    // output data of each row

    echo '
    
    <div class="page">
<div style="text-align:center;">

 
 


<form class=""   method="post"  action="inventory_cost_data.php">

<h3 style="text-align: center;">Issue   '.$issue.'</h3> <br> 
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Received QTY</label>
      <input class="form-control" type="text" name="received_qty" value="'. $GLOBALS["quantity"].'"class="form-control" id="validationCustom01" required>
	  <div class="invalid-feedback">Please provide valid data.</div>
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Received Date</label>
      <input class="form-control"   type="date" name="received_date" value="'. $GLOBALS["date"].'" class="form-control" id="validationCustom02" required>
	  <div class="invalid-feedback">Please provide valid data.</div>
    </div>
	<div class="col-md-4 mb-3">
      <label for="validationCustom03">Others (Wastage/Lost</label>
      <input class="form-control" type="text" class="form-control" name="wastage" value="'. $GLOBALS["wastage"].'" id="validationCustom03" required>
	  <div class="invalid-feedback">Please provide valid data.</div>
    </div>
  </div>
    
    
    
    <table     class="table table-bordered" style="width:100%" >
<tr><td colspan="6">Direct Cost</td></tr>
<tr><th></th><th>Details</th><th>QTY</th><th>Voucher No</th><th>Date</th><th>Total</th></tr>';

    mysqli_data_seek($result_all, 0);

    $row = $result_all->fetch_assoc();

     
   echo '   

<tr><td>Paper</td><td><input class="form-control" type="text" name="paper_details" value="'.$row["details"].'"  /></td><td><input class="form-control" type="text" name="paper_qty" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="paper_vouch" value="'.$row["voucher"].'" /></td><td><input class="form-control" type="text" name="paper_date" value="'.$row["date"].'"  /></td><td><input class="form-control" type="text" id="paper_total" onkeyup="direct_total()"  name="paper_total" value="'.$row["total"].'"   /></td></tr>
';
mysqli_data_seek($result_all, 1);

$row = $result_all->fetch_assoc();
echo '   

 
<tr><td>Printing</td><td><input class="form-control" type="text" name="printing_details" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="printing_qty" value="'.$row["qty"].'" /></td><td><input class="form-control" type="text" name="printing_vouch" value="'.$row["voucher"].'" /></td><td><input class="form-control" type="text" name="printing_date" value="'.$row["date"].'" /></td><td><input class="form-control" type="text"  onkeyup="direct_total()"  id="printing_total"  name="printing_total" value="'.$row["total"].'" /></td></tr>
';
mysqli_data_seek($result_all, 2);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Binding</td><td><input class="form-control" type="text" name="binding_details" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="binding_qty" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="binding_vouch" value="'.$row["voucher"].'" /></td><td><input class="form-control" type="text" name="binding_date" value="'.$row["date"].'" /></td><td><input class="form-control" type="text"  onkeyup="direct_total()"  id="binding_total" name="binding_total" value="'.$row["total"].'" /></td></tr>
';
mysqli_data_seek($result_all, 3);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Layout</td><td><input class="form-control" type="text" name="layout_details" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="layout_qty" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="layout_vouch" value="'.$row["voucher"].'"  /></td><td><input class="form-control" type="text" name="layout_date" value="'.$row["date"].'" /></td><td><input class="form-control" type="text"  onkeyup="direct_total()"   id="layout_total" name="layout_total" value="'.$row["total"].'"  /></td></tr>
';
mysqli_data_seek($result_all, 4);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Transport</td><td><input class="form-control" type="text" name="transport_details" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="transport_qty" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="transport_vouch" value="'.$row["voucher"].'"  /></td><td><input class="form-control" type="text"  name="transport_date" value="'.$row["date"].'"/></td><td><input class="form-control" type="text"  onkeyup="direct_total()"   id="transport_total" name="transport_total" value="'.$row["total"].'"  /></td></tr>
';
mysqli_data_seek($result_all, 5);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Others</td><td><input class="form-control" type="text" name="others_details" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="others_qty" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="others_vouch" value="'.$row["voucher"].'"  /></td><td><input class="form-control" type="text" name="others_date" value="'.$row["date"].'" /></td><td><input class="form-control" type="text" onkeyup="direct_total()"  id="others_total"  name="others_total" value="'.$row["total"].'"  /></td></tr>
';
mysqli_data_seek($result_all, 9);

$row = $result_all->fetch_assoc();
echo '   

<tr><td colspan="5">Total </td><td ><input class="form-control" type="text"id="total_direct" value="'.$row["total"].'"  name="total_direct" > </td></tr>
';
 
echo '   

<tr><td colspan="6">Indirect Cost</td></tr>
';
mysqli_data_seek($result_all, 6);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Postage</td><td><input class="form-control" type="text"   name="postage_details_i" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="postage_qty_i" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text"  name="postage_vouch_i" value="'.$row["voucher"].'"  /></td><td><input class="form-control" type="text"  name="postage_date_i" value="'.$row["date"].'" /></td><td><input class="form-control" type="text" name="postage_total_i" onkeyup="indirect_total()"  value="'.$row["total"].'" id="postage_details_i" /></td></tr>
';
mysqli_data_seek($result_all, 7);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Transport</td><td><input class="form-control" type="text"  name="transport_details_i" value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="transport_qty_i" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="transport_vouch_i" value="'.$row["voucher"].'"   /></td><td><input class="form-control" type="text"  name="transport_date_i" value="'.$row["date"].'"/></td><td><input class="form-control" type="text"  onkeyup="indirect_total()"   name="transport_total_i" value="'.$row["total"].'"   id="transport_details_i"  /></td></tr>
';
mysqli_data_seek($result_all, 8);

$row = $result_all->fetch_assoc();
echo '   

<tr><td>Others</td><td><input class="form-control" type="text" name="others_details_i"  value="'.$row["details"].'" /></td><td><input class="form-control" type="text" name="others_qty_i" value="'.$row["qty"].'"  /></td><td><input class="form-control" type="text" name="others_vouch_i" value="'.$row["voucher"].'"    /></td><td><input class="form-control" type="text" name="others_date_i" value="'.$row["date"].'" /></td><td><input class="form-control" type="text" name="others_total_i" onkeyup="indirect_total()"  value="'.$row["total"].'"   id="others_details_i" /></td></tr>
';
 
mysqli_data_seek($result_all, 10);

$row = $result_all->fetch_assoc();
echo '   

<tr><td colspan="5">Total</td><td   >  <input class="form-control" type="text"id="total_indirect" value="'.$row["total"].'"  name="total_indirect" >  </td></tr>

';

 

    echo '
    </table>';
    
 
$conn_all->close();

                    ?>



<br>
<div>
  <div class="form-group">
    <div class="form-check">
      <input   class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Are you sure to submit the form?
      </label>
      <div class="invalid-feedback">You must agree before submitting.</div>
    </div>
  </div>
  
  <input    type="hidden"   name="issue" value="<?php echo $issue;?>">
<button type="submit" class="btn btn-success btn-xs" type="submit"> Update</button></div>
</div> <!-- end of container -->
</form>
</body>
</html>
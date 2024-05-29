<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Invoice Enquiry</title>


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

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";


date_default_timezone_set("Asia/Dhaka");
  $date= intval(date("Ymd"));
// Create connection

?> 




<?php
 

 // Create connection
 $conn_trans_id = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_trans_id->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 mysqli_set_charset($conn_trans_id,"utf8");
 $sql_id = "SELECT MAX(transaction_id)as maxid FROM tblIssue where (transaction_id IS NOT NULL)AND(transaction_id LIKE '".$date."1_____') ";
 $result_id = $conn_trans_id->query($sql_id);
 
 if ($result_id->num_rows > 0) {
     // output data of each row
     $row = $result_id->fetch_assoc();
     $row["maxid"];
     if($row["maxid"]!=""){
         $GLOBALS['maxtransid']= intval(substr($row["maxid"],0,12)."00")+100;
            ; 
     }
     else{
        $GLOBALS['maxtransid']=$date."1"."001"."00";
        ; 
     }
    
 } else {
       $GLOBALS['maxtransid']=$date."1"."001"."00";
       
       echo "new"; 
 }
 $conn_trans_id->close();
 ?> 




<div class="container-fluid">

<div class="row" style= "height: 100%;" >

<div id="wrapper" class="col-md-2 col-xl-2">

<?php include_once "hks_sidebar.php" ;   ?>
<?php include_once "hks_user.php" ;   ?>

<div class="col-md-10 col-xl-10"> 
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
              <p class="well lead" style="margin-top: 30px;" > Invoice Enquiry </p>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 contact-form"> <!-- div da direita -->
                 
						
						
						
						
						
						<div class="row">
				<div class="col-12">
				<form id="contact"  target="cash_receive_barcode_iframe" action="cash_receive_barcode_iframe.php"  method="post" class="form" role="form">
          <input class="form-control" id="inputrazaosocial" name="ag_barcode" placeholder="Scan Barcode to record Courier Data" type="text" required />
        </form>
        </div>

			</div>
      	<hr style="border-top: 0.5px dotted blue; margin-top: 0.35em;  margin-bottom: 0.35em;">
			<div class="table-responsive">
			  <iframe name="cash_receive_barcode_iframe" height="250" width=100%  style="border:0" style="overflow-y:scroll; overflow-x:scroll;"></iframe>
			  </div>
						
						
						
						
						
						
						<hr>
						<p class="well lead" style="margin-top: 10px;" > Search and Edit in Invoice </p>
						<form id="ag_submit" method="post" class="form" role="form" target='iframe_inv_retail_search'  action="hks_inv_retail.search.php">
						<div class="row" style="background-color: ;">
							<div class="col-5 form-group">
								<input class="form-control" id="ag_input" name="ag_search" placeholder="Type  to Search" type="text"  onkeyup=""/>
							</div>
							<div class="col-3 form-group">
								<input class="form-control" id="ag_input2" name="date_from"  type="date"  onkeyup=""/>
							</div>
							<div class="col-3  form-group">
								<input class="form-control" id="ag_input3" name="date_to"  type="date"  onkeyup=""/>
							</div>
							<div class="col-1 form-group">
								<button  class="btn btn-danger"  type="submit"> OK</button>
							</div>
						</div>
						</form>
                    </div> <!-- fim div da direita -->
				  
				  			
			
			  
			  
 			
			
				  
                </div> <!-- fim div da esquerda -->
           
			
			 </div>



				
			</div>
		
	        <iframe name='iframe_inv_retail_search' height="300" width="100%" scrolling="yes" style="border:0"></iframe> 

		            </div>
          </div>
        </div>
    </div>
      



</div>




</div> <!-- end of row -->

</div> <!-- end of container -->

</body>
</html>
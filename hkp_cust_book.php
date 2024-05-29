<?php session_start();?>
<?php
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

?> 
<!DOCTYPE html>
<html>
<head>

<title>Agent Book</title>


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
<script>
function agBookSearch() {
	document.getElementById("ag_submit").submit();

 
}

</script>
<body>

<div class="container-fluid">

<div class="row" style= "height: 100%;" >

<div id="wrapper" class="col-md-2 col-xl-2">
<?php include_once "hks_sidebar.php" ; ?>
<?php include_once "hks_user.php" ; ?>

<div class="col-md-10 col-xl-10">
    <div id="page-content-wrapper">
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 contact-form">
                        <form id="ag_submit" method="post" class="form" role="form" target='iframe_ag_book'  action="ag_book_search.php">
                            

                                <div class="input-group" style="text-aling: right; padding: 0px 0px 0px 0px">
								
									<select class="col-3 custom-select" id="id_district" name="ag_dist" onchange=""  >
										<option value =" " >District</option>
<?php

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, district_name FROM districts order by district_name asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<option value =".$row['id'].$row['district_name'].">".dist_en_bn($row['id'].$row['district_name'])."</option>"; 
    }
 } else {
 }
$conn->close();

?>
								</select>   &nbsp                                              
                                <input class="col-6 form-control" id="ag_input" name="ag_search" placeholder="Type  to Search" type="text"  onkeyup="agBookSearch0000()" autofocus /> &nbsp                                 
                                <span class="col-3 input-group-btn">
										<button class="btn btn-primary" type="submit" name="type" value="Active" >Active</button> 
								        <button class="btn btn-danger" type="submit" name="type" value="Inactive" >Inactive</button>
										<button class="btn btn-warning" type="submit" name="type" value="All" >All</button>
								</span>
                                </div>

                        </form>
                    </div> <!-- fim div da direita -->
					 
                </div> <!-- fim div da esquerda -->
				
				<iframe name='iframe_ag_book' height="500px" width=100%   style="border:0"></iframe>
					 		<hr style="border-top: 0.5px dotted green; margin-top: 0.35em;  margin-bottom: 0.35em;">
				<iframe name='iframe_ag_book_individual_summary' height="0px" width=100%   style="border:0"></iframe>
            
			<div class="row" >									
					<table class="table table-condensed" >
						<tr>
							<th>Date</th>
							<th>TRN ID</th>
							<th>Title</th>
							<th>Invoice Amount</th>
							<th>Paid</th>
							<th>Due</th>
							<th>Action</th>
						</tr>
						<tr>
							<td>2019-05-23</td>
							<td> <a href=""> 2019052310005 </a></td>
							<td>Invoice (Cash Sale)</td>
							<td>1000.00</td>
							<td>1000.00</td>
							<td>-</td>
							<td><button type="button" class="btn btn-danger btn-xs">Edit</button>
							<button type="button" class="btn btn-primary btn-xs">Reprint</button>
							<button type="button" class="btn btn-success btn-xs">Make Payment</button></td>
						</tr>
						<tr>
							<td>2019-05-25</td>
							<td> <a href=""> 2019052310005 </a></td>
							<td>Invoice (Due)</td>
							<td>1000.00</td>
							<td>500.00</td>
							<td>500.00</td>
							<td><button type="button" class="btn btn-danger btn-xs">Edit</button>
							<button type="button" class="btn btn-primary btn-xs">Reprint</button>
							<button type="button" class="btn btn-success btn-xs">Make Payment</button></td>
						</tr>
						<tr>
							<td>2019-06-28</td>
							<td> <a href=""> 2019052310005 </a></td>
							<td>Due Payment</td>
							<td>-</td>
							<td>500.00</td>
							<td>-</td>
							<td><button type="button" class="btn btn-danger btn-xs">Edit</button>
							<button type="button" class="btn btn-primary btn-xs">Reprint</button>
							<button type="button" class="btn btn-success btn-xs">Make Payment</button></td>
						</tr>
					</table>
			</div>
			
			
			</div>
 

			 
			</div>
          </div>
        </div>
    </div>
      



</div>




</div> <!-- end of row -->

</div> <!-- end of container -->

</body>
</html>
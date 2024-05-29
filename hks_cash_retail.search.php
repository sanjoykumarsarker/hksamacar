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

</style>

</head>
 
<body>
 <!-- The Modal -->
 <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
			<iframe name='ag_book_action_mod' height="130%" width="100%" scrolling="YES" style="border:0"></iframe> 
		</div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>



<div class="table-responsive">
			<table   class="table table-bordered table-sm table-hover">
			  <thead>
				<tr>
					<th>Transaction ID</th>
					<th>Name</th>
					<th>Mobile</th>
                    <th>Total Donation</th>
					<th>Date</th>

					<th>Action</th>
				</tr>
			  </thead>
		      <tbody>
				 
<?php

$search=$_POST['ag_search'];
 
$date_from=$_POST['date_from'];

$date_to=$_POST['date_to'];

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
$sql_all = "SELECT transaction_id,Rdate FROM tblIssue  where  
  
     ((transaction_id  LIKE '%$search%' and transaction_id is not null and transaction_id <> '') and ( STR_TO_DATE(Rdate, '%Y-%m-%d') >='$date_from' and STR_TO_DATE(Rdate, '%Y-%m-%d') <='$date_to' ) )  order by STR_TO_DATE(Rdate, '%Y-%m-%d') ";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
    // output data of each row
    while($row = $result_all->fetch_assoc()){
           

echo '<tr>
<form method ="post" target="iframe_ag_book_individual_summary" action="ag_book_individual_summary.php">

<td>'.$row["transaction_id"].'</td>
<td>'.$row["cust_name"].'</td>
<td>'.$row["phone"].'</td>
<td>'.$row["total_donation"].'</td>
<td>'.$row["Rdate"].'</td>

<td>
<button class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: green;" class="fas fa-pencil-square"></i></button>
<button class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: tomato;" class="fas fa-print"></i></button>
<button class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: red;" class="fas fa-times-circle"></i></button>
</td>

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
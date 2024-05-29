<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Monthly COB</title>


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
              <p class="well lead" style="margin-top: 5px;" > Insert Monthly COB </p>
            <div class="container">
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-12 contact-form"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" action="cob_month_data.php" target="iframe_producats_mod" role="form">
                            <div class="row">
								<div class="col-md-3 form-group">
                                    <input class="form-control" id="inputrazaosocial" name="date_start" type="date" />
                                </div>
                                <div class="col-md-3 form-group">
                                    <input class="form-control" id="inputrazaosocial" name="date_end" type="date" />
                                </div>
								<div class="col-md-3 form-group">
                                    <input class="form-control" id="inputrazaosocial" name="hks_issue" placeholder="COB ID" type="text" required />
                                </div>

								<div class="col-md-3 form-group">
                                    <Button class="form-control btn btn-danger" id="inputrazaosocial" placeholder="Include" type="submit" >Include </button>
                                </div>
							</div>
							
                        </form>
                    </div> <!-- fim div da direita -->

                </div> <!-- fim div da esquerda -->
            </div>
			<hr>
	 
      <table class="table table-bordered">
      			  <thead>
        <tr><th  rowspan="2">COB</th><th rowspan="2">Start Date</th>
		<th  rowspan="2">End Date</th> <th colspan="2">Total Cash In</th>
		<th colspan="12"  style="text-align: center;" >Total Cash Out </th><th  rowspan="2">Balance</th>
		<th rowspan="2" >Status</th><th  rowspan="2"  >Action</th></tr>
<tr>
        <th>HKS</th>
        <th>HKP</th>
		<th>Devotee</th>
		<th>Postage</th>
		<th>Travelling</th>
		<th>Printing</th>
		<th>Paper</th>		
		<th>Entertainment</th>
		<th>Internet</th>
		<th>Book</th>
		<th>Legal Fee</th>
		<th>Repair</th>
		<th>Misc.</th>
		<th>Asset Purchase</th>
    </tr>
			  </thead>
        <tbody>	 
        <?php

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";


$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
 die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");
$sql_all = "SELECT date_start,date_end,id,status,comments,user from cob_month";




$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
 // output data of each row
 while($row = $result_all->fetch_assoc()){
 
echo '
<tr>

<form  method="post" target="myframe" action="inventory_cost.php">

<input type="hidden" name="issue" value="'.$row["id"].'">


<td><button  class="btn btn-info" type="submit"> '.$row["id"].'</button></td>
</form>
 
<form  method="post" target="myframe" action="cob_month_update_data.php">
<input type="hidden" name="issue" value="'.$row["id"].'">
<td>'.$row["date_start"].'</td>
<td>'.$row["date_end"].'</td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> <input class="form-control" type="status" name="status" value="'.$row["status"].'"></td>
<td> <button  class="btn btn-danger" type="submit"> Update</button></td>

</tr>

</form>

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
			<hr>
      <iframe name='myframe' height="600" width="100%" scrolling="yes" style="border:0"></iframe> 

			</div>
          </div>
        </div>
    </div>
      



</div>




</div> <!-- end of row -->

</div> <!-- end of container -->
      <iframe name='myframe' height="200" width="100%" scrolling="yes" style="border:0"></iframe> 

</body>
</html>
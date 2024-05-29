<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Products</title>


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

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog  ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <iframe name='iframe_producats_mod' height="200" width="100%" scrolling="yes" style="border:0"></iframe> 

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

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
              <p class="well lead" style="margin-top: 50px;" > Insert Product Version </p>
            <div class="container">
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-8 contact-form"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" action="hks_products_data.php" target="iframe_producats_mod" role="form">
                            <div class="row">
								<div class="col-xs-3 col-md-3 form-group">
                            <input class="form-control" id="inputrazaosocial" name="hks_date" placeholder="Date" type="date" />
                                </div>
								<div class="col-xs-3 col-md-3 form-group">
                                    <input class="form-control" id="inputrazaosocial" name="hks_issue" placeholder="Issue" type="text" />
                                </div>
								<div class="col-xs-3 col-md-3 form-group">
                                    <input class="form-control" id="inputrazaosocial" name="hks_qty" placeholder="Quantity" type="text" />
                                </div>

                               
								<div class="col-xs-2 col-md-2 form-group">
                                    <Button class="form-control btn btn-danger" id="inputrazaosocial" data-toggle="modal" data-target="#myModal" placeholder="Include" type="submit" >Include </button>
                                </div>
							</div>
							
                        </form>
                    </div> <!-- fim div da direita -->
		 
                </div> <!-- fim div da esquerda -->
            </div>
			<hr>
	 
			<table class="table table-bordered table-sm table-hover">
			  <thead>
        <tr><th  rowspan="2">Issue</th><th rowspan="2">Received QTY</th><th  rowspan="2">Date</th><th  rowspan="2">Cost PU</th><th  rowspan="2">Price PU</th><th colspan="3" >Disbursement</th><th  rowspan="2">Stock</th><th colspan="2" >Total Cost</th><th colspan="2" >Sales</th><th  rowspan="2">Balance</th> <th   rowspan="2">Status</th><th  rowspan="2"  >Action</th></tr>
<tr>
        <th>Sale</th>
        <th>Speci</th>
        <th>Others</th>
        <th>Direct</th>
		<th>Indirect</th>
		<th>Cash</th>
		<th>Due</th>
    </tr>
			  </thead>
        <tbody>
					 
           <?php


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
$sql_all = "SELECT date,(select sum(agcpy)    from  tblIssue ti where ti.vername=pd.issue and ti.transid<10000 ) as nr,

(select sum(agcpy)    from  tblIssue ti where ti.vername=pd.issue  ) as sale,
(select sum(Specimen)    from  tblIssue ti where ti.vername=pd.issue  ) as Specimen,

(select sum(Dr)    from  tblIssue ti where ti.vername=pd.issue  ) as Dr,
(select sum(due)    from  tblIssue ti where ti.vername=pd.issue  ) as due,

(select sum(total)    from  cost_accounting   ti where ti.issue=pd.issue  and category='direct' ) as direct,
(select sum(total)    from  cost_accounting   ti where ti.issue=pd.issue  and category='indirect' ) as indirect,

(select sum(news_price)    from  tblIssue ti where ti.vername=pd.issue and  ti.transid<10000 ) as np,
issue,quantity,status,wastage from products pd ";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
 // output data of each row
	$ppp=0;
	while($row = $result_all->fetch_assoc()){
		if($row["nr"]>0){
			$ppp=round(($row["np"])/doubleval($row["nr"]),2);

		}else {$ppp=0;}
echo '
<tr>

<form  method="post" target="myframe" action="inventory_cost.php">

<input type="hidden" name="issue" value="'.$row["issue"].'">


<td><button  class="btn btn-info" type="submit"> '.$row["issue"].'</button></td>
</form>
 
<form  method="post" target="myframe" action="product_update_data.php">

<td>'.$row["quantity"].'</td>

<td>'.$row["date"].'</td>
<td>'.round((doubleval($row["direct"])+doubleval($row["indirect"]))/doubleval($row["quantity"]),2).'</td>
<input type="hidden" name="issue" value="'.$row["issue"].'">
<td> '.round($ppp,2).'</td>
<td>'.doubleval($row["sale"]).'</td>
<td>'.doubleval($row["Specimen"]).' </td>

<td>'.doubleval($row["wastage"]).' </td>
<td>'.doubleval(doubleval($row["quantity"])-doubleval($row["sale"])-doubleval($row["Specimen"])



-doubleval($row["wastage"])).' </td>
<td>'.doubleval($row["direct"]).' </td>
<td>'.doubleval($row["indirect"]).' </td>
<td>'.doubleval($row["Dr"]).' </td>
<td>'.round(doubleval($row["np"])-doubleval($row["Dr"]),2).' </td>
<td>'.round(doubleval($row["Dr"])-doubleval($row["direct"])-doubleval($row["indirect"]),2).' </td>

<td> <input  class="form-control" type="status" name="status" value="'.$row["status"].'"></td>

<td><button  class="btn btn-danger" type="submit"> Update</button></td>


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

<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Cash Book</title>


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
function send_newspaper_individual_data(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("id_search").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("id_search").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "id_search_data.php?q="+str, true);
  xhttp.send();   
}
</script>
<body>

<?php
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

?> 






<div class="container-fluid">

<div class="row" style= "height: 100%;" >

<div id="wrapper" class="col-md-2 col-xl-2">

  <?php include_once "hks_sidebar.php" ;   ?>

<div class="col-md-10 col-xl-10"> 
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
              <p class="well lead" style="margin-top: 5px;" > Daily Cash Scroll </p>
            <div class="col-sm-12 col-md-12  contact-form" >
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-12 contact-form" style="background-color: cornsilk;"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" id="txt1"  action="" role="form">
                          
							<div class="row" style="background-color: cornsilk; padding: 10px 0px 0px 0px">
								<div class="col-xs-2 col-md-2 form-group">
									<label style="font-size: 18px; font-weight: bold;">Date Range</label>
                                </div>
								<div class="col-xs-3 col-md-3 form-group">									
									<input class="form-control" id="inputcidade" name="from_date" placeholder="From Date" required type="date" />
                                </div>
								
								<div class="col-xs-3 col-md-3 form-group">									
									<input class="form-control" id="inputcidade" name="to_date" placeholder="To Date" required type="date" />
                                </div>
								<div class="col-xs-4 col-md-4 form-group" style="text-aling: right; padding: 0px 0px 0px 0px">
							
              									<button class="btn btn-danger" type="submit" value="Individual" >Summary</button>
												<button class="btn btn-info" type="submit"  value="Individual" >Details</button>
 								</div>
							</div>
						
            				</div>
                        </form>
                    </div> <!-- fim div da direita -->
					
                </div> <!--End of Single -->
            </div>
			<hr>
			       
        </div>
        <hr style="background-color: transparent; border: 1px solid red; margin: 0em 0em 0em 0em; " noshade>
    		<div class="row" >									
					<table class="table table-condensed" >
						<tr>
							<th>Date</th>
							<th>TRN ID</th>
							<th>Title</th>
							<th>Ref</th>
							<th>Receive</th>
							<th>Paid</th>
							<th>Balance</th>
						</tr>
						<tr>
							<td>2019-05-23</td>
							<td> <a href=""> 2019052310005 </a></td>
							<td>Cash Sale</td>
							<td>Rasika Kanai Das</td>
							<td>1000.00</td>
							<td>-</td>
							<td>1000.00</td>
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
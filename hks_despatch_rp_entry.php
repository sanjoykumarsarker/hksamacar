<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Post Office & Courier</title>


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
  	<hr>

  <!-- End of Report Print -->
                    <hr>

			        <div class="col-sm-12 col-md-12  contact-form" style="background-color: #ffd7eb;"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" target="hks_vp_entry_iframe" action="hks_despatch_rp_entry_iframe.php" role="form">
                            	<div class="row" style="background-color: #ffd7eb; padding: 10px 0px 0px 0px">
								<div class="col-xs-4 col-md-4 form-group" >
                                <div class="form-group row">
                                    <label for="isn" class="col-sm-6 col-form-label" style="font-size: 18px; font-weight: bold;">  ISSUE NUMBER</label>
                                    <div class="col-sm-6" >
                                    <input type="text" class="form-control" id ="isn" name="issue_no" placeholder="ISSUE NUMBER" required >
                                    </div>
                                </div>
                                </div>
                                <div class="col-xs-4 col-md-4 form-group" >
                                <div class="form-group row">
                                    <label for="isn" class="col-sm-4 col-form-label" style="font-size: 18px; font-weight: bold;">Column No.</label>
                                    <div class="col-sm-8" >
                                    <input type="text" class="form-control" id ="isn" name="column_range" placeholder="Column No." required >
                                    </div>
                                </div>
                                </div>
								 
                                <div class="col-xs-4 col-md-4 form-group" style="padding: 0px 0px 0px 0px">
									<button class="btn btn-danger" type="submit" >SHOW</button>
								</div>
							</div>
							<hr style="background-color: transparent; border: 1px solid red; margin: 0em 0em 0em 0em; " noshade>
						
                        </form>
                    </div> <!-- End of Report Print -->


 			<div class="table-responsive">

                <iframe name="hks_vp_entry_iframe"height="550" width=100%  style="border:0" style="overflow-y:scroll; overflow-x:scroll;"></iframe>



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
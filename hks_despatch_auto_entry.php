<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Despatch (Auto)</title>


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
<body>

<div class="col-sm-12 col-md-12  contact-form" style=""> <!-- div da direita -->
            <div class="row" style="background-color: #8FBC8F; padding: 10px 0px 0px 0px">
            <div class="col  form-group" >
             
            </div>
    
             
            <div class="col  form-group" style="padding: 0px 0px 0px 0px">
            <form id="contact" method="post" class="form" target="_blank" action="hks_despatch_auto_vp_entry.php" role="form">
                <button class="btn btn-info" type="submit" >VP </button>
            </form>
            </div>

            <div class="col  form-group" style="padding: 0px 0px 0px 0px">
            <form id="contact" method="post" class="form" target="_blank" action="hks_despatch_auto_vpp_entry.php" role="form">
                <button class="btn btn-info" type="submit" >VPP </button>
            </form>
            </div>


            <div class="col  form-group" style="padding: 0px 0px 0px 0px">
            <form id="contact" method="post" class="form" target="_blank" action="hks_despatch_auto_rp_entry.php" role="form">
                <button class="btn btn-info" type="submit" >RP </button>
            </form>
            </div>

       


 

        </div>

        </body>

        </html>
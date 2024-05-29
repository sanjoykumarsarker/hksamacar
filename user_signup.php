<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>Devotee Signup Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    <link href="css/login.css" rel="stylesheet">
    
	<script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style type="text/css">
      body {
        padding-top: 30px;
      }

      pbfooter {
        position:relative;
      }

          .form-group .userctrlbox {
    background-color: transparent;   
    border: none;
    color:white;
    margin: 0px 0px 20px 0px;
    border-bottom: 1px solid white;
    height: 20px;
    padding: 0px 0px 0px 0px;
    }

    .form-group > label {
    color: lightgreen;
    font-size: 14px;
    margin: 0px 0px 5px 0px;
    padding: 0px 0px 0px 10px;
    }



    </style>


	   <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	 <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">


</head>

<style>

    .pbfooter {
        position:relative;
    }

</style>

  <body style="background:url('bg.jpg') no-repeat center center; height:700px;">
           
  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top" style="height: 7%;">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="indexn.php"><p style="margin-bottom: 0em;"> Harinam Initiation  by</p>

          <strong style="margin-top: -2em;">H.H. Jayapataka Swami Maharaj </strong></a>
        </div> 
          
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
            </ul>
          </div>
        </div>
    </div>



    <div class="container">
        <div class="row" style="margin-top:350px">


   		<div class="col-lg-offset-4 col-lg-4" >
   			<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
   				<h4 style="color: white;"> Sign Up ! </h4>
   					<form class="cmxform" autocomplete="off" target="iframe1" enctype="multipart/form-data" id="signupForm" method="post" action="insert_user_data.php">
						<fieldset style="text-align:left;"  >
							<p>
                <div class='form-group' >
                    <label class='control-label col-sm-3' for='u_name'>Name: </label>
                      <div class='col-sm-9'>
                      <input class='form-control userctrlbox'  type='text' name='u_name' placeholder="Your Name" required> </div>
                      </div>
                <div class='form-group' >
                     <label class='control-label col-sm-3' for='u_address'>Address: </label>
                        <div class='col-sm-9'>
                        <input class='form-control userctrlbox'  type='text' name='u_address' placeholder="Your Address"  required> </div>
                      </div>
                <div class='form-group' >
                      <label class='control-label col-sm-3' for='u_email'>Email : </label>
                        <div class='col-sm-9'>
                        <input class='form-control userctrlbox'  type='text' name='u_email' placeholder="Your Email" required></div>
                      </div>
                <div class='form-group' >
                      <label class='control-label col-sm-3' for='u_mobile'>Mobile : </label>
                        <div class='col-sm-9'>
                          <input  class='form-control userctrlbox'  type='text' name='u_mobile' placeholder="Your Mobile"  required > </div>
                        </div>
               <div class='form-group' >
                      <label class='control-label col-sm-3' for='permission'>Service : </label>
                        <div class='col-sm-9'>
                          <input  class='form-control userctrlbox'  type='text' name='permission' placeholder="Pls write Service type" required > </div>
                        </div>
							</p>
              <p style="display: none;">
                  <input  type='text' name='username' value="Pls Edit"> 
                  <input  type='text' name='password' value="108"> 
                  <input  type='text' name='u_id' value="Pls Edit"> 
              </p>

              <p style="text-align:center; margin-top: 250px;" >

              <span id="upload-file-info" style="color:white"></span> <br>
                            <label class="btn btn-success" for="my-file-selector"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Upload Image</label>
                                <input id="my-file-selector" type="file" style="display:none" name="myimage"
                                 onchange="$('#upload-file-info').html(this.files[0].name)" accept="image/*"  capture required />


							<button type='submit' onclick="window.location.reload()" class='btn btn-danger'  >
							<i class="fa fa-sign-in" aria-hidden="true"></i> Submit request</button> </p>
						</fieldset>
					</form>
          <p style="color: white;" > You can submit only one request from your pc in 30 minutes.</p>
   			</div>
   		</div>



        </div>
    </div>
<iframe name="iframe1" border="0px" height="0px" width="0px"></iframe>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
  
</body></html>
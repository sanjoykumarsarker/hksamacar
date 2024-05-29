<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>Login Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    <link href="css0/login.css" rel="stylesheet">
    
	<script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <style type="text/css">
      body {
        padding-top: 20px;
      }

      pbfooter {
        position:relative;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
       
  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
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

          <strong style="margin-top: -3em;">H.H. Jayapataka Swami Maharaj </strong></a>
        </div> 
          
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              
            </ul>
          </div>
        </div>
    </div>



    <div class="container">
        <div class="row" style="margin-top:350px">


   		<div class="col-lg-offset-2 col-lg-4" >
   			<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
   				<h4 style="color: white;"> Admin Login </h4>
   					<form class="cmxform" autocomplete="off" id="signupForm" method="Post" action="apanel1.php">
						<fieldset>
							<p>
								<input id="username" name="username" type="text" placeholder="Username">
								<input id="password" name="entrance" type="password" placeholder="Password">
							</p>
							<button type='submit' class='btn btn-danger' >
							<i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
						</fieldset>
					</form>
   			</div>
   		</div>

   		<div class="col-lg-4">
   			<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
   				<h4 style="color: white;"> Devotee Login </h4>
   					<form class="cmxform" autocomplete="off" id="signupForm" method="Post" action="user_dashboard.php">
						<fieldset>
							<p>
								<input id="username" name="username" type="text" autofocus="autofocus"  placeholder="Username">
								<input id="password" name="entrancekey" type="password" placeholder="Password">
							</p>
								<button type='submit' class='btn btn-success' >
								<i class="fa fa-sign-in" aria-hidden="true"></i> Login</button> <a target="_blank" style="color: yellow;" href="#"></a>
						</fieldset>
					</form>
   			</div>
   		</div>



        </div>
    </div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
  
</body></html>
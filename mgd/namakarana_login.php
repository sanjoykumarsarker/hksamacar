<?php
session_start();
   
session_unset();
session_destroy();
session_start();


?>

<?php session_start();?>
<!DOCTYPE html>
<html>
<title>Namankarana Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
<!--web-fonts-->
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}

body {
    background-image: url("rasika_maya.jpg");
    background-color: #cccccc;
}

.bgimg {
    background-image: url ('rasika_tovp.jpg');
    min-height: 100%;
    background-size: cover;
}


.sub-main-w3 input[type="text"],.sub-main-w3 input[type="password"] {
    outline: none;
    font-size: 1.1em;
    padding: 20px 10px 20px 10px;
    border: none;
    font-family: 'Open Sans', Pacifico;
    background: none;
    border-bottom: 2px solid #eee;
    width: 120%;
    color: white;
    font-weight: 600;
}
.sub-main-w3 input[type="submit"] {
	background: url('rasika_arrow.png') no-repeat 30% 45%;
  height: 67px;
  outline: none;
  margin-top: 38px;
	margin-left: 100px;
  border-radius: 50%;
  cursor: pointer;
  border: 2px solid #eee;
  width: 67px;
}
</style>


<script>
$(document).ready(function() {

      if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
           alert('Back button was pressed.');
                window.location='namakarana_login.php';
                return false;
            }
          }
        });

        window.history.pushState('forward', null, './namakarana_login.php');
      }

    });
</script>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
    Gauranga !!!
  </div>
  <div class="w3-display-middle">
    <h1 class="w3-jumbo w3-animate-top" style="font-family:Pacifico; text-align:center;" >Log in !</h1>
   
	<div class="sub-main-w3">

		<form role="form" action="namakarana_dashboard.php" method="POST">
			<input placeholder="Your Name" name="Name-1" class="user" type="text" value="" autofocus> <br>
			<input class="password" placeholder="Enter Password" name="Password-1" type="password"  value="" ><br>
			
			
			<input type="submit" value="" >
		</form>
		
	</div>
  </div>
  
  <div class="w3-display-bottomleft w3-padding-large">
    Not interested. Please <a href="indexn.php" style= "cursor: pointer" > <u> Go Back </u> </a> <br>
    Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" style="cursor: pointer" >@hksamacar</a>
  </div>
</div>
  

		
</body>
</html>
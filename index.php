<?php
session_start();
//$_SESSION = array();
session_unset();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login Panel</title>

  <link rel="shortcut icon" href="favicon1.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <!-- <script async src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

  <link href="css/login.css" rel="stylesheet">

  <style type="text/css">
    body {
      padding-top: 20px;
    }

    .pbfooter {
      position: relative;
    }
  </style>

  <!-- <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"> -->

  <script>
      function disablePrev() {
        window.history.forward()
      }
      window.onload = disablePrev();
      window.onpageshow = function(evt) {
        if (evt.persisted) disableBack()
      }
  </script>
</head>


<body style="background:url('front_images/bg.jpg') no-repeat center center; height:100vh;">

  <div class="container">
    <div class="row" style="margin-top:350px">

      <div class="col-lg-2"> </div>
      <div class="col-lg-4">
        <div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
          <img src="front_images/hklogo.png" height="80" width="80" alt="HKS">
          <h6 style="color: yellow;"> Hare Krishna Samacar </h6>
          <form class="cmxform" autocomplete="off" id="signupForm" method="Post" action="user_redirect.php">
            <fieldset>
              <p>
                <input id="username" name="username" type="text" placeholder="Username">
                <input id="password" name="password" type="password" placeholder="Password">
                <input id="password" name="role" type="hidden" value="hksamacar">


              </p>
              <button type='submit' class='btn btn-danger'>
                <i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
            </fieldset>
          </form>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
          <img src="front_images/HKP.png" height="80" width="80" alt="HKP">
          <h6 style="color:yellow;"> Hare Krishna Publications </h6>
          <form class="cmxform" autocomplete="off" id="signupForm" method="Post" action="hkp_dashboard.php">
            <fieldset>
              <p>
                <input id="username" name="username" type="text" autofocus="autofocus" placeholder="Username">
                <input id="password" name="entrancekey" type="password" placeholder="Password">
              </p>
              <button type='submit' class='btn btn-success'>
                <i class="fa fa-sign-in" aria-hidden="true"></i> Login</button> </a>
            </fieldset>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
</body>

</html>
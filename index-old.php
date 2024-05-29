<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

  <title>Hare Krishna Samacar</title>


  <meta charset="utf-8">

  <link rel="shortcut icon" href="favicon1.ico" />
  <!-- <link rel="stylesheet" href="animate.min.css"> -->


  <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->



  <!-- <link href="css/hkp_slider.css" rel="stylesheet"> -->
  <!-- <script src="js/wow.min.js" type="text/javascript"></script> -->





  <style type="text/css">
    @media (min-width: 992px) {
      .navbar li {
        margin-left: 1em;
      }
    }






    .address p {
      margin-bottom: 20px;
      font-size: 13px;
      line-height: 22px;
      color: #666;
    }

    .input-field .form-control {
      height: 38px;
      margin: 0 auto;
      border-radius: 0px;
      border: 1px solid #DEDEDE;
      box-shadow: none;
      background: #f5f5f5;
      border: none;
      width: 100%;
      height: 50px;
      padding-left: 20px;
      font-weight: 500;
      margin-bottom: 24px;
      border-radius: 0;
    }

    .btn-send {
      line-height: 48px;
      border: 2px solid #47b475;
      background: #47b475;
      color: #fff;
      width: 100%;
      font-size: 11px;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
      border-radius: 0;
      margin-top: 10px;
    }

    .btn-send2 {
      line-height: 20px;
      border: 2px solid #47b475;
      background: #47b475;
      color: #fff;
      font-size: 11px;
      text-transform: uppercase;
      font-weight: bold;
      letter-spacing: 1px;
      border-radius: 0;
      margin-left: 10px;
      margin-bottom: 30px;
    }

    .input-field label {
      color: rgba(237, 28, 36, 0.7);
    }

    .form-group .input-field+.input-field {
      margin-top: 20px;
    }

    .input-field textarea.form-control {
      height: 160px;
      margin: 0 auto;
      box-shadow: none;
    }

    .form-group {
      margin-top: 20px;
    }

    .form-group .btn-submit {
      border: 0 none;
      border-radius: 0;
      color: #fff;
      padding: 10px 20px;
      font-size: 15px;
      background: -webkit-gradient(linear, right top, right bottom, color-stop(0%, #8ec64e));
    }

    #contact .block .btn span {
      padding-left: 23px;

    }

    #success,
    #error {
      display: none;
    }






    .mapwrapper {
      height: 500px;
      width: 100%;
      border-top: 6px solid rgba(236, 225, 217, 0.4);
      border-bottom: 6px solid rgba(236, 225, 217, 0.4);
    }

    .googlemap {
      width: 100%;
      position: absolute;
      height: 500px;
      left: 0px;
    }




    .social_connect {

      background-color: #F0FFFF;
      text-align: center;
      text-decoration-color: white;
      min-height: 100px;

    }


    .social:hover {
      -webkit-transform: scale(1.1);
      -moz-transform: scale(1.1);
      -o-transform: scale(1.1);
    }

    .social {
      -webkit-transform: scale(0.8);
      /* Browser Variations: */

      -moz-transform: scale(0.8);
      -o-transform: scale(0.8);
      -webkit-transition-duration: 0.5s;
      -moz-transition-duration: 0.5s;
      -o-transition-duration: 0.5s;
    }

    .black-footer {

      background-color: black;
      text-align: center;
      text-decoration-color: white;
      min-height: 400px;

    }
  </style>

</head>

<body>


  <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
    <a class="navbar-brand" href="#"><img loading="lazy" src="front_images/hklogo.gif" height="80" width="80" alt="HKS"></a>
    <ul class="navbar-nav ml-md-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">HK</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="newsfeed">News</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Pilgrimage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Download</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="hks_admin_login.php">Login</a>
      </li>

    </ul>
  </nav>



  <!--============ Hare Krishna Publications ============-->



  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img loading="lazy" class="d-block w-100" src="hkp_images/base1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h3>Hare Krishna Publications</h3>
          <p> Hare Krishna Hare Krishna Krishna Krishna Hare Hare Hare Rama Hare Rama Rama Rama Hare Hare </p>
        </div>
      </div>
      <div class="carousel-item">
        <img loading="lazy" class="d-block w-100" src="hkp_images/base2.jpg" alt="Second slide" style="position: relative;">
        <div class="row" style="    float: left;    position: absolute;    left: 200px;    top: 300px;    background-color: ;">
          <div class="col-md-4">
            <a class="thumbnail" href="#"><img loading="lazy" alt="" src="hkp_images/1.jpg" width="200" height="250" style="border:3px solid white"></a>
            <h6 style="color: white; text-align: center;">Death</h6>
          </div>
          <div class="col-md-4">
            <a class="thumbnail" href="#"><img loading="lazy" alt="" src="hkp_images/2.jpg" width="200" height="250" style="border:3px solid white"></a>
            <h6 style="color: white; text-align: center;">Prakrita Sukh Kothai</h6>
          </div>
          <div class="col-md-4">
            <a class="thumbnail" href="#"><img loading="lazy" alt="" src="hkp_images/3.jpg" width="200" height="250" style="border:3px solid white"></a>
            <h6 style="color: white; text-align: center;">Prati Nagaradi Grame</h6>
          </div>
        </div>

        <div class="carousel-caption d-none d-md-block">
          <h3>Hare Krishna Publications</h3>
          <p> Hare Krishna Hare Krishna Krishna Krishna Hare Hare Hare Rama Hare Rama Rama Rama Hare Hare </p>
        </div>

      </div>
      <div class="carousel-item">
        <img loading="lazy" class="d-block w-100" src="hkp_images/base3.jpg" alt="Third slide">


        <div class="carousel-caption d-none d-md-block">
          <h3>Hare Krishna Publications</h3>
          <p> Hare Krishna Hare Krishna Krishna Krishna Hare Hare Hare Rama Hare Rama Rama Rama Hare Hare </p>
        </div>
      </div>

      <div class="carousel-item">
        <img loading="lazy" class="d-block w-100" src="hkp_images/base4.jpg" alt="Third slide">

        <div class="carousel-caption d-none d-md-block">
          <h3>Hare Krishna Publications</h3>
          <p> Hare Krishna Hare Krishna Krishna Krishna Hare Hare Hare Rama Hare Rama Rama Rama Hare Hare </p>
        </div>
      </div>




    </div>




    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> <!-- Hare Krishna Publications-->







  <div class="">

    <div style="min-height: 50px; ">
      <h4 style="text-align: center; margin-top: 10px;">Stay up to date</h4>
      <hr style="margin-top: 2rem;  margin-bottom: 2rem;  border: 0;  border-top: 3px solid red; width: 50px; border-radius: 7px 7px 7px 7px;">
    </div>

    <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="form-inline">



      <div class="input-group mx-auto">
        <input type="hidden" name="contact" value="newsletter">

        <input type="email" style="max-width: 400px; max-height: 37px;" placeholder="Email address" name="contact" id="Email" class="form-control" autocapitalize="off">


        <button type="submit" class="btn newsletter__submit btn-send2" name="commit" id="Subscribe">
          <span class="newsletter__submit">Subscribe</span>
        </button>
      </div>

    </form>
  </div>



  <!-- Google Map API  AIzaSyCsmw9MXt7nH_eOJW3VQe6T7ZJLf8LIcf8 -->

  <!--============ MAP ============-->

  <div class="mapwrapper">
    <div id="googleMap">


    </div> <!-- end of map id-->

    <!-- <script type="text/javascript">
      function myMap() {
        var mapOptions = {
          center: new google.maps.LatLng(51.5, -0.12),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.HYBRID
        }
        var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsmw9MXt7nH_eOJW3VQe6T7ZJLf8LIcf8&callback=myMap"></script> -->

  </div>


  <!--
    Contact start
    ==================== -->
  <section id="contact">
    <div class="container">

      <div style="min-height: 50px; ">

        <h4 style="text-align: center; margin-top: 10px;">Contact Us</h4>

      </div>


      <div class="row">

        <div class="col-xl-6">
          <div>
            <address class="address">

              <p>Hare Krishna Samacar,
                <br> Swamibag Ashram,
                <br> 79, Swamibag Road, Dhaka-1100</p>
            </address>

            <address class="address">
              <hr>
              <p>Email: hksamacar@gmail.com
                <br> Phone: +880-1730059208, +880-01715758948
                <br> Office hours: Everyday 10 am – 9 pm</p>

              <hr>
              <p>Site Admin<br><strong>E:</strong>&nbsp;robin16039@gmail.com<br>
                <strong>P:</strong>&nbsp;+8801921861913</p>


            </address>
          </div>
        </div>

        <div class="col-xl-6">
          <div class="form-group">
            <form action="#" method="post" id="contact-form">
              <div class="input-field">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="input-field">
                <input type="email" class="form-control" placeholder="Email Address" name="email">
              </div>
              <div class="input-field">
                <textarea class="form-control" placeholder="Your Message" rows="3" name="message"></textarea>
              </div>
              <button class="btn btn-send" type="submit">Send me</button>
            </form>

            <div id="success">
              <p>Your Message was sent successfully</p>
            </div>
            <div id="error">
              <p>Your Message was not sent successfully</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="social_connect">




    <div class="container">
      <br>
      <div class="text-center center-block">
        <p class="txt-railway">Socialize</p>
        <a href="https://www.facebook.com/harekrishnasamacar/"><i class="fa fa-facebook-square fa-3x social"></i></a>
        <a href=""><i class="fa fa-twitter-square fa-3x social"></i></a>
        <a href=""><i class="fa fa-google-plus-square fa-3x social"></i></a>
        <a href=""><i class="fa fa-envelope-square fa-3x social"></i></a>
      </div>
      <br>
    </div>




  </div>


  <footer class="site-footer small--text-center" role="contentinfo">

    <div class="black-footer">

      <div>
        <br>

      </div>


      <div class="container" style="color: black;">
        <div class="row">
          <div class="col-sm-12 col-lg-12" style="text-align: center;">
            <p><img loading="lazy" src="front_images/hklogo.gif" height="120" width="120" alt="HKS"></p>

            <h1 style="font-family: 'Leckerli One', cursive; color: white;">Hare Krishna Samacar</h1>

            <br><br>

            <div class="link-list">

              <a class="footer-link" style="color: white;" href="/pages/about-us">News</a>

              <a class="footer-link" style=" margin-left : 1em; color: white;" href="/blogs/news">Articles</a>

              <a class="footer-link" style=" margin-left : 1em; color: white;" href="/pages/legal">Features</a>

              <a class="footer-link" style=" margin-left : 1em; color: white;" href="/pages/legal">Pilgrimages</a>

              <a class="footer-link" style=" margin-left : 1em; color: white;" href="/pages/privacy">Downloads</a>

              <a class="footer-link" style=" margin-left : 1em; color: white; " href="/pages/terms-of-service">Contact US</a>

            </div>

            <hr style="margin-top: 5rem;  margin-bottom: 1rem;  border: 0;  border-top: .05px solid gray;">


            <p style="cursor: pointer; color: yellow;"> Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" style="color: white;">@Hare Krishna Samacar IT</a> 2018 <?php echo date("d-m-Y") ?> </p>
          </div>

        </div><!-- /row -->
      </div><!-- /container -->







    </div>

  </footer>

  </div>

  </div>







  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
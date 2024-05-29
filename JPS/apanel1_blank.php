<?php session_start();?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 

    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">

   
         
    <style type="text/css">
    
    body {
    padding-top: 60px;
    }
    
    .navbar-nav {
       margin-bottom: 5   !important;
    }

    .dropdown-submenu {
    position: relative;
    cursor: pointer;
    }

    .dropdown-submenu .dropdown-menu {
    top: 80%;
    left: 10%;
    margin-top: 5px;
    background: #666362;
    
    }








    </style>

    <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

  </head>
  <body onload="startTime()">
  
    <!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top" style="height: 7%;">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="indexn.php"><p style="margin-bottom: 0em;"> Harinam Initiation</p>

          <strong style="margin-top: -2em;">H.H. Jayapataka Swami Maharaj </strong></a>
        </div> 
          
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="apanel1.php"><i class="fa fa-home"></i> Home</a></li>                            
              <li><a href="temple_registration.php"><i class="fa fa-home"></i> Temples</a></li>
              <li><a href="devrecords.php"><i class="fa fa-users"></i> Devotees</a></li>
              <li class="dropdown-submenu" >
                            <a class="test"><i class="fa fa-bar-chart-o fa-fw"></i> Set Status<span class="fa fa arrow" style="color:white"></span></a>
                            <ul class="dropdown-menu">
                                <li > <a target="_blank" style="color: white; " href="set_initiation_date.php">Set Date </a></li>
                                <li > <a target="_blank" style="color: white; " href="confirm_initiated.php">Update Status</a></li>
                            </ul>
              </li>
              <li><a href="print_files.php"><i class="fa fa-print"></i> Print Files</a></li>
              <li><a href="admin_user.php"><i class="fa fa-user-circle-o"></i> Users</a></li>

              <li><a href="#"><i class="fa fa-sign-out"></i>Sign-out</li></a></li>
            </ul>
          </div>
        </div>
    </div>

   















   <div id="footerwrap">
        <footer class="clearfix"></footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12" style="text-align: center;">
                <p><img src="images/hklogo.gif" height="80" width="80" alt="HKS"></p>
                 <p style= "cursor: pointer;" > Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" >@hksamacar</a> 2017 </p> 
                </div>

            </div><!-- /row -->
        </div><!-- /container -->       
    </div><!-- /footerwrap -->
          
</body></html>
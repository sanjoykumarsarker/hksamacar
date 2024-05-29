<?php session_start();?>
<!DOCTYPE html>

<html lang="en-us">
<head>

<title>Harinama Initiation</title>
 <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" href="animate.min.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Da|Modak" rel="stylesheet"> 
  <link rel='stylesheet' id='et-shortcodes-css-css'  href='http://www.jayapatakaswami.com/wp-content/themes/Divi/epanel/shortcodes/css/shortcodes.css?ver=3.0.45' type='text/css' media='all' />
  <link rel='stylesheet' id='et-shortcodes-responsive-css-css'  href='http://www.jayapatakaswami.com/wp-content/themes/Divi/epanel/shortcodes/css/shortcodes_responsive.css?ver=3.0.45' type='text/css' media='all' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
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
<style>

.navbar{
       margin-bottom: 0!important;
    }

.navbar-brand {
    position: absolute;
    padding: 10px;
	z-index: 999
}
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 80%;
    margin-top: -1px;
}
 
</style>
</head>
<body >

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
	
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
      <a class="navbar-brand" target="_blank" href="http://www.jayapatakaswami.com/prabhupada/">
        <img style="width:100px;height:100px;" alt="Srila Prabhupada" src="logo.png">
      </a>
	  <br>					  
		<a target="_blank" href="http://www.jayapatakaswami.com/biography/" style="display:inline; text-align:left; font-weight:bold;color:#000000; margin-left: 120px; margin-top: 100px;" > <span style="font-size: 10px;">   কৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরণারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদের কৃপাধন্য শিষ্য       </span ><br> <span style="font-size: 22px; margin: 120px;font-family: Baloo Da;">  শ্রীল জয়পতাকা স্বামী গুরু মহারাজ  </span> </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
	<br>
    <ul class="nav navbar-nav navbar-right" style= "position:relative; bottom:0px" >
	<li class="dropdown" >
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >হরিনাম দীক্ষা <span class="caret"></span></a>
                    <ul class="dropdown-menu" style = "cursor:pointer;">
					
                        <li><a tabindex="-1" target="_blank" href="regsignup.php">Registration </a></li>
                        <li><a tabindex="-1" target="_blank" href="namakarana_login.php" >Namakarana</a></li>
                        <li><a tabindex="-1"  target="_blank" href="namanirnaya_login.php" >Namanirnaya</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" tabindex="-1" >Print</a></li>
						<li class="dropdown-submenu"> <a class="test" tabindex="-1" >Search 
							&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a target="_blank" href="search.php" > From Registration </a>	</li>
								<li><a target="_blank" href="search_iname.php" > From Initiation Table </a>	</li>
							</ul>
						</li>
						<li><a tabindex="-1" target="_blank" href="upload_xl.php">Temples </a></li>
						<li><a tabindex="-1" target="_blank" href="disciples_xl.php">Disciples</a></li>

					</ul>
     </li>
    <li><a target="_blank" href="admin_login.php">Log In</a></li>
    </ul>
    </div>
  </div>
</nav>
  <div style = "background-color: #F7CEA5; position: relative;";>
	<div class="container-fluid" > 
		
		<div id="myCarousel" class="carousel slide" style="position: center; margin-top:10px;"data-ride="carousel">
						<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

					<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
				<div class="fill">
				<img src="jps1.jpg" alt="Los Angeles" style="width:100%;"></div>
				</div>

				<div class="item">
				<div class="fill">
				<img src="jps2.jpg" alt="Chicago" style="width:100%;"></div>
				</div>
    
				<div class="item">
				<div class="fill">
				<img class="fill" src="jps3.jpg" alt="New york" style="width:100%;"></div>
				</div>
			</div>

					<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
		</div>
	</div>
	
	<section>
	<div class="container">
		<div class="row">
			<div class="text-center wow bounceInUp" data-wow-delay=".5s">
				<h1>Hare Krishna</h1>
				<div class="icon"><img src="habout.png" align="middle" ></div>
				<p> This website is only for the use of Harinama Initiation by <mark>H. H. Jayapataka Swami Maharaj </mark> in BANGLADESH. </p> 
			</div>	
		</div>
	</div>
    </section>
	<div style="background-color: #674d3c ">

	<div class="container">
				
			<h1 style="text-align: center; color: #f5f5f5;">This database contains</h1>

	</div> <!-- .et_pb_row -->
	
	<div class="row" style= "padding:10px;">
			<div class="col-sm-3" style="text-align:center;" >
			<div >
			<p class= "count" style="color:#f7786b; font-size: 80px; margin-bottom: -5px;" data-count =	" <?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}
$sqlr = " select COUNT(NULLIF(finalname, '')) as cc FROM reg";
	$resultr = $connr->query($sqlr);
    while($row = $resultr->fetch_assoc()) {
	echo 	$row['cc'];
	}
	
$connr->close();
?> " > </p>
			<p style= "color:#f5f5f5; margin-top: -5 px; font-size: 20px;" >Initiated Disciples</p>
			</div><!-- .et_pb_number_counter -->
			</div> <!-- .et_pb_column -->
			
			<div class="col-sm-3" style="text-align:center;">
				
			<div >
			<p class= "count" style="color:#b5e7a0; font-size: 80px;margin-bottom: -5px;" data-count =	"<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}
$sqlr = "select COUNT(NULLIF(reg, '')) as cc FROM reg";
	$resultr = $connr->query($sqlr);
    while($row = $resultr->fetch_assoc()) {
	echo 	$row['cc'];
	}
	
$connr->close();
?>" > </p>
			<p style= "color:#f5f5f5; margin-top: -5 px; font-size: 20px;" >Registered devotees</p>
			</div><!-- .et_pb_number_counter -->
			</div> <!-- .et_pb_column -->
			
			
			<div class="col-sm-3" style="text-align:center;">
				
			<div>
			<p class= "count" style="color:yellow; font-size: 80px; margin-bottom: -5px;" data-count =	"<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}
$sqlr = " select COUNT(NULLIF(tname, '')) as cc FROM tmpl";
	$resultr = $connr->query($sqlr);
    while($row = $resultr->fetch_assoc()) {
	echo 	$row['cc'];
	}
	
$connr->close();
?>  "   >	</p>
			<p style= "color:#f5f5f5; margin-top: -5 px; font-size: 20px;" >Temples</p>
			</div><!-- .et_pb_number_counter -->
			</div> <!-- .et_pb_column -->
			
				<div class="col-sm-3"style="text-align:center;">
				
			<div >
			<p class= "count" style="color:#92a8d1; font-size: 80px;margin-bottom: -5px;" data-count =	"<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}
$sqlr = " select COUNT(DISTINCT (NULLIF( district, ''))) as cc FROM reg";
	$resultr = $connr->query($sqlr);
    while($row = $resultr->fetch_assoc()) {
	echo 	$row['cc'];
	}
	
$connr->close();
?>  "   >	</p>
			<p style= "color:#f5f5f5; margin-top: -5 px; font-size: 20px;" >Districts</p>
			</div><!-- .et_pb_number_counter -->
			</div> 
	</div>
	
	</div>
		
	
		<div class="container">
			<hr>
			<div  style= "text-align:center;">
                <marquee scrollamount=20> <h1 style="font-family: baloo da;" > হরে কৃষ্ণ হরে কৃষ্ণ কৃষ্ণ কৃষ্ণ হরে হরে । হরে রাম হরে রাম রাম রাম হরে হরে ।।</h1> </marquee>
            </div>
		<hr>
		     <div  style="text-align: center;">
				<p style= "cursor: pointer;" > Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" >@hksamacar</a> 2017 </p> 
            </div>
                
         </div>
       </div>
 </div>
</body>
</html>

<script>
$('.count').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo },

  { duration: 800,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum)); },
    complete: function() {
      $this.text(this.countNum);
  }
  });  
  });
</script>
<?php session_start();?>
<?php
$myname=$_POST['username'];
$myentrance=$_POST['entrance'];

if($myname!="jps108" || $myentrance!=1632){

	die("Your password is wrong.....");
}

// $_SESSION["username"] = "jps108";
$_SESSION["entrance"] = "1632";

?>

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

	<script>
$(document).ready(function(){
    $('#change').change(function(){

  var date=$(this).val();


// this will return an array with strings "1", "2", etc.


var request = $.ajax({
  url: "count_ini_ajax.php",
  method: "POST",
  data: { myData : JSON.stringify(date)  },
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("space").innerHTML =msg;
});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


    });
});


</script>




    <style type="text/css">
    /* IE10 */
progress {
	color:lightgreen;
	background-color:tranparent;
	border: 0px solid orange;
    border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
     }

/* Firefox */
progress::-moz-progress-bar {
	color:lightgreen;
	background-color:tranparent;
	border: 0px solid orange;
    border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
}

/* Chrome */
progress::-webkit-progress-bar {
	color:lightgreen;
	background-color:tranparent;
	border: 0px solid orange;
    border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
}

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

	tr {
		border-bottom: 1px solid #ddd;

	}

	th {

    text-align: center;
	}

	td {
		text-align: center;
		padding:0.5px;

	}

	table {
				width:100%;

	}
	#change{



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
              <li><a target="_blank" href="temple_registration.php"><i class="fa fa-home"></i> Temples</a></li>
              <li><a target="_blank" href="devrecords.php"><i class="fa fa-users"></i> Devotees</a></li>
              <li class="dropdown-submenu" >
                            <a class="test"><i class="fa fa-bar-chart-o fa-fw"></i> Set Status<span class="fa fa arrow" style="color:white"></span></a>
                            <ul class="dropdown-menu">
                                <li > <a target="_blank" style="color: white; " href="set_initiation_date.php">Set Date </a></li>
                                <li > <a target="_blank" style="color: white; " href="confirm_initiated.php">Update Status</a></li>
                                <li > <a target="_blank" style="color: white; " href="serial.php"> Update Date/Serial </a></li>

                            </ul>
              </li>
              <li><a href="print_files.php"><i class="fa fa-print"></i> Print Files</a></li>
              <li><a href="apanel1_user.php"><i class="fa fa-user-circle-o"></i> Users</a></li>
 

              <li><a href="#"><i class="fa fa-sign-out"></i>Sign-out</li></a></li>
            </ul>
          </div>
        </div>
    </div>

    <div class="container">

      <!-- FIRST ROW OF BLOCKS -->
      <div class="row" style="margin-top: 10px;">

      <!-- USER PROFILE BLOCK -->
            <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Users Online(Registration)</dtitle>
                <hr>
                <div>
<?php
include "function.php";
include "initiation_stats.php";


$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,u_name,task FROM users where permission!=108 and permission!=1632";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='usronline'><tr><th>ID</th><th>Name</th><th>Task</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
if(getDiffTime($row["id"])>-1&&getDiffTime($row["id"])<20)

{
        echo "<tr style='background-color:green'>

        <td>" . $row["id"]. "</td><td>" . $row["u_name"]. "</td>

        <td>" .tename($row["task"])."</td>


        </tr>";


    }    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

				</div>
            </div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Users Online(Namakarana)</dtitle>
                <hr>
                <div>
<?php

 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,u_name FROM users where permission='108'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='usronline' ><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

		if(getDiffTime($row["id"])>-1&&getDiffTime($row["id"])<60){
        echo "<tr><td>".$row["id"]."</td><td>".$row["u_name"]."</td></tr>";
		}
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

				</div>
            </div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Users Online(Namanirnaya)</dtitle>
                <hr>
                <div>

<?php

 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,u_name FROM users where permission='1632'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='usronline' ><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

		if(getDiffTime($row["id"])>-1&&getDiffTime($row["id"])<60){
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["u_name"]. "</td></tr>";
		}
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

				</div>
            </div>
        </div>

        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
            <div class="half-unit">
                <dtitle>Local Time</dtitle>
                <hr>
                    <div class="clockcenter">
                        <digiclock id="txt"> </digiclock>
                    </div>
            </div>

      <!-- SERVER UPTIME -->
            <div class="half-unit">
                <dtitle>Server Uptime</dtitle>
                <hr>
                <div class="cont">
                    <p><img src="images/up.png" alt=""> <bold>Up</bold> | 356ms.</p>
                </div>
				<div class="text">
                    <p><grey>Last Server Update: 5 minutes ago.</grey></p>
                </div>
            </div>

        </div>
      </div><!-- /row -->


      <!-- SECOND ROW OF BLOCKS -->
      <div class="row">
        <div class="col-sm-3 col-lg-3">
       <!-- MAIL BLOCK -->
            <div class="dash-unit">
            <dtitle>Registration </dtitle>
            <hr style="margin-bottom:5px;">
<?php
include "registration_progressbar.php";
?>

			</div><!-- /dash-unit -->
    </div><!-- /span3 -->

      <!-- GRAPH CHART - lineandbars.js file -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>NAMAKARANA</dtitle>
                <hr style="margin-bottom:5px;">
                <div >
<?php
include "namakarana_progressbar.php";
?>

				</div>

            </div>
        </div>

      <!-- LAST MONTH REVENUE -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>NAMANIRNAYA</dtitle>
                <hr style="margin-bottom:5px;">
                <div >
<?php
include "namanirnaya_progressbar.php";
?>
                </div>

            </div>
        </div>


      <!-- 30 DAYS STATS - CAROUSEL FLEXSLIDER -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Initiation Stats</dtitle>
                <hr>
                	<div  style="text-align:left; padding:10px;">
					<p><bold><?php echo n_reg(); ?> <span style="color:yellow; font-size: 85%;">| Registered</span></bold></p>
					<br>
					<p><bold><?php echo n_psnd(); ?> <span style="color:red; font-size: 85%;">| Postponed</span></bold></p>
					<br>
					<p><bold><?php echo (n_reg()-n_psnd()); ?> <span style="color:lightgreen; font-size: 85%;">| Approved</span></bold></p>
					<br><hr style="margin-bottom:1px;">
					<p style="margin-left:10px;"><bold><form>
					<span style="color:yellow;">Today</span> &nbsp
					<span >Initiated	<?php $dt1= date("Y-m-d", time()); echo n_init($dt1); ?> </span> &nbsp
					<span >Absent	<?php $dt1= date("Y-m-d", time()); echo n_absnt($dt1); ?> </span>
					</form></bold></p><hr style="margin-bottom:5px; color:yellow;">
					<p style="margin-left:10px;"><bold>
					<form target='iframe1' enctype="multipart/form-data" action='initiation_stats.php' method='POST'>
					<div class="" style="color:black; display:inline-block;">
 <?php

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
}

$sqld = "SELECT DISTINCT idate FROM date_set";
$resultd = $conn->query($sqld);

if ($resultd->num_rows > 0) {
  echo "<select id='change' name='indate'>";
  echo "<option>Please Select Date</option>";

  // output data of each row
    while($row = $resultd->fetch_assoc()) {

echo "<option>".$row["idate"]."</option>";
}
echo "</select>";}
$conn->close();
?>

			  </div></form>
			  <div id="space"></div>

		  </div>
        </div>
      </div><!-- /row -->


      <!-- THIRD ROW OF BLOCKS -->
      <div class="row">
        <div class="col-sm-3 col-lg-3">

      <!-- BARS CHART - lineandbars.js file -->
            <div class="half-unit">
                <dtitle>Registered Devotees</dtitle>
                <hr style="margin-bottom:1px;">
                <table style="color:lightgreen;"  >
				<tr><td>Dhaka</td><td><?php $dt1= "Dhaka"; echo count_dev_div($dt1); ?></td><td>Chittagong</td><td><?php $dt1= "Chittagong"; echo count_dev_div($dt1); ?></td> </tr>
				<tr><td>Mymensingh</td><td><?php $dt1= "Mymensingh"; echo count_dev_div($dt1); ?></td><td>Rangpur</td><td><?php $dt1= "Rangpur"; echo count_dev_div($dt1); ?></td> </tr>
				<tr><td>Sylhet</td><td><?php $dt1= "Sylhet"; echo count_dev_div($dt1); ?></td><td>Barisal</td><td><?php $dt1= "Barisal"; echo count_dev_div($dt1); ?></td> </tr>
				<tr><td>Khulna</td><td><?php $dt1= "Khulna"; echo count_dev_div($dt1); ?></td><td>Rajshahi</td><td><?php $dt1= "Rajshahi"; echo count_dev_div($dt1); ?></td> </tr>
				</table>
            </div>

      <!-- TO DO LIST -->
            <div class="half-unit">
                <dtitle>Total Stat</dtitle>
                <hr style="margin-bottom:1px;">
				<p>
				Initiated= 500000
				Registered here= 10000


				</p>

            </div>
        </div>

        <div class="col-sm-3 col-lg-3">

      <!-- LIVE VISITORS BLOCK -->
            <div class="half-unit">
                <dtitle>NAMAKARANA</dtitle>
                <hr style="margin-bottom:1px;">
				<div class="cont">
                    <p><bold><?php echo  include "count_nk.php";?>%</bold> | Done</p>
                </div>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar"
						aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo  include "count_nk.php";?>%;">
						<span class="sr-only"><?php echo  include "count_nk.php";?>% Complete</span>
                         </div>
					</div>
            </div>

      <!-- PAGE VIEWS BLOCK -->
            <div class="half-unit">
                <dtitle>Last Registered User</dtitle>
                <hr style="margin-bottom:1px;">
                    <div class="cont2">
					<br><hr>
                        <img src="images/sss.jpg" height='50' width='50' alt="">
                        <br>
                        <br>
                        <p>Krishna Das</p>
                        <p><bold>Dhaka,Bangladesh</bold></p>
                    </div>
            </div>
        </div>

        <div class="col-sm-3 col-lg-3">
      <!-- TOTAL SUBSCRIBERS BLOCK -->
            <div class="half-unit">
                <dtitle>NAMANIRNAYA</dtitle>
                <hr style="margin-bottom:1px;">
				<div class="cont">
                    <p><bold><?php echo  include "count.php";?>%</bold> | Done</p>
                </div>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar"
						aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style='width:<?php echo  include "count.php";?>%;'>
						<span class="sr-only">% Complete</span>
                         </div>
					</div>
            </div>

      <!-- FOLLOWERS BLOCK -->
            <div class="half-unit">
                <dtitle>Total Registered Temples <?php  echo count_temp();  ?></dtitle>
                <hr style="margin-bottom:1px;">
                <div >
                <table style="color:yellow;">
				<tr><td>Dhaka</td><td><?php $dt1= "Dhaka"; echo count_temp_div($dt1); ?></td><td>Chittagong</td><td><?php $dt1= "Chittagong"; echo count_temp_div($dt1); ?></td> </tr>
				<tr><td>Mymensingh</td><td><?php $dt1= "Mymensingh"; echo count_temp_div($dt1); ?></td><td>Rangpur</td><td><?php $dt1= "Rangpur"; echo count_temp_div($dt1); ?></td> </tr>
				<tr><td>Sylhet</td><td><?php $dt1= "Sylhet"; echo count_temp_div($dt1); ?></td><td>Barisal</td><td><?php $dt1= "Barisal"; echo count_temp_div($dt1); ?></td> </tr>
				<tr><td>Khulna</td><td><?php $dt1= "Khulna"; echo count_temp_div($dt1); ?></td><td>Rajshahi</td><td><?php $dt1= "Rajshahi"; echo count_temp_div($dt1); ?></td> </tr>
				</table>
                </div>
            </div>
        </div>

      <!-- LATEST NEWS BLOCK -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>Latest News</dtitle>
                <hr style="margin-bottom:1px;">
                <div class="info-user">
                    <span aria-hidden="true" class="li_news fs2"></span>
                </div>
                <br>
                <div class="text">
				<p>Harinama Initiation By Jayapataka Swami Maharaja in Bangladesh in November</p>
                     <p><grey>Last Update</grey></p>
                </div>
            </div>
        </div>
      </div><!-- /row -->




    </div> <!-- /container -->
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
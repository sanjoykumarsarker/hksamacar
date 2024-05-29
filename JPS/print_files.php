<?php session_start(); ?>

<!DOCTYPE html>

<html>



<head>

  <meta charset="utf-8">

  <title>Admin Panel</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <link href="css/main.css" rel="stylesheet">

  <link href="css/font-style.css" rel="stylesheet">

  <link href="css/flexslider.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">





  <style type="text/css">

    body {

      padding-top: 60px;

    }



    .navbar-nav {

      margin-bottom: 5 !important;

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



  <script>

    function printDiv(divName) {

      var printContents = document.getElementById(divName).innerHTML;

      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

    }







    $(document).ready(function() {

      $('#change').change(function() {



        var date = $(this).val();



        const toFetch = [{

            url: 'summarylist_date_data.php',

            id: 'space'

          },

          {

            url: 'print_devotee_serial_data.php',

            id: 'space1'

          },

          {

            url: 'print_seat_plan_data.php',

            id: 'space2'

          },

          {

            url: 'print_ini_call_list.php',

            id: 'space3'

          },

          {

            url: 'print_asana_bantan.php',

            id: 'space5'

          },

          // {

          //   url: 'print_certificate_onepage_data_new.php',

          //   id: 'Certificate'

          // },

        ];



        toFetch.forEach(({

          url,

          id

        }) => {

          $.ajax({

              url,

              method: "POST",

              data: {

                myData: JSON.stringify(date)

              },

              dataType: "html"

            })

            .done((msg) => document.getElementById(id).innerHTML = msg)

            .fail((jqXHR, status) => alert("Request failed: " + status));

        })

      });

    });



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

      if (i < 10) {

        i = "0" + i

      }; // add zero in front of numbers < 10

      return i;

    }



    $(document).ready(function() {

      $('.dropdown-submenu a.test').on("click", function(e) {

        $(this).next('ul').toggle();

        e.stopPropagation();

        e.preventDefault();

      });

    });

  </script>



</head>





<body onload="startTime()">



  <!-- NAVIGATION MENU -->

  <div class="navbar-nav navbar-inverse navbar-fixed-top">

    <div class="container">

      <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

          <span class="icon-bar"></span>

        </button>



        <a class="navbar-brand" href="indexn.php">

          <p style="margin-bottom: 0em;"> Harinam Initiation</p>



          <strong style="margin-top: -2em;">H.H. Jayapataka Swami Maharaj </strong>

        </a>

      </div>



      <div class="navbar-collapse collapse">

        <ul class="nav navbar-nav">

          <li class="active"><a href="apanel1.php"><i class="fa fa-home"></i> Home</a></li>

          <li><a target="_blank" href="temple_registration.php"><i class="fa fa-home"></i> Temples</a></li>

          <li><a target="_blank" href="devrecords.php"><i class="fa fa-users"></i> Devotees</a></li>

          <li class="dropdown-submenu">

            <a class="test"><i class="fa fa-bar-chart-o fa-fw"></i> Set Status<span class="fa fa arrow" style="color:white"></span></a>

            <ul class="dropdown-menu">

              <li> <a target="_blank" style="color: white; " href="set_initiation_date.php">Set Date </a></li>

              <li> <a target="_blank" style="color: white; " href="confirm_initiated.php">Update Status</a></li>

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

    <div class="row" style="margin-top: 40px;">



      <div class="col-sm-12 col-lg-12">

        <p class="bg-info bg-inline-block" style="text-align: center; font-size: 40px; font-family:French Script MT;">

          Print Documents</p>

      </div>

    </div>

    <!-- SECOND ROW OF BLOCKS -->

    <div class="row" style="margin-top: 40px;">



      <div class="col-sm-1 col-lg-1"> </div>



      <div class="col-sm-3 col-lg-3">

        <div class="dash-unit">

          <dtitle>Select Initiation Date</dtitle>

          <hr>

          <div class="container-fluid input-group">

            <span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i> </span>

            <?php

            // $q = $_GET['qnn'];

            $servername = "localhost";

            $username = "sanpro_hksamacar";

            $password = "01915876543";

            $dbname = "sanpro_diksa";



            // Create connection

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection

            if ($conn->connect_error) {

              die("Connection failed:" . $conn->connect_error);

            }



            $sqld = "SELECT DISTINCT idate FROM reg";

            $resultd = $conn->query($sqld);



            if ($resultd->num_rows > 0) {

              echo "<select id='change' name='str' class='form-control'>";

              echo "<option>Please Select Date</option>";



              // output data of each row

              while ($row = $resultd->fetch_assoc()) {



                echo "<option>" . $row["idate"] . "</option>";

              }

              echo "</select>";

            }

            $conn->close();

            ?>

          </div>

        </div>

      </div>





      <div style="display: none ;">

        <div id="space"> </div>

        <div id="space1"> </div>

        <div id="space2"> </div>

        <div id="space5"> </div>

        <div id="space3"> </div>

        <div id="Certificate"> </div>

      </div>







      <div class="col-sm-4 col-lg-4">

        <div class="dash-unit">

          <dtitle>Click any to print</dtitle>

          <hr>

          <div class="container-fluid" style="text-align:center;">

            <button type="button" class="btn btn-outline btn-default btn-block" onclick="printDiv('space')"> Summary List </button>

            <button type="button" class="btn btn-outline btn-success btn-block" onclick="printDiv('space1')"> Serial </button>

            <button type="button" class="btn btn-outline btn-warning btn-block" onclick="printDiv('space2')"> Seatplan </button>

            <button type="button" class="btn btn-outline btn-warning btn-block" onclick="printDiv('space5')"> Asan</button>



            <button type="button" class="btn btn-outline btn-info btn-block" onclick="printDiv('space3')"> Initiation Call List </button>



            <a href="print_certificate_onepage_data_old.php" type="button" class="btn btn-outline btn-danger btn-block" target="_blank"> Certificate New </a>





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

            <p><img src="images/up.png" alt="">

              <bold>Up</bold> | 356ms.

            </p>

          </div>

        </div>



      </div>

    </div><!-- /row -->



    <div class="row" style="margin-top: 40px;"> </div>









  </div> <!-- /container -->

  <div id="footerwrap">

    <footer class="clearfix"></footer>

    <div class="container">

      <div class="row">

        <div class="col-sm-12 col-lg-12" style="text-align: center;">

          <p><img src="images/hklogo.gif" height="80" width="80" alt="HKS"></p>

          <p style="cursor: pointer;"> Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank">@hksamacar</a> 2017 </p>

        </div>



      </div><!-- /row -->

    </div><!-- /container -->

  </div><!-- /footerwrap -->



</body>



</html>
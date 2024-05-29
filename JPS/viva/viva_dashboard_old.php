

<?php
// ini_set("display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
include '../function.php';
$tm = 60000;
//include 'user_session.php';
$ti = "64";
$ti_all = "1081632";

if ($_POST['Name-1'] != null && $_POST['Name-1'] != "") {
    $_SESSION['idn'] = $_POST['Name-1'];
}

if ($_POST['Password-1'] != null && $_POST['Password-1'] != "") {
    $_SESSION['pw'] = $_POST['Password-1'];
}

  $permis_val = getPermission($_SESSION['idn'], $_SESSION['pw']);
  $id_val = getId($_SESSION['idn'], $_SESSION['pw']);
$user_name = getIdToUserName($id_val);

// echo  "<h4 style='color:green;''>".$user_name  =getIdToUserName($id_val)."</h4> <br>";
$_SESSION['viva_id'] = $id_val;
$_SESSION['user_name'] = $user_name;
//include "login_check.php";
//login_check($id_val);
if ($_SESSION['cd'] != null && $_SESSION['cd'] != "" && $_SESSION['seccode'] != null && $_SESSION['seccode'] != "" && $_SESSION['cd'] == $_SESSION['seccode']) {
    echo "You are trying more entry";
} else {

    if ($permis_val == null || $permis_val == "" || ($ti != $permis_val && $ti_all != $permis_val)) {

        header("Location: https://harekrishnasamacar.com/JPS/viva"); /* Redirect browser */
        exit();

    } else {
        $md5val = md5($permis_val);
        $_SESSION['seccode'] = $md5val;
        $GLOBALS['seccode'] = $md5val;

        //echo "First Entry";
        $_SESSION['strg'] = $_POST['strg'];

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['id_val'] = $id_val;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


  

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viva Dashboard: JPS Initiation</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
    progress {
    color:blue;
        width: 100%;
        background-color:white;
        border: 1px solid orange;
        border-radius: 3px;

    }

    /* Firefox */
    progress::-moz-progress-bar {

        color:blue;
        width: 100%;
        background-color:white;
        border: 1px solid orange;
        border-radius: 3px;
        background: orange;
    }

    /* Chrome */
    progress::-webkit-progress-value {
    color:blue;
        width: 100%;
        background-color:white;
        border: 1px solid orange;
        border-radius: 3px;
        background: orange;
    }
    table {
        width: 100%;
    }

    th {font-size: 14px;
        padding: 4 px;
        border-bottom: 1px solid #ddd;
        text-align: Center;
    }


    td {
        font-size: 14px;
        padding: 4 px;
        border-bottom: 1px solid #ddd;
    }

    .tbutton {
        background-color: Transparent;
        border: none;
        background-repeat:no-repeat;
        cursor:pointer;
        overflow: hidden;
        text-align: left;
        outline:none;
        color:blue;
    }

    .tbutton:hover {
        background-color: yellow;
        border: none;
        background-repeat:no-repeat;
        cursor:pointer;
        overflow: hidden;
        text-align: left;
        outline:none;
        color:red;
    }

    body,h1,h2,h3,h4,h5 {font-family: poppins, sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
</style>
</head>
<body>
    <!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:1;width:200px;font-weight:bold;" id="mySidebar"><br>
   <div class="w3-container">
    <h3 class="w3-padding-20"> <a href="indexn.php" style= "cursor: pointer;text-decoration: none;" > <b>Home</b> </a></h3>
  </div>
  <br> <br>
  <div class="w3-bar-block">
      <?php
$divisions = ['Dhaka', 'Chittagong', 'Khulna', 'Mymensingh', 'Sylhet', 'Barisal', 'Rangpur', 'Rajshahi'];
foreach ($divisions as $value) {
    echo "<a href='#$value' onclick='w3_close()' class='w3-bar-item w3-button w3-hover-white'>$value</a>";
}?>
  </div>
</nav>





<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Temple Names</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:205px; margin-right:5px">

  <!-- Header -->


  <?php

foreach ($divisions as $value) {
    echo " <div class='w3-container' style='margin-top:80px' id='$value'>
    <h1><b>$value Division</b></h1>
    <h1 class='w3-large w3-text-red'><b>List of temples</b></h1>
    <hr style='border:1px solid red' class='w3-round'>";

    $connr = get_connection();

    $sqlr = "SELECT templereg,
	templename, count(reg),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3
	FROM reg WHERE  division='" . $value . "'  and isinitiated!='Initiated' and isinitiated!='Absent' GROUP BY templereg";
    $resultr = $connr->query($sqlr);
    if ($resultr->num_rows > 0) {
        echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>	<th>Progress</th>
	</tr>";
        // output data of each row
        while ($row = $resultr->fetch_assoc()) {
            $tregidn = $row["templereg"];

            $sqlin = "select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= '$tregidn'  ";
            $resultrin = $connr->query($sqlin);
            if ($resultr->num_rows > 0) {
                while ($rowin = $resultrin->fetch_assoc()) {
                    $cctff = 0;

                    $sqlp = "select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn' and isinitiated!='Initiated' and isinitiated!='Absent'";
                    $resultp = $connr->query($sqlp);
                    if ($resultr->num_rows > 0) {
                        while ($rowp = $resultp->fetch_assoc()) {

                            $c1 = $rowp["nchoice1"];
                            $c2 = $rowp["nchoice2"];
                            $c3 = $rowp["nchoice3"];

                            $c1tp = 0;
                            $c2tp = 0;
                            $c3tp = 0;
                            $c1t = strlen(str_replace(' ', '', $c1));
                            $c2t = strlen(str_replace(' ', '', $c2));
                            $c3t = strlen(str_replace(' ', '', $c3));

                            if ($c1t > 0) {$c1tp = 1;}
                            if ($c2t > 0) {$c2tp = 1;}
                            if ($c3t > 0) {$c3tp = 1;}

                            $ccct = $c1tp + $c2tp + $c3tp;
                            $cctf = 0;
                            if ($ccct > 1) {$cctf = 1;}
                            $cctff = $cctff + $cctf;
                        }
                    }

                    echo "<tr >
		<td style='text-align:center' >" . $row["templereg"] . "</td>
		<td style='text-align:left; width:60%;'>
            <form action='devotee_information.php' target='_blank' method='POST'>
                <button class= 'tbutton' name='temple_id' type='submit' value=" . $row["templereg"] . " > " . $rowin["tname"] . ",&nbsp " . $rowin["t_addr"] . ",&nbsp" . $rowin["t_ps"] . ",&nbsp" . $rowin["t_dist"] . " </button>
            </form>
        </td>

		<td style='text-align:center' >" . $row["count(reg)"] . "</td>
		<td style='text-align:center' >" . $row["c1"] . "</td>
		<td style='text-align:center' >" . $row["c2"] . "</td>
		<td style='text-align:center' >" . $row["c3"] . "</td>
		<td style='text-align:center' > <progress  value='" . $cctff . "'   max='" . $row["count(reg)"] . "'>  </progress> </td>
		</tr>";

                }
            }
        }
        echo "</table>";
    } else {
        echo "No---Result";
    }
    $connr->close();

    echo " </div>";

}
?>


	</div>
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
<p class="w3-right">Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" style= "cursor: pointer" >@hksamacar</a>   2017 </p>
</div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
// if ( window.history.replaceState ) {
//   window.history.replaceState( null, null, window.location.href );
// }
</script>
</body>
</html>
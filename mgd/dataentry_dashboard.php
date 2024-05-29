<!DOCTYPE html>
<html>
<head>
<title>Data Entry Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google" content="notranslate" />
 <!--<meta http-equiv="refresh" content="30">-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

<?php session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<body>



<?php
$logged_in = isset($_SESSION['logged_in']);

$login_failed = false;

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $log_in_query = $connection->query("SELECT * FROM users WHERE user_name='$username' AND password='$password'");

    $user = $log_in_query->fetch_assoc();
    // Sotring to Session
    // header('Location: ');
    if (isset($user)) {
        $_SESSION['user'] = $user['u_name'] ?? '';
        $_SESSION['logged_in'] = true;
        header("Refresh:0");
    } else {
        $login_failed = true;
    }
}

// Logging Out
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /JPS/');
}

if (!$logged_in) {?>

 <div class="w3-card-4" style="margin: 50px auto; width: 480px;">
   <div class="w3-container w3-brown">
    <h2>Data Entry Dashboard</h2>
  </div>
  <form class="w3-container" action="" method="POST">

  <?php
if ($login_failed) {
    echo "<div class='w3-panel w3-pale-red w3-leftbar w3-border-red w3-display-container'>
        <span onclick='this.parentElement.style.display='none''
        class='w3-button w3-large w3-display-topright'>&times;</span>
            <p><b>Login Failed...</b>
            Information not Matched
            </p>
    </div>";
}
    ?>
    <p>
    <label class="w3-text-brown"><b>Username</b></label>
    <input class="w3-input w3-border w3-sand" name="username" type="text" autocomplete="off"></p>
    <p>
    <label class="w3-text-brown"><b>Password</b></label>
    <input class="w3-input w3-border w3-sand" name="password" type="password"></p>
    <p>
    <button class="w3-btn w3-brown" type="submit">Log In</button></p>
  </form>
</div>

<?php } else {?>
    <!-- Sidebar/menu -->

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:1;width:200px;font-weight:bold;" id="mySidebar"><br>
   <div class="w3-container">
    <h3 class="w3-padding-20"> <a href="indexn.php" style= "cursor: pointer;text-decoration:none;" > <b>Home</b> </a></h3>

  </div>
  <br> <br>
  <div class="w3-bar-block">
  <a href="#International" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">International</a>

    <a href="#Dhaka" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Dhaka</a>
    <a href="#Chittagong" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Chittagong</a>
    <a href="#Khulna" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Khulna</a>
    <a href="#Mymensingh" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Mymensingh</a>
    <a href="#Sylhet" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Sylhet</a>
    <a href="#Barisal" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Barisal</a>
	<a href="#Rangpur" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Rangpur</a>
	<a href="#Rajshahi" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Rajshahi</a>
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
<div style="position:absolute; top: 30px;
    right: 50px;">
    <form action="" method="POST">
        <input type='hidden' name="logout" value="1" />
        <button type="submit" class="w3-button w3-round-xlarge w3-indigo" style="z-index:9; position:relative;"><small><?php echo $_SESSION['user']; ?></small></button>
    </form>
</div>
  <?php
$arr = array("International","Dhaka", "Chittagong", "Khulna", "Mymensingh", "Sylhet", "Barisal", "Rangpur", "Rajshahi");
    foreach ($arr as $value) {
        $division_totol = 0;
        echo " <div class='w3-container' style='margin-top:80px' id='$value'>
    <h1><b>$value Division</b></h1>
    <h1 class='w3-large w3-text-red'><b>List of temples</b></h1>
    <hr style='border:1px solid red' class='w3-round'>";

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

        $sqlr = "SELECT templereg,
        templename,
        count(ename) as total,
        count(case when gender='Male' then 1 end) as male,
        count(case when gender='Female' then 1 end) as female
        FROM reg WHERE division='$value' and isinitiated!='Initiated' and isinitiated!='Absent' GROUP BY templereg";
        $resultr = $connr->query($sqlr);
        if ($resultr->num_rows > 0) {
            echo "<table>
	<tr>
        <th>ID</th>
        <th>Temple Name</th>
        <th>Male</th>
        <th>Female</th>
        <th>Total</th>
	</tr>";
            // output data of each row 
            while ($row = $resultr->fetch_assoc()) {
                $division_totol += $row["total"];
                $tregidn = $row["templereg"];

                $sqlin = "SELECT tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= '$tregidn'  ";
                $resultrin = $connr->query($sqlin);
                if ($resultr->num_rows > 0) {
                    while ($rowin = $resultrin->fetch_assoc()) {
                        echo "<tr >
                <td style='text-align:center' >" . $row["templereg"] . "</td>
                <td  style='text-align:left; width:60%;'  > <form action='dataentry_correction.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=" . $row["templereg"] . " > " . $rowin["tname"] . ",&nbsp " . $rowin["t_addr"] . ",&nbsp" . $rowin["t_ps"] . ",&nbsp" . $rowin["t_dist"] . " </button> </form></td>
                <td style='text-align:center' >" . $row["male"] . "</td>
                <td style='text-align:center' >" . $row["female"] . "</td>
                <td style='text-align:center' >" . $row["total"] . "</td>
            </tr>";
                    }
                }
            }
            echo "<tr style='text-align: center;'><td colspan='4'></td><td><b>$division_totol</b></td></tr>";
            echo "</table>";
        } else {
            echo "No---Result";
        }
        $connr->close();

        echo " </div>";
    }
    ?>
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
<p class="w3-right"> Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" style= "cursor: pointer" >@hksamacar</a>   2017 </p>
</div>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
<?php }?>
</body>
</html>
<?php

session_start();
include '../function.php';
$tm=60000;
 //include 'user_session.php';
$ti="108";
$ti_all="1081632";
 

if($_POST['Name-1']!=null && $_POST['Name-1']!=""){
$_SESSION['idn']=$_POST['Name-1'];}



 

if($_POST['Password-1']!=null && $_POST['Password-1']!=""){
$_SESSION['pw']=$_POST['Password-1'];}


 


if($_POST['code']!=null && $_POST['code']!=""){
$_SESSION['cd']=$_POST['code'];}
 

$permis_val=getPermission($_SESSION['idn'],$_SESSION['pw']);
$id_val=getId($_SESSION['idn'],$_SESSION['pw']);
$_SESSION['namakarana_id']=$id_val;

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
//include "login_check.php";
//login_check($id_val);
if($_SESSION['cd']!=null && $_SESSION['cd']!="" && $_SESSION['seccode']!=null && $_SESSION['seccode']!="" && $_SESSION['cd']==$_SESSION['seccode'])
{
	 echo "You are trying more entry";
}
else    {

if($permis_val==null||$permis_val==""||($ti!=$permis_val&&$ti_all!=$permis_val)){
	
header("Location: namakarana_login.php"); /* Redirect browser */
exit();

}
else

{
	$md5val=md5($permis_val);
	$_SESSION['seccode']=$md5val;	
	$GLOBALS['seccode']=$md5val;

echo "First Entry";
$_SESSION['strg']=$_POST['strg'];
 
$_SESSION['id']=$_POST['id'];
$_SESSION['id_val']=$id_val;	

    
//header("Location: namakarana_dashboard.php");
}
}
 ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Final name Correction</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Da|Modak" rel="stylesheet"> 
  <link rel='stylesheet' id='et-shortcodes-css-css'  href='http://www.jayapatakaswami.com/wp-content/themes/Divi/epanel/shortcodes/css/shortcodes.css?ver=3.0.45' type='text/css' media='all' />
  <link rel='stylesheet' id='et-shortcodes-responsive-css-css'  href='http://www.jayapatakaswami.com/wp-content/themes/Divi/epanel/shortcodes/css/shortcodes_responsive.css?ver=3.0.45' type='text/css' media='all' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Namakarana Dashboard</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!--<meta http-equiv="refresh" content="30">-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>



/* IE10 */
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

<?php
$upd=$_SESSION['id_val'];
 include 'user_update.php';
?>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:1;width:200px;font-weight:bold;" id="mySidebar"><br>
   <div class="w3-container">
    <h3 class="w3-padding-20"> <a href="indexn.php" style= "cursor: pointer;text-decoration: none;" > <b>Home</b> </a></h3>
  </div>
  <br> <br>
  <div class="w3-bar-block">
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


<!---by date start-->

<div class="m-3">
          <form action="namakarana_by_date.php" target="_blank" method="POST" >
            <div class="form-group row">
            <div class="col-4">
            </div>
              <div class="col-4">



             

                <?php
  // $q = $_GET['qnn'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
} 
 
$sqld = "SELECT DISTINCT idate FROM date_set";
$resultd = $conn->query($sqld);
 
if ($resultd->num_rows > 0) {
  echo "<select id='change' name='idate'    class='form-control'>";
  echo "<option value='' >Namakarana By Date</option>";

  // output data of each row
    while($row = $resultd->fetch_assoc()) {
     $idate_c= $row["idate"];
echo "<option value ='$idate_c' >".$idate_c."</option>";
}  
echo "</select>";}
$conn->close();
?> 



              </div>
              <div class="col-4">
                    <button type="submit" class="btn btn-danger">Submit</button>            
               </div>
            </div>
            
          </form>
        </div>


<!---by date  end -->
  <!-- Header -->
  
  
  <?php
$arr = array("Dhaka","Chittagong","Khulna","Mymensingh","Sylhet","Barisal","Rangpur","Rajshahi");
foreach ($arr as  $value) {
 echo " <div class='w3-container' style='margin-top:80px' id='$value'> 
    <h1><b>$value Division</b></h1>
    <h1 class='w3-large w3-text-red'><b>List of temples</b></h1>
    <hr style='border:1px solid red' class='w3-round'>";
	 
 
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}
 
$sqlr = "SELECT templereg,
	templename, count(reg),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 
	FROM reg WHERE  division='".$value."'  and isinitiated!='Initiated' and isinitiated!='Absent' GROUP BY templereg";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>	<th>Progress</th> 
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= '$tregidn'  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn' and isinitiated!='Initiated' and isinitiated!='Absent'";	
		$resultp = $connr->query($sqlp);
if ($resultr->num_rows > 0) {
	while($rowp = $resultp->fetch_assoc()) {
		
	$c1=$rowp["nchoice1"];
    $c2=$rowp["nchoice2"];
    $c3=$rowp["nchoice3"];	
		
		$c1tp=0;
		$c2tp=0;
		$c3tp=0;
$c1t=	strlen(str_replace(' ','',$c1));
$c2t=	strlen(str_replace(' ','',$c2));
$c3t=	strlen(str_replace(' ','',$c3));

	if($c1t>0){$c1tp=1;}
	if($c2t>0){$c2tp=1;}
	if($c3t>0){$c3tp=1;}
	
$ccct=	$c1tp+$c2tp+$c3tp;
$cctf=0 ;
if($ccct>1){ $cctf=1 ; }
$cctff=$cctff+	$cctf;		
}
}

	echo "<tr >
		<td style='text-align:center' >".$row["templereg"]."</td>
		<td style='text-align:left; width:60%;'  > 

		<form action='namakarana_one.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		
		<td style='text-align:center' >".$row["count(reg)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td>
		<td style='text-align:center' > <progress  value='".$cctff."'   max='".$row["count(reg)"]."'>  </progress> </td>
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
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
</script>
</body>
</html>
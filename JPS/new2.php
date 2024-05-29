<?php session_start();?>
<!DOCTYPE html>
<html>
<title>Namakarana Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="refresh" content="30">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>

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

body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:1;width:200px;font-weight:bold;" id="mySidebar"><br>
   <div class="w3-container">
    <h3 class="w3-padding-20"> <a href="#" onclick="javascript:history.go(-2);return false;" target="_blank" style= "cursor: pointer;text-decoration: none;" > <b>Home</b> </a></h3>
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

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="Dhaka">
    <h1><b>Dhaka Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
    <hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Dhaka' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th> 
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= '$tregidn'  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
		
		
		
		$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		
		
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
		
		
		<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>
		
		
		
		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>

  </div>

  <!-- Services -->
  <div class="w3-container" id="Chittagong" style="margin-top:75px">
    <h1><b>Chittagong Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
	<hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Chittagong' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th> 
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
		
		
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
		
		
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>

  </div>
  
  <div class="w3-container" id="Khulna" style="margin-top:75px">
    <h1><b>Khulna Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
    <hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Khulna' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th> 
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
		
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>
  
  </div>
 

  <!-- Packages / Pricing Tables -->
  <div class="w3-container" id="Mymensingh" style="margin-top:75px">
    <h1><b>Mymensingh Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
    <hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Mymensingh' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th></th>	
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
		
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
		
		
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>

  </div>
  
  <!-- Contact -->
  <div class="w3-container" id="Sylhet" style="margin-top:75px">
        <h1><b>Sylhet Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
    <hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Sylhet' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th></th>	
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>


  </div>
  
   <div class="w3-container" id="Barisal" style="margin-top:75px">
        <h1><b>Barisal Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
    <hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Barisal' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th></th>	
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
		
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		
		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>


	</div>
	
   <div class="w3-container" id="Rangpur" style="margin-top:75px">
    <h1><b>Rangpur Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
    <hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Rangpur' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th></th>	
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
		
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		
		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>

	</div>
	
   <div class="w3-container" id="Rajshahi" style="margin-top:75px">
    <h1><b>Rajshahi Division</b></h1>
    <h1 class="w3-large w3-text-red"><b>List of temples</b></h1>
	<hr style="border:1px solid red" class="w3-round">
	<?php
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
	templename, count(ename),COUNT(NULLIF(nchoice1, '')) as c1,
	COUNT(NULLIF(nchoice2, '')) as c2,
	COUNT(NULLIF(nchoice3, '')) as c3 ,COUNT(NULLIF(finalname, '')) as fn  
	FROM reg WHERE  division='Rajshahi' GROUP BY templename";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>		<th>Temple Name</th>	<th>Total</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>   <th>&#9989;</th>		<th>Progress</th></th>	
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
	$tregidn=	$row["templereg"];
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist from tmpl where tregid= $tregidn  ";	
		$resultrin = $connr->query($sqlin);
if ($resultr->num_rows > 0) {
	while($rowin = $resultrin->fetch_assoc()) {
		
				$cctff=0;
		
		$sqlp="select   	nchoice1 ,	nchoice2 ,	nchoice3  from reg  where templereg= '$tregidn'";	
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
	

.$cctff   .

.$row["count(ename)"]    .	

	echo "<tr >
		<td style='text-align:center' >".$row["templereg"]."</td>
		<td  style='text-align:left'  > <form action='finalname.php' method='POST'><button class= 'tbutton' name='edit' type='submit' value=".$row["templereg"]." > ".$rowin["tname"].",&nbsp ".$rowin["t_addr"].",&nbsp".$rowin["t_ps"].",&nbsp".$rowin["t_dist"]." </button> </form></td>
		<td style='text-align:center' >".$row["count(ename)"]."</td>
		<td style='text-align:center' >".$row["c1"]."</td>
		<td style='text-align:center' >".$row["c2"]."</td>
		<td style='text-align:center' >".$row["c3"]."</td><td >".$row["fn"]."</td>
		
				<td style='text-align:center' > <progress  value='".$row["fn"]."'   max='".$cctff."'>  </progress> </td>

		
		</tr>";
		
}	
} 
}
    echo "</table>";
} 	else {
	echo "No---Result";     
}
$connr->close();
?>


	</div>
<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
<p class="w3-right"> Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" style= "cursor: pointer" >@hksamacar</a>   2017 </p>
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

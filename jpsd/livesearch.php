 
 

<?php
 $q = $_GET['qn'];
 
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



$sqln = "SELECT reg,nchoice1,nchoice2,nchoice3 FROM reg";
$resultn = $conn->query($sqln);
$myArrayn=array();

if ($resultn->num_rows > 0) {
    echo "<table width=100% style='  box-shadow: none;' ><tr><th colspan=2 style='text-align:center;' >Duplicate Names </th></tr> <tr><th>From Recent inputs </th> <th>%</th></tr>";
    // output data of each row
    while($row = $resultn->fetch_assoc()) {	
	$var=  strtoupper($q);
	$reg= strtoupper($row["reg"]);
 	$name1= strtoupper($row["nchoice1"]);
	$name2= strtoupper($row["nchoice2"]);
	$name3= strtoupper($row["nchoice3"]);
	
	similar_text($var, $name1, $percent1); 
    similar_text($var, $name2, $percent2); 
    similar_text($var, $name3, $percent3); 	
	
	$npercent1=round($percent1);
    $npercent2=round($percent2);
    $npercent3=round($percent3);	

if( $npercent1>80) {
	 
$myArrayn[$name1."&nbsp (".$reg.")"] = $npercent1 ;
  	
}

if( $npercent2>80) {
	 
$myArrayn[$name2."&nbsp (".$reg.")"] = $npercent2 ;
  	
}
if( $npercent3>80) {
	 
$myArrayn[$name3."&nbsp (".$reg.")"] = $npercent3 ;
  	
}	  	
}
	arsort($myArrayn);
	
	foreach($myArrayn as $x => $x_value) {
   // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
	
	

	echo "<tr style='color:BLACK; background-color:orange;font-size:12px'><td > " . $x." </td><td style='color:BLUE; font-size:10px;'>".$x_value."%   </td></tr>";
   
}
// echo "</table>";	 
		
} else {
  echo "0 results";
}




$sql = "SELECT nnn FROM ttt";
$result = $conn->query($sql);
$myArray=array();

if ($result->num_rows > 0) {
     echo " <tr><th>From Database</th><th>%</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {	
	$var=  trim(preg_replace('/\s+/', ' ', strtoupper($q)));
 	$name= trim(preg_replace('/\s+/', ' ', $row["nnn"]));
    similar_text($var, $name, $percent); 
    $stripped = trim(preg_replace('/\s+/', ' ', $sentence));		 
	$npercent=round($percent);	

if( $npercent>80) {
	 
$myArray[$name] = $npercent ;
  	
}	  	
}
	arsort($myArray);
	
	foreach($myArray as $x => $x_value) {
   // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
   
   if($x_value==100){
	
	echo "<tr style='color:white; background-color:red; font-weight: 900; ' > <td > " .   $x."</td><td >".$x_value."%  </td></tr>";
   
   
   }
   
   else {
  echo "<tr><td style='color:BLACK'> " . $x."</td><td style='color:BLUE'>".$x_value."%  </td></tr>"; 
   }
   
   
}
 echo "</table>";	 
		
} else {
  echo "0 results";
}
$conn->close();
?>
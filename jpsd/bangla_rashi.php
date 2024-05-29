<?php session_start();?>
<!DOCTYPE html>
<html>
<body>

<?php
$nm=array();
$dm=array();
 $rashi=array("tula","brishcik","dhonu","makor","kumbha","meen","sesh","brish","mithun","karkat","singha","kanna");

  //$date=date_create("2013-03-15");
//echo $f= date_format($date,"Y/m/d H:i:s");

 //echo $timestamp = strtotime("2013-03-15");
  $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT day,month,year,time,naksatra FROM pnj";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 /*   echo "<table border='2'>
	<tr>
	<th>day</th>
		<th>month</th>
	<th>year</th>
	<th>time</th>
	<th>naksatra</th>

	
	</tr>";
	*/
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		   $yy =  $row["year"];
		   $mm=$row["month"];
		   $dd= $row["day"];
		  $tt=$row["time"]; 
 
if($dd<10){
	
$dd="0".$dd;	
}
   $ft=    $yy."-".$mm."-". $dd." ".$tt; 
     $timestamp1 = strtotime($ft);
	 if($timestamp1!=""){
	 array_push($nm,$timestamp1);
	 }
    }
    //echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 sort($nm);
 $value1=0;
foreach ($nm as &$value) {
  //echo date('Y/m/d H:i:s', $value);
  if((int)$value1!=0)
  {
  $d=(int)$value-(int)$value1;
  $dff=(int)$d/4;
   $v0=(int)$value1;
  $v1=(int)$value1+(int)$dff;
  $v2=(int)$value1+2*(int)$dff;
  $v3=(int)$value1+3*(int)$dff;
    array_push($dm,$v0);

  array_push($dm,$v1);
  array_push($dm,$v2);
  array_push($dm,$v3);
    // echo date('Y/M/d H:i:s', $value1);

  }
  $value1=$value;
  
//echo "<hr>";
}
sort($dm);
$nnnn=3;

$lnm=0;
 foreach ($dm as &$ddvv) {
	 

	 if($nnnn%9==0){
	  echo"<hr>";
   echo date('Y/m/d H:i:s', $ddvv);
   $intn=floor($lnm/12);
   if($lnm==12){
	   
	$lnm=0;  
   }
   echo $rashi[$lnm];
   $lnm=$lnm+1;
	 }
$nnnn=$nnnn+1;
 }
?>

</body>
</html>
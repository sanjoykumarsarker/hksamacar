<?php
 					 						
function n_reg(){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT COUNT(NULLIF(reg,'')) as nrt FROM reg WHERE isinitiated!='Initiated' 
and isinitiated!='Absent'";

$result = $conn->query($sql);
  
    // output data of each row
    $row1 = $result->fetch_assoc();
	return $row1["nrt"];
	
$conn->close();
}

function n_psnd(){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 


$sqlp = "SELECT COUNT(NULLIF(istatus1,'')) as psnd FROM reg WHERE istatus1='Postponed' AND isinitiated!='Initiated' 
and isinitiated!='Absent'";

$result = $conn->query($sqlp);
  
    // output data of each row
    $row1 = $result->fetch_assoc();
	return $row1["psnd"];
	
$conn->close();
}

function n_check_init($a){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT reg as nrt FROM reg WHERE reg=".$a." and isinitiated='Initiated'";

$result = $conn->query($sql);
  $v=0;
 if ($result->num_rows > 0) {

  $v=1;
 }
	return $v;
	
$conn->close();

}

function n_init($tt){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
$aaa=0;
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
 

$sql="SELECT reg FROM date_set WHERE idate Like '%$tt%'";

$result = $conn->query($sql);
  
    
 if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		$init=$row["reg"];	
		$vvv=n_check_init($init);
		$aaa=$aaa+$vvv;
		
    }
} else {
    echo "0 results";
}

$conn->close();


return $aaa;
}

function n_check_absnt($a){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT reg as nrt FROM reg WHERE reg=".$a." and isinitiated='Absent'";

$result = $conn->query($sql);
  $v=0;
 if ($result->num_rows > 0) {

  $v=1;
 }
	return $v;
	
$conn->close();

}

function n_absnt($tt){
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
$aaa=0;
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
 
$dt1= date("Y-m-d", time());

$sql="SELECT reg FROM date_set WHERE idate Like '%$tt%'";

$result = $conn->query($sql);
  
    
 if ($result->num_rows > 0) {
   
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		$init=$row["reg"];	
		$vvv=n_check_absnt($init);
		$aaa=$aaa+$vvv;
		
    }
} else {
    echo "0 results";
}

$conn->close();


return $aaa;
}






function count_dev_div($a){
	
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT COUNT(NULLIF(reg,'')) as devdiv FROM reg WHERE division='".$a."' and isinitiated!='Initiated' and isinitiated!='Absent'";

$result = $conn->query($sql);
  
    // output data of each row
    $row1 = $result->fetch_assoc();
	$bb=$row1["devdiv"];
	
$conn->close();

return $bb;
}

function count_temp_div($a){
	
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT COUNT(DISTINCT(NULLIF(templereg,''))) as tmpldiv FROM reg WHERE division='".$a."' and isinitiated!='Initiated' and isinitiated!='Absent'";

$result = $conn->query($sql);
  
    // output data of each row
    $row1 = $result->fetch_assoc();
	$bb=$row1["tmpldiv"];
	
$conn->close();

return $bb;
}

function count_temp (){
	
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT COUNT(DISTINCT(NULLIF(templereg,''))) as tmpldiv FROM reg WHERE  isinitiated!='Initiated' and isinitiated!='Absent'";

$result = $conn->query($sql);
  
    // output data of each row
    $row1 = $result->fetch_assoc();
	$bb=$row1["tmpldiv"];
	
$conn->close();

return $bb;
}


?>
					

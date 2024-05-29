<?php

	$iii  = json_decode($_POST['myData'],true);
						 

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
?>








<span style='color:white' >Initiated  <?php  echo  n_init($iii); ?> </span> &nbsp
<span style='color:yellow' >Absent	<?php  echo n_absnt($iii); ?> </span>

<?php
$ipaddress_cn = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress_cn = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress_cn = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress_cn = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress_cn = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress_cn = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress_cn = getenv('REMOTE_ADDR');
    else
        $ipaddress_cn = 'UNKNOWN';
 
     
function login_check($a){
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  
$sqld = "SELECT TIMESTAMPDIFF(SECOND,c_time,now()) as td FROM con_status where  id='$a'";
$sqlc = "SELECT logoutby FROM users where  id='$a'";

$resultd = $conn->query($sqld);

$resultc = $conn->query($sqlc);
 
 
 
    // output data of each row
     $row1 = $resultd->fetch_assoc();

     $rowc = $resultc->fetch_assoc();
	 
	
	 	
	
	$t= $row1["td"];
	if($t<30){
		
		 die("YOU ARE ALREADY LOGGED ON FOR".$t."SECS AT".$ipaddress_cn."");
	echo "<script>alert('You are still logged In');</script>";	
	header("Location: index.php"); /* Redirect browser */
exit();	
	
	}
	$c= $rowc["logoutby"];
	if($c!=""){
	//echo "kkkkkk";	
	 
echo "<script type='text/javascript'>alert(\"$c\");</script>";
		    header("Location: index.php"); /* Redirect browser */

	}
	$conn->close();	
}



?>
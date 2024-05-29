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
 
     

 
 if(json_decode ($_POST['id_val'])!=null && json_decode ($_POST['id_val'])!="" && !empty(json_decode ($_POST['id_val']))  ){
 $_SESSION['id_val_m_count']= json_decode ($_POST['id_val']);
 
 }
 function login_check($aa){
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$connl = new mysqli($servername, $username, $password, $dbname);
// Check connlection
if ($connl->connect_error) {
    die("connlection failed: " . $connl->connect_error);
} 

  
$sqld = "SELECT TIMESTAMPDIFF(SECOND,c_time,now()) as td FROM con_status where  id='$aa'";
$sqlc = "SELECT logoutby FROM users where  id='$aa'";

$resultd = $connl->query($sqld);

$resultc = $connl->query($sqlc);
 
 
 
    // output data of each row
     $row1 = $resultd->fetch_assoc();

     $rowc = $resultc->fetch_assoc();
	 
	
	 	
	
	$t= $row1["td"];
	  
	$c= $rowc["logoutby"];
	if($c!=""){
		
		echo json_encode(array('some_key'=>$c));  

	 //echo "complain";	
	 //header("Location: index.php"); /* Redirect browser */
//exit();	
	
	}
	$connl->close();	
}
function setConnectionTime_cn($a,$b){
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sqld = "SELECT  count(id) FROM con_status where  id='$a'";

$resultd = $conn->query($sqld);
 
    // output data of each row
     $row1 = $resultd->fetch_assoc();
	 
	{
	
	if($row1["count(id)"]>0)
	{
		$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sqldc ="update	con_status set c_time=now(),ip='$b' where id='$a'";

  $conn->query($sqldc);
		
	}
	
	else{
		
		$sqldc4 ="insert into	con_status(id,ip,c_time)values('$a','$b',now())";

  $conn->query($sqldc4);
		
		
	}
	
	}
	
	$conn->close();	
	
	
}
 
 setConnectionTime_cn($_SESSION['id_val_m_count'],$ipaddress_cn);
 login_check($_SESSION['id_val_m_count']);


 

  
?>
 
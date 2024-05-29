<?php
session_start();
 

  include "function.php";
  
   $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
     

 
 if(json_decode ($_POST['id_val'])!=null && json_decode ($_POST['id_val'])!="" && !empty(json_decode ($_POST['id_val']))  ){
 $_SESSION['id_val_m_count']= json_decode ($_POST['id_val']);
 
 }

 
 setConnectionTime($_SESSION['id_val_m_count'],$ipaddress);
 

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 
   
$sqld = "select count(m_to_si) as mc from message where  m_to_si='".$_SESSION['id_val_m_count']."' and m_status!='read'";

$resultd = $conn->query($sqld);
 
 
	 
  //  echo " <select id='change' name='str' class='form-control'>";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
 
if($row['mc']>0)
{
echo $row['mc'];
}




 
}
 
 

$conn->close();	
?>
 

<?php
session_start();


include 'function.php';
    $id_val= json_decode($_POST['myData'],true);


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
 
     
setConnectionTime($id_val,$ipaddress);
 
 

 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 
   
//$sqld = "select users.id ,users.user_name,connection_status.id ,connection_status.c_time from users left join connection_status
//on users.id=connection_status.id order by users.user_name";

$sqld = "select user_name,id from users";

$resultd = $conn->query($sqld);
 
  
 if ($resultd->num_rows > 0) {
	 
  //  echo " <select id='change' name='str' class='form-control'>";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
 

 
 
 $gt=getDiffTime($row["id"]);
 
 
 if($gt=="" || $gt==null)
 {
	 
$gt=5000;	 
 }
 
 
 if($gt<30)
 
 {
	 
	 
 echo "<li   value='".$row["id"]."' style='padding-right: 10px'> 
					<div class='col-sm-3' style='margin-top: 3px;'>  <img style='width:40px; height:40px; '  src='../jps/logo.png' /> </div>
					<div class='col-sm-7' style='color: white;'> ".$row["user_name"]."	</div>
					<div class='col-sm-2' style='color: white; margin-top: 8px;'><i class='fa fa-cog fa-spin fa-2x fa-fw'></i>  </div>
					</li>";
					
					
					
 }			


else

{
 	
 echo "<li style='padding-right: 10px'> 
					<div class='col-sm-3' style='margin-top: 3px;'>  <img style='width:40px; height:40px; '  src='../jps/logo.png' /> </div>
					<div class='col-sm-7' style='color: white;'>
<form action=''>
					".$row["user_name"]."	
					
				</form>	
					</div>
					<div class='col-sm-2' style='color: white; margin-top: 8px;'></div>
					</li>";
						
	
	
}
 
 
 }
 
 
 
 }

 

 
  
 
	
$conn->close();	
 
?>
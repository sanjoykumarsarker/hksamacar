<?php 

   session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
 
?>

<?php session_start();?>
<!DOCTYPE html>





<html>

 
<body>

 <?php
 
 $GLOBALS['ip']  = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

 
 
	$tem=$_SESSION['temple'];
	
	 
    $bname = $_SESSION['bname'];
	$ename = $_SESSION['ename'];
	
	 
	  
	   
	$age = $_SESSION['age'];
	$address = $_SESSION['address'];
	$phone = $_SESSION['phone'];
	$service = $_SESSION['service'];
	$gender = $_SESSION['gender'];
	$education = $_SESSION['education'];
	$mstatus = $_SESSION['mstatus'];
	$nprefer = $_SESSION['nprefer'];
   
 
$servername = "204.9.187.195";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connl = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connl->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sqlreg= "SELECT  MAX(reg)  FROM reg
WHERE templereg='$tem'";

$sqlf = "SELECT 
autoid,
tregid,

t_div  ,
 t_dist , 
 t_ps  ,
 
 t_addr  ,
  tname_b , 
  
  trecom_b , 
  tname ,
   trecom , 
   t_ph    FROM tmpl WHERE tregid='$tem' ";
   
    
$resultf = $connl->query($sqlf);

 $resultreg = $connl->query($sqlreg);


 
  
    // output data of each row
    while($rowreg = $resultreg->fetch_assoc()) {
		
		$GLOBALS['tregn']=$rowreg["MAX(reg)"];
       
		
		 
		
	}
 if($GLOBALS['tregn']===NULL){
	 
$GLOBALS['tregn']=	$tem."0001" ;
	 
$GLOBALS['tregs']=(string)$GLOBALS['tregn'];	 
	 
 }

	else{
	
	$tregn = (int)$GLOBALS['tregn'];
	
	
	
	
	
	
	$tregn=$tregn+1;
	
	
	if($tregn<999999998){
		
	$GLOBALS['tregs']="0".(string)$tregn;	
		
		
	}
	
 
	



	}



$tregs= $GLOBALS['tregs'];	
	
  if($resultf->num_rows > 0) {
    
    // output data of each row
    while($row = $resultf->fetch_assoc()) {
		
				$GLOBALS['tname']=$row["tname"];

		$GLOBALS['tname_b']=$row["tname_b"];
		$GLOBALS['trecom_b']=$row["trecom_b"];
		$GLOBALS['trecom']=$row["trecom"];
		$GLOBALS['t_ph']=$row["t_ph"];
		$GLOBALS['t_addr']=$row["t_addr"];
		$GLOBALS['t_ps']=$row["t_ps"];
		$GLOBALS['t_dist']=$row["t_dist"];
		$GLOBALS['t_div']=$row["t_div"];
		$GLOBALS['autoid']=$row["autoid"];
		 
		 
		
        
		
		
    }
     
} else {
     
}

 
 
 
   
   
    
   
   
   









$sql = "INSERT INTO reg (reg , 
  bname ,
   ename , 
   age , 
   address , 
   phone  ,
   service  ,
   gender , 
   education  ,
   mstatus , 
   nprefer , 
   id , division,district,policestation,
   templename,templenameb,recom,recomb,operator,datetime,ip,templereg
  )
VALUES ('$tregs' , 
 '$bname',
   '$ename' , 
   '$age' , 
   '$address' , 
   '$phone'  ,
   '$service'  ,
   '$gender' , 
   '$education'  ,
   '$mstatus' , 
   '$nprefer' , 
   '$id', 
   '".$GLOBALS['t_div']."',
   
   
   '".$GLOBALS['t_dist']."
   
   
   
   ','".$GLOBALS['t_ps']."','".$GLOBALS['tname']."',
   '".$GLOBALS['tname_b']."','".$GLOBALS['trecom']."','".$GLOBALS['trecom_b']."','".$GLOBALS['loginname']."',NOW(), '".$GLOBALS['ip']."','$tem'
  )";

if ($connl->query($sql) === TRUE) {
    echo " <div style='text-align:center;color:blue;font-'><h2><hr><hr>Hare Krishna <br>Congratulation!<span style='color:green'> $ename</span> for  Registration.<br>
    Your Reg No:<span style='color:red'>$tregs</span><br> Your Phone Number:<span style='color:green'>$phone</span> <br>Your Name Preference:<span style='color:green'>$nprefer</span> <hr><hr></h2> <div/>" ;
} else {
    echo "Error: " . $sql . "<br>" . $connl->error;
}


$connl->close();

?> 


<a style= "text-align:center"; href= "sanreg.php" > <h3> OK, Enter New</h3> </a>
</body>


</html>
<?php
session_start();

$sescode=$_SESSION['seccode'];

if($_SESSION['nnn']==null||$_SESSION['nnn']==""||!isset($_SESSION['nnn'])){
	
die("<h1>Hare Krishna,Sorry.Session Out.Please Log in Again.Thanks</h1>");	
	
}

  $_SESSION['nnn'] =$_SESSION['nnn']+1;
if($_SESSION['nnn']>112){
	
	die("Don't Reload This Page");
}
?>
<?php session_start();?>
<!DOCTYPE html>

<html>
<head>
  <title>Temple
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
   <script>
   
  //history.pushState(null, null, document.title);
//window.addEventListener('popstate', function () {
  //  history.pushState(null, null, document.title);
})
</script>
<body>

<?php
$target_dir = "upload/";
//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));


  $sectem = $_POST['secregid'];
$tem = $_POST['regid'];
  
$dbbname = $_POST['bname'];
 
$dename = $_POST['ename']; 
$dage = $_POST['age']; 
$daddress = $_POST['address']; 
$dphone = $_POST['phone'];  
$dservice = $_POST['service'];
$drecommend = $_POST['recommend']; 
$drecommend_b = $_POST['recommend_b']; 


$dgender = $_POST['gender']; 
$deducation = $_POST['education']; 
$dmstatus = $_POST['mstatus']; 
$dnprefer = $_POST['nprefer']; 
//$dloginname = $_POST['loginname']; 
$operator_id = $_POST['operator_id'];

    
 $GLOBALS['ip']  = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');

 
 
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";


 

 
// Create connection
$connl = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connl->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}



$sql_img_id= "SELECT  MAX(image_id) as imid  FROM reg";
 

$result_img_id = $connl->query($sql_img_id);

 
  $row_img_id = $result_img_id->fetch_assoc();
	   
     $image_id= intval($row_img_id["imid"]);
	 if($image_id==''||$image_id==null||$image_id<10001||$image_id>99999){
		 
		$image_id="10001"; 
		 
	 }
	 else{
	$image_id=strval($image_id+1); 	 
		 
	 }
   
     
  


$sqlreg= "SELECT  MAX(reg)  FROM reg
WHERE templereg='".$tem."'";

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
	t_ph    FROM tmpl WHERE tregid='".$tem."' ";
   
    
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

 $target_file = $target_dir.basename($_FILES["myimage"]["name"]);
 
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($imageFileType==''||$imageFileType==null){
$GLOBALS['imagename']="i".$tregs.".jpg";
}
else{
	
$GLOBALS['imagename']="i".$tregs.".".$imageFileType;
	
}
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
	operator_id , division,district,policestation,
   templename,templenameb,recom,recomb,datetime,ip,templereg,imagename,image_id
  ) 

VALUES ('".$tregs."' , 
	'".$dbbname."',
	'".$dename."' , 
	'".$dage."' , 
	'".$daddress."' , 
	'".$dphone."'  ,
	'".$dservice."'  ,
	'".$dgender."' , 
	'".$deducation."'  ,
	'".$dmstatus."' , 
	'".$dnprefer."' , 
	'".$operator_id."', 
	'".$GLOBALS['t_div']."',
	'".$GLOBALS['t_dist']."',
	'".$GLOBALS['t_ps']."',
	'".$GLOBALS['tname']."',
	'".$GLOBALS['tname_b']."',
	'".$drecommend."',
	'".$drecommend_b."',
	NOW(), '".$GLOBALS['ip']."','$tem','".$GLOBALS['imagename']."','".$image_id."'
  )";

 

 if ($connl->query($sql) === TRUE) {

    echo " <div style='text-align:center;color:blue;font-'><h4><hr><hr>Hare Krishna <br>Congratulation!<span style='color:green'> $dbbname</span> for  Registration.<br>
    Your Reg No<span style='color:orange'>(Please Write on Paper)</span>:<span style='color:red'>$tregs</span>
	<br> Your Phone Number:<span style='color:green'>  $dphone  </span>
	<br>Your Name Preference:<span style='color:green'>$dnprefer</span>
	
		<br>Your Image ID<span style='color:orange'>(Please Write on Image)</span>:<span style='color:red'>$image_id</span>

	<hr><hr></h4> <div/>" ;
 

 
 

  $file_name = $_FILES['myimage']['name'];echo '<br>';
    $file_tmp = $_FILES['myimage']['tmp_name'];echo '<br>';
  

  $target_file = $target_dir . basename($_FILES["myimage"]["name"]);
 
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $image_size=getimagesize($_FILES['myimage']['tmp_name']);
	
	$iplace="upload/"."i".$tregs.".".$imageFileType;
  move_uploaded_file($file_tmp,$iplace);
  

		echo '<img src= "'.$iplace.'" align=center height=180 width=160>';

		echo "<script>alert(Please Write Down".$image_id." on image and ".$tregs."on paper);</script>";
		
	} else {
    echo "Error: " . $sql . "<br>" . $connl->error;
}
 $connl->close();

 	?> 
 
<form method="post" action="login.php">

<input type="hidden" name="code" value="<?php echo $sectem; ?>">

<button class="btn btn-warning" type ="submit "> OK, Enter New</button>
</form>
</body>
  </body>
  
 
  
  </html>
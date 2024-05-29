 

<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
<body>

<?php

include 'function.php';
$nregid =  json_decode($_POST['myData'],true);


if($nregid == NULL ){
	
	
	die("Input Missing");
	
}




$include =  json_decode($_POST['include'],true);
$date= json_decode($_POST['date'],true);
$place=  json_decode($_POST['place'],true);
$tithi=  json_decode($_POST['tithi'],true);
$group=  json_decode($_POST['group'],true);
  
  

 
$countut=0;
$countud=0;
 $count=0;
 $flag="ok";
  
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connd = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connd->connect_error) {
     die("Connection failed: " . $connd->connect_error);
}
 
 foreach ($nregid as $templeid) {
	 
	 
 
$sqld = "SELECT reg,
bname ,ename,finalname,templename ,postponed  FROM reg WHERE reg like '$templeid%' ";


   
$resultd = $connd->query($sqld);


	
    
	while($row = $resultd->fetch_assoc()) {
		$connu = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connu->connect_error) {
     die("Connection failed: " . $connu->connect_error);
}
if(dup_count($row["reg"])>0){
	
	echo "found ".$row["reg"]."as duplicate in temple"."<br>";
	$sqlupdate="update date_set set reg='".$row["reg"]."',bname='".$row["bname"]."',ename='".$row["ename"]."',sname='".$row["finalname"]."',place='".$place."',tithi='".$tithi."',igroup='".$group."',idate='".$date."' where reg='".$row["reg"]."'";
 
if ($connu->query($sqlupdate) === TRUE) {
		
   $countut=$countut+1;
   echo "Updated".$row["reg"]."in temple<br>";
}	
	
}
else  {
	
	$postponed=$row["postponed"];
if($postponed!='Postponed')	{
	
$sqlinsert="INSERT INTO date_set(reg,bname,ename,sname,place,tithi,igroup,idate)VALUES('".$row["reg"]."','".$row["bname"]."','".$row["ename"]."','".$row["finalname"]."','".$place."','".$tithi."','".$group."','".$date."')";

}
 
 // $sqlinsert="INSERT INTO date_set(sname,group)values('".$row["finalname"]."','".$group."')";

	if ($connu->query($sqlinsert) === TRUE) {
		
   $count=$count+1;
   echo "inserted".$row["reg"]."<br>";
}

else
{ $flag="Failed to insert";}
       	 
 }
 }
 echo "<br>".$count."  records inserted in".$templeid."<br>";
 echo "<br>".$countut."  records updated in".$templeid."<br>";
 }
 echo "<br>".$flag; 
 $connd->close();
 
 
 
 
 
 
 
 
 
  $count1=0;
 
 
  if($include[0] == NULL){
	
	
	 
	
	
	die(" No Extra Included  ");	
} 
 
 $connd = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connd->connect_error) {
     die("Connection failed: " . $connd->connect_error);
}
 
 foreach ($include as $templeid) {
	 
	 
 
$sqld = "SELECT reg,
bname ,ename,finalname,templename   FROM reg WHERE reg ='$templeid' ";


   
$resultd = $connd->query($sqld);


	
    
	while($row = $resultd->fetch_assoc()) {
		$connu = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connu->connect_error) {
     die("Connection failed: " . $connu->connect_error);
}

if(dup_count($row["reg"])>0){
	
	echo "found ".$row["reg"]."as duplicate in included devotees"."<br>";

	$sqlupdate="update date_set set reg='".$row["reg"]."',bname='".$row["bname"]."',ename='".$row["ename"]."',sname='".$row["finalname"]."',place='".$place."',tithi='".$tithi."',igroup='".$group."',idate='".$date."' where reg='".$row["reg"]."'";
 
if ($connu->query($sqlupdate) === TRUE) {
		
   $countud=$countud+1;
   echo "Updated".$row["reg"]."in included devotees<br>";
}	
	
	}
	else{
		
		if($postponed!='Postponed')	{
$sqlinsert="INSERT INTO date_set(reg,bname,ename,sname,place,tithi,igroup,idate)VALUES('".$row["reg"]."','".$row["bname"]."','".$row["ename"]."','".$row["finalname"]."','".$place."','".$tithi."','".$group."','".$date."')";
		}
 // $sqlinsert="INSERT INTO date_set(sname,group)values('".$row["finalname"]."','".$group."')";

	if ($connu->query($sqlinsert) === TRUE) {
   $count1=$count1+1;
  echo "inserted".$row["reg"]."<br>";  
}

else
{ $flag="Failed to insert";}
       	 
 }
	}
 echo "<br>".$count1."  records inserted in".$templeid."<br>";
  echo "<br>".$countud."  records updated in".$templeid."<br>";
 }
 echo "<br>".$flag; 
 $connd->close();





















 
 
?>















</body>
</html>
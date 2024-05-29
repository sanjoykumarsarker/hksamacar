 

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
$include =  json_decode($_POST['include'],true);


$date= json_decode($_POST['date'],true);
$place=  json_decode($_POST['place'],true);
$tithi=  json_decode($_POST['tithi'],true);
$group=  json_decode($_POST['group'],true);

if($nregid == NULL || $nregid ==""){
	
	
	die("Input Missing");
	
}


if($date == NULL || $date ==""){
	
	
	die("Date Missing");
	
}
if($place == NULL || $place ==""){
	
	
	die("Place Missing");
	
}
if($tithi == NULL || $tithi ==""){
	
	
	die("Tithi Missing");
	
}

if($group == NULL || $group ==""){
	
	
	die("Group Missing");
	
}






  
  

 
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
bname ,ename,finalname,templename    FROM reg WHERE reg like '$templeid%' and istatus1!='Postponed' and istatus1!='Listed'  ";


   
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
 	$sqlupdate_reg="update reg set istatus1='Listed',place='".$place."',idate='".$date."' where reg='".$row["reg"]."'";

if (($connu->query($sqlupdate) === TRUE)&&($connu->query($sqlupdate_reg) === TRUE)) {
		
   $countut=$countut+1;
   echo "Updated".$row["reg"]."in temple<br>";
}	
	
}
else  {
	
 
	
$sqlinsert="INSERT INTO date_set(reg,bname,ename,sname,place,tithi,igroup,idate)VALUES('".$row["reg"]."','".$row["bname"]."','".$row["ename"]."','".$row["finalname"]."','".$place."','".$tithi."','".$group."','".$date."')";

 $sqlinsertup="update reg set istatus1='Listed' where reg='".$row["reg"]."'";
 
 // $sqlinsert="INSERT INTO date_set(sname,group)values('".$row["finalname"]."','".$group."')";

	$connu->query($sqlinsertup);

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
bname ,ename,finalname,templename    FROM reg WHERE reg like '$templeid%' and istatus1!='Postponed' and istatus1!='Listed'  ";



   
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
 $sqlupdate_reg="update reg set istatus1='Listed',place='".$place."',idate='".$date."' where reg='".$row["reg"]."'";

if (($connu->query($sqlupdate) === TRUE)&&($connu->query($sqlupdate_reg) === TRUE)) {
   $countud=$countud+1;
   echo "Updated".$row["reg"]."in included devotees<br>";
}	
	
	}
	else{
		 
 $sqlinsert="INSERT INTO date_set(reg,bname,ename,sname,place,tithi,igroup,idate)VALUES('".$row["reg"]."','".$row["bname"]."','".$row["ename"]."','".$row["finalname"]."','".$place."','".$tithi."','".$group."','".$date."')";
	

	$sqlinsertup="update reg set istatus1='Listed' where reg='".$row["reg"]."'";
 
 // $sqlinsert="INSERT INTO date_set(sname,group)values('".$row["finalname"]."','".$group."')";

	$connu->query($sqlinsertup);	 
 
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
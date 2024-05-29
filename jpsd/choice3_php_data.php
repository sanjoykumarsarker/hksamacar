<?php

session_start();
 
// $_SESSION['cd']

 
$namakarana_user=$_SESSION['idn'];
$namakarana_id=$_SESSION['id_val']
 
 
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
 <body>
 
 
 <?php

 $flag_gen=1;
  $regid= strtoupper($_POST['regid']);
  $nch1= strtoupper($_POST['nnn1']);
 
  
 

  $nch2= strtoupper($_POST['nnn2']);
 
 
  $nch3= strtoupper($_POST['nnn3']);
  $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



  
$sqld="SELECT  ename,gender FROM reg where reg='".$regid."' ";

$resultd = $conn->query($sqld);
 
  
 
 
    // output data of each row
     $row1 = $resultd->fetch_assoc();
	$gender= $row1["gender"];

	$ename= $row1["ename"];
	
	 
  
  
  
  
  if (!preg_match("/DAS$/",trim($nch1) )&&$gender=="Male"&&$nch1!="") {
echo '<script language="javascript">';
echo 'alert( "Gender Confused! '.$nch1.'  Male?")';
echo '</script>';
$flag_gen=0;
		  exit();
  
  }
  
  
   if (!preg_match("/DAS$/",trim($nch2) )&&$gender=="Male"&&$nch2!="") {
echo '<script language="javascript">';
echo 'alert( "Gender Confused! '.$nch2.'  Male?")';
echo '</script>';
$flag_gen=0;
		  exit();
  
  }
  
   if (!preg_match("/DAS$/",trim($nch3) )&&$gender=="Male"&&$nch3!="") {
echo '<script language="javascript">';
echo 'alert( "Gender Confused! '.$nch3.'  Male?")';
echo '</script>';
$flag_gen=0;
		  exit();
  
  }
  
  
   if (!preg_match("/(DD$)|(DASI$)/",trim($nch1) )&&$gender=="Female"&&$nch1!="") {
echo '<script language="javascript">';
echo 'alert( "Gender Confused! '.$nch1.'  Female?")';
echo '</script>';
$flag_gen=0;
		  exit();
  
  }
  
   if (!preg_match("/(DD$)|(DASI$)/",trim($nch2) )&&$gender=="Female"&&$nch2!="") {
echo '<script language="javascript">';
echo 'alert( "Gender Confused! '.$nch2.'  Female?")';
echo '</script>';
$flag_gen=0;
		  exit();
  
  }
  
   if (!preg_match("/(DD$)|(DASI$)/",trim($nch3) )&&$gender=="Female"&&$nch3!="") {
echo '<script language="javascript">';
echo 'alert( "Gender Confused! '.$nch3.'  Female?")';
echo '</script>';
$flag_gen=0;
		  exit();
  
  }
   if (trim($nch1) == '')
{
 //string is only whitespace
 
	  
$nch1="alpha";	  
	  
}
  if (trim($nch2) == '')
{
 //string is only whitespace
 
	  
$nch2="alpha";
	  
}
  if (trim($nch3) == '')
{
 //string is only whitespace
 
	  
$nch3="alpha"; 
	  
}
 
 
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}









$sqln = "SELECT reg,nchoice1,nchoice2,nchoice3 FROM reg where reg !=$regid";
$resultn = $conn->query($sqln);

$sqln1 = "SELECT nnn FROM ttt" ;
$resultn1 = $conn->query($sqln1);
$myArrayn=array();
if ($resultn1->num_rows > 0) {
     
    while($row1 = $resultn1->fetch_assoc()) {	
	 
 	$namen= strtoupper($row1["nnn"]);
	 
	 
	  
	  $nament=str_replace(' ','',$namen);
	  $nch1t=str_replace(' ','',$nch1);
	 $nch2t=str_replace(' ','',$nch2);
	 $nch3t=str_replace(' ','',$nch3);
	   
	   

	if($nch1t==$nament){
		
		echo '<script language="javascript">';
echo 'alert( " '.$nch1.' \n Exists in Database")';
echo '</script>';
		
		  exit();
		
		
		
	}
	
	if($nch2t==$nament){
		
		echo '<script language="javascript">';
echo 'alert( " '.$nch2.' \n Exists in Database")';
echo '</script>';
		
		  exit();
		
		
		
	}
	
	if($nch3t==$nament){
		
		echo '<script language="javascript">';
echo 'alert( " '.$nch3.'\n Exists in Database")';
echo '</script>';
		
	 exit();
		
		
		
	}
	
	 	

 
 
}
// echo "</table>";	 
		
} 

if ($resultn->num_rows > 0) {
    echo "<table width=100% style='  box-shadow: none;' ><tr><th colspan=2 style='text-align:center;' >Duplicate Names </th></tr> <tr><th>From Recent inputs </th> <th>ID</th></tr>";
    // output data of each row
    while($row = $resultn->fetch_assoc()) {	
	 
 	$name1n= strtoupper($row["nchoice1"]);
	$name2n= strtoupper($row["nchoice2"]);
	$name3n= strtoupper($row["nchoice3"]);
	$reg= strtoupper($row["reg"]);
	
	$name1=str_replace(' ','',$name1n);
	$name2=str_replace(' ','',$name2n);
	$name3=str_replace(' ','',$name3n);
	
	
	
	
	
	
	$nch1t=str_replace(' ','',$nch1);
	 $nch2t=str_replace(' ','',$nch2);
	 $nch3t=str_replace(' ','',$nch3);
	
	
	if($nch1t==$name1 || $nch1t==$name2 || $nch1t==$name3 ){
		
		echo '<script language="javascript">';
echo 'alert("'.$nch1.' \n Exists in Input")';
echo '</script>';
		
		 exit();
		
		
		
	}
	
	
	if($nch2t==$name1 || $nch2t==$name2 || $nch2t==$name3 ){
		
		echo '<script language="javascript">';
echo 'alert("'.$nch2.'\n  Exists in Input")';
echo '</script>';
		
	  exit();
		
		
		
	}
	
	
	if($nch3t==$name1 || $nch3t==$name2 || $nch3t==$name3 ){
		
		echo '<script language="javascript">';
echo 'alert("'.$nch3.'\n  Exists in Input")';
echo '</script>';
		
		  exit();
		
		
		
	}
	
	 	

 
 
}
// echo "</table>";	 
		
} 


else {
   
}









 if ($nch1 =="alpha")
{
 //string is only whitespace
 
	  
$nch1="";	  
	  
}

 if ($nch2 =="alpha")
{
 //string is only whitespace
 
	  
$nch2="";	  
	  
}

 if ($nch3 =="alpha")
{
 //string is only whitespace
 
	  
$nch3="";	  
	  
}

 
$sqlu= "UPDATE reg SET nchoice1='$nch1',nchoice2='$nch2',nchoice3='$nch3',namakarana_id='$namakarana_id',namakarana_time=now()  WHERE reg= '$regid'";

 
 
 if($flag_gen==1){
 $resultu = $conn->query($sqlu);


 }
 
$conn->close();

 
 ?>
 

 <script>
 var nch1 = <?php echo json_encode($nch1); ?>;
 var nch2 = <?php echo json_encode($nch2); ?>;
 var nch3 = <?php echo json_encode($nch3); ?>;
 var regid = <?php echo json_encode($regid); ?>;
alert(regid+"=❶"+nch1+"❷"+nch2+"❸"+nch3);
  </script>
 
  </body>
  </html>
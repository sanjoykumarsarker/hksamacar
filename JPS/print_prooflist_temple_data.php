<style>


th{	
	text-align: center;}
	
p {margin-bottom: 0em;
 margin-top: 0.2em;} 

.rtd 		{
			text-align: left;
			padding: 0 0 0 0;
			display: inline-block;
			width: 1.8em;
			line-height: 1.8;
			} 

.rtd>span	{
			display:inline-block;
			white-space: nowrap;
			transform: translate(0,100%) rotate(-90deg);
			transform-origin: 0 0;
			vertical-align: bottom;
			text-align: left;
			}
.rtd>span:before	{
			content: "";
			float: left;
			margin-top: 100%;
			}
			


	
</style>
 
<?php

 include 'function.php';
 $si=1; 
 
 $q  = json_decode($_POST['myData'],true);
  
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

echo "<h5 style='text-align:center;'> Proof List for Devotee Data </h5>";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 
  
$sqlr = "SELECT tname,t_addr, t_dist from tmpl where tregid='$q' ";
	
	$resultr = $conn->query($sqlr);
	
if ($resultr->num_rows > 0) {
	 
	
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
       	echo "<h5 style='text-align:center;'><u> ". $row["tname"].",&nbsp".$row["t_addr"].",&nbsp".$row["t_dist"]." </u></h5>";
    }
     
}
else {
	echo "No---Result";     
}
$conn->close();




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


    
$sqld = "SELECT  iserial, reg, ename,bname,age,address,phone,service,gender,recom,
education,mstatus,nprefer,nchoice1,nchoice2,nchoice3,finalname, finalname_b

 FROM reg where reg like '$q%' and  isinitiated!='Initiated' and  isinitiated!='Absent'";

$resultd = $conn->query($sqld);
 
  echo "<table class='table-bordered' style='font-size:10px;'  >
  <tr >
  <th width='3%'>#</th>
  <th width='47%'>Devotee Info</th>
  <th width='3%'>#</th>
  <th width='47%'>Devotee Info</th>
  </tr>";
  

  if ($resultd->num_rows > 0) {
 
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
		
		$qq=$q;
		
	 	if(empty($st)){
		 	$st=1; 
		 	 } 
	 	  $ss=$q;
 if($st!=$ss)
	 { 
		
	$GLOBALS['c']=2;
	
	 $st=$q;
	 }
	
	if ($GLOBALS['c'] % 2 == 0) {
   
	
echo "<tr >
<td style='text-align: center'>".$row["iserial"]."</td>

<td style='padding: 5px'>
<p>Reg: ".$row["reg"]." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Mob: ".$row["phone"]."</p>  
<p>Name: <b>".$row["ename"]." [".$row["bname"]."]</b> </p> 
<p>Add: ".$row["address"]."</p>
<p>Service: ".$row["service"]." &nbsp Age: ".$row["age"]."</p>
<p>RC: ".$row["recom"]."</p> 
<p>Gender: <b>".$row["gender"]."&nbsp [".$row["mstatus"]."]</b> 
&nbsp Qua:  ".$row["education"]."
&nbsp Lila:  <b>".$row["nprefer"]."</b></p>
</td>";

	} else{
echo "
<td style='text-align: center'>".$row["iserial"]."</td>

<td style='padding: 5px'>
<p>Reg: ".$row["reg"]." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Mob: ".$row["phone"]."</p>  
<p>Name: <b>".$row["ename"]." [".$row["bname"]."]</b> </p> 
<p>Add: ".$row["address"]."</p>
<p>Service: ".$row["service"]." &nbsp Age: ".$row["age"]."</p>
<p>RC: ".$row["recom"]."</p> 
<p>Gender: <b>".$row["gender"]."&nbsp [".$row["mstatus"]."]</b> 
&nbsp Qua:  ".$row["education"]."
&nbsp Lila:  <b>".$row["nprefer"]."</b></p>
</td></tr>";		
		
	}

$GLOBALS['c']= $GLOBALS['c']+1;	
	
	$si=$si+1;
	
	} 

echo "</table>";
}
else {
	echo "No---Result";     
}
 	
$conn->close();
?> 
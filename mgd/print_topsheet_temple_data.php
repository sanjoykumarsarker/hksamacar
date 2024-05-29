
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
 $si=0; 
 $t="";
  $q  = json_decode($_POST['myData'],true);
  
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

echo "<h5 style='text-align:center;'> Top Sheet for Devotee Data </h5>";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 
 $sqld = "SELECT  count(reg) as tt FROM reg where   templereg='$q' ";

$resultd = $conn->query($sqld);
 
    // output data of each row
     $row1 = $resultd->fetch_assoc();
	 
	 $tnm0=  $row1["tt"];
	  $sqldt = "SELECT  tname_b  FROM tmpl   where tregid='$q' ";

$resultdt = $conn->query($sqldt);
 
    // output data of each row
     $row1t = $resultdt->fetch_assoc();
	 
	 $tnm= $row1t["tname_b"];
	 echo "<h3 style='text-align: center;'> ".$tnm."Total:<span style='font-size:50'>".$tnm0."</span></h3>";
  
$sqlr = "SELECT reg,iserial,ename,bname,age,phone,mstatus,gender,templename from reg where templereg='$q' ";
	
	$resultr = $conn->query($sqlr);
	
if ($resultr->num_rows > 0) {
	 
	echo "<table style='font-size:10px;'><tr>
	<th>Serial</th><th>REG</th><th>B.Name</th>
	<th>E.Name</th><th>Age</th><th>Phone</th>
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
		$si=$si+1;
		$t=$row["templename"];
		 echo "<tr>
		 <td> ".$row["iserial"]."</td>
		 <td>" . $row["reg"]. "</td>
		 <td>" . $row["bname"]. "</td>
		 <td> " . $row["ename"]. "</td>
		 <td> " . $row["age"]. "</td>
		 <td> " . $row["phone"]. "</td>
		 
 
		 
		 
		 
		 </tr>";
     }
 echo " <table>";   
}
else {
	echo "No---Result";     
}
$conn->close();



?>
<style>
th{	
	text-align: center;}
p {margin-bottom: 0em;
 margin-top: 0em;} 

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
 
 $q  = json_decode($_POST['myData'],true);
  
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

echo "<header> <div style='text-align:center;' > ";
echo "Date: ____________________ &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";

echo "<b> HARINAM INITIATION</b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspPlace: ____________________________ </div> <br> </header>";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


    
$sqld = "SELECT  iserial, reg, ename,bname,age,address,service,gender,recom,
education,mstatus,nprefer,nchoice1,nchoice2,nchoice3,finalname, finalname_b

 FROM reg where reg like '$q%' and  isinitiated!='Initiated' and  isinitiated!='Absent'";

$resultd = $conn->query($sqld);
 
  echo "<table class='table-bordered'  >
  <tr  height='100' >
  <th width='5%' >#</th>
  <th width='40%'  >
  Name, Occupation / Department, Age, M/F, Place, Preference/Qualification/Marital Status</th>
  <th><div class='rtd' > <span>Recommend.</span></div></th>
  <th><div class='rtd' > <span>Pract. Test</span></div></th>
  <th><div class='rtd' > <span>Philo. Test</span></div></th>
  <th><div class='rtd' > <span>Essay</span></div></th>
  <th><div class='rtd' > <span>I.D.C.</span></div></th>
  <th><div class='rtd' > <span>Init. Oath</span></div></th>
  <th><div class='rtd' > <span>Disc.Census </span></div></th>
  <th><div class='rtd' > <span>Photo</span></th>
  <th width='40%' >Choice of Spiritual Names</th>
  </tr>";
  

  if ($resultd->num_rows > 0) {
 
    // output data of each row
    while($row = $resultd->fetch_assoc()) {

echo "<tr  >
<td style='text-align: center'>".$row["iserial"]."</td>
<td style='padding: 5px'>
<p>Reg: <u>".$row["reg"]."</u> </p> 
<p>Name: <b>".$row["ename"]."</b> </p> 
<p>Service/Dept: <u>".$row["service"]."</u> 
&nbsp Age: ".$row["age"]."</p>
<p>Place: <u>".$row["address"]."</u></p> 
<p>RC: <u>".$row["recom"]."</u></p> 
<p>Gender: <b >".$row["gender"]."&nbsp[".$row["mstatus"]."]</b> 
 Qua: <u>".$row["education"]."</u>
 Lila: <b style='border: 0.5px solid black; border-radius: 10px; padding: 2px;'>".$row["nprefer"]."</b></p>
</td>

<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td style='padding: 5px'>
	<p>1. ".$row["nchoice1"]."</p> 
	<p>2. ".$row["nchoice2"]."</p> 
	<p>3. ".$row["nchoice3"]."</p> 
	<p style='margin-top: 5px'>S.Name:<b style='border: 0.5px solid black; border-radius: 10px; padding: 3px;'>".$row["finalname"]."</b> </p>
	<p style='margin-top: 3px'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <u>".$row["finalname_b"]."</u> </p>
</td>




</tr>";
	
 	

		
}


	
} 

echo "</table>";
 	
$conn->close();
?> 	

 
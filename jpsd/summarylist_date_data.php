<style>
body {
	background:#1f1f1f;
    font-family: 'Open Sans', sans-serif;
}

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

 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sqld_data = "SELECT  place,tithi,igroup FROM  date_set  where idate='$q'";

$resultd_dt = $conn->query($sqld_data);
   $row_dt = $resultd_dt->fetch_assoc();
	 
		  
echo "<header> <div style='text-align:center;' > ";
echo "Date:".$q."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";

echo "<b> HARINAM INITIATION</b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspPlace:  ".$row_dt["place"]." </div> <br> </header>";
 
    
$sqld = "SELECT  iserial, reg, ename,bname,age,address,service,gender,recom,
education,mstatus,nprefer,nchoice1,nchoice2,nchoice3,finalname, finalname_b

 FROM reg   where idate='$q' ORDER BY cast( iserial AS unsigned )";

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
	 
	 $qq=substr($row["reg"], 0, 6);
	
	 
	 if(empty($st)){
		 
		$st=1; 
		 
	 } 
	 
	  $ss=substr($row["reg"], 0, 6);
 
  if($st!=$ss)
	 { 
 
	//echo" <div style='background-color:green;color:white;'>$ss</div>";
	 
	$st=substr($row["reg"], 0, 6);
}

if(ispostponed($row["reg"])==$row["reg"])
{echo "<tr  >
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

else
{
echo "<tr  >
<td style='text-align: center'>".$row["iserial"]."</td>
<td style='padding: 5px'>
<p>Reg: <u>".$row["reg"]."</u> </p> 
<p>Name: <b> </b> </p> 
<p>Service/Dept: <u> </u> 
&nbsp Age:  </p>
<p>Place: <u> </u></p> 
<p>RC: <u> </u></p> 
<p>Gender: <b > &nbsp[ ]</b> 
 Qua: <u> </u>
 Lila: <b style='border: 0.5px solid black; border-radius: 10px; padding: 2px;'> </b></p>
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
	<p>1.  </p> 
	<p>2.  </p> 
	<p>3.  </p> 
	<p style='margin-top: 5px'>S.Name:<b style='border: 0.5px solid black; border-radius: 10px; padding: 3px;'> </b> </p>
	<p style='margin-top: 3px'>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <u> </u> </p>
</td>




</tr>";

} 
	
		}  

  

}
echo "</table>";
 	
$conn->close();
?> 	

 
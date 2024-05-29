<?php session_start();?>
<!DOCTYPE html>
<html>

<style>

#pgr{
	
	height:200;
	width:200;
	}
	

	#prgs {
		border-bottom: 0px solid #ddd;
		padding: 0px 0px 0px 0px;
		text-align:center;		
	}

 
</style>
<body>

<?php
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

$nncount=0;
$max_val= max_of_nnirnaya_back(10);
$a=array();
for($i=0;$i<10;$i++){
	
$date = strtotime("-".$i." day", time());
$dt1= date("Y-m-d", $date);

array_push($a,"".$dt1."");

$b=array();




}

//print_r($a);
// Create connection
  echo "<div id='pgr'> <table>";
foreach($a as $at){
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  count(namanirnaya_time) as nrt FROM reg 
WHERE namanirnaya_time like'".$at."%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$time = strtotime($at);

$newformat = date('M d',$time);
$nncount=$nncount+$row["nrt"];
array_push($b,$row["nrt"]);

		echo "<tr id='prgs'>
<td style='width:50px'><span style='display:none;'>".$at."</span> ".$newformat."</td>
<td style='width:100px'><progress value=".$row["nrt"]." max='".$max_val."'></progress></td>
<td>".$row["nrt"]."</td>
</tr>";
    }
   
} else {
    echo "0 results";
}

$conn->close();

}
 echo "</table></div>";
?>
<hr style="margin-bottom:0px;">
Total: 
<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT COUNT(NULLIF(finalname, '')) as nrt FROM reg WHERE isinitiated!='Initiated' and isinitiated!='Absent'";
$result = $conn->query($sql);
  
    // output data of each row
    $row1 = $result->fetch_assoc();
	echo $row1["nrt"];
	
$conn->close(); 
?>

&nbsp &nbsp &nbsp	In last 10 days:<?php echo $nncount;?>


                <div style="text-align:center;">
                <img src="images/up-small.png" alt=""> <?php echo max($b);?> Max. | <img src="images/down-small.png" alt=""><?php echo min($b);?> Min.
                </div>

 
</body>
</html>
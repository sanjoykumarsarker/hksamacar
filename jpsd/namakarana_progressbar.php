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

 $cctff=0;
$max_val= max_of_nkarana_back(10);
$a=array();
$b=array();
$nncount=0;
for($i=0;$i<10;$i++){
	
$date = strtotime("-".$i." day", time());
$dt1= date("Y-m-d", $date);

array_push($a,"".$dt1."");

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
$sql = "SELECT  count(namakarana_time) as nrt
  
 FROM reg 
WHERE namakarana_time like'".$at."%' ";


$sqlr = "SELECT NULLIF(nchoice1, '') as c1,
	NULLIF(nchoice2, '') as c2,
	NULLIF(nchoice3, '') as c3 
	FROM reg WHERE isinitiated!='Initiated' and isinitiated!='Absent'";
	
	
	
	
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

 echo "</table> </div>";
 
?>

<hr style="margin-bottom:0px;">
Total: <?php
 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 $cctff=0;
  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlr = "SELECT NULLIF(nchoice1, '') as c1,
	NULLIF(nchoice2, '') as c2,
	NULLIF(nchoice3, '') as c3 
	FROM reg WHERE isinitiated!='Initiated' and isinitiated!='Absent'";
	
	
		$resultp = $conn->query($sqlr);

	while($rowp = $resultp->fetch_assoc()) { 
		
	$c1=$rowp["c1"];
    $c2=$rowp["c2"];
    $c3=$rowp["c3"];	
		
		$c1tp=0;
		$c2tp=0;
		$c3tp=0;
$c1t=	strlen(str_replace(' ','',$c1));
$c2t=	strlen(str_replace(' ','',$c2));
$c3t=	strlen(str_replace(' ','',$c3));

	if($c1t>0){$c1tp=1;}
	if($c2t>0){$c2tp=1;}
	if($c3t>0){$c3tp=1;}
	
$ccct=	$c1tp+$c2tp+$c3tp;
$cctf=0 ;
if($ccct>1){ $cctf=1 ; }
 $cctff=(int)$cctff+(int)$cctf;	

	

}

echo $cctff;

 

$conn->close();


?> &nbsp &nbsp &nbsp	In last 10 days:<?php echo $nncount;?>


                <div style="text-align:center;">
                <img src="images/up-small.png" alt=""> <?php echo max($b);?> Max. | <img src="images/down-small.png" alt=""><?php echo min($b);?> Min.
                </div>

</body>
</html>
<?php
 
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

$conn->close();
?>

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
	$row1["nrt"];
	
	
	$percentage= ($row1["nrt"]/$cctff)*100;
	
	return round( $percentage, 2, PHP_ROUND_HALF_UP);
	
	
$conn->close(); 
?>





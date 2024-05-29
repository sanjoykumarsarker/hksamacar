
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

$conn = new mysqli($servername, $username,$password, $dbname);

$result = $conn->query("SELECT finalname, reg,ename,age,nchoice1 FROM reg where templereg='075901'");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"Name":"'  . $rs["reg"] . '",';
  $outp .= '"City":"'   . $rs["ename"]        . '",';
  $outp .= '"Country":"'. $rs["nchoice1"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>

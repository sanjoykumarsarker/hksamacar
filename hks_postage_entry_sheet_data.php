<?php include_once "session_check.php";  ?>
<?php  
  $servername = "localhost";
   $username = "HKSamacar_local";
  $password = "Jpsk/1866";
  $dbname = "HareKrishnaSamacar";
  $agcpy=$_POST["agcpy"];
  $vername=$_POST["vername"];
  $weight=$_POST["b_weight"];
  $postage=$_POST["b_ticket"];


// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");

if(doubleval($weight)>0){
  $sql_all = "update   tblIssue set weight='".$weight."' where  vername = '".$vername."' and agcpy = '".$agcpy."'";
  $conn_all->query($sql_all);
 
  //  echo "<script> alert('".$weight."->".$agcpy."')</script>";
  // $mm = notification("New value Updated to $weight", "success");
  $mm = "New value Updated to <b class=\"text-danger\">$weight</b>";
   echo "<script> parent.postMessage('$mm', '*')</script>";
  // echo notification("Record updated successfully", "success");
}



if(doubleval($postage)>0){
  $sql_all = "update tblIssue set postage='".$postage."' where  vername = '".$vername."' and agcpy = '".$agcpy."'";
  $conn_all->query($sql_all);
 
     // output data of each row
  //  echo "<script> alert('".$postage."->".$agcpy."')</script>";
  $mm = "New value Updated to <b class=\"text-danger\">$postage</b>";
  echo "<script> parent.postMessage('$mm', '*')</script>"; 

}

$conn_all->close();
?>
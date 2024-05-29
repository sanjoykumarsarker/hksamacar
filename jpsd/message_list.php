
<?php

  include "function.php";
  $id_val= json_decode($_POST['myData'],true);

 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


echo "<li><br></li>";
   
$sqld = "select m_to_si,m_from_si,body,m_time ,id from message where m_from_si='$id_val' or m_to_si='$id_val' order by id asc";

$resultd = $conn->query($sqld);
 
  
 if ($resultd->num_rows > 0) {
	 
  //  echo " <select id='change' name='str' class='form-control'>";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
 

 if($row["m_from_si"]==$id_val){
 
 
 
 
 
 
 
 echo "<li style='width:100%'>  
                       <div class='msj macro'> 
                            <div class='text text-l'>
                                <p>".$row["body"]."</p>
                                <p><small></small></p>
                            </div>
                        </div>
                  </li>";
 
 }
 else{

 
 
 
 
  echo "<li style='width:100%;'>
                        <div class='msj-rta macro'>
                            <div class='text text-r'>
                            <p>".$row["body"]."</p>
                                <p><small></small></p>
                            </div>
                        <div class='avatar' style='padding:0px 0px 0px 10px !important'></div>                               
                  </li>";
 
 }
 
 
}  

echo "<br><br><br><br><br><br>";

}
 
  
	echo "<li><br><br><br><br><br><br></li>";
	
$conn->close();	
 
?>
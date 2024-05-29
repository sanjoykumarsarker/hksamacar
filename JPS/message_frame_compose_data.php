<?php
session_start();
 

  include "function.php";
   
  
 if(json_decode ($_POST['to'])!=null && json_decode ($_POST['to'])!="" && !empty(json_decode ($_POST['to']))  ){
 $_SESSION['to']= json_decode ($_POST['to']);
 
 }

if(json_decode ($_POST['id_from'])!=null && json_decode ($_POST['id_from'])!="" && !empty(json_decode ($_POST['id_from']))  ){
 $_SESSION['id_from']= json_decode ($_POST['id_from']);
 
 } 
 
 

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 
   
$sqld = "select m_to_si,m_from_si,body,m_time ,id from message where ( m_from_si='".$_SESSION['id_from']."' or m_from_si='".$_SESSION['to']."') and ( m_to_si='".$_SESSION['from']."' or m_to_si='".$_SESSION['to']."')  order by id asc";

$resultd = $conn->query($sqld);
 
  echo " <ul style='list-style-type:none ;'>";
 if ($resultd->num_rows > 0) {
	 
  //  echo " <select id='change' name='str' class='form-control'>";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
 

 if($row["m_from_si"]==$_SESSION['id_from']){
 

 
 echo "<li style='width:90%'>  
                       <div class='msj macro'> 
                            <div class='text text-l'>
							 
								  <p>".$row["body"]."</p>
								  <p><small>".$row["m_time"]."</small></p>
                            </div>
                        </div>
                  </li>";
 }
else{

echo "<li  style='width:90%;'>
                        <div class='msj-rta macro'>
                            <div class='text text-r'>
								<p>".$row["body"]."</p>
								  <p><small>".$row["m_time"]."</small></p>
                            </div>
							<div class='avatar' style='padding:0px 0px 0px 10px !important'></div>
						</div>                               
                  </li>";
}

 
} 
 
}
 
echo"</ul>";
 
$conn->close();	
?>
 
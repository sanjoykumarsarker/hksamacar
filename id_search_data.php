<?php
 
 $id=$_GET["q"];
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

?> 
 <?php
 

// Create connection
$conn_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_id,"utf8");



 
$sql_id = "SELECT Name ,Co ,Des, Org ,vill, po, ps, dist, phone, mob ,paymode,ag_quantity FROM tblMem where ID_EN =$id";
$result_id = $conn_id->query($sql_id);

if ($result_id->num_rows > 0) {
    // output data of each row
    $row = $result_id->fetch_assoc();
          $GLOBALS['Name']= $row["Name"];
          $GLOBALS['address']= $row["Co"].$row["Des"].$row["Org"].$row["vill"].$row["po"].$row["ps"].$row["dist"];
          $GLOBALS['phone']= $row["phone"].$row["mob"];
          $GLOBALS['paymode']= $row["paymode"].$row["ag_quantity"];
} else {
    echo "0 results";
}
$conn_id->close();
?> 

  
            
            
            
            <table class="table table-bordered table-sm table-hover">
										<tbody>
										<tr>
											<td>Name</td>
											<td><?php echo $GLOBALS['Name'];?></td>
											<td>Mobile</td>
											<td><?php echo $GLOBALS['phone'];?></td>
										</tr>
										<tr>
											<td>Address</td>
                                            <td><?php echo $GLOBALS['address'];?></td>
											<td>Description</td>
                                            <td><?php echo $GLOBALS['paymode'];?></td>
										</tr>
										</tbody>
									</table>
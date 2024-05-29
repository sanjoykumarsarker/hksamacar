
<?php
   
    $data = array();
    $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

$conn=mysqli_connect( $servername, $username, $password , $dbname);

    $query=mysqli_query($conn, "SELECT * FROM reg") or die(mysqli_error());
 
 
    while($fetch=mysqli_fetch_array($query)){
        $data[] = $fetch;
    }
 
    echo json_encode($data);
 
?>
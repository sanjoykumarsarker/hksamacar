 

<?php 
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

$conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT message_body from  message_universal limit 1";
$stmt = $conn->prepare($query);
$ts = time();

while(true) 
{
 
        $row = $result->fetch_assoc();
        echo "data: " . $row['message_body'] . "\n\n";
        $ts = $row['message_body'];
        flush();
 
    sleep(2);
}
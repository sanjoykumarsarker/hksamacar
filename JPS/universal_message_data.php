<?php

echo $message_type=$_POST["message_type"];

echo $message_body=$_POST["message_body"];
$servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


     
    $sqld = "insert into message_universal(message_type,message_body) values ('$message_type','$message_body')";

    $resultd = $conn->query($sqld);

    ?>
<?php

header("content-type: application/json");

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
    case 'GET':
        echo '{"status":false,"message":"method not allowed"}';
        break;
    case 'POST':
        login();
        break;
    default:
        echo '{"status":false,"message":"method not allowed"}';
        break;
}


function login(){
    // database credentials
    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    // database connection
    $connection = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($connection,"utf8");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }   
    
    // request 
    $username = $_POST["user_name"];;
    $password = $_POST["password"];;
    $query = "SELECT * FROM `users` WHERE `user_name` = '$username' && `password` = '$password';";

    // check result
    $result = $connection->query($query);

    if($result->num_rows > 0){
        echo '{"status":true,"message":"success"}';
    }else {
        echo '{"status":false,"message":"credentials not matched"}';
    }

}

    
?>
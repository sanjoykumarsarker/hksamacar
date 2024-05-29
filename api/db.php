<?php

function make_connection(){
    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    $connection = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($connection,"utf8");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($connection) {
        return $connection;
    }
}
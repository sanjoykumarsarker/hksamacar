<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
header("Access-Control-Allow-Origin: *");
// header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_HOST']);
// $allowed_domains = [
//     'https://harekrishnasamacar.com',
//     'https://www.harekrishnasamacar.com',
//     'http://harekrishnasamacar.com',
//     'http://www.harekrishnasamacar.com',
// ];
$http_origin = "http://www.harekrishnasamacar.com";

// header("Access-Control-Allow-Origin: $http_origin");


// function requestedByTheSameDomain()
// {
//     return strtolower($_SERVER['HTTP_HOST']) === parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
// }

// if (!requestedByTheSameDomain()) {
//     http_response_code(401);
//     exit('Not OK');
// }
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// header("Access-Control-Allow-Methods: OPTIONS,GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, x-csrf-token");

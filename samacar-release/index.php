<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
$data = json_decode(file_get_contents('release.json'), true);

echo json_encode(end($data));

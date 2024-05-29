<?php
if (!defined('SUPER_ACCESS')) die('Direct access not permitted');
date_default_timezone_set('Asia/Dhaka');

require_once '../classes/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../classes');
$dotenv->load();

if (!function_exists('connect_db')) {
    function connect_db()
    {
        $connection = new mysqli('localhost', $_ENV['USER_NAME'], $_ENV['PASSWORD'], $_ENV['BOOKS_DB']);
        mysqli_set_charset($connection, "utf8");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        if ($connection) {
            return $connection;
        }
    }
}

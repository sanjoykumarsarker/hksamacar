<?php
define('SUPER_ACCESS', 1);
include_once "./_partial/base.php";
include_once "./_partial/db.php";
// include_once "../session_check.php";

$DB = connect_db();



function clean_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function createQuery()
{
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $name = clean_input(filter_var($data['name'], FILTER_SANITIZE_STRING));
    $en_name = clean_input(filter_var($data['en_name'], FILTER_SANITIZE_STRING));
    $category_id = clean_input(filter_var($data['category_id'], FILTER_SANITIZE_STRING));
    $retail_price = clean_input(filter_var($data['retail_price'], FILTER_SANITIZE_STRING)) ?? 0;
    $wholesale_price = clean_input(filter_var($data['wholesale_price'], FILTER_SANITIZE_STRING)) ?? 0;
    $created_at = $data['created_at'];
    $sql = "INSERT INTO `books` (name, en_name, category_id, retail_price, wholesale_price, created_at)
        VALUES('$name', '$en_name', $category_id, $retail_price, $wholesale_price, '$created_at')";
    return $sql;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $result = $DB->query(createQuery());
        if ($result) {
            $last_id = $DB->insert_id;
            echo json_encode(['message' => 'New Book Added Successfully', 'id' => $last_id]);
        } else {
            echo json_encode(['message' => 'Sorry! Attempt Failed, Try Again']);
        }
    } catch (\Throwable $th) {
        echo json_encode(['message' => $th->message]);
    }
}
$DB->close();
exit();

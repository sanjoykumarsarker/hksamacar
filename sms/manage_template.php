<?php
include_once "../session_check.php";

$DB = make_connection();

function clean_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function getData($update = false)
{
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $name = clean_input(filter_var($data['name'], FILTER_SANITIZE_STRING));
    $message = clean_input(filter_var($data['message'], FILTER_SANITIZE_STRING));
    $status = clean_input(filter_var($data['status'], FILTER_SANITIZE_STRING));
    $id = clean_input(filter_var($data['id'], FILTER_SANITIZE_STRING));
    $query = clean_input(filter_var($data['query'], FILTER_SANITIZE_STRING));
    $settings = clean_input(filter_var($data['settings'], FILTER_SANITIZE_STRING)) ?? NULL;
    $status = $status ?: 0;

    if (empty($name) || empty($message)) {
        http_response_code(400);
        echo "Error: Please fillup the input";
        exit();
    }
    global $DB;

    if ($update) {
        $sql = "UPDATE `sms_template` SET name='$name', message='$message', status='$status', query='$query', settings='$settings' WHERE id=$id";
    } else {
        $sql = "INSERT INTO `sms_template` (name, message, status, query, settings)
                VALUES ('$name', '$message', '$status', '$query', '$settings')";
    }
    if ($DB->query($sql) === TRUE) {
        echo $update ? 'Record Updated' : "New record created" . " successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $DB->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = clean_input(filter_var($_GET['id'], FILTER_SANITIZE_STRING));
    if (empty($id)) {
        http_response_code(400);
        echo "Error: ID not found";
        exit();
    }
    $sql = "DELETE FROM `sms_template` WHERE id=$id";
    if ($DB->query($sql) === TRUE) {
        echo  "Deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $DB->error;
    }
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    getData(true);
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    getData(false);
    exit();
} else {
    $get_sms_query = $DB->query("SELECT * FROM `sms_template`");
    $templates = [];
    while ($row = $get_sms_query->fetch_assoc()) {
        $templates[] = $row;
    }
    echo json_encode($templates, JSON_UNESCAPED_UNICODE);
}
$DB->close();
exit();

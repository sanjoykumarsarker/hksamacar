<?php include_once "../session_check.php";  ?>
<?php
// var_dump($_POST);
header('Content-Type: application/json');
$res = ['msg' => 'Welcome from Hare Krishna Samacar'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $project_id = isset($_POST['project_id']) ? (int) $_POST['project_id'] : null;
    $id;
    $status;

    if (!empty($_POST['received'])) {
        $id = $_POST['received'];
        $status = "received";
    } elseif (!empty($_POST['returned'])) {
        $id = $_POST['returned'];
        $status = "returned";
    }

    $user = trim($id);

    if (!$user) exit('NO DATA');
    $num = preg_match("/\d+/", $user, $found);
    if ($num) {
        $user_id = (int) end($found);
    } elseif (is_numeric($user)) {
        $user_id = (int) $user;
    } else {
        exit('NO DATA');
    }

    $date = $_POST['date'];
    $received_at = date("Y-m-d H:i:s");

    $DB = make_connection();
    $sql = "UPDATE orders
        SET status='$status',
            updated_at='$received_at'
        WHERE id=$user_id";

    if ($DB->query($sql) === TRUE) {
        $_SESSION['message'] = "Record updated successfully";
    } else {
        $_SESSION['message'] = "Error: " . $DB->error;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
    // $res = ['project' => $project_id, 'user' =>  $user_id];
    // echo json_encode($res, JSON_UNESCAPED_UNICODE);
    // exit();
}
echo json_encode($res, JSON_UNESCAPED_UNICODE);

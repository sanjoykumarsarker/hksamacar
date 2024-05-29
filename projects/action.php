<?php include_once "../session_check.php";  ?>
<?php

header('Content-Type: application/json');
$res = ['msg' => 'Welcome from Hare Krishna Samacar'];
if (isset($_POST['id']) && $_POST['method'] === 'delete') {
    $DB = make_connection();
    $id = $_POST['id'];
    $sql = "DELETE FROM orders WHERE id=$id";

    $result = $DB->query($sql);
    if ($result === true) {
        $res = ['msg' => "Successfully Deleted"];
    } else {
        $res = ['msg' => $DB->error ?? "Try Again!"];
    }
}

if ($_POST['method'] === 'PUT') {
    $id = $_POST['oid'];
    $customer_name = $_POST['customer_name'];
    $customer_mobile = $_POST['customer_mobile'];
    $customer_address = $_POST['customer_address'];
    $items = trim($_POST['items']);
    $status = trim($_POST['status']);
    $details = trim($_POST['details']);
    $payment_type = trim($_POST['payment_type']);
    $send_mode = trim($_POST['send_mode']);
    $price = trim($_POST['price']);
    $amount = intval($price) * intval($items);

    $DB = make_connection();
    $sql = "UPDATE orders
    SET items='$items',
        customer_name='$customer_name',
        details='$details',
        `status`='$status',
        amount='$amount',
        customer_mobile='$customer_mobile',
        customer_address='$customer_address',
        payment_type='$payment_type',
        send_mode='$send_mode',
        price='$price'
    WHERE id=$id";

    if ($DB->query($sql) === TRUE) {
        $_SESSION['message'] = "Record updated successfully";
    } else {
        $_SESSION['message'] = "Error updating record: " . $DB->error;
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

echo json_encode($res, JSON_UNESCAPED_UNICODE);

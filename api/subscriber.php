<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'db.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
$res = '';


/**
 * Add New Transaction
 * @param string $db, $quantity, $subscriber_id, $price, $paymode, $user
 * @return bool 
 */
function addNewTransaction($db, $quantity, $subscriber_id, $price, $paymode, $user)
{
    $sql = "SELECT MAX(transaction_id) as transaction_id, MAX(transid) as transid, MAX(idx) as idx FROM tblMain";
    $result_id = $db->query($sql);
    $row = $result_id->fetch_assoc();
    if ($row["transaction_id"] > 0) {
        $transaction_id = $row["transaction_id"] + 1;
        $transid = $row["transid"] + 1;
        $idx = (int) ($row["idx"] + 1);

        $cdate = date("Y-m-d h:i:sa");
        $rdate = date("Y-m-d");
        $period = " ";
        $payTypID = " ";
        $Resrcpy = $quantity;
        $Dis = " ";
        $AgCatId = " ";
        $Discontinued = "FALSE";
        $NonConditioned = "FALSE";

        $transaction_query = "INSERT INTO tblMain 
        (idx,transid ,id, cdate ,rdate,price,period,payTypID,paymode,Resrcpy,Dis,AgCatId,Discontinued,NonConditioned,transaction_id,user)
        VALUES ($idx,$transid,$subscriber_id,'$cdate','$rdate','$price','$period','$payTypID','$paymode',$Resrcpy,'$Dis','$AgCatId','$Discontinued','$NonConditioned',$transaction_id,$user)";

        return $db->query($transaction_query);
    } else {
        return false;
    }
}

/**
 * New ID for Subscriber Insert
 * @param 
 * @return string $id
 */
function getNewId($db){
    $sql = "SELECT ID FROM tblMem ORDER BY ID DESC LIMIT 1";
    return (int) $db->query($sql)->fetch_row()[0] +1;
}

/**
 * Renew Subscriber
 * @param array [id, price, quantity, payment_mode, user]
 * @return array $response
 */

if (isset($_POST['renew'])) {
    $subscriber_id = $_POST['id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $paymode = $_POST['paymode'];
    $user = $_POST['user'] ?? 'app';

    $db = make_connection();    

    $update_query = "UPDATE tblMem SET balance=balance+$quantity, user=$user, status= 'CONT' WHERE ID_EN = $subscriber_id";
    $transaction_complete = addNewTransaction($db, $quantity, $subscriber_id, $price, $paymode, $user);

    if ($transaction_complete && $db->query($update_query)) {
        echo json_encode(['data' => 'success', 'error' => mysqli_error($db) ?? false]);
    } else {
        echo json_encode(['data' => 'failed', 'error' => mysqli_error($db)]);
    }
}

/**
 * @param array []
 * @return array $response
 */

if (isset($_POST['new_subscriber'])) {
    // $subscriber_id = $_POST['id'];
    // $price = $_POST['price'];
    // $quantity = $_POST['quantity'];
    // $paymode = $_POST['paymode'];
    // $user = $_POST['user'] ?? 'app';
    
    // $transaction_complete = addNewTransaction($db, $quantity, $subscriber_id, $price, $paymode, $user);
    
    // $new_subscriber_query = "INSERT INTO tblMem (ID,ID_EN,Name,vill,po,po_bn,ps,dist,cont,phone,mob,email,user,balance,comment,ag_date,status)
    //                         VALUES ($ID,$ID_EN,$Name,$vill,$po,$po_bn,$ps,$dist,$cont,$phone,$mob,$email,$user,$balance,$comment,$ag_date,$status)";
    $db = make_connection();
    echo json_encode(['data' => getNewId($db), 'error' => mysqli_error($db)]);
}

if (isset($_GET['new_subscriber_id'])) {
    $db = make_connection(); 
    echo  json_encode(['id'=>getNewId($db)]);
}
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Methods: OPTIONS,GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, x-csrf-token");


//get the last-modified-date of this very file
$lastModified = filemtime(__FILE__);
//get a unique hash of this file (etag)
$etagFile = md5_file(__FILE__);
//get the HTTP_IF_MODIFIED_SINCE header if set
$ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);
//get the HTTP_IF_NONE_MATCH header if set (etag: unique file hash)
$etagHeader = (isset($_SERVER['HTTP_IF_NONE_MATCH']) ? trim($_SERVER['HTTP_IF_NONE_MATCH']) : false);

//set last-modified header
header("Last-Modified: " . gmdate("D, d M Y H:i:s", $lastModified) . " GMT");
//set etag-header
header("Etag: $etagFile");
//make sure caching is turned on
header('Cache-Control: public');

//check if page has changed. If not, send 304 and exit
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $lastModified || $etagHeader == $etagFile) {
    header("HTTP/1.1 304 Not Modified");
    exit;
}

require_once 'db.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
$res = [];

$subscriber_id = $uri[3] ?? '';
if ($subscriber_id) {
    $db = make_connection();
    $statement = "SELECT ID_EN,Name,Des,Org,vill,po,po_bn,ps,dist,mob,phone,status,ag_quantity,balance,comment FROM tblMem  WHERE ID_EN=$subscriber_id";
    $query = $db->query($statement);
    $res['data'] = $query ? $query->fetch_assoc() : 'Not Found';
} else {
    $subscriber = [];
    $search = $_GET['search'] ?? ' ';
    $status = $_GET['status'] ?? 'CONT';
    $offset = $_GET['offset'] ?? 0;
    $limit = $_GET['limit'] ?? 15;

    $statement = "SELECT ID_EN,Name,ag_quantity FROM tblMem
                WHERE (ID_EN    LIKE '%$search%'
                       OR Name  LIKE '%$search%'
                       OR mob   LIKE '%$search%'
                       OR phone LIKE '%$search%')
                       AND status LIKE '$status' ";

    $withoffset = $statement . " LIMIT $limit OFFSET $offset";

    $db = make_connection();

    $total = $db->query($statement)->num_rows ?? 0;
    $query = $db->query($withoffset);

    if ($query->num_rows > 0) {
        while ($a = $query->fetch_assoc()) {
            $subscriber[] = [
                'id' => (int) $a['ID_EN'],
                'name' => $a['Name'],
                'quantity' => (int) $a['ag_quantity']
            ];
        }
        $res['data'] = $subscriber;
        $res['total'] = $total;
        $res['error'] = false;
    } else {
        $res['data'] = array();
        $res['msg'] = 'Devotee Not Found';
        $res['error'] = true;
    }
}

echo json_encode($res);

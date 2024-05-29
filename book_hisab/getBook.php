<?php
define('SUPER_ACCESS', 1);
include_once "./_partial/base.php";
include_once "./_partial/db.php";
// include_once "../session_check.php";

$DB = connect_db();

$sql = "SELECT category_id, id, name, en_name FROM books ORDER BY category_id ASC, name";
$data = [];
$get_data = $DB->query($sql);
while ($row = $get_data->fetch_assoc()) {
    $data[] =  [
        'id' => intval($row['id']),
        'name' => $row['name'],
        'en_name' => $row['en_name'],
        // 'sort_key' => $row['sort_key'] ? intval($row['sort_key']) : null,
        'amount' => 0,
    ];
}
$total = $get_data->num_rows;

echo json_encode(['total' => $total, 'data' => $data], JSON_UNESCAPED_UNICODE);

$DB->close();
exit();

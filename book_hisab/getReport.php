<?php
define('SUPER_ACCESS', 1);
include_once "./_partial/base.php";
include_once "./_partial/db.php";
// include_once "../session_check.php";
$DB = connect_db();

$month = date('n', strtotime($_GET['date'] ?? date('d-m-Y')));
$year = date('Y', strtotime($_GET['date'] ?? date('d-m-Y')));

$sql = "SELECT category.name as category, SUM(hisab.amount) as total FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id LEFT JOIN category ON category.id=books.category_id  WHERE YEAR(hisab.created_at)=$year AND MONTH(hisab.created_at)=$month GROUP BY category";

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'all') {
        $sql = "SELECT books.name, hisab.amount FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id WHERE YEAR(hisab.created_at) = $year AND MONTH(hisab.created_at) = $month";
    } elseif ($_GET['type'] == 'hkp') {
        $sql = "SELECT books.name, hisab.amount FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id WHERE YEAR(hisab.created_at) = $year AND MONTH(hisab.created_at) = $month AND books.category_id =1";
    } else {
        die('sorry');
    }
}

$data = [];
$get_data = $DB->query($sql);
while ($row = $get_data->fetch_assoc()) {
    $data[] = $row;
}
$DB->close();

echo json_encode($data, JSON_UNESCAPED_UNICODE);

exit();

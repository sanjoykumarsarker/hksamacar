<?php
define('SUPER_ACCESS', 1);
include_once "./_partial/base.php";
include_once "./_partial/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DB = connect_db();
    $data = json_decode(file_get_contents("php://input"), TRUE);

    $sql = "INSERT INTO hisab(book_id,amount,created_at) VALUES";
    $values = [];
    foreach ($data as $value) {
        $book_id = $value['id'];
        $amount = $value['amount'];
        $date = $value['date'];
        $values[] = "($book_id, $amount,'$date')";
    }
    $sql .= implode(', ', $values);

    try {
        $result = $DB->query($sql);
        if ($result) {
            echo json_encode(['message' => 'Data Saved Successfully']);
        } else {
            echo json_encode(['message' => 'Sorry! Attempt Failed, Try Again', 'error' => $DB->error, 'sql' => $sql]);
        }
    } catch (\Throwable $th) {
        echo json_encode(['message' => $th->message]);
    }

    $DB->close();
}

exit();
// SELECT category.name as category, books.name, hisab.amount, hisab.created_at FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id LEFT JOIN category ON category.id=books.category_id WHERE YEAR(hisab.created_at)=2022 AND MONTH(hisab.created_at)=3
// SELECT hisab.*, books.name,books.category_id, category.name as category FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id LEFT JOIN category ON category.id=books.category_id
// SELECT category.name as category, SUM(hisab.amount) as total FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id LEFT JOIN category ON category.id=books.category_id  WHERE MONTH(hisab.created_at)=4 GROUP BY category
// SELECT category.name as category, SUM(hisab.amount) as total FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id LEFT JOIN category ON category.id=books.category_id GROUP BY category
// SELECT * FROM `hisab` WHERE month(created_at)=3 AND year(created_at)=2022
// SELECT books.name, hisab.amount FROM `hisab` LEFT JOIN books ON books.id=hisab.book_id WHERE MONTH(hisab.created_at) = 3
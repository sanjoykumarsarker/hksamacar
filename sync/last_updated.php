<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

clearstatcache();
$file = 'samacar.db';

$db = new SQLite3($file);
$results =(int) $db->querySingle('SELECT changed_at FROM syncs ORDER BY id DESC LIMIT 1');

header('Content-Type: application/json');
$res = ['updated_at'=>filemtime($file), 'changed_at'=>$results, 'size'=>filesize($file)];

echo json_encode($res);

?>
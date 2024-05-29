<?php

// $filename = 'pic_'.date('YmdHis') . '.jpeg';
// $filename = $_POST['name'] . '.jpg';
$filename = $_POST['name'];
$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_POST['data']));

$url = '../upload/' . $filename;

file_put_contents($url, $data);

if (file_exists($url)) {   		
	echo 'true';
} else {
	echo 'false';
}

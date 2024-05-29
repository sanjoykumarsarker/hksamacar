<?php
include_once './ENV.php';

use Env;

(new Env(__DIR__ . '/.env'))->load();

$url = 'http://api.greenweb.com.bd/g_api.php';
$data = [
    "token" => getenv('API_TOKEN'),
    "expiry" => '', 'rate' => '', 'totalsms' => '', 'balance' => ''
];
$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$smsresult = curl_exec($ch);

//Result
echo json_encode(explode('</br>', $smsresult));

//Error Display
echo curl_error($ch);

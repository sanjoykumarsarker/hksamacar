<?php
include_once './ENV.php';

use Env;

(new Env(__DIR__ . '/.env'))->load();


// $token = getenv('API_TOKEN');


$to = "01715758948";
$message = "sms renewal by hare krishna samacar";

$url = "http://api.greenweb.com.bd/api.php";


$data = array(
    'to' => "$to",
    'message' => "$message",
    'token' => "$token"
); // Add parameters in key value
//$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$smsresult = curl_exec($ch);

//Result
echo $smsresult;

//Error Display
echo curl_error($ch);

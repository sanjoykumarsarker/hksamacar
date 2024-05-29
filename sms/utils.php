<?php
include_once dirname(__FILE__)  .'/ENV.php';
// if (!defined('SUPER_ACCESS')) die('Direct access not permitted');

// use Env;

(new Env(dirname(__FILE__)  . '/.env'))->load();

function sendSms($data, $print = true, $type = 'non-mask')
{
    $url = getenv('API_URL');
    $token = getenv('API_TOKEN');
    // if ($type === 'masking') {
    //     $url = getenv('MASKING_API_URL');
    //     $token = getenv('MASKING_API_TOKEN');
    // }
    $data = $data + ['token' => $token];
    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
    if ($print) {
        echo $smsresult;
        echo curl_error($ch);
        exit();
    }
    return $smsresult ?? curl_error($ch);
}


function bangla_month_name($month)
{
    $bn_month = array("জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর");
    $en_month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    return str_replace($en_month, $bn_month, $month);
}

function msg_replacer($msg)
{
    $search_array = [
        ':b_month',
        ':b_next_month',
        ':b_prev_month',
        ':e_month',
        ':e_next_month',
        ':e_prev_month'
    ];
    $replace_array = [
        bangla_month_name(date('F')),
        bangla_month_name(date('F', strtotime("+1 months"))),
        bangla_month_name(date('F', strtotime("-1 months"))),
        date('F'),
        date('F',  strtotime("+1 months")),
        date('F',  strtotime("-1 months")),
    ];
    $msg = str_replace($search_array, $replace_array, $msg);
    return $msg;
}

function db_connection()
{
    $servername = "localhost";
    $username = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');
    $dbname = getenv('DB_NAME');

    $connection = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($connection, "utf8");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if ($connection) {
        return $connection;
    }
}

function getMessageText($name)
{
    $DB = function_exists('make_connection') ? make_connection() : db_connection();
    $message_query = $DB->query("SELECT message FROM sms_template WHERE name='$name' ")->fetch_row();
    return $message_query[0];
}

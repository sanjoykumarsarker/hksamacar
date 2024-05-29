<?php
define('SUPER_ACCESS', true);
header("Access-Control-Allow-Headers: Content-Type");
include_once "../session_check.php";
include_once "./utils.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (!(strtolower($_SERVER['HTTP_HOST']) === parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST))) {
    http_response_code(401);
    echo "Access Blocked";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), TRUE);

    $type = filter_var($data['type'], FILTER_SANITIZE_STRING);
    $to = filter_var($data['to'], FILTER_SANITIZE_STRING);
    $message = filter_var($data['text'], FILTER_SANITIZE_STRING);
    $test = filter_var($data['testing'], FILTER_VALIDATE_BOOLEAN) ?? 0;

    if (empty($type) || empty($message)) {
        http_response_code(400);
        echo 'NO Data';
        exit();
    }

    if ($type === 'static') {
        $message = msg_replacer($message);

        $data = [
            'to' => "$to",
            'message' => "$message"
        ];
        sendSms($data);
    } elseif ($type === 'dynamic') {
        $all = $data['all'];
        $jsonsmsdata = [];
        foreach ($all as $value) {
            $msg = str_replace([':id'], [$value['id']], $message);
            $jsonsmsdata[] = ["to" => $value['mobile'], "message" => $msg];
        }
        // $smsdata = '[' . $jsonsmsdata . ']';
        $smsdata = json_encode($jsonsmsdata, JSON_UNESCAPED_UNICODE);

        echo $smsdata;
        exit();
    } elseif ($type === 'details') {
        $jsonsmsdata = [];
        $all = $data['all'];
        foreach ($all as $value) {
            $courier_name = "পোস্ট অফিসে";
            if (!in_array($value['courier_name'], ['vp', 'vpp'])) {
                $courier_name = $value['courier_name'] . ' কুরিয়ারে';
            }
            $msg = str_replace([':date', ':courier_name', ':vp_no'], [$value['sent_date'], $courier_name, $value['vp_no']], $message);
            $jsonsmsdata[] = ["to" => $value['mobile'], "message" => $msg];
        }
        $smsdata = json_encode($jsonsmsdata, JSON_UNESCAPED_UNICODE);
        if ($test) {
            echo $smsdata;
            exit();
        } else {
            sendSms(['smsdata' => $smsdata]);
        }
    }
} else {
    echo "Access Blocked";
    exit();
}

exit();

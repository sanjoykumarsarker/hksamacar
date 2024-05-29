<?php
include_once "../session_check.php";
$DB = make_connection();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_HOST']);

function getLatestIssue()
{
    global $DB;
    $issueNumber = '';
    $get_latest_issue_query = "SELECT issue FROM `products` ORDER BY products.date DESC LIMIT 1";
    $get_latest_issue = $DB->query($get_latest_issue_query);
    while ($row = $get_latest_issue->fetch_assoc()) {
        $issueNumber = $row['issue'];
    }
    return $issueNumber;
}

function agentNumbersWithDetails($courier)
{
    global $DB;
    $issue = getLatestIssue();
    $numbers = [];
    $sql = "SELECT tblMem.mob as mobile, transid, vername, VPNo, SentDate, sent_mode FROM tblIssue LEFT JOIN tblMem ON tblIssue.transid = tblMem.ID_EN WHERE (tblIssue.transid<10000 AND tblIssue.vername=$issue ";
    if ($courier) {
        $sql = $sql . " AND tblIssue.sent_mode NOT LIKE '%vp%')";
    } else {
        $sql = $sql . " AND tblIssue.sent_mode LIKE '%vp%')";
    }
    $get_numbers = $DB->query($sql);
    while ($row = $get_numbers->fetch_assoc()) {
        $numbers[] = [
            'mobile' => $row['mobile'],
            'vp_no' => $row['VPNo'],
            'sent_date' => date('d M', strtotime($row['SentDate'])),
            'courier_name' => $row['sent_mode'],
        ];
    }
    $total = $get_numbers->num_rows;
    return json_encode(['total' => $total, 'data' => $numbers], JSON_UNESCAPED_UNICODE);
}

function numberOfAllPaused($for)
{
    $sql = "SELECT tblMem.mob as mobile, Name FROM tblMem WHERE status='DISCONT' AND mob!=''";
    $agent = " AND ID_EN < 10000";
    $subs = " AND ID_EN > 10000";
    $query = '';
    if ($for == 'subs') {
        $query = $sql . $subs;
    } else if ($for == 'agent') {
        $query = $sql . $agent;
    } else {
        $query = $sql;
    }

    echo outputResult($query);
}

function numbersByIssue($issue = 'latest', $for = 'subscriber')
{
    $issueNumber = ($issue === 'latest') ? getLatestIssue() : $issue;
    $transid_limit = 9999;
    $sql = "SELECT tblMem.mob as mobile, Name, transid FROM tblIssue LEFT JOIN tblMem ON tblIssue.transid = tblMem.ID_EN WHERE vername=$issueNumber AND ";
    if ($for === 'subscriber') {
        $sql .= " (transid>$transid_limit)";
    } elseif ($for === 'agent') {
        $sql .= " (transid<$transid_limit)";
    }

    echo outputResult($sql);
}

function numbersByCustomQuery($sql)
{
    echo outputResult($sql);
}

function outputResult($sql)
{
    global $DB;
    $numbers = [];
    $result = $DB->query($sql);
    while ($row = $result->fetch_assoc()) {
        $numbers[] = ['name' => $row['Name'], 'mobile' => $row['mobile'], 'id' => $row['transid']];
    }
    $total = $result->num_rows;
    return json_encode(['total' => $total, 'data' => $numbers], JSON_UNESCAPED_UNICODE);
}

function requestedByTheSameDomain()
{
    return strtolower($_SERVER['HTTP_HOST']) === parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
}

if (!requestedByTheSameDomain()) {
    $DB->close();
    http_response_code(401);
    echo 'Not OK';
    exit();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        $type = filter_var($data['type'], FILTER_DEFAULT);
        $issue = filter_var($data['issue'], FILTER_DEFAULT);
        $sql = $data['query'];
        $for = filter_var($data['for'], FILTER_DEFAULT);
        $method = filter_var($data['method'], FILTER_DEFAULT);
        $seperate = filter_var($data['seperate'], FILTER_DEFAULT);

        if ($method === 'details') {
            echo agentNumbersWithDetails($seperate == 'courier');
            exit();
        }
        if ($method === 'static' || isset($method)) {
            if (empty($type)) {
                http_response_code(400);
                echo 'NO Data';
                exit();
            } elseif ($type === 'paused') {
                numberOfAllPaused($for);
                exit();
            } elseif ($type === 'custom') {
                // numbersByCustomQuery($sql);
                // function htmlspecialchars_decode_PHP4($uSTR)
                // {
                //     return strtr($uSTR, array_flip(get_html_translation_table(HTML_ENTITIES, ENT_QUOTES)));
                // }
                // echo htmlspecialchars_decode_PHP4($sql);
                exit();
            } elseif ($type === 'issue') {
                if (empty($issue) || $issue === 'latest') {
                    numbersByIssue('latest', $for);
                    exit();
                } else {
                    numbersByIssue($issue, $for);
                    exit();
                }
            }
        } else {
            http_response_code(400);
            echo 'Method not defined';
            exit();
        }
    }
}
$DB->close();
exit();
// http://harekrishnasamacar.com/sms/get_numbers.php

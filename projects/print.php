<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../classes/banglaNumberToWord.php';
?>
<!DOCTYPE html>
<html>

<head>

    <title>Print Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon1.ico" />
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39 Text' rel='stylesheet'>
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->

    <style>
        #barcode {
            font-family: 'Libre Barcode 39 Text';
            font-size: 40px;
            text-align: center;
        }

        .bottom_aligner {
            display: inline-block;
            padding: .25in 0.15in 0.15in 0.15in;
            height: 100%;
            vertical-align: bottom;
            width: 0px;
        }

        table,
        tr,
        td {
            border: 0px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 2px;
            text-align: left;
        }


        .page-courier {
            width: 6in;
            max-width: 6in;
            min-height: 10.6in;
            padding: 200px 50px 20px 50px;
            margin: 1cm auto;
            border: .5px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            page-break-after: always;
        }

        .page-courier table,
        .page-courier tr,
        .page-courier td {
            border: 2px solid black;
            border-collapse: collapse;
        }

        .page-courier th,
        .page-courier td {
            padding: 10px;
            text-align: Center;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 15px;
        }

        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <?php
if (!isset($_GET['pid'])) {
    exit('Sorry! Project not Found');
}

$types = ['custom', 'courier', 'post'];
$converter = new BanglaNumberToWord();
$pid = $_GET['pid'];

$sql = "SELECT orders.*, projects.name as project_name FROM orders LEFT JOIN projects ON projects.id=orders.project_id WHERE orders.project_id=$pid AND orders.status ='ordered'";

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if (!in_array($type, $types)) {
        exit('Type mismatched');
    }

    $sql = $sql . " AND send_mode='$type' ";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $sql . "AND orders.id IN($id)";
}

include "../function.php";
$DB = make_connection();
$result = $DB->query($sql);
$total_rows = mysqli_num_rows($result);
$result_index = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($row['send_mode'] === 'custom') {
            echo '
                <style>.page {
                    page-break-after: always;
                    orientation: landscape;
                    width: 12.69in;
                    min-height: 8.27in;
                    padding: 500px 50px 0px 50px;
                } @media print{ @page {size: landscape;}}</style>
                <div class="page">
            <br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 5in">
                        <img src="/hks_receipt_footer.svg" height="120" style="display: block;   margin: left;">
                    </td>
            <td style="width: 2in">
            <table style="width: 100%" >
                <tr><td>ISSUE:</td> <td> ' . $row['project_name'] . '</td></tr>
                <tr><td>REGD:</td> <td>DA6037</td></tr>
                <tr><td>Date</td> <td> ' . date('d/m/Y') . '</td></tr>
                <tr><td>RP No.</td> <td> </td></tr>
                </td>
            </table>
            <td>
            প্রাপক, <br>
    ' . $row["customer_name"] . '<br>
    ' . $row["customer_address"] . ' <br>
    ' . $row["customer_mobile"] . '
    </td>
            </tr>
            <tr>
                <td colspan="2" ></td>
                <td>
                    <img style="width:150px;height:50px;" id="s' . $row["id"] . '" />
                </td>
            </tr>
            </table>
            </div>
    ';
            echo '<script>JsBarcode("#s' . $row["id"] . '", "I' . $row["id"] . 'P' . $row["project_id"] . '");</script>';
        }

        if ($row['send_mode'] === 'courier') {

            $mobile = $row['customer_mobile'];
            $get_courier_sql = "SELECT courier_name, courier_description FROM tblMem WHERE mob =$mobile";
            $courier_info = $DB->query($get_courier_sql);
            if ($courier_info) {
                $courier_result = $courier_info->fetch_assoc();
                $courier_name = $courier_result['courier_name'] ?? ' ';
                $courier_description = $courier_result['courier_description'] ?? ' ';
            }
            if (isset($_GET['print']) && $_GET['print'] === 'label') {
                // Courier Label
                if ($result_index === 0) {
                    echo '<style>td{word-wrap: break-word;}</style>';
                    echo '<div style="max-width:99vw"><table style="table-layout:fixed;width:100%;border: 1px solid;">';
                }
                $result_index += 1;
                if ($result_index % 2 != 0) {
                    echo '<tr>
                    <td style="width:50%;">';
                } else {
                    echo '<td style="width:50%;overflow:hidden;table-layout:fixed;">';
                }
                echo '<table style="width:100%;border: 1px solid;">
                            <tr>
                                <td style="font-size:22px; text-align: right; font-weight: bold;" colspan="2" > ' . $courier_name . '  , ' . $courier_description . '</td>
                            </tr>
                            <tr style="font-size:14px; text-align:center;font-weight:bold;">
                                <td colspan="2">' . $row['project_name'] . '</td>
                            </tr>
                            <tr>
                            <td style="font-size:20px;word-wrap: break-word;" colspan="2">
                                ' . $row["customer_name"] . '<br>
                                ' . $row["customer_address"] . ' <br>
                                ' . $row["customer_mobile"] . '
                            
                                    <h5 id="barcode" >*I' . $row["id"] . 'P' . $row["project_id"] . '*</h5>
                                </td>
                            </tr>
                            <tr>
                                    <td colspan="2"><hr/>
                                        <img src="https://www.harekrishnasamacar.com/hks_receipt_footer.svg" height="80" style="display: block;margin-left: auto; margin-right: auto;">
                                    </td>
                                </tr>
                        </table>';

                if ($result_index % 2 != 0) {
                    echo '</td>';
                } else{
                    echo '</td></tr>';
                }

                
                if ($result_index === $total_rows) {
                    echo '</table></div>';
                }
            } else {
                echo '
                    <div class="page-courier">
                        <div>
                            <h2 style="text-align:center;" >চালান</h2>
                            <h6 style="text-align:right;">' . date('d/m/Y') . ' </h6>
                        </div>
                        <table style="width: 100%;">
                            <tr>
                                <td style="font-size:22px; text-align: right; font-weight: bold;" colspan="2" > ' . $courier_name . '  , ' . $courier_description . '</td>
                            </tr>
                            <tr style="font-size:14px; text-align:center;font-weight:bold;">
                                <td colspan="2">' . $row['project_name'] . '</td>
                            </tr>
                            <tr>
                                <td style="font-size:20px" colspan="2">
                                    ' . $row["customer_name"] . '<br>
                                    ' . $row["customer_address"] . ' <br>
                                    ' . $row["customer_mobile"] . '
                                <hr/>
                                        <h5 id="barcode" >*I' . $row["id"] . 'P' . $row["project_id"] . '*</h5>
                                    </td>
                                </tr>
                        </table>
                        <br>
                        <table style="width: 100%;">
                            <tr>
                                <td style="font-size:24px; text-align: center; font-weight: bold;" colspan="4" > বিবরণ</td>
                            </tr>
                            <tr style="font-size:24px;">
                                <th></th>
                                <th style="width: 0.5in;"></th>
                                <th style="width: 0.5in;font-size:24px;">@</th>
                                <th style="width: 0.5in;font-size:24px;" >মোট</th>
                            </tr>
                            <tr>
                                <td style="font-size:24px;text-align:left;" colspan="3">' . $row['project_name'] . '<br><small>' . $row["details"] . '</small></td>
                                <td style="font-size:24px;" >' . number_format(intval($row["amount"])) . '</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td style="font-size:24px;">' . number_format(intval($row["amount"])) . '</td>
                            </tr>
                        </table>
                        <div style="text-align:center; margin-top: 30px;">
                            <h5>কন্ডিশন: (' . $converter->engToBn(number_format($row["amount"])) . '/-)  মাত্র ' . $converter->numToWord($row['amount']) . ' টাকা
                            দিয়ে পত্রিকা উঠানোর জন্য অনুরোধ করা হল।</h5>
                            <h4 class="text-bold mt-5">০১৭১৫-৭৫৮৯৪৮</h4>
                        </div>
                    </div>';
            }
        }
        if ($row['send_mode'] === 'post') {
            if (isset($_GET['print']) && $_GET['print'] === 'label') {
                echo '
                    <div class="page">
                    <table style="width: 100%">
                        <tr>
                            <br>
                            <h4 style="font-size:20px;font-weight:bold;margin-left:10px;font-family:SutonnyMJ">ভিপিপি মূল্য: ৳' . $converter->engToBn(number_format(intval($row['amount']))) . '/- (' . $converter->numToWord(intval($row['amount'])) . ' টাকা মাত্র)</h4>
                        </tr>
                        <tr>
                            <td style="width: 3.5in;">
                                <div style="margin-left:10px;">
                                     (' . $row['details'] . ')
                                </div>
                            <img src="/hks_receipt_footer.svg" height="120" style="display:block;margin:left;">
                            </td>
                            <td style="width: 2in;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size:22px;">
                                            Date: ' . date('d/m/Y') . '<br> VPP No:
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img style="width:160px;height:60px; margin-top:5px;" id="s' . $row["id"] . '" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-size:18px;padding-top:0px;word-wrap: break-word;">
                                প্রাপক, <br>
                                ' . $row["customer_name"] . '<br>
                                ' . $row["customer_address"] . ' <br>
                                 মোবাইল: ' . $row["customer_mobile"] . '
                            </td>
                        </tr>
                    </table>
                    <hr><hr>
                    </div>
                    <script>JsBarcode("#s' . $row["id"] . '", "I' . $row["id"] . 'P' . $row["project_id"] . '");</script>';
            } else {
                echo '
                    <style>.page {width: 8.1in; min-height: 10.6in;padding: 5in 1in 0in 3in;margin: 1cm auto;border: 0px #D3D3D3 solid;border-radius: 5px;background: white;box-shadow: 0 0 0px rgba(0, 0, 0, 0);}@media print {.page {page-break-after: always;width: 8.1in;min-height: 10.6in;padding: 4.3in 1in 0in 3in ;margin: 1cm auto;border: 0px #D3D3D3 solid;border-radius: 5px;background: white;box-shadow: 0 0 0px rgba(0, 0, 0, 0);}}</style>
                    <div class="page">
                        <br>
                        <h4 style="font-size:20px; text-align: left; font-weight: bold;margin-top:4.2rem;">ভিপিপি মূল্য: (' . $converter->engToBn(number_format($row['amount'])) . '/-) ' . $converter->numToWord($row['amount']) . ' টাকা মাত্র </h4>
                        <br><br>
                        <div style="font-size:18px; text-align: center;font-weight: bold;">
                        মাসিক হরেকৃষ্ণ সমাচার <br>৭৯,স্বামীবাগ,ঢাকা-১১০০। ০১৭১৫-৭৫৮৯৪৮
                        </div><br>
                            <br>
                        <div style="font-size:16px; text-align: left;font-weight: bold;">
                            ' . $row['customer_name'] . '<br>
                            ' . $row['customer_address'] . ' <br>
                            ' . $row['customer_mobile'] . '
                            <br>
                        </div>
                        <br><br><br><br>
                        <div style="font-size:32px; text-align: left;font-weight: bold;font-family:SutonnyMJ"> &nbsp ৳' . $converter->engToBn(number_format($row['amount'])) . '/- </div>
                        <span style="font-size:20px; text-align: left;font-weight: bold;"> &nbsp  &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp  VPP: </span><br>
                        <div style="font-size:16px; text-align: right;margin-right:20px; font-weight: bold; ">' . date('d/m/Y') . '</div><br>
                        <div style="font-size:12px; text-align: left;margin-left:30px;font-weight: bold;">(' . $row["id"] . ')
                        ' . $row["customer_name"] . '<br>
                        ' . $row["customer_address"] . ' <br>
                            <br>
                        </div>
                        <div style="font-size:18px; font-weight: bold;">পার্সেল- ' . $row['details'] . '</div>
                        <img style="margin-top:3px;width:300px;height:70px;" id="s' . $row["id"] . '" />
                    </div>
                    <script>JsBarcode("#s' . $row["id"] . '", "I' . $row["id"] . 'P' . $row["project_id"] . '");</script>';
            }
        }
    }
} else {
    echo '<h3 style="color:red;">No Result</h3>';
    echo $DB->error;
    exit();
}
function full_path()
{
    $s = &$_SERVER;
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    $uri = $protocol . '://' . $host . $s['REQUEST_URI'];
    // $segments = explode('?', $uri, 2);
    // $url = $segments[0];
    return $uri;
}
if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}
$uri = full_path();

if (!str_contains($uri, '&print=')) {
    $uri .= '&print=form';
}

$decision = str_contains($uri, 'label') ? 'form' : 'label';
$uri = str_replace(['label', 'form'], $decision, $uri);

?>

        <a class="float no-print" href="<?=$uri;?>">
            <div class="my-float">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-patch-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
                </svg>
            </div>
        </a>


</body>

</html>
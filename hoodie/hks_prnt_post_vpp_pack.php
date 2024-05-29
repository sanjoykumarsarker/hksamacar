<?php
$print_issue = (int) $_GET["issue"];
?>
<!DOCTYPE html>
<html>

<head>

    <title>Post Office Pack Label</title>
    <meta charset="utf-8">

    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39 Text' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon1.ico" />
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->

    <style>
        h5 {
            font-family: 'Libre Barcode 39 Text';
            font-size: 23px;
            text-align: center;

        }

        @page {
            size: 5.5in 8.5in;
        }

        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }

        }
    </style>
</head>


<body>

    <div class="page">

        <div></div>
        <br>

        <?php

include "../function.php";
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
$rp = $_GET['rp'];
// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all, "utf8");
$sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND sent_mode='vpp' and (transid<10000)AND(transid>99) order by cast(VPNo as unsigned)";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
    // output data of each row

    $vpno = $rp;
    $i = 0;
    while ($row = $result_all->fetch_assoc()) {

        $newDateString = $_GET['date'] ? date('d/m/Y', strtotime($_GET['date'])) : date('d/m/Y');

        // $en_price = intval(doubleval($row["agcpy"]) * doubleval(id_news_rate($row["transid"])));
        // $en_num = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
        // $bn_num = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];

        // $new_num = str_replace($en_num, $bn_num, $en_price);

        // $journal = substr($row["VPNo"], 0, 2);
        // $vpno = substr($row["VPNo"], 2);
        // page-break
        if ($i > 0 && $i % 7 === 0) {
            echo "<div class='page-break'>";
        }

        echo '
                    <table style="width: 100%;">
                    <tr>
                    <td colspan="3">
                    
                        <h4 style="font-size:18px; text-align: center;">ইংরেজি নববর্ষ ২০২৩ উপলক্ষে <strong>মাসিক হরেকৃষ্ণ সমাচারের</strong> পক্ষ থেকে আপনাকে জানাই <strong>কৃষ্ণপ্রীতি ও শুভেচ্ছা।</strong></h4>
                    </td>
                </tr>
                        <tr">
                            <td style="width: 3in;">                          
                                <img src="https://www.harekrishnasamacar.com/hks_receipt_footer.svg" height="110" style="display:block;margin:left;">
                            </td>
                            <td style="font-size:18px; text-align: left;padding-right:10px">
                                        ' . $newDateString . '
                                        <br/> RP:
                            </td>
                            <td style="width:90%;font-size:18px;padding-top:0px;">
                                প্রাপক, <br>
                                ' . id_name($row["transid"]) . '<br>
                                ' . id_vill($row["transid"]) . ' <br>

                                ডাকঃ' . id_po_bn($row["transid"]) . ",থানাঃ" . ps_en_bn(id_ps($row["transid"])) . ', <br>
                                জেলা:' . dist_en_bn(id_dist($row["transid"])) . ' মোবাইল: ' . id_phone($row["transid"]) . '
                            </td>
                        </tr>
                    </table>';
        if ($i > 0 && $i % 7 === 0) {
            echo "</div>";
        }

        $i++;
        $vpno++;

        echo "<hr>";
    }
}
$conn_all->close();
?>
    </div>
</body>

</html>
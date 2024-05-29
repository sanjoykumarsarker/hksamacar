<?php
session_start();

$print_issue = $_SESSION["print_issue"];
$str_len = strlen($print_issue);
$mon = substr($print_issue, $str_len - 2, $str_len - 0);
$ver = substr($print_issue, 0, $str_len - 2);

?>
<!DOCTYPE html>
<html>

<head>

    <title>Subscriber Pack Label</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon1.ico" />
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->

<style>
    .page {
        page-break-after: always;
        orientation: landscape;
        width: 12.69in;
        min-height: 8.27in;
        padding: 500px 50px 0px 50px;
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

    @media print {
        @page {
            size: landscape;
        }
    }
</style>
</head>


<body>

    <?php

    include "function.php";

    $conn_all = make_connection();

    $sql_all = "SELECT transid,vername,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND (transid>9999)";
    $result_all = $conn_all->query($sql_all);

    if ($result_all->num_rows > 0) {
        // output data of each row
        while ($row = $result_all->fetch_assoc()) {
            $year = 2009 + $ver;
            $mon;
            $dtmd = date_create($year . "-" . $mon . "-01");
            $balance = intval(id_balance($row["transid"]));
            date_add($dtmd, date_interval_create_from_date_string(intval(1 + $balance) . " months"));
            $dt = date_format($dtmd, "M/Y");
            $newDateString = date_format(date_create_from_format('Y-m-d', $row["SentDate"]), 'd/m/Y');
            if ($balance > 0) {
                $news_warning = 'আপনি আগামী ' . $dt . ' পর্যন্ত ' . $balance . ' টি পত্রিকা পাবেন।';
            }

            if ($balance < 1) {
                $news_warning = 'আপনার গ্রাহক পদের মেয়াদ শেষ।';
            }

            echo '<div class="page">
        <br>
         <table style="width: 100%">
        <tr>
            <td style="width: 5in">
                <img src="hks_receipt_footer.svg" height="120" style="display: block;   margin: left;">
            </td>
            <td style="width: 2in">
                <table style="width: 100%" >
                    <tr><td>ISSUE:</td> <td>' . $print_issue . '</td></tr>
                    <tr><td>REGD:</td> <td>DA6037</td></tr>
                    <tr><td>Date</td> <td> ' . $newDateString . '</td></tr>
                    <tr><td>RP No.</td> <td><b> ' . intval(substr($row["VPNo"], 2)) . '</b></td></tr>
                    </table>
            </td>
            <td>
                    প্রাপক, <br>
                ' . id_name($row["transid"]) . '<br>
                ' . id_vill($row["transid"]) . ' <br>

                ডাকঃ' . id_po_bn($row["transid"]) . ",থানাঃ" . ps_en_bn(id_ps($row["transid"])) . ', <br>
                জেলা:' . dist_en_bn(id_dist($row["transid"])) . ' <br>
                ' . id_phone($row["transid"]) . '
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight:bold; " >
                আপনার গ্রাহক নিবন্ধন নং: ' . $row["transid"] . '। ' . $news_warning . ' <br>
                গ্রাহক পদের মেয়াদ নবায়নের জন্য যোগাযোগ করুন- ০১৭১৫ ৭৫৮৯৪৮। 
            </td>
            <td>
                <img style="width:150px;height:50px; " id="s' . $row["transid"] . '" > </img>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:center;padding-top:20px;font-weight:bold;font-size:1.4em;letter-spacing: 1.5px;">
             সংবাদপত্র দয়া করে দ্রুত পৌঁছে দিন।
            </td>
        </tr>
        </table>

        </div>
        ';
            echo '<script> JsBarcode("#s' . $row["transid"] . '", "' . $row["transaction_id"] . '");</script>
';
        }
    } else {
        echo "0 results";
    }
    $conn_all->close();

    ?>

</body>

</html>

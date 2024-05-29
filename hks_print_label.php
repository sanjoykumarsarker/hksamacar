<?php
session_start();

$print_issue = '1105';

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

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

</head>

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

<body>





    <?php

    include "function.php";
    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    // Create connection




    // Create connection
    $conn_all = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_all->connect_error) {
        die("Connection failed: " . $conn_all->connect_error);
    }
    mysqli_set_charset($conn_all, "utf8");
    // $sql_all = "SELECT transid,vername,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND (transid>9999)";
    $sql_all = "SELECT * FROM tblMem WHERE ID_EN>10000 AND status='PENDING' AND dist<>''";
    $result_all = $conn_all->query($sql_all);

    if ($result_all->num_rows > 0) {
        // output data of each row
        while ($row = $result_all->fetch_assoc()) {
            // $year = 2009 + $ver;
            // $mon;
            // $dtmd = date_create($year . "-" . $mon . "-01");
            // date_add($dtmd, date_interval_create_from_date_string(intval(1 + id_balance($row["transid"])) . " months"));
            // $dt = date_format($dtmd, "M/Y");
            // if (!empty($row['po_bn']) && !empty($row['ps'])) {

            $newDateString = date("d/m/Y");


            $news_warning = $_GET['msg'] ?: ' আপনি দীর্ঘদিন যাবৎ আমাদের পত্রিকার একজন নিয়মিত গ্রাহক (নিবন্ধন নং:
                ' . $row["ID_EN"] . ') ছিলেন। পুরুষোত্তম মাস উপলক্ষে বিশেষ অফার, আপনার গ্রাহক পদটি নবায়ন করলে প্রথম একটি কপি পাবেন সম্পূর্ণ বিনামূল্যে।
                 নবায়ন করতে যোগাযোগ করুন ০১৭১৫ ৭৫৮৯৪৮। ১ বছর (১২টি সংখ্যা) এর প্রণামী ২০০/= টাকা। আপনি বিকাশ, রকেট কিংবা নগদের মাধ্যমে প্রণামী পাঠাতে পারেন।';


            echo '

<div class="page">
        <br>

         <table style="width: 100%">


        <tr>
        <td style="width: 5in">
           <img src="hks_receipt_footer.svg" height="120" style="display: block;   margin: left;">
        </td>

        <td style="width: 2in">
        <table style="width: 100%" >
        <tr><td>ISSUE:</td> <td>special</td></tr>

        <tr><td>REGD:</td> <td>DA6037</td></tr>
        <tr><td>Date</td> <td> ' . $newDateString . '</td></tr>

        </td>
        </table>

        <td>



        প্রাপক, <br>
' . $row["Name"] . '<br>
' . $row["vill"] . ' <br>

ডাকঃ' . $row["po_bn"] . ",থানাঃ" . (ps_en_bn($row["ps"]) ?? $row["ps"]) . ', <br>
 জেলা:' . (dist_en_bn($row["dist"]) ?? $row["dist"]) . ' <br>
 ' . $row["phone"] . '
</td>

        </tr>

        <tr>
        <td colspan="3" style="font-weight:550" >
        হরেকৃষ্ণ,<br> আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ (ইসকন) এর মুখপত্র মাসিক হরেকৃষ্ণ সমাচারের পক্ষ থেকে জানাই কৃষ্ণপ্রীতি ও শুভেচ্ছা। ' . $news_warning . '</td>
        <!--<td>
        <img style="width:150px;height:50px; " id="s' . $row["ID_EN"] . '" > </img>
        </td>
        -->
        </tr>
        </table>

        </div>
        ';
            // echo '<script> JsBarcode("#s' . $row["ID_EN"] . '", "' . 1234 . $row["ID_EN"] . '");</script>';
        }
        // }
    } else {
        echo "0 results";
    }
    $conn_all->close();



    ?>

    <!-- end of container -->


</body>

</html>
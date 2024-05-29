<?php
$print_issue = (int) $_GET["issue"];;
?>
<!DOCTYPE html>
<html>

<head>

    <title>Courier Pack Label</title>

    <meta charset="utf-8">
    <!-- <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39 Text' rel='stylesheet'> -->
    <link rel="shortcut icon" href="favicon1.ico" />

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->


</head>

<style>
    h5 {
        font-family: 'Libre Barcode 39 Text';
        font-size: 35px;
        text-align: center;

    }

    .page {
        page-break-after: always;

        /* width: 8.27in;
       min-height: 11.69in;
        padding: 10px 10px 20px 10px;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

        */
    }


    table {
        border: 2px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 2px;
        text-align: left;
    }

    @media print {
        .page {

            /*
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;

            */
            page-break-after: always;
        }
    }
</style>

<body>




    <?php

    include "../function.php";
    // Create connection
    $conn_all = make_connection();
    // $sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND (transid<100)";
    $sql_all = "SELECT tblIssue.transid, tblIssue.vername, tblIssue.agcpy, tblIssue.SentDate, tblIssue.transaction_id, tblIssue.VPNo,
    tblMem.courier_name, tblMem.courier_description, tblMem.Name, tblMem.vill, tblMem.ps, tblMem.dist, tblMem.phone, tblMem.mob as mobile, tblMem.news_rate FROM tblIssue
    LEFT JOIN tblMem ON tblIssue.transid = tblMem.ID_EN
    WHERE (tblIssue.vername=$print_issue) AND (tblIssue.transid<99) AND (tblIssue.transid>0)
    ORDER BY tblMem.courier_name";
    $result_all = $conn_all->query($sql_all);

    if ($result_all->num_rows > 0) {
        // output data of each row
        $i = 0;
        echo '
    <div class="page">
<table style="width:100%">
<col style="width:50%">
<col style="width:50%">
';

        while ($row = $result_all->fetch_assoc()) {
            $i = $i + 1;
            if ($i % 2 != 0) {

                echo '
<tr>
    <td style="width:50%;overflow:hidden;white-space:nowrap;">
        <table style="width:100%">
            <tr>
                <td colspan="3">
                    <div style="font-size:15px; text-align: center; font-weight: bold;">
                        <span style="font-size:20px;" > (' . $row["transid"] . ') '. $row["Name"] .'</span> <br> ' . $row["phone"] . ', ' . $row["mobile"] . '</span> <br>
                            ' . $row["vill"] . ',
                        থানাঃ' . ps_en_bn($row["ps"]) . ',
                        জেলা:' . dist_en_bn($row["dist"]) . '
                    </div>
                </td>
            </tr>
            <!--<tr>
                <td>
                    <h5 >*' . $row["transaction_id"] . '*</h5>
                </td>
                <td style="font-size:20px; text-align:center; font-weight: bold;vertical-align: text-top;">
                    Pcs:' . $row["agcpy"] . ',&nbsp TK. ' . intval(doubleval($row["agcpy"]) * doubleval($row["news_rate"])) . '
                </td>
            </tr> -->
            <tr>
                <td colspan="3">
                    <div style="font-size:20px; text-align: center; font-weight: bold;"> ' . $row["courier_name"] . ', ' . $row["courier_description"] . ' </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <img src="https://www.harekrishnasamacar.com/hks_receipt_footer.svg" height="90" style="display: block; margin-left: auto; margin-right: auto;">
                </td>
            </tr>
        </table>
    </td>';

            }

            if ($i % 2 == 0) {
                echo '
                        <td style="width: 50%;overflow: hidden;white-space: nowrap;" >
                            <table style="width:100%">
                                <tr>
                                    <td colspan="3">
                                        <div style="font-size:15px; text-align: center; font-weight: bold;">
                                            <span style="font-size:20px;" >(' . $row["transid"] . ') '. $row["Name"] .'</span><br> ' . $row["phone"] . ', ' . $row["mobile"] . '</span> <br>
                                            ' . $row["vill"] . ',
                                            থানাঃ' . ps_en_bn($row["ps"]) . ',
                                            জেলা:' . dist_en_bn($row["dist"]) . '
                                        </div>
                                    </td>
                                </tr>
                                <!--<tr>
                                    <td>
                                        <h5>*' . $row["transaction_id"] . '*</h5>
                                    </td>
                                    <td style="font-size:20px; text-align:center; font-weight: bold;vertical-align: text-top;">
                                        Pcs:' . $row["agcpy"] . ',&nbsp TK. ' . intval(doubleval($row["agcpy"]) * doubleval($row["news_rate"])) . '
                                    </td>
                                </tr> -->
                                <tr>
                                    <td colspan="3">
                                        <div style="font-size:20px; text-align: center; font-weight: bold;"> ' . $row["courier_name"] . ', ' . $row["courier_description"] . ' </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <img src="https://www.harekrishnasamacar.com/hks_receipt_footer.svg" height="90" style="display: block;margin-left: auto; margin-right: auto;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>';
            }

            if ($i % 12 == 0) {
                echo '</table>
                        </div>
                        <div class="page">
                        <table style="width:100%">
                        ';
            }
        }  //end while loop

        echo '</table>
</div>
<div class="page">
<table style="width:100%">
<col style="width:50%">
<col style="width:50%">
';
    } else {
        echo "0 results";
    }
    $conn_all->close();
    ?>


</body>

</html>
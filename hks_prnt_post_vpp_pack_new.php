<?php
session_start();
$print_issue = $_SESSION["print_issue"];
?>
<!DOCTYPE html>
<html>

<head>

    <title>Post Office Pack Label</title>
    <meta charset="utf-8">

    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39 Text' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->
    <style>h5 {
            font-family: 'Libre Barcode 39 Text';
            font-size: 23px;
            text-align: center;
        }
        @page { size: A4 }</style>
</head>


<body>

    

        <?php

        include_once "classes/banglaNumberToWord.php";
        include "function.php";
        $banglaNum = new BanglaNumberToWord();
        // Create connection
        $conn_all = make_connection();
        $sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND sent_mode='vpp' and (transid<10000)AND(transid>99) order by cast(VPNo as unsigned)";
        $result_all = $conn_all->query($sql_all);

        if ($result_all->num_rows > 0) {

            $all_data = [];
            while ($mrow = $result_all->fetch_assoc()) {
                $all_data[]=$mrow;
            }
            $chunks = array_chunk($all_data, 6);

            foreach ($chunks as $chunk) {
                echo "<div class='sheet'>";
                foreach ($chunk as $row) {
                    
    
                $newDateString = date_format(date_create_from_format('Y-m-d', $row["SentDate"]), 'd/m/Y');                
                $en_price = intval(doubleval($row["agcpy"])*doubleval(id_news_rate($row["transid"])));
               
                $journal = substr($row["VPNo"], 0, 2);
                $vpno = substr($row["VPNo"], 2);
                echo '                
                    <table style="width: 100%;">
                        <tr>
                            <td colspan="2">
                                <h4 style="font-size:20px;font-family:SutonnyMJ; text-align: left; font-weight: bold;"> ভিপিপি  মূল্য: ৳' .$banglaNum->engToBn($en_price). '/-( '.$banglaNum->numToWord($en_price).'  টাকা)</h4>
                            </td>
                            <td>
                                <h4 style="font-size:20px; text-align: center; font-weight: bold;"> সংবাদপত্র দয়া করে দ্রুত পৌঁছে দিন।</h4>
                            </td>                
                        </tr>
                        <tr">
                            <td style="width: 3.5in;">
                                <div style="  text-align: left;font-weight: bold;"> REGD: DA6037 &nbsp &nbsp' . $print_issue . ' &nbsp&nbsp
                                    <span style="font-size:18px;text-align:center;font-weight:bold;"> Agent: <span style="font-size:18px;font-weight:bold"> ' . $row["transid"] . ' </span>(' . $row["agcpy"] . 'Pcs)</span>
                                </div>
                            <img src="hks_receipt_footer.svg" height="120" style="display:block;margin:left;">
                            </td>
                            <td style="width: 2in;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size:22px;text-align:center;">
                                        Date: ' . $newDateString . '<br> VPP No: <span style="font-size:22px;font-weight:bold">' . intval($vpno) . '</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5 id="s' . $row["transid"] . '" >*' . $row["transaction_id"] . '*</h5>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="font-size:18px;padding-top:0px;padding-bottom:15px;">
                                প্রাপক, <br>
                                ' . id_name($row["transid"]) . '<br>
                                ' . id_vill($row["transid"]) . ' <br>
                                ডাকঃ' . id_po_bn($row["transid"]) . ",থানাঃ" . ps_en_bn(id_ps($row["transid"])) . ', <br>
                                জেলা:' . dist_en_bn(id_dist($row["transid"])) . ' মোবাইল: ' . id_phone($row["transid"]) . '
                            </td>
                        </tr>                                                
                    </table>';
                    // if ($i%6===0) {
                    //     echo "</div>";
                    // }
                    // echo '<script> JsBarcode("#s' . $row["transid"] . '", "' . $row["transaction_id"] . '");</script>';           
                
                echo "<hr>";
            }
            echo "</div>";
         }
        }


        $conn_all->close();
        ?>
</body>

</html>
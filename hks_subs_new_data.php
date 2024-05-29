<?php
include_once "session_check.php";
include_once "./sms/utils.php";
$user = $_SESSION["id"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Receipt</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

</head>

<style>
    .page {
        width: 4 in;
        min-height: 8in;
        padding: 20px 20px 1px 20px;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 2px;
        text-align: left;
    }

    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<style type="text/css">
    #ean {
        width: 15em;
        margin: 1em auto;
        display: block;
        text-align: center;
        font-size: 2em;
    }

    #barcode {
        margin: 1em auto;
        padding: 0.5em;
        display: block;
        max-height: 5em;
    }
</style>

<body>

    <div class="page">

        <div style="font-size:12px; text-align: center;">
            হরে কৃষ্ণ হৃরে কৃষ্ণ কৃষ্ণ কৃষ্ণ হরে হরে।
            <br>
            হরে রাম হরে রাম রাম রাম হরে হরে ।।
        </div>
        <h2 style="text-align: center">Subscriber Donation Receipt</h2>
        <svg id="barcode"></svg>


        <div style="font-size:12px;">
            <table style="width: 100%">
                <?php

                date_default_timezone_set("Asia/Dhaka");
                $tran_date = intval(date("Ymd"));
                $sub_number = $_POST["sub_number"];
                $trans_id = $_POST["trans_id"];
                $maxidx_tblmain = $_POST["maxidx_tblmain"];
                $sb_name = $_POST["sb_name"];
                $sb_addr = $_POST["sb_addr"];
                $sb_dist = $_POST["sb_dist"];
                $sb_ps = $_POST["sb_ps"];
                $sb_po = $_POST["sb_po"];
                $sb_po_bn = $_POST["sb_poffice_bn"];
                $sb_phone1 = $_POST["sb_phone1"];
                $sb_phone2 = $_POST["sb_phone2"];
                $sb_email = $_POST["sb_email"];
                $sb_taka = $_POST["sb_taka"];
                $sb_issue = $_POST["sb_issue"];
                $paymode = $_POST["paymode"];
                $subs_date = $_POST["subs_date"];
                $message = $_POST["message"];
                $sb_cont = "Bangladesh";
                $ag_quantity = 1;
                $status = "CONT";
                date_default_timezone_set("Asia/Dhaka");
                $cdate = date("m/d/Y h:i:sa");
                $rdate = date("m/d/Y");
                $price = $sb_taka;
                $period = "";
                $payTypID = "";
                $Resrcpy = $sb_issue;
                $Dis = "";
                $AgCatId = "";
                $Discontinued = "FALSE";
                $NonConditioned = "FALSE";

                $servername = "localhost";
                $username = "HKSamacar_local";
                $password = "Jpsk/1866";
                $dbname = "HareKrishnaSamacar";


                date_default_timezone_set("Asia/Dhaka");
                $date = intval(date("Ymd"));


                // Create connection
                $conn_trans_id = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn_trans_id->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                mysqli_set_charset($conn_trans_id, "utf8");
                $sql_id = "SELECT MAX(transaction_id)as transaction_id FROM tblMain  where transaction_id >0 and transaction_id like '$tran_date" . "1" . "%' ";

                $result_id = $conn_trans_id->query($sql_id);

                if ($result_id->num_rows > 0) {
                    // output data of each row
                    $row = $result_id->fetch_assoc();
                    if ($row["transaction_id"] > 0) {

                        $GLOBALS['transaction_id'] = $row["transaction_id"] + 1;
                    }
                } else {
                    echo "0 results";
                }
                $conn_trans_id->close();
                if ($GLOBALS['transaction_id'] == "" || $GLOBALS['transaction_id'] == null) {
                    $GLOBALS['transaction_id'] = $tran_date . "1" . "01";
                }
                ?>
                <tr>
                    <td>Name: <?php echo $sb_name; ?></td>
                </tr>
                <tr>
                    <td>Address: <?php echo $sb_addr . $sb_po . $sb_ps . $sb_dist; ?></td>
                </tr>
                <tr>
                    <td>Mobile: <?php echo $sb_phone1 . $sb_phone2; ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div style="font-size:14px;">
            <table style="width: 100%">
                <th>SL</th>
                <th style="width:50px; text-align: Center">QTY</th>
                <th style="width:50px">Total</th>

                <?php

                echo '<tr><td>1</td>   <td style="text-align: Center">' . $sb_issue . '</td>   <td style="text-align: Right">' . $sb_taka . '</td></tr>';


                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                    $conn->query('SET NAMES "utf8"');
                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,po_bn,ps,dist,cont,phone,mob,email,user,balance,comment,ag_date,ag_quantity,status)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:po_bn,:ps,:dist,:cont,:phone,:mob,:email,:user,:balance,:comment,:ag_date,:ag_quantity,:status)");

                    $stmt->bindParam(':ID', $sub_number);
                    $stmt->bindParam(':ID_EN', $sub_number);
                    $stmt->bindParam(':Name', $sb_name);
                    $stmt->bindParam(':vill', $sb_addr);
                    $stmt->bindParam(':po', $sb_po);
                    $stmt->bindParam(':po_bn', $sb_po_bn);
                    $stmt->bindParam(':ps', $sb_ps);
                    $stmt->bindParam(':dist', $sb_dist);
                    $stmt->bindParam(':cont', $sb_cont);
                    $stmt->bindParam(':mob', $sb_phone1);
                    $stmt->bindParam(':phone', $sb_phone2);
                    $stmt->bindParam(':email', $sb_email);
                    $stmt->bindParam(':user', $user);
                    $stmt->bindParam(':balance', $sb_issue);
                    $stmt->bindParam(':comment', $message);
                    $stmt->bindParam(':ag_date', $subs_date);
                    $stmt->bindParam(':ag_quantity', $ag_quantity);
                    $stmt->bindParam(':status', $status);
                    $stmt->execute();


                    // Sending SMS to the Newly Created Subscriber
                    if (isset($_POST['send_sms'])) {
                        $text_msg = getMessageText('New Subscriber');
                        $text_msg = str_replace(":id", $sub_number, $text_msg);
                        sendSms(['to' => "$sb_phone1", 'message' => "$text_msg"], false, 'masking');
                    }

                    // echo "New records created successfully";
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo ' <tr><td  ></td>  <td>Total</td> <td style="text-align: Right">' . $sb_taka . '</td></tr>';
                echo ' <tr><td  ></td>  <td>Paid</td> <td style="text-align: Right">' . $sb_taka . '</td></tr>';
                echo ' <tr><td  ></td>  <td>Due</td> <td style="text-align: Right">0</td></tr>';

                try {
                    $conn_trans = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn_trans->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn_trans->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                    $conn_trans->query('SET NAMES "utf8"');
                    // prepare sql and bind parameters
                    $stmt_trans = $conn_trans->prepare("INSERT INTO tblMain (idx,transid,id,cdate,rdate,price,period,payTypID,paymode,Resrcpy,Dis,AgCatId,Discontinued,NonConditioned,transaction_id,user)
    VALUES (:idx,:transid,:id,:cdate,:rdate,:price,:period,:payTypID,:paymode,:Resrcpy,:Dis,:AgCatId,:Discontinued,:NonConditioned,:transaction_id,:user)");

                    $stmt_trans->bindParam(':idx', intval($maxidx_tblmain));
                    $stmt_trans->bindParam(':transid', $trans_id);
                    $stmt_trans->bindParam(':id', $sub_number);
                    $stmt_trans->bindParam(':cdate', $cdate);
                    $stmt_trans->bindParam(':rdate', $rdate);
                    $stmt_trans->bindParam(':price', $price);
                    $stmt_trans->bindParam(':period', $period);
                    $stmt_trans->bindParam(':payTypID', $payTypID);
                    $stmt_trans->bindParam(':paymode', $paymode);
                    $stmt_trans->bindParam(':Resrcpy', $Resrcpy);
                    $stmt_trans->bindParam(':Dis', $Dis);
                    $stmt_trans->bindParam(':AgCatId', $AgCatId);
                    $stmt_trans->bindParam(':Discontinued', $Discontinued);
                    $stmt_trans->bindParam(':NonConditioned', $NonConditioned);
                    $stmt_trans->bindParam(':transaction_id', $GLOBALS['transaction_id']);
                    $stmt_trans->bindParam(':user', $user);
                    $stmt_trans->execute();
                    // echo "New records created successfully";
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn_trans = null;


                ?>

            </table>
        </div>



        <div class="bottom_aligner"></div>
        <div id="one" style="font-size:12px; text-align: left;">In words:
            <b id="word"></b>
        </div>

        <br><br>
        <hr style="background-color: transparent; border: 0.25px solid black; margin: 0em 0em 0em 0em; " noshade>
        <!-- <img src="hks_receipt_footer.svg" style="display: block;   margin: auto auto;"> -->

    </div> <!-- end of container -->


</body>
<script type="text/javascript">
    JsBarcode("#barcode", " <?php echo $GLOBALS['transaction_id']; ?>");
</script>

<script>
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';

    var amount0 = '<?php echo intval($sb_taka); ?>';
    var amount = amount0.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
        document.getElementById("word").innerHTML = words_string + "Taka Only";

        // alert(words_string);
    }
</script>

</html>
<?php


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once "session_check.php";
session_start();
$user = $_SESSION["id"];

include_once "function.php";
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
date_default_timezone_set("Asia/Dhaka");
$tran_date = intval(date("Ymd"));

$status = "CONT";


$conn_trans_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_trans_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_trans_id, "utf8");
$sql_id = "SELECT MAX(transaction_id)as transaction_id FROM tblMain  where transaction_id >0 and transaction_id like '$tran_date" . "2" . "%' ";
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
?>


<?php


// Create connection
$conn_trans_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_trans_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_trans_id, "utf8");
$sql_id = "SELECT MAX(transid)as maxid FROM tblMain";
$result_id = $conn_trans_id->query($sql_id);

if ($result_id->num_rows > 0) {
    // output data of each row
    $row = $result_id->fetch_assoc();
    $GLOBALS['maxtransid'] = $row["maxid"] + 1;
} else {
    echo "0 results";
}
$conn_trans_id->close();
?>



<?php


// Create connection
$conn_idx_tblMain = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_idx_tblMain->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_idx_tblMain, "utf8");
$sql_idx = "SELECT MAX(idx)as maxidx FROM tblMain";
$result_idx = $conn_idx_tblMain->query($sql_idx);

if ($result_idx->num_rows > 0) {
    // output data of each row
    $row = $result_idx->fetch_assoc();
    $GLOBALS['maxidx'] = $row["maxidx"] + 1;
} else {
    echo "0 results";
}
$conn_idx_tblMain->close();
?>



<?php session_start(); ?>
<!DOCTYPE html>


<html>

<head>

    <title>Receipt</title>


    <meta charset="utf-8">

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
  
  
        .page {
            page-break-after: always;

            width: 8.1in;
            min-height: 10.6in;
            padding: 0in 2.2in 0in 2.2in;
            margin: 1cm auto;
            background: white;
            box-shadow: 0 0 0px rgba(0, 0, 0, 0);
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
                page-break-after: avoid;
                width: 100%;
                height: unset;
                padding: 0;
                margin: 0;
                background: white;
            }
        }
    </style>

</head>


<body>

    <div class="page">

        <div style="font-size:12px; text-align: center;">
            হরে কৃষ্ণ হৃরে কৃষ্ণ কৃষ্ণ কৃষ্ণ হরে হরে।
            <br>
            হরে রাম হরে রাম রাম রাম হরে হরে ।।
        </div>
        <h6 style="text-align: center">Donation (Renew) Receipt</h6>
        <svg id="barcode">

        </svg>


        <div style="font-size:18px;">
            <table style="width: 100%">
                <?php

                $sub_number = $_POST["id"];
                $sb_taka = $_POST["donation"];
                $sb_issue = $_POST["quantity"];
                $paymode = $_POST["paymode"];
                $sb_cont = "Bangladesh";

                $cdate = date("Y-m-d h:i:sa");
                $rdate = date("Y-m-d");

                if ($GLOBALS['transaction_id'] == "" || $GLOBALS['transaction_id'] == null) {
                    $GLOBALS['transaction_id'] = $tran_date . "2" . "01";
                }

                $price = $sb_taka;
                $period = "";
                $payTypID = "";
                $Resrcpy = $sb_issue;
                $Dis = "";
                $AgCatId = "";
                $Discontinued = "FALSE";
                $NonConditioned = "FALSE";
                $trans_id = $GLOBALS['maxtransid'];
                $maxidx_tblmain = intval($GLOBALS['maxidx']);

                ?>
                <tr>
                    <td>নামঃ <span style="font-weight:bold"><?php echo id_name($sub_number); ?></span></td>
                </tr>

                <tr>
                    <td> ঠিকানাঃ <?php


                                    echo id_vill($sub_number) . ' ,
 
ডাকঃ' . id_po_bn($sub_number) . ",থানাঃ" . ps_en_bn(id_ps($sub_number)) . ',
 জেলা:' . dist_en_bn(id_dist($sub_number));




                                    ?></td>
                </tr>

                <tr>
                    <td>মোবাইলঃ <?php echo id_phone($sub_number); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <div style="font-size:18px;">
            <table style="width: 100%">
                <th>SL</th>
                <th style="width:50px; text-align: Center">QTY</th>
                <th style="width:50px">Total</th>

                <?php





                echo '<tr><td>নবায়ন</td>   <td style="text-align: Center">' . $sb_issue . ' </td>   <td style="text-align: Right">' . $sb_taka . '</td></tr>';

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

                    $stmt_trans->bindParam(':idx', $maxidx_tblmain);

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

                    // insert a row

                    $stmt_trans->execute();




                    //echo "@New records created successfully";
                } catch (PDOException $e) {
                    echo  $e->getMessage();
                }
                $conn_trans = null;





                // {subscriber balance value update




                try {
                    $conn_bal = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn_bal->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conn_bal->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                    $conn_bal->query('SET NAMES "utf8"');
                    // prepare sql and bind parameters
                    /*
       $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
        VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
    */

                    $stmt = $conn_bal->prepare("update tblMem set balance=balance+" . intval($sb_issue) . ", user=:user,status=:status where ID_EN=:ID_EN");






                    $stmt->bindParam(':ID_EN', $sub_number);


                    $stmt->bindParam(':user', $user);


                    $stmt->bindParam(':status', $status);



                    $stmt->execute();  // echo " ".$user;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn_bal = null;


                ?>

            </table>
        </div>








        <div class="bottom_aligner"></div>
        <div id="one" style="font-size:18px; text-align: right;">In Words:
            <b id="word"></b>


        </div>
        <br>

        <p style="font-size:8px; text-align: right;">(Signature)</p>
        <div style="font-size:12px; text-align: right;">Authorized by <?php echo user_id_name($user); ?>



        </div>

        <br><br>
        <hr style="background-color: transparent; border: 0.25px solid black; margin: 0em 0em 0em 0em; " noshade>
        <img src="hks_receipt_footer.svg" style="display: block;   margin: auto auto;">

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

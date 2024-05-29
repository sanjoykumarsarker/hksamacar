<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$print_issue = $_SESSION["print_issue"];
?>
<!DOCTYPE html>
<html>

<head>
    <title>VP Form</title>
    <meta charset="utf-8">

    <link rel="shortcut icon" href="favicon1.ico" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>
</head>


<style>
    .page {
        width: 8.1in;
        min-height: 10.6in;
        padding: 5in .5in 0in 3in;
        margin: 1cm auto;
        border: 0px #D3D3D3 solid;
        border-radius: 5px;
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
        border: 0px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 2px;
        text-align: left;
    }

    @media print {
        .page {
            page-break-after: always;
            width: 8.1in;
            min-height: 10.6in;
            padding: 4.7in .5in 0in 3in;
            margin: 1cm auto;
            border: 0px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        }
    }
</style>


<body>


    <?php
    include_once "classes/banglaNumberToWord.php";
    include_once "function.php";

    $banglaNum = new BanglaNumberToWord();

    $servername = "localhost";
    $username = "HKSamacar_local";
    $password = "Jpsk/1866";
    $dbname = "HareKrishnaSamacar";

    // Create connection
    $conn_all = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn_all->connect_error) {
        die("Connection failed: " . $conn_all->connect_error);
    }
    mysqli_set_charset($conn_all, "utf8");
    $sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND sent_mode='vp' and (transid<10000)AND(transid>99)and VPNo!='' order by cast(VPNo as unsigned)";
    $result_all = $conn_all->query($sql_all);

    if ($result_all->num_rows > 0) {

        while ($row = $result_all->fetch_assoc()) {

            $newDateString = date_format(date_create_from_format('Y-m-d', $row["SentDate"]), 'd/m/Y');

            $en_price = intval(doubleval($row["agcpy"]) * doubleval(id_news_rate($row["transid"])));
            //   $en_num = ["0", "1", "2","3", "4", "5","6", "7", "8","9"];
            //   $bn_num = ["০", "১", "২","৩", "৪", "৫","৬", "৭", "৮","৯"];

            //   $new_num = str_replace($en_num, $bn_num, $en_price);

            $journal = substr($row["VPNo"], 0, 2);
            $vpno = substr($row["VPNo"], 2);
            echo '
           
           <div class="page">

           <br>
           <h4 style="font-size:20px; text-align: left; font-weight: bold;">ভিপি মূল্য: (' . $banglaNum->engToBn($en_price) . '/-) ' . $banglaNum->numToWord($en_price) . ' টাকা</h4> <br><br>
           
           
           <br>  
           <div style="font-size:18px; text-align: center;font-weight: bold;">মাসিক হরেকৃষ্ণ সমাচার <br>৭৯, স্বামীবাগ, ঢাকা-১১০০। ০১৭১৫-৭৫৮৯৪৮</div><br>
           <br>  
           <div style="font-size:16px; text-align: left;font-weight: bold;">
      
           ' . id_name($row["transid"]) . '<br>
           ' . id_vill($row["transid"]) . ' <br>
            
           ডাকঃ ' . id_po_bn($row["transid"]) . ",থানাঃ " . ps_en_bn(id_ps($row["transid"])) . ', <br>
            জেলা: ' . dist_en_bn(id_dist($row["transid"])) . '&nbsp&nbsp' . id_phone($row["transid"]) . ' 
           
             <br></div>
		   <br> <br> 

               <div style="font-family:SutonnyMJ;font-size:28px; text-align: left;  font-weight: bold; "> &nbsp;&nbsp;  ৳' . $banglaNum->engToBn($en_price) . '/- </div> 
           <span style="font-size:20px; text-align: left;  font-weight: bold; "> &nbsp  &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp  VP:' . str_pad(intval($vpno),3,"0",STR_PAD_LEFT) . '</span><br> 
          <span style="padding-left:60%;font-size:16px; text-align: left;font-weight: bold; ">' . $newDateString . '</span>
           <br><br>
           <table>
           <tr>
           <td style="padding-left:40px;">
           
           <div style="font-size:12px; text-align: left;font-weight: bold;">(' . $row["transid"] . ')
             
        ' . id_name($row["transid"]) . '<br>
        ' . id_vill($row["transid"]) . ' <br>
         
        ডাকঃ ' . id_po_bn($row["transid"]) . ",থানাঃ " . ps_en_bn(id_ps($row["transid"])) . ', <br>
         জেলা: ' . dist_en_bn(id_dist($row["transid"])) . ' <br>
       

        </div>
                   
           <div style="font-size:14px; font-weight: bold;">' . $print_issue . '___' . $row["agcpy"] . 'PCS___' . $row["transaction_id"] . '</div> 
           </td>
            <td style="padding-left:10px;">
                <div style="font-size:18px;font-weight: bold;text-align:center;">বই-' . number_en_bn($journal) . '</div>
                <svg class="barcode"
                    jsbarcode-value="' . $row["transaction_id"] . '"
                    jsbarcode-textmargin="0"
                    jsbarcode-fontoptions="bold"
                    style="width: 140px!important;height:70px;">
                </svg>
            </td>
           </tr>
           </table>
         
         </div>
         
         
         
         ';

            //  <script> JsBarcode("#s'.$row["transid"].'", "'.$row["transaction_id"].'");</script>  
            //  <svg style="width:320px;height:80px;" id="s'.$row["transid"].'" > </svg>            
        }
    }


    $conn_all->close();

    ?>
    <script>
        $(document).ready(function() {
            JsBarcode(".barcode").init();
        });
    </script>
</body>

</html>

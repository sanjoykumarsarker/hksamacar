<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="hks_agent_phone_list.csv"');
?>

<?php

// </head>


// <!-- SELECT * FROM `tblMem` WHERE balance=0 AND ID_EN>10000 AND ID_EN IN (SELECT DISTINCT transid FROM `tblIssue` WHERE transid>10000) -->
// <!-- SELECT * FROM `tblMem` WHERE balance=0 AND ID_EN>10000 AND ID_EN IN (SELECT DISTINCT transid FROM `tblIssue` WHERE tblIssue.SentDate>DATE('2019-01-01')) -->
// <body>

    $date = isset($_GET['date'])? date('Y-m-d', strtotime($_GET['date'])): date('Y-m-d');
    $start_date = isset($_GET['back_date']) ? $_GET['back_date']: "2019-01-01";
    include "function.php";

    $conn_all = make_connection();

    // $sql_all = "SELECT transid,vername,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND (transid>9999)";
    // $sql_all = "SELECT Name,
    // vill,
    // po_bn,
    // ps,
    // dist,
    // mob,
    // description,
    // ID_EN FROM `tblMem` WHERE balance=0 AND ID_EN>10000 AND ID_EN IN (SELECT DISTINCT transid FROM `tblIssue` WHERE tblIssue.SentDate>DATE('$start_date'))";
    
//     $sql_all = "SELECT Name,    
//     ps,
//     dist,
//     mob,
//     description,
//    ag_quantity,
//     ID_EN FROM `tblMem` WHERE balance=0 AND ID_EN IN (SELECT DISTINCT transid FROM `tblIssue` WHERE tblIssue.SentDate>DATE('2018-01-01')) ORDER BY ag_quantity DESC";


    $sql_all  = "SELECT Name,mob,phone FROM tblMem WHERE ID_EN<10000";
    
    $result_all = $conn_all->query($sql_all);
    
    $fp = fopen('php://output', 'wb');
    fprintf($fp, chr(0xEF).chr(0xBB).chr(0xBF));
    if (isset($_GET['number'])) {
        // echo "<div class='table-responsive'>
        //     <table class='table'>
        //     <thead>
        //     <tr>
        //         <th>নাম</th>
        //         <th>মোবাইল</th>
        //     </tr>
        // </thead>
        // <tbody>";
        if ($result_all->num_rows > 0) {            
            while ($row = $result_all->fetch_assoc()) {  
                // echo "<tr>
                //         <td>HKS-".$row['Name']."</td>
                //         <td>".$row['mob']."</td>
                //     </tr>";
                    fputcsv($fp, [$row['Name'], $row['mob']]);
            }
            fclose($fp);
        } else {
            // echo "<tr><td clospan='5'>0 results</td>
            // </tr>";
        }
            // echo "</tbody>
            // </table>
            // </div>";
    }

    // if (isset($_GET['label'])) {
    //     if ($result_all->num_rows > 0) {
    //         // output data of each row
    //         while ($row = $result_all->fetch_assoc()) {
              
    //             echo '<div class="page">
    //         <br>
    //          <table style="width: 100%">
    //         <tr>
    //             <td style="width: 5in">
    //                 <img src="hks_receipt_footer.svg" height="120" style="display: block;   margin: left;">
    //             </td>
    //             <td style="width: 2in">
    //                 <table style="width: 100%" >
    //                     <tr><td>ISSUE:</td> <td>Special</td></tr>                    
    //                     <tr><td>REGD:</td> <td>DA6037</td></tr>                    
    //                     <tr><td>DATE:</td> <td> ' . $date . '</td></tr>                    
    //                     </table>
    //             </td>
    //             <td>
    //                     প্রাপক, <br>
    //                 ' . $row["Name"] . '<br>
    //                 ' . $row["vill"] . ' <br>
    
    //                 ডাকঃ' . $row["po_bn"] . ",থানাঃ" . ps_en_bn($row["ps"]) . ', <br>
    //                 জেলা:' . dist_en_bn($row["dist"]) . ' <br>
    //                 ' . $row["mob"] . '
    //             </td>
    //         </tr>
    //         <tr>
    //             <td colspan="3" style="font-weight:bold;font-size:1.2em;line-height: 1.5;" >
    //             হরেকৃষ্ণ, শ্রীশ্রী জগন্নাথদেবের রথযাত্রা মহোৎসব ২০২২ উপলক্ষে জানাই কৃষ্ণপ্রীতি ও শুভেচ্ছা। আপনি মাসিক হরেকৃষ্ণ সমাচারের একজন নিয়মিত গ্রাহক ছিলেন, আপনার নিবন্ধন নং: ' . $row["ID_EN"] . '
    //             । আপনার গ্রাহক পদের মেয়াদ নবায়নের জন্য যোগাযোগ করুন- ০১৭১৫ ৭৫৮৯৪৮। 
    //             </td>            
    //         </tr>
    //         <tr>
    //             <td colspan="3" style="text-align:center;padding-top:20px; font-size:1.4em;">
    //              সংবাদপত্র দয়া করে দ্রুত পৌঁছে দিন।
    //             </td>
    //         </tr>
    //         </table>
    
    //         </div>
    //         ';
    //         }
    //     } else {
    //         echo "0 results";
    //     }
    // }
    

    $conn_all->close();

    ?>

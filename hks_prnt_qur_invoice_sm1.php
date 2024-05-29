<?php
session_start();
$print_issue = $_SESSION["print_issue"];
?>

<!DOCTYPE html>
<html>

<head>
    <title> Courier Invoice</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon1.ico" />
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39 Text' rel='stylesheet'>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script defer src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script> -->

    <script>
        const words = ["",
            "এক",
            "দুই",
            "তিন",
            "চার",
            "পাঁচ",
            "ছয়",
            "সাত",
            "আট",
            "নয়",
            "দশ",
            "এগার",
            "বারো",
            "তেরো",
            "চৌদ্দ",
            "পনেরো",
            "ষোল",
            "সতেরো",
            "আঠারো",
            "উনিশ",
            "বিশ",
            "একুশ",
            "বাইশ",
            "তেইশ",
            "চব্বিশ",
            "পঁচিশ",
            "ছাব্বিশ",
            "সাতাশ",
            "আটাশ",
            "উনত্রিশ",
            "ত্রিশ",
            "একত্রিশ",
            "বত্রিশ",
            "তেত্রিশ",
            "চৌত্রিশ",
            "পঁয়ত্রিশ",
            "ছয়ত্রিশ",
            "সাইত্রিশ",
            "আটত্রিশ",
            "উনচল্লিশ",
            "চল্লিশ",
            "একচল্লিশ",
            "বিয়াল্লিশ",
            "তেতাল্লিশ",
            "চুয়াল্লিশ",
            "পঁয়তাল্লিশ",
            "ছেচল্লিশ",
            "সাতচল্লিশ",
            "আটচল্লিশ",
            "উনপঞ্চাশ",
            "পঞ্চাশ",
            "একান্ন",
            "বায়ান্ন",
            "তিপ্পান্ন",
            "চুয়ান্ন",
            "পঞ্চান্ন",
            "ছাপ্পান্ন",
            "সাতান্ন",
            "আটান্ন",
            "উনষাট",
            "ষাট",
            "একষট্টি",
            "বাষট্টি",
            "তেষট্টি",
            "চৌষট্টি",
            "পঁয়ষট্টি",
            "ছেষট্টি",
            "সাতষট্টি",
            "আটষট্টি",
            "উনসত্তর",
            "সত্তর",
            "একাত্তর",
            "বাহাত্তর",
            "তেয়াত্তর",
            "চুয়াত্তর",
            "পঁচাত্তর",
            "ছিয়াত্তর",
            "সাতাত্তর",
            "আটাত্তর",
            "উনআশি",
            "আশি",
            "একাশি",
            "বিরাশি",
            "তিরাশি",
            "চুরাশি",
            "পঁচাশি",
            "ছিয়াশি",
            "সাতাশি",
            "আটাশি",
            "উননব্বই",
            "নব্বই",
            "একানব্বই",
            "বিরানব্বই",
            "তিরানব্বই",
            "চুরানব্বই",
            "পঁচানব্বই",
            "ছিয়ানব্বই",
            "সাতানব্বই",
            "আটানব্বই",
            "নিরানব্বই"
        ];
    </script>
</head>

<style>
    #barcode {
        font-family: 'Libre Barcode 39 Text';
        font-size: 40px;
        text-align: center;

    }

    .page {
        width: 6in;
        max-width: 6in;
        min-height: 5in;
        padding: 100px 50px 20px 50px;
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
        border: 0.5px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: Center;
    }

    @media print {
        .page {
            margin: auto;
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

<body>
    <?php
    include_once "function.php";

    // Create connection
    $conn_all = make_connection();

    $sql_all = "SELECT tblIssue.transid, tblIssue.vername, tblIssue.agcpy, tblIssue.SentDate, tblIssue.transaction_id, tblIssue.VPNo,
     tblMem.courier_name, tblMem.courier_description, tblMem.Name, tblMem.vill, tblMem.ps, tblMem.dist, tblMem.phone, tblMem.news_rate FROM tblIssue
     LEFT JOIN tblMem ON tblIssue.transid = tblMem.ID_EN
     WHERE (tblIssue.vername=$print_issue) AND (tblIssue.transid<99) AND (tblIssue.transid>0)
     ORDER BY tblMem.courier_name";
    $result_all = $conn_all->query($sql_all);

    if ($result_all->num_rows > 0) {

        while ($row = $result_all->fetch_assoc()) {

            $en_price = intval(doubleval($row["agcpy"]) * doubleval($row["news_rate"]));
            $en_num = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
            $bn_num = ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"];
            $new_num = str_replace($en_num, $bn_num, $en_price);
            $date = $row["SentDate"];
            // $newDateString = date_format(date_create_from_format('Y-m-d', $row["SentDate"]), 'd/m/Y');
            $newDateString = date('d/m/Y', strtotime($row['SentDate']));
            echo '
           <div class="page">
            <div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h2 style="text-align: Center;" >চালান  </h2>
                    <h6 style="text-align:right;">' . $newDateString . ' </h6>
            </div>
           <table style="width: 100%;">
                <tr>
                    <td style="font-size:22px; text-align: right; font-weight: bold;" colspan="2" > ' . $row["courier_name"] . ',  ' . $row["courier_description"] . '</td>
                </tr>
                <tr style="font-size:14px; text-align: center;  font-weight: bold;">
                    <td style="width:50%"> Agent: ' . $row["transid"] . '</td>
                    <td> Issue: ' . $print_issue . '</td>
                </tr>
                <tr>
                    <td style="font-size:20px" colspan="2">
                        ' . $row["Name"] . '<br>
                        ' . $row["vill"] . ' <br>
                        থানাঃ' . ps_en_bn($row["ps"]) . ', <br>
                        জেলা:' . dist_en_bn($row["dist"]) . ' <br>
                        ' . $row["phone"] . '
                    <hr/>
                            <h5 id="barcode" >*' . $row["transaction_id"] . '*</h5>
                        </td>
                    </tr>
           </table>
           <br>
           <table style="width: 100%;">
           <tr> <td style="font-size:24px; text-align: Center; font-weight: bold;" colspan="4" > বিবরণ</td></tr>
           <tr style="font-size:24px;"><th></th><th style="width: 0.5in;"></th><th style="width: 0.5in;font-size:24px;">@</th><th style="width: 0.5in;font-size:24px;" >মোট</th></tr>
           <tr>
                <td style="font-size:24px;">HKS-' . $print_issue . '</td>
                <td style="font-size:24px;">' . doubleval($row["agcpy"]) . '</td>
                <td  style="font-size:24px;" >' . doubleval($row["news_rate"]) . '</td>
                <td style="font-size:24px;" >' . intval(doubleval($row["agcpy"]) * doubleval($row["news_rate"])) . '</td>
           </tr>

           <tr><td></td><td></td><td></td><td  style="font-size:24px;" >' . intval(doubleval($row["agcpy"]) * doubleval($row["news_rate"])) . '</td></tr>
           </table>

           <div style="font-family:  SutonnyMJ;text-align: Center; font-weight: bold; margin-top: 30px;">
           <h5>কন্ডিশন: (<span style=" font-family:  SutonnyMJ">' . $new_num . '</span>/-)  <span id="w' . $row["transid"] . '" ></span>
           দিয়ে পত্রিকা উঠানোর জন্য অনুরোধ করা হল।
           </h5>
           <br>
           <h4 class="text-bold">01715-758948</h4>
           </div>
           </div>
 <script>
 var  amount0=' . intval(doubleval($row["agcpy"]) * doubleval($row["news_rate"])) . ';

var bangla_words="";
var amount=amount0.toString();
 var am_len=amount.length;
 var unit=amount.substring(am_len-2,am_len-0);

 var hundred=amount.substring(am_len-3,am_len-2);

 var thousand=amount.substring(am_len-5,am_len-3);
 var lakh=amount.substring(am_len-7,am_len-5);


 var unit_words=words[unit];
 var hundred_words=words[hundred];

 var thousand_words=words[thousand];
 var lakh_words=words[lakh];
if(unit_words!== undefined){

    bangla_words=unit_words;

}


if(hundred_words!== undefined){

    bangla_words=hundred_words+" শত"+" "+bangla_words;

}



if(thousand_words!== undefined ){

    bangla_words=thousand_words+" হাজার"+" "+bangla_words;


}

if(lakh_words!== undefined ){

    bangla_words=lakh_words+" লক্ষ"+" "+bangla_words;


}

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
     document.getElementById("w' . $row["transid"] . '" ).innerHTML  ="মাত্র  "+bangla_words+" টাকা ";

  }
</script>

';
        }
    }

    $conn_all->close();

    ?>

</body>

</html>
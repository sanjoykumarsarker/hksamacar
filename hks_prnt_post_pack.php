<?php
session_start();
  $print_issue=$_SESSION["print_issue"];


 
 
?>

<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Post Office Pack Label</title>


  <meta charset="utf-8">
  
  <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
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
   footer:nth-child(5n+0) {
        page-break-after: always;
}
    .page {
        width: 8.27in;
        min-height: 11.69in;
        padding: 10px 10px 20px 10px;
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
	
table, tr,td {
    border: 0px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 2px;
    text-align: left;
}

 @media print {


     footer:nth-child(5n+0) {
        page-break-after: always;
}
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
         }
    }


</style>

<body >

<div class="page">


  <div  ></div>








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
mysqli_set_charset($conn_all,"utf8");
  $sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=".$print_issue.") AND (transid<10000)AND(transid>99) order by cast(VPNo as unsigned)";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
    // output data of each row
  
    echo '<table style="width:100%" >';

    while($row = $result_all->fetch_assoc()){

        $newDateString = date_format(date_create_from_format('Y-m-d', $row["SentDate"]), 'd/m/Y');


        $en_price=intval(doubleval($row["agcpy"])*doubleval(id_news_rate($row["transid"])));
        $en_num = ["0", "1", "2","3", "4", "5","6", "7", "8","9"];
        $bn_num = ["০", "১", "২","৩", "৪", "৫","৬", "৭", "৮","৯"];
        
        $new_num = str_replace($en_num, $bn_num, $en_price);

        $journal=substr($row["VPNo"],0,2);
        $vpno=substr($row["VPNo"],2);

           echo '

           <hr>
         

           <table style="width: 100%">
 
<tr  >
<h4 style="font-size:16px;    font-family: SutonnyMJ ; text-align: left; font-weight: bold;">ভিপি মূল্য: ৳'.$new_num.'/-( <span id="w'.$row["transid"].'" ></span>  )</h4>
</tr>

<tr>
<td style="width: 3in;">
<div style="font-size:18px; text-align: center;font-weight: bold;"> REGD: DA6037 &nbsp &nbsp'.$print_issue.' &nbsp&nbsp 



 <span style="font-size:18px; text-align: center;  font-weight: bold; "> Agent: <span style="font-size:18px;font-weight:bold"> '.$row["transid"].' </span>('.$row["agcpy"].'Pcs)</span>













</div>
   <img src="hks_receipt_footer.svg" height="100" style="display: block; margin: left;">
</td>

<td style="width: 3in;">
<table style="width: 100%;" >
<tr><td style="font-size:22px; text-align: center;" >Date: '.$newDateString.'<br> VP No: <span style="font-size:22px;font-weight:bold">'.$vpno.'</span></td></tr>
<tr><td ><svg style="width:120%;height:50%;text-align:center;" id="s'.$row["transid"].'" >
    
</svg></td></tr>
</table>
</td>
 
<td style="font-size:18px;padding-top:0px;">
প্রাপক, <br>
'.id_name($row["transid"]).'<br>
'.id_vill($row["transid"]).' <br>
 
ডাকঃ'.id_po_bn($row["transid"]).",থানাঃ".ps_en_bn(id_ps($row["transid"])).', <br>
 জেলা:'.dist_en_bn(id_dist($row["transid"])).' <br>


 '.id_phone($row["transid"]).'
</td>
</tr>














</table>


<footer> <p>.</p>
</footer>
 <script> JsBarcode("#s'.$row["transid"].'", "'.$row["transaction_id"].'");</script> 
 

 
 
 
  

<script>
 
 var words = new Array();
 words[0] = "";
 words[1] = "এক";
 words[2] = "দুই";
 words[3] = "তিন";
 words[4] = "চার";
 words[5] = "পাঁচ";
 words[6] = "ছয়";
 words[7] = "সাত";
 words[8] = "আট";
 words[9] = "নয়";
 words[10] = "দশ";
 words[11] = "এগার";
 words[12] = "বারো";
 words[13] = "তেরো";
 words[14] = "চৌদ্দ";
 words[15] = "পনেরো";
 words[16] = "ষোল";
 words[17] = "সতেরো";
 words[18] = "আঠারো";
 words[19] = "উনিশ";
 words[20] = "বিশ";
words[21] = "একুশ";
words[22] = "বাইশ";
words[23] = "তেইশ";
words[24] = "চব্বিশ";
words[25] = "পঁচিশ";
words[26] = "ছাব্বিশ";
words[27] = "সাতাশ";
words[28] = "আটাশ";
words[29] = "উনত্রিশ";
 words[30] = "ত্রিশ";
words[31] = "একত্রিশ";
words[32] = "বত্রিশ";
words[33] = "তেত্রিশ";
words[34] = "চৌত্রিশ";
words[35] = "পঁয়ত্রিশ";
words[36] = "ছয়ত্রিশ";
words[37] = "সাইত্রিশ";
words[38] = "আটত্রিশ";
words[39] = "উনচল্লিশ";
 words[40] = "চল্লিশ";
words[41] = "একচল্লিশ";
words[42] = "বিয়াল্লিশ";
words[43] = "তেতাল্লিশ";
words[44] = "চুয়াল্লিশ";
words[45] = "পঁয়তাল্লিশ";
words[46] = "ছেচল্লিশ";
words[47] = "সাতচল্লিশ";
words[48] = "আটচল্লিশ";
words[49] = "উনপঞ্চাশ";
 words[50] = "পঞ্চাশ";
words[51] = "একান্ন";
words[52] = "বায়ান্ন";
words[53] = "তিপ্পান্ন";
words[54] = "চুয়ান্ন";
words[55] = "পঞ্চান্ন";
words[56] = "ছাপ্পান্ন";
words[57] = "সাতান্ন";
words[58] = "আটান্ন";
words[59] = "উনষাট";
 words[60] = "ষাট";
words[61] = "একষট্টি";
words[62] = "বাষট্টি";
words[63] = "তেষট্টি";
words[64] = "চৌষট্টি";
words[65] = "পঁয়ষট্টি";
words[66] = "ছেষট্টি";
words[67] = "সাতষট্টি";
words[68] = "আটষট্টি";
words[69] = "উনসত্তর";
 words[70] = "সত্তর";
words[71] = "একাত্তর";
words[72] = "বাহাত্তর";
words[73] = "তেয়াত্তর";
words[74] = "চুয়াত্তর";
words[75] = "পঁচাত্তর";
words[76] = "ছিয়াত্তর";
words[77] = "সাতাত্তর";
words[78] = "আটাত্তর";
words[79] = "উনআশি";
 words[80] = "আশি";
words[81] = "একাশি";
words[82] = "বিরাশি";
words[83] = "তিরাশি";
words[84] = "চুরাশি";
words[85] = "পঁচাশি";
words[86] = "ছিয়াশি";
words[87] = "সাতাশি";
words[88] = "আটাশি";
words[89] = "উননব্বই";
 words[90] = "নব্বই";
words[91] = "একানব্বই";
words[92] = "বিরানব্বই";
words[93] = "তিরানব্বই";
words[94] = "চুরানব্বই";
words[95] = "পঁচানব্বই";
words[96] = "ছিয়ানব্বই";
words[97] = "সাতানব্বই";
words[98] = "আটানব্বই";
words[99] = "নিরানব্বই";
   var  amount0='.intval(doubleval($row["agcpy"])*doubleval(id_news_rate($row["transid"]))).'; 

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
     // document.getElementById("w'.$row["transid"].'" ).innerHTML  =words_string+"Taka Only";
    document.getElementById("w'.$row["transid"].'" ).innerHTML  =bangla_words+" টাকা মাত্র";

 
  }
 

</script>




';




}
}


$conn_all->close();
   


?>
</div> 
<!-- end of container -->

<!-- td><img src="sample_barcode.png" height="50"  style="float: right; transform:rotate(90deg);"> </td-->
</body>
</html>
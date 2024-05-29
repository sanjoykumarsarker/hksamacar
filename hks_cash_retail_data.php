<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Receipt</title>


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

    
</head>
<style>

    .page {
        page-break-after: always;

width: 8.1in;
min-height: 10.6in;
padding: 0in   2.2in  0in  2.2in   ;
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
	
table, tr,td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 2px;
    text-align: left;
}

 @media print {
        .page {
            page-break-after: always;

        width: 8.1in;
    min-height: 10.6in;
    padding: 0in   2.2in  0in  2.2in   ;
    margin: 1cm auto;
     background: white;
    box-shadow: 0 0 0px rgba(0, 0, 0, 0);
        }
    }


</style>
<body >

<div class="page">

<div style="font-size:12px; text-align: center;">
হরে কৃষ্ণ হৃরে কৃষ্ণ কৃষ্ণ কৃষ্ণ হরে হরে।
<br>
হরে রাম হরে রাম রাম রাম হরে হরে ।।
</div>
<h2 style="text-align: center"> Donation Receipt</h2>
<svg id="barcode" >
    
</svg>


<div style="font-size:12px;">
<table style="width: 100%">
<?php


include_once "session_check.php";
session_start();
  $user=$_SESSION["id"];

  $max_val= $_POST["max_val"];
 
  $cash_disc= $_POST["cash_disc"];

  $Rdate= $_POST["cash_date"];
  $cust_name= $_POST["cash_name"];
  $address= $_POST["cash_addr"];
  $max_val= $_POST["cash_mobile"];
  $phone= $_POST["cash_mobile"];
  $transaction_id= $_POST["cash_trnx"];

  $transaction_id_all=$transaction_id;
  $cust_id= $_POST["cash_trnx_id"];
  $max_val= $_POST["max_val"];
  $Comment= $_POST["comments"];

  $total_paid=intval($_POST["cash_total_paid"]);


  $paid_bal=intval($_POST["cash_total_paid"]);

 $paid= intval($_POST["cash_total_paid"]);
 $cash_total_copy= intval($_POST["cash_total_copy"]);

 $total_due= intval($_POST["cash_total_due"]);
 $total_donation= intval($_POST["cash_total_donation"]);

  $servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";


date_default_timezone_set("Asia/Dhaka");
  $date= date("Y-m-d");






?>
<tr><td>Name: <?php echo $cust_name;?></td></tr>
<tr><td>Address: <?php echo $address;?></td></tr>
<tr><td>Mobile: <?php echo $phone;?></td></tr>
</table>
</div>
<br>
<div style="font-size:14px;">
<table style="width: 100%">
<th>SL</th> <th style="width: 2in" >Item</th><th style="width:50px; text-align: Center">QTY</th><th style="width:50px; text-align: Center">@</th><th style="width:50px">Total</th>

<?php
$baln=0;
 
$due=0;
for($i=0;$i<=$max_val;$i++){


$vername=    $_POST["name".$i."1"];
$agcpy=  $_POST["name".$i."2"];
$rate=  $_POST["name".$i."3"];
$donation=  $_POST["name".$i."4"];
$transaction_id=$transaction_id+1;
if($i==0){

    $baln=$total_paid;
  
}


if($baln<$donation && $baln>0){
    $paid=$baln;
     $due=$donation-$paid;

}
else if($baln<1){

$paid=0;
$due=$donation;
}
else{
$paid=$donation;
 $due=0;

}

 
echo '<tr><td>'.intval($i+1).'</td> <td >'.$vername.'</td> <td style="text-align: Center">'.$agcpy.'</td> <td style="text-align: Center">'.$rate.'</td> <td style="text-align: Right">'.$donation.'</td></tr>';
 


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO tblIssue (cust_name,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation,user,news_rate,news_price,Dr)
    VALUES (:cust_name,:cust_id,:phone,:total_donation,:paid,:due,:transaction_id,:Rdate,:vername,:agcpy,:Comment,:address,:donation,:user,:news_rate,:news_price,:Dr)");




    $stmt->bindParam(':cust_name', $cust_name);

    $stmt->bindParam(':cust_id', $cust_id);
    $stmt->bindParam(':phone', $phone);
    $total_donation_indv=0;
    $stmt->bindParam(':total_donation', $total_donation_indv);
  
    $stmt->bindParam(':paid', $paid);
    $stmt->bindParam(':Dr', $paid);

    $stmt->bindParam(':due', $due);
    $stmt->bindParam(':transaction_id', $transaction_id);
    $stmt->bindParam(':Rdate', $Rdate);
    $stmt->bindParam(':vername', $vername);
    $stmt->bindParam(':agcpy', $agcpy);
    $stmt->bindParam(':Comment', $Comment);
     
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':donation', $donation);
    $stmt->bindParam(':news_price', $donation);

    $stmt->bindParam(':user', $user);
    
    $stmt->bindParam(':news_rate', $rate);

    $stmt->execute();  
    // echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;





$baln=$baln-$donation;







}







 echo ' <tr><td colspan="3"></td>  <td>Total</td> <td style="text-align: Right">'.$total_donation.'</td></tr>';

 echo ' <tr><td colspan="3"></td>  <td>Discount</td> <td style="text-align: Right">'.$cash_disc.'</td></tr>';
 echo ' <tr><td colspan="3"></td>  <td>Paid</td> <td style="text-align: Right">'.$total_paid.'</td></tr>';
 echo ' <tr><td colspan="3"></td>  <td>Due</td> <td style="text-align: Right">'.intval($total_donation-$total_paid-$cash_disc).'</td></tr>';

try {
$conn_tot = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
 $conn_tot->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$conn_tot->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
$conn_tot->query('SET NAMES "utf8"'); 
// prepare sql and bind parameters
$stmt = $conn_tot->prepare("INSERT INTO tblIssue (cust_name,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation,user)
VALUES (:cust_name,:cust_id,:phone,:total_donation,:paid,:due,:transaction_id,:Rdate,:vername,:agcpy,:Comment,:address,:donation,:user)");




$stmt->bindParam(':cust_name', $cust_name);

$stmt->bindParam(':cust_id', $cust_id);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':total_donation', $total_donation);

$stmt->bindParam(':paid', $total_paid);

$stmt->bindParam(':due', $total_due);
 $stmt->bindParam(':transaction_id', $transaction_id_all);
$stmt->bindParam(':Rdate', $date);

$vername=0;
$stmt->bindParam(':vername', $vername);


$stmt->bindParam(':agcpy', $cash_total_copy);
$stmt->bindParam(':Comment', $Comment);
 
$stmt->bindParam(':address', $address);
$donation=0;
$stmt->bindParam(':donation', $donation);

$stmt->bindParam(':user', $user);

$stmt->execute();

//echo "New records created successfully";
}
catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
$conn_tot = null;

?>

</table>
</div>








<div class="bottom_aligner"></div>
<div id ="one" style="font-size:12px; text-align: left;">In words:
<b id="word"></b>
</div>
<br>
 
 <p style="font-size:8px; text-align: right;" >(Signature)</p>
<div   style="font-size:12px; text-align: right;">Authorized by <?php echo user_id_name($user);?>
 


</div>
<br><br>
<hr style="background-color: transparent; border: 0.25px solid black; margin: 0em 0em 0em 0em; " noshade>
        <img src="hks_receipt_footer.svg"  style="display: block;   margin: auto auto;">

</div> <!-- end of container -->

 
</body>
<script type="text/javascript">
       JsBarcode("#barcode"," <?php echo $_POST["cash_trnx"];?>");


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

   var  amount0='<?php echo intval($_POST["cash_total_paid"]);?>';
var amount=amount0.toString();
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
      document.getElementById("word").innerHTML  =words_string+"Taka Only";
 
// alert(words_string);
  }
 

</script>
</html>
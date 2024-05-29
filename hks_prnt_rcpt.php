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
 
 
</head>

<style>

    .page {
        width: 3.75in;
        min-height: 7.5in;
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

<body >

<div class="page">

<div style="font-size:12px; text-align: center;">
হরে কৃষ্ণ হৃরে কৃষ্ণ কৃষ্ণ কৃষ্ণ হরে হরে।
<br>
হরে রাম হরে রাম রাম রাম হরে হরে ।।
</div>
<h2 style="text-align: center"> Donation Receipt</h2>
<img src="sample_barcode.png" height="50"  style="display: block;   margin: auto auto;">

<div style="font-size:12px;">
<table style="width: 100%">
<tr><td>Name: Tapash Biswas</td></tr>
<tr><td>Address: Narinda, Dhaka-1100</td></tr>
<tr><td>Mobile: 01921-861913</td></tr>
</table>
</div>
<br>
<div style="font-size:14px;">
<table style="width: 100%">
<th>SL</th> <th style="width: 2in" >Item</th><th style="width:50px; text-align: Center">QTY</th><th style="width:50px; text-align: Center">@</th><th style="width:50px">Total</th>
<tr><td>1.</td> <td >HKS 0905</td> <td style="text-align: Center">100</td> <td style="text-align: Center">5.5</td> <td style="text-align: Right">550.00</td></tr>
<tr><td>2.</td> <td >HKS 0906</td> <td style="text-align: Center">200</td> <td style="text-align: Center">5.5</td> <td style="text-align: Right">1100.00</td></tr>

<tr><td colspan="3"></td>  <td>Total</td> <td style="text-align: Right">1,650.00</td></tr>

</table>
</div>








<div class="bottom_aligner"></div>
<div style="font-size:12px; text-align: left;">In words: Twenty Thousand Five Hundred Taka Only.
</div>
<br><br>
<hr style="background-color: transparent; border: 0.25px solid black; margin: 0em 0em 0em 0em; " noshade>
        <img src="hks_receipt_footer.svg"  style="display: block;   margin: auto auto;">

</div> <!-- end of container -->


</body>
</html>
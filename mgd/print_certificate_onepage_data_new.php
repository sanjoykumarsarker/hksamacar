<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
        .certificate {
            margin: auto;
            width: 100%;
            height:100vh;
            min-height:100vh;
            font-family: 'EkusheyLohit', sans-serif;
        }

        .certificate .details{
            /* width: 480px;
            height: 240px; */
            padding-top: 25%;
            padding-left:5%;
            margin: 0 auto;
        }
        @media print{@page {size: landscape}}
        hr{
            border: 1px dashed rgb(65, 65, 65);
        }
    </style>
</head>
<body>

 <?php

include 'function.php';
$si = 1;
$q0 = json_decode($_POST['myData'], true);
// $q0 = date('Y-m-d');
$q0;
$q = idatetoreg($q0);

//     echo "<table>";
//     foreach ($q as $reg) {

//     $ss = substr($reg, 0, 6);

//     echo "<tr><td><div style='margin-left: .6cm;'>

//     <p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p>

//         <p style='font-family:SutonnyMJ; font-size:40px;'>" . regtoiserial($reg) . "</p>
//         <p style='font-family:SutonnyMJ; margin-top: -.5cm;'>স্থান: ইসকন, সিলেট;    <span style='font-family:SutonnyMJ; font-size:20px;'> " . regtoidate($reg) . " </span>ইং; </p>
//         <p>    নাম: " . bname($reg) . " [" . ename($reg) . "]</p>
//         <p style='font-size:20px;'> <b>দীক্ষা নাম: " . finalname_b($reg) . "</b></p>
//         <p > [" . finalname($reg) . "] </p>
//         <p>    মন্দির : " . tbname($ss) . " </p>
//         <p>Reg:" . $reg . ";  Address : " . address($reg) . " </p>
//         <p>&nbsp</p><p>&nbsp</p>
//          </div></td></tr>";

//     }

// $si = $si + 1;

// echo "</table>";
foreach ($q as $reg) {
    $ss = substr($reg, 0, 6);
    echo '<div class="certificate">
        <div class="details text-center">
            <h1 class="boder-bottom">' . finalname_b($reg) . '</h1>
            <hr width="40%">
            <h4 class="">' . finalname($reg) . '</h4>
            <h5 class="pt-2">' . regtoiserial($reg) . ' . ' . bname($reg) . ' | <span>দীক্ষা তারিখ: ' . regtoidate($reg) . 'ইং</span></h5>
            <p class="pt-2"><b>স্থান:</b>শ্রীশ্রী রাধাগোপীনাথ জিউ মন্দির, গড়েয়া, ঠাকুরগাঁও।</p>
        </div>
    </div>';
}
?>


	</body>
	</html>
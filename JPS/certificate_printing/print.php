<?php
$bangla_name = $_POST['final_bn_name'] ?? "হরেকৃষ্ণ দাস";
$english_name = $_POST['final_en_name'] ?? "Hare Krishna Das";
$serial = $_POST['serial'] ?? '';
$name = $_POST['name'] ?? "Hare Krishna/হরেকৃষ্ণ";
$date = $_POST['date'] ? date('d-F-Y', strtotime($_POST['date'])) : date('d-F-Y');
$place = $_POST['place'] ?? "শ্রীশ্রী রাধাগোপীনাথ জিউ মন্দির, গড়েয়া, ঠাকুরগাঁও।";

$sl = $serial ? $serial . '. ' : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo   $english_name ?? 'JPS'; ?> - Certificate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link href="https://fonts.maateen.me/ekushey-lohit/font.css" rel="stylesheet"> -->
    <link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
    <style>
        .certificate {
            margin: auto;
            /* margin-right: -100px !important; */
            width: 100%;
            height: 100vh;
            min-height: 100vh;
            /* font-family: 'EkusheyLohit', sans-serif; */
            font-family: 'Bangla', sans-serif;
        }

        .certificate .details {
            padding-top: 34%;
            padding-left: 5%;
            margin: 0 auto;
        }

        @media print {
            @page {
                size: landscape
            }
        }

        hr {
            border: 1px dashed rgb(65, 65, 65);
        }
    </style>
</head>

<body>

    <?php

    if (file_exists($_FILES['excel']['tmp_name']) || is_uploaded_file($_FILES['excel']['tmp_name'])) {
        include_once './SimpleXLSX.php';

        if ($xlsx = SimpleXLSX::parse($_FILES['excel']['tmp_name'])) {
            // echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
            // foreach ($xlsx->rows() as $r) {
            //     echo '<tr><td>' . implode('</td><td>', $r) . '</td></tr>';
            // }
            // echo '</table>';
            // $xlsx->toHTML();
            $header_values = $rows = [];
            foreach ($xlsx->rows() as $k => $r) {
                if ($k === 0) {
                    $header_values = $r;
                    continue;
                }
                $rows[] = array_combine($header_values, $r);
            }

            foreach ($rows as $value) {
                echo '<div class="certificate">
        <div class="details text-center">
        <h1 class="boder-bottom">' . $value['final_bn_name'] . '</h1>
        <hr width="40%">
        <h4 class="">' . $value['finalname'] . '</h4>
        <h5 class="pt-2">' . $value['SN'] . '. ' . $value['ename'] . ' | <span>দীক্ষা তারিখ: ' . $date . ' ইং</span></h5>
        <p class="pt-2"><b>স্থান: </b>' . $place . '</p>
        </div>
        </div>';
            }
        } else {
            echo SimpleXLSX::parseError();
        }
    } else {
        echo '<div class="certificate">
        <div class="details text-center">
        <h1 class="boder-bottom">' . $bangla_name . '</h1>
        <hr width="40%">
        <h4 class="">' . $english_name . '</h4>
        <h5 class="pt-2">' . $sl . $name . ' | <span>দীক্ষা তারিখ: ' . $date . ' ইং</span></h5>
        <p class="pt-2"><b>স্থান: </b>' . $place . '</p>
        </div>
        </div>';
    }

    ?>


</body>

</html>
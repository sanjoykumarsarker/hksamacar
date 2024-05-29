<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();

function enToBnDate($date = null)
{
    $num = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $bn_num = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $month_bangla = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
    return str_replace($month, $month_bangla, str_replace($num, $bn_num, date("d F, Y", strtotime($date)) ?? date("d F, Y")));
}
$mode = isset($_POST['mode']) ? filter_var($_POST['mode'], FILTER_SANITIZE_STRING) : 'landscape';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Srila Jayapataka Swami Initiation Database - Print Certificate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->


    <?=
        "<style type='text/css'>
            @page {
                size: A4 $mode
            }</style>";
    ?>
    <style type='text/css'>
        /* https://fonts.shahid.pro/ */
        @import url('https://cdn.staticaly.com/gh/sh4hids/bangla-web-fonts/9baee0fc23e77fe957c0b70fe49d81d2cbbe87d6/boshonto/stylesheet.css');


        .container {
            border: 8px solid tan;
            width: 98%;
            height: 98%;
            display: block;
            position: relative;
            text-align: center;
        }


        .logo {
            margin-top: 20px;
            font-size: 32px;
        }

        .marquee {
            font-size: 38px;
            margin: 15px;
        }

        .assignment {
            margin: 20px;
            font-size: 20px;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 34px;
            padding-bottom: 5px;
            margin: 50px auto 0 auto;
            width: 400px;
            font-family: 'Boshonto', sans-serif;
        }

        .logo-bottom {
            margin-top: 0;
            margin-bottom: 2rem;
            font-size: 10px;
            color: #b33829;
        }
    </style>
</head>

<body class="A4 <?= $mode ?>">

    <!-- GET REQUEST -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <section class="sheet padding-10mm">
            <div class="container">
                <div class="card p-4 text-dark bg-light shadow-sm" style="max-width: 32rem; margin:30px auto;">
                    <div class="card-body">
                        <h5 class="card-title">Print Certificate</h5>
                        <hr>
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Select Date</span>

                                <?php
                                    include_once 'function.php';
                                    // Create connection
                                    $conn = make_connection();
                                    $sqld = "SELECT DISTINCT idate FROM date_set";
                                    $resultd = $conn->query($sqld);

                                    if ($resultd->num_rows > 0) {
                                        echo "<select id='change' name='date' class='form-select'>";
                                        echo "<option>Please Select Date</option>";
                                        while ($row = $resultd->fetch_assoc()) {
                                            echo "<option>" . $row["idate"] . "</option>";
                                        }
                                        echo "</select></div>";
                                    }
                                    $conn->close();
                                    ?>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Search</span>
                                    <input name="search" type="text" class="form-control" placeholder="Name...">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Place</span>
                                    <input name="place" type="text" class="form-control" placeholder="Place of Initiation...">
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Range</span>
                                            <input type="text" class="form-control" name="range" placeholder="1-10">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Mode</span>
                                            <select name="mode" id="mode" class="form-select">
                                                <option value="landscape" selected>Landscape</option>
                                                <option value="portrait">Portrait</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex w-100 mt-3">
                                    <div class="flex-fill"></div>
                                    <button type="reset" class="btn btn-dark flex-fill">Reset</button>
                                    <button type="submit" class="btn btn-primary ms-3 flex-fill">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- POST REQUEST -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'function.php';

        $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);

        $place = filter_var($_POST['place'], FILTER_SANITIZE_STRING);
        $image = $mode === 'landscape' ? null : '<img style="filter: grayscale(80%);" width="220" src="https://www.jayapatakaswamibangla.com/assets/img/quote/GM_01.png" alt="iskcon logo">';
        $margin = $mode === 'landscape' ? "margin-bottom:7%;" : 'margin:10% 0;';

        $conn = make_connection();
        $select = "SELECT reg.bname, reg.ename, reg.finalname_b, reg.finalname,
                         date_set.reg, date_set.iserial, date_set.idate
                FROM date_set
                LEFT JOIN reg ON date_set.reg = reg.reg
                WHERE date_set.idate='$date' ";

        $order = "ORDER BY CONVERT(date_set.iserial, UNSIGNED INTEGER)";

        if (!empty($_POST['search'])) {
            $search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);
            $query = " AND (reg.ename LIKE '%$search%' OR reg.phone LIKE '$search%' OR reg.bname LIKE '%$search%' OR reg.finalname LIKE '%$search%') ";
            $select .= $query;
        }

        $sql = $select . $order;

        if (!empty($_POST['range'])) {
            if (strpos($_POST['range'], '-')) {
                $range = filter_var($_POST['range'], FILTER_SANITIZE_STRING);
                $ranges = explode('-', $range);
                $offset = $ranges[0];
                $limit = $ranges[1];
                $query_range = " LIMIT $limit OFFSET $offset";
                $sql .= $query_range;
            }
        }

        $resultd = $conn->query($sql);
        if ($resultd->num_rows > 0) {
            while ($row = $resultd->fetch_assoc()) {
                echo '
                <section class="sheet padding-10mm">
                <div class="container">
                    <p style="font-size:14px;color:#555;margin-top:20px;">
                        জয় শ্রীকৃষ্ণচৈতন্য প্রভু নিত্যানন্দ । শ্রীঅদ্বৈত গদাধর শ্রীবাসাদি গৌর ভক্তবৃন্দ ।।
                    </p>
                    <p style="font-size:14px;color:#555;margin-bottom:5%;">
                        হরে কৃষ্ণ হরে কৃষ্ণ
                        কৃষ্ণ কৃষ্ণ হরে হরে ।
                        হরে রাম হরে রাম
                        রাম রাম হরে হরে ।।
                    </p>
                    <div style="' . $margin . '">
                        <div class="logo">
                            আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ (ইসকন)
                        </div>
                        <p style="font-size:17px;color:#555;">প্রতিষ্ঠাতা আচার্য: কৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরণারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদ</p>
                    </div>
                    ' . $image . '
                    <div class="assignment" style="color:#666;">
                        ওঁ বিষ্ণুপাদ পরমহংস পরিব্রাজকাচার্য অষ্টোত্তরশত
                    </div>
                    <div class="marquee">শ্রীশ্রীমৎ জয়পতাকা স্বামী গুরুমহারাজ</div>
                    <div class="assignment" style="color:#666;">
                        কর্তৃক হরিনাম দীক্ষিত ভক্তের তথ্য
                    </div>

                    <div class="person">
                    ' . $row['finalname_b'] . '
                    </div>

                    <div style="font-size:16px;color:#666;">
                        <p style="margin:5px 0;">' . $row['finalname'] . '</p>
                        <p>' . $row['iserial'] . '. ' . $row['bname'] . ' </p>
                        <p>তারিখ:<span class="bn-date"></span> (' . enToBnDate($row['idate']) . ') </p>
                        <p> স্থান: ' . $place . '</p>
                    </div>
                </div>
            </section>';
            }
        } else {
            echo '<section class="sheet padding-10mm">
                <div class="container">
                    <h1>No Result</h1>
                </div>
            </section>';
        }
        ?>

        <script src="/JPS/certificate_printing/bndate.js"></script>
        <script>
            window.onload = (() => document
                .querySelectorAll('.bn-date')
                .forEach(page => page.innerHTML = oneDay(new Date("<?php echo date('m/d/Y', strtotime($date)); ?>"))))
        </script>
    <?php } ?>
</body>

</html>
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

        .left-guideline {
            overflow: visible;
            height: 10000px;
            top: -5000px;
            left: 0;
            width: 1px;
            background-color: black;
            position: absolute;
        }

        .certificate .details {
            padding-top: 34%;
            /* padding-left: 5%; */
            margin: 0 auto;
        }

        @media print {
            @page {
                size: landscape
            }

            .guide-container {
                display: none;
            }
        }

        hr {
            border: 1px dashed rgb(65, 65, 65);
        }

        .guide-container {
            max-width: 100vw;
            height: 100vh;
            position: absolute;
        }

        .guide {
            background-color: rgba(0, 255, 0, 0.5);
            position: fixed;
        }

        .gv {
            width: 1px;
            height: 100%;
        }

        .gh {
            height: 1px;
            width: 100%;
        }

        .l-50 {
            left: 50%;
        }

        .l-30 {
            left: 30%;
        }

        .r-30 {
            right: 30%;
        }

        .t-75 {
            top: 75%;
        }

        .t-50 {
            top: 50%;
        }

        .t-88 {
            top: 88%;
        }
    </style>
</head>

<body>
    <div class="guide-container">
        <div class="guide gv l-30"></div>
        <div class="guide gv l-50" title="center"></div>
        <div class="guide gv r-30"></div>
        <div class="guide gh t-50" title="center"></div>
        <div class="guide gh t-75"></div>
        <div class="guide gh t-88"></div>
    </div>
    <div class="drag-vertical">
        <?php
        function create_details($bangla_name, $english_name, $sl, $name, $date, $place)
        {
            return  '<div class="certificate">
                        <div class="details text-center">
                            <div class="dragit">
                                <h1 class="boder-bottom">' . $bangla_name . '</h1>
                                <hr width="40%">
                                <h4 class="">' . $english_name . '</h4>
                                <h5 class="pt-2">' . $sl . $name . ' | <span>দীক্ষা তারিখ: ' . $date . ' ইং</span></h5>
                                <p class="pt-2"><b>স্থান: </b>' . $place . '</p>
                            </div>
                        </div>
                     </div>';
        };

        if (file_exists($_FILES['excel']['tmp_name']) || is_uploaded_file($_FILES['excel']['tmp_name'])) {
            include_once './SimpleXLSX.php';

            if ($xlsx = SimpleXLSX::parse($_FILES['excel']['tmp_name'])) {
                $header_values = $rows = [];
                foreach ($xlsx->rows() as $k => $r) {
                    if ($k === 0) {
                        $header_values = $r;
                        continue;
                    }
                    $rows[] = array_combine($header_values, $r);
                }

                foreach ($rows as $value) {
                    echo create_details($value['final_bn_name'], $value['finalname'], $value['SN'],  $value['ename'], $date, $place);
                }
            } else {
                echo SimpleXLSX::parseError();
            }
        } else {
            echo create_details($bangla_name, $english_name, $sl, $name, $date, $place);
        }

        ?>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script> -->
    <script>
        var draggable = $('.dragit'); //element
        var draggableV = $('.drag-vertical'); //element

        draggable.on('mousedown', function(e) {
            var dr = $(this).addClass("drag").css("cursor", "move");
            height = dr.outerHeight();
            width = dr.outerWidth();
            ypos = dr.offset().top + height - e.pageY,
                xpos = dr.offset().left + width - e.pageX;
            $(document.body).on('mousemove', function(e) {
                var itop = e.pageY + ypos - height;
                var ileft = e.pageX + xpos - width;
                if (dr.hasClass("drag")) {
                    dr.offset({
                        top: itop,
                        left: ileft
                    });
                }
            }).on('mouseup', function(e) {
                dr.removeClass("drag");
            });
        });

        draggableV.on('mousedown', function(e) {
            var dr = $(this).addClass("dragV").css("cursor", "move");
            width = dr.outerWidth();
            xpos = dr.offset().left + width - e.pageX;
            $(document.body).on('mousemove', function(e) {
                var ileft = e.pageX + xpos - width;
                if (dr.hasClass("dragV")) {
                    dr.offset({
                        top: 0,
                        left: ileft
                    });
                }
            }).on('mouseup', function(e) {
                dr.removeClass("dragV");
            });
        });
    </script>
</body>

</html>
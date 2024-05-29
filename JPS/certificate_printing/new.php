<?php
function enToBnDate($date = null)
{
    $num = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $bn_num = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $month_bangla = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];
    return str_replace($month, $month_bangla, str_replace($num, $bn_num, $date ?? date("d F, Y")));
}
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


    <style type='text/css'>
        @page {
            size: A4 landscape
        }

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
            font-size: 28px;
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

<body class="A4 landscape">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <p>জয় শ্রীকৃষ্ণচৈতন্য প্রভু নিত্যানন্দ । শ্রীঅদ্বৈত গদাধর শ্রীবাসাদি গৌর ভক্তবৃন্দ ।।</p>
        <p>হরে কৃষ্ণ হরে কৃষ্ণ
            কৃষ্ণ কৃষ্ণ হরে হরে ।
            হরে রাম হরে রাম
            রাম রাম হরে হরে ।।</p>
    </section>

    <?php

    for ($i = 0; $i < 5; $i++) {
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
            <div style="margin-bottom:7%;">
                <div class="logo">
                    আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ (ইসকন)
                </div>

                <p style="font-size:17px;color:#555;">প্রতিষ্ঠাতা আচার্য: কৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরণারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদ</p>
            </div>
            <div class="assignment" style="color:#666;">
                ওঁ বিষ্ণুপাদ পরমহংস পরিব্রাজকাচার্য অষ্টোত্তরশত
            </div>

            <div class="marquee">
                শ্রীশ্রীমৎ জয়পতাকা স্বামী গুরুমহারাজ
            </div>


            <div class="assignment" style="color:#666;">
                কর্তৃক হরিনাম দীক্ষিত ভক্তের তথ্য
            </div>

            <div class="person">
                হরেকৃষ্ণ মহামন্ত্র দাস
            </div>

            <div style="font-size:16px;color:#666;">
                <p style="margin:5px 0;">Hare Krishna Mahamantra Das</p>
                <p><span>12.</span> Hare Krishna Taulkdar</p>
                <p>তারিখ:<span class="bn-date"></span> (' . enToBnDate() . ') </p>
                <p> স্থান: শ্রীশ্রী পুণ্ডরীক ধাম, চট্টগ্রাম</p>
            </div>
        </div>
    </section>';
    } ?>



    <script src="bndate.js"></script>
    <script>
        window.onload = (() => document.querySelectorAll('.bn-date').forEach(page => page.innerHTML = oneDay()))
    </script>
</body>

</html>
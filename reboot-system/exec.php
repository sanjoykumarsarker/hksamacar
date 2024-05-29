<?php

require_once './_helper.php';
Helper::checkLoginStatus();
$login_error = null;
$reboot_status = null;

if (isset($_POST['password'])) {
    $login_error = Helper::login($_POST['password']);
}


$reboot_failed = true;
if (isset($_POST['reboot'])) {
    $reboot_status = Helper::reboot();

    if (!str_contains($reboot_status, 'Sorry')) {
        $reboot_failed = false;
    }

    Helper::logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf" content="<?php echo Helper::csrf() ?>">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <style>
        .container {
            max-width: 1140px;
        }
    </style>
</head>

<body>

    <div style="text-align:center;margin:auto; height:360px; width:360px;display:grid;justify-content: center;align-content: center;">
        <h4 style="color:lightcoral"><?php echo $login_error; ?></h4>
        <?php if (isset($_SESSION['login'])) { ?>
            <h3 style="color: #3BCFBB; text-transform:capitalize;">Last <?php echo shell_exec('who -b'); ?></h3>
            <form action="" method="post">
                <input type="hidden" name="reboot">
                <input type="submit" value="Reboot">
                <input type="hidden" name="id" value="">
                <?php echo Helper::csrf(true) ?>
            </form>
        <?php } elseif (!$reboot_failed) { ?>
            <h3 style="color: #FF5A5A;"><?php echo $reboot_status; ?></h3>
            <h4 style="color: #3BCFBB; text-transform:capitalize;">Last <?php echo shell_exec('who -b'); ?></h4>
            <h4 style="color:honeydew;">Please Wait <span id="time">03:00</span> minutes! You will be automatically redirected to login page.</h4>
            <a href="//harekrishnasamacar.com/hks_admin_login.php">
                <button>Go to Login</button>
            </a>
        <?php } else { ?>
            <form action="" method="post">
                <label for="" style="color:lightblue">hints: email</label>
                <input type="password" name="password" required placeholder="Password">
                <input type="hidden" name="id" value="">
                <?php echo Helper::csrf(true) ?>
                <input type="submit" value="Submit">
            </form>
        <?php } ?>
    </div>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        <?php if (!$reboot_failed) { ?>

            function startTimer(duration, display) {
                var timer = duration,
                    minutes, seconds;
                setInterval(function() {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 1000);
            }

            window.onload = function() {
                var minutes = 60 * 3,
                    display = document.querySelector('#time');
                startTimer(minutes, display);
                setTimeout(() => {
                    window.location = `${window.location.origin}/hks_admin_login.php`;
                }, minutes * 1000);
            };
        <?php }  ?>
    </script>
</body>

</html>
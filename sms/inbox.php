<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<?php
include_once './ENV.php';

use Env;

(new Env(__DIR__ . '/.env'))->load(); ?>
<img src="https://oauth.iasortho.com/images/spinner.gif" width="50%" style="margin:auto; text-align:center">
<form action="https://sms.greenweb.com.bd/index.php" method="post" id="form">
    <input type="hidden" name="mobile" value="<?php echo getenv('SMS_MOBILE'); ?>">
    <input type="hidden" name="password" value="<?php echo getenv('SMS_PASSWORD'); ?>">
    <button id="login" name="submit" type="submit"></button>
</form>
<!-- <iframe id="order_frame" width="100%" height="100%" src="https://sms.greenweb.com.bd/ordernow.php" frameborder="0"></iframe> -->
<script>
    window.onload = () => {
        // document.querySelector('#form').submit();
        document.getElementById("form").submit();
        // document.querySelector('#login').click();
    }
</script>
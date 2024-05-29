<html>

<body>
<?php
$to = "smd.jps@yahoo.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: smd.jps@gmail.com" . "\r\n" .
"CC: skd_jps@yahoo.com";

mail($to,$subject,$txt,$headers);
 
echo "yes";
//include "incld_fl.php";
?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cash Receive</title>
</head>
<body>

<?php
include_once "session_check.php";
if (!isset($_SESSION)) session_start();

$user = $_SESSION["id"];
$VPNo = $_POST["vp_no"];
$Dr = $_POST["vp_receive"];
$VPDate = $_POST["vp_date"];
$transaction_id = intval($_POST["transaction_id"]);
$idn = $_POST["idn"];
$flag = 1;

if (intval($Dr) < 1) {
  echo "<h2 style='background-color:red'> No Amount for TX: $transaction_id ! </h2>";
  $flag = 2;
}

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
if ($flag == 1) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $conn->query('SET NAMES "utf8"');
    $stmt = $conn->prepare("update tblIssue set VPNo=:VPNo,Dr=:Dr,user=:user,Rdate=:Rdate where transaction_id=:transaction_id");
    $stmt->bindParam(':VPNo', $VPNo);
    $stmt->bindParam(':Dr', $Dr);
    $stmt->bindParam(':Rdate', $VPDate);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':transaction_id', $transaction_id);
    $stmt->execute();
    echo "<h2 style='background-color:green'>Congratulation ! TX: $transaction_id, VP No: $VPNo, Amount: $Dr, Dated:  $VPDate  has been Successfully Added</h2>";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;

  $conn_trans = null;
}
?>
<input type="button" value="RELOAD" onclick="window.top.location.reload();" autofocus />

</body>
</html>
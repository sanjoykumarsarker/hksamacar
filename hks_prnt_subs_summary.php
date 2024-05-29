<?php
session_start();
$print_issue = $_SESSION["print_issue"];
?>
<!DOCTYPE html>
<html>

<head>

  <title>Subscriber Summary</title>


  <meta charset="utf-8">

  <link rel="shortcut icon" href="favicon1.ico" />
  <!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->


</head>

<style>
  .page {
    width: 8.27in;
    min-height: 11.69in;
    padding: 10px 10px 20px 10px;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }


  table,
  th,
  tr,
  td {
    border: 0.5px solid black;
    border-collapse: collapse;
  }

  tr,
  th,
  td {
    padding: 0px 0px 0px 0px;
    text-align: Center;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
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

<body>

  <div class="page">
    <div style="text-align:center;">
      <h5> মাসিক হরেকৃষ্ণ সমাচার - SBS <?php echo $print_issue; ?></h5>
    </div>


    <table style="width:100%">
      <tr>
        <th>SL</th>
        <th>VPNo.</th>
        <th>AGN</th>
        <th>নাম</th>
        <th>জেলা</th>
        <th>মোবাইল</th>
        <th>Balance</th>
      </tr>


      <?php

      include "function.php";

      $conn_all = make_connection();
      $sql_all = "SELECT transid,vername,agcpy,SentDate,transaction_id,VPNo FROM tblIssue  where (vername=" . $print_issue . ") AND (transid>10000) order by cast(VPNo as unsigned) asc";
      $result_all = $conn_all->query($sql_all);
      $p = 1;
      if ($result_all->num_rows > 0) {
        // output data of each row
        while ($row = $result_all->fetch_assoc()) {
          echo '<tr><td>' . $p . '</td><td>' . $row["VPNo"] . '</td><td>' . $row["transid"] . '</td><td>' . id_name($row["transid"]) . '</td><td>' . dist_en_bn(id_dist($row["transid"])) . '</td><td>' . id_phone($row["transid"]) . '</td><td>' . id_balance($row["transid"]) . '</td></tr>';

          $p++;
        }
      }

      $conn_all->close();


      ?>





    </table>
  </div> <!-- end of container -->

</body>

</html>
<?php

session_start();
include '../function.php';

include '../user_update.php';
// $_SESSION['cd']

if (isset($_SESSION['idn']) && isset($_SESSION['pw'])) {
    $u_name = $_SESSION['idn'];

    $id_val = getId($_SESSION['idn'], $_SESSION['pw']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
      <?php
$connection = get_connection();
$temple_id = $_POST['temple_id'];

$sqlin = "SELECT tregid, tname, t_addr, t_ps, t_dist, tname_b FROM tmpl WHERE tregid='$temple_id'";
$resultrin = $connection->query($sqlin);

$row = $resultrin->fetch_assoc();
echo "<h4 style=' text-align:center; color:purple; font-size:20px; '>
  " . $row["tname_b"] . " " . $row["tname"] . ",&nbsp" . $row["t_addr"] . ",&nbsp" . $row["t_dist"] . ".</h4>";?> </a>

  <div class="collapse navbar-collapse" style="float: right; width: 300px; padding: 10px 0px 0px 0px;" id="navbarNav">
      <a href="#"> <i class="fa fa-user-circle-o" style="font-size:36px;color:blue;"></i> <?php echo "" . $_SESSION['user_name'] . ""; ?>  </a>
  </div>
</nav>

    <?php
$sql = "SELECT reg, bname, ename, age, address, phone, service, gender, education, mstatus,
         nprefer ,istatus1, isinitiated,comments,status_viva,result_viva,comments_viva
         FROM reg WHERE templereg=$temple_id ";

$resultr = $connection->query($sql);

if ($resultr->num_rows > 0) {
    echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
	<tr>
	<th>Reg</th>	<th> নাম</th>		<th>Name</th>	<th>Age</th>	<th>Address</th>
	<th>Phone</th>  <th>Comments</th><th>Viva Status</th><th>Result</th><th>Viva Comments</th>
	</tr>";

    // output data of each row
    while ($row = $resultr->fetch_assoc()) {
        echo "<tr>
		<td>
		<form target='_blank' action='https://harekrishnasamacar.com/JPS/devedit_viva.php' method='POST'>
		<button name='edit' class= 'tbutton' type='submit' value=" . $row["reg"] . " > " . $row["reg"] . "</button>
		</form></td>
		<td>" . $row["bname"] . "</td>		<td>" . $row["ename"] . "</td>
		<td style='text-align:center' >" . $row["age"] . "</td> 	<td>".$row["address"]."</td> 	<td style='text-align:center' > ".$row["phone"]."</td> 
		<td style='text-align:center' >".$row["comments"]."</td> 

        <td style='text-align:center' >".$row["status_viva"]."</td> 
        <td style='text-align:center' >".$row["result_viva"]."</td> 
        <td style='text-align:center' >".$row["comments_viva"]."</td> 
		 

		</tr>";
    }
    echo "</table>";
} else {
}
$connection->close();

?>
</body>
</html>
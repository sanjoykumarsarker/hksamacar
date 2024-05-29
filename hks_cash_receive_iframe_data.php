<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">

	<link rel="shortcut icon" href="favicon1.ico" />
	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



	<style type="text/css">
		body,
		html,
		.container-fluid {
			height: 100%;
			background-color: cornsilk;

		}

		table,
		tr,
		th,
		td {
			border: 0.5px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 2px;
			text-align: left;
		}

		/* ---Start of Wrapper style ---- */

		#wrapper {
			background-color: #787878;
		}

		.card-header {
			background-color: #3c3c3c;
			max-height: 40px;
			padding: 5px;
		}

		.card-link {
			color: white;
		}

		.card-link:Hover {
			color: yellow;
		}

		.card-body {
			padding: 5px;
			background-color: #f0f0f0;

		}

		.card-body a {
			color: black;
		}




		/* ---end of Wrapper style ---- */




		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		.switch input {
			opacity: 0;
			width: 0;
			height: 0;
		}

		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked+.slider {
			background-color: #2196F3;
		}

		input:focus+.slider {
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked+.slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
			border-radius: 34px;
		}

		.slider.round:before {
			border-radius: 50%;
		}
	</style>

</head>

<body>






	<?php
	include "function.php";

	$cash_issue = intval($_POST['cash_issue']);

	if (is_numeric($_POST['cash_issue']) && $cash_issue > 0) {


		//echo "Yes";

	} else {

		echo "Enter Valid Issue:";
		exit();
	}

	$type = $_POST['type'];


	$servername = "localhost";
	$username = "HKSamacar_local";
	$password = "Jpsk/1866";
	$dbname = "HareKrishnaSamacar";

	// Create connection

	if ($type == "Edit") {
		echo "
			<table>
			  <thead>
				<tr>
 					<th>Ag No.</th>
					<th>Name</th>
					<th style='width: 2in;'>Mobile</th>
					<th>QTY</th>
					<th>Date</th>
					<th>Courier</th>
					<th>VP No.</th>
					<th>Amount</th>
					<th>Return</th>
					<th>Comment</th>
					<th>Action</th>
				</tr>
			  </thead>
		      <tbody>


"; {

			$conn_all = make_connection();
			$sql_all = "SELECT idn,cust_name,transid,Dr,VPNo,Returned,vername,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation,sent_mode FROM tblIssue  where ( transid<10000 AND vername=" . $cash_issue . ")";
			$result_all = $conn_all->query($sql_all);

			if ($result_all->num_rows > 0) {
				// output data of each row
				while ($row = $result_all->fetch_assoc()) {
					$nice_date = date('m/d/Y', strtotime($row['Rdate']));

					echo '<tr>
<form method ="post" target="iframe_cash_receive" action="hks_cash_receive_data.php">



<td>' . $row["transid"] . '</td>

<td>' . id_name(intval($row["transid"])) . '</td>

<td style="width: 2in;">' . id_phone(intval($row["transid"])) . '</td>


<td>' . $row["agcpy"] . '</td>

<td><input type="date" name="vp_date" style="background-color: transparent; width:135px; text-align:center;" value="' . $row['Rdate'] . '"></td>
<td><input type="text" name="sent_mode" style="background-color: transparent; width:100px; text-align:center;" value="'. $row["sent_mode"] .'"/></td>
<td><input type="text" name="vp_no" style="background-color: transparent; width:100px; text-align:center;" value="' . $row["VPNo"] . '"></td>

<td><input type="text" name="vp_receive" style="background-color: transparent; width:100px; text-align:center;" value="' . $row["Dr"] . '"></td>
<td>

<label class="switch">

  <input type="checkbox" name="vp_return" value="TRUE"  >
  <span class="slider round"></span>

</label>
<span style=" color:orange">' . $row["Returned"] . '</span>
</td>
<td><input type="input" name="vp_comment" style="background-color: transparent; width:100px; text-align:center;" value="' . $row["Comment"] . '"></td>

 <td>
 <input type="hidden" name="transid" value="' . $row["transid"] . '">

<input type="hidden" name="idn" value="' . $row["idn"] . '">
<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
<input type="hidden" name="ag_name" value="' . $row["Name"] . '">
<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
<input type="hidden" name="status" value="' . $row["status"] . '">
<input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">

<button  type="submit" >OK</button>
</form>


</td>


</tr>
';
				}
			} else {
				echo "0 results";
			}
			$conn_all->close();
		}
		echo "</tbody>
</table>";
	}



















	// Create connection

	if ($type == "Paid") {
		echo "
	<table >
				  <thead>
					<tr>
						 <th>Ag No.</th>
						<th>Name</th>
						<th>District</th>
						<th style='width: 2in;'>Mobile</th>
						<th>QTY</th>
						<th>Date</th>
						<th>VP No.</th>
						<th>Amount</th>

					</tr>
				  </thead>
				  <tbody>


	"; {

			// Create connection
			$conn_all = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn_all->connect_error) {
				die("Connection failed: " . $conn_all->connect_error);
			}
			mysqli_set_charset($conn_all, "utf8");
			$sql_all = "SELECT idn,cust_name,transid,Dr,Returned,VPNo,Rdate,vername,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue  where ( cast(Dr as unsigned)>0.001 AND transid<10000 AND vername=" . $cash_issue . ")";
			$result_all = $conn_all->query($sql_all);

			if ($result_all->num_rows > 0) {
				// output data of each row
				while ($row = $result_all->fetch_assoc()) {




					echo '<tr>
	<form method ="post"  action="hks_cash_receive_data.php">



	<td>' . $row["transid"] . '</td>

	<td>' . id_name(intval($row["transid"])) . '</td>

	<td>' . $row["address"] . '</td>
	<td style="width: 2in;">' . id_phone(intval($row["transid"])) . '</td>


	<td>' . $row["agcpy"] . '</td>


	 <td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["Rdate"] . '</p></td>

	<td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["VPNo"] . '</p></td>

	<td><p   style="background-color: transparent; width:100px; text-align:center;"  >' . intval($row["Dr"]) . '</p></td>



	<input type="hidden" name="idn" value="' . $row["idn"] . '">
	<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
	<input type="hidden" name="ag_name" value="' . $row["Name"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="status" value="' . $row["status"] . '">
	<input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">

 	</form>





	</tr>
	';
				}
			} else {
				echo "0 results";
			}
			$conn_all->close();
		}
		echo "</tbody>
	</table>";
	}








	// Create connection

	if ($type == "Return") {
		echo "
	<table >
				  <thead>
					<tr>
						 <th>Ag No.</th>
						<th>Name</th>
						<th>District</th>
						<th style='width: 2in;'>Mobile</th>
						<th>QTY</th>
						<th>Date</th>
						<th>VP No.</th>
						<th>Amount</th>

					</tr>
				  </thead>
				  <tbody>


	"; {

			// Create connection
			$conn_all = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn_all->connect_error) {
				die("Connection failed: " . $conn_all->connect_error);
			}
			mysqli_set_charset($conn_all, "utf8");
			$sql_all = "SELECT idn,cust_name,transid,Dr,VPNo,Rdate,vername,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue  where ( Returned='TRUE' AND transid<10000 AND vername=" . $cash_issue . ")";
			$result_all = $conn_all->query($sql_all);

			if ($result_all->num_rows > 0) {
				// output data of each row
				while ($row = $result_all->fetch_assoc()) {




					echo '<tr>
	<form method ="post"  action="hks_cash_receive_data.php">



	<td>' . $row["transid"] . '</td>

	<td>' . id_name(intval($row["transid"])) . '</td>

	<td>' . $row["address"] . '</td>
	<td style="width: 2in;">' . id_phone(intval($row["transid"])) . '</td>


	<td>' . $row["agcpy"] . '</td>


	 <td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["Rdate"] . '</p></td>

	<td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["VPNo"] . '</p></td>

	<td><p   style="background-color: transparent; width:100px; text-align:center;"  >' . intval($row["Dr"]) . '</p></td>



	<input type="hidden" name="idn" value="' . $row["idn"] . '">
	<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
	<input type="hidden" name="ag_name" value="' . $row["Name"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="status" value="' . $row["status"] . '">
	<input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">

 	</form>





	</tr>
	';
				}
			} else {
				echo "0 results";
			}
			$conn_all->close();
		}
		echo "</tbody>
	</table>";
	}










	// Create connection

	if ($type == "All") {
		echo "
	<table >
				  <thead>
					<tr>
						 <th>Ag No.</th>
						<th>Name</th>
						<th>District</th>
						<th style='width: 2in;'>Mobile</th>
						<th>QTY</th>
						<th>Date</th>
						<th>VP No.</th>
						<th>Amount</th>

					</tr>
				  </thead>
				  <tbody>


	"; {

			// Create connection
			$conn_all = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn_all->connect_error) {
				die("Connection failed: " . $conn_all->connect_error);
			}
			mysqli_set_charset($conn_all, "utf8");
			$sql_all = "SELECT idn,cust_name,transid,Dr,VPNo,Rdate,vername,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue  where (  transid<10000 AND vername=" . $cash_issue . ")";
			$result_all = $conn_all->query($sql_all);

			if ($result_all->num_rows > 0) {
				// output data of each row
				while ($row = $result_all->fetch_assoc()) {




					echo '<tr>
	<form method ="post"  action="hks_cash_receive_data.php">



	<td>' . $row["transid"] . '</td>

	<td>' . id_name(intval($row["transid"])) . '</td>

	<td>' . $row["address"] . '</td>
	<td style="width: 2in;">' . id_phone(intval($row["transid"])) . '</td>


	<td>' . $row["agcpy"] . '</td>


	 <td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["Rdate"] . '</p></td>

	<td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["VPNo"] . '</p></td>

	<td><p   style="background-color: transparent; width:100px; text-align:center;"  >' . intval($row["Dr"]) . '</p></td>



	<input type="hidden" name="idn" value="' . $row["idn"] . '">
	<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
	<input type="hidden" name="ag_name" value="' . $row["Name"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="status" value="' . $row["status"] . '">
	<input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">

 	</form>





	</tr>
	';
				}
			} else {
				echo "0 results";
			}
			$conn_all->close();
		}
		echo "</tbody>
	</table>";
	}

















	if ($type == "Summary") {


























		$servername = "localhost";
		$username = "HKSamacar_local";
		$password = "Jpsk/1866";
		$dbname = "HareKrishnaSamacar";

		// Create connection
		date_default_timezone_set("Asia/Dhaka");
		$tran_date = strval(date("Y-m-d"));

		include_once "function.php";
		// Create connection
		$conn_id = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn_id->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		mysqli_set_charset($conn_id, "utf8");
		$sql_id = "SELECT count(Rdate)as ret FROM tblIssue where     Returned='TRUE' and vername=" . $cash_issue . " ";
		$result_id = $conn_id->query($sql_id);

		if ($result_id->num_rows > 0) {
			// output data of each row
			$row = $result_id->fetch_assoc();
			$GLOBALS['ret'] = $row["ret"];
		} else {
			echo "0 results";
		}
		$conn_id->close();














		$conn_id_am = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn_id_am->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		mysqli_set_charset($conn_id_am, "utf8");


		$sql_id_c = "SELECT
		 SUM(1) AS sent,
		SUM(CASE WHEN Dr >0 THEN 1 ELSE 0 END) AS received,
		SUM(CASE WHEN Returned ='TRUE' THEN 1 ELSE 0 END) AS returned,
		SUM(CASE WHEN Returned <>'TRUE' and Dr<1 THEN 1 ELSE 0 END) AS due

		 FROM tblIssue where     transid<100   and  vername=" . $cash_issue . "  ";




		$sql_id_vp = "SELECT
		 SUM(1) AS sent,
		SUM(CASE WHEN Dr >0 THEN 1 ELSE 0 END) AS received,
		SUM(CASE WHEN Returned ='TRUE' THEN 1 ELSE 0 END) AS returned,
		SUM(CASE WHEN Returned <>'TRUE' and Dr<1 THEN 1 ELSE 0 END) AS due

		 FROM tblIssue where   sent_mode='vp'  and  vername=" . $cash_issue . "  ";



		$sql_id_vpp = "SELECT
	 SUM(1) AS sent,
	SUM(CASE WHEN Dr >0 THEN 1 ELSE 0 END) AS received,
	SUM(CASE WHEN Returned ='TRUE' THEN 1 ELSE 0 END) AS returned,
	SUM(CASE WHEN Returned <>'TRUE' and Dr<1 THEN 1 ELSE 0 END) AS due

	 FROM tblIssue where   sent_mode='vpp'  and  vername=" . $cash_issue . "  ";


		$sql_id_rp = "SELECT
 SUM(1) AS sent,
SUM(CASE WHEN Dr >0 THEN 1 ELSE 0 END) AS received,
SUM(CASE WHEN Returned ='TRUE' THEN 1 ELSE 0 END) AS returned,
SUM(CASE WHEN Returned <>'TRUE' and Dr<1 THEN 1 ELSE 0 END) AS due

 FROM tblIssue where   sent_mode='rp'  and  vername=" . $cash_issue . "  ";


		$sql_cash = "SELECT

SUM(CASE WHEN Dr >0 THEN Dr ELSE 0 END) AS Dr,
SUM(CASE WHEN Dr >0 THEN 1 ELSE 0 END) AS Received,

SUM(CASE WHEN Returned ='TRUE' THEN 1 ELSE 0 END) AS Returned,Rdate

FROM tblIssue where    vername=" . $cash_issue . " group by Rdate ";






		$result_id_c = $conn_id_am->query($sql_id_c);
		$result_id_vp = $conn_id_am->query($sql_id_vp);
		$result_id_vpp = $conn_id_am->query($sql_id_vpp);
		$result_id_rp = $conn_id_am->query($sql_id_rp);

		$result_cash = $conn_id_am->query($sql_cash);

		if ($result_id_c->num_rows > 0) {
			// output data of each row
			$row = $result_id_c->fetch_assoc();
			$GLOBALS['c_sent'] = $row["sent"];
			$GLOBALS['c_received'] = $row["received"];
			$GLOBALS['c_returned'] = $row["returned"];
			$GLOBALS['c_due'] = $row["due"];
		}

		if ($result_id_vp->num_rows > 0) {
			// output data of each row
			$row = $result_id_vp->fetch_assoc();
			$GLOBALS['vp_sent'] = $row["sent"];
			$GLOBALS['vp_received'] = $row["received"];
			$GLOBALS['vp_returned'] = $row["returned"];
			$GLOBALS['vp_due'] = $row["due"];
		}
		if ($result_id_vpp->num_rows > 0) {
			// output data of each row
			$row = $result_id_vpp->fetch_assoc();
			$GLOBALS['vpp_sent'] = $row["sent"];
			$GLOBALS['vpp_received'] = $row["received"];
			$GLOBALS['vpp_returned'] = $row["returned"];
			$GLOBALS['vpp_due'] = $row["due"];
		}
		if ($result_id_rp->num_rows > 0) {
			// output data of each row
			$row = $result_id_rp->fetch_assoc();
			$GLOBALS['rp_sent'] = $row["sent"];
			$GLOBALS['rp_received'] = $row["received"];
			$GLOBALS['rp_returned'] = $row["returned"];
			$GLOBALS['rp_due'] = $row["due"];
		}








		$c_sent = $GLOBALS['c_sent'];
		$c_received = $GLOBALS['c_received'];
		$c_returned = $GLOBALS['c_returned'];

		$c_due = $GLOBALS['c_due'];




		$vp_sent = $GLOBALS['vp_sent'];
		$vp_received = $GLOBALS['vp_received'];
		$vp_returned = $GLOBALS['vp_returned'];

		$vp_due = $GLOBALS['vp_due'];







		$vpp_sent = $GLOBALS['vpp_sent'];
		$vpp_received = $GLOBALS['vpp_received'];
		$vpp_returned = $GLOBALS['vpp_returned'];

		$vpp_due = $GLOBALS['vpp_due'];





		$rp_sent = $GLOBALS['rp_sent'];
		$rp_received = $GLOBALS['rp_received'];
		$rp_returned = $GLOBALS['rp_returned'];

		$rp_due = $GLOBALS['rp_due'];




		echo '
		<div class="container">
		<h2 style="text-align:center"><u>Summary Report-' . $cash_issue . '</u></h2>
 		<table class="table">
		  <thead>
			<tr>
			<th>Mode</th>
			  <th>Sent</th>
			  <th>Received</th>
			  <th>Returned</th>

			  <th>Due</th>
			  </tr>
		  </thead>
		  <tbody>
			<tr>
			<td>Courier</td>
			  <td>' . $c_sent . '</td>
			  <td>' . $c_received . '</td>
			  <td>' . $c_returned . '</td>
			  <td>' . $c_due . '</td>
			</tr>
			<tr>
			<td>VP</td>
			<td>' . $vp_sent . '</td>
			<td>' . $vp_received . '</td>
			<td>' . $vp_returned . '</td>
			<td>' . $vp_due . '</td>
			</tr>
			<tr>
			<td>VPP</td>
			<td>' . $vpp_sent . '</td>
			<td>' . $vpp_received . '</td>
			<td>' . $vpp_returned . '</td>
			<td>' . $vpp_due . '</td>
			</tr>
			<tr>

			<td>RP</td>
			<td>' . $rp_sent . '</td>
			<td>' . $rp_received . '</td>
			<td>' . $rp_returned . '</td>
			<td>' . $rp_due . '</td>
			</tr>

			<tr style="background-color:yellow">
			<td>TOTAL</td>
			<td>' . intval($c_sent + $vp_sent + $vpp_sent + $rp_sent) . '</td>
			<td>' . intval($c_received + $vp_received + $vpp_received + $rp_received) . '</td>
			<td>' . intval($c_returned + $vp_returned + $vpp_returned + $rp_returned) . '</td>
			<td>' . intval($c_due + $vp_due + $vpp_due + $rp_due) . '</td>
			</tr>
		  </tbody>
		</table>
	  </div>
	  ';



		if ($result_cash->num_rows > 0) {
			// output data of each row


			echo '
<div class="container">
<h2 style="text-align:center"><u>Cash Received-' . $cash_issue . '</u></h2>
 <table class="table">
  <thead>
	<tr>
	<th>Date</th>
	  <th>Amount</th>
	  <th>Received</th>
	  <th>Returned</th>


	  </tr>
  </thead>
  <tbody>';


			$amount = 0;
			$returned = 0;
			$receiced = 0;
			while ($row = $result_cash->fetch_assoc()) {




				$amount = $amount + $row["Dr"];
				$received = $received + $row["Received"];
				$returned = $returned + $row["Returned"];



				echo '

	<tr>
	<td>' . $row["Rdate"] . '</td>
	  <td>' . $row["Dr"] . '</td>
	  <td>' . $row["Received"] . '</td>
	  <td>' . $row["Returned"] . '</td>

	</tr>

	';
			}


			echo '

	<tr style="background-color:yellow">
	<td>TOTAL</td>
	  <td>' . $amount . '</td>
	  <td>' . $received . '</td>
	  <td>' . $returned . '</td>

	</tr>

	';

			echo '</table>

</div>

';
		}
		$conn_id_am->close();
	}



	// Create connection

	if ($type == "Due") {
		echo "
	<table >
				  <thead>
					<tr>
						 <th>Ag No.</th>
						<th>Name</th>
						<th>District</th>
						<th style='width: 2in;'>Mobile</th>
						<th>QTY</th>
						<th>Date</th>
						<th>VP No.</th>
						<th>Amount</th>

					</tr>
				  </thead>
				  <tbody>


	"; {

			// Create connection
			$conn_all = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn_all->connect_error) {
				die("Connection failed: " . $conn_all->connect_error);
			}
			mysqli_set_charset($conn_all, "utf8");
			$sql_all = "SELECT idn,cust_name,transid,Dr,VPNo,Rdate,vername,cust_id,phone,total_donation,paid,due,transaction_id,Returned,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue  where   (cast(Dr as unsigned)<1 AND Returned!='TRUE' AND  transid<10000 AND vername=" . $cash_issue . ")";
			$result_all = $conn_all->query($sql_all);

			if ($result_all->num_rows > 0) {
				// output data of each row
				while ($row = $result_all->fetch_assoc()) {




					echo '<tr>
	<form method ="post"  action="hks_cash_receive_data.php">



	<td>' . $row["transid"] . '</td>

	<td>' . id_name(intval($row["transid"])) . '</td>

	<td>' . $row["address"] . '</td>
	<td style="width: 2in;">' . id_phone(intval($row["transid"])) . '</td>


	<td>' . $row["agcpy"] . '</td>


	 <td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["Rdate"] . '</p></td>

	<td><p style="background-color: transparent; width:100px; text-align:center;"  >' . $row["VPNo"] . '</p></td>

	<td><p   style="background-color: transparent; width:100px; text-align:center;"  >' . intval($row["Dr"]) . '</p></td>



	<input type="hidden" name="idn" value="' . $row["idn"] . '">
	<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
	<input type="hidden" name="ag_name" value="' . $row["Name"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
	<input type="hidden" name="status" value="' . $row["status"] . '">
	<input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">

 	</form>





	</tr>
	';
				}
			} else {
				echo "0 results";
			}
			$conn_all->close();
		}
		echo "</tbody>
	</table>";
	}




	?>

	<iframe name='iframe_cash_receive' height="0" width="0" scrolling="no" style="border:0"></iframe>


</body>

</html>

<!-- SELECT transid, VPNo, transaction_id,agcpy, SentDate, sent_mode FROM tblIssue WHERE (transid<10000 AND vername=1303) -->
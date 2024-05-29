<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE html>
<html>

<head>

	<title>Subscriber Book</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="shortcut icon" href="favicon1.ico" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
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

		}


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
	</style>

</head>

<body>
	<!-- The Modal -->
	<div class="modal" id="myModal1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<iframe name='ag_book_action_mod' height="130%" width="100%" scrolling="YES" style="border:0"></iframe>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div>
		<?php
		include_once "function.php";
		$ag_barcode = intval($_POST['ag_barcode']);

		if (isset($_POST['auto_mode']) && $_POST['auto_mode'] === 'on') {
			$_SESSION['auto_mode'] = true;
		} else {
			unset($_SESSION['auto_mode']);
		}

		// $auto_mode = isset($_SESSION['auto_mode']);

		if ($ag_barcode < 1) {
			echo "<h2 style='background-color:red'>Please Enter Valid Value!</h2>";
			exit();
		} else {
			$conn_all = make_connection();
			$sql_all = "SELECT idn,cust_name,transid,Dr,Returned,VPNo,vername,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue WHERE transaction_id= $ag_barcode";
			$result_all = $conn_all->query($sql_all);
			if ($result_all->num_rows > 0) {
				while ($row = $result_all->fetch_assoc()) {
					if ($row["Returned"] == "TRUE") {
						echo  '<h3 style="color:red">' . $ag_barcode . ' Already Returned ! ! !</h3>';
					}

					$rdate = $row["Rdate"];
					if ($rdate == null || $rdate == '' || $rdate == 0) {
						$rdate = date("Y-m-d");
					}
					$dr = $row["Dr"];
					if (!($dr > 0)) {
						$dr = (intval($row["agcpy"]) * floatval(id_news_rate($row["transid"])));
					}


					if ($row["Returned"] != "TRUE") {
						echo '<form method ="post"  action="cash_receive_barcode_iframe_data.php">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Ag No.</th>
										<th>Name</th>
										<th>QTY</th>
										<th>Date</th>
										<th>VP No.</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>' . $row["transid"] . '</td>
										<td>' . id_name(intval($row["transid"])) . '</td>
										<td>' . $row["agcpy"] . '</td>
										<td>
											<input type="date" name="vp_date" style="background-color: transparent; width:180px; text-align:center;" value="' . $rdate . '">
										</td>
										<td>
											<input type="input" name="vp_no" style="background-color: transparent; width:100px; text-align:center;" value="' . $row["VPNo"] . '">
										</td>
										<td>
											<input type="input" name="vp_receive" style="background-color: transparent; width:100px; text-align:center;" value="' . $dr . '">
										</td>
										<td>
											<input type="hidden" name="idn" value="' . $row["idn"] . '">
											<input type="hidden" name="transaction_id" value="' . $row["transaction_id"] . '">
											<input type="hidden" name="ag_name" value="' . $row["Name"] . '">
											<input type="hidden" name="ag_id_en" value="' . $row["ID_EN"] . '">
											<input type="hidden" name="status" value="' . $row["status"] . '">
											<input type="hidden" name="ag_quantity" value="' . $row["ag_quantity"] . '">
											<button id="barcode_btn" type="submit" autofocus>OK</button>
										</td>
									</tr>
								</tbody>
							</table></form>';
					}
				}
			} else {
				echo  '<h3 style="color:green;">' . $ag_barcode . '=No Data Found!</h3>';
			}
			$conn_all->close();
		}
		?>
	</div>
	<?php if (isset($_SESSION['auto_mode'])) : ?>
		<script>
			parent.postMessage("clearInput", "*");
			document
				.getElementById('barcode_btn')
				.click();
		</script>
	<?php endif; ?>
</body>

</html>
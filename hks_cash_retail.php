<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

	<title>Cash Memo (Retail)</title>


	<meta charset="utf-8">

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
	</style>

</head>
<script>
	var id = 0;
	var name;
	var min = -1;

	function agBookSearch() {
		document.getElementById("ag_submit").submit();


	}




	function myFunction1_() {

		name = "name" + id;


		var c = document.getElementById(name);
		c.remove();


		id = id - 1;
		totalPaid_multiply();
		totalPaid();
		totalPaid1();

	}


	function myFunction1() {
		id = id + 1;
		name = "name" + id;
		min = min + 1;

		var g = document.getElementById("sel2").innerHTML;
		//document.getElementById("select1").innerHTML =g;

		var para = document.createElement("DIV");
		// var t = document.createTextNode("This is a paragraph.");
		// para.appendChild(t);

		document.getElementById("sel1").appendChild(para);
		para.setAttribute("id", name);

		para.innerHTML = g;
		para.style.backgroundColor = "cornsilk";
		para.style.padding = "0px 0px 0px 0px";

		para.setAttribute("class", "row");
		var c = document.getElementById(name).children;
		c[0].children[0].setAttribute("name", name + 1);
		c[1].children[0].setAttribute("name", name + 2);

		c[2].children[0].setAttribute("name", name + 3);
		c[3].children[0].setAttribute("name", name + 4);

		c[0].children[0].setAttribute("id", name + 1);
		c[1].children[0].setAttribute("id", name + 2);

		c[2].children[0].setAttribute("id", name + 3);
		c[3].children[0].setAttribute("id", name + 4);




		document.getElementById(name + 3).addEventListener("keyup", totalPaid_multiply);


		document.getElementById(name + 4).addEventListener("keyup", totalPaid);

		//document.getElementById(name+3).addEventListener("keyup", totalPaid1);

		document.getElementById(name + 2).addEventListener("keyup", totalPaid1);


	}





	function totalPaid_multiply() {


		var j;
		var sum;
		sum = 0;
		for (j = 0; j <= id; j++) {



			sum = parseFloat(document.getElementById("name" + j + 2).value) * parseInt(document.getElementById("name" + j + 3).value);
			var mul_val = parseFloat(document.getElementById("name" + j + 2).value) * parseFloat(document.getElementById("name" + j + 3).value);

			document.getElementById("name" + j + 4).value = mul_val;

			sum = sum + parseFloat(document.getElementById("name" + j + 4).value);



		}

		//  document.getElementById("cash_total_donation_id").value=sum;     
		//  document.getElementById("max_val").value=id;	
		totalPaid();




		document.getElementById("cash_total_due").value =

			parseInt(document.getElementById("cash_total_donation_id").value) -

			parseInt(document.getElementById("cash_total_paid").value) -
			parseInt(document.getElementById("cash_disc").value);



	}

	function totalPaid() {


		var j;
		var sum;
		sum = 0;
		for (j = 0; j <= id; j++) {
			sum = sum + parseInt(document.getElementById("name" + j + 4).value);
		}

		document.getElementById("cash_total_donation_id").value = sum;
		document.getElementById("max_val").value = id;
		document.getElementById("cash_total_due").value =

			parseInt(document.getElementById("cash_total_donation_id").value) -

			parseInt(document.getElementById("cash_total_paid").value) -
			parseInt(document.getElementById("cash_disc").value);
	}




	function totalPaid1() {


		var j;
		var sum;
		sum = 0;
		for (j = 0; j <= id; j++) {
			sum = sum + parseInt(document.getElementById("name" + j + 2).value);
		}

		document.getElementById("cash_total_copy_id").value = sum;
		//document.getElementById("max_val").value=id;	
		document.getElementById("cash_total_due").value =

			parseInt(document.getElementById("cash_total_donation_id").value) -

			parseInt(document.getElementById("cash_total_paid").value);

		totalPaid_multiply()
	}
</script>

<script>
	function myFunction(str) {

		if (str.length == 0) {
			document.getElementById("cash_name").value = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var sss = this.responseText;
					var res = sss.split("@#");
					document.getElementById("cash_name").value = res[0];
					document.getElementById("cash_addr").value = res[1];

					document.getElementById("cash_mobile").value = res[2];

				}
			};
			xmlhttp.open("GET", "hks_id_to_address_data.php?q=" + str, true);
			xmlhttp.send();
		}
	}








	function paid(str) {

		document.getElementById("cash_total_due").value =

			parseInt(document.getElementById("cash_total_donation_id").value) -

			parseInt(document.getElementById("cash_total_paid").value) -
			parseInt(document.getElementById("cash_disc").value);



	}
</script>

<body>

	<?php

	$servername = "localhost";
	$username = "HKSamacar_local";
	$password = "Jpsk/1866";
	$dbname = "HareKrishnaSamacar";


	date_default_timezone_set("Asia/Dhaka");
	$date = intval(date("Ymd"));
	// Create connection

	?>




	<?php


	// Create connection
	$conn_trans_id = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn_trans_id->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	mysqli_set_charset($conn_trans_id, "utf8");
	$sql_id = "SELECT MAX(transaction_id)as maxid FROM tblIssue where (transaction_id IS NOT NULL)AND(transaction_id LIKE '" . $date . "1_____') ";
	$result_id = $conn_trans_id->query($sql_id);

	if ($result_id->num_rows > 0) {
		// output data of each row
		$row = $result_id->fetch_assoc();
		$row["maxid"];
		if ($row["maxid"] != "") {
			$GLOBALS['maxtransid'] = intval(substr($row["maxid"], 0, 12) . "00") + 100;;
		} else {
			$GLOBALS['maxtransid'] = $date . "1" . "001" . "00";;
		}
	} else {
		$GLOBALS['maxtransid'] = $date . "1" . "001" . "00";

		echo "new";
	}
	$conn_trans_id->close();
	?>




	<div class="container-fluid">

		<div class="row" style="height: 100%;">

			<div id="wrapper" class="col-md-2 col-xl-2">

				<?php include_once "hks_sidebar.php";   ?>
				<?php include_once "hks_user.php";   ?>

				<div class="col-md-10 col-xl-10">
					<!-- Page content -->
					<div id="page-content-wrapper">
						<!-- Keep all page content within the page-content inset div! -->
						<div class="page-content inset">
							<div class="row">
								<div class="col-md-12">
									<p class="well lead" style="margin-top: 10px;"> Retail Sales </p>
									<div class="container">
										<div class="row">
											<!-- div da esquerda -->
											<!-- Text input CNPJ e Razao Social-->
											<div class="col-sm-12 contact-form">
												<!-- div da direita -->
												<form id="contact" method="post" target="_blank" action="hks_cash_retail_data.php" class="form" role="form">
													<div class="row">
														<div class="col-xs-4 col-md-4 form-group">
															<input class="form-control" id="inputCNPJ" name="cash_trnx" value="<?php echo $GLOBALS['maxtransid']; ?>" type="text" autofocus />
														</div>
														<div class="col-xs-4 col-md-4 form-group">
															<input class="form-control" id="transactionId" onkeyup="myFunction(this.value)" name="cash_trnx_id" placeholder="Agent/Subscriber No." type="text" autofocus />
														</div>


														<div class="col-xs-4 col-md-4 form-group">
															<input class="form-control" id="inputCNPJ" name="cash_date" value="<?php echo date("m/d/Y"); ?>" type="text" />
														</div>
														<div class="col-xs-4 col-md-4 form-group">
															<input class="form-control" id="cash_name" name="cash_name" placeholder="Name" type="text" />
														</div>
														<div class="col-xs-5 col-md-5 form-group">
															<input class="form-control" id="cash_addr" name="cash_addr" placeholder="Address" type="text" />
														</div>
														<div class="col-xs-3 col-md-3 form-group">
															<input class="form-control" id="cash_mobile" name="cash_mobile" placeholder="Mobile" type="text" />
														</div>



													</div>


													<div id="sel1">

														<div id="sel2" class="row" style="background-color: cornsilk; padding: 10px 0px 0px 0px">

															<div class="col-2  form-group">
																<select required class="custom-select" id="name0" name="name0">
																	<option value="">Select</option>
																	<option value="HKS">HKS</option>
																	<option value="HKP">HKP</option>
																	<option value="DPM">Due Payment</option>
																	<option value="OTH">Others</option>
																</select>
															</div>

															<div class="col-3 form-group">
																<select required class="custom-select" id="name01" name="name01">
																	<option value="">Issue No.</option>

																	<?php
																	$conn = new mysqli($servername, $username, $password, $dbname);
																	// Check connection
																	if ($conn->connect_error) {
																		die("Connection failed: " . $conn->connect_error);
																	}

																	$sql = "SELECT issue FROM products";
																	$result = $conn->query($sql);

																	if ($result->num_rows > 0) {
																		// output data of each row
																		while ($row = $result->fetch_assoc()) {
																			echo "<option value =" . $row['issue'] . ">" . $row['issue'] . "</option>";
																		}
																	} else { }
																	$conn->close();

																	?>

																</select>


																<!-- <button class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: tomato;" class="fas fa-plus-square"></i></button> <span style="line-height: 2;"> Click to add new row.</span> -->



															</div>

															<div class="col-2 form-group">

																<input class="form-control" id="name02" name="name02" placeholder="No. of Copy" onkeyup="totalPaid1()" type="text" />
															</div>

															<div class="col-2 form-group">

																<input class="form-control" style="display: inline-block;" id="name03" name="name03" placeholder="@" onkeyup="totalPaid_multiply
                                    ()" type="text" />

															</div>

															<div class="col-3 form-group">
																<input class="form-control" style="display: inline-block;" id="name04" name="name04" placeholder="Donation" onkeyup="totalPaid()" type="text" />
															</div>

														</div>
													</div>

													<button type="button" onclick="myFunction1()" class="btn btn-outline-light text-dark btn-sm"><i style="font-size: 1em; color: tomato;" class="fas fa-plus-square"></i></button> <span style="line-height: 2;"> Click to add new row.</span>

													<button type="button" onclick="myFunction1_()" class="btn btn-outline-light text-dark btn-sm"><i style="font-size: 1em; color: tomato;" class="fas fa-minus-square"></i></button> <span style="line-height: 2;"> Click to delete row.</span>



													<hr style="background-color: transparent; border: 1px solid red; margin: 0em 0em 0em 0em; " noshade>
													<div class="row" style="background-color: cornsilk;">

														<div class="col-xs-1 col-md-1 form-group">
															<div class="controls">
																<label for=""> Total </label>
																<input class="form-control" style="background-color: transparent;" id="cash_total_donation_id" name="cash_total_donation" onkeyup="paid(this.value)" placeholder="" type="text" />
															</div>
														</div>



														<div class="col-xs-1 col-md-1 form-group">
															<div class="controls">
																<label for=""> Copy </label>
																<input class="form-control" style="background-color: transparent;" id="cash_total_copy_id" name="cash_total_copy" onkeyup="paid(this.value)" type="text" />
															</div>
														</div>

														<div class="col-xs-2 col-md-2 form-group">
															<div class="controls">
																<label for=""> Discount</label>
																<input class="form-control" id="cash_disc" name="cash_disc" onkeyup="paid(this.value)" type="text" />
															</div>
														</div>

														<div class="col-xs-2 col-md-2 form-group">
															<div class="controls">
																<label for=""> Paid</label>
																<input class="form-control" id="cash_total_paid" name="cash_total_paid" onkeyup="paid(this.value)" type="text" />
															</div>
														</div>

														<div class="col-xs-2 col-md-2 form-group">
															<div class="controls">
																<label for=""> Due </label>
																<input class="form-control" style="background-color: transparent;" id="cash_total_due" name="cash_total_due" type="text" />
															</div>
														</div>

														<div class="col-xs-2 col-md-2 form-group">
															<div class="controls">
																<label for=""> Comments</label>
																<input class="form-control" id="comments" name="comments" placeholder="Comments" type="text" />
															</div>
														</div>


														<div class="col-xs-2 col-md-2 form-group" style="padding: 30px 0px 0px 40px;">
															<button class="btn btn-danger" type="submit">Submit</button>
														</div>


													</div>

													<input name="max_val" id="max_val" type="hidden" />

												</form>
												<hr>
												<p class="well lead" style="margin-top: 10px;"> Search and Edit in Retail Sales </p>
												<form id="ag_submit" method="post" class="form" role="form" target='iframe_cash_retail_search' action="hks_cash_retail.search.php">
													<div class="row" style="background-color: ;">
														<div class="col-5 form-group">
															<input class="form-control" id="ag_input" name="ag_search" placeholder="Type  to Search" type="text" onkeyup="" />
														</div>
														<div class="col-3 form-group">
															<input class="form-control" id="ag_input2" name="date_from" type="date" onkeyup="" />
														</div>
														<div class="col-3  form-group">
															<input class="form-control" id="ag_input3" name="date_to" type="date" onkeyup="" />
														</div>
														<div class="col-1 form-group">
															<button class="btn btn-danger" type="submit"> OK</button>
														</div>
													</div>
												</form>
											</div> <!-- fim div da direita -->








										</div> <!-- fim div da esquerda -->


									</div>




								</div>

								<iframe name='iframe_cash_retail_search' height="300" width="100%" scrolling="yes" style="border:0"></iframe>

							</div>
						</div>
					</div>
				</div>




			</div>




		</div> <!-- end of row -->

	</div> <!-- end of container -->

</body>

</html>
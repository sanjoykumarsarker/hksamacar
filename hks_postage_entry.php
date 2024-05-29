<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Postage Entry</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon1.ico" />	
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9"
	 crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row" style="height: 100%;">

			<div id="wrapper" class="col-md-2 col-xl-2">
				<?php include_once "hks_sidebar.php";?>


				<div class="col-md-10 col-xl-10">
					<!-- Page content -->
					<div id="page-content-wrapper">						
						<div class="page-content inset">
							<div class="row">
								<div class="col-md-12">
									<p class="well lead" style="margin-top: 30px;"> Postage Endtry & Edit </p>
									<div class="container">
										<div class="row">
											<div class="col-sm-12 contact-form">
												<!-- div da direita -->
												<form id="ag_submit" method="post" class="form" role="form" target='iframe_postage'>
													<div class="row" style="background-color: ;">
														<div class="col-md-8 col-12 form-group">
															<input class="form-control" id="isn" name="issue_number" placeholder="Type Issue Number" type="text" />
														</div>
														<div class="col-md-2 col-6 form-group">
															<button class="btn btn-danger btn-block" type="submit" formaction="hks_postage_entry_sheet.php">POST</button>
														</div>
														<div class="col-md-2 col-6 form-group">
															<button class="btn btn-primary btn-block" type="submit" formaction="hks_courier_entry_iframe.php">COURIER</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>

								</div>

								<iframe name='iframe_postage' height="800" width="100%" scrolling="yes" style="border:0"></iframe>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div> <!-- end of row -->

	</div> <!-- end of container -->
	<script>
        $('document').ready(function(){
            if (typeof(Storage) !== "undefined") {
                
                let input = $('#isn');
                if (sessionStorage.issue) {
                    input.val(sessionStorage.getItem('issue'));
                    // $('#loadIssue').click();
                }
                input.on('change', function(){
                    sessionStorage.setItem("issue", $(this).val());                    
                });
            }
		});
    </script>
</body>

</html>
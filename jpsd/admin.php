<?php session_start();?>
<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<title>
Admin
</title>
</head>
<body style="background-color:#ff7d4c">
	  <br>
  <br>
  <br>
   <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading" style= "text-align:center">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="apanel.php" method="POST">
							<fieldset>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Admin Name" name="loginname" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Enter Password" name="mysec" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
						
						
						
						
						
						
						
						
						
					</div>
					<div class="panel-footer ">
						This page is only for Admins.<br>
						If you are not admin please <a href="#" onClick="history.go(-1);return true;"> Go Back </a>
					</div>
                </div>
			</div>
		</div>
	</div>
  

</body>
</head>
</html>
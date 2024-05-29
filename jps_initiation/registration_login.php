<?php
session_start();
   
session_unset();
session_destroy();
 
?>
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
Data Entry Operator Signup
</title>


<script>
$(document).ready(function() {

      if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
           alert('Back button was pressed.');
                window.location='regsignup.php';
                return false;
            }
          }
        });

        window.history.pushState('forward', null, './regsignup.php');
      }

    });
</script>


<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
          var  xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","registration_login_temple_name.php?q="+str,true);
		 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
    }
}
</script>



</head>
<body style="background-color:#ff7d4c">
   <div class="container" style="margin-top:150px">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading" style= "text-align:center">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form id="myForm" role="form" action="registration_preli.php"  method="POST">
							<fieldset>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
											<span class="input-group-addon">
												<i class="glyphicon glyphicon-home"></i></span> 
          									  <select   class="form-control" name="str" onchange="showUser(this.value)"   >
           										<option value="">Select Country</option>
	
<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$sql_con = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors here!

// The query we want to execute


$sql = "SELECT country_name,country_code FROM country";

// Attempt to prepare the query
if ($stmt = $sql_con->prepare($sql)) {

  // Pass the parameters
   
 // $stmt->bind_param("sss", $country_code, $date1, $date2); 

  // Execute the query
  $stmt->execute();
  if (!$stmt->errno) {
    // Handle error here
  }

  // Pass a variable to hold the result
  // Remember you are binding a *column*, not a row
  $stmt->bind_result($country_name,$country_code);

  // Loop the results and fetch into an array
  $logIds = array();
  while ($stmt->fetch()) {
   echo "<option value='$country_name'>" .$country_name."</option>";
  }

  // Tidy up
  $stmt->close();
  $sql_con->close();

  // Do something with the results
 //echo$logIds["country_name"];

} else {
  // Handle error here
}
?>
			
			
	 
        
        									 </select>
											</div>
										</div>			 
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-home"></i>
												</span> 
												<div id="txtHint">
												<select class="form-control" required >
												</select>
												</div>
											</div>
										</div>
										 
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="ID" name="id"  type="text" required autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Enter Password" name="password" type="password" maxlength="30" required value="">
											</div>
										</div>
										<div class="form-group">
											<button type="submit"   class="btn btn-lg btn-primary btn-block"  >Go to Registration Page </button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Not interested ! <a href="#" onClick="history.go(-1);return true;"> Go Back </a>
					</div>
                </div>
			</div>
		</div>
	</div>
  
   
  <p  id="txtHint1"></p>
  
  
</body>
</head>
</html>
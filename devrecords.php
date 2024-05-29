<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  		
	<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	
	<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>  
<title>
Devotee Records</title>


<script>
    

function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","devdat.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


<script>
function edit(strg) {
    if (strg == "") {
        document.getElementById("space").innerHTML = " ";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("space").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","devshow_admin.php?g="+strg,true);
        xmlhttp.send();
    }
}
</script>




</head>
<body style="background-color:#ffffff">
   <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading" style= "text-align:center">
					<strong> Hare Krishna !</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="devdat.php" method="GET">
							<fieldset> 
							<div class="row">
								<div class="col-sm-12 col-md-10  col-md-offset-1 ">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span> 
											<p>	<select class="form-control" name="str" onchange="showUser(this.value)"  >
													<option value=" ">Select Division</option>
													<option value="Barisal">Barisal</option>
													<option value="Chittagong">Chittagong</option>
													<option value="Dhaka">Dhaka</option>
													<option value="Khulna">Khulna</option>
													<option value="Mymensingh">Mymensingh</option>
													<option value="Rajshahi">Rajshahi</option> 
													<option value="Rangpur">Rangpur</option>
													<option value="Sylhet">Sylhet</option> </select></p>
														<br>
										</div>
									</div>			 
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span> 
											<div id="txtHint"><select class="form-control" ></select></div>
										</div>
									</div>
								</div>
							</div>
							</fieldset>
						</form>
					</div>
					
					<div class="panel-footer ">
						  <a href="#" onClick="history.go(-1);return true;">   Back </a>
					</div>
                </div>
			</div>
		</div>
	
	
	
	</div>
	<div class="panel panel-danger">
        <div class="panel-heading" style="text-align:center;"> DataTable of Devotees</div>
		<div class="panel-body">
			<div id="space" > <p style= "text-align:center"> List of Devotees </p> </div>
		</div>
	</div>
			
  
  </body>
		
		<br><br><br><br>
		<footer>
            <div class="row">
                <div class="col-lg-12" style= "text-align:center;cursor:pointer;">
                    <Span style="border-right:1px solid black; padding:10px" >Copyright &copy; hksamacar 2017</span> <Span style="border-right:1px solid black;  padding:10px" > <a href="indexn.php" target="_blank" > Home </a> </span> <span style=" padding:10px;"> <a href="dataexport2.php" > Export to Excel </a> </span>
                </div>
            </div>
        </footer>

</head>
</html>
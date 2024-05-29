<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration
  </title>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <style>
	
.input-group-addon {	
	min-width:140px;
	background-color: whitesmoke;
    text-align:left;
}

</style>
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
        xmlhttp.open("GET","temple_show.php?q="+str,true);
        xmlhttp.send();
    }
						}
</script>
	
<script>

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

</script>
	
	
	
</head>
<body>


<div class="container">
	<div class="row">
        <div class="col-sm-12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                <h3>Temple Registration</h3>
              </div>
              
			  <div class="modal-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active">
					
					<a href="#login" data-toggle="tab">New Registration</a></li>
					<li>
					<a href="#create" data-toggle="tab"> </a></li>
                    <li>
					<a href="#create" data-toggle="tab">Show All</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action='temple_registration_data.php' method="POST">
                        <fieldset>
                         <div class="container">
   
    <div style=" display:inline-block;clear:left ;width:50%; ">
	<br>

	<label class="control-label"  >Country</label>
	  <p>
        <select required class="form-control" id="country"   name="temple_country_name"  >
 				
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
   echo "<option value='$country_name,$country_code'>" .$country_name."</option>";
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
    </p>
	
	 
    </p>
    <script type="text/javascript">
        function update()
        {
            var Barisal=["Barguna", "Barisal", "Bhola", "Jhalokati", "Patuakhali", "Pirojpur"];
            var Chittagong=["Bandarban", "Brahmanbaria", "Chandpur ", "Chittagong", "Comilla", "Cox's Bazar", "Feni", "Khagrachhari", "Lakshmipur", "Noakhali", "Rangamati"];
            var Dhaka=["Dhaka", "Faridpur", "Gazipur", "Gopalganj", "Kishoreganj", "Madaripur", "Manikganj", "Munshiganj", "Narayanganj", "Narsingdi", "Rajbari", "Shariatpur", "Tangail"];
            var Khulna=["Bagerhat", "Chuadanga", "Jessore", "Jhenaidah", "Khulna", "Kushtia", "Magura", "Meherpur", "Narail","Satkhira"];
			var Mymensingh=["Jamalpur", "Mymensingh", "Netrakona", "Sherpur"];
            var Rajshahi=["Bogra", "Joypurhat", "Naogaon", "Natore", "Nawabganj", "Pabna", "Rajshahi", "Sirajganj"];
			var Rangpur=["Dinajpur", "Gaibandha", "Kurigram", "Lalmonirhat", "Nilphamari", "Panchagarh", "Rangpur", "Thakurgaon"];
			var Sylhet=["Habiganj", "Moulvibazar", "Sunamganj", "Sylhet"];

            var countries=document.getElementById("country");
            var cities=document.getElementById("city");
            var selected=countries.value;
            var html='<option selected="selected">        Select District</option>';
            if(selected === "Barisal")
				
            {
                for(var i=0; i < Barisal.length; i++)
                {
                    html+='<option value="' + Barisal[i] + '">' + Barisal[i] + '</option>';
                }
            }
            else if(selected === "Chittagong")
            {
                for(var j=0; j < Chittagong.length; j++)
                {
                    html+='<option value="' + Chittagong[j] + '">' + Chittagong[j] + '</option>';
                }
            }
            else if(selected === "Dhaka")
            {
                for(var k=0; k < Dhaka.length; k++)
                {
                    html+='<option value="' + Dhaka[k] + '">' + Dhaka[k] + '</option>';
                }
            }
			else if(selected === "Khulna")
            {
                for(var k=0; k < Khulna.length; k++)
                {
                    html+='<option value="' + Khulna[k] + '">' + Khulna[k] + '</option>';
                }
            }
			else if(selected === "Mymensingh")
            {
                for(var k=0; k < Mymensingh.length; k++)
                {
                    html+='<option value="' + Mymensingh[k] + '">' + Mymensingh[k] + '</option>';
                }
            }
			else if(selected === "Rajshahi")
            {
                for(var k=0; k < Rajshahi.length; k++)
                {
                    html+='<option value="' + Rajshahi[k] + '">' + Rajshahi[k] + '</option>';
                }
            }
			else if(selected === "Rangpur")
            {
                for(var k=0; k < Rangpur.length; k++)
                {
                    html+='<option value="' + Rangpur[k] + '">' + Rangpur[k] + '</option>';
                }
            }
			else if(selected === "Sylhet")
            {
                for(var k=0; k < Sylhet.length; k++)
                {
                    html+='<option value="' + Sylhet[k] + '">' + Sylhet[k] + '</option>';
                }
            }
            cities.innerHTML=html;
        }
    
	
</script>
	
<p id="demo"></p>

<script>


function myFunction(selTag) {
    var x = selTag.options[selTag.selectedIndex].text;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
<br>
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> State/Division:</span>
										<input id="msg" type="text" required class="form-control" name="temple_province" placeholder="Type Province/State/Division  ">
									</div>
								</div>
							</div>
						</div>	<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">City: </span>
										<input id="msg" type="text" required class="form-control" name="temple_city" placeholder="Type City ">
									</div>
								</div>
							</div>
						</div>	<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> Post Code: </span>
										<input id="msg" type="text" required class="form-control" name="temple_postcode" placeholder="Type Post Code">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> Address: </span>
										<input id="msg" type="text" required class="form-control" name="temple_address" placeholder="Type Address">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Temple Name:</span>
										<input id="msg" type="text" required class="form-control" name="temple_name" placeholder="Temple Name">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Recommendator:  </span>
										<input id="msg" type="text" required class="form-control" name="temple_recommendator" placeholder="Type Recommendator Name">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">E-mail:  </span>
										<input id="msg" type="email"  class="form-control" name="temple_email" placeholder="Type E-mail">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Website:  </span>
										<input id="msg" type="text"  class="form-control" name="temple_website" placeholder="Type Website">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
										<input id="msg" type="text" required class="form-control" name="temple_phone" placeholder="Phone/Mobile">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> মন্দিরের নাম: </span>
										<input id="msg" type="text" required class="form-control" name="temple_name_native" placeholder="মন্দির ">
									</div>
								</div>
							</div>
						</div>
	    <br>
	
	   		          <button type="submit" class="btn btn-Warning"  data-target="#myModal"  >Save Record </button>

	 <br>
   
	
 </div>
                                     
                    </div>
                        </fieldset>
                      </form>   

                    </div>
                    
					<div class="tab-pane fade" id="create">
					<div class="tab-pane active in" id="login">
                    <form class="form-horizontal" action='' method="GET">
                    <fieldset>
                    <div class="container">
					<div style=" display:inline-block;clear:left ;width:50%; ">
						<br>

						<label class="control-label"  >Country</label>
							<p>
							 
							
							<select required class="form-control"   name="str"  onchange="showUser(this.value)"  >
 			
			
			
			
		  <option value="">Select Country</option>
		  <option value="country_all">All</option>
	
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
							</p><br>
					</div>              
                    </div>
                    </fieldset>
                    </form>   
						<div style= "text-align:center"  id="txtHint"><p>List of Registered Temples</p>
						</div>
                    </div>     
                    </div>
					
                </div>
				</div>
            </div>
        </div>
	</div>
	</div>
		<div>
		<footer>
            <div class="row">
                <div class="col-lg-12" style= "text-align:center;cursor:pointer;">
                    <Span style="border-right:1px solid black; padding:10px" >Copyright &copy; hksamacar 2017</span> <Span style="border-right:1px solid black;  padding:10px" > <a href="#" onClick="history.go(-3);return true;"> Home </a> </span> <span style=" padding:10px;"> <a href="dataexport.php" > Export to Excel </a> </span>
                </div>
            </div>
        </footer>
		</div>
</div>

</body>
</html>
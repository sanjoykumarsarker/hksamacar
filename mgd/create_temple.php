<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Temple Registration
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
	
<script>
	
	function showUser() {
        var str="International"
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
        <div class="span12">
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
					<a href="#create" onclick="showUser()" data-toggle="tab">Show All</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action='temdin.php' method="POST">
                        <fieldset>
                         <div class="container">
   
    <div style=" display:inline-block;clear:left ;width:50%; ">
	<br>

 	 
        <input required class="invisible" id="country" value="International"  name="t_div" onchange="update()">
             
   
	
 
     
        <input required class="invisible" id="city" name="t_dist" value="International"  onchange="myFunction(this)">
            
    
    <script type="text/javascript">
        function update()
        {
            var International=["International"];

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
            else if(selected === "International")
            {
                for(var k=0; k < International.length; k++)
                {
                    html+='<option value="' + International[k] + '">' + International[k] + '</option>';
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

						 	<input id="msg" type="hidden" value=""   required class="form-control" name="t_ps" value="Sadar">
					 	
						 	<input id="msg" type="hidden" value="" required class="form-control" name="t_addr" placeholder="Enter Village/Union/Road">
					 		<input id="msg" type="hidden" value="" required class="form-control" name="tname_b" placeholder="মন্দির ">
									<input id="msg" type="hidden" value="" required class="form-control" name="trecom_b" placeholder="অনুমোদনকারী ">
							


						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Temple Name: &nbsp &nbsp  </span>
										<input id="msg" type="text" required class="form-control" name="tname" placeholder="Temple">
									</div>
								</div>
							</div>
						</div>



					 <input id="msg" type="hidden" value="" required class="form-control" name="trecom" placeholder="Recommended">
									<input id="msg" type="hidden" value="" required class="form-control"  name="t_ph" placeholder="Phone">
								 
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
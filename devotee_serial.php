<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type='text/javascript'>

$(function() {
$("#demo").find('.print').on('click', function() {
$.print("#demo");
});
});
</script> 


	<script>
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
} 
	 
	</script> 
	 
	 <script>
$(document).ready(function(){
    $('#ok        ').click(function(){
       
var optionTexts = [];
$("ol#space li").each(function() {

	optionTexts.push($(this).attr('id'))



	});


var request = $.ajax({
  url: "devotee_serial_data_new.php",
  method: "POST",
  data: { myData : JSON.stringify(optionTexts)},
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("demo").innerHTML =msg;
});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});  
});
});
</script>
	 
	 
	 <script>
  $( function() {
    $( " #space  " ).sortable();
    $( " #space " ).disableSelection();
  } );
  </script>

<script> 
$(document).ready(function(){
    $('#change').change(function(){
   
  var date=$(this).val();
   
 
// this will return an array with strings "1", "2", etc.
 
 
var request = $.ajax({
  url: "devotee_serial_data.php",
  method: "POST",
  data: { myData : JSON.stringify(date)  },
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("space").innerHTML =msg;
});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});  
	    
	   
    });
});


</script>
<title>
Initiation Serial
</title>
<style>
#t1 {
    -moz-tab-size: 20; /* Code for Firefox */
    -o-tab-size: 20; /* Code for Opera 10.6-12.1 */
    tab-size: 20;
	border:none;
	font-size: 15px;
	font-family:Calibri;
	display: flex;
	white-space: normal;
	word-break: break-word;
}
.sss{
	 padding: 5px 0px 5px 0px;    
	 border-width: 1px;
	 border-bottom: 1px green solid;
	 width: 100%;
}
.sss:hover{
	 cursor:pointer;
	 background-color:whitesmoke;
}

.newspaper {
         align-self: center;
    display:flex;
 
 
}
</style>	
 

</head>
 



<body>
<div style="clear:both;"> 
<img src="header.png" style="z-index:100; text-align:left;" height="115px" width="100%">
</div>

<div >
  <p class="bg-danger bg-inline-block" style ="text-align: center; font-size: 40px; font-family:French Script MT;" >Set Serial for Harinama Initiation </p>
</div>

<div class="container" style="text-align:center;"  >
<div class="col-xs-4"> </div>
<div class="col-xs-4" style="text-align:center;" >
<h4> Select Initiation Date</h4>
<div class="input-group">
<span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i> </span>

<?php
  // $q = $_GET['qnn'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sqld = "SELECT DISTINCT idate FROM date_set";
$resultd = $conn->query($sqld);
  echo " <select id='change' name='str' class='form-control'    >";
echo "<option>Please Select Date</option>";
  if ($resultd->num_rows > 0) {
   
	 
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
echo "<option>".$row["idate"]."</option>";
}  

}
echo " </select> ";
$conn->close();
?> 

</div>		
</div>		
<div class="col-xs-4"> </div>
</div>
<br>
<div class="container" style="background-color:whitesmoke; border: 0.5px solid black;border-radius: 15px; text-align:left; "  >
<br>

<div style="height:500px; overflow-y: scroll;" >
<ol id="space"> </ol> 
</div>
<br>



</div>
<br><br>
<div style="text-align:center">
<button id="ok" class="btn btn-success btn-lg" >Update Serial</button>
<input class="btn btn-warning btn-lg" type="button" onclick="printDiv('demo')" value="Print List"/>
</div>


<div id="editor"></div>


<div id="demo" class="newspaper"> </div >		
</body>
</html>
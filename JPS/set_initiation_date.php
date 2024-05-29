<?php session_start();?>
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
 
<title>
Set Initiation Date
</title>
	
<style>

hr		{
	margin: 0.1em auto;
	border: solid 0.02px dimgrey;
}

.clist	{     
display:none;
}

.fa		{
		float:right;
		background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
}
#myList li:hover{
	 cursor:pointer;
	 background-color: yellow;
}

.clist li:hover{
	 cursor:pointer;
	 background-color: yellow;
}

ul:hover{
	cursor:pointer;
}

.fa:hover{
		float:right;
		background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
		color:red;
}

.class2	{
        background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
        overflow: hidden;
}


</style>




<script>
		$(function(){
         // Find any date inputs and override their functionality
         $('input[type="date"]').datepicker({ dateFormat: "yy-mm-dd" });
		});
	</script>
 <script>
$(document).ready(function(){
$(".ppp").click(function() {
	 
  $(this).children().css("display", "block");
  
});
$(".ppp").dblclick(function() {
	  
	
  $(this).children().css("display", "none");
  
  
});


});
</script>
<script>
$(document).ready(function(){
$("#myList").on("click", "button", function(e) {
    e.preventDefault();
    $(this).parent().remove();
});
});
</script>
<script>
function func(str,cl) {
 
 var lis = document.getElementById("myList").getElementsByTagName("li");
if(lis.length > 0)    {
	
	
	var s=lis.length;
	
	
	
	for(var i=0;i<s;i++){
		
	if(lis[i].id==cl){
		

throw  alert(str+' is Duplicate');  


		
	}	
		
		
	}
	
	
	}
var res =String(cl)
      var cl1="#"+cl;
	 
	  var cl2=cl+"2";
	  var cl3=cl+"3";
	
	 var btn1 = document.createElement("BUTTON");
	 var node = document.createElement("LI"); 
    
	  
  
    node.appendChild(btn1);
	 
	
	var att = document.createAttribute("class");       // Create a "class" attribute
att.value = "ccc";                           // Set the value of the class attribute
btn1.setAttributeNode(att); 
	
	
	
	
    var textnode = document.createTextNode(str);
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);
	 btn1.setAttribute("class","fa fa-trash-o fa-lg");
	 
	btn1.setAttribute("id",res);
 
	  node.setAttribute("id",cl);
	  node.setAttribute("class","cl");
	 }
//var effectData = document.getElementById("effects-list").getElementsByTagName("li")[0];	
</script>
<script>
$(document).ready(function(){
    $('ol#ilist li button     ').click(function(){
       
 

	   $(this).css("background-color", "#0022ff");
	   $(this).css("color", "#ffffff");
	   
	   
	    
	   
    });
});
</script>
 
  <script>
  $( function() {
    $( "#myList" ).sortable();
    $( "#myList" ).disableSelection();
  } );
  </script>
<script>
$(document).ready(function(){
$('#all').click(function(){
var optionTexts = [];
$("ol#myList li").each(function() {
optionTexts.push($(this).attr('id'))
});

var request = $.ajax({
  url: "set_initiation_date_data.php",
  method: "POST",
  data: { myData : JSON.stringify(optionTexts)},
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("demo").innerHTML =msg; });
request.fail(function( jqXHR, textStatus ) 
	{ alert( "Request failed: " + textStatus ); });  
	    
});
});
</script>
<script>


 
$(document).ready(function(){
    $('#update').click(function(){
      
var optionTexts = [];
$("ol#myList li").each(function() {
optionTexts.push($(this).attr('id'))
});

<?php $d="uuuu"; ?>

  var date=$("#date").val();
  var place=$("#place").val();
  var tithi=$("#tithi").val();
  var group=$("#group").val();
  var string = $("#include").val();
 

var temp = new Array();
// this will return an array with strings "1", "2", etc.
temp = string.split(",");
 
var request = $.ajax({
  url: "set_initiation_date_data.php",
  method: "POST",
  data: { myData : JSON.stringify(optionTexts),include : JSON.stringify(temp) 
,date :JSON.stringify(date),place :JSON.stringify(place)
,tithi :JSON.stringify(tithi),group :JSON.stringify(group)  },
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
 
</head>


<body>
<div style="clear:both;"> 
<img src="header.png" style="position:fixed; z-index:100; text-align:left;" height="115px" width="100%">
</div>

<br><br><br><br><br><br>

<div >
  <p class="bg-danger bg-inline-block" style ="text-align: center; font-size: 40px; font-family:French Script MT;" >Set Date and Serial for Harinama Initiation </p>
</div>

<br>


<div class="container"  >
<div class="row" style= " font: 15px 'Lucida sans', Arial, Helvetica; text-align: center; color:red"  >

	 	<div class="col-sm-3">
		Set Initiation Date<br><br>
			<div class="input-group">
				<span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i> </span>
					<input type="date" id="date" class="form-control" name="sidate" required  >
			</div>
		</div>
		
		
	 	<div class="col-sm-3">
		Set Initiation Place<br><br>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					<input type="text" id="place" class="form-control" name="sidate" required  >
			</div>
		</div>


	 	<div class="col-sm-3">
		Set Initiation Tithi<br><br>
			<div class="input-group">
				<span class="input-group-addon"><i class="material-icons" style="font-size:18px;" >local_florist</i> </span>
					<input type="text" id="tithi"class="form-control" name="sidate" required value="শ্রাবণ শুক্লা ত্রয়োদশী" autocomplete="off"    >
			</div>
		</div>



	 	<div class="col-sm-3">
		Set Initiation Group<br><br>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
					<input type="text" id="group" list="groups" class="form-control" name="sidate" autocomplete="off" required >
						<datalist id="groups">
							<option value="গৌরাঙ্গ (Gauranga)">
							<option value="নিত্যানন্দ (Nityananda)">
							<option value="জগন্নাথ (Jagannath)">
							<option value="বলদেব (Baladev)">
							<option value="সুভদ্রা (Subhadra)">
							<option value="অদ্বৈত (Advaita)">
							<option value="গদাধর (Gadadhara)">
							<option value="শ্রীবাস (Sribas)">
						</datalist>
			</div>
		</div>
		
	<br><br><br><br><br><br>	
<div class="row" style= "font: 15px 'Lucida sans', Arial, Helvetica; text-align: left; color:green" >

	 	<div class="col-sm-6" style="border:1px solid whitesmoke; height:600px;
				width: 48%;  margin: 1%; background-color: whitesmoke; padding:10px; overflow-y: scroll; " >
		<div style="text-align:center" > List of temples <br>
		<span style="font-size:10px"> Click to open and Double-Click to close the dropdown. Then click on the temple name to be selected.</span>
		</div> <hr><br>
			
		
<?php

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


$arr = array('Dhaka','Barisal','Chittagong','Khulna','Mymensingh','Rajshahi','Rangpur','Sylhet');
foreach ($arr as $div) {
$sqld = "SELECT tname,tregid,t_dist FROM tmpl where t_div ='".$div."' ";
$resultd = $conn->query($sqld);
 

$myArrayd=array();

if ($resultd->num_rows > 0) {
    echo " <ul type='square' ><li class='ppp'>$div   <ol id='ilist' class='clist'  > ";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
		
 	$name= $row["tname"];
	$tregid= $row["tregid"];
	$dist= $row["t_dist"];
	
 $iii= $row["tregid"];

echo "<li  id='$tregid' >  <button class='class2' 
		id='$name, $dist' value='$tregid' onclick='func(this.id,this.value)'>$name, $dist</button></li>";	
}
echo "</ol> </li></ul>";}}
$conn->close();
?> 	
			
			
</div>

<div class="col-sm-6" style="border:1px solid whitesmoke; height:600px;	width: 48%;  margin: 1%; background-color: whitesmoke;	padding:10px; overflow-y: scroll; " >
	<div style="text-align:center" > Selected Temples <br>
		<span style="font-size:10px"> Drag up or down rearrange temple list. Click trash-box in the right to remove any item.</span>
	</div> <hr><br>
		<ol id="myList" class="class1"> </ol> 	
	
</div>
</div>

<div> Include Devotees(By ID)<br><br>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-plus-square"  ></i> </span>
		<input type="text" id="include"class="form-control" placeholder="ID with comma" name="sidate" autocomplete="off">
	</div>
</div><br><br><br>

<div class="row" style= "font: 15px 'Lucida sans', Arial, Helvetica; text-align: center;">
	<button id="update" class="btn btn-success btn-lg">	Update Date </button>
	
	<form target="_blank" action="devotee_serial.php" style="display:inline">
		<button type="submit" class="btn btn-danger btn-lg"> Update Serial </button>
	</form>
</div>

<br><br>
<span style="color:black"> Just wait. Click only once.</span> 
<div id="demo"> </div>
<br><br><br><br><br><br>
</body>
</html>
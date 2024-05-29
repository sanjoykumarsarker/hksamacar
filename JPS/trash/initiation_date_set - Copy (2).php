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
<title>
 
</title>
</head>
<style>
.fa{
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



.fa:hover{
		float:right;
		background-color: Transparent;
        background-repeat:no-repeat;
        border: none;
        cursor:pointer;
		color:red;
}

.class2{
            background-color: Transparent;
            background-repeat:no-repeat;
            border: none;
            cursor:pointer;
            overflow: hidden;

        }
		</style>
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
	 }
//var effectData = document.getElementById("effects-list").getElementsByTagName("li")[0];	
</script>
<script>
$(document).ready(function(){
    $('ol#ilist li button     ').click(function(){
       
 

	   $(this).css("background-color", "#0022ff");
	   $(this).css("color", "#ffffff");
	   
	   
	    S
	   
    });
});



 
 
</script>
<script>
$(document).ready(function(){
$( ".subcl" ).click(function() {
	 
  $(   ".class2" ).trigger("click");
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
    $('#all        ').click(function(){
       
 
 
 
 

var optionTexts = [];
$("ol#myList li").each(function() {

	optionTexts.push($(this).attr('id'))



	});

 
var request = $.ajax({
  url: "test.php",
  method: "POST",
  data: { myData : JSON.stringify(optionTexts) },
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
 
<body>



<style>
 
</style>


 <div  class="col-sm-4">

 

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


$arr = array('Dhaka','Barisal','Chittagong','Khulna','Mymensingh','Rajshahi','Rangpur','Sylhet');
foreach ($arr as $div) {
$sqld = "SELECT tname,tregid FROM tmpl where t_div ='".$div."' ";
$resultd = $conn->query($sqld);
 

$myArrayd=array();

if ($resultd->num_rows > 0) {
    echo "  $div  <ol id='ilist' class='clist'> ";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
		
 
 	$name= $row["tname"];
	
	$tregid= $row["tregid"];
	
 $iii= $row["tregid"];
 
   // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
	
	echo "<li  id='$tregid' >  <button   class='class2' id='$name' value='$tregid' onclick='func(this.id,this.value)'>$name</button></li>";
   
 
	
 //echo "</table>";	 
	
	
}  

echo "</ol> ";
}

}
$conn->close();
?> 

</div>

 <div  class="col-sm-4">

<ol id="myList" class="class1">
   
</ul> 

</div>

 <div  class="col-sm-4">
 <form>
 <input id ="all" type="submit" value="show all"  
 
  </form>
  
  <p id="demo"></p>
 </div>
</body>
 
</html>
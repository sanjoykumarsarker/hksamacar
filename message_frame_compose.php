<?php

session_start();
  
 if($_POST['to']!=null && $_POST['to']!="" && !empty($_POST['to']) && isset($_POST['to'])){
 $_SESSION['to']= $_POST['to'];
 
 }

 if($_POST['from']!=null && $_POST['from']!="" && !empty($_POST['from']) && isset($_POST['from'])){
 $_SESSION['from']= $_POST['from'];
 
 } 
include 'function.php';
 
 
  message_status_update($_SESSION['from'],$_SESSION['to']);
?>
 
 
 
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 
<style>
body{
	background-color:transparent;
	
}
.input-group-addon {
	
	min-width:80px;
	background-color: whitesmoke;
    text-align:left;

}
.marginRow {
     margin:0px ; 
   }
   
.tbutton {
	background-color: Transparent;
	border: none;
    background-repeat:no-repeat;
    cursor:pointer;
    overflow: hidden;
	text-align: left;
    outline:none;
	color:black;
}




 	
 
.modal-content.ui-resizable {
  overflow-y: hidden;
  position: static;
}

.modal-content{
	background:#fff0e5;
	
}

.mytext{
    border:0;padding:10px;background:#FEFEFE;
}
.mytext1{
    border:0;padding:10px;background:#FEFEFE; opacity: 0.8;
}


.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom: 5px;line-height: 18px;font-size: 15px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    color:white; float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:#ef1c1c;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#fff0e5;
    height:450px;
    overflow-y:hidden;
    padding:0;
}
.frame1{
    background:#b70707;
    height:450px;
    overflow-y:auto;
    padding:0;
}

.frame > div:last-of-type{
    position:absolute;bottom:5px;width:100%;display:flex;
}
ul#chat {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:32px;
    display:flex;
    flex-direction: column;
}

ul#user {
    width:100%;
    padding:5px;
    bottom:10px;
}

#user li{
	height:45px;
	vertical-align: middle;
}

#user li:hover{
	background-color: rgba(255, 255, 255, 0.5); 
	opacity: 0.8;
	cursor: pointer;
}



.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: #ef1c1c transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}   




.fontAwesome {
  font-family: 'Helvetica', FontAwesome, sans-serif;
}

 
 </style>
   	 <script>
	 
	 $('#myform').submit(function(event){
		 $('#input1').text()="";
  
});
 
	 var to = "<?php echo $_SESSION['to'];?>" ;
var id_from = "<?php echo $_SESSION['from'];?>" ;
 
 
 //  document.getElementById("myframe_data").innerHTML ="";
	 aaa();
      
 
 
 
   function aaa(){
 
 setTimeout(
        function(){  

$(document).ready(function(){
  
       



 var mmm=document.getElementById("myframe_data").innerHTML;

var request = $.ajax({
  url: "message_frame_compose_data.php",
  method: "POST",
  data: { to : JSON.stringify(to),id_from : JSON.stringify(id_from)},
  dataType: "html"
});
request.done(function( msg ) {
	  var n1=document.getElementById("none").innerHTML;

	 document.getElementById("none").innerHTML=msg;
	var n2=document.getElementById("none").innerHTML;
	 var msg1=document.getElementById("myframe_data").innerHTML;
	//document.getElementById("myframe_data").innerHTML =msg;
	 if(n1!=n2){
  document.getElementById('myframe_data').innerHTML =msg;
 
  var chatHistory = document.getElementById("myframe_data");
 chatHistory.scrollTop = chatHistory.scrollHeight;

	 }
	 
	   
	 
	 

});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});  







 








 
});
		
            var d = new Date();
    var n = d.getTime();
	
 
   
 
        
 
  
  
 //  $("#myframe_data").scrollTop($("#myframe_data")[0].scrollHeight);  
  aaa();
       }, 3000);
    }
 
  
</script>

<div  id="none" style="display:none">

</div>
 
 
  <div id="myframe_data"  style= "padding-bottom:100px; padding-bottom: 100px; width:100%; height:100% ;overflow-y:scroll">

</div>

 
<div   style="background-color:#fff0e5; overflow-x:hidden; " >
			<iframe name="myframe1" width="0px" height="0px" frameborder="0"> </iframe>
			
                <div style="margin:auto; ">                        
                    <div style="position: fixed; top: 400px; left: 1px; background-color:#fff0e5; width:320px; height:100px;  ">
					
					<form id="myform"  target="myframe1" method="post" action="message_compose_data.php">
						<input type="hidden" name="to" value="<?php echo $_SESSION['to'];?>"/>
						<input type="hidden" name="from" value="<?php echo $_SESSION['from'];?>" />
  					
					<div style="display:inline-block">
						<input id="input1" id="cb"  class='form-control' style="width:250px;" type="text" name="body" placeholder="Type a message" required  />
						</div>
					<div style="display:inline-block">
						<button id="cbb" class="btn btn-default" type="submit">Send</button>
						</div>
					</form>
                    </div> 
                </div>
</div> 

<script>
$(document).ready(function(){
    $("#cbb").click(function(){
		
		
		setTimeout(function(){
   $(":text").val("");
}, 100);
      
    });
});
</script>
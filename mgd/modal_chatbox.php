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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
 
<title>Chatbox</title>
	
<style>
.modal-content.ui-resizable {
  overflow-y: scroll;
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
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
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
    overflow-y:auto;
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
$('.modal-content').resizable({
  alsoResize: "#myModal",
  //minHeight: 150
});
$('#myModal').draggable();

$('#myModal').on('show.bs.modal', function () {
       $(this).css({
              //width:'auto', //probably not needed
              //height:'auto', //probably not needed 
             // 'max-height':'100%'
       });
});

</script>
<script>
var me = {};

var you = {};

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time = 0){
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "me"){
        
        control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"></div>' +                                
                  '</li>';
    }
    setTimeout(
        function(){                        
            $("ul#chat").append(control);

        }, time);
    
}

function resetChat(){
    $("ul#chat").empty();
}

$(".mytext").on("keyup", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);              
            $(this).val('');
        }
    }
});

//-- Clear Chat
resetChat();

//-- Print Messages
insertChat("me", "Hello Tom...", 0);  
insertChat("you", "Hi, Pablo", 1500);
insertChat("me", "What would you like to talk about today?", 3500);
insertChat("you", "Tell me a jokeTell me a jokeTell me a jokeTell me a jokeTell me a jokeTell me a jokeTell me a jokeTell me a joke",7000);
insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 9500);
insertChat("you", "LOL", 12000);
insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 15000);
insertChat("you", "LOL", 18000);
insertChat("me", "Spaceman: Computer! Computer! Do we bring battery?!", 21000);
insertChat("you", "LOL", 25000);


//-- NOTE: No use time on insertChat.

</script>

<body>

<div class="container" >
<div style="text-align: right; float:right; margin-top:50px;">
<button type="button" class="btn btn-info btn-lg" 
data-toggle="modal" data-target="#myModal">Open Chatbox</button></div>

  <div class="modal fade autoModal" id="myModal" role="dialog" aria-labelledby="myModalLabel" style="background-color: transparent;" 
  data-backdrop="false" data-keyboard="false">
  
    <div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
			<h4 style="text-align: center;"> Hare Krishna Chatbox</h4>
			<div class="row" >
			<div class="col-sm-5  frame1" >
			<br> 
				<div  >
					<input style="width: 100%;" type="text" required class="mytext1 fontAwesome" name="tname_b" placeholder="&#xf002;  Type to search">
				<hr style="color: white; margin: 0.3em auto;">
				</div>
				
				<div class="pan">
				<ul id="user">
					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>
					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>					<li style="padding-right: 10px"> 
					<div class="col-sm-3" style="margin-top: 3px;">  <img style="width:40px; height:40px; "  src="../jps/logo.png" /> </div>
					<div class="col-sm-7" style="color: white;"> Siddhidata Mukunda Das	</div>
					<div class="col-sm-2" style="color: white; margin-top: 8px;"><i class="fa fa-cog fa-spin fa-2x fa-fw"></i> </div>
					</li>
				
				
				</ul>
				</div>
				</div>
			<div class="col-sm-7  frame">
            <ul id="chat"></ul>
            <div>
                <div class="msj-rta macro" style="margin:auto">                        
                    <div class="text text-r" style="background-color: #FEFEFE !important">
                        <input class="mytext" placeholder="Type a message"/>
                    </div> 
                </div>
            </div>
			</div>
			</div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<div style="text-align: right; float:right; margin-top:500px;">
<button type="button" class="btn btn-info btn-lg" >Open Chatbox</button></div>

</div>







</body>

</head>
</html>
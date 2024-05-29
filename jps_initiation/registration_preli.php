

<?php

session_start();
include 'function.php';

include 'function_registration.php';
  $_SESSION['nnn']=111;
 echo $ti=$_POST['registration_temple_id'];
 
  $id=$_POST['id'];
  $pw=$_POST['password'];
  $permission=getPermission($id,$pw);
  $permis_val=explode(" ",$permission);

 
  $temple_name=temple_id_to_temple_name($ti);

$id_val=getId($id,$pw);

if(isset($id_val)&&$id_val!=null &&$id_val!=''){
$_SESSION['operator_id']=$id_val;

}
if($cd!=null && $cd!="" && $_SESSION['seccode']!=null && $_SESSION['seccode']!="" && $cd==$_SESSION['seccode'])
{
	echo "You are trying more entry";
}
else  {  
	
$flag1=0;
foreach($permis_val as $i){
 
if($i==$ti){
$flag1=1;	
}
if($i=="1866"){
$flag1=1;	
}

	
}


if($permis_val==null||$permis_val==""||$flag1==0){
	
//header("Location: regsignup.php"); /* Redirect browser */
//exit();

}
else

{
	$md5val=md5($permission);
	$_SESSION['seccode']=$md5val;	
	$GLOBALS['seccode']=$md5val;

echo "First Entry";
$_SESSION['strg']=$_POST['registration_temple_id'];
 
$_SESSION['id']=$_POST['id'];
$_SESSION['id_val']=$id_val;	
}
}


 $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
     
//setConnectionTime($_SESSION['id_val'],$ipaddress);
?>
<script type="text/javascript">
  
 function similar_devotee(){




alert("ooo");

                //document.getElementById("modalbody2").innerHTML = "kkkkkkkkkkkkkkk";

 var ename=   document.getElementById("ename").value ;
  var fname=   document.getElementById("fname").value ;

 var mname=   document.getElementById("mname").value ;

 var photo_id=   document.getElementById("photo_id").value ;

 var dob=   document.getElementById("dob").value ;
 var phone=   document.getElementById("phone").value ;


//var str=[ename,fname,mname,dob,phone];
var val2="ppp"
 if (value2.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "index.php?q="+value2, true);
        xmlhttp.send();
    } 
   

}



</script>
<?php session_start();?>
<!DOCTYPE html>

<html>
 
<head>  
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<title>
Registration
</title>
</head>
<style>


.input-group-addon {	
	min-width:120px;
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
 #chat_button{
	 
	 float:right;
	 cursor:pointer;
 
	 height:5%;
	  width:15%;
	  
    position: fixed;
    bottom: 0;
    right: 0;
  }

 
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
    padding:0;
}
.frame1{
    background:#b70707;
    height:450px;
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

#chat{
   
   overflow-y: scroll;
 }
 
 
  </style>
 
 
 <script>
 $(window).load(function ()
{
    setTimeout(function ()
    {
        var $contents = $('#id_myframe_chat').contents();
        $contents.scrollTop($contents.height());
    }, 2000); // ms = 3 sec
});
</script>
 
 
   	 <script>
	 
	 var id_val = "<?php echo $_SESSION['id_val'];?>" ;
 
 
 
 //  document.getElementById("message_count").innerHTML ="";
	 aaa();
       
   function aaa(){
 
 setTimeout(
        function(){  

$(document).ready(function(){
  

var request = $.ajax({
  url: "message_status_data.php",
  method: "POST",
  data: { id_val : JSON.stringify(id_val) },
  dataType: "html"
});
request.done(function( msg ) {
	//var msg=document.getElementById("message_count").innerHTML;
	document.getElementById("message_count").innerHTML =msg;
 
	
});
request.fail(function( jqXHR, textStatus ) {
  //alert( "Request failed: " + textStatus );
});  

});
		
            var d = new Date();
    var n = d.getTime();
  
   //$("#message_count").scrollTop($("#message_count")[0].scrollHeight);  
  aaa();
       }, 10000);
    }
 
  
</script>
 
	 
	 
	

<body>


<!-- The Modal -->
  <div class="modal fade" id="modal_body">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>

          <p id="modalbody2"></p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modalbody">
         </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>












        </div>
        
    
        



      </div>
    </div>
  </div>

							<div  id="chat_button"  >
							
							<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal"><span id="message_count" style="background-color:red;border-radius: 20px 20px 20px 20px;"></span>ইষ্ট গোষ্ঠী </button>
							</div>
                     

<p id="id7"></p>

  <div class="modal fade autoModal" id="myModal" role="dialog" aria-labelledby="myModalLabel" style="background-color: transparent;" 
  data-backdrop="false" data-keyboard="false">
  
    <div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
			<h4 style="text-align: center;"> Hare Krishna Chatbox</h4>
			<p id="message_frame"> </p>
			
			<div class="row" >
				<div class="col-sm-5  frame1" >
					<hr style="color: #00ffffff; margin: 0.3em auto;">
					<div>
					<input style="width: 100%;" type="text" required class="mytext1 fontAwesome" name="tname_b" placeholder="&#xf002;  Type to search">
					<hr style="color: white; margin: 0.3em auto;">
					</div>
				<div>
					<iframe src="message_frame_user.php" style="width:100%; height:390px; overflow-x:hidden; border:0px solid #ddd;"></iframe>
				</div>
				</div>
			
				<div class="col-sm-7  frame">
					<iframe id="id_myframe_chat" scrolling="no" name="myframe_chat" style="width:100%;height:440px; border:0px ; " ></iframe>
				</div>
			</div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


 


<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">			</a>
            </div>
            <!-- /.navbar-header --> 
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-2x"></i> <i class="glyphicon glyphicon-triangle-bottom"></i> </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li> <?php echo $_SESSION['id'];  ?></li>
                    </ul>
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-2x"></i> <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><form  > <button class= 'tbutton'><i class="fa fa-cog fa-spin fa-fw"></i> <?php echo   $_SESSION['id']; ?>
																				</button> </form>
												</li>
                       
                        <li class="divider"></li>
					 
 
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

 
</div>  


	
<br>

<div class="container">
  <p class="bg-danger bg-inline-block" style ="text-align: center; font-size: 40px; font-family:French Script MT;" >Harinama Initiation Registration </p>
   <p class="bg-danger bg-inline-block" style ="text-align: center; font-size: 15px; font-family:French Script MT;" > <?php echo $temple_name;?> </p>

 
</div>
<br> 

	<div class="container">
		<form role="form" id="formfield" action="registration_main.php"   method="post" class="form-horizontal" enctype="multipart/form-data"   onsubmit="return validateForm();" >
 
		<div class="container" >
	<div class="col-sm-2"> </div>
      <div class="col-sm-8">
  
  
	
	      <input  type="hidden" class="form-control" name="operator_id" value="<?php echo  $_SESSION['id_val'] ;?>" >

    <div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
     <div class="input-group">
      <span class="input-group-addon">Name: </span>
      <input id="ename" type="text" class="form-control"  id="ename" name="ename" required  placeholder="Name">
      </div>
    </div>
	</div>
    </div>
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
     <div class="input-group">
      <span class="input-group-addon">Father's Name: </span>
      <input id="ename" type="text" class="form-control" id="fname" name="fname" required  placeholder="Father's Name">
      </div>
    </div>
	</div>
    </div>
	
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
     <div class="input-group">
      <span class="input-group-addon">Mother's Name: </span>
      <input id="ename" type="text" class="form-control"  id="mname" name="mname" required  placeholder="Mother's Name">
      </div>
    </div>
	</div>
    </div>
	
	
	
	 <div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
     <div class="input-group">
      <span class="input-group-addon">Photo ID: </span>
      <input id="ename" type="text" class="form-control" id="photo_id" name="photo_id" required  placeholder="Any photo ID card number">
      </div>
    </div>
	</div>
    </div>
	
	
 	 <div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
     <div class="input-group">
      <span class="input-group-addon">Date of Birth: </span>
      <input id="ename" type="date" class="form-control" id="dob" name="dob" required  placeholder="Date of Birth">
      </div>
  </div>
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Phone:</span>
      <input id="phone" type="text"	  class="form-control" id="phone" name="phone" required placeholder="Phone">
      </div>
  </div>
	</div>
    </div>

    
      <input id="regid" type="hidden" class="form-control" name="temple_id" value="<?php echo  $ti ;?>">
  <input id="regid" type="hidden" class="form-control" name="temple_name" value="<?php echo $temple_name ;?>">

	<input id="regid" type="hidden" class="form-control" name="regid" value="<?php echo  $_SESSION['strg'] ;?>">
	<input id="regid" type="hidden" class="form-control" name="secregid" value="<?php echo  $_SESSION['seccode'];?>">

					<input type="submit" name="btn" style="width:100%" value="Submit" id="nnn"  data-toggle="modal" data-target="#modal_body"  class="btn btn-default"   onclick="similar_devotee();" />

	
 
	
	    </div>
		
<div class="col-sm-2"> </div>
</div>
   <br><br><br>
   
   
   
   
   <iframe name="similar_devotee_list" style="width:100%;height:270px; border:0px  ;"></iframe>

</div>   
 
 
  
  <!-- Modal -->
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title", style= "text-align:center;">Hare Krishna, Congratulations!</h2>
        </div>
     
        <div class="modal-footer">
	            
				<input type="submit" name="btn" value="Submit/ok" id="nnn" data-toggle="modal" data-target="#myModal" class="btn btn-default" />

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
           


         </div>
      </div>
    </div>
  </div>

	 </div>
    </div>
	
	
	   </div>
	   
	   </form>
 
 </div>

  <div   style=  " display:none">

 
  </div>
  
  
  
  
 </body>
<script>
$('#submitBtn').click(function() {
	
     $('#bname1').text($('#bname').val());
     $('#ename1').text($('#ename').val());
     $('#age1').text($('#age').val());
     $('#address1').text($('#address').val());
     $('#phone1').text($('#phone').val());
     $('#service1').text($('#service').val());
     $('#gender1').text($('input[name=gender]:checked').val());
	 $('#education1').text($('input[name=education]:checked').val());
	 $('#mstatus1').text($('input[name=mstatus]:checked').val());
	 $('#nprefer1').text($('input[name=nprefer]:checked').val());
});

$('#submit').click(function(){
     $('#nnn').submit();
    $('#formfield').submit();
});
</script>

  <div="txtHint"></div>
 
 </body>
 </html>
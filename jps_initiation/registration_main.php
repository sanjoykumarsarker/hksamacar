

<?php

session_start();
include 'function.php';
  $_SESSION['nnn']=111;
$ti=$_POST['strg'];
 
echo $photo_id=$_POST['photo_id'];

echo $ename=$_POST['ename'];
 echo $dob=$_POST['dob'];
echo $fname=$_POST['fname']; 
echo $mname=$_POST['mname']; 
echo $phone=$_POST['phone']; 
echo $pw=$_POST['password'];
$cd=$_POST['code'];
$permission=getPermission($id,$pw);
 $permis_val=explode(" ",$permission);

 echo $temple_id=$_POST['temple_id'];


 $temple_name=$_POST['temple_name'];
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
	
header("Location: regsignup.php"); /* Redirect browser */
exit();

}
else

{
	$md5val=md5($permission);
	$_SESSION['seccode']=$md5val;	
	$GLOBALS['seccode']=$md5val;

echo "First Entry";
$_SESSION['strg']=$_POST['strg'];
 
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
	min-width:150px;
	background-color: whitesmoke;
    text-align:left;
}

.input-group-addon1 {	
	min-width:100px;
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

 

 var currentValue = 0;
 function handledb(vvv){
	 if(vvv.value=="DB"||vvv.value=="DDB"){
document.getElementById('neutral').style.display = 'none';
	 } 
	else {
document.getElementById('neutral').style.display = 'block';
	 } 
	 
 }
function handleClick(myRadio) {
	if(myRadio.value=="Female"){
	document.getElementById("DB").disabled=true;
	document.getElementById("DA").disabled=true;

	
	
		document.getElementById("DDB").disabled=false;
	document.getElementById("DDA").disabled=false;
	document.getElementById("DDD").disabled=false;
	document.getElementById("DDW").disabled=false;
 
	}
	
	if(myRadio.value=="Male"){
	document.getElementById("DDB").disabled=true;
	document.getElementById("DDA").disabled=true;
	document.getElementById("DDD").disabled=true;
	document.getElementById("DDW").disabled=true;

 
 
 	document.getElementById("DB").disabled=false;
	document.getElementById("DA").disabled=false;
	}
	
	
 }
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
					<input style="width: 100%;" type="text"  class="mytext1 fontAwesome" name="tname_b" placeholder="&#xf002;  Type to search">
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
                        <li>
							<form target='show_all__iframe' action='devshow.php' method='GET'><button class= 'tbutton' name='g' type='submit' value= "<?php echo $_SESSION['strg'];?>" >
							<i class="fa fa-print fa-fw"></i> Show All</button> </form>
                        </li>
                        <li class="divider"></li>
					 
                        <li><form  method="post" action="logout.php" > <input type="hidden" name="logout" value="regsignup.php"><button class= 'tbutton'> <i class="fa fa-sign-out fa-fw"></i> Logout </button> </form> </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

 
</div>  


	
<br>

<div class="container">
  <p class="bg-danger bg-inline-block" style ="text-align: center; font-size: 40px; font-family:French Script MT;" >Harinama Initiation Registration </p>
   <p class="bg-danger bg-inline-block" style ="text-align: center; font-size: 20px; font-family:French Script MT;" ><?php
echo $temple_name;

   ?> </p>
</div>
<br> 




	
	
	
	
	
	
	<div class="container"> 

		<form  role="form" id="formfield" action="registration_data.php" method="post" class="form-horizontal" enctype="multipart/form-data"   onsubmit="return validateForm();" >
	
<div class="col-sm-12" style="background-color:#dddddd">
<h3 style="background-color:orange">Personal Details:</h3>
<div>
 

		<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Name:  </span>
      <input id="address" type="text" class="form-control" name="ename" value="<?php echo $ename?>"  placeholder="">
      </div>
    </div>

	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Native Name:  </span>
      <input id="address" type="text" class="form-control" name="nname"   placeholder="Native Name">
      </div>
    </div>
	</div>
    </div>

	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Father's Name:  </span>
      <input id="address" type="text" class="form-control" name="fname" value="<?php echo $fname;?>"   placeholder="">

      <input id="address" type="hidden" class="form-control" name="temple_id" value="<?php echo $temple_id;?>"   placeholder="">
      </div>
    </div>
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Mother's Name:  </span>
      <input id="address" type="text" class="form-control" name="mname" value="<?php echo $mname;?>"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	

	<div class="form-group">
	<div class="row">
	
 <div class="col-lg-4">
     <div class="input-group">
      <span class="input-group-addon">Date of Birth: </span>
      <input id="ename" type="date" class="form-control" name="dob" value="<?php echo $dob;?>"   placeholder="Date of Birth">
      </div>
  </div>
  
  
   <div class="col-lg-2">
	<label class="control-label  "   for="ename">Gender:</label>
	 
	<label class="radio-inline">
      <input type="radio" name="gender" value="Male" onclick="handleClick(this);"  >
	  <img 
    src="micon.png" 
    alt="Male" style="width:15px;height:25px;"/>
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Female" onclick="handleClick(this);">
	  <img 
    src="ficon.png" 
    alt="Female" style="width:15px;height:25px;" />
    </label>
	</div>
	
<div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Education:  </span>
      <input id="address" type="text" class="form-control" name="education"   placeholder="">
      </div>
    </div>
		
	</div>
    </div>
	
		
 
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Devotional Service:  </span>
      <input id="address" type="text" class="form-control" name="devotional_service"   placeholder="">
      </div>
    </div>
	 
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Occupation:  </span>
      <input id="address" type="text" class="form-control" name="occupation"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	
	
	
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Nationality:  </span>
      <input id="address" type="text" class="form-control" name="nationality"   placeholder="">
      </div>
    </div>
	 
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Blood Group:  </span>
      <input id="address" type="text" class="form-control" name="blood_group"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Phone(1):  </span>
      <input id="address" type="text" class="form-control" name="phone1" value="<?php echo $phone;?>"   placeholder="">
      </div>
    </div>
	 
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Phone(2):  </span>
      <input id="address" type="text" class="form-control" name="phone2"   placeholder="">
      </div>
    </div>
	</div>
    </div>

	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Photo ID:  </span>
      <input id="address" type="text" class="form-control" name="photo_id" value="<?php echo $photo_id; ?>"  placeholder="">
      </div>
    </div>
	 
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Email:  </span>
      <input id="address" type="text" class="form-control" name="email"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	
	
	
	
</div>


</div>

    
	
	
 

  <div class="col-sm-6" style="background-color:#ffdddd">
<h3 style="background-color:orange">Present Address:</h3>
<div>
 
	 
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">House/Village:  </span>
      <input id="address" type="text" class="form-control" name="present_house"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	
	
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Post Office:  </span>
      <input id="address" type="text" class="form-control" name="present_postoffice"   placeholder="">
      </div>
    </div>

	<div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Post Code:  </span>
      <input id="address" type="text" class="form-control" name="present_postcode"   placeholder="">
      </div>
    </div>
 
	</div>
    </div>
	
	
	<div class="form-group">
	<div class="row">

	 <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Police Station:  </span>
      <input id="address" type="text" class="form-control" name="present_policestation"   placeholder="">
      </div>
    </div>

  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">District:  </span>
      <input id="address" type="text" class="form-control" name="present_district"   placeholder="">
      </div>
    </div>
	

	</div>
    </div>
	
	
	
	<div class="form-group">
	<div class="row">


	  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Province:  </span>
      <input id="address" type="text" class="form-control" name="present_province"   placeholder="Province/State/Division">
      </div>
    </div>


  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Country:  </span>
      <input id="address" type="text" class="form-control" name="present_country"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	 
</div>


</div>

<div class="col-sm-6" style="background-color:#bbddff">
<h3 style="background-color:orange">Permanent Address:</h3>
<div>
<div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">House/Village:  </span>
      <input id="address" type="text" class="form-control" name="permanent_house"   placeholder="">
      </div>
    </div>
	</div>
    </div>
	
	
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Post Office:  </span>
      <input id="address" type="text" class="form-control" name="permanent_postoffice"   placeholder="">
      </div>
    </div>

	
   <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Post Code:  </span>
      <input id="address" type="text" class="form-control" name="permanent_postcode"   placeholder="">
      </div>
    </div>

	</div>
    </div>
	
	
	<div class="form-group">
	<div class="row">
	  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Police Station:  </span>
      <input id="address" type="text" class="form-control" name="permanent_policestation"   placeholder="">
      </div>
    </div>
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">District:  </span>
      <input id="address" type="text" class="form-control" name="permanent_district"   placeholder="">
      </div>
    </div>
	
 
	</div>
    </div>
	
	<div class="form-group">
	<div class="row">
	 <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Province:  </span>
      <input id="address" type="text" class="form-control" name="permanent_province"   placeholder="Province/State/Division">
      </div>
    </div>
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon input-group-addon1">Country:  </span>
      <input id="address" type="text" class="form-control" name="permanent_country"   placeholder="">
      </div>
    </div>
	</div>
    </div>

</div>


</div>




<div class="col-sm-12" style="background-color:#dddddd">
<h3 style="background-color:orange">Marital Details:</h3>
	
	<div class="form-group">
	<div class="row">
	<div class="col-lg-8">
<label class="control-label "  for="ename">Marital Status:</label>
	<label >
    </label>
	<label class="radio-inline">
      <input type="radio" name="marital_status" value="DB" id="DB" onclick="handledb(this);"  >DB
    </label>
    <label class="radio-inline">
      <input type="radio" name="marital_status" value="DA" id="DA" onclick="handledb(this);">DA
    </label>
    <label class="radio-inline">
      <input type="radio" name="marital_status" value="DDB" id="DDB" onclick="handledb(this);">DDB
    </label>
	 <label class="radio-inline">
      <input type="radio" name="marital_status" value="DDA" id="DDA" onclick="handledb(this);">DDA
    </label>
	 <label class="radio-inline">
      <input type="radio" name="marital_status" value="DDD" id="DDD" onclick="handledb(this);">DDD
    </label>
	 <label class="radio-inline">
      <input type="radio" name="marital_status" value="DDW"id="DDW" onclick="handledb(this);">DDW
    </label>
	</div>
	</div>
	</div>
	
	<div id="neutral">
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-8">
      <div class="input-group">
      <span class="input-group-addon">Spouse's Name:  </span>
      <input id="address" type="text" class="form-control" name="spouse_name"   placeholder="">
      </div>
  </div>
  <div class="col-lg-4">
    <label class="control-label "  for="ename">KC Status:</label>
	<label class="radio-inline">
      <input type="radio" name="spouse_kc_status" value="initiated"   >Initiated
    </label>
    <label class="radio-inline">
      <input type="radio" name="spouse_kc_status" value="sheltered">Sheltered
    </label>
    <label class="radio-inline">
      <input type="radio" name="spouse_kc_status" value="na">NA
    </label>

	</div>
  </div>
	</div>
    
		<div class="form-group">
	<div class="row">
	
  <div class="col-lg-12">
      <div class="input-group">
      <span class="input-group-addon">Children Name & Age:  </span>
      <input id="address" type="text" class="form-control" name="children_details"   placeholder="">
      </div>
    </div>
	</div>
    </div>

</div>

</div>



<div class="col-sm-12" style="background-color:#bbbbff">
<h3 style="background-color:orange">Spiritual Details:</h3>

	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-5">
	<label class="control-label"  for="ename">Are You a son/daughter of ISKCON Devotee:</label>
 	<label class="radio-inline">
    <input type="radio" name="iskcon_family" value="yes"   >Yes
    </label>
    <label class="radio-inline">
      <input type="radio" name="iskcon_family" value="no">No
    </label>
	</div>
	<div class="col-lg-7">
	  <div class="form-inline">
      <label >Devotee Relative:  </label>
      <input id="address" type="text" style="width: 80%;" class="form-control" name="dovotee_relative"   placeholder="">
      </div>
	</div>
    </div>
	</div>
	
	<div class="form-group">
	<div class="row">
	
	<div class="col-lg-3">
	
	<label class="control-label"  for="ename">Living in Temple?</label>
 
	<label class="radio-inline">
      <input type="radio" name="temple_living" value="yes"   >Yes
    </label>
    <label class="radio-inline">
      <input type="radio" name="temple_living" value="DA">No
    </label>
	</div>
	
	<div class="col-lg-4">
	<label class="control-label "  for="ename">Member of:</label>
 
	<label class="checkbox-inline">
      <input type="checkbox" name="is_namhatta" value="namhatta"   >Namhatta
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="is_bhaktivriksa" value="bhaktivriksa">BhaktiVriksa
    </label>
	</div>
	
	<div class="col-lg-5">
		  <div class="form-inline">
      <label for="temple_cn" >Related Temple: </label>
      <input id="address" type="text" style="width: 75%;" class="form-control" name="related_temple"   placeholder="">
      </div>
	</div>
	 
    </div>
	</div>

	<div class="form-group">
	<div class="row">
	  <div class="col-lg-6">
      <div class="form-inline">
      <label>Connected with KC for: </label>
      <input id="address" style="width: 10%;"type="text" class="form-control"
	  name="kc_connect_year"   placeholder="Year">
	  <input id="address" style="width: 15%;" type="text" class="form-control"
	  name="kc_connect_month"   placeholder="Month">
      </div>
    </div>
	
  <div class="col-lg-6">
      <div class="form-inline">
      <label>Chant Hare Krishna Mahamantra for: </label>
      <input id="address" style="width: 10%;"type="text" class="form-control"
	  name="chant_hk_year"   placeholder="Year">
	  <input id="address" style="width: 15%;" type="text" class="form-control"
	  name="chant_hk_month"   placeholder="Month">
      </div>
    </div>
	</div>
    </div>

	<div class="form-group">
	<div class="row">
	
	<div class="col-lg-6">
      <div class="form-inline">
      <label>Chant 16/More rounds for: </label>
      <input id="address" style="width: 10%;"type="text" class="form-control"
	  name="sixteen_round_year"   placeholder="Year">
	  <input id="address" style="width: 15%;" type="text" class="form-control"
	  name="sixteen_round_month"   placeholder="Month">
      </div>
    </div>
	
  <div class="col-lg-6">
      <div class="form-inline">
      <label>Maintain Four Principles for:  </label>
      <input id="address" style="width: 10%;"type="text" class="form-control"
	  name="four_prin_year"   placeholder="Year">
	  <input id="address" style="width: 15%;" type="text" class="form-control"
	  name="four_prin_month"   placeholder="Month"></div>
    </div>
	
	</div>
    </div>
	
	<div class="form-group">
	<div class="row">
	
 <div class="col-lg-6">
     <div class="input-group">
      <span class="input-group-addon">Date of Shelter: </span>
      <input id="ename" type="date" class="form-control" name="shelter_date"   placeholder="Date of Birth">
      </div>
  </div>
  
	
	
	
	 <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Place of Shelter:  </span>
      <input id="address" type="text" class="form-control" name="shelter_place"   placeholder="">
      </div>
    </div>
	</div>
    </div>

	
	<div class="form-group">
	<div class="row">
	
 <div class="col-lg-12">
     <div class="input-group">
      <span class="input-group-addon">Shiksaguru Name: </span>
      <input id="ename" type="text" class="form-control" name="shiksaguru_name"   placeholder=" ">
      </div>
  </div>
  
  </div>
  </div>
	

	
	
	<div class="form-group">
	<div class="row">
	
		 <div class="col-lg-6">
     <div class="input-group">
      <span class="input-group-addon"> Name of Guiding Devotee: </span>
      <input id="ename" type="text" class="form-control" name="guiding_dev_name"   placeholder=" ">
      </div>
  </div>
	
 <div class="col-lg-6">
     <div class="input-group">
      <span class="input-group-addon">Phone (Guiding Devotee): </span>
      <input id="ename" type="text" class="form-control" name="guiding_dev_phone"   placeholder=" ">
      </div>
  </div>
	
	 </div>
  </div>
	

		
</div>
	
	
<div class="col-sm-12" style="background-color:#dddddd">
<h3 style="background-color:orange">Initiation Details:</h3>
	<br>
	<div class="form-group">
	<div class="row">
	<div class="col-lg-8">
	
	<label class="control-label  "  for="ename">Name Preference:</label>
	<label class="radio-inline">
      <input type="radio" name="name_prefer" value="krishna"  autofocus>Krishna
    </label>
    <label class="radio-inline">
      <input type="radio" name="name_prefer" value="gaura">Gaura
    </label>
    <label class="radio-inline">
      <input type="radio" name="name_prefer" value="rama">Rama
    </label>
	<label class="radio-inline">
      <input type="radio" name="name_prefer" value="any">Any
    </label>
	</div>
	</div>
	</div>
	
		<div class="form-group">
	<div class="row">
	<div class="col-lg-12">
	
	<label class="control-label  "  for="ename">Checklist:</label>
	<br><br>

	<label class="checkbox-inline">
      <input type="checkbox" name="recommendation_sheet" value="recommendation_sheet"  autofocus checked>Recommendation Sheet 
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="biodata"  value="biodata" checked>Biodata
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="practical_checklist"   value="practical_checklist"checked>Practical Check list
    </label>
	<label class="checkbox-inline">
      <input type="checkbox" name="philosophocal_test" value="philosophocal_test" checked>Philosophical Test
    </label>
	<label class="checkbox-inline">
      <input type="checkbox" name="personal_questionnaire" value="personal_questionnaire" checked >Personal Questionnaire
    </label>
	<label class="checkbox-inline">
      <input type="checkbox" name="essay" value="essay" checked >Essay
    </label>
	<br><br>
	<label class="checkbox-inline">
      <input type="checkbox" name="initiation_oath" value="initiation_oath" checked>Initiation Oath
    </label>
	<label class="checkbox-inline">
      <input type="checkbox" name="interview_appearance" value="interview_appearance"checked>Interview appearance 
    </label>
	<label class="checkbox-inline">
      <input type="checkbox" name="idc_certificate" value="idc_certificate" checked>ISKCON DISCIPLES’ COURSE certificate
    </label>
	</div>
	</div>
	</div>
	
	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Examiner's Name:  </span>
      <input id="address" type="text" class="form-control" name="examiner_name"   placeholder="">
      </div>
  </div>
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Examiner's Phone:  </span>
      <input id="address" type="text" class="form-control" name="examiner_phone"   placeholder="">
      </div>
  </div>


	</div>
	</div>
	
		<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Recommended By:  </span>
      <input id="address" type="text" class="form-control" name="recommended_by"   placeholder="">
      </div>
  </div>
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Designation:  </span>
      <input id="address" type="text" class="form-control" name="recommend_designation"   placeholder="">
      </div>
  </div>


	</div>
	</div>
    

	

	<div class="form-group">
	<div class="row">
	
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Witness (1):  </span>
      <input id="address" type="text" class="form-control" name="witness1"   placeholder="">
      </div>
  </div>
  <div class="col-lg-6">
      <div class="input-group">
      <span class="input-group-addon">Witness (2):  </span>
      <input id="address" type="text" class="form-control" name="witness2"   placeholder="">
      </div>
  </div>


	</div>
	</div>	
	
	
	</div>	
	
<button type="submit" class="btn btn-success">Submit</button> 

	</form>
</div>
 </div>























   <br><br><br>
  
  
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


 
 </body>
 </html>
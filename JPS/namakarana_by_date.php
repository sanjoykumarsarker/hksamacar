<?php

session_start();
include 'function.php';

include 'user_update.php';
// $_SESSION['cd']
$idate = $_POST['idate'];
if (isset($_SESSION['idn']) && isset($_SESSION['pw'])) {
    $u_name = $_SESSION['idn'];

    $id_val = getId($_SESSION['idn'], $_SESSION['pw']);

}


$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Namakarana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <style>
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
	height:20px;
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
 <style>

 table {
    width: 100%;
}

th {
	text-align: center;
    border-bottom: 1px solid #ddd;
}


td {
	text-transform: uppercase;
	padding: 1px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.tbutton {
	background-color: Transparent;
	border: none;
  background-repeat:no-repeat;
  cursor:pointer;
  overflow: hidden;
	text-align: left;
  outline:none;
	color:blue;
}

.marquee {
   width: 800px;
   margin: 0 auto;
   background:LightSalmon;
   white-space: nowrap;
   overflow: hidden;
   box-sizing: border-box;
   color:blue;
   font-size:18px;
}

.marquee span {
   display: inline-block;
   padding-left: 100%;
   text-indent: 0;
   animation: marquee 15s linear infinite;
}

.marquee span:hover {
    animation-play-state: paused
}

@keyframes marquee {
    0%   { transform: translate(0, 0); }
    100% { transform: translate(-100%, 0); }
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

	 var id_val = "<?php echo $id_val; ?>" ;



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

<h1 style="text-align:center;color:green;">  Initiation on : <?php echo $idate;?> </h1>


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
 <!--
 <div  id="chat_button"  >

							<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal"><span id="message_count" style="background-color:red;border-radius: 20px 20px 20px 20px;"></span>ইষ্ট গোষ্ঠী </button>
							</div>
 -->
<script>
function myFunction() {
    location.reload();
}




$(document).ready(function(){


		 var tid = "<?php echo $_POST['edit']; ?>";


// this will return an array with strings "1", "2", etc.



 var request = $.ajax({
  url: "print_summarylist_temple_data.php",
  method: "POST",
  data: { myData : JSON.stringify(tid)  },
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("pslist").innerHTML =msg;
});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


 var request = $.ajax({
  url: "print_prooflist_temple_data.php",
  method: "POST",
  data: { myData : JSON.stringify(tid)  },
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("proof_list").innerHTML =msg;
});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});



 var request = $.ajax({
  url: "print_topsheet_temple_data.php",
  method: "POST",
  data: { myData : JSON.stringify(tid)  },
  dataType: "html"
});
request.done(function( msg ) {
  document.getElementById("tsheet").innerHTML =msg;
});
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


});


	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

	function printDiv2(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function printDiv3(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}








</script>
<!--
<div>
<img src="header.png" style=" padding: 0px; position:fixed; z-index:100;" height="30px" width="100%">
</div>

-->
<div id="wrapper"  style=" padding-top:   0px;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"  >	Harinama Initiation		</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">


                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i> <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </a>




                    <ul class="dropdown-menu dropdown-user">
                        <li><form  > <button class= 'tbutton'><i class="fa fa-cog fa-spin fa-fw"></i> <?php echo $u_name; ?>
																				</button> </form>
												</li>

                        <li class="divider"></li>

                        <li><form  method="post" action="logout.php" >
						<input type="hidden" name="logout" value="namakarana_login.php"><button class= 'tbutton'> <i class="fa fa-sign-out fa-fw"></i> Logout </button> </form> </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>


</div>

 <br>
<div class="container-fluid" >

<div style="  background-color: cornsilk ; margin-top:  px; " >

 	<div id="" style="overflow-y: scroll; height:300px;">

<?php

 





// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
    die("Connection failed: " . $connr->connect_error);
}

$sqlr = "SELECT reg,
	ename, nchoice1,nchoice2,nchoice3,spouse_name,spouse_id,templename

	FROM reg WHERE  idate='$idate' and isinitiated!='Initiated' and result_viva='fit' and isinitiated!='Absent' ";
$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table  class='table table-bordered table-striped' >
	<tr>
	<th width= 100> Reg</th>		<th> Name</th> <th> Spouse</th><th> Temple</th>
	<th>❶ </th>	<th>❷</th>			<th>❸</th>
	</tr>";
    // output data of each row
  $in=1;
    while ($row = $resultr->fetch_assoc()) {
        $idn="var".$in;
        echo "<tr>

		<td ><form target='myframe1' action='namakarana_data_one.php' method='POST'><button id='$idn' onClick='reply_click(this.id)'class= 'tbutton' name='rid' type='submit' value=" . $row["reg"] . " >" . $row["reg"] . "</button> </form></td>
		<td  style='color:green'>" . $row["ename"] . "</td>
    <td  style='color:red'>" . $row["spouse_name"] . $row["spouse_id"]."&nbsp".ename($row["spouse_id"])."</td>
   
    <td>" . $row["templename"] . "</td>
		<td>" . $row["nchoice1"] . "</td>
		<td>" . $row["nchoice2"] . "</td>
		<td>" . $row["nchoice3"] . "</td></tr>";

        $in=$in+1;
    }
    echo "</table>";
} else {
    echo "No---Result";
}
$connr->close();
?>
</div>

		</div>



    <br><br>
 		<iframe name="myframe1" style="width:100%;height:350px; border:1px solid #ddd;"></iframe>
		<div style="display:none"> <div id="pslist" ></div> <div id="proof_list" ></div><div id="tsheet" ></div></div>

	<!--	<p class="marquee" >	<span id="dtText"></span> </p>
 		<p style= "cursor: pointer; display: inline;" > Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" >@hksamacar</a> 2017 </p>
	</div>
<script>
var today = new Date();
document.getElementById('dtText').innerHTML=today;
</script>

-->
</div>
</body>

<script type="text/javascript">

    var idn;
  function reply_click(clicked_id)
  {

    idn=clicked_id;
     // alert(clicked_id);
  }


  window.onkeydown = (evt) => {  
  switch (evt.keyCode) {  
    //ESC  
    case 27:  
      evt.preventDefault();  
      console.log("esc");  
      break;  
    //F1  
    case 112:  
      evt.preventDefault();  
      console.log("f1");  
      break;  
	    case 120:  
      evt.preventDefault();  
      var num = idn.replace(/\D/g,'');
       var  new_num=  parseInt(num)+1;
       new_id="var"+new_num;
      //console.log(" you press f9"+new_id);  
     //var prop= document.getElementById(new_id);
     //prop.submit();
     //prop.style.backgroundColor = "#FF0000"

      break;  
	  
	  
	  
    default:  
      return;  
  } 
  
 // idn=  parseInt(idn)+1;
};
  
</script>
</html>
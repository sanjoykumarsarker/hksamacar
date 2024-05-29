<?php

// include('top-cache.php'); 

// Your regular PHP code goes here
session_start();
include 'function.php';

// include 'user_update.php';
// $_SESSION['cd']

$id_val = getId($_SESSION['idnn'], $_SESSION['pwn']);

?>
<?php 
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Entry Correction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

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
	  z-index:200;
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
   background:yellow;
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


 <style>
hr { margin: 0.07em auto; }

table {
    width: 100%;
	font-size:15px;
}

th {
	text-align: center;
    border-bottom: 1px solid #ddd;

}

td {

padding: 15px;
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
	color:green;
}

.marquee {
   width: 800px;
   margin: 0 auto;
   background:yellow;
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

 <body>



<div id="wrapper"  style=" padding-top:  px;">

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


                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user  "></i> <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><form  > <button class= 'tbutton'><i class="fa fa-cog fa-spin fa-fw"></i> <?php echo $_SESSION['idnn']; ?>
																				</button> </form>
												</li>

                        <li class="divider"></li>

                        <li><form  method="post" action="logout.php" > <input type="hidden" name="logout" value="namanirnaya_login.php"><button class= 'tbutton'> <i class="fa fa-sign-out fa-fw"></i> Logout </button> </form> </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>


</div>
<div id= "row" style="padding: 10px;" >
	<div class="col-sm-12" style="background-color:; margin-top:  px; " >
		<div id="" style="overflow-y: scroll; height:700px;">

 <?php

$tid = $_POST['edit'];

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
    die("Connection failed: " . $connr->connect_error);
}

$sqlr = "SELECT tname,t_addr, t_dist from tmpl where tregid='$tid'  ";
$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {

    // output data of each row
    while ($row = $resultr->fetch_assoc()) {
        echo "<h3 style=' text-align:center;color:purple; '><u> " . $row["tname"] . ",&nbsp" . $row["t_addr"] . ",&nbsp" . $row["t_dist"] . " </u></h3>";
    }

} else {
    echo "No---Result";
}
$connr->close();

// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
    die("Connection failed: " . $connr->connect_error);
}

$sqlr = "SELECT reg,bname,ename,templename,age,address,service,gender,mstatus,nprefer,education,phone,
	recom,nchoice1,nchoice2,nchoice3,finalname,finalname_b,comments,imagename
	FROM reg WHERE  templereg='$tid' and isinitiated!='Initiated' and isinitiated!='Absent'";
$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {

    echo "<table  class='table table-bordered table-striped' >
	<tr>
	<th width= 200 >Image</th> <th>Devotee Information</th>
	</tr>";
    // output data of each row
    while ($row = $resultr->fetch_assoc()) {
        $src = "upload/" . $row["imagename"];
        if (!file_exists('upload/' . $row['imagename'])) {            
            $src = "https://via.placeholder.com/50";
        }
        echo "<tr>
		<td><img src='$src' height=200 width=180 style='border-width:15px; border-color:maroon;' ></td>
		<td><form target='_blank' action='devedit.php' method='POST'><button name='edit' class= 'tbutton' type='submit' value=" . $row["reg"] . ">Reg: " . $row["reg"] . "</button>
		</form>

			<hr>
			Name:<span style='color:red;'> " . $row["ename"] . "</span> <hr>
			 " . $row["bname"] . "   <hr>
			Address: " . $row["address"] . "  <hr>
			Phone: " . $row["phone"] . "  <hr>
		 	Gender:	" . $row["gender"] . " (<span style='color:red;'>" . $row["mstatus"] . "</span>)&nbsp &nbsp Age: " . $row["age"] . "  <hr>
			Service: " . $row["service"] . ", Education: " . $row["education"] . "<hr>
			<p> Lila: <span style='color:red;'>" . $row["nprefer"] . "</span></p>
		</td>
	</tr>";
    }
    echo "</table>";

} else {
    echo "No---Result";
}
$connr->close();
?>
		</div>
	</div>
</div>


<div style="clear:both;">
</div>



<div style= "padding: 5px; margin-top: 5px; text-align: center; " >

    <form method="post" action="enter_bangla_name.php" target="_blank" style="cursor: pointer; text-align: center; display:inline-block;" >
    <a class="btn btn-info" onclick="myFunction()"> Reload </a>
    <a class="btn btn-info" onclick="window.location= 'dataentry_dashboard.php';">Go to Dashboard</a>
    <input type="hidden" name="bbb" value="<?php echo $tid; ?>">
    <button class="btn btn-info" type="submit" value="Enter Bangla Name">Enter Bangla Name</button>
	<button class="btn btn-danger" onclick="printDiv('pslist')" value="Print Summary List">Print Summary List</button>
	<button class="btn btn-danger" onclick="printDiv2('proof_list')" value="Proof Check">Proof Check</button>
		<button class="btn btn-danger" onclick="printDiv3('tsheet')" value="Top Sheet">Top Sheet</button>

	</form>
    <form method="post" action="dataexport2.php" target="_blank" style="cursor: pointer; text-align: center; display:inline-block;" >
    <input type="hidden" id="templeid" name="templeid" value="<?php echo $tid; ?>">

    <button class="btn btn-info" onclick=" " value="Top Sheet">Export to Excel</button>

    </form>

    <br><br>
 		<iframe name="myframe1" style="width:100%;height:350px; border:1px solid #ddd;"></iframe>
		<div style="display:none"> <div id="pslist" ></div> <div id="proof_list" ></div><div id="tsheet" ></div></div>

<script>
    function myFunction() {
        location.reload();
    }

    $(document).ready(function(){
        var tid = "<?php echo $_POST['edit']; ?>";

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

</body>
</html>

<?php

// include('top-cache.php'); 

// Your regular PHP code goes here

// include('bottom-cache.php');
?>
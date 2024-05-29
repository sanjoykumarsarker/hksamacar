<?php

session_start();
include 'function.php';

include 'user_update.php';
// $_SESSION['cd']

$id_val = getId($_SESSION['idnn'], $_SESSION['pwn']);
$idate = $_POST['idate'];

?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Namanirnaya</title>
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

        min-width: 80px;
        background-color: whitesmoke;
        text-align: left;

    }

    .marginRow {
        margin: 0px;
    }

    .tbutton {
        background-color: Transparent;
        border: none;
        background-repeat: no-repeat;
        cursor: pointer;
        overflow: hidden;
        text-align: left;
        outline: none;
        color: black;

    }

    #chat_button {
        z-index: 200;
        float: right;
        cursor: pointer;

        height: 5%;
        width: 15%;

        position: fixed;
        bottom: 0;
        right: 0;
    }


    .modal-content.ui-resizable {
        overflow-y: scroll;
        position: static;
    }

    .modal-content {
        background: #fff0e5;

    }

    .mytext {
        border: 0;
        padding: 10px;
        background: #FEFEFE;
    }

    .mytext1 {
        border: 0;
        padding: 10px;
        background: #FEFEFE;
        opacity: 0.8;
    }


    .text {
        width: 75%;
        display: flex;
        flex-direction: column;
    }

    .text>p:first-of-type {
        width: 100%;
        margin-top: 0;
        margin-bottom: auto;
        line-height: 13px;
        font-size: 12px;
    }

    .text>p:last-of-type {
        width: 100%;
        text-align: right;
        color: silver;
        margin-bottom: -7px;
        margin-top: auto;
    }

    .text-l {
        float: left;
        padding-right: 10px;
    }

    .text-r {
        color: white;
        float: right;
        padding-left: 10px;
    }

    .avatar {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25%;
        float: left;
        padding-right: 10px;
    }

    .macro {
        margin-top: 5px;
        width: 85%;
        border-radius: 5px;
        padding: 5px;
        display: flex;
    }

    .msj-rta {
        float: right;
        background: #ef1c1c;
    }

    .msj {
        float: left;
        background: white;
    }

    .frame {
        background: #fff0e5;
        height: 450px;
        padding: 0;
    }

    .frame1 {
        background: #b70707;
        height: 450px;
        padding: 0;
    }

    .frame>div:last-of-type {
        position: absolute;
        bottom: 5px;
        width: 100%;
        display: flex;
    }

    ul#chat {
        width: 100%;
        list-style-type: none;
        padding: 18px;
        position: absolute;
        bottom: 32px;
        display: flex;
        flex-direction: column;
    }

    ul#user {
        width: 100%;
        padding: 5px;
        bottom: 10px;
    }

    #user li {
        height: 45px;
        vertical-align: middle;
    }

    #user li:hover {
        background-color: rgba(255, 255, 255, 0.5);
        opacity: 0.8;
        cursor: pointer;
    }


    .msj:before {
        width: 0;
        height: 0;
        content: "";
        top: -5px;
        left: -14px;
        position: relative;
        border-style: solid;
        border-width: 0 13px 13px 0;
        border-color: transparent #ffffff transparent transparent;
    }

    .msj-rta:after {
        width: 0;
        height: 0;
        content: "";
        top: -5px;
        left: 14px;
        position: relative;
        border-style: solid;
        border-width: 13px 13px 0 0;
        border-color: #ef1c1c transparent transparent transparent;
    }

    input:focus {
        outline: none;
    }

    ::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #d4d4d4;
    }

    ::-moz-placeholder {
        /* Firefox 19+ */
        color: #d4d4d4;
    }

    :-ms-input-placeholder {
        /* IE 10+ */
        color: #d4d4d4;
    }

    :-moz-placeholder {
        /* Firefox 18- */
        color: #d4d4d4;
    }




    .fontAwesome {
        font-family: 'Helvetica', FontAwesome, sans-serif;
    }

    #chat {

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
        background-repeat: no-repeat;
        cursor: pointer;
        overflow: hidden;
        text-align: left;
        outline: none;
        color: blue;
    }

    .marquee {
        width: 800px;
        margin: 0 auto;
        background: yellow;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
        color: blue;
        font-size: 18px;
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
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(-100%, 0);
        }
    }
</style>
<script>
    $(window).load(function() {
        setTimeout(function() {
            var $contents = $('#id_myframe_chat').contents();
            $contents.scrollTop($contents.height());
        }, 2000); // ms = 3 sec
    });
</script>
<script>
    var id_val = "<?php echo $id_val; ?>";



    //  document.getElementById("message_count").innerHTML ="";
    aaa();

    function aaa() {

        setTimeout(
            function() {

                $(document).ready(function() {


                    var request = $.ajax({
                        url: "message_status_data.php",
                        method: "POST",
                        data: {
                            id_val: JSON.stringify(id_val)
                        },
                        dataType: "html"
                    });
                    request.done(function(msg) {
                        //var msg=document.getElementById("message_count").innerHTML;
                        document.getElementById("message_count").innerHTML = msg;


                    });
                    request.fail(function(jqXHR, textStatus) {
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
<style>
    hr {
        margin: 0.07em auto;
    }

    table {
        width: 100%;
        font-size: 15px;
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
        background-repeat: no-repeat;
        cursor: pointer;
        overflow: hidden;
        text-align: left;
        outline: none;
        color: green;
    }

    .marquee {
        width: 800px;
        margin: 0 auto;
        background: yellow;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
        color: blue;
        font-size: 18px;
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
        0% {
            transform: translate(0, 0);
        }

        100% {
            transform: translate(-100%, 0);
        }
    }
</style>






<script>
    function myFunction() {
        location.reload();
    }


    function delete_devotee(eventId) {
        var myobj = document.getElementById(eventId);
        myobj.remove();
        alert(eventId);
    }
</script>
</script>

<body>

<h1 style="text-align:center;color:green;">  Initiation on :<?php echo $idate;?> </h1>
    <iframe name="no_iframe" width="0" height="0" scrolling="no" style="border:0"></iframe>

    <div class="modal fade autoModal" id="myModal" role="dialog" aria-labelledby="myModalLabel" style="background-color: transparent;" data-backdrop="false" data-keyboard="false">

        <div class="modal-dialog" role="document">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <h4 style="text-align: center;"> Hare Krishna Chatbox</h4>
                    <p id="message_frame"> </p>

                    <div class="row">
                        <div class="col-sm-5  frame1">
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
                            <iframe id="id_myframe_chat" scrolling="no" name="myframe_chat" style="width:100%;height:440px; border:0px ; "></iframe>
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

<div style="clear:both;">
 <img src="header.png" style="position:fixed; z-index:100;" height="100px" width="100%">

</div>
-->

    <div id="wrapper" style=" padding-top:  px;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> </a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">


                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user  "></i> <i class="glyphicon glyphicon-triangle-bottom"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <form> <button class='tbutton'><i class="fa fa-cog fa-spin fa-fw"></i> <?php echo $_SESSION['idnn']; ?>
                                </button> </form>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <form method="post" action="logout.php"> <input type="hidden" name="logout" value="namanirnaya_login.php"><button class='tbutton'> <i class="fa fa-sign-out fa-fw"></i> Logout </button> </form>
                        </li>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>


    </div>
    <div id="row" style="padding: 10px;">
        <div class="col-sm-12" style="background-color:; margin-top:  px; ">
            <div id="" style="overflow-y: scroll; height:700px;">

                <?php


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

                $sqlr = "SELECT reg,bname,ename,templename,age,address,service,gender,mstatus,nprefer,education,phone,
	recom,nchoice1,nchoice2,nchoice3,finalname,finalname_b,comments,imagename
	FROM reg WHERE  idate='$idate' and isinitiated!='Initiated' and result_viva='fit' and isinitiated!='Absent'";
                $resultr = $connr->query($sqlr);
                if ($resultr->num_rows > 0) {

                    echo "<table  class='table table-bordered table-striped' >
	<tr>
	<th width= 200 >Image</th> <th>Devotee Information</th>		<th width= 300> Choice of Name</th>
		<th> Comments</th> <th> Delete</th>
	</tr>";
                    // output data of each row
                    while ($row = $resultr->fetch_assoc()) {
                        $reg_id = $row["reg"];
                        echo "<tr  id=" . $row["reg"] . ">
		<td><img src= 'upload/" . $row["imagename"] . "' height=200 width=180 style='border-width:15px; border-color:maroon;' ></td>
		<td><form target='_blank' action='devedit.php' method='POST'><button name='edit' class= 'tbutton' type='submit' value=" . $row["reg"] . ">Reg: " . $row["reg"] ."</button>
		</form>

			<hr> <p style='color:blue' >".$row["templename"]."</p><hr>

			Name:<span style='color:red;'> " . $row["ename"] . "</span> <hr>
			 " . $row["bname"] . "   <hr>
			Address: " . $row["address"] . "  <hr>
			Phone: " . $row["phone"] . "  <hr>
		 	Gender:	" . $row["gender"] . " (<span style='color:red;'>" . $row["mstatus"] . "</span>)&nbsp &nbsp Age: " . $row["age"] . "  <hr>
			Service: " . $row["service"] . ", Education: " . $row["education"] . "<hr>
			<p> Lila: <span style='color:red;'>" . $row["nprefer"] . "</span></p>
		<td>
		<form target='" . $row["reg"] . "'action='namanirnaya_data.php' method='POST'>

		<input type='hidden' name='reg'  value='" . $row["reg"] . "'>
		 	<button class= 'tbutton' style='text-transform: uppercase' name='rid' type='submit'value='" . $row["nchoice1"] . "'>" . $row["nchoice1"] . "</button>
		<br>
			<button class= 'tbutton' style='text-transform: uppercase' name='rid' type='submit' value='" . $row["nchoice2"] . "'>" . $row["nchoice2"] . "</button>
		<br>
			<button class= 'tbutton' style='text-transform: uppercase' name='rid' type='submit' value='" . $row["nchoice3"] . "'>" . $row["nchoice3"] . "</button>
		</form>
		<h4 style='text-align:center;background-color:red; color:white; text-transform: uppercase; padding:5px;'> &#9745 &nbsp &nbsp &nbsp " . $row["finalname"] . " </h4>

		<iframe width='450' height='20' style='border:none;'  name='" . $row["reg"] . "' > </iframe>
		<h4 style='text-align:center;  text-transform: uppercase; padding:5px;'> " . $row["finalname_b"] . " </h4>
		</td>
        <td>" . $row["comments"] . " </td>
        <td> 
        <form target='no_iframe' action='devotee_delete_data.php' method='POST'>
        <input type='hidden' name='devotee_name' value=" . $row["ename"] . " >
        <button class='btn btn-danger' name='reg' onclick='delete_devotee($reg_id)';  type='submit' value=" . $row["reg"] . ">Delete</button>
        </form> 
        
        
        
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


    <div id="row" style="padding: 5px; text-align: center;">

        
        <!--
		<p class="marquee" >	<span id="dtText"></span> </p>

		<p style= "cursor: pointer; display: inline;" > Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" >@hksamacar</a> 2017 </p>
	-->

    </div>

    <script>
        var today = new Date();
        document.getElementById('dtText').innerHTML = today;

        function myFunction() {
            location.reload();
        }

        function delete_devotee(eventId) {
            //  var myobj = document.getElementById(eventId);
            //  myobj.remove();
            // alert(eventId);
        }
    </script>
</body>

</html>
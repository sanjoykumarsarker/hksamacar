<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>User Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 

    <link href="css0/main.css" rel="stylesheet">
    <link href="css0/font-style.css" rel="stylesheet">
    <link href="css0/flexslider.css" rel="stylesheet">

   
         
    <style type="text/css">
    
    body {
    padding-top: 60px;

    }

    .input-group-addon {
	
	min-width:100px;
	background-color: whitesmoke;
    text-align:left;

}
    .navbar-nav {
       margin-bottom: 5   !important;
    }

    .dropdown-submenu {
    position: relative;
    cursor: pointer;
    }

    .dropdown-submenu .dropdown-menu {
    top: 80%;
    left: 10%;
    margin-top: 5px;
    background: #666362;
    
    }

    .tbutton {
    background-color: Transparent;
    border: none;
    background-repeat:no-repeat;
    cursor:pointer;
    overflow: hidden;
    text-align: left;
    outline:none;
    color:red;
    font-size: 20px;
    }



    .form-group .userctrlbox {
    background-color: transparent;   
    border: none;
    color:white;
    margin: 0px 0px 5px 0px;
    height: 20px;
    padding: 0px 0px 0px 0px;
    }

    .form-group > label {
    color:white;
    font-size: 12px;
    margin: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
    }

    th{ 
    text-align: center;}
    
    p {margin-bottom: 0em;
       
    margin-top: 0em;}

    tr:nth-child(even) {
    background-color: ;
 }

    </style>

    <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>

<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

<script>
function myFunction() {
    location.reload();
}
</script>

  </head>
  <body onload="startTime()">
  
    <!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top" style="height: 7%;">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="indexn.php"><p style="margin-bottom: 0em;"> Harinam Initiation</p>

          <strong style="margin-top: -2em;">H.H. Jayapataka Swami Maharaj </strong></a>
        </div> 
          
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="apanel1.php"><i class="fa fa-home"></i> Home</a></li>                            
              <li><a target="_blank" href="temple_registration.php"><i class="fa fa-home"></i> Temples</a></li>
              <li><a target="_blank" href="devrecords.php"><i class="fa fa-users"></i> Devotees</a></li>
              <li class="dropdown-submenu" >
                            <a class="test"><i class="fa fa-bar-chart-o fa-fw"></i> Set Status<span class="fa fa arrow" style="color:white"></span></a>
                            <ul class="dropdown-menu">
                                <li > <a target="_blank" style="color: white; " href="set_initiation_date.php">Set Date </a></li>
                                <li > <a target="_blank" style="color: white; " href="confirm_initiated.php">Update Status</a></li>
                            </ul>
              </li>
              <li><a href="print_files.php"><i class="fa fa-print"></i> Print Files</a></li>
              <li><a href="apanel1_user.php"><i class="fa fa-user-circle-o"></i> Users</a></li>

              <li><a href="#"><i class="fa fa-sign-out"></i>Sign-out</li></a></li>
            </ul>
          </div>
        </div>
    </div>

    <div class="container">

      <!-- FIRST ROW OF BLOCKS -->     
      <div class="row" style="margin-top: 10px;">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-12 col-lg-12">
            <div class="dash-unit" style="text-align:center;">
                <dtitle style="text-align:center; font-size:15px;" >Add New User</dtitle>
                <hr>
				<form target='iframe1' enctype="multipart/form-data" action='insert_user_data.php' method='POST'>
                	<div class="form-group">
						<div class="container-fluid row">
							<div class="col-sm-6 col-lg-6">
								<div class="input-group">
								<span class="input-group-addon">Name:  </span>
								<input id="address" type="text" class="form-control" name="u_name" required  placeholder="Name">
								</div> <br>
								<div class="input-group">
								<span class="input-group-addon">Address:  </span>
								<input id="address" type="text" class="form-control" name="u_address" required  placeholder="Address">
								</div> <br>
								<div class="input-group">
								<span class="input-group-addon">Email:  </span>
								<input id="address" type="email" style="background-color: whitesmoke;" class="form-control" name="u_email" required  placeholder="Email">
								</div> <br>
								<div class="input-group">
								<span class="input-group-addon">Mobile:  </span>
								<input id="address" type="text" class="form-control" name="u_mobile" required  placeholder="Mobile">
								</div>
							</div>
							<div class="col-sm-6 col-lg-6">
								<div class="input-group">
								<span class="input-group-addon">ID:  </span>
								<input id="address" type="text" class="form-control" name="u_id" required  placeholder="ID">
								</div> <br>
								<div class="input-group">
								<span class="input-group-addon">User Name:  </span>
								<input id="address" type="text" class="form-control" name="username" required  placeholder="User Name">
								</div> <br>
								<div class="input-group">
								<span class="input-group-addon">Password:  </span>
								<input id="address" type="text" class="form-control" name="password" required  placeholder="Password">
								</div> <br>
								<div class="input-group">
								<span class="input-group-addon">Permission:  </span>
								<input id="address" type="text" class="form-control" name="permission" required  placeholder="Permission Code">
								</div>
							</div>
						</div>
							<div style="margin-top:10px;">
							<span id="upload-file-info"></span>
                            <label class="btn btn-success" for="my-file-selector"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Upload Image</label>
                                <input id="my-file-selector" type="file" style="display:none" name="myimage"
                                 onchange="$('#upload-file-info').html(this.files[0].name)" accept="image/*"  capture   />
                                         

							<button type='submit' class='btn btn-danger' >
							<i class="fa fa-user-plus" aria-hidden="true"></i> Submit</button>

                            <button onclick="myFunction()" class='btn btn-warning'>
                            <i class="fa fa-refresh" aria-hidden="true"> </i> Refresh</button>

							</div>
					</div>
				</form>
<iframe name="iframe1" border="0px" height="0px" width="0px"></iframe>
<iframe name="iframe2" border="0px" height="0px" width="0px"></iframe>
            </div>
        </div>
      </div><!-- /row -->
      
	  
	  
      <!-- SECOND ROW OF BLOCKS -->     
      <div class="row">
        <div class="col-sm-12 col-lg-12">
       <!-- MAIL BLOCK -->
            <div class="dash-unit" style="height: auto;">
            <div style="text-align:center;" >  <dtitle style="font-size:15px;" >User Info</dtitle>  </div>
             <hr>
<?php

include 'function.php';
$Flag="Inactive";
$img_id="";

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
   $sqlr = "SELECT id, user_name, password, permission, u_name, u_address, u_email, u_mobile, rgd_date,logoutby, u_img
            FROM users";
   
$resultr = $connr->query($sqlr);

if ($resultr->num_rows > 0) {
    echo "<table class='table table-bordered'>
    <tr>    <th>Personal Info</th> <th>Activity Data</th>  <th>Control Box</th> <th>Edit</th>  </tr>";
    
    // output data of each row
    while($row = $resultr->fetch_assoc())
    
    {
          
    $gt=getDiffTime($row["id"]);
	$ht=round(($gt/3600),2);


    if($gt=="" || $gt==null)
 {
     

 
 }

   
 if($gt>-1 && $gt<60)
 
    {$Flag="Active";

} else {$Flag="Inactive";}







    echo "<tr>
        <form form class='form-horizontal' target='iframe1' action='user_edit_data.php' method='POST'>
        <td width='40%'  >

        <div >

        <div class='col-sm-3' >
        <img src= 'usr_img/".$row["u_img"]."' height=90 width=90 style='border:1px solid maroon; margin: 0px 0px 0px 0px;' > </div>

        <div class='col-sm-9'>
        <div class='form-group' >
        <label class='control-label col-sm-2' for='u_name'>Name: </label>
            <div class='col-sm-10'>
            <input class='form-control userctrlbox'  type='text' name='u_name'       value='".$row["u_name"]."'> </div>
        </div>
        <div class='form-group' >
        <label class='control-label col-sm-2' for='u_address'>Address: </label>
            <div class='col-sm-10'>
            <input class='form-control userctrlbox'  type='text' name='u_address' value='".$row["u_address"]."'> </div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-2' for='u_email'>Email : </label>
            <div class='col-sm-10'>
            <input class='form-control userctrlbox'  type='text' name='u_email' value='".$row["u_email"]."'></div>
        </div>
        <div class='form-group' >
        <label class='control-label col-sm-2' for='u_mobile'>Mobile : </label>
            <div class='col-sm-10'>
            <input  class='form-control userctrlbox'  type='text' name='u_mobile' value='".$row["u_mobile"]."'> </div>
        </div></div></td>

        

        <td width='30%'  >

        <div class='form-group' >
        <label class='control-label col-sm-4' for='rgd_date'>Regd. Date: </label>
            <div class='col-sm-8'>
            <input class='form-control userctrlbox'  type='text' name='rgd_date' disabled   value='".$row["rgd_date"]."'> </div>
        </div>
        <div class='form-group' >
        <label class='control-label col-sm-4' for='status'>Status : </label>
            <div class='col-sm-8'>";

            if ($Flag== "Active"){

                Echo "<input class='form-control userctrlbox' style='background-color:red; text-align:center;'  type='text' name='status' disabled  value='".$Flag."'/>" ;
            }

            if ($Flag== "Inactive"){

                Echo "<input class='form-control userctrlbox'  type='text' name='status' disabled  value='".$Flag." (".$ht.") hrs'/>" ;
            }
                     
            
         echo   "</div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-4' for='assign'>Assignment : </label>
            <div class='col-sm-8'>";

            if ($row["permission"]== "108"){

                Echo "<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='Namakarana'/>" ;
            }

            else if ($row["permission"]== "1081632"){

                Echo "<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='Both'/>" ;
            }

            else if ($row["permission"]== "1632"){

                Echo "<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='Namanirnaya'/>" ;
            }

            else if ($row["permission"]== "" || $row["permission"]== Null){ 

                Echo "<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='Not Assigned'/>" ;
            }

            else {

                Echo "<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='".$row["permission"]."'/>" ;
            }



        echo  "</div>
        <div class='form-group' >
        <label class='control-label col-sm-4' for='last_login'>Last Login : </label>
            <div class='col-sm-8'>
            <input  class='form-control userctrlbox'  type='text' name='last_login' disabled  value='".lastLogin($row["id"])."'> </div>
        </div></td>

        
        <td width='30%' >

        <div class='form-group' >
        <label class='control-label col-sm-4' for='id'>User ID: </label>
            <div class='col-sm-8'>
            <input id='u_id' class='form-control userctrlbox'  type='text' name='u_id'  readonly='readonly'      value='".$row["id"]."'> </div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-4' for='username'>Username : </label>
            <div class='col-sm-8'>
            <input class='form-control userctrlbox'  type='text' name='username' value='".$row["user_name"]."'> </div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-4' for='password'>Password : </label>
            <div class='col-sm-8'>
            <input class='form-control userctrlbox'  type='text' name='password' value='".$row["password"]."'></div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-4' for='permission' >Permission : </label>
            <div class='col-sm-8'>
            <input  class='form-control userctrlbox' style='background-color: #73bbff;' type='text' name='permission' value='".$row["permission"]."'> </div>
        </div>
		
		<div class='form-group' >
        <label class='control-label col-sm-4' for='LogoutBy' >LogoutBy : </label>
            <div class='col-sm-8'>
            <input  class='form-control userctrlbox' style='background-color: #FF2222;' type='text' name='logoutby' value='".$row["logoutby"]."'> </div>
        </div>
		
		
		
		</td> 
        



        <td width='30px'>

        <button   type='submit' name ='btn' value='edit' class='tbutton' style='color:lightgreen' > <i class='fa fa-pencil-square-o'></i></button><hr style='margin: 15px 0px 15px 0px'>
        <button  onclick='loadDoc(this.value)' value='".$row["id"]."' class='tbutton'  > <i class='fa fa-trash-o'></i></button></td>
        </tr> </form>";
    }
    
    echo "</table>";
}   else {
}
$connr->close();
?>

                
                   





        </div><!-- /dash-unit -->
    </div><!-- /span3 -->


      </div><!-- /row -->
     

      
      
    </div> <!-- /container -->
    <div id="footerwrap">
        <footer class="clearfix"></footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12" style="text-align: center;">
                <p><img src="images/hklogo.gif" height="80" width="80" alt="HKS"></p>
                 <p style= "cursor: pointer;" > Powered by <a href="https://www.facebook.com/harekrishnasamacar/" target="_blank" >@hksamacar</a> 2017 </p> 
                </div>

            </div><!-- /row -->
        </div><!-- /container -->       
    </div><!-- /footerwrap -->
   <div id="demo"></div>       
</body>

<script>


function loadDoc(ppp) {
	
	var r = confirm("Are you sure to delete!");
if (r == true) {
    loadDoc1(ppp);
} else {
    //txt = "You pressed Cancel!";
} 
}
function loadDoc1(lll) {	
	//var j_u_id=document.getElementById('u_id').value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "user_edit_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("btn=del&u_id="+lll);
}
 
</script>
</html>
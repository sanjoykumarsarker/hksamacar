
<?php

session_start();
include 'function.php';
   
$usr=$_POST['username'];
$pw=$_POST['entrancekey'];

$id_search=getId($usr,$pw);

if($id_search==null||$id_search==""){
	
header("Location: admin_login.php"); /* Redirect browser */
exit();

}
else

{	
$_SESSION['usr']=$usr;
$_SESSION['id']=$id_search;	
}


?>


<?php session_start();?>
<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
   
        
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
    text-align: center;
	color: white;}
    
    p {margin-bottom: 0em;
       
    margin-top: 0em;}

    tr:nth-child(even) {
    background-color: ;
	
	}
	
	.containerbthover {
  position: relative;
  width: 150px;
  height: 150px;
  text-align:center;
  left: 40%;
  
}

.overlay {
  position: absolute;
  text-align:center;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0);
  transition: background 0.5s ease;
}

.containerbthover:hover .overlay {
  display: block;
  background: rgba(0, 0, 0, .3);
}


.title {
  position: absolute;
  left: 0;
  top: 120px;
  font-size: 30px;
  text-align: center;
  color: white;
  z-index: 1;
  transition: top .5s ease;
}

.containerbthover:hover .title {
  top: 60px;
}

.button {
  position: absolute;
  width: 150px;
  left:0;
  top: 90px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}

.button a {
  width: 150px;
  padding: 0px 0px 0px 0px;
  text-align: center;
  color: white;
  border: solid 1px white;
  z-index: 1;
}

.containerbthover:hover .button {
  opacity: 10;
}



</style>

    <script>
</script>

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


function myPhoto() {
	'$('#upload-file-info').html(this.files[0].name)'
    }
</script>



  </head>
  

  <body onload="startTime()" >
  
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
              <li class="active"><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>                            
              <li><a href="#"><i class="fa fa-user-circle-o"></i> Users</a></li>
              <li><a href="#"><i class="fa fa-sign-out"></i>Sign-out</li></a></li>
            </ul>
          </div>
        </div>
    </div>



    <div class="container">

      <!-- FIRST ROW OF BLOCKS -->     
    <div class="row" style="margin-top: 15px;">

        <div class="col-sm-12 col-lg-12" >
            <p class="bg-info bg-inline-block" style="text-align: center; font-size: 40px; font-family:French Script MT;" >
             User Dashboard</p> </div>
    </div>
      <!-- SECOND ROW OF BLOCKS -->     
      <div class="row" style="margin-top: 20px;" > 

        <div class="col-sm-10 col-lg-10">
            <div class="dash-unit" style="height: auto;">
                <dtitle>Personal Info</dtitle>
                <hr>
                  
				  
				  	<?php

$a=$_SESSION['id'];
					
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
   $sqlr = "SELECT id, user_name, password, permission, u_name, u_address, u_email, u_mobile, rgd_date, u_img
            FROM users where id= '$a'";
   
$resultr = $connr->query($sqlr);

if ($resultr->num_rows > 0) {
        
    // output data of each row
    while($row = $resultr->fetch_assoc())
    
    {
    $tb=searchtbname($row["permission"]);    
    $gt=getDiffTime($row["id"]);
	$ht=round(($gt/3600),2);


    if($gt=="" || $gt==null)
 {
     
$Flag="Inactive";
 
 }

   
 if($gt>0 && $gt<60)
 
    {$Flag="Active";

} else {}


    echo "
	<form target='iframe1' style='text-align:center;' enctype='multipart/form-data' action='user_edit_image.php' method='POST'>
        
        <div class='form-group' style='display:none; ' >
        <label class='control-label col-sm-3' for='id'>User ID: </label>
            <div class='col-sm-9'>
            <input id='u_id' class='form-control userctrlbox'  type='text' name='u_id' readonly='readonly' value='".$row["id"]."'> </div>
        </div>
				
		<div class='containerbthover' >
        <img src= 'usr_img/".$row["u_img"]."' height=150 width=150 style='left:0; border:1px solid maroon; position: absolute;' > 
		
		<p  class='title'></p>
		<div class='overlay'></div>
		<div class='button' style='cursor: pointer;'>
		<a type=''submit' for='my-file-selector'>
		<label for='my-file-selector'>Change Image</label>
		<input id='my-file-selector' type='file' style='display:none; cursor: pointer;' name='myimage'
		onchange='myPhoto()' accept='image/*'  capture   /> </a><br>
	   	
		
		<button type='submit' class='tbutton' style='color:lightgreen; padding: 2px;' >
		<i class='fa fa-pencil-square-o'></i>Upload </button>
	   </div>		
		</div>
		
	   <span>To change; first select the image then upload it. </span>

		<span  id='upload-file-info' ></span>
		<br>
		</form>
		<form target='iframe1'  action='user_edit_data.php' method='POST'>
		
	<table class='table table-bordered'>
     	
		<tr> <td>
        <div class='form-group' >
        <label class='control-label col-sm-3' for='u_name'>Name: </label>
            <div class='col-sm-9'>
            <input class='form-control userctrlbox'  type='text' name='u_name'       value='".$row["u_name"]."'> </div>
        </div>
        <div class='form-group' >
        <label class='control-label col-sm-3' for='u_address'>Address: </label>
            <div class='col-sm-9'>
            <input class='form-control userctrlbox'  type='text' name='u_address' value='".$row["u_address"]."'> </div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-3' for='u_email'>Email : </label>
            <div class='col-sm-9'>
            <input class='form-control userctrlbox'  type='text' name='u_email' value='".$row["u_email"]."'></div>
        </div>
        <div class='form-group' >
        <label class='control-label col-sm-3' for='u_mobile'>Mobile : </label>
            <div class='col-sm-9'>
            <input  class='form-control userctrlbox'  type='text' name='u_mobile' value='".$row["u_mobile"]."'> </div>
        </div>
		
        <div class='form-group' >
        <label class='control-label col-sm-3' for='username'>Username : </label>
            <div class='col-sm-9'>
            <input class='form-control userctrlbox'  type='text' name='username' value='".$row["user_name"]."'> </div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-3' for='password'>Password : </label>
            <div class='col-sm-9'>
            <input class='form-control userctrlbox'  type='text' name='password' value='".$row["password"]."'></div>
        </div>
		</td>


        <td>
		
        <div class='form-group' >
        <label class='control-label col-sm-3' for='id'>User ID: </label>
            <div class='col-sm-9'>
            <input id='u_id' class='form-control userctrlbox'  type='text' name='u_id' readonly='readonly' value='".$row["id"]."'> </div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-3' for='rgd_date'>Regd. Date: </label>
            <div class='col-sm-9'>
            <input class='form-control userctrlbox'  type='text' name='rgd_date' disabled   value='".$row["rgd_date"]."'> </div>
        </div>
        <div class='form-group' >
        <label class='control-label col-sm-3' for='status'>Status : </label>
            <div class='col-sm-9'>";

            if ($Flag== "Active"){

                Echo "<input class='form-control userctrlbox' style='background-color:red; text-align:center;'  type='text' name='status' disabled  value='".$Flag."'/>" ;
            }

            if ($Flag== "Inactive"){

                Echo "<input class='form-control userctrlbox'  type='text' name='status' disabled  value='".$Flag." (".$ht.") hrs'/>" ;
            }
                     
            
         echo   "</div>
        </div>

        <div class='form-group' >
        <label class='control-label col-sm-3' for='assign'>Assignment : </label>
            <div class='col-sm-9'>";

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

                Echo "<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='".$row["permission"]."'/>
					<input class='form-control userctrlbox' style='border: 1px solid red; color: yellow; text-align:center;'  type='text' name='status' disabled  value='".$tb."'/>" ;
            }



        echo  "</div>
        <div class='form-group' >
        <label class='control-label col-sm-3' for='last_login'>Last Login : </label>
            <div class='col-sm-9'>
            <input  class='form-control userctrlbox'  type='text' name='last_login' disabled  value='".lastLogin($row["id"])."'> </div>
        </div>
		
		
        <div class='form-group' style='display:none' >
        <label class='control-label col-sm-4' for='permission' >Permission : </label>
            <div class='col-sm-8'>
            <input  class='form-control userctrlbox' style='background-color: #FF7373;' type='text' name='permission' value='".$row["permission"]."'> </div>
        </div>
		
		</td>

        
        </tr> ";
    }
    
    echo "</table>
	<div style='text-align:center;'>
	<button type='submit' name ='btn' value='edit' class='tbutton' style='color:lightgreen' >
	<i class='fa fa-pencil-square-o'></i> Edit</button></div>
	</form>";
}   else {
}
$connr->close();
?>


				  </div>
			</div>
		
        
    


       
        <div class="col-sm-2 col-lg-2">

      <!-- LOCAL TIME BLOCK -->
            <div class="half-unit">
                <dtitle>Local Time</dtitle>
                <hr>
                    <div class="clockcenter">
                        <digiclock id="txt"> </digiclock>
                    </div>
            </div>

      <!-- SERVER UPTIME -->
            <div class="half-unit">
                <dtitle>Server Uptime</dtitle>
                <hr>
                <div class="cont">
                    <p><img src="images/up.png" alt=""> <bold>Up</bold> | 356ms.</p>
                </div>
            </div>

        </div>
      </div><!-- /row -->
      
      <div class="row" style="margin-top: 40px;"> </div>
      
    <iframe name="iframe1" border="0px" height="0px" width="0px"></iframe> 
      
      
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
          
</body></html>
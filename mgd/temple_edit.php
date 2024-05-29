<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title> Edit Temple </title>
<style>
.input-group-addon {	
	min-width:120px;
	background-color: whitesmoke;
    text-align:left;
}

</style>
</head>
<body>
  <br><br> 
<div style= "text-align:center" > 
<?php
$edit= $_POST['edit'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}

 
$sqle = "SELECT 
autoid,
tregid,
t_div  ,
t_dist , 
t_ps  ,
t_addr  ,
tname_b ,
trecom_b , 
tname ,
trecom , 
t_ph    FROM tmpl WHERE tregid='$edit' ";
    
$resulte = $conne->query($sqle);


if ($resulte->num_rows > 0) {
    
    // output data of each row
    while($row = $resulte->fetch_assoc()) {
		
		$GLOBALS['tname']=$row["tname"];
		$GLOBALS['tname_b']=$row["tname_b"];
		$GLOBALS['trecom_b']=$row["trecom_b"];
		$GLOBALS['trecom']=$row["trecom"];
		$GLOBALS['t_ph']=$row["t_ph"];
		$GLOBALS['t_addr']=$row["t_addr"];
		$GLOBALS['t_ps']=$row["t_ps"];
		$GLOBALS['t_dist']=$row["t_dist"];
		$GLOBALS['t_div']=$row["t_div"];
		$GLOBALS['autoid']=$row["autoid"];	
    }
     
} else {
     
}
 
$conne->close();
 
   ?>

   <div class="tab-pane active in" id="login">
    
	<form class="form-horizontal" action='tfined.php' method="POST">
    
	<fieldset>
    <div class="container">

    <div style=" display:inline-block; width:50%; ">
	 
					<div style="color:orange; font-size:20px;">
						Temple ID: 
						<?php echo  $edit ;?>
						&nbsp &nbsp &nbsp  Division: 
						<span style="color:red" ><?php echo $GLOBALS['t_div'];?></span>
						&nbsp &nbsp &nbsp District: 
						<span style="color:red" ><?php echo $GLOBALS['t_dist'];?></span>

					</div>
				<hr><br>
					<div  style="display:none">
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> ID: </span>
										<input id="msg" type="text" value="<?php echo $edit;?>" class="form-control" name="id" placeholder="id">
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> Address: </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['t_addr'];?>" class="form-control" name="t_addr" placeholder="Village/Union/Road" required>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">PS/ Upazila:   </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['t_ps'];?>" class="form-control" name="t_ps" placeholder="Enter Police Station" required>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> মন্দিরের নাম:  </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['tname_b'];?>" class="form-control" name="tname_b" placeholder="মন্দির " required>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> অনুমোদনকারী:   </span>
										<input id="msg" type="text"  value="<?php echo $GLOBALS['trecom_b'];?>" class="form-control" name="trecom_b" placeholder="অনুমোদনকারী " required>
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Temple Name:   </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['tname'];?>" class="form-control" name="tname" placeholder="Temple Name" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Recommended:  </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['trecom'];?>" class="form-control" name="trecom" placeholder="Recommendation" required>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
										<input id="msg" type="text"  value="<?php echo $GLOBALS['t_ph'];?>" class="form-control" name="t_ph" placeholder="Phone" required>
									</div>
								</div>
							</div>
						</div>
	    <br>
	   		          <button type="submit" class="btn btn-warning"  data-target="#myModal">Edit Record </button>
		<br>
	</div>
		
    </div>
    </fieldset>
</form>     
</div>
</head>
</body>
</html>
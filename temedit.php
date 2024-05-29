
<!DOCTYPE html>

<html>
 
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<title>
Registration
</title>
</head>
<body>
  <br><br> 
<div style= "text-align:center" > 
<?php
 
  
    $edit= $_POST['edit'];
 
  
   
   
   
   
   
   $servername = "204.9.187.195";
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
		
				$GOOBALS['tname']=$row["tname"];

		$GOOBALS['tname_b']=$row["tname_b"];
		$GOOBALS['trecom_b']=$row["trecom_b"];
		$GOOBALS['trecom']=$row["trecom"];
		$GOOBALS['t_ph']=$row["t_ph"];
		$GOOBALS['t_addr']=$row["t_addr"];
		$GOOBALS['t_ps']=$row["t_ps"];
		$GOOBALS['t_dist']=$row["t_dist"];
		$GOOBALS['t_div']=$row["t_div"];
		$GOOBALS['autoid']=$row["autoid"];
		 
		
		
        
		
		
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
	 
<div style="color:orange">
	 Temple ID: 
 <?php echo $edit;?>
   Division: 
 <?php echo $GOOBALS['t_div'];?>

 District: 
  <?php echo $GOOBALS['t_dist'];?>

 </div>
	 <hr><hr>
						 		
						 
<br>
<div  style="display:none">
<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> ID:&nbsp &nbsp &nbsp &nbsp </span>
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
										<span class="input-group-addon"> Address:&nbsp &nbsp &nbsp &nbsp </span>
										<input id="msg" type="text" value="<?php echo $GOOBALS['t_addr'];?>" class="form-control" name="t_addr" placeholder="Village/Union/Road">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Police Station/ Upazila:   </span>
										<input id="msg" type="text" value="<?php echo $GOOBALS['t_ps'];?>" class="form-control" name="t_ps" placeholder="Enter Police Station">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> মন্দিরের নাম: &nbsp &nbsp &nbsp &nbsp </span>
										<input id="msg" type="text" value="<?php echo $GOOBALS['tname_b'];?>" class="form-control" name="tname_b" placeholder="মন্দির ">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon"> অনুমোদনকারী: &nbsp &nbsp  </span>
										<input id="msg" type="text"  value="<?php echo $GOOBALS['trecom_b'];?>" class="form-control" name="trecom_b" placeholder="অনুমোদনকারী ">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Temple Name: &nbsp &nbsp  </span>
										<input id="msg" type="text" value="<?php echo $GOOBALS['tname'];?>" class="form-control" name="tname" placeholder="Temple">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon">Recommended:  </span>
										<input id="msg" type="text" value="<?php echo $GOOBALS['trecom'];?>" class="form-control" name="trecom" placeholder="Recommended">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-11">
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
										<input id="msg" type="text"  value="<?php echo $GOOBALS['t_ph'];?>" class="form-control" name="t_ph" placeholder="Phone">
									</div>
								</div>
							</div>
						</div>
	    <br>
	
	   		          <button type="submit" class="btn btn-Warning"  data-target="#myModal"    >EDIT RECORD </button>

	 <br>
   
	
 </div>
                                     
                    </div>
                        </fieldset>
                      </form>   






					  
                    </div>


   
   </body>
   
   </html>
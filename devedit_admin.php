<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script>
$(document).ready(function(){
  $('.optionBox :checkbox').click(function() {
   var $checkbox = $(this), checked = $checkbox.is(':checked');
   $checkbox.closest('.optionBox').find(':checkbox').prop('disabled', checked);
   $checkbox.prop('disabled', false);
});});
</script>
  
  
  
<title>
Edit Devotee Records 
</title>

<style>
.input-group-addon {
	
	min-width:100px;
	background-color: whitesmoke;
    text-align:left;
}
hr { margin: 0.5em auto; }


</style>

</head>
<body>
  <br> 
 
<?php


if($_POST['edit']){
$edit= $_POST['edit'];
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
$aaa=null;
// Create connection
$conne = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conne->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}

 
$sqle = "SELECT 
	reg,
   bname,
   ename,
   age,
   address,
   phone,
   service,
   gender,
   education,
   mstatus,
   nprefer,imagename,image_id,istatus1,comments, isinitiated  
FROM reg WHERE reg= '$edit' ";
    
$resulte = $conne->query($sqle);

		/*
	
*/
 
 
    
    // output data of each row
   $row = $resulte->fetch_assoc();
   
		$GLOBALS['bname']=$row["bname"];
		$GLOBALS['ename']=$row["ename"];
		$GLOBALS['age']=$row["age"];
    	$GLOBALS['address']=$row["address"];
	 	$GLOBALS['phone']=$row["phone"];
	 	$GLOBALS['service']=$row["service"];
	 	$GLOBALS['gender']=$row["gender"];
	 	$GLOBALS['education']=$row["education"];
	 	$GLOBALS['mstatus']=$row["mstatus"];	
		$GLOBALS['nprefer']=$row["nprefer"];	
		$GLOBALS['reg']=$row["reg"];
		$GLOBALS['imagename']=$row["imagename"];
		$GLOBALS['image_id']=$row["image_id"];
		$GLOBALS['istatus1']=$row["istatus1"];
		$GLOBALS['isinitiated']=$row["isinitiated"];
		$GLOBALS['comments']=$row["comments"];		
		 
		$tregidn=	$row["reg"];
		$tregidm=	mb_substr($tregidn, 0, 6);
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist, tname_b from tmpl where tregid= '$tregidm'  ";	
		$resultrin = $conne->query($sqlin);

 $row = $resultrin->fetch_assoc();
   
$conne->close();
}
   ?>
  <div style= "text-align:center" style="box-sizing: border-box; padding:10px;" >
   <div  id="login">
   
    
	<form action='deveditfinal_admin.php' method="POST">
    
	<fieldset>
    <div class="row" >
	 
					<div style="color:orange; font-size:20px;">
						Registration ID: <?php echo $GLOBALS['reg'];?>
					</div>
				<hr>
				
				<div style="color:green; font-size:20px;">
						<?php
							echo "<h3 style=' text-align:center;color:purple; '> ". $row["tname_b"]."<br> </h3>";
							echo "<h4 style=' text-align:center; '> ". $row["tname"].",&nbsp".$row["t_addr"].",&nbsp".$row["t_dist"].". </h4>";
						;?>
					</div>
				
				<hr>
				
			<div class="row" style="box-sizing: border-box; padding:10px;" >
			<br><br>

			<div class="col-sm-3" style="box-sizing: border-box; padding:10px;" >
			
			
<img src="upload/<?php echo $GLOBALS['imagename'];?>" height=100 width=100><br>
			<b style="font-size:10px"> <?php echo $GLOBALS['image_id']."&nbsp &nbsp".$GLOBALS['imagename'];?></b> 
 			 
		 
		<div class="row" style="box-sizing: border-box; padding:10px;color:red; font-size:15px;text-align:center;">
		<div class="optionBox" style="display: inline;" >
		<label class="checkbox-inline">
		<input type="checkbox" name="istatus1" value=""/> NA </label>
		<label class="checkbox-inline">
		<input type="checkbox" name="istatus1" value="Postponed"/> Postponed</label>
		<label class="checkbox-inline">
		<input type="checkbox" name="istatus1" value="Listed"/> Listed</label></div>	
		<div class="optionBox" >
		<label class="checkbox-inline">
		<input type="checkbox" name="istatus2" value=""/> NA </label>
		<label class="checkbox-inline">
		<input type="checkbox" name="istatus2" value="Absent"/> Absent</label>
		<label class="checkbox-inline">
		<input type="checkbox" name="istatus2" value="Initiated"/> Initiated</label>
		</label></div> </div>
		<div class="col-lg-12" >
		<span>Write Comments Here ... </span>
			<textarea id="msg"  name="comments" rows="3" 
			class="form-control" ><?php echo $comments;?></textarea>
		</div>		
			
			</div>
			<div class="col-sm-5" style="box-sizing: border-box; padding:10px;" >
					<div  style="display:none">
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon"> reg </span>
										<input id="msg" type="text" value="<?php echo $reg;?>" class="form-control" name="reg" placeholder="id">
									</div>
								</div>
							</div>
						</div>
					</div>
					
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon"> নাম: </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['bname'];?>" class="form-control" name="bname" Required >
									</div>
								</div>
							</div>
						</div>
						
					
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon"> Name: </span>
										<input id="msg" type="text" value="<?php echo  $GLOBALS['ename'];?>" class="form-control" name="ename" Required >
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon"> Age:   </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['age'];?>" 
										onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
										Required maxlength="2" class="form-control" name="age"  >
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon"> Address:  </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['address'];?>" class="form-control" Required  name="address" placeholder="Type Address">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon"> Phone:  </span>
										<input id="msg" type="text"  value="<?php echo $GLOBALS['phone'];?>" class="form-control" Required  name="phone" placeholder="Phone/ Mobile">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon">Service: </span>
										<input id="msg" type="text" value="<?php echo $GLOBALS['service'];?>" class="form-control" Required  name="service" placeholder="Service">
									</div>
								</div>
							</div>
						</div>
	</div>
			
			
			<div class="col-sm-4" style="box-sizing: border-box; padding:10px; text-align:left; line-height: 170%;"  >			
	<label class="control-label  " for="ename">Gender:</label>
	<br>
	<label class="radio-inline">
      <input type="radio" name="gender" Required  value="Male">Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Female">Female
    </label>
	<br>
	
	<label class="control-label  " for="ename"  >Education:</label>
	<br>
	<label class="radio-inline">
      <input type="radio" name="education" Required value="NA">NA
    </label>
    <label class="radio-inline">
      <input type="radio" name="education" value="Primary">Primary
    </label>
    <label class="radio-inline">
      <input type="radio" name="education" value="Secondary">Secondary
    </label>
	<label class="radio-inline">
      <input type="radio" name="education" value="Graduation">Graduation
    </label>
	<label class="radio-inline">
      <input type="radio" name="education" value="PG">PG
    </label>
	<br>
	
	<label class="control-label " for="ename">Marital Status:</label>
	<br>
	<label class="radio-inline">
      <input type="radio" name="mstatus" Required value="DB" >DB
    </label>
    <label class="radio-inline">
      <input type="radio" name="mstatus" value="DA">DA
    </label>
    <label class="radio-inline">
      <input type="radio" name="mstatus" value="DDB">DDB
    </label>
	 <label class="radio-inline">
      <input type="radio" name="mstatus" value="DDA">DDA
    </label>
	 <label class="radio-inline">
      <input type="radio" name="mstatus" value="DDD">DDD
    </label>
	 <label class="radio-inline">
      <input type="radio" name="mstatus" value="DDW">DDW
    </label>
	<br>
	 
	<label class="control-label  " for="ename">Name Preference:</label>
	<br> 
	<label class="radio-inline">
      <input type="radio" name="nprefer" Required  value="Krishna">Krishna
    </label>
    <label class="radio-inline">
      <input type="radio" name="nprefer" value="Gaura">Gaura
    </label>
    <label class="radio-inline">
      <input type="radio" name="nprefer" value="Rama">Rama
    </label>
	 <label class="radio-inline">
      <input type="radio" name="nprefer" value="Nrisimha">Nrisimha
    </label>
	 <label class="radio-inline">
      <input type="radio" name="nprefer" value="Jagannath">Jagannath
    </label>
	<label class="radio-inline">
      <input type="radio" name="nprefer" value="Any">Any
    </label>
	<br> <br> 
	<button type="submit" class="btn btn-danger"  data-target="#myModal"> 
	<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	Edit Record </button>  
	</div>
		
    </div>
	
	</div>
<br><br><br><br><hr>
</fieldset>
</form>     
</div>
</div>

<iframe name="myframe01" style='border:none;   height:0 '></iframe>

</head>

<script>
 	
$("input[name=gender][value='<?php echo$GLOBALS['gender'];?>']").prop("checked",true);
$("input[name=education][value='<?php echo$GLOBALS['education'];?>']").prop("checked",true);
$("input[name=mstatus][value='<?php echo$GLOBALS['mstatus'];?>']").prop("checked",true);
$("input[name=nprefer][value='<?php echo$GLOBALS['nprefer'];?>']").prop("checked",true);
$("input[name=istatus1][value='<?php echo$GLOBALS['istatus1'];?>']").prop("checked",true);
$("input[name=istatus2][value='<?php echo$GLOBALS['isinitiated'];?>']").prop("checked",true);
</script>

</body>
</html>
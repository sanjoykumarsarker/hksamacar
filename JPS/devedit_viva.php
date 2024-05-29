<?php session_start();

$_SESSION['status_viva_after']="";
?>
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
Harinam Initiation Viva 
</title>

<style>

table {
  border-collapse: collapse;
  border: 0px solid black;
  table-layout: auto;
  width: 100%; 
} 

th,td {
  border: 0px solid black;
}

.input-group-addon {
	
	min-width:100px;
	background-color: whitesmoke;
    text-align:left;
}
hr { margin: 0.5em auto; }


</style>

</head>
<body>
 
<?php
if($_POST['edit']){
$edit= $_POST['edit'];

$_SESSION['reg']=$edit;

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
   spouse_name,
   spouse_id,
   age,
   address,
   phone,
   service,
   gender,
   education,
   mstatus,
   nprefer,imagename,image_id,istatus1,comments, isinitiated ,    
four_principles,
sixteen_rounds,
shelter_date,
councillor,
bhoga,
tilaka,
tulasi,
guru_parampara,
guru_puja,
guruvastakama,
book_gita,
book_bhagabatam,
book_bhaktirasamrtasindhu,
book_teaching_lord_chaitanya,
book_shrila_prabhupada,
qs1_importance_diksa,
qs2_importance_four_principles,
qs3_importance_chanting,
qs4_concept_spiritual_teacher_master,
qs5_concept_prabhupada,
qs6_concept_gita,
mangalaroti,

comments_viva,
result_viva,
status_viva,
viva_time,
viva_examiner,
event_viva
FROM reg WHERE reg= '$edit' ";
    
$resulte = $conne->query($sqle);

		/*
	
*/
 
 
    
    // output data of each row
   $row = $resulte->fetch_assoc();
   
		$GLOBALS['bname']=$row["bname"];
		$GLOBALS['ename']=$row["ename"];

    $GLOBALS['spouse_name']=$row["spouse_name"];
		$GLOBALS['spouse_id']=$row["spouse_id"];
  	$GLOBALS['type']=$row["type"];

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
        
        

        $GLOBALS['four_principles']=$row["four_principles"];
        $GLOBALS['sixteen_rounds']=$row["sixteen_rounds"];
        $GLOBALS['shelter_date']=$row["shelter_date"];
        $GLOBALS['councillor']=$row["councillor"];
        $GLOBALS['bhoga']=$row["bhoga"];
        $GLOBALS['tilaka']=$row["tilaka"];
        $GLOBALS['tulasi']=$row["tulasi"];
        $GLOBALS['guru_parampara']=$row["guru_parampara"];
        $GLOBALS['guru_puja']=$row["guru_puja"];
        $GLOBALS['guruvastakama']=$row["guruvastakama"];
        $GLOBALS['book_gita']=$row["book_gita"];
        $GLOBALS['book_bhagabatam']=$row["book_bhagabatam"];
        $GLOBALS['book_bhaktirasamrtasindhu']=$row["book_bhaktirasamrtasindhu"];
        $GLOBALS['book_teaching_lord_chaitanya']=$row["book_teaching_lord_chaitanya"];
        $GLOBALS['book_shrila_prabhupada']=$row["book_shrila_prabhupada"];
        $GLOBALS['qs1_importance_diksa']=$row["qs1_importance_diksa"];
        $GLOBALS['qs2_importance_four_principles']=$row["qs2_importance_four_principles"];
        $GLOBALS['qs3_importance_chanting']=$row["qs3_importance_chanting"];
        $GLOBALS['qs4_concept_spiritual_teacher_master']=$row["qs4_concept_spiritual_teacher_master"];
        $GLOBALS['qs5_concept_prabhupada']=$row["qs5_concept_prabhupada"];
        $GLOBALS['qs6_concept_gita']=$row["qs6_concept_gita"];
        $GLOBALS['mangalaroti']=$row["mangalaroti"];
   
        $GLOBALS['comments_viva']=$row["comments_viva"];
        $GLOBALS['result_viva']=$row["result_viva"];
        $GLOBALS['status_viva']=$row["status_viva"];
        $GLOBALS['viva_time']=$row["viva_time"];
        $GLOBALS['viva_examiner']=$row["viva_examiner"];
        $GLOBALS['event_viva']=$row["event_viva"];



     
  
       $_SESSION['status_viva']=$GLOBALS['status_viva'];

        

 if(($_SESSION['status_viva']=="approved")) {
  $GLOBALS['button_status']="disabled";
 
  $_SESSION['status_viva_button']="Already Approved!!!";

}

else if(($GLOBALS['viva_examiner']!=$_SESSION['viva_id'])&&($_SESSION['status_viva']=="submitted"))

{

  $_SESSION['status_viva_after']="approved";
  $_SESSION['status_viva_button']="APPROVE";

}
else if(($_SESSION['status_viva']!="approved")) {

  $_SESSION['status_viva_after']="submitted";
  $_SESSION['status_viva_button']="SUBMIT";

}


		 
		$tregidn=	$row["reg"];
		$tregidm=	mb_substr($tregidn, 0, 6);
		
		$sqlin="select   	tregid ,	tname ,	t_addr ,t_ps,	t_dist, tname_b from tmpl where tregid= '$tregidm'  ";	
		$resultrin = $conne->query($sqlin);

 $row = $resultrin->fetch_assoc();
   
$conne->close();
}
   ?>
  <div style= "text-align:center" style="box-sizing: border-box;" >
   <div  id="login">
   
    
	<form action='deveditfinal_viva.php' method="POST">
    
	<fieldset>
    
    <nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo "<h4 style=' text-align:center; color:purple; font-size:20px; '> 
  ". $row["tname_b"]." ". $row["tname"].",&nbsp".$row["t_addr"].",&nbsp".$row["t_dist"].".</h4>";?> </a>

  <div class="collapse navbar-collapse" style="float: right; width: 300px; padding: 10px 0px 0px 0px;" id="navbarNav">
      <a href="#"> <i class="fa fa-user-circle-o" style="font-size:36px;color:blue;"></i> <?php echo "".$_SESSION['user_name']."";?>  </a>
  </div>
</nav>
								
			<div class="row" style="box-sizing: border-box; background-color: AntiqueWhite;" >

			<div class="col-sm-3" style="box-sizing: border-box; padding:10px 0px 0px 200px;" >
		        
                            <img src="upload/<?php echo $GLOBALS['imagename'];?>" height=250px width=200px ><br>
			    
                            <b style="font-size:15px"> <?php echo $GLOBALS['image_id']."&nbsp ID:".$GLOBALS['reg'];?></b> 
            			</div>
			<div class="col-sm-4" style="box-sizing: border-box; padding:10px; font-size:15px;" >
					<div  style="display:none">
						<div class="form-group">
							<div class="row">	
								<div class="col-sm-12">
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
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> নাম: </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;" value="<?php echo $GLOBALS['bname'];?>" class="form-control" name="bname" Required >
									</div>
								</div>
							</div>
						</div>
						
					
						<div class="form-group">
							<div class="row">	
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> Name: </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;"value="<?php echo  $GLOBALS['ename'];?>" class="form-control" name="ename" Required >
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-sm-12">
									<div class="input-group " >
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> Age:   </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;" value="<?php echo $GLOBALS['age'];?>" 
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
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> Address:  </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;" value="<?php echo $GLOBALS['address'];?>" class="form-control" Required  name="address" placeholder="Type Address">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> Phone:  </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;" value="<?php echo $GLOBALS['phone'];?>" class="form-control" Required  name="phone" placeholder="Phone/ Mobile">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;" >Service: </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;" value="<?php echo $GLOBALS['service'];?>" class="form-control" Required  name="service" placeholder="Service">
									</div>
								</div>
							</div>
						</div>
	</div>
			
			
			<div class="col-sm-4" style="box-sizing: border-box; padding:20px 0px 0px 100px; text-align:left; line-height: 170%;"  >			
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

 
		<div class="form-group">
							<div class="row">	
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> Spouse: </span>
										<input id="msg" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;"value="<?php echo  $GLOBALS['spouse_name'];?>" class="form-control" name="spouse_name"  >
									</div>
								</div>
							</div>
						</div>



            <div class="form-group">
							<div class="row">	
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon" style="border:none; background-color:transparent; box-shadow:none;"> Spouse ID: </span>
										<input id="spouse_id" type="text" style="border:none; border-bottom: 1px solid black; background-color:transparent; box-shadow:none;"value="<?php echo  $GLOBALS['spouse_id'];?>" class="form-control" name="spouse_id" onkeyup="spouseName(this.value)" >
									</div>
								</div>
							</div>
						</div>


            <p style="color:red" id="spouse_name"  ></p>

            </div>	

    </div>
	


	</div>










<h4 style="color:green;">Viva Records </h4>
<hr>

<!--  viva records--start-->
<div style="box-sizing: border-box; padding:20px 100px 0px 100px; text-align:left; line-height: 170%;" >
<!-- text field  -- start -->
<div class="col-sm-3">
    <div class="input-group" >
    <span class="input-group-addon"> চারটি নিয়ম পালন: </span>
	<input id="msg" type="text" value="<?php echo $GLOBALS['four_principles'];?>" class="form-control" name="four_principles"  >
    </div>
</div>
<div class="col-sm-3">
    <div class="input-group">
	<span class="input-group-addon"> ১৬ মালা জপ: </span>
	<input id="msg" type="text" value="<?php echo $GLOBALS['sixteen_rounds'];?>" class="form-control" name="sixteen_rounds"  >
    </div>
</div>
<div class="col-sm-3">
    <div class="input-group" >
	<span class="input-group-addon"> শ্রীগুরুচরণাশ্রয়: </span>
	<input id="msg" type="text" value="<?php echo $GLOBALS['shelter_date'];?>" class="form-control" name="shelter_date"  >
    </div>
</div>
<div class="col-sm-3">
    <div class="input-group" class="col-sm-3">
	<span class="input-group-addon"> তত্ত্বাবধায়ক: </span>
	<input id="msg" type="text" value="<?php echo $GLOBALS['councillor'];?>" class="form-control" name="councillor"  >
    </div>
</div>

</div>


<br>

<!-- text field  -- end-->
<div style="box-sizing: border-box; padding:50px 50px 0px 50px; text-align:left; line-height: 170%;" >

<div class="col-sm-4" style= "padding:10px 10px 10px 10px;">
<div style= "background-color: PeachPuff; padding:10px 10px 10px 10px; border-radius: 25px;" >

<h4 style="font-weight: bold; text-align: center;"> বিভিন্ন মন্ত্র ও আরতি </h4>
<hr>
<table>
  <tr>
  <td>
	<label class="control-label  " for="ename">ভোগ নিবেদন পদ্ধতি ও মন্ত্র:</label>
</td>
<td>
		<label class="radio-inline">
      <input type="radio" name="bhoga"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="bhoga" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="bhoga" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
<td>	
	<label class="control-label  " for="ename">তিলকের স্থানসমূহ ও মন্ত্র</label>
</td>
<td>
<label class="radio-inline">
      <input type="radio" name="tilaka"   value="yes">হ্যাঁ</label>
    <label class="radio-inline">
      <input type="radio" name="tilaka" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="tilaka" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
<td>
	<label class="control-label  " for="ename">তুলসী প্রণাম মন্ত্র:</label>
</td>
<td>
		<label class="radio-inline">
      <input type="radio" name="tulasi"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="tulasi" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="tulasi" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
	 
<tr>
<td>
      <label class="control-label  " for="ename">গুরুপরম্পরার আচার্যগণের নাম:</label>
</td>
<td>
         <label class="radio-inline">
       <input type="radio" name="guru_parampara"   value="yes">হ্যাঁ
     </label>
     <label class="radio-inline">
       <input type="radio" name="guru_parampara" value="no">না
     </label>
     <label class="radio-inline">
       <input type="radio" name="guru_parampara" value="partial">আংশিকভাবে
     </label>
</td>
</tr>
<tr>
  <td>	 
     <label class="control-label  " for="ename">গুরুপূজা কীর্তন:</label>
</td>
<td>
   <label class="radio-inline">
       <input type="radio" name="guru_puja"   value="yes">হ্যাঁ
     </label>
     <label class="radio-inline">
       <input type="radio" name="guru_puja" value="no">না
     </label>
     <label class="radio-inline">
       <input type="radio" name="guru_puja" value="partial">আংশিকভাবে
     </label>
</td>
</tr>
<tr>
  <td>	 
     <label class="control-label  " for="guruvastakama">গুর্বষ্টক :</label>
</td>
<td>
         <label class="radio-inline">
       <input type="radio" name="guruvastakama"   value="yes">হ্যাঁ
     </label>
     <label class="radio-inline">
       <input type="radio" name="guruvastakama" value="no">না
     </label>
     <label class="radio-inline">
       <input type="radio" name="guruvastakama" value="partial">আংশিকভাবে
     </label>
</td>
</tr>
</table>
</div>
</div>  

<div class="col-sm-4"  style= "padding:10px 10px 10px 10px;" >
<div style= "background-color: PeachPuff; padding:10px 10px 10px 10px; border-radius: 25px;" >
<h4 style="font-weight: bold; text-align: center;"> গ্রন্থ অধ্যয়ন </h4>
<hr>
<table>
<tr>
  <td>
	<label class="control-label  " for="ename">শ্রীমদ্ভগবদ্গীতা:</label>
</td>
<td>
		<label class="radio-inline">
      <input type="radio" name="book_gita"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_gita" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_gita" value="hearing">শ্রবণ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_gita" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
<td>
	<label class="control-label  " for="ename">শ্রীমদ্ভাগবত:</label>
</td>
<td>
  		<label class="radio-inline">
      <input type="radio" name="book_bhagabatam"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_bhagabatam" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_bhagabatam" value="hearing">শ্রবণ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_bhagabatam" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
  <td>
    <label class="control-label  " for="ename">ভক্তিরসামৃতসিন্ধু (১ম ভাগ):</label>
</td>
<td>
		<label class="radio-inline">
      <input type="radio" name="book_bhaktirasamrtasindhu"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_bhaktirasamrtasindhu" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_bhaktirasamrtasindhu" value="hearing">শ্রবণ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_bhaktirasamrtasindhu" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
  <td>
    <label class="control-label  " for="ename">শ্রীচৈতন্য মহাপ্রভুর শিক্ষা:</label>
</td>
<td>	
    <label class="radio-inline">
      <input type="radio" name="book_teaching_lord_chaitanya"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_teaching_lord_chaitanya" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_teaching_lord_chaitanya" value="hearing">শ্রবণ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_teaching_lord_chaitanya" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
  <td>
    <label class="control-label  " for="ename">শ্রীল প্রভুপাদ জীবনী:</label>
</td>
<td>
		<label class="radio-inline">
      <input type="radio" name="book_shrila_prabhupada"   value="yes">হ্যাঁ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_shrila_prabhupada" value="no">না
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_shrila_prabhupada" value="hearing">শ্রবণ
    </label>
    <label class="radio-inline">
      <input type="radio" name="book_shrila_prabhupada" value="partial">আংশিকভাবে
    </label>
</td>
</tr>
<tr>
<td>
    <label class="control-label  " for="ename">  দৈনন্দিন সাধনা - মঙ্গলারতি:</label>
</td>
<td>
		<label class="radio-inline">
      <input type="radio" name="mangalaroti"   value="REGULARLY">প্রতিদিন
    </label>
    <label class="radio-inline">
      <input type="radio" name="mangalaroti" value="OCCASSIONALLY">মাঝেমাঝে
    </label>
</td>
</tr>
</table>
</div>
</div>   
<div class="col-sm-4" style= "padding:10px 10px 10px 10px;">

<div style= "background-color: PeachPuff; padding:10px 10px 10px 10px; border-radius: 25px;" >
<h4 style="font-weight: bold; text-align: center;"> শাস্ত্রীয় জ্ঞান</h4>
<hr>

<table style="border-collapse: collapse; border: 0px solid black;" >
<tr>
  <td>
  <label class="control-label  " for="ename">গুরুদেব এবং দীক্ষার গুরুত্ব:</label>
</td>
  <td>
		<label class="radio-inline">
      <input type="radio" name="qs1_importance_diksa"   value="good">ভালো
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs1_importance_diksa" value="average">মোটামুটি
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs1_importance_diksa" value="poor">উন্নতি করা প্রয়োজন
    </label>
</td> 
</tr>
<tr>
  <td>
    <label class="control-label  " for="ename">চারটি বিধিবদ্ধ নিয়মের গুরুত্ব:</label>
</td>
    <td>
		<label class="radio-inline">
      <input type="radio" name="qs2_importance_four_principles"   value="good">ভালো
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs2_importance_four_principles" value="average">মোটামুটি
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs2_importance_four_principles" value="poor">উন্নতি করা প্রয়োজন
    </label>
</td>
</tr>
<tr>
<td>
    <label class="control-label  " for="ename">জপের গুরুত্ব:</label>
</td>
  <td>
		<label class="radio-inline">
      <input type="radio" name="qs3_importance_chanting"   value="good">ভালো
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs3_importance_chanting" value="average">মোটামুটি
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs3_importance_chanting" value="poor">উন্নতি করা প্রয়োজন
    </label>
</td>   
</tr>
<tr>
<td>
    <label class="control-label  " for="ename">দীক্ষাগুরু ও শিক্ষাগুরু বিষয়ক ধারনা:</label>
</td>
<td>    
		<label class="radio-inline">
      <input type="radio" name="qs4_concept_spiritual_teacher_master"   value="good">ভালো
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs4_concept_spiritual_teacher_master" value="average">মোটামুটি
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs4_concept_spiritual_teacher_master" value="poor">উন্নতি করা প্রয়োজন
    </label>
</td>
</tr>   
  <tr>
  <td>
    <label class="control-label  " for="ename">ইস্কন প্রতিষ্ঠাতা আচার্য:</label>
</td>
    <td>
		<label class="radio-inline">
      <input type="radio" name="qs5_concept_prabhupada"   value="good">ভালো
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs5_concept_prabhupada" value="average">মোটামুটি
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs5_concept_prabhupada" value="poor">উন্নতি করা প্রয়োজন
    </label>
</td>
</tr>
  <tr>
  <td>
    <label class="control-label  " for="ename">শ্রীমদ্ভগবদ্গীতার মৌলিক জ্ঞান:</label>
  </td>
  <td>
		<label class="radio-inline">
      <input type="radio" name="qs6_concept_gita"   value="good">ভালো
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs6_concept_gita" value="average">মোটামুটি
    </label>
    <label class="radio-inline">
      <input type="radio" name="qs6_concept_gita" value="poor">উন্নতি করা প্রয়োজন
    </label>
</td>
</tr>
</table>  
    </div>

    </div>
</div>

<div style="box-sizing: border-box; padding:100px 50px 0px 50px; text-align:left;" >   


<div class="col-sm-5">
    <br>
    <span> Comments on VIVA ... </span>
    <br>
			<textarea id="msg"  name="comments_viva" rows="3" 
			class="form-control" ><?php echo $GLOBALS['comments_viva'];?></textarea>
</div>
<div class="col-sm-3" style="padding:0px 100px 0px 50px; ">
<br>
    <h4 style="font-weight: bold; text-align: center;"> পরীক্ষকের মূল্যায়ণ  </h4>
	<div class="col-sm-6">
	<label class="radio-inline">
      <input type="radio" name="result_viva" Required  value="fit">যোগ্য
    </label>
    </div>
    <div class="col-sm-6" >
    <label class="radio-inline">
      <input type="radio" name="result_viva" value="waiting">অপেক্ষমান
    </label>
    </div>

</div>  
<div class="col-sm-4">
	<br> <br> 
	<button type="submit" class="btn btn-lg btn-danger"  data-target="#myModal"
  
  
  <?php if(($_SESSION['status_viva']=="approved"))
  {

    echo $GLOBALS['button_status'];
  }  
  ?>
  
  > 
	<i class="fa fa-pencil-square-o &nbsp" aria-hidden="true"   ></i><?php echo $_SESSION['status_viva_button'];?> </button> 
</div> 
</div>
   <!--  viva records--end-->
</fieldset>
</form>     
</div>
</div>

<iframe name="myframe01" style='border:none;   height:0 '></iframe>

</head>

<script> 	
$("input[name=gender][value='<?php echo $GLOBALS['gender'];?>']").prop("checked",true);
$("input[name=education][value='<?php echo $GLOBALS['education'];?>']").prop("checked",true);
$("input[name=mstatus][value='<?php echo $GLOBALS['mstatus'];?>']").prop("checked",true);
$("input[name=nprefer][value='<?php echo $GLOBALS['nprefer'];?>']").prop("checked",true);
$("input[name=istatus1][value='<?php echo $GLOBALS['istatus1'];?>']").prop("checked",true);
$("input[name=istatus2][value='<?php echo $GLOBALS['isinitiated'];?>']").prop("checked",true);
$("input[name=bhoga][value='<?php echo $GLOBALS['bhoga'];?>']").prop("checked",true);
$("input[name=tilaka][value='<?php echo $GLOBALS['tilaka'];?>']").prop("checked",true);
$("input[name=tulasi][value='<?php echo $GLOBALS['tulasi'];?>']").prop("checked",true);
$("input[name=guru_parampara][value='<?php echo $GLOBALS['guru_parampara'];?>']").prop("checked",true);
$("input[name=guru_puja][value='<?php echo $GLOBALS['guru_puja'];?>']").prop("checked",true);
$("input[name=guruvastakama][value='<?php echo $GLOBALS['guruvastakama'];?>']").prop("checked",true);
$("input[name=book_gita][value='<?php echo $GLOBALS['book_gita'];?>']").prop("checked",true);
$("input[name=book_bhagabatam][value='<?php echo $GLOBALS['book_bhagabatam'];?>']").prop("checked",true);
$("input[name=book_bhaktirasamrtasindhu][value='<?php echo $GLOBALS['book_bhaktirasamrtasindhu'];?>']").prop("checked",true);
$("input[name=book_teaching_lord_chaitanya][value='<?php echo $GLOBALS['book_teaching_lord_chaitanya'];?>']").prop("checked",true);
$("input[name=book_shrila_prabhupada][value='<?php echo $GLOBALS['book_shrila_prabhupada'];?>']").prop("checked",true);
$("input[name=qs1_importance_diksa][value='<?php echo $GLOBALS['qs1_importance_diksa'];?>']").prop("checked",true);
$("input[name=qs2_importance_four_principles][value='<?php echo $GLOBALS['qs2_importance_four_principles'];?>']").prop("checked",true);
$("input[name=qs3_importance_chanting][value='<?php echo $GLOBALS['qs3_importance_chanting'];?>']").prop("checked",true);
$("input[name=qs4_concept_spiritual_teacher_master][value='<?php echo $GLOBALS['qs4_concept_spiritual_teacher_master'];?>']").prop("checked",true);
$("input[name=qs5_concept_prabhupada][value='<?php echo $GLOBALS['qs5_concept_prabhupada'];?>']").prop("checked",true);
$("input[name=qs6_concept_gita][value='<?php echo $GLOBALS['qs6_concept_gita'];?>']").prop("checked",true);
$("input[name=mangalaroti][value='<?php echo $GLOBALS['mangalaroti'];?>']").prop("checked",true);
$("input[name=result_viva][value='<?php echo $GLOBALS['result_viva'];?>']").prop("checked",true);



function spouseName(spouse_id) {
  if (spouse_id.length==0) {
    document.getElementById("spouse_name").innerHTML="";
    document.getElementById("spouse_name").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("spouse_name").innerHTML=this.responseText;
      //document.getElementById("spouse_name").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","ajax_data_return.php?q="+spouse_id,true);
  xmlhttp.send();
}




window.onload = function()  {

	var spouse_id= document.getElementById("spouse_id").value;
  if (spouse_id.length==0) {
    document.getElementById("spouse_name").innerHTML="";
    document.getElementById("spouse_name").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("spouse_name").innerHTML=this.responseText;
      //document.getElementById("spouse_name").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","ajax_data_return.php?q="+spouse_id,true);
  xmlhttp.send();
}


var inputs = document.getElementsByTagName("INPUT");
for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = 
        <?php  if($_SESSION['status_viva_after']=="approved"){echo "true" ; }   else{echo "false"; }?>   ;

}
</script>

</body>
</html>
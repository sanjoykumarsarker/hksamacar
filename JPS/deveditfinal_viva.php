<?php session_start();?>
<!DOCTYPE html>

<html>
 
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>
h3:hover {
   background-color: yellow;
   color:red;
   font-size: 30px;
   font-weight: bold;
   
}
 </style>
 
<title>
Registration
</title>
</head>
<body>
<br><br><br><br><br> 
<div style= "text-align:center";>
<?php
 
	
   $reg = $_POST['reg'];
   $bname = $_POST['bname'];
  $ename = $_POST['ename'];
  $spouse_name = $_POST['spouse_name'];
  $spouse_id = $_POST['spouse_id'];
   $age = $_POST['age'];
   $address = $_POST['address'];
   $phone = $_POST['phone'];
   $service = $_POST['service'];
 $gender = $_POST['gender'];
   $education = $_POST['education'];
   $mstatus = $_POST['mstatus'];
   $nprefer = $_POST['nprefer'];
   $istatus1 = $_POST['istatus1'];
   $istatus2 = $_POST['istatus2'];
   $comments = $_POST['comments'];
   


    $four_principles = $_POST['four_principles'];
    $sixteen_rounds = $_POST['sixteen_rounds'];
    $shelter_date = $_POST['shelter_date'];
    $councillor = $_POST['councillor'];


    $bhoga = $_POST['bhoga'];
    $tilaka = $_POST['tilaka'];
    $tulasi = $_POST['tulasi'];
    $guru_parampara = $_POST['guru_parampara'];
    $guru_puja = $_POST['guru_puja'];
    $guruvastakama = $_POST['guruvastakama'];

   
    $book_gita = $_POST['book_gita'];
    $book_bhagabatam = $_POST['book_bhagabatam'];
     $book_bhaktirasamrtasindhu = $_POST['book_bhaktirasamrtasindhu'];
    $book_teaching_lord_chaitanya = $_POST['book_teaching_lord_chaitanya'];
    $book_shrila_prabhupada = $_POST['book_shrila_prabhupada'];
    $qs1_importance_diksa = $_POST['qs1_importance_diksa'];
    $qs2_importance_four_principles = $_POST['qs2_importance_four_principles'];
    $qs3_importance_chanting = $_POST['qs3_importance_chanting'];
    $qs4_concept_spiritual_teacher_master = $_POST['qs4_concept_spiritual_teacher_master'];
    $qs5_concept_prabhupada = $_POST['qs5_concept_prabhupada'];
    $qs6_concept_gita = $_POST['qs6_concept_gita'];
     $mangalaroti = $_POST['mangalaroti'];
    $result_viva = $_POST['result_viva'];
    $comments_viva = $_POST['comments_viva'];

    date_default_timezone_set("Asia/Dhaka");

   $viva_time = date("Y-m-d h:i:sa");
   
  

   $viva_examiner= $_SESSION['viva_id'];
//$_SESSION['user_name']=$user_name;
 $status_viva=$_SESSION['status_viva_after'];

    



 $event_viva=$status_viva."by".$viva_examiner."on".$viva_time.",";


 
 
 

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
 
$sqlu= "UPDATE reg SET bname='$bname',ename='$ename',spouse_name='$spouse_name',spouse_id='$spouse_id',age='$age',address='$address',phone='$phone',
		service='$service',gender='$gender',education='$education',mstatus='$mstatus',nprefer='$nprefer',
		istatus1='$istatus1',isinitiated='$istatus2',comments='$comments',
        
        four_principles=   '$four_principles',
        sixteen_rounds =  '$sixteen_rounds',
        shelter_date=  '$shelter_date ',
        bhoga=   '$bhoga', 
        tilaka = '$tilaka' ,
        tulasi ='$tulasi' ,
        guru_parampara='$guru_parampara' ,
        guru_puja = '$guru_puja',
        guruvastakama = '$guruvastakama',


	book_gita ='$book_gita',	
		book_bhagabatam	='$book_bhagabatam',
		book_bhaktirasamrtasindhu='$book_bhaktirasamrtasindhu',
    book_teaching_lord_chaitanya='$book_teaching_lord_chaitanya',
		book_shrila_prabhupada	='$book_shrila_prabhupada',
		qs1_importance_diksa='$qs1_importance_diksa',	
	qs2_importance_four_principles=	'$qs2_importance_four_principles',
	qs3_importance_chanting	='$qs3_importance_chanting',
		qs4_concept_spiritual_teacher_master='$qs4_concept_spiritual_teacher_master',	
	qs5_concept_prabhupada=	'$qs5_concept_prabhupada',
	qs6_concept_gita	='$qs6_concept_gita',
		mangalaroti	='$mangalaroti',
	councillor	='$councillor',
	comments_viva	='$comments_viva',
		result_viva=	'$result_viva',
	status_viva	='$status_viva',
		viva_time	='$viva_time',
	viva_examiner	='$viva_examiner',
		event_viva=concat(event_viva,'$event_viva')


        
         WHERE reg= '$reg'";

$reg_session=$_SESSION['reg'];
if($_SESSION['status_viva_after']=="approved")
{


   $sqlu= "UPDATE reg SET 
   status_viva	='$status_viva',
  viva_time	='$viva_time',
viva_examiner	='$viva_examiner',
  event_viva=concat(event_viva,'$event_viva')


          
       WHERE reg= '$reg_session'";
 
}

else{ 
  $sqlu_date= "UPDATE date_set SET bname='$bname',ename='$ename'  WHERE reg= '$reg'";
  $conn->query($sqlu_date);

  }
 
  
  $conn->query($sqlu);
  
 
 
$conn->close();

?>



<br><br><br> <br><br>	
<a href="javascript:window.open('','_self').close();" style= "text-align:center; text-decoration:none;"; > <h3>Correction Done. <br> Thanks</h3> </a>





</body>

</html>
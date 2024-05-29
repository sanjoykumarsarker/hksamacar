<?php



 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

echo $temple_id=$_POST['temple_id'];

echo $ename=$_POST['ename'];
echo $nname=$_POST['nname'];
echo $fname=$_POST['fname'];
echo $mname=$_POST['mname'];
echo $dob=$_POST['dob'];
 echo $gender=$_POST['gender'];
echo $education=$_POST['education'];
echo $devotional_service=$_POST['devotional_service'];
echo $occupation=$_POST['occupation'];
echo $nationality=$_POST['nationality'];
echo $blood_group=$_POST['blood_group'];
echo $phone1=$_POST['phone1'];
echo $phone2=$_POST['phone2'];
echo $photo_id=$_POST['photo_id'];
echo $email=$_POST['email'];
echo $temple_id=$_POST['temple_id'];

echo $present_house=$_POST['present_house'];
echo $present_postoffice=$_POST['present_postoffice'];
echo $present_policestation=$_POST['present_policestation'];
echo $present_district=$_POST['present_district'];
echo $present_province=$_POST['present_province'];
echo $present_country=$_POST['present_country'];
echo $permanent_house=$_POST['permanent_house'];
echo $permanent_postoffice=$_POST['permanent_postoffice'];
echo $permanent_policestation=$_POST['permanent_policestation'];
echo $permanent_district=$_POST['permanent_district'];
echo $permanent_province=$_POST['permanent_province'];
echo $permanent_country=$_POST['permanent_country'];
echo $marital_status=$_POST['marital_status'];

if($_POST['spouse_name']==null||$_POST['spouse_name']="")
{

$spouse_name="";

}
else{

  $spouse_name=$_POST['spouse_name'];


}
 


if($_POST['spouse_kc_status']==null||$_POST['spouse_kc_status']="")
{

$spouse_kc_status="";

}
else{

  $spouse_kc_status=$_POST['spouse_kc_status'];


}
 

if($_POST['children_details']==null||$_POST['children_details']="")
{

$children_details="";

}
else{

  $children_details=$_POST['children_details'];


}




echo $iskcon_family=$_POST['iskcon_family'];
echo $dovotee_relative=$_POST['dovotee_relative'];
echo $temple_living=$_POST['temple_living'];
echo $is_namhatta=$_POST['is_namhatta'];
echo $is_bhaktivriksa=$_POST['is_bhaktivriksa'];
if($is_namhatta==null||$is_bhaktivriksa==null){
$membership ="";
}

if($is_namhatta!=null&&$is_bhaktivriksa==null){
$membership =$is_namhatta;
}
if($is_namhatta==null||$is_bhaktivriksa!=null){
$membership =$is_bhaktivriksa;
}
if($is_namhatta!=null||$is_bhaktivriksa!=null){
$membership =$is_namhatta.$is_bhaktivriksa;
}


echo $related_temple=$_POST['related_temple'];
  $kc_connect_year=$_POST['kc_connect_year'];
  $kc_connect_month=$_POST['kc_connect_month'];



$kc_connected=((int)$kc_connect_year*12)+(int)($kc_connect_month);


  $chant_hk_year=$_POST['chant_hk_year'];
  $chant_hk_month=$_POST['chant_hk_month'];



$mahamantra_chant = ((int)$chant_hk_year*12)+$chant_hk_month;

  $sixteen_round_year=$_POST['sixteen_round_year'];
  $sixteen_round_month=$_POST['sixteen_round_month'];

$sixteen_chant=((int)$sixteen_round_year*12)+ (int)$sixteen_round_month;

  $four_prin_year=$_POST['four_prin_year'];
 $four_prin_month=$_POST['four_prin_month'];



$four_principles=((int)$four_prin_year)*12+$four_prin_month;



echo $shelter_date=$_POST['shelter_date'];
echo $shelter_place=$_POST['shelter_place'];
echo $shiksaguru_name=$_POST['shiksaguru_name'];
echo $guiding_dev_name=$_POST['guiding_dev_name'];
echo $guiding_dev_phone=$_POST['guiding_dev_phone'];
echo $name_prefer=$_POST['name_prefer'];
echo $recommendation_sheet=$_POST['recommendation_sheet'];

 
 $checklist=$_POST['practical_checklist'];
echo $philosophocal_test=$_POST['philosophocal_test'];
echo $personal_questionnaire=$_POST['personal_questionnaire'];
echo $essay=$_POST['essay'];
echo $initiation_oath=$_POST['initiation_oath'];
echo $interview_appearance=$_POST['interview_appearance'];
echo $idc_certificate=$_POST['idc_certificate'];
echo $examiner_name=$_POST['examiner_name'];
echo $examiner_phone=$_POST['examiner_phone'];
echo $recommend_designation=$_POST['recommend_designation'];
echo $recommended_by=$_POST['recommended_by'];
echo $witness1=$_POST['witness1'];
echo $witness2=$_POST['witness2'];


echo $biodata=$_POST['biodata'];

 

   $permanent_post_code=$_POST['permanent_postcode'];
$present_post_code=$_POST['present_postcode'];;
 $harinam_reg_max="";
$harinam_reg="";
 $aa=array();
 $date=date('Y');
// Create connection
$conn0 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn0->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql0 = "SELECT  harinam_reg FROM registration where harinam_reg like 'H".$temple_id.$date."____' ";
$result0 = $conn0->query($sql0);

if ($result0->num_rows > 0) {
     while($row0 = $result0->fetch_assoc()) {
        array_push($aa,substr($row0["harinam_reg"],11,4));  
    }

$harinam_reg_max=max($aa);
$harinam_reg_max_plus=$harinam_reg_max+1;


if($harinam_reg_max_plus<10){
$harinam_reg="H".$temple_id.date('Y')."000".$harinam_reg_max_plus;
}

if($harinam_reg_max_plus>9&&$harinam_reg_max_plus<100){
$harinam_reg="H".$temple_id.date('Y')."00".$harinam_reg_max_plus;
}
if($harinam_reg_max_plus>99&&$harinam_reg_max_plus<1000){
$harinam_reg="H".$temple_id.date('Y')."0".$harinam_reg_max_plus;
}
if($harinam_reg_max_plus>999&&$harinam_reg_max_plus<10000){
$harinam_reg="H".$temple_id.date('Y').$harinam_reg_max_plus;
}


} else {
   $harinam_reg="H".$temple_id.date('Y')."0001";
}

$conn0->close();





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}








// prepare and bind
$stmt = $conn->prepare("INSERT INTO registration(harinam_reg,en_name ,	native_name ,	father_name ,	mother_name ,	date_of_birth ,	gender, 	education ,	devotional_service ,	occupation, 	nationality ,	blood_group ,	phone1 ,	phone2, 	photo_id ,	email, temple_id,	present_house ,	present_post, 	present_post_code ,	present_police_station ,	present_district ,	present_province ,	present_country, 	permanent_house ,	permanent_post, 	permanent_post_code ,	permanent_police_station ,	permanent_district ,	permanent_province ,	permament_country ,	marital_status ,	spouse_name ,	spouse_kc ,	children_description ,	iskcon_family, 	devotee_relative ,	living_temple ,	membership ,	related_temple ,	kc_connected ,	mahamantra_chant ,	sixteen_chant ,	four_principles ,	shelter_date ,	shelter_place, 	siksaguru_name, 	guiding_devotee ,	guiding_devotee_phone ,	preference_name_type ,	checklist ,	examiner_name ,	examiner_phone, 	hn_recommend, 	hn_recommend_designation ,	hn_witness1, 	hn_witness2) VALUES (?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?,?, ?, ?,?,?)");

if ( false===$stmt ) {
  // and since all the following operations need a valid/ready statement object
  // it doesn't make sense to go on
  // you might want to use a more sophisticated mechanism than die()
  // but's it's only an example
  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}


$stmt->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssss",$harinam_reg, $ename,	$nname ,	$fname,$mname,	$dob,	$gender, 	$education ,	$devotional_service ,	$occupation, 	$nationality ,$blood_group ,	$phone1 ,	$phone2, 	$photo_id ,	$email,$temple_id, 	$present_house ,	$present_postoffice, 	$present_post_code ,	$present_policestation ,	$present_district ,	$present_province ,	$present_country, 	$permanent_house ,	$permanent_postoffice, 	$permanent_post_code ,	$permanent_policestation ,	$permanent_district ,	$permanent_province ,	$permanent_country ,	$marital_status ,	$spouse_name ,	$spouse_kc_status ,	$children_details ,	$iskcon_family, 	$dovotee_relative ,	$temple_living ,	$membership ,	$related_temple ,	$kc_connected ,	$mahamantra_chant ,	$sixteen_chant ,	$four_principles ,	$shelter_date ,	$shelter_place, 	$shiksaguru_name, 	$guiding_dev_name ,	$guiding_dev_phone ,	$name_prefer ,	$checklist ,	$examiner_name ,	$examiner_phone, 	$recommend_designation, 	$recommended_by ,	$witness1, 	$witness2);

if ( false===$stmt ) {
  // again execute() is useless if you can't bind the parameters. Bail out somehow.
  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
}






$stmt->execute();
 
if ( false===$stmt ) {
  die('execute() failed: ' . htmlspecialchars($stmt->error));
}

echo "New records created successfully";

$stmt->close();
$conn->close();
 

?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Harinama Initiation Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>




<script>
function my(){

	//alert("kk");
}

</script>


<script>
var value0;

var value2;

	function my_function(val1,val2,val3){

						// alert(val1+val2+val3);


   document.getElementById("modal_name").innerHTML = val1;
 

value0=val3;
if(value2==null||value2==""){

value2=val2;	


}



   document.getElementById("modal_text").value = value2;


   // document.getElementById(val3).innerHTML = "opppp";


		//alert("my_function ok for "+val1+val2);


	}


</script>


<script>

function modal_function(){

 var mod_val=   document.getElementById("modal_text").value ;

 //alert(mod_val);
document.getElementById(value0).innerHTML = mod_val;
value2=mod_val;
 var val_all=[value2,value0];
 if (val_all.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "registration_ajax_data.php?q="+val_all, true);
        xmlhttp.send();
    } 
}
</script>





<script type="text/javascript">
  

function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "registration_ajax_data.php", true);
  xhttp.send();
}


</script>>
 

<body>
 <div id="demo">
<div id="txtHint">
</div>
  <!-- The Modal -->
  <div class="modal fade     " id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
         
        
        <!-- Modal body -->
        <div class="modal-body" id="modal_body">
  


<div class="container">
  <h2 id="modal_name"></h2>
 
    <div class="form-group">
    
      <input type="text" class="form-control" id="modal_text" placeholder="" name="email">
    </div>
   
    

    <!-- Modal footer -->
   <button type="button" onclick="loadDoc()">Change Content</button>
    <button type="submit" class="btn btn-primary"  data-dismiss="modal" onclick="modal_function()">Submit</button>


          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      


 
</div>













        </div>
        
    
        



      </div>
    </div>
  </div>



<div class="container">
  <h4>Personal Information of <?php echo $ename;?></h4>
  <p>Please Read Data Carefully.You Can EDIT Data</p>
  <table class="table table-bordered    table-striped table-hover">
    <thead>
      <tr>
        <th>Info</th>
        <th>Data</th>
    
      </tr>
    </thead>
    <tbody>
      <tr>
        <td  >Name</td>
        <td style="color:purple" data-toggle="modal" data-target="#myModal" id="en_name" onclick="my_function('Name','<?php echo  $ename; ?>','en_name');"><?php echo  $ename; ?></td>
       </tr>
      

 
       <tr>
       <td> Native Name</td>
        <td><?php echo  $nname; ?></td>
       </tr>


       <tr>
       <td>Father's Name</td>
        <td><?php echo $fname; ?></td>
       </tr>
      

       <tr>
       <td>Mother's Name</td>
        <td><?php echo  $mname; ?></td>
       </tr>
      

       <tr>
       <td>Date of Birth</td>
        <td><?php echo  $dob; ?></td>
       </tr>
      

       <tr>
       <td>Gender</td>
        <td><?php echo  $gender; ?></td>
       </tr>
      

       <tr>
       <td>Education</td>
        <td><?php echo  $education; ?></td>
       </tr>
      

       <tr>
       <td>Devotional Service</td>
        <td><?php echo  $devotional_service; ?></td>
       </tr>
      

       <tr>
       <td>Occupation</td>
        <td><?php echo  $occupation; ?></td>
       </tr>
      

       <tr>
       <td>Nationality</td>
        <td><?php echo  $nationality; ?></td>
       </tr>
      

       <tr>
       <td>Blood Group</td>
        <td><?php echo  $blood_group; ?></td>
       </tr>
      

       <tr>
       <td>Phone(1)</td>
        <td><?php echo  $phone1; ?></td>
       </tr>
      

       <tr>
       <td>Phone(2)</td>
        <td><?php echo  $phone2; ?></td>
       </tr>
      

       <tr>
       <td>Photo ID(NID/Passport)</td>
        <td><?php echo  $photo_id; ?></td>
       </tr>
      

       <tr>
       <td>Email</td>
        <td><?php echo  $email; ?></td>
       </tr>
      

       <tr>
       <td>Present House</td>
        <td><?php echo  $present_house; ?></td>
       </tr>
      

       <tr>
       <td>Present Postoffice</td>
        <td><?php echo  $present_postoffice; ?></td>
       </tr>
      

       <tr>
       <td>Present Policestation</td>
        <td><?php echo  $present_policestation; ?></td>
       </tr>
      

       <tr>
       <td>Present District</td>
        <td><?php echo  $present_district; ?></td>
       </tr>
      

       <tr>
       <td>Present Province/State/Division</td>
        <td><?php echo  $present_province; ?></td>
       </tr>
      

       <tr>
       <td>Present Country</td>
        <td><?php echo  $present_country; ?></td>
       </tr>






       
      

       <tr>
       <td>Permanent House</td>
        <td><?php echo  $permanent_house; ?></td>
       </tr>
      

       <tr>
       <td>Permanent Postoffice</td>
        <td><?php echo  $permanent_postoffice; ?></td>
       </tr>
      

       <tr>
       <td>Permanent Policestation</td>
        <td><?php echo  $permanent_policestation; ?></td>
       </tr>
      

       <tr>
       <td>Permanent District</td>
        <td><?php echo  $permanent_district; ?></td>
       </tr>
      

       <tr>
       <td>Permanent Province/State/Division</td>
        <td><?php echo  $permanent_province; ?></td>
       </tr>
      

       <tr>
       <td>Permanent Country</td>
        <td><?php echo  $permanent_country; ?></td>
       </tr>

















       <tr>
       <td>Marital Status</td>
        <td><?php echo  $marital_status; ?></td>
       </tr>
       
      


       <tr>
       <td>Spouse Name</td>
        <td><?php echo  $spouse_name; ?></td>
       </tr>
       
      

       <tr>
       <td>Spouse Krishna Conscious Status</td>
        <td><?php echo  $spouse_kc_status; ?></td>
       </tr>
       
      

       <tr>
       <td>Children Details</td>
        <td><?php echo  $children_details; ?></td>
       </tr>
       
      

       <tr>
       <td>Iskcon Family</td>
        <td><?php echo  $iskcon_family; ?></td>
       </tr>
       
      

       <tr>
       <td>Dovotee Relative</td>
        <td><?php echo  $dovotee_relative; ?></td>
       </tr>
       
      

       <tr>
       <td>Temple Living</td>
        <td><?php echo  $temple_living; ?></td>
       </tr>
       
      

       <tr>
       <td>Namhatta Member</td>
        <td><?php echo  $is_namhatta; ?></td>
       </tr>
       
      

       <tr>
       <td>Bhaktivriksa Member</td>
        <td><?php echo  $is_bhaktivriksa; ?></td>
       </tr>
       
      

       <tr>
       <td>Related Temple</td>
        <td><?php echo  $related_temple; ?></td>
       </tr>
       
      

       <tr>
       <td>Krishna Conscious Connect Year</td>
        <td><?php echo  $kc_connect_year; ?></td>
       </tr>
       
      

       <tr>
       <td>Krishna Conscious Connect Month</td>
        <td><?php echo  $kc_connect_month; ?></td>
       </tr>
       
      

       <tr>
       <td>ChantvHare Krishna From Year</td>
        <td><?php echo  $chant_hk_year; ?></td>
       </tr>
       
      

       <tr>
       <td>ChantvHare Krishna From Month</td>
        <td><?php echo  $chant_hk_month; ?></td>
       </tr>
       
      

       <tr>
       <td>Sixteen Round From Year</td>
        <td><?php echo  $sixteen_round_year; ?></td>
       </tr>
       
      

       <tr>
       <td>Sixteen Round From Month</td>
        <td><?php echo  $sixteen_round_month; ?></td>
       </tr>
       
      

       <tr>
       <td>Four Principles From Year</td>
        <td><?php echo  $four_prin_year; ?></td>
       </tr>
       
      

       <tr>
       <td>Four Principles From Month</td>
        <td><?php echo  $four_prin_month; ?></td>
       </tr>
       
      

       <tr>
       <td>Shelter Date</td>
        <td><?php echo  $shelter_date; ?></td>
       </tr>
       
      

       <tr>
       <td>Shelter Place</td>
        <td><?php echo  $shelter_place; ?></td>
       </tr>
       
      

       <tr>
       <td>Name of Shiksaguru</td>
        <td><?php echo  $shiksaguru_name; ?></td>
       </tr>
       
      

       <tr>
       <td>Name of Guiding Devotee</td>
        <td><?php echo  $guiding_dev_name; ?></td>
       </tr>
       
      

       <tr>
       <td>Guiding Devotee's Phone</td>
        <td><?php echo  $guiding_dev_phone; ?></td>
       </tr>
       
      

       <tr>
       <td>Name Preference</td>
        <td><?php echo  $name_prefer; ?></td>
       </tr>
       
      

       <tr>
       <td>Recommendation Sheet</td>
        <td><?php echo  $recommendation_sheet; ?></td>
       </tr>
       
      

       <tr>
       <td>Biodata</td>
        <td><?php echo  $biodata; ?></td>
       </tr>
       
      

      

       <tr>
       <td>Personal Questionnaire</td>
        <td><?php echo  $personal_questionnaire; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Essay</td>
        <td><?php echo  $essay; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Initiation Oath</td>
        <td><?php echo  $initiation_oath; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Interview Appearance</td>
        <td><?php echo  $interview_appearance; ?></td>
       </tr>
       
      
      

       <tr>
       <td>IDC Certificate</td>
        <td><?php echo  $idc_certificate; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Name of Examiner</td>
        <td><?php echo  $examiner_name; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Examiner Phone</td>
        <td><?php echo  $examiner_phone; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Recommend Designation</td>
        <td><?php echo  $recommend_designation; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Recommended By</td>
        <td><?php echo  $recommended_by; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Witness1</td>
        <td><?php echo  $witness1; ?></td>
       </tr>
       
      
      

       <tr>
       <td>Witness2</td>
        <td><?php echo  $witness2; ?></td>
       </tr>
       
      
      
 
       
      
    </tbody>
  </table>


</div>

</body>
</html>

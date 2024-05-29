<?php session_start();?>
<!DOCTYPE html>
<html>
<head>



  <meta charset="utf-8">
 
 <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
 <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 
   <script>
function myFunction() {
	document.getElementsByClassName("cl_form")[0].submit();
}
</script>

<style type="text/css">


body, html, .container-fluid {
     height: 100%;
	 background-color: cornsilk;
	 
}

table, tr,th, td {
    border: 0.5px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 2px;
    text-align: left;
}
 
/* ---Start of Wrapper style ---- */

#wrapper	{
		background-color: #787878;
	}

.card-header	{
	background-color: #3c3c3c;
	max-height: 40px;
	padding: 5px;
	}

.card-link {	
	color: white;
	}
	
.card-link:Hover {	
	color: yellow;
	}
	
.card-body {
	padding: 5px;
	background-color: #f0f0f0;
	
	}
	
.card-body a {	
	color: black;
	}




/* ---end of Wrapper style ---- */





</style>

</head>
 
<body>

<div  >
			<table >
			  <thead>
				<tr>
 					<th>Ag No.</th>
					 <th>VP No.</th>
					 <th>QTY</th>
				 
 					<th>Name</th>
					<th>District</th>
					<th style="width: 2in;">Mobile</th>
					
 				</tr>
			  </thead>
		      <tbody>
				 

  
  <?php
  include "function.php";
    $vp_range=$_POST['vp_range'];
 $issue_no=intval($_POST['issue_no']);

$vp_range_arr=explode(",",$vp_range);
 $vp_range_size=sizeof($vp_range_arr);




$range_all=array();



for($i=0;$i<$vp_range_size;$i++){

  

  if (strpos($vp_range_arr[$i],"-") !== false) {
	$vp_range_arr_1=explode("-",$vp_range_arr[$i]);
	   

	for($j=$vp_range_arr_1["0"];$j<=$vp_range_arr_1["1"];$j++){


		array_push($range_all,$j);	

	}


  }
  else{
	array_push($range_all,$vp_range_arr[$i]);

  }



}

  
 
 if(count($range_all) !== count(array_unique($range_all))){
    echo "<h2 style='background-color:red'>Duplicate VP NO. Found!</h2>";


    exit();

}



$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

 
   {

// Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");
$sql_all = "SELECT idn,cust_name,transid,Dr,VPNo,vername,cust_id,phone,total_donation,paid,due,transaction_id,Rdate,vername,agcpy,Comment,address,donation FROM tblIssue  where  sent_mode='vpp' and vername=".$issue_no." order by cast(agcpy as UNSIGNED) asc ";
$result_all = $conn_all->query($sql_all);

if ($result_all->num_rows > 0) {
	// output data of each row
	$k=0;

	echo '
<form class="cl_form" method ="post"  action="hks_vpp_entry_data.php">';

    while($row = $result_all->fetch_assoc()){

	 
           

		  $vp_k="vp".$k;
		  $id_k="id".$k;

			if(strlen($range_all[$k])==4){

				$vp_num="00".intval($range_all[$k]);
			}
			
			if(strlen(intval($range_all[$k]))==5){
			
				$vp_num="0".intval($range_all[$k]);
			}
			if(strlen(intval($range_all[$k]))==6){
			
				$vp_num=intval(strval($range_all[$k]));
			}
 
echo '<tr><td>'.$row["transid"].'</td>
<td><input type="input" name="'.strval($vp_k).'" style="background-color: orange; width:100px; text-align:center;" value="'.$vp_num.'"></td>

<td>'.$row["agcpy"].'</td>
 
 
 
  
<td>'.id_name(intval($row["transid"])).'</td>

<td>'.dist_en_bn(id_dist(intval($row["transid"]))).'</td>
<td style="width: 2in;">'.id_phone(intval($row["transid"])).'</td>


 

 <input type="hidden" name="'.strval($id_k).'" value="'.$row["transaction_id"].'">
  

 
	
	 
	</tr>

';

$k++;
	}
	

	echo '<input type="hidden" name="k" value="'.$k.'">

	<hr>
	<button  type="submit" >OK</button>
	</form>
	
	 
	
	';



    
} else {
    echo "0 results";
}
$conn_all->close();

  }
 ?>

</tbody>
</table>
</div> 
 

</body>
</html>
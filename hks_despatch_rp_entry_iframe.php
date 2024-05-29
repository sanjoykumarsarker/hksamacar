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

function totalcount(  t ) {



var count=0;

   var v= document.getElementById(t).value;


   var res = v.split(",");

var alen=res.length;


 

for(var i=0;i<alen;i++){


  var dif =res[i].split("-") ;

 
 

var df=dif[1]-dif[0]+1;
if(df>0){

    count=count+df;


}

else{

    count=count+1;

}


 



}


alert("Total:"+count);


 }



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

.d1,.d2 {
    display: inline-block;
  }


/* ---end of Wrapper style ---- */





</style>

</head>
 
<body>

<div  >
		





<?php
  include "function.php";
  $print_issue=intval($_POST['issue_no']);
  $column_range=intval($_POST['column_range']);

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

$sum_post1=0;
$sum_post2=0;
$sum_post3=0;

$sum_cour1=0;
$sum_cour2=0;
$sum_cour3=0;
?>


<div class="page">
<div style="text-align:center;">
<h5> মাসিক হরেকৃষ্ণ সমাচার - BS <?php echo $print_issue ?></h5></div>

<div class="d1">

<table class="table table-bordered" style="width:100%" >

<?php 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT transid,vername, SentDate,agcpy ,sent_mode,count(transid) FROM tblIssue where (sent_mode='rp' AND vername =".$print_issue." ) GROUP BY agcpy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<tr><th colspan="3">পোস্ট অফিস</th></tr><tr><th>বিবরণ</th><th>সংখ্যা</th><th>মোট</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["agcpy"]>19&&$row["agcpy"]<100){

            $qty=2;
        }
        if($row["agcpy"]>99){

            $qty=3;
        }
        
        $sum_post1=$sum_post1+$row["count(transid)"]; $sum_post2=$sum_post2+doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"]));
        $sum_post3=$sum_post3+doubleval($row["count(transid)"])* $qty;


        echo '

<tr><td>'.$row["agcpy"].' C</td><td>'.$row["count(transid)"].'</td>   <td>'.quan_range($print_issue,$row["agcpy"]).' </td></tr>
 



 
    
';

    }

}

echo '<tr><td> SUM</td><td> </td> <td> </td>  </tr>';

$conn->close();
?>


 




   











</table>
<br><br>


</div>
<div class="d1">



			<table class="table table-bordered" style="	background-color: #70f0ff;
" >
			  <thead>
				<tr>
 					<th>Despatch No.</th>
					 <th>VP Range</th>
					 <th>Total</th>	 
					
 				</tr>
			  </thead>
		      <tbody>
				 

 
    

   
<form class="cl_form" method ="post" target="myframe"  action="hks_despatch_rp_entry_data.php"> 

 
 <?php 
for($n=1;$n<=$column_range;$n++){

    $despatch="despatch".$n;
    $range="range".$n;

 
           

		
 
echo '<tr> 
<td><input type="text" class="form-control" name="'.strval($despatch).'" style="background-color: yellow; width:200px; text-align:center;" value="'.$n.'"></td>
 
 
 
 
  
 

 <td><input id="'.strval($despatch).'" type="text" class="form-control"  name="'.strval($range).'" style="  width:600px; text-align:center;"  value=""></td>
 <td> <button class="btn btn-default" type="button" value="'.strval($despatch).'" onclick="totalcount(this.value)" >Count</button></td>

 	</tr>

 
	

 <input type="hidden" name="n" value="'.$n.'">
 <input type="hidden" name="vername" value="'.$print_issue.'">

    ';
    
}

 
?>

	
	 
	
	 



    


</tbody>
</table>

<br><br>
</div>
<button style="text-align:center" class="btn btn-primary" type="submit" >OK</button>
	</form>









                <iframe name="myframe"height="350" width=100%  style="border:0" style="overflow-y:scroll; overflow-x:scroll;"></iframe>


</div> 
 



 





 









 

</body>
</html>
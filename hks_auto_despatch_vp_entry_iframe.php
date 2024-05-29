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
.d1,.d2 {
    display: inline-block;
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
		





<?php
  include "function.php";
  $print_issue=intval($_POST['issue_no']);
  $column_range=intval($_POST['column_range']);


  $vp_range_arr=explode(",",$_POST['column_range']);
  $vp_range_size=sizeof($vp_range_arr);
 
 
 $total_cp=0;
 
 $vp_range_sum=0;
 
 $vp_range_on=array();

 
 for($i=0;$i<$vp_range_size;$i++){


    $vp_range_sum= $vp_range_sum+intval($vp_range_arr[$i]);

    array_push($vp_range_on,$vp_range_sum);
 }
//print_r($vp_range_on);
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";
$except="";
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

<div class="d2">

<table class="table table-bordered" style="width:100%" >

<?php 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT transid,vername, SentDate,agcpy ,count(transid) FROM tblIssue where sent_mode='vp' AND vername =".$print_issue."  GROUP BY agcpy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<tr><th colspan="3">পোস্ট অফিস</th></tr><tr><th>বিবরণ</th><th>সংখ্যা</th><th>মোট</th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {



        $total_cp=$total_cp+$row["count(transid)"];
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

echo '<tr><td> SUM</td><td>'.$total_cp.' </td> <td> </td>  </tr>';

$conn->close();
?>


 



  











</table>
 
</div>
 
   <div class="d2">


   <?php
echo "Total:".$vp_range_sum."<hr>";

?>
<table class="table table-bordered" style="	background-color: #70f0ff;
" >
  <thead>
    <tr>
         <th>Despatch No.</th>
         <th>VP Range</th>
         <th>Quantity</th>
         <th>Copy</th>	 
        
     </tr>
  </thead>
  <tbody>
     





<form class="cl_form" method ="post" target="myframe"  action="hks_despatch_vp_auto_entry_data.php"> 


<?php


    // Create connection
$conn_all = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_all->connect_error) {
    die("Connection failed: " . $conn_all->connect_error);
}
mysqli_set_charset($conn_all,"utf8");
 
$sql_all = "SELECT transid,vername, VPNo,SentDate,agcpy  FROM tblIssue where sent_mode='vp' AND vername =".$print_issue." order by cast(VPNo as unsigned)  ";

$result_all = $conn_all->query($sql_all);
$hhh=1;

$exc=0;
if ($result_all->num_rows > 0) {
    
    // output data of each row

    $rr=1;
    $ll=0;

    $ss=1;
$mm=0;
   echo ' <input type="hidden" name="vername" value="'.$print_issue.'">';
$vvpp=0;
    while($row = $result_all->fetch_assoc()){
           
        

        if(intval($vvpp+1)!=intval($row["VPNo"])){
            $exc=1;
             $except=$except.'-'.intval($vvpp).'<>'.intval($row["VPNo"]);
        }
        if($hhh==1){
            $except='';
            $arr_on="0".intval($row["VPNo"]-1);
           // $vvpp=$row["VPNo"];;
        }
    
        $hhh++;
//echo $row["VPNo"];
//print_r($vp_range_on);
//echo "-".$ll."<br>";
$val1="j".$mm;
$val2="k".$mm;
echo '

<input type="hidden" name="'.$val1.'" value="'.$row["VPNo"].'">
<input type="hidden" name="'.$val2.'" value="'.$rr.'">

';
if (in_array($ss, $vp_range_on)){

    
 if($exc==1){
 echo '
 
 <tr> 
<td><input type="button" class="form-control" name="" style="background-color: yellow; width:100px; text-align:center;" value="'.$rr.'"></td>
 
 <td><input id="" type="button" class="form-control"  name=" " style="  width:350px; text-align:center;"  value="0'.intval($arr_on+1).$except."-0".intval($row["VPNo"]).'"></td>
 
 <td><input type="button" class="form-control" name="" style="background-color: yellow; width:100px; text-align:center;" value="'.$vp_range_arr[$rr-1].'"></td>
 <td><input id="" type="text" class="form-control"  name=" " style="  width:500px;  "  value="'.vp_range($print_issue,intval($arr_on+1),intval($row["VPNo"]),'vp').'"></td>';
 $exc=0; 

}
 else{
    echo '
 
    <tr> 
   <td><input type="button" class="form-control" name="" style="background-color: yellow; width:100px; text-align:center;" value="'.$rr.'"></td>
    
    <td><input id="" type="button" class="form-control"  name=" " style="  width:350px; text-align:center;"  value="0'.intval($arr_on+1)."-0".intval($row["VPNo"]).'"></td>
    
    <td><input type="button" class="form-control" name="" style="background-color: yellow; width:100px; text-align:center;" value="'.$vp_range_arr[$rr-1].'"></td>
    <td><input id="" type="text" class="form-control"  name=" " style="  width:500px;  "  value="'.vp_range($print_issue,intval($arr_on+1),intval($row["VPNo"]),'vp').'"></td>';
    
 }
  echo '
 </tr>

    ';
   
    $rr=$rr+1;
     $arr_on=$row["VPNo"];
}

            $vvpp=$row["VPNo"];;

$ll++;
$mm=$mm+1;

$ss++;
    }
    echo ' <input type="hidden" name="number" value="'.$vp_range_sum.'">';
 
} else {
    echo "0 results";
}
$conn_all->close();
?>


</tbody>
</table>

<br><br>
</div>

<?php 
if($total_cp!=$vp_range_sum){

   echo "<script> alert('Input Does not Match')</script>";
}
else{


    echo '<button style="text-align:center" class="btn btn-danger"   type="submit" >OK</button>
    ';
}


?>

</form>

                <iframe name="myframe"height="400" width=100%  style="border:0" style="overflow-y:scroll; overflow-x:scroll;"></iframe>


</div> 
 



 


 

 









 

</body>
</html>
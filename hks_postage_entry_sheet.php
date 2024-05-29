<?php
session_start();
  $print_issue=$_POST["issue_number"];

?>

<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Binding Summary</title>


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
 
 
</head>

<style>

    .page {
        padding: 10px 10px 20px 10px;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
	
	
table,th, tr, td {
    border: 0.1px solid black;
    border-collapse: collapse;
}
tr, th, td {
    padding: 0px 0px 0px 0px;
    text-align: Center;
}
tr:nth-child(even) {background-color: #f2f2f2;}

 @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }


</style>

<body >

<?php
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

<script type="text/javascript">
    window.addEventListener('keydown', function(e) {
        if (e.keyIdentifier == 'U+000A' || e.keyIdentifier == 'Enter' || e.keyCode == 13) {
            if (e.target.nodeName == 'INPUT' && e.target.type == 'text') {
                e.preventDefault();
                return false;
            }
        }
    }, true);
    
    window.onload=function() {
    
        window.addEventListener('message', function(event){
            $('.alert').addClass('show');
            $('.alert').find('#alertData').html(event.data);
        });
        
        $('.alert').find('#dismissAlert').click(function() {
            $('.alert').removeClass('show');
            // $('.alert').alert('close');            
        })
    }
</script>
 


<div class="page">

<div class="alert alert-success fade" role="alert">
  <span class="h5" id="alertData"></span>
  <button type="button" class="close" id='dismissAlert' aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div style="text-align:center;">
<h5> মাসিক হরেকৃষ্ণ সমাচার - BS <?php echo $print_issue ?></h5></div>



<div class="form-group">
<table style="width:100%" >

<?php 
$conn3 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn3->connect_error) {
    die("Connection failed: " . $conn3->connect_error);
} 

$sql = "SELECT transid,vername,avg(weight),avg(postage), SentDate,agcpy ,count(transid) FROM tblIssue where (transid >10000  AND vername =".$print_issue." ) GROUP BY agcpy";
$result = $conn3->query($sql);

if ($result->num_rows > 0) {
    echo '<tr>
             <th colspan="8">গ্রাহক</th>
          </tr>
          <tr>
             <th>বিবরণ</th>
             <th>সংখ্যা</th>
             <th>মোট</th>
             <th>ওজন</th>
             <th>মোট</th>
             <th>টিকিট</th>
             <th>মোট</th>
           </tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {





        if($row["agcpy"]>19&&$row["agcpy"]<100){

            $qty=2;
        }
        if($row["agcpy"]>99){

            $qty=3;
        }
        
        $sum_sub1=$sum_post1+$row["count(transid)"];
        $sum_sub2=$sum_post2+doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"]));
        $sum_sub3=$sum_post3+doubleval($row["count(transid)"])* $qty;


        echo '

<tr>
<td>'.$row["agcpy"].' C</td><td>'.$row["count(transid)"].'</td>
<td>'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td>

<form class=""   method="post"  target ="postage_entry_sheet_frame" action="hks_postage_entry_sheet_data.php">
<input type="hidden" name="agcpy"  value="'.$row["agcpy"].'" >

<input type="hidden" name="vername"  value="'.$print_issue.'" >
<td style="width: 100px;" ><input class="form-control" style="background-color: #DCDCDC;" name="b_weight" value="'.doubleval($row["avg(weight)"]).'" onblur="this.form.submit()" placeholder="Weight" type="text" /></td>
</form>

<td >'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td>

<form class=""   method="post"  target ="postage_entry_sheet_frame" action="hks_postage_entry_sheet_data.php">
<input type="hidden" name="agcpy"  value="'.$row["agcpy"].'" >

<input type="hidden" name="vername"  value="'.$print_issue.'" >
<td style="width: 120px;"><input class="form-control" style="background-color: #DCDCDC;" name="b_ticket" value="'.doubleval($row["avg(postage)"]).'" onblur="this.form.submit()" placeholder="Ticket Price" type="text" /></td>
</form>
<td>'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td></tr>
 



 
    
';

    }

}

echo '<tr><td>মোট</td><th>'.$sum_sub1.'</th><th>'.$sum_sub2.'</th><td></td><th></th><td></td><td></td></tr>';

$conn3->close();
?>



<?php 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT transid,vername, SentDate,agcpy ,avg(weight),avg(postage),count(transid) FROM tblIssue where (agcpy<71 and agcpy >19 and transid >99 AND transid <10000 AND vername =".$print_issue." ) GROUP BY agcpy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<tr><th colspan="8">পোস্ট অফিস</th></tr><tr><th>বিবরণ</th><th>সংখ্যা</th><th>মোট</th> <th>ওজন</th><th>মোট </th><th>টিকিট</th><th>মোট </th></tr>';
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

<tr><td>'.$row["agcpy"].'C</td>
<td>'.$row["count(transid)"].'</td>
<td>'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td> 
<form class=""   method="post"  target ="postage_entry_sheet_frame" action="hks_postage_entry_sheet_data.php">
<input type="hidden" name="agcpy"  value="'.$row["agcpy"].'" >

<input type="hidden" name="vername"  value="'.$print_issue.'" >
<td style="width: 100px;" ><input class="form-control" style="background-color: #DCDCDC;" name="b_weight" value="'.doubleval($row["avg(weight)"]).'" onblur="this.form.submit()" placeholder="Weight" type="text" /></td>
</form><td >'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td>

<form class=""   method="post"  target ="postage_entry_sheet_frame" action="hks_postage_entry_sheet_data.php">
<input type="hidden" name="agcpy"  value="'.$row["agcpy"].'" >
<input type="hidden" name="vername"  value="'.$print_issue.'" >

<td style="width: 120px;"><input class="form-control" style="background-color: #DCDCDC;" name="b_ticket" value="'.doubleval($row["avg(postage)"]).'" onblur="this.form.submit()" placeholder="Ticket Price" type="text" /></td>
</form>

<td>'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td></tr>
 
 
    
';

    }

}

echo '<tr><td>ভিপি</td><th>'.$sum_post1.'</th><th>'.$sum_post2.'</th> <td></td><th></th><td></td><td></td></tr>';

$conn->close();
?>





<?php 
$conn7 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn7->connect_error) {
    die("Connection failed: " . $conn7->connect_error);
} 

$sql = "SELECT transid,vername, SentDate,agcpy ,avg(weight),avg(postage),count(transid) FROM tblIssue where (agcpy >70 and transid >99 AND transid <10000 AND vername =".$print_issue." ) GROUP BY agcpy";
$result = $conn7->query($sql);

if ($result->num_rows > 0) {
   // echo '<tr><th colspan="8">পোস্ট অফিস</th></tr><tr><th>বিবরণ</th><th>সংখ্যা</th><th>মোট</th><th>সৌজন্য</th><th>ওজন</th><th>মোট </th><th>টিকিট</th><th>মোট </th></tr>';
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["agcpy"]>19&&$row["agcpy"]<100){

            $qty=2;
        }
        if($row["agcpy"]>99){

            $qty=3;
        }
        
        $sum_postn1=$sum_postn1+$row["count(transid)"]; $sum_postn2=$sum_postn2+doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"]));
        $sum_postn3=$sum_postn3+doubleval($row["count(transid)"])* $qty;


        echo '

<tr><td>'.$row["agcpy"].' C</td>
<td>'.$row["count(transid)"].'</td>
<td>'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td>
<form class=""   method="post" target ="postage_entry_sheet_frame"   action="hks_postage_entry_sheet_data.php">
<input type="hidden" name="agcpy"  value="'.$row["agcpy"].'" >

<input type="hidden" name="vername"  value="'.$print_issue.'" >

<td style="width: 100px;" ><input class="form-control" style="background-color: #DCDCDC;" name="b_weight" value="'.doubleval($row["avg(weight)"]).'" onblur="this.form.submit()" placeholder="Weight" type="text" /></td>
</form><td >'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td>
<form class=""   method="post"  target ="postage_entry_sheet_frame" action="hks_postage_entry_sheet_data.php">
<input type="hidden" name="agcpy"  value="'.$row["agcpy"].'" >

<input type="hidden" name="vername"  value="'.$print_issue.'" >


<td style="width: 120px;"><input class="form-control" style="background-color: #DCDCDC;" name="b_ticket" value="'.doubleval($row["avg(postage)"]).'" onblur="this.form.submit()" placeholder="Ticket Price" type="text" /></td>

</form>
<td>'.doubleval(doubleval($row["agcpy"])*doubleval($row["count(transid)"])).'</td></tr>
 



 
    
';

    }

}

echo '<tr><td>ভিপিপি</td><th>'.$sum_postn1.'</th><th>'.$sum_postn2.'</th> <td></td><th></th><td></td><td></td></tr>';
echo '<tr><td>মোট</td><th>'.intval($sum_post1+$sum_postn1).'</th><th>'.intval($sum_post2+$sum_postn2).'</th> <td></td><th></th><td></td><td></td></tr></table>';
 
$conn7->close();
?>
</div>
  <div class="form-group">
    <div class="col-10 form-check">
      <input   class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Are you sure to submit the form?
      </label>
    </div>
  </div>
  
  
  <div class="col-2">
  <button type="submit" class="btn btn-success btn-xs" type="submit"> Update</button>
  </div>
  
 
 


  <iframe name='postage_entry_sheet_frame' width="0" height="0"  frameBorder="0" ></iframe> 


</div> <!-- end of container -->
 </body>


</html>
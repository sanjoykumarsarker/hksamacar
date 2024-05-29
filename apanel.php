
<?php

$sec=$_POST['mysec'];

if($sec!=108){
	
	die("wrong ppp");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<img style="display:inline;width:80px;height:80px;float:left;margin:10px" src="logo.png">
 
<h1 style="display:inline; float:left; text-align:left;font-weight:bold;color:#000000;  margin-top: 5px;" > <span   style="font-size: 40%;">   কৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরণারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদের কৃপাধন্য শিষ্য       </span ><br> <span   style="font-size: 100%; font-family: KumarkhaliMJ">  শ্রীল জয়পতাকা স্বামী গুরু মহারাজ  </span></h1>


<div style="display:block;clear:both">

</div>
<div class="container">

  <h4 class="bg-danger bg-inline-block" style ="text-align: center; font-size: 40px; font-family:Cooper Black;"> Admin Control Panel</h4>
  
  <br>
  
  <form action="temple_registration.php" target="_blank" style="display: inline;">
      <button type="submit" class="btn btn-primary btn-lg">Enter Temple</button></form>
  <form action="devrecords.php" target="_blank" style="display: inline;">
    <button type="submit" class="btn btn-primary btn-lg">Edit Devotees</button></form>
  <form action="set_initiation_date.php" target="_blank" style="display: inline;">  
    <button type="submit" class="btn btn-success btn-lg">Set date and serial</button></form>
	<form action="summarylist.php" target="_blank" style="display: inline;"> 
    <button type="" class="btn btn-danger btn-lg">Print List</button></form>
	<form action="confirm_initiated.php" target="_blank" style="display: inline;"> 
    <button type="submit" class="btn btn-warning btn-lg">Set Initiation Status</button></form>
  <form action=".php" target="_blank" style="display: inline;"> 
    <button type="" class="btn btn-warning btn-lg">Send SMS</button></form>
	
</div>


<br><br><br><br><br><br><br><br><br><br><br>
<hr>
		<div>
		<footer>
            <div class="row">
                <div class="col-lg-12" style= "text-align:center;cursor:pointer;">
                    <Span style="border-right:1px solid black; padding:10px" >Copyright &copy; hksamacar 2017</span> <Span style="border-right:1px solid black;  padding:10px" > <a href="#" onClick="history.go(-2);return true;"> Home </a> </span> 
                </div>
            </div>
        </footer>
		</div>
</body>
</html>

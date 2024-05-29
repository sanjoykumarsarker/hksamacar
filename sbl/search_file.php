
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Sanjoy Banking Solution</title>


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
 
 
 
  <body>
  <h1 style=" text-align: center; background-color: cornsilk ; margin-top: 30px; ">Sanjoy Banking Solution</h1>
  <h3 style=" text-align: center; background-color: cornsilk ; margin-top: 30px;color:blue ">Search for Bank Advice </h3>
  <div class="row">
  
  <div    class="col-sm-3">
  </div>
 
  <div    class="col-sm-6">
  <form  id="submit_f"  method="POST" target="search_file_result_iframe"  action="search_file_data.php">

<input class="form-control" type="text" name="search_string" id="fname" onkeyup="myFunction()">
 


</form>
</div>

<div    class="col-sm-3">
  </div>
  </div>
<hr>
<div>
<iframe height="500px" width="100%"  name="search_file_result_iframe">   </iframe >


</div>

<div style="background-color:#fff0e5;
">

<h5>
Developed By

</h5>
<h5>
Sanjoy Kumar Sarker
</h5>
<h5>
Senior Officer (IT)
</h5>
<h5>
Sonali Bank Limited
</h5>
</div>
 
</body>
<script>
function myFunction() {
   document.getElementById("submit_f").submit();
  
}
</script>
</html>
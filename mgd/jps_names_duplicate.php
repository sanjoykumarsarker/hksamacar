<?php session_start();
include_once 'db/jps_db_connection.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>


<title>Duplicate Names Reports</title>


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

  <div class="container-fluid p-3 my-3 border ">




  <h1>Duplicate Names Reports</h1>
  <p>Please Select/Filter for Searching</p>
 
<form method="post" action="jps_names_duplicate_data.php">

<div class="row">
      <div class="col-sm-4" style="background-color:lavenderblush;">   
      <select class="custom-select" id="selectbasic" name="send_single_issue"  >
                                        
                                        <option value="" >All</option>

                                        <option value="" >Input to Input</option>
                                        <option value="" >Input to Database</option>
 
                                        </select>

 </div>
                                        



 
      <div class="col-sm-8">

      <select class="custom-select" id="selectbasic" name="tregid"  >
                                        <option value="" >Temple</option>
                                     
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  distinct  tname,tregid FROM tmpl ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value =".$row['tregid'].">".$row['tname']."</option>";
 

        
    }
 } else {
 }
$conn->close();


?>

</select>  






      </div>

      </div>





      <div class="row">
      <div class="col-sm-4" style="background-color:lavenderblush;">   
      <select class="custom-select" id="selectbasic" name="gender"  >
                                        
                                        <option value="" >All</option>

                                        <option value="" >Male</option>
                                        <option value="" >Female</option>
 
                                        </select>

 </div>
                                        



 
      <div class="col-sm-8">

      <select class="custom-select" id="selectbasic" name="send_single_issue"  >
                                        <option value="" >Division</option>
                                     
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  distinct  division FROM reg ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value =".$row['division'].">".$row['division']."</option>";
 

        
    }
 } else {
 }
$conn->close();


?>

</select>  






      </div>

      </div>


 


      <div class="row">
      <div class="col-sm-8" style="background-color:lavenderblush;">   
      <div class="slidecontainer">
  <input type="range" min="80" max="100" value="90" name="match" class="slider" id="myRange">
  <p>Match: <span style="color:red" id="demo"></span> %</p>
</div>      </div>
      <div class="col-sm-4">
      <select class="custom-select" id="selectbasic" name="idate"  >
                                        <option value="" >Initiation Date</option>
                                     
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  distinct  idate FROM reg ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value =".$row['idate'].">".$row['idate']."</option>";
 

        
    }
 } else {
 }
$conn->close();


?>

</select>  

    </div>
      
      </div>
<button type="submit" class="btn btn-default">  Submit </button >

    </form>
 








</div>
</body>

<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
</html>
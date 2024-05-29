<?php session_start();?>
<!DOCTYPE html>

<html> 
		<head>
		<title>Harinama Initiation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
	<body  >

	<div class="container">
		<!-- Banner -->
		 

		<!-- Feature 1 -->
		 


		<!-- Portfolio -->
		 

		<!-- Contact -->
 			 
					<h1 style="color:blue;background-color:orange;text-align:center" >Harinama Initiation</h1>
					<br><br><br>
				<form style="text-align:center"class="form-group" method="post" action="upload_xl_data.php" enctype="multipart/form-data"id="form">
				 

<select  style="text-align:center"  class="form-control"id="id_district" name="temple_id" onchange="upazilaFunction(this.value);postofficeFunction(this.value)"  >
<option>Temple Name</option>
<?php
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tregid, tname,t_addr FROM tmpl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value =".$row['tregid'].">".$row['tname']."(".$row['t_addr'].")</option>";
 

        
    }
 } else {
 }
$conn->close();



 



?>

</select>

 









<br><br><br><br>



						 <div    class="custom-file"  >
						
						<input style="color:blue;background-color:yellow;float:center"type="file" class="custom-file-input"   name="fileToUpload1" accept="" />
						
						</div>
						 
						<br><br>
								 <input type="submit"  class="btn btn-danger" value="Submit" /></li>
								 <input type="reset" class="btn btn-primary" class="style3" value="Clear" /></li>
			 
					 
 
 </form>

 <form style="text-align:center"class="form-group" method="post" action="truncate_alert.php" enctype="multipart/form-data"id="form">
 
 <input type="submit"  class="btn btn-danger" value="Truncate All" /></li>

 
 </form>
 </div >
	</body>
</html>

<?php session_start();ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>
<!DOCTYPE html>
<html>
<head>

<title>Subscriber Book</title>


  <meta charset="utf-8">
 
 <link rel="shortcut icon" href="favicon1.ico" />
 
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
 <!-- <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
 
 
 

</head>
 
<body style="overflow: hidden;">

<?php   
   $id=$_POST["ag_id_en"];   
   $ag_name=$_POST['ag_name'];
   $status=$_POST["status"];
   $quantity=$_POST["ag_quantity"];
   

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";


$conn_id = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn_id->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn_id,"utf8");
$sql_id = "SELECT ag_quantity,status,skip FROM tblMem WHERE ID_EN =$id";
$result_id = $conn_id->query($sql_id);

if ($result_id->num_rows > 0) {
     $row = $result_id->fetch_assoc();
     $GLOBALS['ag_quantity']= $row["ag_quantity"];
     $GLOBALS['status']= $row["status"];
     $GLOBALS['skip']= $row["skip"];
} else {
    echo "0 results";
}
$conn_id->close();
?> 

    

<div style="padding: 3rem 1rem;">
<p style="text-align:center; color:blue;"> <?php echo  $id ;?>: &nbsp <?php echo $ag_name ;?></p>
<hr style="border-top: 0.5px dotted green; margin-top: 0.35em;  margin-bottom: 0.35em;">

<form action="subs_book_action_mod_update_data.php" method="post">
  <input type="hidden" name="id" value="<?php echo  $id ;?>">
<div class="input-group mb-3">

  <br>
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Skip for (Month)</span>
	<input type="text" class="form-control" name="skip" value="<?php echo $GLOBALS['skip'];?>" aria-label="Skip for (Month)" aria-describedby="basic-addon1">
  </div>

</div>

	<div class="col-sm-offset-1 col-sm-4">
        <div class="checkbox">
            <label> <input type="radio" name="status" value="CONT" <?php echo $GLOBALS['status']=='CONT'?'checked':'' ?>> Continue </label>
			<label> <input type="radio" name="status" value="DISCONT" <?php echo $GLOBALS['status']=='DISCONT'?'checked':'' ?> > Discontinue</label>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			<button  type="submit" class="btn btn-danger btn-sm " > Update</button>
 		</div>
    </div>

  </form>

  </div>
  </body>

  </html>
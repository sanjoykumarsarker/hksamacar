
<?php
// ini_set("display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
include '../function.php';
$tm = 60000;
//include 'user_session.php';
$ti = "64";
$ti_all = "1081632";

if ($_POST['Name-1'] != null && $_POST['Name-1'] != "") {
    $_SESSION['idn'] = $_POST['Name-1'];
}

if ($_POST['Password-1'] != null && $_POST['Password-1'] != "") {
    $_SESSION['pw'] = $_POST['Password-1'];
}

  $permis_val = getPermission($_SESSION['idn'], $_SESSION['pw']);
  $id_val = getId($_SESSION['idn'], $_SESSION['pw']);
$user_name = getIdToUserName($id_val);

// echo  "<h4 style='color:green;''>".$user_name  =getIdToUserName($id_val)."</h4> <br>";
$_SESSION['viva_id'] = $id_val;
$_SESSION['user_name'] = $user_name;
//include "login_check.php";
//login_check($id_val);
if ($_SESSION['cd'] != null && $_SESSION['cd'] != "" && $_SESSION['seccode'] != null && $_SESSION['seccode'] != "" && $_SESSION['cd'] == $_SESSION['seccode']) {
    echo "You are trying more entry";
} else {

    if ($permis_val == null || $permis_val == "" || ($ti != $permis_val && $ti_all != $permis_val)) {

        header("Location: https://harekrishnasamacar.com/JPS/viva"); /* Redirect browser */
        exit();

    } else {
        $md5val = md5($permis_val);
        $_SESSION['seccode'] = $md5val;
        $GLOBALS['seccode'] = $md5val;

        //echo "First Entry";
        $_SESSION['strg'] = $_POST['strg'];

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['id_val'] = $id_val;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <!-- CSS only -->
<style>
   .tbutton {
        background-color: Transparent;
        border: none;
        background-repeat:no-repeat;
        cursor:pointer;
        overflow: hidden;
        text-align: left;
        outline:none;
         
    }

    .tbutton:hover {
        background-color: yellow;
        border: none;
        background-repeat:no-repeat;
        cursor:pointer;
        overflow: hidden;
        text-align: left;
        outline:none;
        color:red;
    }
</style>
</head>
</body>  
<body>
<?php

session_start();
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
// Create connection

$division=1;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$sql = "SELECT division ,templereg,
count(reg) total,
count(if(status_viva='approved',1,null)) approved,
count(if(status_viva='submitted',1,null)) submitted,
count(if(result_viva='fit',1,null)) fit,
count(if(result_viva='waiting',1,null)) waiting


 from reg group by templereg";

$result = $conn->query($sql);
echo "<table class='table table-striped table-bordered table-hover'>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
 if($division!=$row["division"]){
    $GLOBALS["si"]=1;
$GLOBALS["div"]=$row["division"];
echo "
<tr> <td style='font-size:50px;text-align:center;background-color:beige' colspan='6'>".$row["division"]."  </td></tr>
<tr>

<th>SI</th>
<th>Temple</th>
 
<th>Waiting</th>
<th>Fit</th>
<th>Blank</th>
<th>Total</th>
</tr>";
 }

 else{
    $GLOBALS["div"]="";


 }

 $division=$row["division"];
  echo "<tr>
  <td>".$GLOBALS["si"]."</td>
   <td> <form action='devotee_information.php' target='_blank' method='POST'>
   <input type='hidden' name='viva_type' value='%%'>
  <button   class= 'tbutton' name='temple_id' type='submit' value=" . $row["templereg"] . " > ".temple_address($row["templereg"])."</button>
</form></td>



<td> <form action='devotee_information.php' target='_blank' method='POST'>

<input type='hidden' name='viva_type' value='waiting'>

<button   class= 'tbutton' name='temple_id'  type='submit' value=" . $row["templereg"] . " > ".$row["waiting"]."</button>
</form></td>

<td> <form action='devotee_information.php' target='_blank' method='POST'>

<input type='hidden' name='viva_type' value='fit'>

<button   class= 'tbutton' name='temple_id'  type='submit' value=" . $row["templereg"] . " > ".$row["fit"]."</button>
</form></td>



<td> <form action='devotee_information.php' target='_blank' method='POST'>

<input type='hidden' name='viva_type' value=''>

<button   class= 'tbutton' name='temple_id'  type='submit' value=" . $row["templereg"] . " > ".intval(intval($row["total"])-intval($row["fit"])-intval($row["waiting"]))."</button>
</form></td>



<td> <form action='devotee_information.php' target='_blank' method='POST'>

<input type='hidden' name='viva_type' value='%%'>

<button   class= 'tbutton' name='temple_id'  type='submit' value=" . $row["templereg"] . " > ".$row["total"]."</button>
</form></td>
 


 


  </tr>";
  $GLOBALS["si"]=$GLOBALS["si"]+1;;
}
}
else {
    echo "0 results";
}
echo "</table>";
$conn->close();

 ?>

</body>
</html>

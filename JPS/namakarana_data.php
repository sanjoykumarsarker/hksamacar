 <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Namakarana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>



  <style>

hr { margin: 0.1em auto; }


   </style>
  <script>
var myObj17, myJSON171;

//Storing data:
myObj17 = {

 "nnn20":"<?php echo $_POST['rid']; ?>"
   };
myJSON171 = JSON.stringify(myObj17);
localStorage.setItem("testJSON18", myJSON171);


</script>
 <body style="background-color:#F0F8FF">
 <div>
 <br> <br> <br>
 <?php

$tid = $_POST['rid'];

//echo $tid;

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
    die("Connection failed: " . $connr->connect_error);
}

/*reg     bname     ename     age     address     phone     service
gender     education     mstatus     nprefer     id     division
district     policestation     templename     templenameb     recom
recomb     operator     datetime     ip     templereg     nchoice1     nchoice2     nchoice3 */

$sqlr = "SELECT reg ,	bname ,	ename ,	age ,	address ,	phone ,	service ,
  gender ,	education ,	mstatus ,	nprefer
	FROM reg WHERE   reg='$tid'  ";
$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {

    // output data of each row
    while ($row = $resultr->fetch_assoc()) {
        echo "

	Reg:	 " . $row["reg"] . " <hr>

	Name:	 " . $row["ename"] . "(" . $row["bname"] . ")  <hr>

    Address:	" . $row["address"] . "  <hr>
    Phone	: " . $row["phone"] . "  <hr>



	Gender:	" . $row["gender"] . " (
		 " . $row["mstatus"] . ")&nbsp &nbsp Age:

		 " . $row["age"] . "  <hr>

		Service :" . $row["service"] . "

&nbsp &nbsp &nbsp &nbsp	Education :" . $row["education"] . "  <hr>

	<h5  style='color:red; text-align:center;'  > Lila:	 " . $row["nprefer"] . " </h5>    <hr>


	 ";

    }
    echo "</table>";
} else {
    echo "No---Result";
}
$connr->close();
?>

</div>




    </body>

</html>

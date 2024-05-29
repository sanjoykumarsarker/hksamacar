<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

		
	<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
	<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	
	<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
  
	
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #dddddd;
    padding: 8px;
}

th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
.tbutton {
	background-color: Transparent;
	border: none;
    background-repeat:no-repeat;
    cursor:pointer;
    overflow: hidden;
	text-align: left;
    outline:none;
	color:blue;
}


	</style>
	</head>
	<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","devshow_admin_data_post.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script>
function showUser1(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","devshow_admin_data_pre.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<body>

<?php
  echo $d =  $_POST['g'];
  
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
   $sqlr = "SELECT
   reg,
   bname,
   ename,
   age,
   address,
   phone,
   service,
   gender,
   education,
   mstatus,iserial,idate,
   nprefer ,istatus1, isinitiated,comments  
   FROM reg  ";
   
$resultr = $connr->query($sqlr);


if ($resultr->num_rows > 0) {
    echo "<table class='table table-striped table-bordered table-hover' id='dataTables-example'>
	<tr>
	<th>Reg</th>
    	<th> নাম</th>
        		<th>Name</th>
                	<th>Age</th>
       
	</tr>";
	
    // output data of each row
    while($row = $resultr->fetch_assoc())
	
	{
       	 "
         <form target='_blank' action='serial_update_data.php' method='POST'>
         <tr>
		<td>

    <input class='form-control'   type='text' name='iserial' value='".$row["iserial"]."'>
    </td>
    <td>
     <input class='form-control'   type='text' name='idate' value='".$row["idate"]."'>
     </td>
     <td>
    <input class='form-control'   type='hidden' name='reg' value='".$row["reg"]."'>




	</td>
    <td>
  		<input name='edit' class= 'tbutton' type='submit' value=".$row["reg"]." > 	

          </td>
   

    
		 
		</tr>
    </form>
    
    ";
    }
    echo "</table>";
}   else {
}
$connr->close();
 

?>
<script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
	
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script> 
</body>
</html>

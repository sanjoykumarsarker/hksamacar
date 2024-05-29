<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
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
	
 
<body>

	<div style="text-align: center;">
	<h3>Edit Users</h3>
	</div>

<?php
 
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
   $sqlr = "SELECT id, user_name, password, permission
			FROM users";
   
$resultr = $connr->query($sqlr);

if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>ID</th>	<th>User Name</th>	<th>Password</th><th>Permission</th> <th>Edit</th> <th>Delete</th>   
	</tr>";
	
    // output data of each row
    while($row = $resultr->fetch_assoc())
	
	{
    echo "<tr>
		<form target='iframe1' action='admin_user_edit_data.php' method='POST'>
		<td><input class='form-control'   type='text' name='id' value='".$row["id"]."'></td>
		<td><input class='form-control'   type='text' name='username' value='".$row["user_name"]."'></td>
		<td><input class='form-control'   type='text' name='password' value='".$row["password"]."'>	</td>
		<td><input class='form-control'   type='text' name='permission' value='".$row["permission"]."'>	</td> 
		<td><button   type='submit' name ='btn' value='edit' class='btn btn-success' > Edit</button></td>
		<td><button   type='submit' name ='btn'  value='del' class='btn btn-success' > Delete</button></td>
		</tr> </form>";
    }
	
    echo "</table>";
}   else {
}
$connr->close();
?>

<div>
		<div style="text-align: center;">
			<h3>Add User</h3>
		</div>	
	<table>
	<tr> <th>Id</th> <th>User Name</th>	<th>Password</th> <th>Permission</th> <th>Click</th> </tr>
	<tr>
	<form target='iframe2' action='admin_user_insert_data.php' method='POST'>
	<td><input class='form-control'   type='text' name='id' value=''>	</td>
	<td><input class='form-control'   type='text' name='username' value=''>	</td>
	<td><input class='form-control'   type='password' name='password' value=''>	</td>
	<td><input class='form-control'   type='text' name='permission' value=''>	</td>
	<td><button   type='submit' class='btn btn-success' > Add</button></td>
	</tr> </form>
		</table>
		
<br><br><br><br><br><br><br><br><br><br><br>				
	
</div>
 
<iframe name="iframe1" border="0px" height="0px" width="0px"></iframe>
<iframe name="iframe2" border="0px" height="0px" width="0px"></iframe>
</body>
</html>
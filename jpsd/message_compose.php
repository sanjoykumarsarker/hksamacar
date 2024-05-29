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

<div>
<h1>Message Compose</h1>
</div>


<div>

 
<form method="post" action="message_compose_data.php">

 

TO:

<input type="text" name="m_to" value="">


<input type="hidden" name="m_from" value="<?php echo  $_POST['m_from'];?>">

<input type="hidden" name="id_val" value="<?php echo  $_POST['id_val'];?>">

<br><br><br>
<textarea rows="4" cols="50" name="m_body"></textarea>

<button type="submit">Send</button>
<form>

</div>






</body>
</html>
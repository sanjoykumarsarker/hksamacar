  
 
 <?php
session_start();
 $page = $_SERVER['PHP_SELF'];
 $sec = "8";
 header("Refresh: $sec; url=$page");
?>

<style>
.input-group-addon {
	
	min-width:80px;
	background-color: whitesmoke;
    text-align:left;

}
.marginRow {
     margin:0px ; 
   }
   
.tbutton {
	background-color: Transparent;
	border: none;
    background-repeat:no-repeat;
    cursor:pointer;
    overflow: hidden;
	text-align: left;
    outline:none;
	color:white;
}

</style>


 	
<style>
.modal-content.ui-resizable {
  overflow-y: scroll;
  position: static;
}

.modal-content{
	background:#fff0e5;
	
}

.mytext{
    border:0;padding:10px;background:#FEFEFE;
}
.mytext1{
    border:0;padding:10px;background:#FEFEFE; opacity: 0.8;
}


.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    color:white; float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:#ef1c1c;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#fff0e5;
    height:450px;
    overflow-y:auto;
    padding:0;
}
.frame1{
    background:#b70707;
    height:450px;
    overflow-y:auto;
    padding:0;
}

.frame > div:last-of-type{
    position:absolute;bottom:5px;width:100%;display:flex;
}
ul#chat {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:32px;
    display:flex;
    flex-direction: column;
}

ul#user {
    width:100%;
    padding:5px;
    bottom:10px;
}

#user li{
	height:50px;
	vertical-align: middle;
}

#user li:hover{
	background-color: rgba(255, 255, 255, 0.5); 
	opacity: 0.8;
	cursor: pointer;
}



.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: #ef1c1c transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}   

.fontAwesome {
  font-family: 'Helvetica', FontAwesome, sans-serif;
}

#chat{   
   overflow-y: scroll;
 }
 
 
 
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 </style>
 
 </script>

  
<div style="width: 200px; overflow-x: hidden; ">
<?php
 


include 'function.php';

 
 
 
 
	 $id_val= $_SESSION['id_val'];
 

 

 
$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 
   
//$sqld = "select users.id ,users.user_name,connection_status.id ,connection_status.c_time from users left join connection_status
//on users.id=connection_status.id order by users.user_name";

$sqld = "select user_name,id from users where id!='".$id_val."' ";

$resultd = $conn->query($sqld);
 
  
 if ($resultd->num_rows > 0) {
	 
	 echo" <ul id='user' style='list-style-type:none ;'    >";
	 
  //  echo " <select id='change' name='str' class='form-control'>";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
 

 
 
  $gt=getDiffTime($row["id"]);
 
 
 if($gt=="" || $gt==null)
 {
	 
$gt=500000;	 
 }
 
    $gt;
 if($gt<200000)
 
 {
	 
	 
 echo "<li class='cl' id='".$row["id"]."'>  <form target='myframe_chat' method='post' action='message_frame_compose.php'>
				<input type='hidden' name='to' value='".$row["id"]."'>
				<input type='hidden' name='from' value='".$id_val."'>
			 
				<button type='submit' class='tbutton'>	
			<div style='display: inline-block; float: left; margin-top: 5px;' > <img style='width:40px; height:40px;display: inline-block; '  src='../JPS/logo.png' /></div>
			&nbsp <div style='display: inline-block; margin-top: 8px; ' >".$row["user_name"]."<i class='fa fa-cog fa-spin fa-2x fa-fw'></i><span style='color:blue'>***<span></div>

			 
			</button>
			</form></li>";
}			

else

{
echo "<li class='cl' id='".$row["id"]."'> 	<form target='myframe_chat' method='post' action='message_frame_compose.php'>
				<input type='hidden' name='to' value='".$row["id"]."'>
				<input type='hidden' name='from' value='".$id_val."'>
				 
				<button type='submit' class='tbutton'>
			
			<div style='display: inline-block; float: left; margin-top: 5px;' > <img style='width:40px; height:40px;display: inline-block; '  src='../JPS/logo.png' /></div>
			&nbsp <div style='display: inline-block; margin-top: 8px; ' >".$row["user_name"]."</div>

			</button>
			</form></li>";	
}
}
 
echo"</ul>";
}
	
$conn->close();	
?>
</div>
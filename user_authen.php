<?php
print_r(phpinfo());	
function getPermission($a,$b){
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  
$sqld = "SELECT permission FROM users where user_name='$a' and password='$b'";

$resultd = $conn->query($sqld);
 
   
    // output data of each row
     $row1 = $resultd->fetch_assoc();
	 
	return $row1["permission"];
	
}
?>

   	 <script>
	 
	 var id_val = "<?php echo $_SESSION['id_val'];?>" ;
 
 
 
 //  document.getElementById("message_count").innerHTML ="";
	 aaa_fn();
       
   function aaa_fn(){
 
 setTimeout(
        function(){  

$(document).ready(function(){
  

var request = $.ajax({
  url: "message_status_data.php",
  method: "POST",
  data: { id_val : JSON.stringify(id_val) },
  dataType: "html"
});
request.done(function( msg ) {
	//var msg=document.getElementById("message_count").innerHTML;
	document.getElementById("message_count").innerHTML =msg;
 
	
});
request.fail(function( jqXHR, textStatus ) {
  //alert( "Request failed: " + textStatus );
});  

});
		
            var d = new Date();
    var n = d.getTime();
  
   //$("#message_count").scrollTop($("#message_count")[0].scrollHeight);  
  aaa_fn();
       }, 10000);
    }
 
  
</script>
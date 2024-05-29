 

   <script>
	 var id_val = "<?php echo $upd;?>" ;
 
  
 //  document.getElementById("message_count").innerHTML ="";
	 aaa_fn();
       
   function aaa_fn(){
 
 setTimeout(
        function(){  

$(document).ready(function(){
  

var request = $.ajax({
  url: "user_status_data.php",
  method: "POST",
  data: { id_val : JSON.stringify(id_val) },
  dataType: "html"
});
request.done(function( msg ) {
	
	//var nn =msg;
	//var msg=document.getElementById("message_count").innerHTML;
	//document.getElementById("message_count").innerHTML =msg;
 var myObj = JSON.parse(msg);
     var nn=myObj.some_key;
 
 if(nn!="")
 {
 window.location="index.php";
 	alert(nn); 

 }
 
 else {
	 
 }
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
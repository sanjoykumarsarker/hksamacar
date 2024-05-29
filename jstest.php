<!DOCTYPE html>
<html>


<script>

 
 
   
 
 aaa();
      
 
 
 
   function aaa(){
 
 setTimeout(
        function(){                        
            var d = new Date();
    var n = d.getTime();
    document.getElementById("demo").innerHTML = n;
  aaa();
       }, 2000);
 

 }
 
 
    </script>
	
	<form>
	<button type="submit" onclick="aaa()">ok</button>
	
	</form>
	<p id="demo">	</p>
	 </body>
	 
	 </html>
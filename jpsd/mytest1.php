<?php session_start();?>
<!DOCTYPE html>
<html>
<body>

<h1>The XMLHttpRequest Object</h1>

 
 
<script>
         function showResult(str1) {
			
            if (str1.length == 0) {
               document.getElementById("tin").innerHTML = "";
               document.getElementById("tin").style.border = "0px";
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
            }else {
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
				
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("tin").innerHTML = xmlhttp.responseText;
                  document.getElementById("tin").style.border = "1px solid #A5ACB2";
               }
            }
            
            xmlhttp.open("GET","mytest2.php?q1="+str1,true);
            xmlhttp.send();
         }
      </script>


<form><input type="text" id="configname" name="a" value="fff544545455" />
<input type="button" value="Submit" onclick="showResult(document.getElementById('configname').value)" /></form>

<div id="tin"><div>

</body>
</html>

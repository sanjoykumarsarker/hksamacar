<?php session_start();?>
<!DOCTYPE html>
<html>
<body>

 <select  id="mySelect" name="color" onclick='checkvalue(this.value)'> 
    <option>pick a color</option>  
    <option value="red">RED</option>
    <option value="blue">BLUE</option>
    <option value="others">others</option>
</select> 
<input type="text" name="color" id="color" style='display:none'/>

<script>

function checkvalue(val)
{
    if(val==="others")
	{
		
		 

    var z = document.createElement("option");
    z.setAttribute("value", "volvocar");
    var t = document.createTextNode("Volvo");
    z.appendChild(t);
    document.getElementById("mySelect").appendChild(z);
       document.getElementById('color').style.display='block';
	   
	}
    else
       document.getElementById('color').style.display='none'; 
}
 </script>


 
</body>
</html>

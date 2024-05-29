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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
  </head>
 <style>
 
 table {
    width: 100%;
}

th, td { 
	font-size: 8 px;
    padding: 2 px;
    border-bottom: 1px solid #ddd;
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
<script>
         function showResultn(strn) {
			
            if (strn.length == 0) {
               document.getElementById("livesearch").innerHTML = "";
               document.getElementById("livesearch").style.border = "0px";
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
            }else {
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
				
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                  document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
               }
            }
            
            xmlhttp.open("GET","livesearch.php?qn="+strn,true);
            xmlhttp.send();
			
			
			 if (strn.length == 0) {
               document.getElementById("livesearch1").innerHTML = "";
               document.getElementById("livesearch1").style.border = "0px";
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp1 = new XMLHttpRequest();
            }else {
               xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp1.onreadystatechange = function() {
				
               if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                  document.getElementById("livesearch1").innerHTML = xmlhttp1.responseText;
                  document.getElementById("livesearch1").style.border = "1px solid #A5ACB2";
               }
            }
            
            xmlhttp1.open("GET","namesearchtest.php?qnn="+strn,true);
            xmlhttp1.send();
			
			  
         }
      </script>
	  
  
   
  
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
            
            xmlhttp.open("GET","namakarana_data.php?q1="+str1,true);
            xmlhttp.send();
         }
      </script>
  
  <body>

  
  
  
  
  
  
<div style="clear:both;"> 
<img src="header.png" style="position:fixed; z-index:100;" height="95px" width="100%">
</div>
  
<div id= "row" style="Padding:10px;" >
  
<div class="col-sm-12" style=" height:50vh;background-color:Cornsilk ; margin-top: 80px; " >

 <div class="table-wrapper" style="position: relative;Padding:10px;" >
 
 <div class="allow-scroll" style=" overflow:auto; overflow-y: scroll;">
 
 <?php
 
 $tid =$_POST['edit'];
 echo $tid;
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
 
  
$sqlr = "SELECT reg,
	ename, nchoice1,nchoice2,nchoice3
	 
	FROM reg WHERE  templereg='$tid'  ";
	$resultr = $connr->query($sqlr);
if ($resultr->num_rows > 0) {
    echo "<table>
	<tr>
	<th>Reg</th>		<th> Name</th>	 
	<th>❶ </th>	<th>❷</th>			<th>❸</th>	
	</tr>";
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
       	echo "<tr>
		
		<td><form target='myframe1'action='namakarana_data.php' method='POST'><button class= 'tbutton' name='rid' type='submit' value=".$row["reg"]." >".$row["reg"]."</button> </form></td>
		<td>".$row["ename"]."</td>
		<td>".$row["nchoice1"]."</td>
		<td>".$row["nchoice2"]."</td>
		<td>".$row["nchoice3"]. "</td></tr>";
    }
    echo "</table>";
}	else {
	echo "No---Result";     
}
$connr->close();
?>
</div>
</div> 
		</div> 

		<!
		
		<div  class="col-sm-4" style="height:50vh;background-color:GhostWhite ;margin-top: 80px;" >
			
		<!	<div id="tin" style="padding:10px; margin-top: 20px" > <!</div>
  
		<! </div>
  
  
</div> 

<div style="clear:both;"> 
</div>
<div id= "row" style="Padding:10px;" >
 
	 
		<div class="col-sm-4" style="  background-color:GhostWhite ;" > 
		
		
		
		<iframe name="myframe1" width="400" height="230"></iframe>
		</div>
		 
 
 
 
 <div class="col-sm-4" style="  background-color:Cornsilk ;" > 
  <iframe name="myframe" height="0" ></iframe>
  
  
  <DIV>
		<form target="myframe" method="post" action="choice3_json.php" style="padding:10px">
			<div class="form-group">
				<label for="tags">❶ :</label>
				<input type="text" id="tags1" class="form-control"  style="text-transform:uppercase"  name="nnn1" size="40" onkeyup = "showResultn(this.value)">
			</div>
			<div class="form-group">
				<label for="tags">❷ :</label>
				<input type="text" id="tags2"  class="form-control"  style="text-transform:uppercase"  name="nnn2" size="40" onkeyup = "showResultn(this.value)">
			</div>
			<div class="ui-widget">
				<label for="tags">❸ :</label>
				<input type="text" id="tags3"   class="form-control"  style="text-transform:uppercase"  name="nnn3" size="40" onkeyup = "showResultn(this.value)">
			</div>
				<hr style="margin: 1em auto;">
				
				<input id="submit" type="submit"  style="float: right;" value="Submit">
		</form> 
		
		  </DIV>
		    
 
  <div id = "livesearch1"style="padding:5px;">
 
  
   </div>
		
		
		
		 
		</div> 
 
 
   
   
   
   
   
   
    <div class="col-sm-4" style="background-color:Cornsilk ;"  >
  
  <div id = "livesearch"style="padding:5px;">
  </div>
  
   </div>
 
   
   
   
   </div> 
   
   
   
   
   
   
   
   
  
    </body>
  </html>
  
  
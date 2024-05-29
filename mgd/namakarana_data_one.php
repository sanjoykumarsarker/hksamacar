 <?php session_start();?>
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
   
  <style>

hr { margin: 0.2em auto; } 

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
                  document.getElementById("livesearch").style.border = "0px solid #A5ACB2";
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
                  document.getElementById("livesearch1").style.border = " ";
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
                  document.getElementById("tin").style.border = " ";
               }
            }
            
            xmlhttp.open("GET","namakarana_data.php?q1="+str1,true);
            xmlhttp.send();
         }
      </script>
 <body style="background-color:cornsilk" >
  
   
<div id= "row" style="Padding:2px;" >


<div class="col-sm-5"  >

<?php
 
 
 $tid=$_POST['rid'];
 
 
 
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
 
  /*reg 	bname 	ename 	age 	address 	phone 	service 	
  gender 	education 	mstatus 	nprefer 	id 	division 	
  district 	policestation 	templename 	templenameb 	recom 
  recomb 	operator 	datetime 	ip 	templereg 	nchoice1 	nchoice2 	nchoice3 */
  
  
$sqlr = "SELECT reg ,	bname ,	ename ,	age ,	address ,	phone ,	service ,	
  gender ,	education ,	mstatus ,	nprefer ,imagename,nchoice1,nchoice2,nchoice3
	FROM reg WHERE   reg='$tid'  ";
	$resultr = $connr->query($sqlr);
	
if ($resultr->num_rows > 0) {
    
	// output data of each row
    while($row = $resultr->fetch_assoc()) {
		
		$GLOBALS['n1']=$row["nchoice1"];
		$GLOBALS['n2']=$row["nchoice2"];
		$GLOBALS['n3']=$row["nchoice3"];
      
      
      $img = 'upload/' . $row["imagename"];               
		
       	echo " 
	
	<p> <form target='_blank' action='devedit.php' method='POST'>
		<button name='edit' class= 'tbutton' type='submit' value=".$row["reg"]." >Reg: ".$row["reg"]."</button>
		</form> <hr>
	<div >
	<img src= '".$img."' style='float:right; margin-right:10px; padding:5px'> 
	</div> 
	<div style=' width:100%;'>	 	

	
		
	Name:	<span style='color:red;'>  ".$row["ename"]."</span> <hr>
	".$row["bname"]."   <hr>
	Address:	".$row["address"]. "  <hr>
    Phone	: ".$row["phone"]."  <hr>
	Gender:&nbsp	".$row["gender"]." (<span style='  color:red;     '>
		 ".$row["mstatus"]. "</span>)&nbsp &nbsp Age:&nbsp".$row["age"]."  <hr>
	Service :&nbsp".$row["service"].",	Education :&nbsp".$row["education"]."  <hr>  
	<p> Lila:&nbsp	<span style='  color:red;     '> ".$row["nprefer"]." </span></p>   
	</div>";
		
    }
    echo "</table>";
} else {
	echo "No---Result";     
}
$connr->close();
?>
		</div>
		
 <div class="col-sm-4" style="background-color:white ; height: 245px; inline:block;  "  > 
 
  <div>
		<form target="myframe" method="post" action="choice3_php_data.php" >
			<div class="form-group">
				<input type="hidden"   name="regid" value="<?php echo $tid;?>" >
			</div>
			
			<div class="form-group">
	<div class="row">
	<br>
	
  <div class="col-lg-11">
      <div class="input-group">
      <span class="input-group-addon">❶  </span>
				<input type="text" id="tags1" class="form-control" value="<?php echo $GLOBALS['n1']?>" style="text-transform:uppercase"  name="nnn1" size="40" onkeyup = "showResultn(this.value)">
      </div>
    </div>
	</div>
    </div>
			<div class="form-group">
	<div class="row">
	
  <div class="col-lg-11">
      <div class="input-group">
      <span class="input-group-addon">❷ </span>
				<input type="text" id="tags2"  class="form-control" value="<?php echo $GLOBALS['n2']?>" style="text-transform:uppercase"  name="nnn2" size="40" onkeyup = "showResultn(this.value)">
      </div>
    </div>
	</div>
    </div>
			<div class="form-group">
	<div class="row">
	
  <div class="col-lg-11">
      <div class="input-group">
      <span class="input-group-addon">❸</span>
				<input type="text" id="tags3"   class="form-control" value="<?php echo $GLOBALS['n3']?>" style="text-transform:uppercase"  name="nnn3" size="40" onkeyup = "showResultn(this.value)">
      </div>
    </div>
	</div>
    </div>
			
		<input id="submit" class="btn btn-danger" type="submit"  style="float: right;" value="Submit">
		</form> 

</DIV>
<div id = "livesearch1" > </div>
<iframe name="myframe" style='border:none;   height:0 '></iframe>
</div> 
  
<div class="col-sm-3"   >
<div id = "livesearch" >
</div>
  
</div>
   
</div> 
</body>
</html>
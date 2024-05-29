 <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<style>
button{
	
background-color:white;	
width:130px;
height:30px;
	
}

#pp{
	
 	
width:80%
 
	
}

 </style>
 
  <body>
 <script>
 var f=0;
 function pushbtn (event){
      var x = event.charCode; //not keyCode
	  var y = event.key; //not keyCode
	  
	  f=f+x;
	 // document.getElementById("pp").innerHTML=x;
      //alert("You pressed"+x+y);
	  
	  if(y=="a"){
		   
	  document.getElementById("i1").style.backgroundColor  = "blue";}
		   
	if(y=="s"){	document.getElementById("i2").style.backgroundColor  = "blue"; }  
	if(y=="d"){	document.getElementById("i3").style.backgroundColor  = "blue"; }  
if(y=="f"){		document.getElementById("i4").style.backgroundColor  = "blue"; }  
	if(y=="g"){	document.getElementById("i5").style.backgroundColor  = "blue"; }  
	if(y=="h"){	document.getElementById("i6").style.backgroundColor  = "blue"; }  
if(y=="j"){		document.getElementById("i7").style.backgroundColor  = "blue";}  
	if(y=="k"){	document.getElementById("i8").style.backgroundColor  = "blue";}
		
	 
    
    }
	 function pushbtn1 (event){
      var x = event.charCode; //not keyCode
	  var y = event.key; //not keyCode
	  
	  f=f+x;
	 // document.getElementById("pp").innerHTML=x;
      //alert("You pressed"+x+y);
	  
	  if(y=="a"){
		   
	  document.getElementById("i1").style.backgroundColor  = "white";}
		   
	if(y=="s"){	document.getElementById("i2").style.backgroundColor  = "white"; }  
	if(y=="d"){	document.getElementById("i3").style.backgroundColor  = "white"; }  
if(y=="f"){		document.getElementById("i4").style.backgroundColor  = "white"; }  
	if(y=="g"){	document.getElementById("i5").style.backgroundColor  = "white"; }  
	if(y=="h"){	document.getElementById("i6").style.backgroundColor  = "white"; }  
if(y=="j"){		document.getElementById("i7").style.backgroundColor  = "white";}  
	if(y=="k"){	document.getElementById("i8").style.backgroundColor  = "white";}
		
	  
    }

    //adding event listner on document
	 
	 document.addEventListener('keypress', pushbtn);
	 document.addEventListener('keyup', pushbtn1);
	 
	 </script>
	 
	 
	 <div style="alignment:center" id="pp"> </div>
	 
 <br><br><br><br><br>
	 <hr><hr>
	 <button id="i1" onclick=" "> সা</button>
	 <button id="i2" onclick=" "> রে </button>
	 <button id="i3" onclick=" "> গা </button>
	 <button id="i4"  onclick=" ">মা </button> 
	 <button id="i5" onclick=" ">পা </button>
	 <button id="i6" onclick=" ">ধা  </button>
	 <button id="i7" onclick=" "> নি</button>
	 <button id="i8" onclick=" ">ছা </button> 
	 <hr>
	 <hr>
	 </div>
	 </body>
	 </html>
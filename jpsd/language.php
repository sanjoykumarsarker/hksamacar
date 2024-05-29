   <?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Namakarana</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script async src="//jsfiddle.net/uUgWD/embed/"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
  </head>

<script>
	var rrr=["how are you?","আপনি কেমন আছেন ?","क्या हाल है?","как дела?"];
	var rrr1=["I am a student","আমি একজন ছাত্র","मैं एक छात्र हूँ","я студент"];
function	myp(aaa){
	document.getElementById("hd").innerHTML = rrr[aaa]; 
	document.getElementById("hd1").innerHTML = rrr1[aaa]; 
	}
	</script> 
		<body>
		<hr><hr><hr><hr><hr>
	</form>
	
	<h1 style="text-align:center" id="hd">  how are you?</h1>
	<h1 style="text-align:center" id="hd1"> I am a student</h1>
	
	<hr><hr><hr><hr><hr>
	<form> 
		<select style="width: 400px; text-align-last:center;"onchange=" myp(this.value)" >
		
		<option value="0"  selected >english</option>
		<option   value="1"      >bangla</option>
		<option value="2">hindi</option>
		<option value="3">Ruski</option>
		
		<select>
		
	
	</body>
	
	</html>
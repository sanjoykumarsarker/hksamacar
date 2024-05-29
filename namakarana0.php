<!DOCTYPE html>

<html>
 
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
	      <script>


var xmlhttp1 = new XMLHttpRequest();
xmlhttp1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myArr = JSON.parse(this.responseText);
		
		
		var array = myArr.split(',');

 

var string = JSON.stringify(array);
		
		
		 
      //  document.write(array[2]);
		
		
	 
		
    }
};
xmlhttp1.open("GET", "dlistl.txt", true);
xmlhttp1.send();

</script>

  <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC","sanjoy",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: array[]
    });
  } );
  </script>
  
  
   <script>
         function showResult(str) {
			
            if (str.length == 0) {
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
            
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
         }
      </script>
	  

<title>
Namakarana
</title>
</head>
<body>
<br><br><br><br><br> <hr><hr> 
<div style= "text-align:center";>

 





        <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action='' method="POST">
                        <fieldset>
                         <div class="container">
 
  
						 
						<div class="form-group">
							<div class="row">	
								<div class="col-lg-11">
									<div class="input-group">
									
									
									<div STYLE="DISPLAY:INLINE"  >
									<div   >
										<span class="input-group-addon"> NAMAKARANA-1: &nbsp &nbsp   </span>
										<input id="tags"  type="text" class="form-control" name="tname_b" placeholder=" NEW "  onkeyup = "showResult(this.value)">
										</div  >
										 <div id = "livesearch"></div>
										</div  > 
										<div  STYLE="DISPLAY:INLINE" >
									<div   >
										<span class="input-group-addon"> NAMAKARANA-1: &nbsp &nbsp   </span>
										<input id="tags"  type="text" class="form-control" name="tname_b" placeholder=" NEW "  onkeyup = "showResult(this.value)">
										</div  >
										 <div id = "livesearch"></div>
										</div>
										<div STYLE="DISPLAY:INLINE"  >
									<div   >
										<span class="input-group-addon"> NAMAKARANA-1: &nbsp &nbsp   </span>
										<input id="tags"  type="text" class="form-control" name="tname_b" placeholder=" NEW "  onkeyup = "showResult(this.value)">
										</div  >
										 <div id = "livesearch"></div>
										</div
										
										
										
										
										
										
									</div>
								</div>
							</div>
						</div>
						 
						 
						 
						 
	    <br>
	
	   		          <button type="submit" class="btn btn-Warning"  data-target="#myModal" onclick="eatFood();"  >Save Record </button>

	 <br>
   
	
 </div>
                                     
             
 


			 
                        </fieldset>
                      </form>
					  
					 



 </div>


 </div>





 </body>
 </html>
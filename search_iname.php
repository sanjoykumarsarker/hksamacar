<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Da|Modak" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	</head>
	<style>
	 body {
        background: #555 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAB9JREFUeNpi/P//PwM6YGLAAuCCmpqacC2MRGsHCDAA+fIHfeQbO8kAAAAASUVORK5CYII=);
        font: 13px 'Lucida sans', Arial, Helvetica;
        color: #eee;
    }
    
	h2{
		text-align: center;

	}
	
    a {
        color: #ccc;
    }
    
    .form-wrapper {
        width: 600px;
		height: 70px;
        padding: 15px;
        margin: 70px auto 30px auto;
        background: #444;
		background: rgba(0,0,0,.2);
		border-radius: 10px;
    }
    
    .form-wrapper input {
        width: 450px;
        height: 40px;
        padding: 10px;
        float: left;    
        font: bold 15px 'lucida sans', 'trebuchet MS', 'Tahoma';
        border: 0;
        background: #eee;
        border-radius: 3px 0 0 3px;      
    }
    
    .form-wrapper input:focus {
        outline: 0;
        background: #fff;
        box-shadow: 0 0 2px rgba(0,0,0,.8) inset;
    }
    
    .form-wrapper button {
		border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 110px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        background: #d83c3c;
        border-radius: 0 3px 3px 0;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
    }   

.byline p{
  text-align:center;
  color:#c6c6c6;
  font: bold 18px Arial, Helvetica, Sans-serif;
  text-shadow: 0 2px 3px rgba(0,0,0,10);
}

.byline p a{
  color:yellow;
  text-decoration:none;
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
            
            xmlhttp.open("GET","searchdata_iname.php?qn="+strn,true);
            xmlhttp.send();
		
         }
      </script>
	<body>
		
 <nav class="navbar" style="margin-top: 10px; ">		
	  <a class="navbar-brand" target= "_blank" href="http://www.jayapatakaswami.com/prabhupada/">
        <figure style= "text-align: center;" > <img style="width:150px;height:150px;" alt="Gurudev" src="logo.png">
		<figcaption style= "font-size:15px" >ISKCON - Founder Acharya <br> HDG A.C. Bhaktivedanta Swami Prabhupada</figcaption>
		</figure>
      </a>
	  <a class="navbar-brand pull-right"   target= "_blank" href="http://www.jayapatakaswami.com/biography/">
        <figure style= "text-align: center;" > <img style="width:150px;height:150px;" alt="Gurudev" src="jayapatakaswami.png">
		<figcaption style= "font-size:15px;" >Our revered Gurudev <br> HH Jayapataka Swami Maharaj</figcaption>
		</figure>
	  </a>
 </nav>
			
			<h2 style="font-family: Imprint MT Shadow, Sans-serif;" > Hare Krishna  </h2>
				
			<div class="byline" >
			<p>Please enter the <b> full </b> or <b> part </b> of <br> 
			<a> Registration No.</a>, <a> Name </a>, <a> Age </a>,<a> Address </a>, <a> Phone </a>, or <a> Service </a> <br>
			of the devotee you searching of.</p></div>
			
			
			<form class="form-wrapper ">
				<input type="text" id="tags1" class="form-control" autocomplete="off"   name="nnn1" size="40" onkeyup = "showResultn(this.value)" placeholder="Search here..." >
				<button>Search</button>
				</form>
				

				
				 
		<br><br><br>
		<div id="livesearch"  >
		<marquee scrollamount=20> <br><br><br><br><br> <h1 style="font-family: baloo da;" > হরে কৃষ্ণ হরে কৃষ্ণ কৃষ্ণ কৃষ্ণ হরে হরে । হরে রাম হরে রাম রাম রাম হরে হরে ।।</h1> </marquee>
		<br><br><br><br><br>
		</div>
				<div><br><br><br><br>
		<footer>
            <div class="row">
                <div class="col-lg-12" style= "text-align:center;cursor:pointer;">
                    <Span style=" padding:10px" >Copyright &copy; hksamacar 2017</span> <Span style="  padding:10px" > <a href="indexn.php" > Go To Home </a> </span> 
                </div>
            </div>
        </footer>
		</div>
		</body>
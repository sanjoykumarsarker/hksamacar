<<?php session_start();?>
<!DOCTYPE html>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
Registration
</title>
</head>
<body>

<div>

 
<img style="display:inline;width:80px;height:80px;float:left;margin:10px" src="logo.png"> 
 
  
 
<h1 style="display:inline;   float:left;    text-align:left;font-weight:bold;color:#000000;font-family:Garamond" > <span   style="font-size: 50%;">   কৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরণারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদের কৃপাধন্য শিষ্য       </span ><br> <span   style="font-size: 100%;">  শ্রীল জয়পতাকা স্বামী গুরু মহারাজ  </span></h1>
   
     

<div style="display:block;clear:both">


</div>
 

<h1> HARINAM    INITIATION    REGISTRATION           </h1>

<form  action="form.php" method="post">

 

 


<br>

 


<div style="width: 80%;
    padding: 10px;
    border: 5px solid green;
    margin: 0; ">
 
<p>Name(English):</p>
<input  type="text"    name="name"  > 
<p>Name(Bangla):</p>
<input  type="text"    name="name"  >


<p>Address:</p>
<input  type="text"    name="address"  >

<p>Age:</p>
<input  type="text"    name="age"  >

<p>Phone:</p>
<input  type="text"    name="phone"  >
<p>Education:</p>
<select name="edu">
    <option value="illiterate">Illiterate</option>
    <option value="primary">Primary</option>
    <option value="secondary" selected>Secondary</option>
    <option value="graduation">Graduation</option>
 <option value="Post pgraduation">Post Graduation</option>
 
  </select>
  <br><br>
 <p>Service:</p>
<input  type="text"    name="service"  >
<p>Marital Status:</p>

<select name="mar">
    <option value="DB" selected>DB</option>
    <option value="DA">DA</option>
    <option value="DDB" >DDB</option>
    <option value="DDA">DDA</option>
 <option value="DDD">DDD</option>
<option value="DDW">DDW</option>
 
  </select>
  <br><br>
 <p>Name Preference:</p>

<select name="mar">
    <option value="Krishna" selected>Krishna</option>
    <option value="Gaura">Gaura</option>
    <option value="Rama" >Rama</option>
    <option value="Nrisimha">Nrisimha</option>
 <option value="Vishnu">Vishnu</option>
<option value="Others">Others</option>
 
  </select>
  <br><br>


 
<input type="submit" value="OK">

</form>


</div>


  

</body>
</html>



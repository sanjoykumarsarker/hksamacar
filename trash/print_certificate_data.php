<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit devotee record</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<style >
	
	 
   @media print {
        body {
          -webkit-print-color-adjust: exact;
        }
      }
	
	
	
	#cert1{
		
		height: 600px;
		width: 520px;
		background-color: #F5F5F5;	
		display: inline-block; 
		border: 7px solid orange; 
		margin:10px;	
		float:left; 
	
		-webkit-print-color-adjust: exact;

 
	}
	
	#cert2{
		float:right;
		height: 600px;
		width: 520px;
		background-color: #F5F5F5;		
		display: inline-block; 
		border: 7px solid orange; 
		margin:10px;	
}
	 
 	#jps{
	     
      webkit-print-color-adjust: exact;
  margin-left: 70px; 
		
	 padding-top: 10px; 
 color:white;
 width: 70%;
  height: 50px;
   
  border-radius: 90px 90px 90px 90px ;
  background-color: #002869;
	}
	
	
	#bothimage{
		
		margin-top:-30px;
		
	}
	
	 
	
	</style>
	</head>
	
	<script>
	 
	 document.getElementById(jps).style.backgroundColor = "yellow"; 
	 </script>
	
<body>


 <?php

 include 'function.php';
		$si=1; 
     $q0  = json_decode($_POST['myData'],true);
	 
	$q=idatetoreg($q0);
	  
	 echo "<table>	 
	<tr><th>#</th><th>#</th>  </tr>";
	
	 foreach($q as $reg){
		
		
		$qq=substr($reg, 0, 6);
	 if(empty($st)){
		 	$st=1; 
		 	 } 
	 	  $ss=substr($reg, 0, 6);
 if($st!=$ss)
	 { 
 
 $GLOBALS['c']=2;
 
 $st=substr($reg, 0, 6);
	}
	
	
	
	
	
	 
	
	 
if ($GLOBALS['c'] % 2 == 0) {
   

	
	
	echo "<tr><td><div id='cert2'>
	<h5 style='text-align:center'> শ্রীশ্রী  গুরু গৌরাঙ্গৌ জয়তু:</h5> 
	
	<div id='bothimage'>
	
	<img style='float:left' src='iskconlogo.png' width='70' height='70'>
	<img style='float:right' src='prabhupada.png' width='70' height='70'>
	   </div>
	   <br><br> <br>
	    
	   
	   <h4 style='text-align:center'><b>আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ(ইসকন)</b></h4>
		<h6 style='text-align:center'  > <b>প্রতিষ্ঠাতা-আচার্যঃকৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরনারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদ</b> </h6>

	<div id='jps' >	   <h4 style='text-align:center'  > শ্রীল জয়পতাকা স্বামী গুরু মহারাজ </h4>
		   
		</div>	      
		   <div style='padding-left:20px;padding-right:20px'>
	<p>	<span style='float:left;  '>    স্থান: ".regtoplace($reg)."</span>
		<span style='float:center'>তারিখ:".regtoidate($reg)." </span>
		<span style='float:right'>তিথি :".tithi($reg)."</span> </p>
		<p>	রেজিঃনংঃ".$reg."</p>
		<p>	নাম: ".bname($reg)."</p>
		<p><b>	দীক্ষা নাম:".finalname_b($reg)." </b></p>
		<p>	ঠিকানা :  ".address($reg)." </p>
		<p>	Name:".ename($reg)."</p>
		<p>	<b>Initiated Name:".finalname($reg)."</b></p>
		
		
		 </div >
		<div style='width: 520px;height: 100px;margin: -7px  ; text-align:center;background-color:#005b38'>
		
		 
	<h1 style=' color:white;font-size: 500%;   padding-top: 18px;'><b>	হরিনাম দীক্ষা</b>  </h1>
		
		
		<div>
		
		<p style='padding-left:20px;text-align:left'>Developed By</p>
			<img style='font-family: SumeshwariMJ;float:left ;margin-left:20px;' src='samacar.jpg' width='45' height='45'>
</div>

<div style=' margin-top:-40px'>
		<p style='  font-size: 200%;padding-left:200px;'>JSSSB</p>
	<p style='font-family: Times New Roman; font-style: italic; text-align:center;font-size: 100%;float:right;padding-right:20px;'>	(Jayapataka Swami Sisya Samuha Bangladesh)</p>
		</div>
		</div>
		
		
	</div></td>";	 
	//echo " <tr> <td></td><td style='text-align:right; font-family:SutonnyMJ;'> ".regtoiserial($reg)."</td>   <td>".bname($reg)."</td> <td>".address($reg)."</td>";
	 	 


	 
}
else{
	
	echo "<td><div id='cert1'>
	<h5 style='text-align:center'> শ্রীশ্রী  গুরু গৌরাঙ্গৌ জয়তু:</h5> 
	
	<div id='bothimage'>
	
	<img style='float:left' src='iskconlogo.png' width='70' height='70'>
	<img style='float:right' src='prabhupada.png' width='70' height='70'>
	   </div>
	   <br><br> <br>
	    
	   
	   <h4 style='text-align:center'><b>আন্তর্জাতিক কৃষ্ণভাবনামৃত সংঘ(ইসকন)</b></h4>
		<h6 style='text-align:center'  > <b>প্রতিষ্ঠাতা-আচার্যঃকৃষ্ণকৃপাশ্রীমূর্তি শ্রীল অভয়চরনারবিন্দ ভক্তিবেদান্ত স্বামী প্রভুপাদ</b> </h6>

	<div id='jps' >	   <h4 style='text-align:center'  > শ্রীল জয়পতাকা স্বামী গুরু মহারাজ </h4>
		   
		</div>	      
		   <div style='padding-left:20px;padding-right:20px'>
	<p>	<span style='float:left; '>    স্থান: ".regtoplace($reg)."</span>
		<span style='float:center'>তারিখ:".regtoidate($reg)." </span>
		<span style='float:right'>তিথি :".tithi($reg)."</span> </p>
		<p>	রেজিঃনংঃ".$reg."</p>
		<p>	নাম: ".bname($reg)."</p>
		<p><b>	দীক্ষা নাম:".finalname_b($reg)." </b></p>
		<p>	ঠিকানা :  ".address($reg)."</p>
		<p>	Name:".ename($reg)."</p>
		<p>	<b>Initiated Name:".finalname($reg)."</b></p>
		
		
		 </div >
		<div style='width: 520px;height: 100px;margin: -7px  ; text-align:center;background-color:#005b38'>
		
		 
	<h1 style=' color:white;font-size: 500%;   padding-top: 18px;'><b>	হরিনাম দীক্ষা</b>  </h1>
		
		
		<div>
		
		<p style='padding-left:20px;text-align:left'>Developed By</p>
			<img style='font-family: SumeshwariMJ;float:left ;margin-left:20px;' src='samacar.jpg' width='45' height='45'>
</div>

<div style=' margin-top:-40px'>
		<p style='  font-size: 200%;padding-left:200px;'>JSSSB</p>
	<p style='font-family: Times New Roman; font-style: italic; text-align:center;font-size: 100%;float:right;padding-right:20px;'>	(Jayapataka Swami Sisya Samuha Bangladesh)</p>
		</div>
		</div>
		
		
	</div></td></tr>";
//echo " <td style='width:10px'></td>  <td style='text-align:right;font-family:SutonnyMJ;'> ".regtoiserial($reg)."</td>   <td>".bname($reg)."</td> <td>".address($reg)."</td></tr>";	
		

 
	
}
		
		
$GLOBALS['c']=$GLOBALS['c']+1;	
		
		
		
	$si=$si+1;	 
		 
		 
	 }
	 
	 
	echo"  </table>"	;
	 
	
	
	 
	?>
	
	
	
	
	
	
	
	
	
	
	
	</body>
	</html>
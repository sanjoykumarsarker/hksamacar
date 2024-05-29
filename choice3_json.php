
 
<!DOCTYPE html>

<html>


<head>
  <title>Temple
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  </head>
 <body>
   
 
  
<script>
var myObj17, myJSON17;

//Storing data:
myObj17 = {  
 "nnn17":"<?php echo $_POST['nnn1'];?>",
 "nnn18":"<?php echo $_POST['nnn2'];?>",
 "nnn19":"<?php echo $_POST['nnn3'];?>"
   };
myJSON17 = JSON.stringify(myObj17);
localStorage.setItem("testJSON17", myJSON17);


</script>


 
 

<script>
var   text18, text181, obj182,obj18  ;


//Retrieving data:
text18 = localStorage.getItem("testJSON17");
text181 = localStorage.getItem("testJSON18");
 
obj18 = JSON.parse(text18);
 
 obj182 = JSON.parse(text181);

 
 

var nnn17=obj18.nnn17;
var nnn18=obj18.nnn18;
var nnn19=obj18.nnn19;
var nnn20=obj182.nnn20;
 
  
 
  alert("REG:"+nnn20+"   CHOICE--"+nnn17+","+nnn18+","+nnn19);
function testAjax(handleData) {
$.ajax({
            url: 'choice_data.php ',
            type: 'POST',
            data: {nnn217: nnn17,nnn218: nnn18,nnnn20: nnn20,nnn219: nnn19  },
            success: function(data) {
      handleData(data); 
            }
        });
		
}


testAjax(function(output){
	
	document.write(output);
	
  // here you use the output
});

var output1 = testAjax(svar);


document.write(output1);
</script> 
 
 
</body>

</html>
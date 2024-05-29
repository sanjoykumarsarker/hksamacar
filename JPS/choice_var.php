 
<?php session_start();?>
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
  
<p  id="demo"></p>
<p  id="demo1"></p>
<script>
var   text, obj;


//Retrieving data:
text = localStorage.getItem("testJSON");
obj = JSON.parse(text);
document.getElementById("demo").innerHTML = obj.loginname;

var loginname=obj.loginname;

var btstr=obj.tstr;

document.write(btstr);
</script> 

<script>
var   text1, obj1;


//Retrieving data:
text1 = localStorage.getItem("testJSON1");
obj1 = JSON.parse(text1);
 

 document.getElementById("demo1").innerHTML = obj1.ename;

 

var bname=obj1.bname;
 
var ename=obj1.ename;
var age=obj1.age;
var address=obj1.address;
var phone=obj1.phone;
var service=obj1.service;
var gender=obj1.gender;
var education=obj1.education;
var mstatus=obj1.mstatus;
var nprefer=obj1.nprefer;

var loginname=obj.loginname;

function testAjax(handleData) {
$.ajax({
            url: 'choice_data.php ',
            type: 'POST',
            data: {tstr: btstr,dbbname: bname,dename: ename,dage: age,daddress: address,dphone: phone,
			dservice: service,dgender: gender,deducation: education,
			dmstatus: mstatus,dnprefer: nprefer, dloginname: loginname},
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
 
<script>
// then echo it into the js/html stream
// and assign to a js variable
var spge = '<?php echo $tregs ;?>';

// then

document.write(spge);
 

</script>



</html>
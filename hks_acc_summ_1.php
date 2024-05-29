<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Cash Memo (Retail)</title>


  <meta charset="utf-8">
 
 <link rel="shortcut icon" href="favicon1.ico" />
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
 <link href="https://fonts.googleapis.com/css?family=Leckerli+One" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 
 

<style type="text/css">


body, html, .container-fluid {
     height: 100%;
}
 
 
/* ---Start of Wrapper style ---- */

#wrapper	{
		background-color: #787878;
	}

.card-header	{
	background-color: #3c3c3c;
	max-height: 40px;
	padding: 5px;
	}

.card-link {	
	color: white;
	}
	
.card-link:Hover {	
	color: yellow;
	}
	
.card-body {
	padding: 5px;
	background-color: #f0f0f0;
	
	}
	
.card-body a {	
	color: black;
	}




/* ---end of Wrapper style ---- */



</style>

</head>
<script>
var id=0;
var name;
var min=-1;
 
function agBookSearch() {
	document.getElementById("ag_submit").submit();

 
}



 
function myFunction1_( ) {
 
	name="name"+id;
    
 
var c = document.getElementById(name);
c.remove();
 

 id=id-1;
 totalPaid_multiply();
totalPaid();
totalPaid1();

}






















function myFunction1( ) {
	id=id+1;
	name="name"+id;
    min=min+1;
  
var g= document.getElementById("sel2").innerHTML;	
 //document.getElementById("select1").innerHTML =g;

var para = document.createElement("DIV");
   // var t = document.createTextNode("This is a paragraph.");
   // para.appendChild(t);

    document.getElementById("sel1").appendChild(para);
		para.setAttribute("id", name);

para.innerHTML =g;
para.style.backgroundColor = "cornsilk";
para.style.padding = "0px 0px 0px 0px";

para.setAttribute("class", "row");
var c = document.getElementById(name).children;
c[0].children[0].setAttribute("name", name+1);
c[1].children[0].setAttribute("name", name+2);

c[2].children[0].setAttribute("name", name+3);
c[3].children[0].setAttribute("name", name+4);

c[0].children[0].setAttribute("id", name+1);
c[1].children[0].setAttribute("id", name+2);

c[2].children[0].setAttribute("id", name+3);
c[3].children[0].setAttribute("id", name+4);



 
 document.getElementById(name+3).addEventListener("keyup", totalPaid_multiply);


document.getElementById(name+4).addEventListener("keyup", totalPaid);

//document.getElementById(name+3).addEventListener("keyup", totalPaid1);

document.getElementById(name+2).addEventListener("keyup", totalPaid1);


}





function totalPaid_multiply() {


var j;
var sum;
sum=0;
for( j=0;j<=id;j++){



sum=parseFloat(document.getElementById("name"+j+2).value)*parseInt(document.getElementById("name"+j+3).value);
var mul_val=parseFloat(document.getElementById("name"+j+2).value)*parseFloat(document.getElementById("name"+j+3).value);

document.getElementById("name"+j+4).value=mul_val;    

sum=sum+parseFloat(document.getElementById("name"+j+4).value);



}

  //  document.getElementById("cash_total_donation_id").value=sum;     
  //  document.getElementById("max_val").value=id;	
  totalPaid();




document.getElementById("cash_total_due").value  =

parseInt(document.getElementById("cash_total_donation_id").value)-

parseInt(document.getElementById("cash_total_paid").value)-
  parseInt(document.getElementById("cash_disc").value);



}

function totalPaid() {


    var j;
    var sum;
    sum=0;
  for( j=0;j<=id;j++){


  

 

  sum=sum+parseInt(document.getElementById("name"+j+4).value);
 


  }

        document.getElementById("cash_total_donation_id").value=sum;     
		document.getElementById("max_val").value=id;	
 




 document.getElementById("cash_total_due").value  =
  
  parseInt(document.getElementById("cash_total_donation_id").value)-

  parseInt(document.getElementById("cash_total_paid").value)-
  parseInt(document.getElementById("cash_disc").value);
;
}




function totalPaid1() {


var j;
var sum;
sum=0;
for( j=0;j<=id;j++){






sum=sum+parseInt(document.getElementById("name"+j+2).value);



}

	document.getElementById("cash_total_copy_id").value=sum;     
	//document.getElementById("max_val").value=id;	





document.getElementById("cash_total_due").value  =

parseInt(document.getElementById("cash_total_donation_id").value)-

parseInt(document.getElementById("cash_total_paid").value);

totalPaid_multiply()
}



</script>
 
<script>
function myFunction(str) {
 
	if (str.length == 0) { 
        document.getElementById("cash_name").value = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
var sss=this.responseText;
							 var res = sss.split("@#");
								 document.getElementById("cash_name").value = res[0];
								 document.getElementById("cash_addr").value = res[1];

                 document.getElementById("cash_mobile").value = res[2];

            }
        };
        xmlhttp.open("GET", "hks_id_to_address_data.php?q=" + str, true);
        xmlhttp.send();
    }
}
 


















 function paid(str) {

     document.getElementById("cash_total_due").value  =
  
  parseInt(document.getElementById("cash_total_donation_id").value)-

  parseInt(document.getElementById("cash_total_paid").value)-
  parseInt(document.getElementById("cash_disc").value);

                
      
}

</script>

<body>
 
<?php

$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";


date_default_timezone_set("Asia/Dhaka");
  $date= intval(date("Ymd"));
// Create connection

?> 




<?php
 

 // Create connection
 $conn_trans_id = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_trans_id->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 mysqli_set_charset($conn_trans_id,"utf8");
 $sql_id = "SELECT id FROM cob_month where status='1' ";
 $result_id = $conn_trans_id->query($sql_id);
 
 if ($result_id->num_rows > 0) {
     // output data of each row
     $row = $result_id->fetch_assoc();
     $row["id"];
     if($row["id"]!=""){
         $GLOBALS['id']= intval($row["id"]);
            
     }
      
    
 }  
 $conn_trans_id->close();
 ?> 












<?php
 

 // Create connection
 $conn_trans_id = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_trans_id->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 mysqli_set_charset($conn_trans_id,"utf8");
 $sql_id = "SELECT MAX(id)as maxid FROM expense where (id IS NOT NULL)AND(id LIKE '".$GLOBALS['id']."____') ";
 $result_id = $conn_trans_id->query($sql_id);
 
 if ($result_id->num_rows > 0) {
     // output data of each row
     $row = $result_id->fetch_assoc();
     $row["id"];
     if($row["maxid"]!=""){
         $GLOBALS['maxtransid']= intval($row["id"]);
            ; 
     }
     else{
        $GLOBALS['maxtransid']=$GLOBALS['id']."001";
        ; 
     }
    
 } 
 
 else{
	$GLOBALS['maxtransid']=$GLOBALS['id']."001";
	; 
}
 $conn_trans_id->close();
 ?> 




<div class="container-fluid">

<div class="row" style= "height: 100%;" >

<div id="wrapper" class="col-md-2 col-xl-2">

  <?php include_once "hks_sidebar.php" ;   ?>
<!-- Sidebar  
  
	<br> <br>
    <div class="col-sm-12 col-lg-12" style="text-align: center;">
        <p><img src="front_images/hklogo.gif" height="100" width="100" alt="HKS"></p>
        <h5 style="font-family: 'Leckerli One', cursive; color: white;" > Hare Krishna Samacar</h5>
    </div>
  
  
    <div id="accordion">
  
    <div class="card">
      <div class="card-header">
        <a class="card-link" href="hks_dashboard.php"> Dashboard</a>
      </div>
    </div>
	
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo"> Agents  </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
			<a href="hks_agent_new.php" > New Agent </a> <br>
			<a href="hks_agent_book.php" > Agent Book </a> 
        </div>
      </div>
    </div>
	
	<div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse3"> Subscribers  </a>
      </div>
      <div id="collapse3" class="collapse" data-parent="#accordion">
        <div class="card-body">
			<a href="hks_subs_new.php"> New Subscriber </a> <br>
			<a href="hks_subs_book.php"> Subscriber Book </a> 
		</div>
      </div>
    </div>
	
	<div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="hks_products.php"> Products  </a>
      </div>
    </div>
	
	<div class="card">
      <div class="card-header">
        <a class="collapsed card-link" data-toggle="collapse" href="#collapse5"> Cash Memo  </a>
      </div>
      <div id="collapse5" class="collapse" data-parent="#accordion">
        <div class="card-body">
			<a href="hks_cash_retail.php" > Retail Sale </a> <br>
			<a href="hks_cash_post.php" > Courier & Post Office </a>			  
        </div>
      </div>
    </div>
	
	<div class="card">
      <div class="card-header">
        <a class="collapsed card-link"  href="hks_send_newspaper.php"> Send Newspaper  </a>
      </div>
    </div>
	
	<div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="hks_acc_summ.php"> Accounts  </a>
      </div>
    </div>
	
	
    <div class="card">
      <div class="card-header">
        <a class="collapsed card-link" href="#collapse9"> Settings    </a>
      </div>
    </div> 
  
  </div> 
		<div style="text-align:center; position: fixed; bottom: 0;">
           <p style= "cursor: pointer;text-align:center; color: yellow;" > Powered by <br> <a href="https://www.facebook.com/hksamacar/" target="_blank" style="color: white;" >@HareKrishnaSamacarIT</a> <br> <?php echo date("d-m-Y") ?> </p>
           <br>  <?php include_once "hks_user.php" ;   ?>

       
        </div>
</div>
  
   -->
<div class="col-md-10 col-xl-10"> 
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
              <div class="col-md-12">
              <p class="well lead" style="margin-top: 10px;" > Retail Sales </p>
            <div class="container">
                <div class="row"> <!-- div da esquerda -->
                    <!-- Text input CNPJ e Razao Social-->
                    <div class="col-sm-12 contact-form"> <!-- div da direita -->
                        <form id="contact" method="post"  target="_blank"  action ="hks_cash_retail_data.php" class="form" role="form">
                            <div class="row">
							    <div class="col-xs-4 col-md-4 form-group">
                                    <input class="form-control" id="inputCNPJ" name="cash_trnx" value="<?php echo $GLOBALS['maxtransid'];?>" type="text" autofocus />
                                </div>
 				 

 
								<div class="col-xs-4 col-md-4 form-group">
                                    <input class="form-control" id="inputCNPJ" name="cash_date"   type="date"  />
                                </div>
                               


                                
                            </div>
                            
 
							<div id="sel1" >

                            <div  id="sel2"  class="row" style="background-color: cornsilk; padding: 10px 0px 0px 0px">
                                <div class="col-xs-3 col-md-3 form-group" >
									<select class="form-control" id="name01" name="name01"  >
                                
																<option>Devotee</option>
													<option>Postage</option>
													<option>Travelling</option>
													<option>Printing</option>
													<option>Paper</option>
													<option>Entertainment</option>
													<option>Internet</option>
													<option>Book</option>
													<option>Legal Fee</option>
													<option>Repair</option>
													<option>Asset Purchase</option>

</select>
                            
								
  <!-- <button class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: tomato;" class="fas fa-plus-square"></i></button> <span style="line-height: 2;"> Click to add new row.</span> -->
                 
								 
								 
								                </div>
								
                                <div class="col-xs-3 col-md-3 form-group">
                                
                                    <input class="form-control" id="name02" name="name02" placeholder="No. of Copy" onkeyup="totalPaid1()"type="text" />
                                </div>

                                <div class="col-xs-3 col-md-3 form-group">
  
                                    <input class="form-control" style="display: inline-block;" id="name03" name="name03"  placeholder="@" onkeyup="totalPaid_multiply
                                    ()"  type="text" /> 

                                </div>
								
                                <div class="col-xs-3 col-md-3 form-group"  >
                                
 									<input class="form-control" style="display: inline-block;" id="name04" name="name04" placeholder="Donation" onkeyup="totalPaid()" type="text" />
								</div>
								
							</div>
							</div>

							<button type="button" onclick ="myFunction1()"   class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: tomato;" class="fas fa-plus-square"></i></button> <span style="line-height: 2;"> Click to add new row.</span>
                           
                            <button type="button" onclick ="myFunction1_()"   class="btn btn-outline-light text-dark btn-sm"><i  style="font-size: 1em; color: tomato;" class="fas fa-minus-square"></i></button> <span style="line-height: 2;"> Click to delete row.</span>

                          
			
							<hr style="background-color: transparent; border: 1px solid red; margin: 0em 0em 0em 0em; " noshade>
							<div class="row" style="background-color: cornsilk;">
								
								<div class="col-xs-1 col-md-1 form-group">
									<div class="controls">
										<label for="" > Total </label>
										<input class="form-control" style="background-color: transparent;" id="cash_total_donation_id" name="cash_total_donation" onkeyup="paid(this.value)" placeholder="" type="text" />
									</div>
								</div>



								<div class="col-xs-1 col-md-1 form-group">
									<div class="controls">
										<label for="" > Copy </label>
										<input class="form-control" style="background-color: transparent;"id="cash_total_copy_id" name="cash_total_copy" onkeyup="paid(this.value)"  type="text" />
									</div>
								</div>

                                <div class="col-xs-2 col-md-2 form-group">
									<div class="controls">
										<label for="" > Discount</label>
										<input class="form-control" id="cash_disc" name="cash_disc"   onkeyup="paid(this.value)"  type="text" />
									</div>
								</div>

                	            <div class="col-xs-2 col-md-2 form-group">
									<div class="controls">
										<label for="" > Paid</label>
										<input class="form-control" id="cash_total_paid" name="cash_total_paid" onkeyup="paid(this.value)" type="text" />
									</div>
								</div>

                	            <div class="col-xs-2 col-md-2 form-group">
									<div class="controls">
										<label for="" > Due </label>
										<input class="form-control" style="background-color: transparent;" id="cash_total_due" name="cash_total_due"  type="text" />
									</div>
								</div>

                                <div class="col-xs-2 col-md-2 form-group">
									<div class="controls">
										<label for="" > Comments</label>
										<input class="form-control" id="comments" name="comments"  placeholder="Comments" type="text" />
									</div>
								</div>


								<div class="col-xs-2 col-md-2 form-group" style="padding: 30px 0px 0px 40px;">
									<button class="btn btn-danger" type="submit" >Submit</button>
								</div>
							</div>

              					<input   name="max_val" id="max_val"  type="hidden" />

                        </form>
                    </div> <!-- fim div da direita -->
				  
                </div> <!-- fim div da esquerda -->
            </div>
			<hr>
			 



    <div class="col-sm-12 col-md-12  contact-form" style="background-color: #ffd777;"> <!-- div da direita -->
    <form id="ag_submit" method="post" class="form" role="form" target='iframe_cash_retail_search'  action="hks_cash_retail.search.php">
                            <h3>Search Report</h3>
							<div class="row" style="background-color: green; ">


              <div class="col-xs-3 col-md-3 form-group">
									<label for="stdate">Starting date </label>
                  <input class="form-control" id="ag_input" name="ag_search" placeholder="Type  to Search" type="text"  onkeyup=""/>
                                </div>


 


								<div class="col-xs-3 col-md-3 form-group">
									<label for="stdate">Starting date </label>
                  <input class="form-control" id="ag_input" name="date_from"  type="date"  onkeyup=""/>
                                </div>
                                <div class="col-xs-3 col-md-3 form-group">
									<label for="enddate">Ending date </label>
                  <input class="form-control" id="ag_input" name="date_to"  type="date"  onkeyup=""/>
                                </div>
                                <div class="col-xs-3 col-md-3 form-group" style="text-aling: right; padding: 30px 0px 0px 0px">
                                <button  class="btn btn-danger"  type="submit"> Search</button>

								</div>
							</div>
						 
                        </form>
                    </div> <!-- End of Report Print -->






        <div class="col-sm-12 col-md-12  contact-form" style="background-color: #ffd7eb;"> <!-- div da direita -->
                        <form id="contact" method="post" class="form" role="form">
                            <h3>Print Report (A/C Summary)</h3>
							<div class="row" style="background-color: #ffd7eb; ">
								<div class="col-xs-4 col-md-4 form-group">
									<label for="stdate">Starting date </label>
									<input class="form-control" id="stdate" name="send_all_date" placeholder="Type Date" type="date" />
                                </div>
								<div class="col-xs-4 col-md-4 form-group">
									<label for="enddate">Ending date </label>
									<input class="form-control" id="enddate" name="send_all_date" placeholder="Type Date" type="date" />
                                </div>
                                <div class="col-xs-4 col-md-4 form-group" style="text-aling: right; padding: 30px 0px 0px 0px">
									<button class="btn btn-success" type="submit" >Print</button>
									<button class="btn btn-danger" type="submit" >Print All</button>
								</div>
							</div>
							 
                        </form>
                    </div> <!-- End of Report Print -->






				</form>
			</div>
		
	        <iframe name='iframe_cash_retail_search' height="700" width="100%" scrolling="yes" style="border:0"></iframe> 

		            </div>
          </div>
        </div>
    </div>
      



</div>




</div> <!-- end of row -->

</div> <!-- end of container -->

</body>
</html>
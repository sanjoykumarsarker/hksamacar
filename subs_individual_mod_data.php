<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<title>Hare Krishna Samacar</title>


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
  <script>
function upazilaFunction(str) {



  if (str == "") {
        document.getElementById("upazila").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("upazila").innerHTML = this.responseText;



                                document.getElementById("kkk").innerHTML = str;

            }
        };
        xmlhttp.open("GET","upazila.php?q="+str,true);
        xmlhttp.send();
    }


    
}
</script>


 <script>
function postofficeFunction(str) {



  if (str == "") {
        document.getElementById("postoffice").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("postoffice").innerHTML = this.responseText;



 
            }
        };
        xmlhttp.open("GET","postoffice.php?q="+str,true);
        xmlhttp.send();
    }


    
}
</script>
 <body>
  
<?php
$servername = "localhost";
$username = "HKSamacar_local";
$password = "Jpsk/1866";
$dbname = "HareKrishnaSamacar";

// Create connection

?> 

        <?php $GLOBALS["id_en"]= $_POST["id_en"];?> 

 <?php
 include_once "function.php";

 // Create connection
 $conn_id = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_id->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 mysqli_set_charset($conn_id,"utf8");
 $sql_id = "SELECT  Name,Des,Org,vill,po,po_bn,ps,dist,mob,phone,email,comment FROM tblMem where ID_EN ='".$GLOBALS["id_en"]."'";
 $result_id = $conn_id->query($sql_id);
 
 if ($result_id->num_rows > 0) {
     // output data of each row
     $row = $result_id->fetch_assoc();
           
            

           //

           $GLOBALS['Name']= $row["Name"];
           $GLOBALS['Des']= $row["Des"];
           $GLOBALS['Org']= $row["Org"];

           $GLOBALS['vill']= $row["vill"];

          // $GLOBALS['vill']= $row["vill"];
           $GLOBALS['po']= $row["po"];
           $GLOBALS['po_bn']= $row["po_bn"];

           $GLOBALS['ps']= $row["ps"];
           $GLOBALS['dist']= $row["dist"];
           $GLOBALS['phone']= $row["phone"];
           $GLOBALS['mob']= $row["mob"];
           $GLOBALS['email']= $row["email"];
           $GLOBALS['comment']= $row["comment"];

 } else {
     echo "0 results";
 }
 $conn_id->close();
 ?> 
        <!-- Modal body -->

        <div class="modal-body">
 
                  
        <div class="col-sm-8 contact-form"> 
        
        <!-- 
            
            target='iframe_subs_new_update'
            
            div da direita -->
                        <form id="contact" method="post" class="form" role="form" action ="hks_subs_update_data.php" >
                            <div class="row">
							
								 
						<h4>	<?php echo $GLOBALS['Name'];?> (<?php echo $GLOBALS['id_en'];?>)</h4>
                                <div class="col-xs-6 col-md-6 form-group">
                                 
                                 <input class="form-control" id="agent_number" name="ag_number" value="<?php echo $GLOBALS['id_en'];?>" type="hidden" autofocus />

                                     <input class="form-control" id="trans_id" name="trans_id" value=" "" type="hidden" autofocus />
                                    <input class="form-control" id="inputCNPJ" name="maxidx_tblmain" value="" type="hidden" autofocus />

                               
                               
                                </div>
                                <div class="col-xs-4 col-md-12 form-group">
                                    <input class="form-control" id="ag_name_mod1" name="ag_name"  value="<?php echo $GLOBALS['Name'];?>" type="text" />
                                </div>
								<div class="col-xs-4 col-md-12 form-group">
                                    <input class="form-control" id="ag_addr" name="ag_addr" value="<?php echo $GLOBALS['vill'];?>"placeholder="Address" type="text" />
                                </div>
                            </div>
							
                            <div class="row">							
							
                                <div class="col-xs-4 col-md-4 form-group">
                                    
<select   class="form-control"id="id_district" name="ag_dist" onchange="upazilaFunction(this.value);postofficeFunction(this.value)"  >
<option><?php echo $GLOBALS['dist'];?></option>
<?php

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, district_name FROM districts order by district_name asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value =".$row['id'].$row['district_name'].">".$row['district_name']."</option>";
 
        echo "<option value =".$row['id'].$row['district_name'].">".dist_en_bn($row['id'].$row['district_name'])."</option>";

        
    }
 } else {
 }
$conn->close();



 



?>

</select>

                                </div>
								
                                <div class="col-xs-4 col-md-4 form-group">
                                <select class="form-control"id="upazila" name="ag_ps"onchange="upzilaFunction(this.value)"  >
                                       
                                <option><?php echo   $GLOBALS['ps'];?><option>


 
                                       </select>
                                </div>
                                <div class="col-xs-4 col-md-4 form-group">
                                    <select class="form-control"id="postoffice" name="ag_po" >
                                       
                                    <option><?php echo   $GLOBALS['po'];?><option>


 
									</select>
                                </div>
                                <div class="col-xs-4 col-md-4 form-group">
									<input class="form-control" id="ag_poffice_bn" name="ag_poffice_bn"    value="<?php echo $GLOBALS['po_bn'];?>"  type="text" />
								</div>
							
                                <div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="ag_mobile1" name="ag_mobile1" placeholder="Phone 1" minlength="11" maxlength="11" size="11"   value="<?php echo $GLOBALS['mob'];?>" type="text" required />
                                </div>
								<div class="col-xs-6 col-md-6 form-group">
                                    <input class="form-control" id="ag_mobile2" name="ag_mobile2" placeholder="Phone 2"  minlength="11" maxlength="11" size="11"  value="<?php echo $GLOBALS['phone'];?>" type="text" />
                                </div>
								
							 
								
								 
                                <div class="col-xs-4 col-md-6 form-group">
                                    <input class="form-control" id="ag_email" name="ag_email"placeholder="Email" value="<?php echo $GLOBALS['email'];?>" type="email" />
                                </div>
                            </div>
 
							<div class="row">
								<div class="col-xs-4 col-md-8 form-group">
									<div class="controls">
                                    <textarea class="form-control" id="message" name="message"  
                                    
                                    
                                    
                                    
                                    rows="3"> <?php
                                    
                                    echo 
                                   
                                   
                                   $GLOBALS['Name']."".
                                   
                                   $GLOBALS['Des']."".
                                   $GLOBALS['Org']."".
                                   $GLOBALS['vill']."".
                                   $GLOBALS['po']."".
                                   $GLOBALS['po']."".
                                   $GLOBALS['ps_bn']."".
                                   $GLOBALS['rdno']."".
                                   $GLOBALS['hsno']."".
                                   $GLOBALS['dist']."".
                                   $GLOBALS['phone']."".
                                   $GLOBALS['mob']."".
                                   $GLOBALS['email'].""

                                   
                                   
                                   
                                   ?></textarea>									</div>
								</div>
								<div class="col-xs-4 col-md-4 form-group">
 									<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal" onclick="submitFunction()" >Submit</button>
								</div>
							</div>
                        </form>
                    </div>
       


        
         
        </div>
        </body>



        </html>
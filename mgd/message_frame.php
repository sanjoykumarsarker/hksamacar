<style>
.input-group-addon {
	
	min-width:80px;
	background-color: whitesmoke;
    text-align:left;

}
.marginRow {
     margin:0px ; 
   }
   
.tbutton {
	background-color: Transparent;
	border: none;
    background-repeat:no-repeat;
    cursor:pointer;
    overflow: hidden;
	text-align: left;
    outline:none;
	color:black;
}




 	
 
.modal-content.ui-resizable {
  overflow-y: scroll;
  position: static;
}

.modal-content{
	background:#fff0e5;
	
}

.mytext{
    border:0;padding:10px;background:#FEFEFE;
}
.mytext1{
    border:0;padding:10px;background:#FEFEFE; opacity: 0.8;
}


.text{
    width:75%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
    width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 12px;
}
.text > p:last-of-type{
    width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
    float:left;padding-right:10px;
}        
.text-r{
    color:white; float:right;padding-left:10px;
}
.avatar{
    display:flex;
    justify-content:center;
    align-items:center;
    width:25%;
    float:left;
    padding-right:10px;
}
.macro{
    margin-top:5px;width:85%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
    float:right;background:#ef1c1c;
}
.msj{
    float:left;background:white;
}
.frame{
    background:#fff0e5;
    height:450px;
    overflow-y:auto;
    padding:0;
}
.frame1{
    background:#b70707;
    height:450px;
    overflow-y:auto;
    padding:0;
}

.frame > div:last-of-type{
    position:absolute;bottom:5px;width:100%;display:flex;
}
ul#chat {
    width:100%;
    list-style-type: none;
    padding:18px;
    position:absolute;
    bottom:32px;
    display:flex;
    flex-direction: column;
}

ul#user {
    width:100%;
    padding:5px;
    bottom:10px;
}

#user li{
	height:45px;
	vertical-align: middle;
}

#user li:hover{
	background-color: rgba(255, 255, 255, 0.5); 
	opacity: 0.8;
	cursor: pointer;
}



.msj:before{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:-14px;
    position:relative;
    border-style: solid;
    border-width: 0 13px 13px 0;
    border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
    width: 0;
    height: 0;
    content:"";
    top:-5px;
    left:14px;
    position:relative;
    border-style: solid;
    border-width: 13px 13px 0 0;
    border-color: #ef1c1c transparent transparent transparent;           
}  
input:focus{
    outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
    color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
    color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
    color: #d4d4d4;
}   




.fontAwesome {
  font-family: 'Helvetica', FontAwesome, sans-serif;
}

 
 </style>
 
<?php

  include "function.php";
  $id_val= $_POST['id_val'];

 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";

 
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



   
$sqld = "select m_to_si,m_from_si,body,m_time ,id from message where m_from_si='$id_val' or m_to_si='$id_val' order by id asc";

$resultd = $conn->query($sqld);
 
   echo" <ul>";
 if ($resultd->num_rows > 0) {
	 
  //  echo " <select id='change' name='str' class='form-control'>";
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
	
 

 if($row["m_from_si"]==$id_val){
 
 
 
 
 
 
 
 echo "<li style='width:100%'>  
                       <div class='msj macro'> 
                            <div class='text text-l'>
                                <p>".$row["body"]."</p>
                                <p><small></small></p>
                            </div>
                        </div>
                  </li>";
 
 }
 else{

 
 
 
 
  echo "<li style='width:100%;'>
                        <div class='msj-rta macro'>
                            <div class='text text-r'>
                            <p>".$row["body"]."</p>
                                <p><small></small></p>
                            </div>
                        <div class='avatar' style='padding:0px 0px 0px 10px !important'></div>                               
                  </li>";
 
 }
 
 
}  

 

}
 
  
	 echo" </ul>";
	
$conn->close();	
 
?>


 <div  >
			<iframe name="myframe1" width="100" height="200" frameborder="0"></iframe>
			
                <div   style="margin:auto">                        
                    <div   style="background-color: #FEFEFE ">
					
					<form target="myframe1" method="post" action="message_compose_data.php">
                        <input class='form-control' type="text" name="m_to" placeholder="To"/>
						  <input class='form-control' type="text" name="m_body" placeholder="Type a message"/>
						    <input  type="hidden" name="id_val" value="<?php echo $_SESSION['id_val'];?>" />
												    <input   type="hidden" name="m_from" value="<?php echo $_SESSION['loginname'];?>" />

						<button type="submit">send</button>
						</form>
                    </div> 
                </div>
            </div>
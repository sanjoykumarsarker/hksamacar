<?php ini_set('max_execution_time', '0'); ?>
<?php
//  $idate = date('Y-m-d', strtotime('2020-01-25'));
$idate = '2020-01-20';
 if (isset($_POST['idate'])) {
   $idate = $_POST['idate'];
 }
 $percent="100";
 if (isset($_POST['percent'])) {
  $percent = $_POST['percent'];
}

 include "function.php";
 $servername = "localhost";
 $username = "sanpro_hksamacar";
 $password = "01915876543";
 $dbname = "sanpro_diksa";

 
 $finalname_search_database_c= array();
 $finalname_search_input_c= array();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Final name Check</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Da|Modak" rel="stylesheet"> 
  <link rel='stylesheet' id='et-shortcodes-css-css'  href='http://www.jayapatakaswami.com/wp-content/themes/Divi/epanel/shortcodes/css/shortcodes.css?ver=3.0.45' type='text/css' media='all' />
  <link rel='stylesheet' id='et-shortcodes-responsive-css-css'  href='http://www.jayapatakaswami.com/wp-content/themes/Divi/epanel/shortcodes/css/shortcodes_responsive.css?ver=3.0.45' type='text/css' media='all' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  </head>

  
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
                  document.getElementById("livesearch").style.border = "0px solid #A5ACB2";
               }
            }
            
            xmlhttp.open("GET","livesearch.php?qn="+strn,true);
            xmlhttp.send();						
         }
      </script>
	  
  
   

  <body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <div class="navbar-header">
        <button
          type="button"
          class="navbar-toggle"
          data-toggle="collapse"
          data-target=".navbar-collapse"
        >
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> </a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-nav navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user  "></i>
            <i class="glyphicon glyphicon-triangle-bottom"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <form>
                <button class="tbutton">
                  <i class="fa fa-cog fa-spin fa-fw"></i>
                  <?php echo $_SESSION['idnn']; ?>
                </button>
              </form>
            </li>

            <li class="divider"></li>

            <li>
              <form method="post" action="logout.php">
                <input
                  type="hidden"
                  name="logout"
                  value="namanirnaya_login.php"
                /><button class="tbutton">
                  <i class="fa fa-sign-out fa-fw"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
    <?php
      if (isset($_POST['idate']) &&isset($_POST['percent'])  ) {
        echo "<h2 class='text-danger text-center'>Showing for Date: $idate Matching $percent % </h2>";
      }  

      ?>
      <div >
          <form action="" method="post">
            <div class="form-group row">
             
              <div class="col">



             

                <?php
  // $q = $_GET['qnn'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed:". $conn->connect_error);
} 
 
$sqld = "SELECT DISTINCT idate FROM reg";
$resultd = $conn->query($sqld);
 
if ($resultd->num_rows > 0) {
  echo "<select id='change' name='idate' class='form-control'>";
  echo "<option>Please Select Date</option>";

  // output data of each row
    while($row = $resultd->fetch_assoc()) {
    
echo "<option>".$row["idate"]."</option>";
}  
echo "</select>";}
$conn->close();
?> 
 
              </div>
           
    <div class="col">
      <input type="text" class="form-control"  name ="percent" placeholder="Matching Percentage (0-100)">
    </div>
    
 




              <div class="col">
                    <button type="submit" class="btn btn-danger">Submit</button>            
               </div>
            </div>
            
          </form>
        </div>
      <div class="row">
        <div class="col">
        
        
            <div style="height:85vh; overflow-y: scroll;">
                <div class="table-responsive">
            
                <table  class="table table-bordered ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>details</th>

                  <th>Finalname</th>
                  <th>DataBase</th>
                  <th>Input</th>
              
                </tr>
              </thead>
              <tbody>
              
                <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}

$resultr=  $connr->query("SELECT reg,bname,ename,templename,age,address,service,gender,mstatus,nprefer,education,phone,
	recom,nchoice1,nchoice2,nchoice3,idate,iserial,finalname,finalname_b,comments,imagename
	FROM reg WHERE idate='$idate' AND isinitiated!='Initiated' and isinitiated!='Absent'  order by cast(iserial as unsigned int) asc");
 
 if ($resultr->num_rows > 0) {
	
  while($row = $resultr->fetch_assoc()) {
    $finalname_search_database_c= finalname_search_database($percent,$row["finalname"]);
    $finalname_search_input_c= finalname_search_input($percent,$row["finalname"]);


    // $blah = array_slice($finalname_search_database_output, 1, 1); // array(0 => 1)
 //$value = $blah[0];

 echo ' <tr>
 <td>'.$row["iserial"].'</td>';


 echo '
 <td>
   <form target="_blank" action="devedit.php" method="POST">
     <button
       name="edit"
       class="tbutton btn btn-outline-dark btn-sm"
       type="submit"
       value="'.$row["reg"].'"
     >
       Reg: '.$row["reg"].'

     </button>
   </form>

   <p>
     <span style="color:red;">  '.$row["ename"].'</span>
     '.$row["bname"].'
     <br />
      '.$row["phone"].'
     <br />
     '.$row["gender"].' (<span style="color:red;"> '.$row["mstatus"].'</span>)&nbsp; &nbsp;
     Age:  '.$row["age"].' , Lila: <span style="color:red;"> '.$row["nprefer"].'</span>
     <br />
     '.$row["service"].', Education:  '.$row["education"].'
     <br />
   </p>
 </td>
 <td class="text-center"  >

 '.$row["finalname"].'
 </td>';
 
 echo '<td> ';


 foreach($finalname_search_database_c as $x => $x_value) {
  // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
 
 

 echo  $x." = ".$x_value." % <br>";
  
 }
echo "</td><td>";

 foreach($finalname_search_input_c as $x1 => $x_value1) {
  // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";
 
 

 echo  $x1." = ".$x_value1." % <br>";
  
 }
 
  echo '</td>';

 echo ' </tr>  ';


  }

} else {

 
  
}

?>
              </tbody>
            </table>
                </div>
            </div>
        </div>
        
    </div>
    <script>
    
    $('document').ready(()=>{
      // $('.submit').on('change', function(e) {
      //   $(e.target.form).submit();
      // });

      $('input[name="finalname"]').on('keyup', function(e) {
        showResultn($(this).val()); 
      })
    });
    </script>
  </body>
</html>

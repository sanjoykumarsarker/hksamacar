<?php
//  $idate = date('Y-m-d', strtotime('2020-01-25'));
$idate = '2020-01-20';
 if (isset($_POST['idate'])) {
   $idate = $_POST['idate'];
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Final name Correction</title>
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
      if (isset($_POST['idate'])) {
        echo "<h2 class='text-danger text-center'>Showing for Date: $idate </h2>";
      }
      ?>
      <div class="m-3">
          <form action="" method="post">
            <div class="form-group row">
            <div class="col-4">
            </div>
              <div class="col-4">
                <select name="idate" class="form-control" autofocus>
                  <option value="">Select Date</option>
                  <option value="2020-01-25">2020-01-25</option>
                  <option value="2020-01-26">2020-01-26</option>
                  <option value="2020-01-27">2020-01-27</option>
                </select>
              </div>
              <div class="col-4">
                    <button type="submit" class="btn btn-danger">Submit</button>            
               </div>
            </div>
            
          </form>
        </div>
      <div class="row">
        <div class="col-9">
        
        
            <div style="height:85vh; overflow-y: scroll;">
                <div class="table-responsive">
            
                <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Info</th>
                  <th>Final Name Correction</th>
                  
                </tr>
              </thead>
              <tbody>
              
                <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
 
// Create connection
$connr = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connr->connect_error) {
     die("Connection failed: " . $connr->connect_error);
}

$resultr=  $connr->query("SELECT reg,bname,ename,templename,age,address,service,gender,mstatus,nprefer,education,phone,
	recom,nchoice1,nchoice2,nchoice3,iserial,finalname,finalname_b,comments,imagename
	FROM reg WHERE idate='$idate' AND isinitiated!='Initiated' and isinitiated!='Absent'  order by cast(iserial as unsigned int) asc");
 
 if ($resultr->num_rows > 0) {
	
  while($row = $resultr->fetch_assoc()) {

    echo ' <tr>
    <td>'.$row["iserial"].'</td>
    <td>
      <form target="_blank" action="devedit.php" method="POST">
        <button
          name="edit"
          class="tbutton btn btn-outline-dark btn-sm"
          type="submit"
          value="0318030001"
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
      <form target="name_search" action="finalname_correction_search.php" method="post">
        <div class="form-group">
         <input  type="hidden" name="regid"  value="'.$row["reg"].'"> 
        <input
            type="text"
            class="form-control"
            value= "'.$row["finalname"].'"
            name="finalname"
          />
        </div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            name="finalname_b"
            value= "'.$row["finalname_b"].'"
          />
        </div>
        <div class="form-group">
          <input
            type="submit"
            class="btn btn-block btn-success"
            value="Change"
          />
        </div>
      </form>
    </td>
  </tr>  ';


  }

} else {

  echo "<tr>
      <td colspan='3'><h2 class='text-danger text-center'>Please Select Date</h2></td>
  </tr>";
}

?>
              </tbody>
            </table>
                </div>
            </div>
        </div>
        <div class="col-3" >
        <div id = "livesearch" > </div>
        <iframe name="name_search" style="border:0;"></iframe>

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

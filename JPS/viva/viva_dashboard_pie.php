
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
include '../function.php';
$tm = 60000;
//include 'user_session.php';
$ti = "64";
$ti_all = "1081632";

if ($_POST['Name-1'] != null && $_POST['Name-1'] != "") {
    $_SESSION['idn'] = $_POST['Name-1'];
}

if ($_POST['Password-1'] != null && $_POST['Password-1'] != "") {
    $_SESSION['pw'] = $_POST['Password-1'];
}

  $permis_val = getPermission($_SESSION['idn'], $_SESSION['pw']);
  $id_val = getId($_SESSION['idn'], $_SESSION['pw']);
$user_name = getIdToUserName($id_val);

// echo  "<h4 style='color:green;''>".$user_name  =getIdToUserName($id_val)."</h4> <br>";
$_SESSION['viva_id'] = $id_val;
$_SESSION['user_name'] = $user_name;
//include "login_check.php";
//login_check($id_val);
if ($_SESSION['cd'] != null && $_SESSION['cd'] != "" && $_SESSION['seccode'] != null && $_SESSION['seccode'] != "" && $_SESSION['cd'] == $_SESSION['seccode']) {
    echo "You are trying more entry";
} else {

    if ($permis_val == null || $permis_val == "" || ($ti != $permis_val && $ti_all != $permis_val)) {

        header("Location: https://harekrishnasamacar.com/JPS/viva"); /* Redirect browser */
        exit();

    } else {
        $md5val = md5($permis_val);
        $_SESSION['seccode'] = $md5val;
        $GLOBALS['seccode'] = $md5val;

        //echo "First Entry";
        $_SESSION['strg'] = $_POST['strg'];

        $_SESSION['id'] = $_POST['id'];
        $_SESSION['id_val'] = $id_val;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- CSS only -->
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 18px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: #FFEBCD; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: #FFEBCD; 
  color: black; 
 }

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
</style>
</head>
</body>  
<body>
<?php

session_start();
 $servername = "localhost";
$username = "sanpro_hksamacar";
$password = "01915876543";
$dbname = "sanpro_diksa";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT division,templereg,status_viva, COALESCE(division,'Candidate') division ,COALESCE(templereg,'Temple') temple ,COALESCE(status_viva,'Status') status,count(status_viva)  FROM reg group by division, templereg,status_viva with rollup";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    $div=1;
    $tem=1;
    $count_status_viva_blank=0;
    $count_status_viva_submitted=0;
    $temple_count_status_viva_submitted=0;
    $n=1;
    $GLOBALS["blank"]=0;
    $GLOBALS["submitted"]=0;
    $GLOBALS["approved"]=0;
   
//echo "<table border='2'> <tr> <th > div</th> <th >tmp </th><th >status </th><th >count </th></tr>";
           


    while($row = $result->fetch_assoc()) {

          $id="pie".$n;
         


     // echo "<tr> <td> ". $row["division"]. "</td> <td>" .$row["temple"]. "</td> <td>".$row["status"]. "</td> <td>" .$row["count(status_viva)"] . "</tr>";




      
        if($div!=$row["division"])

      {
            echo  "&nbsp<h1 style ='color:#006400; background-color: #FFFACD;'> ".$row["division"]."</h1><br> ";

        }

        if($tem!=$row["templereg"])

        {
          //  echo    "&nbsp &nbsp&nbsp&nbsp <h3 style ='color: blue;'> ".tename($row["templereg"])."</h3 ><br> ";
  

         echo  "<hr> <form action='devotee_information.php' target='_blank' method='POST'>
            <button class= 'button button2' name='temple_id' type='submit' value=" . $row["templereg"] . " > ".temple_address($row["templereg"])."</button>
        </form>";
        $GLOBALS["blank"]=0;
        $GLOBALS["submitted"]=0;
        $GLOBALS["approved"]=0;
          }
          echo    "&nbsp &nbsp&nbsp&nbsp   ";
          // if(($row["status"]!="Temple")&&($row["division"]!="Candidate")&&($row["status"]!="Status"))





          if($row["status"]=='')
          {
echo 'Blank='.$row["count(status_viva)"].",";
$GLOBALS["blank"]=$row["count(status_viva)"];
          }

          

          if($row["status"]=='submitted')
          {
echo 'Submitted='.$row["count(status_viva)"].",";
$GLOBALS["submitted"]=$row["count(status_viva)"];


          }
           

          if($row["status"]=='approved')
          {
echo 'Approved='.$row["count(status_viva)"].",";
$GLOBALS["approved"]=$row["count(status_viva)"];

          }

         
           // echo $row["status"].$row["count(status_viva)"];
           
        
          

          if(($row["division"]!="Candidate")&&($row["temple"]!="Temple")&&($row["division"]!="Candidate")&&($row["status"]=="Status")){
 



           
            echo "
            <div id='$id'style='width:100%; max-width:300px; height:150px;'></div>
            
             
            <script type='text/javascript'>
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(draw);
            
            // Draw the chart and set the chart values
            function draw() {
              var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Blank',".$GLOBALS["blank"]."],
              ['Submitted',".$GLOBALS["submitted"]."],
              ['Approved',".$GLOBALS["approved"]."],

 

            ]);
            
              // Optional; add a title and set the width and height of the chart
              var options = {  is3D:true,  
            
                colors: ['#FF0000', '#FFFF00', '#00FF00']
            };
            
              // Display the chart inside the <div> element with id=piechart
              var chart = new google.visualization.PieChart(document.getElementById('$id'));
              chart.draw(data, options);
            }
            </script>
            ";
            
            
          
         
             echo "Total=".$row["count(status_viva)"];
            
            }

          

if(($row["temple"]=="Temple")&&($row["division"]!="Candidate")){
 
     echo "<h2 style=' '>".$row["division"]." Division=".$row["count(status_viva)"]."</h2>";
    
    }


    if($row["division"]=="Candidate"){
 
         echo "<h1 style='color:green'>ALL=".$row["count(status_viva)"]."</h1>";
        
        }

if($row["status_viva"]=="submitted"){
     
    $count_status_viva_submitted=$row["count(status_viva)"];
    
    
    }

    if($row["status_viva"]=="")
    {
        
         $temple_count_status_viva_submitted=$row["count(status_viva)"];
        
        
        }

        $div=$row["division"];
        $tem=$row["templereg"];
           "<br> &nbsp &nbsp &nbsp &nbsp &nbsp  ". $row["status_viva"]. "- " . $row["count(status_viva)"] . "<br>";
        if($row["status_viva"]=="")
    {

          "<br> &nbsp &nbsp &nbsp &nbsp &nbsp blank ".$count_status_viva_blank. "Submitted- " .$count_status_viva_submitted." total-".$temple_count_status_viva_submitted."<br>";


    }
    $n++;   
    }


   // echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

 ?>

</body>
</html>
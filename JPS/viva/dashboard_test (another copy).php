
<!DOCTYPE html>
<html>
<body>

<?php

session_start();
include '../function.php';
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

$sql = "SELECT division,templereg,status_viva, COALESCE(division,'division_total') division ,COALESCE(templereg,'temple_total') temple ,COALESCE(status_viva,'status_total') status,count(status_viva)  FROM reg group by division, templereg,status_viva with rollup";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    $div=1;
    $tem=1;
    $count_status_viva_blank=0;
    $count_status_viva_submitted=0;
    $temple_count_status_viva_submitted=0;
echo "<table border='2'> <tr> <th > div</th> <th >tmp </th><th >status </th><th >count </th></tr>";

    while($row = $result->fetch_assoc()) {


       echo "<tr> <td> ". $row["division"]. "</td> <td>" .$row["temple"]. "</td> <td>".$row["status"]. "</td> <td>" .$row["count(status_viva)"] . "<tr>";


        if($div!=$row["division"])

      {
            echo "<h1> ".$row["division"]."</h1><br> ";

        }

        if($tem!=$row["templereg"])

        {
              echo "&nbsp <h3> ".tename($row["templereg"])."</h3 ><br> ";
  
          }

if($row["status_viva"]=""){

$count_status_viva_blank=$row["count(status_viva)"];


}


if($row["status_viva"]="submitted"){

    $count_status_viva_submitted=$row["count(status_viva)"];
    
    
    }

    if($row["status_viva"]="")
    {

        $temple_count_status_viva_submitted=$row["count(status_viva)"];
        
        
        }

        $div=$row["division"];
        $tem=$row["templereg"];
        // echo "<br> &nbsp &nbsp &nbsp &nbsp &nbsp  ". $row["status_viva"]. "- " . $row["count(status_viva)"] . "<br>";
        if($row["status_viva"]="")
    {

        echo "<br> &nbsp &nbsp &nbsp &nbsp &nbsp blank ".$count_status_viva_blank. "Submitted- " .$count_status_viva_submitted." total-".$temple_count_status_viva_submitted."<br>";


    }
       
    }


    echo "<table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
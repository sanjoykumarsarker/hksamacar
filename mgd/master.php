<?php   

$finalname_current=array();
$finalname_db=array();
$finalname_all=array();
 

function array_not_unique( $a = array() )
{
  return array_diff_key( $a , array_unique( $a ) );
}


print_r(array_not_unique($array));


// for running data
	 
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

//$sql = "SELECT   reg,nchoice1,ename ,finalname from reg31012020 ";

$sql = "SELECT   reg,nchoice1,ename ,finalname from reg ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["reg"]. " - Name: " . $row["nchoice1"]. " " . $row["ename"]. "<br>";
if($row["finalname"]!=""){



    array_push($finalname_current,trim(strtoupper($row["finalname"])));
    array_push($finalname_all,trim(strtoupper($row["finalname"])));

   //echo $row["finalname"];
   //echo $row["finalname"];
    

  }
  }
} else {
  echo "0 results";
}
$conn->close();


// for running data

// for database

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_db = "SELECT nnn from ttt ";
$result = $conn->query($sql_db);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["reg"]. " - Name: " . $row["nchoice1"]. " " . $row["ename"]. "<br>";
   if($row["nnn"]!=""){
    array_push($finalname_db,trim(strtoupper($row["nnn"])));
    array_push($finalname_all,trim(strtoupper($row["nnn"])));

   }
  }
} else {
  echo "0 results";
}
$conn->close();

//for database
  //print_r($finalname_current);
// print_r($finalname_db);
 //print_r($finalname_all);
 
if(count(array_not_unique($finalname_all)>0)){
print_r(array_not_unique($finalname_all));

}



{

echo " <br><h1 style='color:green'> Congratulations !!! No Duplicate <h1>";
}

?>


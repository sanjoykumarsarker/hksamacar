<?php


$match = $_POST["match"];
//tregid
$tregid = $_POST["tregid"];
//gender
$gender = $_POST["gender"];
//idate
$idate = $_POST["idate"];


include_once "db/jps_db_connection.php";
//$q="siddhidata mukunda dass";

// Create connection
// connection for duplicate fron database sisyaname

$connd = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connd->connect_error) {
    die("Connection failed: " . $connd->connect_error);
}

$sqld = "SELECT  reg.reg r ,reg.ename e,reg.finalname  f,ttt.nnn from reg join ttt on reg.finalname=ttt.nnn";

$resultd = $connd->query($sqld);
echo "	<table><tr> <th>Reg</th><th>Old Name</th><th>Initiation Name</th></tr>";
while ($row = $resultd->fetch_assoc()) {
    echo '<tr><td>' . $row["r"] . '</td><td>' . $row["e"] . '</td><td>' . $row["f"] . '</td></tr>';
}
echo "	<table>";

$connd->close();



// close for duplicate fron database sisyaname
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



echo $sqln = "SELECT reg,ename,nchoice1,nchoice2,nchoice3,finalname FROM reg where templereg  like '" . $tregid . "%'

  and gender  like '" . $gender . "%'
  
   ";
$resultn = $conn->query($sqln);
$myArrayn = array();
$input_desciples = array();
$input_desciples_one = array();

$database_desciples = array();


$input_desciples_exclude_finalname = array();

$input_desciples_only_finalname = array();

if ($resultn->num_rows > 0) {
    // output data of each row
    while ($row = $resultn->fetch_assoc()) {
        $var =  strtoupper($q);
        $reg = strtoupper($row["reg"]);
        $ename = strtoupper($row["ename"]);

        $name1 = strtoupper($row["nchoice1"]);
        $name2 = strtoupper($row["nchoice2"]);
        $name3 = strtoupper($row["nchoice3"]);
        $name4 = strtoupper($row["finalname"]);

        similar_text($var, $name1, $percent1);
        similar_text($var, $name2, $percent2);
        similar_text($var, $name3, $percent3);

        $npercent1 = round($percent1);
        $npercent2 = round($percent2);
        $npercent3 = round($percent3);
        //input_desciples
        $input_desciples[$name1] = $reg . "/" . $ename;
        $input_desciples[$name2] = $reg . "/" . $ename;
        $input_desciples[$name3] = $reg . "/" . $ename;


        $input_desciples_one[$reg . "/1" . $ename] = $name1;
        $input_desciples_one[$reg . "/2" . $ename] = $name2;
        $input_desciples_one[$reg . "/3" . $ename] = $name3;
        $input_desciples_one[$reg . "/4" . $ename] = $name4;


        $input_desciples_exclude_finalname[$reg . "/1" . $ename] = $name1;
        $input_desciples_exclude_finalname[$reg . "/2" . $ename] = $name2;
        $input_desciples_exclude_finalname[$reg . "/3" . $ename] = $name3;

        if (trim($name4) != "" && trim($name4) != null && trim($name4) != " ") {
            $input_desciples_only_finalname[$reg . "/4" . $ename] = $name4;
        } else {
        }
        if ($npercent1 > 80) {

            $myArrayn[$name1 . "&nbsp (" . $reg . ")"] = $npercent1;
        }

        if ($npercent2 > 80) {

            $myArrayn[$name2 . "&nbsp (" . $reg . ")"] = $npercent2;
        }
        if ($npercent3 > 80) {

            $myArrayn[$name3 . "&nbsp (" . $reg . ")"] = $npercent3;
        }
    }
    arsort($myArrayn);

    foreach ($myArrayn as $x => $x_value) {
        // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";




    }
    // echo "</table>";	 

} else {
    echo "0 results";
}



$sql = "SELECT nnn FROM ttt";
$result = $conn->query($sql);
$myArray = array();

if ($result->num_rows > 0) {
    // echo " <tr><th>From Database</th><th>%</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $var =  trim(preg_replace('/\s+/', ' ', strtoupper($q)));
        $name = trim(preg_replace('/\s+/', ' ', $row["nnn"]));
        similar_text($var, $name, $percent);
        // $stripped = trim(preg_replace('/\s+/', ' ', $sentence));		 
        $npercent = round($percent);
        array_push($database_desciples, $name);
        if ($npercent > 80) {

            $myArray[$name] = $npercent;
        }
    }
    arsort($myArray);

    foreach ($myArray as $x => $x_value) {
        // echo "" . $x . " &nbsp <b style='color:blue'>" . $x_value."%</b> <br>";

        if ($x_value == 100) {

            //	echo "<tr style='color:white; background-color:red; font-weight: 900; ' > <td > " .   $x."</td><td >".$x_value."%  </td></tr>";


        } else {
            //echo "<tr><td style='color:BLACK'> " . $x."</td><td style='color:BLUE'>".$x_value."%  </td></tr>"; 
        }
    }
} else {
    echo "0 results";
}
$conn->close();

//print_r($input_desciples_one);
//print_r($database_desciples);

//$input_desciples_unique=array_unique(array_filter($input_desciples_one));
//$input_desciples_diff=array_diff(array_filter($input_desciples_one),$input_desciples_unique);
//print_r($input_desciples_unique);
//print_r($input_desciples_diff);

//echo count($input_desciples_unique);

//echo "/";
//echo count($input_desciples_one);
//echo "/";
//print_r(array_count_values($input_desciples_one));
echo "<table  border='1' >
<tr>
<th  >Name </th> 
 <th>Compare </th>  
  <th>%</th></tr>

 
 ";

foreach ($input_desciples as $x => $x_value) {


    foreach ($input_desciples as $y => $x1_value) {
        similar_text($y, $x, $percent);
        if ($percent > intval($match) && $percent < 100) {
            //echo $x."---".$y.$percent."<br>";
            echo "<tr style='color:red'>
<td >   " . $x . " </td>
<td  > " . $y . "    </td> 

<td  >" . $x_value . round($percent) . "%   </td>
</tr>";
        }
    }

    foreach ($database_desciples as $y2) {
        similar_text($y2, $x, $percent);
        if ($percent > intval($match)) {
            //echo $x."---".$y2.$percent."<br>";
            echo "<tr style='color:blue'>
            <td >   " . $x . " </td>
            <td  > " . $y2 . "   </td> 
            
            <td  > " . $x_value . round($percent) . "%   </td>
            </tr>";
        }
    }
}

echo "</table>";
echo "<hr>";

$duplicates =
    array_diff_assoc($input_desciples_only_finalname, array_unique($input_desciples_only_finalname));

//print_r($duplicates);

foreach ($duplicates as $x) {
    echo $x;

    echo "<br>";
}
echo "<hr>";


//print_r(array_unique($input_desciples_only_finalname));
echo "<hr>";

// SELECT reg,ename ,count(finalname),finalname from reg group by finalname having count(finalname)>1
//SELECT  reg.ename,reg.finalname ,ttt.nnn from reg join ttt on replace(reg.finalname,' ','') =replace(ttt.nnn,' ','')
//2622-2830---142+24  trim=2615

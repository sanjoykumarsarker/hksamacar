<?php session_start();?>
<!DOCTYPE html>
<html>
<body>

<?php

$first_naksatra_name="Uttara-phalguni";
$nm=array();
$dm=array();


$aaa=array();
$bbb=array();
$ccc=array();
 $rashi=array("tula","brishcik","dhonu","makor","kumbha","meen","sesh","brish","mithun","karkat","singha","kanna");


 $naksatra=array('Uttara-phalguni',
'Hasta',
'Citra',
'Swati',

'Visakha',
'Anuradha',
'Jyestha',
'Mula',
'Purva-asadha',
'Uttara-asadha',
'Sravana',
'Dhanista',
'Satabhisa',

'Purva-bhadra',
'Uttara-bhadra',
'Revati',
'Asvini',
'Bharani',
'Krittika',
'Rohini',
'Mrigasira',
'Ardra',
'Punarvasu',
'Pusyami',
'Aslesa',
'Magha',
'Purva-phalguni');
 
  $key = intval(array_search($first_naksatra_name, $naksatra));
 
  $position=10+9/10+$key/9;
$floor_position=floor($position);
for($i=$position;$i<300;$i=$i+(1/9)){


  $naksatra_val=$i%12;
 




    echo $naksatra_val;
    echo "<br>";
    echo $i;
    echo "---";
    array_push($aaa,$rashi[$naksatra_val]);
    echo $rashi[$naksatra_val];
    echo "<br>";

 

}


  //$date=date_create("2013-03-15");
//echo $f= date_format($date,"Y/m/d H:i:s");

 //echo $timestamp = strtotime("2013-03-15");
 $servername = "localhost";
 $username = "HKSamacar_local";
 $password = "Jpsk/1866";
 $dbname = "HareKrishnaSamacar";
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT date,time,naksatra FROM Sheet1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 /*   echo "<table border='2'>
	<tr>
	<th>day</th>
		<th>month</th>
	<th>year</th>
	<th>time</th>
	<th>naksatra</th>

	
	</tr>";
	*/
    // output data of each row

    $t_old=0;
    
    while($row = $result->fetch_assoc()) {
		
		   $date =  $row["date"];
		   $time=$row["time"];
           $dd= $row["naksatra"];
           
 
            $ymd = DateTime::createFromFormat('d-M-Y H:i:s',$date." ".$time);

              $ymdr =$ymd->format('Y-m-d    H:i:s');
               $ymdtt= $ymd->getTimestamp();
               $ymdtti=$ymdtt;
            // $ymd->format('Y-m-d    H:i:s');
            //echo $t_old;
          echo "<br>";

               $t= $ymdtti-$t_old;
              $dif=(intval($t)/4);

              $ttt=  $ymdtti ;
              $time_1=$t_old;
             // $r= $time_1->format('Y-m-d    H:i:s');
             echo $d1 =date('d/M/Y H:i:s', $time_1);
            
            echo "<br>";
               $time_2=$t_old+$t/4;
             echo $d2 = date('d/M/Y H:i:s', $time_2);
         
            echo "<br>";
              $time_3=$t_old+$t/2;
            echo $d3= date('d/M/Y H:i:s', $time_3);
           
            echo "<br>";
              $time_4=$t_old+3*$t/4;
            echo $d4= date('d/M/Y H:i:s', $time_4);
           
            echo "<br>";
              //echo date('m/d/Y H:i:s', $ttt); 

              array_push($ccc,$dd);
              array_push($ccc,$dd);
              array_push($ccc,$dd);
              array_push($ccc,$dd);

              if($t_old>0 ){
 
                array_push($bbb,$d1);
                array_push($bbb,$d2);
                array_push($bbb,$d3);
                array_push($bbb,$d4);

              }
          $t_old=$ymdtti;

 
    }
    //echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
 


echo "<table border='2'><tr><th>time</th><th>rashi</th><th>naksatra</th></tr>";

 

  for ($i = 0; $i < 2000 ; $i++){
  $key1 = $aaa[$i];
  $key2 = $bbb[$i];
  $key3 = $ccc[$i];
  echo "<tr><td>".$key2."</td><td>".$key1."</td><td>".$key3.$i."</td></tr>";

  //the code

  }

  echo "</table>";

?>

</body>
</html>
<?php

if (!function_exists('make_connection')) {
    function make_connection()
    {
        $connection = new mysqli("localhost", "sanpro_hksamacar", "01915876543", "sanpro_diksa");
        // mysqli_set_charset($connection, "utf8");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        if ($connection)  return $connection;
    }
}

function get_connection()
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    // Create connection
    $connr = new mysqli($servername, $username, $password, $dbname);
    if ($connr->connect_error) {
        die("Connection failed: " . $connr->connect_error);
    }
    return $connr;
}

function message_status_update($to, $from)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqld = "update message set m_status='read' where m_from_si='" . $from . "' and m_to_si='" . $to . "'";
    $resultd = $conn->query($sqld);
}


function getDiffTime($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqld = "SELECT TIMESTAMPDIFF(SECOND,c_time,now()) as td FROM con_status where  id='$a'";

    $resultd = $conn->query($sqld);



    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["td"];
    $conn->close();
}




function setConnectionTime($a, $b)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqld = "SELECT  count(id) FROM con_status where  id='$a'";

    $resultd = $conn->query($sqld);

    // output data of each row
    $row1 = $resultd->fetch_assoc(); {

        if ($row1["count(id)"] > 0) {
            $servername = "localhost";
            $username = "sanpro_hksamacar";
            $password = "01915876543";
            $dbname = "sanpro_diksa";

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sqldc = "update	con_status set c_time=now(),ip='$b' where id='$a'";

            $conn->query($sqldc);
        } else {

            $sqldc4 = "insert into	con_status(id,ip,c_time)values('$a','$b',now())";

            $conn->query($sqldc4);
        }
    }

    $conn->close();
}



function lastLogin($a)
{

    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $sqld = "SELECT trim(c_time) as uuu FROM con_status where id='$a'";

    $resultd = $conn->query($sqld);


    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["uuu"];
    $conn->close();
}



function getIdToUser($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  user_name FROM users where  id='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["user_name"];
    $conn->close();
}



function getIdToUserName($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  u_name FROM users where  id='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["u_name"];
    $conn->close();
}
function getIdOne($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  id FROM users where user_name='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["id"];
    $conn->close();
}

function getId($a, $b)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  id FROM users where user_name='$a' and password='$b'";
    $resultd = $conn->query($sqld);

    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["id"];
    $conn->close();
}




function getPermission($a, $b)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqld = "SELECT permission FROM users where user_name='$a' and password='$b'";

    $resultd = $conn->query($sqld);


    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["permission"];
}

function finalname_b($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  finalname_b FROM reg where reg='$a'";

    $resultd = $conn->query($sqld);

    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["finalname_b"];
}

function finalname($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  finalname FROM reg where reg='$a'";
    $resultd = $conn->query($sqld);
    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["finalname"];
}

function bname($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  bname FROM reg where reg='$a'";

    $resultd = $conn->query($sqld);

    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["bname"];
}


function ename($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqld = "SELECT  ename FROM reg where reg='$a'";
    $resultd = $conn->query($sqld);


    // output data of each row
    $row1 = $resultd->fetch_assoc();

    return $row1["ename"];
}




function tename($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  tname FROM tmpl where tregid='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["tname"];
}

function tbname($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  tname_b FROM tmpl where tregid='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["tname_b"];
}
function temple_address($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  tname,t_addr,t_ps,t_dist,t_div FROM tmpl where tregid='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["tname"] . " " . $row1["t_addr"] . " " . $row1["t_ps"] . " " . $row1["t_dist"];
}

function searchtbname($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  tname_b FROM tmpl where tregid LIKE '%$a%'";

    $resultd = $conn->query($sqld);

    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["tname_b"];
}

function address($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  address FROM reg where reg='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["address"];
}
function age($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  age FROM reg where reg='$a'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["age"];
}

function iserial($a, $b)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld     = "update date_set 	set iserial='" . $b . "' where reg='" . $a . "'";
    $sqldn     = "update reg 		set iserial='" . $b . "', idate='" . regtoidate($a) . "', place='" . regtoplace($a) . "' where reg='" . $a . "'";

    $conn->query($sqld);
    $conn->query($sqldn);
}

function idatetoreg($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $r = array();
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  reg FROM reg where result_viva='fit'  and idate='" . $a . "' ORDER BY CONVERT(iserial, UNSIGNED INTEGER)";

    $resultd = $conn->query($sqld);


    if ($resultd->num_rows > 0) {
        //  echo " <select id='change' name='str' class='form-control'    >";
        // output data of each row
        while ($row = $resultd->fetch_assoc()) {



            array_push($r, $row["reg"]);
        }
    }


    return $r;
}
function regtoiserial($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT iserial FROM reg  where result_viva='fit' and reg='$a' ;";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["iserial"];
}

function ispostponed($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  reg FROM reg where reg='$a' and istatus1='Postponed'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    if ($a == $row1["reg"]) {
        return "";
    } else {
        return $a;
    }
}

function isabsent($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  reg FROM reg where reg='$a' and isinitiated='Absent'";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    if ($a == $row1["reg"]) {
        return "";
    } else {
        return $a;
    }
}

function dup_count($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT  count(reg) as ddd FROM date_set where reg='" . $a . "' ";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["ddd"];
}

function max_of_nkarana_back($d)
{

    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $a = array();
    $c = array();
    for ($i = 0; $i < $d; $i++) {

        $date = strtotime("-" . $i . " day", time());
        $dt1 = date("Y-m-d", $date);

        array_push($a, "" . $dt1 . "");
    }

    //print_r($a);
    // Create connection
    echo "<div id='pgr'>";
    foreach ($a as $at) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT  count(namakarana_time) as nrt

 FROM reg
WHERE namakarana_time like'" . $at . "%' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {

                array_push($c, "" . $row["nrt"] . "");
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }
    echo "</div>";


    return max($c);
}
function max_of_nnirnaya_back($d)
{

    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $a = array();
    $c = array();
    for ($i = 0; $i < $d; $i++) {

        $date = strtotime("-" . $i . " day", time());
        $dt1 = date("Y-m-d", $date);

        array_push($a, "" . $dt1 . "");
    }

    //print_r($a);
    // Create connection
    echo "<div id='pgr'>";
    foreach ($a as $at) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT  count(namanirnaya_time) as nrt

 FROM reg
WHERE namanirnaya_time like'" . $at . "%' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {

                array_push($c, "" . $row["nrt"] . "");
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }
    echo "</div>";


    return max($c);
}


function max_of_nreg_back($d)
{

    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $a = array();
    $c = array();
    for ($i = 0; $i < $d; $i++) {

        $date = strtotime("-" . $i . " day", time());
        $dt1 = date("Y-m-d", $date);

        array_push($a, "" . $dt1 . "");
    }

    //print_r($a);
    // Create connection
    echo "<div id='pgr'>";
    foreach ($a as $at) {
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT  count(datetime) as nrt

 FROM reg
WHERE datetime like'" . $at . "%' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {

                array_push($c, "" . $row["nrt"] . "");
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }
    echo "</div>";


    return max($c);
}





function userid_gen()
{

    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqld = "SELECT  max(convert(id,UNSIGNED INTEGER)) as eee FROM users";
    $resultd = $conn->query($sqld);


    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["eee"];

    $conn->close();
}





function regtoidate($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  idate   FROM date_set where reg='" . $a . "' ";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["idate"];


    $conn->close();
}

function regtoplace($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sqld = "SELECT  place   FROM date_set where reg='" . $a . "' ";

    $resultd = $conn->query($sqld);
    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["place"];
    $conn->close();
}

function tithi($a)
{
    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqld = "SELECT  tithi   FROM date_set where reg='" . $a . "' ";

    $resultd = $conn->query($sqld);

    // output data of each row
    $row1 = $resultd->fetch_assoc();
    return $row1["tithi"];
    $conn->close();
}



function finalname_search_input($p,$q)
{
  
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
    
    
    
    $sqln = "SELECT reg,nchoice1,nchoice2,nchoice3 FROM reg";
    $resultn = $conn->query($sqln);
    $myArrayn=array();
    
    if ($resultn->num_rows > 0) {
         // output data of each row
        while($row = $resultn->fetch_assoc()) {	
        $var=  strtoupper($q);
        $reg= strtoupper($row["reg"]);
         $name1= strtoupper($row["nchoice1"]);
        $name2= strtoupper($row["nchoice2"]);
        $name3= strtoupper($row["nchoice3"]);
        
        similar_text($var, $name1, $percent1); 
        similar_text($var, $name2, $percent2); 
        similar_text($var, $name3, $percent3); 	
        
        $npercent1=round($percent1);
        $npercent2=round($percent2);
        $npercent3=round($percent3);	
    
    if( $npercent1>=intval($p)) {
         
    $myArrayn[$name1."&nbsp (".$reg.")"] = $npercent1 ;
          
    }
    
    if( $npercent2>=intval($p)) {
         
    $myArrayn[$name2."&nbsp (".$reg.")"] = $npercent2 ;
          
    }
    if( $npercent3>=intval($p)) {
         
    $myArrayn[$name3."&nbsp (".$reg.")"] = $npercent3 ;
          
    }	  	
    }
        arsort($myArrayn);
        
     return $myArrayn;
    // echo "</table>";	 
            
    } else {
     // echo "0 results";
    }
    $conn->close();
  
}




function finalname_search_database($p,$q)
{
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
    
    
     
    
    $sql = "SELECT nnn FROM ttt";
    $result = $conn->query($sql);
    $myArray=array();
    
    if ($result->num_rows > 0) {
         // output data of each row
        while($row = $result->fetch_assoc()) {	
        $var=  trim(preg_replace('/\s+/', ' ', strtoupper($q)));
         $name= trim(preg_replace('/\s+/', ' ', $row["nnn"]));
        similar_text($var, $name, $percent); 
       // $stripped = trim(preg_replace('/\s+/', ' ', $sentence));		 
        $npercent=round($percent);	
    
    if( $npercent>=intval($p)) {
         
    $myArray[$name] = $npercent ;
          
    }	  	
    }
        arsort($myArray);
        
        return $myArray;

             
    } else {
     // echo "0 results";
    }
    $conn->close();
     
}


function get_namakarana_message(){


    $servername = "localhost";
    $username = "sanpro_hksamacar";
    $password = "01915876543";
    $dbname = "sanpro_diksa";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    $sqld = "SELECT serial,message_body FROM message_universal WHERE   serial=(select max(cast(serial as unsigned)) from message_universal)";

    $resultd = $conn->query($sqld);




    // output data of each row
    $row1 = $resultd->fetch_assoc();




    return $row1["message_body"];
    $conn->close();





}
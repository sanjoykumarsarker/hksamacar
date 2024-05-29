
  <?php
   
   $search=$_POST['ag_search'];
 
   
 
   
  
 $servername = "nohost";
 $username = "nouser";
 $password = "nopassword-15-03-2020";
 $dbname = "nodata";
 
 // Create connection
 
  
   
 
 // Create connection
 $conn_all = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn_all->connect_error) {
     die("Connection failed: " . $conn_all->connect_error);
 }
 mysqli_set_charset($conn_all,"utf8");
 $sql_all = "SELECT id, idx,transid,Discontinued,AgCatId FROM tblMain  ";
 $result_all = $conn_all->query($sql_all);
 
 if ($result_all->num_rows > 0) {
     // output data of each row
     while($row = $result_all->fetch_assoc()){
            
 $status="";
 if($row["Discontinued"]=="TRUE"){

    $status="DISCONT";
 }

 if($row["Discontinued"]=="FALSE"){

    $status="CONT";
 }


 $id=$row["id"];


 $ci=$row["AgCatId"];

 if($ci==	0	){$ac=	1	;}
 if($ci==	1	){$ac=	20	;}
 if($ci==	2	){$ac=	25	;}
 if($ci==	3	){$ac=	30	;}
 if($ci==	4	){$ac=	35	;}
 if($ci==	5	){$ac=	40	;}
 if($ci==	6	){$ac=	45	;}
 if($ci==	7	){$ac=	50	;}
 if($ci==	8	){$ac=	60	;}
 if($ci==	9	){$ac=	65	;}
 if($ci==	10	){$ac=	70	;}
 if($ci==	11	){$ac=	75	;}
 if($ci==	12	){$ac=	80	;}
 if($ci==	13	){$ac=	100	;}
 if($ci==	14	){$ac=	110	;}
 if($ci==	15	){$ac=	120	;}
 if($ci==	16	){$ac=	130	;}
 if($ci==	17	){$ac=	140	;}
 if($ci==	18	){$ac=	150	;}
 if($ci==	19	){$ac=	160	;}
 if($ci==	20	){$ac=	170	;}
 if($ci==	21	){$ac=	180	;}
 if($ci==	22	){$ac=	200	;}
 if($ci==	23	){$ac=	250	;}
 if($ci==	24	){$ac=	300	;}
 if($ci==	25	){$ac=	350	;}
 if($ci==	26	){$ac=	400	;}
 if($ci==	27	){$ac=	450	;}
 if($ci==	28	){$ac=	500	;}
 if($ci==	29	){$ac=	550	;}
 if($ci==	30	){$ac=	600	;}
 if($ci==	31	){$ac=	650	;}
 if($ci==	32	){$ac=	700	;}
 if($ci==	33	){$ac=	750	;}
 if($ci==	34	){$ac=	800	;}
 if($ci==	35	){$ac=	850	;}
 if($ci==	36	){$ac=	900	;}
 if($ci==	37	){$ac=	950	;}
 if($ci==	38	){$ac=	1000	;}
 if($ci==	39	){$ac=	1100	;}
 if($ci==	40	){$ac=	1200	;}
 if($ci==	41	){$ac=	1300	;}
 if($ci==	42	){$ac=	1400	;}
 if($ci==	43	){$ac=	1500	;}
 if($ci==	44	){$ac=	1600	;}
 if($ci==	45	){$ac=	1700	;}
 if($ci==	46	){$ac=	1800	;}
 if($ci==	47	){$ac=	1900	;}
 if($ci==	48	){$ac=	2000	;}
 if($ci==	49	){$ac=	12	;}
 if($ci==	50	){$ac=	13	;}
 if($ci==	51	){$ac=	14	;}
 if($ci==	52	){$ac=	15	;}
 if($ci==	53	){$ac=	16	;}
 if($ci==	54	){$ac=	17	;}
 if($ci==	55	){$ac=	18	;}
 if($ci==	56	){$ac=	19	;}
 if($ci==	57	){$ac=	1050	;}
 if($ci==	58	){$ac=	1100	;}
 if($ci==	59	){$ac=	1150	;}
 if($ci==	60	){$ac=	1200	;}
 if($ci==	61	){$ac=	1225	;}
 if($ci==	62	){$ac=	1250	;}
 if($ci==	63	){$ac=	1300	;}
 if($ci==	64	){$ac=	1500	;}
 if($ci==	65	){$ac=	1000	;}
 if($ci==	66	){$ac=	1100	;}
 if($ci==	67	){$ac=	1200	;}
 if($ci==	68	){$ac=	1300	;}
 if($ci==	69	){$ac=	1400	;}
 if($ci==	70	){$ac=	1500	;}
 if($ci==	71	){$ac=	1600	;}
 if($ci==	72	){$ac=	1700	;}
 if($ci==	73	){$ac=	1800	;}
 if($ci==	74	){$ac=	10450	;}
 if($ci==	75	){$ac=	11000	;}
 


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn->setAttribute( PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true );
    $conn->query('SET NAMES "utf8"'); 
    // prepare sql and bind parameters
   /*
   $stmt = $conn->prepare("INSERT INTO tblMem (ID,ID_EN,Name,vill,po,ps,dist,cont,phone,mob,email,comment,paymode,ag_quantity)
    VALUES (:ID,:ID_EN,:Name,:vill,:po,:ps,:dist,:cont,:phone,:mob,:email,:comment,:paymode,:ag_quantity)");
*/

$stmt = $conn->prepare("update tblMem set  status =:status,ag_quantity=:ag_quantity where ID_EN=:ID_EN");




    

    $stmt->bindParam(':ID_EN', $id);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':ag_quantity', $ac);
    

 
    $stmt->execute();   echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
  
 




     }
     
 } else {
     echo "0 results";
 }
 $conn_all->close();
 
                     ?>
 
 
 
 
 
 
 
 
 
 

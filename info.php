       
           Last Modified:
          <?php  
          date_default_timezone_set("Asia/Dhaka");
 
              $getLastModDir = date ("F d Y H:i:s.",filemtime("/var/www/html/."));
          $files1 = scandir("/var/www/html/");

          $a=array();
          $b=array();

for($f=0;$f<sizeof($files1);$f++){

    date ("F d Y H:i:s.",filemtime($files1[$f]))."-".$files1[$f];
 array_push($a,filemtime($files1[$f]));
 array_push($b,$files1[$f]);

 

}
array_multisort($a, $b);
  //echo max($a);

    $lenth=sizeof($a);
 
echo "<table border='2'>
<tr><th>SI</th><th>File Name</th><th>Modified Time</th><th>Details</th></tr>";

$g=$lenth-1;
$t=1;
  while ($g>0){
  $stat="/var/www/html/".$b[$g];

echo "<tr><td>".$t."</td><td>".$b[$g]."</td> <td>".date ("F d Y H:i:s",$a[$g])."</td><td>".$stat[4]." </td> </tr>";
 $g--;
 $t++;
}

   echo "<table>";
           ?> 
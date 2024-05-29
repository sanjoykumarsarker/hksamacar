<?php
 
  


$mysqlDatabaseName ='sanpro_diksa';
$mysqlUserName ='sanpro_hksamacar';
$mysqlPassword ='01915876543';
$mysqlExportPath ='chooseFilenameForBackup.sql';
$output=array();
//DO NOT EDIT BELOW THIS LINE
$mysqlHostName ='204.9.187.6';
//Export the database and output the status to the page
$command='mysqldump -u' .$mysqlUserName .' -S $mysqlHostName -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ' .$mysqlExportPath;
exec($command,$output,$worked);
switch($worked){
    case 0:
        echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
        break;
    case 1:
        echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>' .getcwd() .'/' .$mysqlExportPath .'</b>';
        break;
    case 2:
        echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
        break;
}print_r($output);
?>
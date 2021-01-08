<?php
//include 'config.php';
//include 'opendb.php';
ini_set('display_errors',1);
$dbhost="169.255.57.93";
$dbuser="abeystep_testuser";
$dbpass="2021@Pass!@#$";
$dbname="abeystep_testdb";



$mysqli = new mysqli("localhost","root","@ajagbe@","globalink211016");


// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$tableName  = 'admin';
$backupFile = 'backup/'.date("Ymdhis").'.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
//$result = mysql_query($query);
$result=mysqli_query($mysqli,$query);


//$backupFile = $dbname . date("Y-m-d-H-i-s") . '.gz';
//$command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass $dbname | gzip > $backupFile";
$command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass $dbname  > $backupFile";
system($command);


?>



<?php

mysql_connect("localhost","root","@ajagbe@") or die("Error");
mysql_select_db("globalink211016") or die("Cannot connect to server");

$sql=mysql_query("REPAIR TABLE  `bf_paid`,`job_order`,`transaction`,`receipts`,`admin`,`enquiries`,`products`,`sms`");
if($sql){
echo "Tables repaired";
}
else{
echo mysql_error();
}
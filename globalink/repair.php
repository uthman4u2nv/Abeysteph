<?php

mysql_connect("localhost","root","@ajagbe@") or die("Error");
mysql_select_db("globalink211016") or die("Cannot connect to server");

$sql=mysql_query("REPAIR TABLE  `bf_paid`,`job_order`,`transaction`,`admin`,`depts`,`payslip`,`deductions`,`receipts`,`usertype`,`job_order_tmp`,`sms`");
if($sql){
echo "Tables repaired";
}
else{
echo mysql_error();
}
<?php $host="localhost:3306"; // Host name 
$username="root"; // Mysql username 
$password="2301990"; // Mysql password 
$db_name="prepx"; // Database name 
$tbl_name="logindetail"; // Table name$
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
// Get values from form 

$un1 = $_POST['txtun1'];
$pw1 = $_POST['txtpw1'];
// Fetch data from mysql 
$result=mysql_query("SELECT * from $tbl_name where username='$un1'");
$dpw1=mysql_fetch_array($result);
?>
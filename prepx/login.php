<?php

$host="localhost:3306"; // Host name 
$username="root"; // Mysql username 
$password="23011990"; // Mysql password 
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
// if successfully insert data into database, displays message "Successful". 
if(($dpw1['username'])==$un1){
if(base64_decode($dpw1['password'])==$pw1)		// password verification
{
header("Location: loggedin.htm");
exit;

}
else
{
echo "<H1>Invalid password</H1>";
}

}
else {
echo "<H1>Invalid username</H1>";

}

// close connection 
mysql_close();
?>

<html>
<div style="position: absolute; width: 201px; height: 30px; z-index: 1; left: 68px; top: 180px" id="layer1" class="style1">
	<a href="signup.htm">Back to Login page</a></div>

</html>

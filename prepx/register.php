<html>

<head>
<title>PrepX</title>
<style type="text/css">
.style1 {
	font-size: large;
}
</style>
</head>

<body>
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

$un = $_POST['txtun'];
$pw = $_POST['txtpw'];
$fn = $_POST['txtfn'];
$em = $_POST['txtem'];
$pw=base64_encode($pw);
// Insert data into mysql 
$sql="INSERT INTO $tbl_name VALUES('$un', '$pw','$fn','$em')";
$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful". 
if($result){
echo "<h1>Registration successful</h1>";

echo "<br>You username is $un";
echo "<br>Login with your password using link below";
}
else {
echo "Invalid input .Try with some other username";
}

// close connection 
mysql_close();

?>

<div style="position: absolute; width: 201px; height: 30px; z-index: 1; left: 68px; top: 180px" id="layer1" class="style1">
	<a href="signup.htm">Back to Login page</a></div>

</body></html>

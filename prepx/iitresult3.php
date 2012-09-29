<style type="text/css">
body {
	background-color: #CCC;
}
.style1 {
	font-family: "Bauhaus 93";
	font-size: xx-large;
	color: #800000;
}
.style2 {
	font-family: Algerian;
	font-size: xx-large;
	color: #800080;
}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-large;
}
.style4 {
	font-family: "Bookman Old Style";
}
.style5 {
	font-family: "Bookman Old Style";
	font-size: large;
}
.style6 {
	font-size: medium;
}
</style>
<?php 
$count=0;$unatmp=0;$wrong=0;
$a1=$_POST['ans'];
$s = explode(" ",$a1);
$host="localhost:3306"; // Host name 
$username="root"; // Mysql username 
$password="23011990"; // Mysql password 
$db_name="prepx"; // Database name 
$tbl_name="iitans3"; // Table name$
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 


for ($i = 0;$i <15;$i++)
{
	$sql="UPDATE  $tbl_name set userans='$s[$i]' where sno=($i + 1)";
	mysql_query($sql);
}

$arr=array();
$a=array();
for($i=0;$i<15;$i++)
{
	$arr[$i]=mysql_query("SELECT answer from $tbl_name where sno=$i+1");
	$a[$i]=mysql_fetch_array($arr[$i]);
	

	
}	


for($i=0;$i<15;$i++)
{


	if($s[$i]==($a[$i]['answer']))
	{
		$count=$count+1;
	}
	else if($s[$i]=="undefined")
		$unatmp=$unatmp+1;
	else
		$wrong=$wrong+1;	
}

// close connection 
mysql_close();
?>
<p class="style1" style="width: 211px">PrepX</p>
<p style="width: 211px" class="style6"><strong><a href="default.htm">home</a></strong></p>
<div style="position: absolute; width: 138px; height: 41px; z-index: 3; left: 835px; top: 13px" id="layer3" class="style5">
	<strong><a href="signup.htm">Logout</a></strong></div>
<div style="position: absolute; width: 441px; height: 56px; z-index: 1; left: 335px; top: 131px" id="layer1" class="style2">
	scorecard</div>
<div style="position: absolute; width: 538px; height: 243px; z-index: 2; left: 276px; top: 216px" id="layer2" class="style3">
	No of attempted questions : <?php echo 15-$unatmp?> <br>
	<br>
	Correct answers : <?php echo $count?><br>
	<br>
	Incorrect answers : <?php echo $wrong?><br>
	<br>
	<strong><span class="style4">Total marks : 45<br>
	<br>
	Marks obtained : <?php echo $count*3-$wrong*1?>
	</span></strong></div>

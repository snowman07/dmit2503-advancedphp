 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Basic Relational Database</title>
 
<style type="text/css">
.person{
	border: 1px solid #ccc;
	padding: 0px 15px 0px 15px;
	margin-top: 5px;
}
#main{
	float:left;
	padding:10px;
	width: 75%;

}
#sidebar{
	float:left;
	width: 25%;
	padding:10px;
}
</style>
</head>
 
<body>
<div id="main">
<?php
include("mysql_connect.php");



$result = mysqli_query($con, "SELECT * FROM mt_person") or die (mysql_error());

while($row = mysqli_fetch_array($result)){
// Grab info from people table
	$name =  $row['name'];
	$occupation =  $row['occupation'];
	$birthcity =  $row['birthcity'];
	$person_id =  $row['person_id'];

	
	echo "\n<div class=\"person\">";
	echo "<p>$name is a $occupation<br>";

	
	echo "\n</div>";
}// end loop

?>
</div>
</div id="sidebar">
<h2>Sidebar</h2>



</div>



</body>
</html>

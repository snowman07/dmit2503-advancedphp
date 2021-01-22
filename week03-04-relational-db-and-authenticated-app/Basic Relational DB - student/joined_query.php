 
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

$filter = $_GET['filter']; // GET filter from querystring
//echo "<h1>$filter</h1>";

switch($filter){
	case("smallcity");
		$queryfilter = "WHERE mt_city.population < 100000";
		$msg = "Cities less than 100,000";
		break;
	case("largecity");
		$queryfilter = "WHERE mt_city.population >= 100000";
		$msg = "Cities more than 100,000";
		break;
	case("europe");
		$queryfilter = "WHERE mt_city.country = 'U.K.' OR mt_city.country = 'Italy'";
		$msg = "Cities in Europe (or U.K.)";
		break;
	case("northamerica");
		$queryfilter = "WHERE mt_city.country = 'Canada' OR mt_city.country = 'U.S.'";
		$msg = "Cities in North America";
		break;
}

echo "<h1>$msg</h1>";

$result = mysqli_query($con, "SELECT * FROM mt_person JOIN mt_city ON mt_person.birthcity = mt_city.city_id $queryfilter") or die (mysqli_error($con));

while($row = mysqli_fetch_array($result)){
// Grab info from people table
	$name =  $row['name'];
	$occupation =  $row['occupation'];
	$birthcity =  $row['birthcity'];
	$person_id =  $row['person_id'];

	
	echo "\n<div class=\"person\">";
	echo "<p>$name is a $occupation<br>";

	// because of the JOIN above, we should have access to the data in the 2nd (joined) table
	$cityname = $row['cityname'];

	$population = number_format($row['population'], 0, ",",",");

	$country = $row['country'];

	echo "<p>$name is from $cityname (pop: $population), $country</p><br>";

	// if that works, we should be able to get all data from the JOINED table? On your own.. do that
	
	echo "\n</div>";
}// end loop

?>
</div>
</div id="sidebar">
<h2>Sidebar</h2>
<!-- Lets put some filters in our db app -->
	<a href="<?php echo $_SERVER['PHP_SELF'] ?>">ALL</a><br>
	<a href="<?php echo $_SERVER['PHP_SELF'] ?>?filter=smallcity">Small City</a><br>
	<a href="<?php echo $_SERVER['PHP_SELF'] ?>?filter=largecity">Large City</a><br>
	<a href="<?php echo $_SERVER['PHP_SELF'] ?>?filter=europe">from Europe (and UK)</a><br>
	<a href="<?php echo $_SERVER['PHP_SELF'] ?>?filter=northamerica">from North America</a>



</div>



</body>
</html>

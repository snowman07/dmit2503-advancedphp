
<?php
// Note that there is NO design in this page (other than embedded tags that will be styled at the master page). No doctype, <head>, <style>, etc.


require("mysql_connect.php");

// DEFAULT QUERY: RETRIEVE EVERYTHING
$result = mysqli_query($con,"SELECT * FROM cd_catalog_class") or die (mysql_error());

// FILTERING YOUR DB: On your own....If $_GET vars are present, please use them to filter your DB results (genre, year, decade, label). You can just redefine the previous query.



while ($row = mysqli_fetch_array($result)) {
	/// This should out put artist names: On your own....create thumbnail views with images, album names, etc.
	$artist = ($row['artist']);
	
	echo "<div class=\"thisCD\">\n";
	
	echo " <span class=\"displayInfo\">". $artist ."</span><br />\n";

	echo "\n</div>\n";
}

?>



<?php

include("dbconnect.php");

include("adminincludes/header.php");

/*
LISTS ALL THE INFO IN THE DB
NOTE THAT THE PASSWORDS ARE ECRYPTED; NOTHING CAN DECRYPT THEM
THEY CAN ONLY BE USED FOR COMPARISON PURPOSES
IF ENCRYPTED NEW PASSWORD IS THE SAME AS ECRYPTED STORED PASSWORD, THEN VERIFY

*/
$query = ("SELECT * FROM logins_ajax");

$result = mysql_query($query) or die (mysql_error());

$num_results = mysql_num_rows($result); // get the number of records in the tables
echo "Number of users found: " .$num_results;

for ($i=0; $i<$num_results; $i++)
{
$row = mysql_fetch_array($result);
echo "<p>$i | Username: ". ($row["usernames"]). " | Password: ".($row["passwords"]);
}
include("adminincludes/footer.php");
?>

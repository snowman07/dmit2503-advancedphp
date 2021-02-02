<?php

include("dbconnect.php");


/*
RUN THIS ONCE ONLY TO SETUP YOUR DB TABLE

RUN IT AGAIN IF YOU WISH TO DROP, THEN REBUILD EMPTY TABLE
*/

//DROP AND REBUILD TABLE 
$sql_drop = "drop table if exists logins_ajax";
mysql_query($sql_drop)or die (mysql_error());


$sql = "CREATE TABLE logins_ajax 
(
usernames varchar(50),
passwords varchar(100),
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
)";
mysql_query($sql)or die (mysql_error());
?>

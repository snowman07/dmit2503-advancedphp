<?php

include("admin/dbconnect.php");

$username = $_REQUEST['username']; // $_REQUEST
$password = $_REQUEST['password']; 
/*
LISTS ALL THE INFO IN THE DB
NOTE THAT THE PASSWORDS ARE ENCRYPTED; NOTHING CAN DECRYPT THEM
THEY CAN ONLY BE USED FOR COMPARISON PURPOSES
IF ENCRYPTED NEW PASSWORD IS THE SAME AS ENCRYPTED STORED PASSWORD, THEN AUTHENTICATE USER

*/
if ((isset($username)) && (isset($password))){

	$query = ("SELECT * FROM logins_ajax WHERE usernames LIKE '%$username%'");
	
	$result = mysqli_query($con, $query) or die (mysqli_error($con));
	$num_results = mysqli_num_rows($result);
	if ($num_results == 0){
		invalidLogin(); // didn't find that username in our DB, so go to custom function
		//echo "not found";
		exit();
	}
	while ($r = mysqli_fetch_array($result)) { // Begin while 
		$id = $r["id"]; 
		$pw_db = $r["passwords"]; 

		//if (md5($password) == $pw_db){

		if (password_verify($password, $pw_db)){ // 2020 update

			validLogin($username);
			exit();
		}else{
			invalidLogin();
			exit();
		}
		//echo "<p>$id | $password</p>";
	}
} // end if isset

// IMPORTANT: This page only writes what is necessary for AJAX. No HTML markup (body, head, etc) other than what is necessary.
function validLogin($username) {
//here we do whatever we need to the verified user; start a session, redirect them, etc.
	echo "Welcome $username";
}
function invalidLogin() {
	echo "Incorrect login.";
	
}

?>

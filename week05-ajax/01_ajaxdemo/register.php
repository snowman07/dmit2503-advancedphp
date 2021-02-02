<?php
include("includes/header.php");
/*
THIS PAGE ALLOWS A USER TO REGISTER A USERNAME/PASSWORD
*/
include("admin/dbconnect.php");

$username = $_POST['username'];
$password = $_POST['password'];

//$password = md5($password);
$password = password_hash($password, PASSWORD_DEFAULT); // 2020 update


if ((isset($username)) && (isset($password))){
$sql = "INSERT INTO logins_ajax(usernames, passwords) VALUES (
	\"$username\",
	\"$password\"
	)";
	$result = mysqli_query($con, $sql) or die (mysql_error());
	echo "<p>You have successfully registered</p>";
	include("includes/footer.php");
	exit(); // don't show form anymore
}



?>

<h2> Please Register</h2>
<form action="#" name="myform" method="post">
Login: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="submit"><br>
</form>

<?php
include("includes/footer.php")
?>
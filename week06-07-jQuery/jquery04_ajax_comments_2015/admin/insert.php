<?php
// INSERT.PHP

///////////////////////////////
require_once ('../login/includes/config.inc.php'); 
$page_title = 'YOUR PAGE TITLE GOES HERE';

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
	$page_title = 'User Registration';
}

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['first_name'])) {
	
	$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
}else{
	/*
	echo "<pre>";
	print_r ($_SESSION);
	echo "</pre>";
	*/
	///////////////////////////////// get user ID
	$user_id = $_SESSION['user_id'];
	echo "<h1>$user_id</h1>";

}
//////////////////////////////////
/**/


include("adminheader.php");
echo "<h2>New Blog Entry</h2>";

$blogTitle = trim($_POST['title']);
$blogEntry = trim($_POST['entry']);
// echo $blogTitle . " | ". $blogEntry;



if(isset($_POST['submit']) && ($blogTitle != "") && ($blogEntry != "")){
	
	
	$result = mysqli_query($con,"INSERT INTO community_blog (title, message,timedate, author_id) VALUES ('$blogTitle ', '$blogEntry',NOW(), '$user_id')");
		if (!$result) {    
			die('Invalid query: ' . mysql_error());
		}else{
	  		echo "<h2>Blog Entry Added to DB\n</h2>". $varMessage;
			
	  }
	
	
}


?>

<!-- entry form -->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="myform" id="editform">
	<p><label for="title">Title: </label>
	<input type="text" name="title" id="title" /></p>
	<p><label for="entry">Entry: </label>
	<textarea name="entry" id="entry"></textarea></p>
	<p>
	<input type="submit" name="submit" id="submit" /></p>
	
</form>
<br style="clear:both" />
<?php
include("adminfooter.php");
?>

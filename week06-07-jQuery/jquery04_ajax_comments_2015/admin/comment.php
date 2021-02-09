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
	//echo "<h1>$user_id</h1>";

}
//////////////////////////////////
/**/


include("adminheader.php");
echo "<h2>New Comment</h2>";
$post_id = $_GET['post_id'];
echo $post_id;
$comment = trim($_POST['comment']);

if(isset($_POST['submit']) && ($comment != "") ){
	
	$result = mysqli_query($con,"INSERT INTO community_blog_comments (comment, commentor_id,post_id ) VALUES ('$comment','$user_id','$post_id')");
		if (!$result) {    
			die('Invalid query: ' . mysql_error());
		}else{
	  		echo "<h2>Blog Entry Added to DB\n</h2>". $varMessage;
			
	  }

}


?>

<!-- entry form -->

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" name="myform" id="editform">
	
	<p><label for="comment">Comment: </label>
	<textarea name="comment" id="comment"></textarea></p>
	<p>
	<input type="submit" name="submit" id="submit" /></p>
	
</form>
<br style="clear:both" />
<?php
include("adminfooter.php");
?>

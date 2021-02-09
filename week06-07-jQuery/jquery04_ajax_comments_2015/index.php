<?php

require_once ('login/includes/config.inc.php'); 
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
	//header("Location: $url");
	//exit(); // Quit the script.
	$loggedIn = 0; 
	
}else{
	
	///////////////////////////////// get user ID
	$user_id = $_SESSION['user_id'];
	//echo "<h1>$user_id</h1>";
	$username = $_SESSION['first_name'];
	$displayUser = "<div class=\"username\" align=\"right\">You are logged in as $username</div>";
	$loggedIn = 1; // set a boolean to true; logged in users can see more than anons

}

include("includes/header.php");
echo $displayUser;
// Output the Blog Entries



	$result = mysqli_query($con,"SELECT * FROM community_blog JOIN users ON community_blog.author_id = users.user_id ORDER BY community_blog.blog_id DESC") or die(mysql_error());
	
 while($row = mysqli_fetch_array( $result )) {

	   $thisTitle = $row['title'];
	   $thisMessage = nl2br($row['message']);
	   $thisTimeDate =  $row['timedate'];
	   echo "\n<div class=\"blogentry\">\n";
	   echo "\n<div class=\"blogtitle\">$thisTitle</div>\n";
		echo "\n<div class=\"blogmessage\">\n";
		echo  $thisMessage;
		echo "\n</div> <!-- close this message -->\n";
		echo "\n<div class=\"blogtimedate\">Posted on $thisTimeDate </div>\n";
		$blog_id = $row['blog_id'];
		
		
		////////////////retrieve author info
		$thisAuthor = $row['author_id'];
		
		
			
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		
		echo "\n<div class=\"author\">by $first_name $last_name";
		
		if($loggedIn == 1){
			
		}
		echo "</div>";
		

		
		echo "\n</div> <!-- close this entry -->\n";
	
	
	}
		
include("includes/footer.php");


?>
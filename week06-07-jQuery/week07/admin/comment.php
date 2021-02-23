<?php
// INSERT.PHP

require_once('../login/classes/Login.php'); // must path to the Login class

$login = new Login();
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    $user_name = $_SESSION['user_name'] ;
    $commentor_id = $_SESSION['user_id'];
	

} else {
    // user MUST be logged in
   header("Location:../login/index.php");

}

include("adminheader.php");

$post_id = $_POST['post_id'];

$comment= trim($_POST['comment']);


if(($post_id != "") && ($comment != "")){
	
	$result = mysqli_query($con,"INSERT INTO mubcomments (comment, post_id, commentor_id) VALUES ('$comment ', '$post_id', '$commentor_id')");
		if (!$result) {    
			die('Invalid query: ');
		}else{
	  		echo "<h2>Comment Added to DB\n</h2>". $varMessage;
			
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

<?php
	// let's protect this file with our login script !

	require_once('login/classes/Login.php'); // must path to the Login class
	$login = new Login();
	if ($login->isUserLoggedIn() == true) {

		$user_name = $_SESSION['user_name'] ;
		$user_id = $_SESSION['user_id'];
		$loggedin = 1;

	} else {
	
	}

	// end login script

	include("includes/header.php");

	if($loggedin == 1){
		echo "You are logged in $user_name" . " | <a href=\"login/index.php?logout\">Logout</a>";
	}else{
		echo "You are not logged in" . " | <a href=\"login/index.php\">Login</a>";
	}

	$result = mysqli_query($con,"SELECT * FROM mubdata JOIN users ON mubdata.author_id = users.user_id ORDER BY mubdata.blog_id DESC") or die(mysqli_error($con));
?>

<?php while($row = mysqli_fetch_array($result)): ?>

	<div class="blogentry">
		<div class="blogtitle"><?php echo $row['title'];?></div>
		<div class="blogmessage"><?php echo $row['message'];?></div>
		<div class="blogtimedate"><?php echo $row['timedate'];?></div>
		<div class="author">by <?php echo $row['user_name']  ?></div>

		<?php 

			$thisId = $row['blog_id'];// we'll set this for later use !

			// NESTED QUERY FOR COMMENTS
			$result2 = mysqli_query($con, "SELECT * FROM mubcomments JOIN users ON mubcomments.commentor_id = users.user_id  WHERE post_id = '$thisId' ORDER BY mubcomments.cid") or die(mysqli_error($con));
		?>

		<?php while($row = mysqli_fetch_array($result2)): ?>
			<div>
				<div class="comment"><?php echo $row['comment'];?></div>
				<div class="commentor"><?php echo $row['user_name']  ?></div>
				<br style="clear:both;">
			</div>
		<?php endwhile; ?>

		<!--  If logged in, then user can add a comment. -->
		<?php if ($login->isUserLoggedIn() == true): ?>
			
			<!-- logged in -->
			<a href="" class="commentlink" data-x="commenttext<?php echo $thisId; ?>">Add Comment</a><br>
			<form class="commentform" data-x="<?php echo $thisId; ?>">
				<input type="text" class="commenttext" id="commenttext<?php echo $thisId; ?>">
				<input type="submit" style="display:none">
			</form>


		<?php endif; ?>

	</div>
	<!-- ENDOF blogentry -->
<?php endwhile; ?>

<?php
	include("includes/footer.php");
?>
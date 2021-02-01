<?php

	require_once('login/classes/Login.php');

	$login = new Login();

	include ("includes/header.php");

	include ("includes/_functions.php");//addEmoticons & makeClickableLinks here

?>
<div class="row">
	<div class="col-md-12 clearfix">
		<h1>
			<?php echo APP_NAME; // see includes/mysql_connect for this constant ?>
		</h1><br /><br />
		
		<?php 


			// $userresult = mysqli_query($con, "SELECT DISTINCT author_id, lab2_users.user_name FROM lab2_mugallery JOIN lab2_users ON lab2_users.user_id = lab2_mugallery.author_id ") or die(mysqli_error($con)); //JOIN lab2_users

			// while($row = mysqli_fetch_array($userresult)){

			// 	$username = $row['user_name'];
			// 	//echo "Uploaded By: $username <br/>";
			// 	//echo "<style background-color: green;>";
			// 	echo "<div style=\"background-color: #2793E7; padding:10px;\" class=\"uploadedby\">Uploaded By: $username </div>";
			// 	//echo "</style>";


			// 	$authorid = $row['author_id'];

			// 	$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE author_id = $authorid") or die(mysqli_error($con));	
			// 	// LIMIT 3

			// 	while($row = mysqli_fetch_array($result)){
						
			// 		$filename =  $row['filename'];
			// 		$title =  $row['title'];
			// 		$id =  $row['id'];
					
			// 		echo "\n<div class=\"thumb\">";
			// 		echo "\n\t<a href=\"display.php?id=$id\"><img src=\"images/thumbs-square/$filename\" class=\"img-thumbnail\"></a>";
			// 		echo "<div class=\"thumb-title\">$title</div>";
			// 		echo "\n</div>";		
			// 	}
				
			// 	echo "<br style=\"clear:both\"><br /><br /><br />";
			// 	//echo "<br>";
			// }


			// =========================

			$userresult = mysqli_query($con, "SELECT DISTINCT author_id, lab2_users.user_name FROM lab2_mugallery JOIN lab2_users ON lab2_users.user_id = lab2_mugallery.author_id ") or die(mysqli_error($con)); //JOIN lab2_users

			while($row = mysqli_fetch_array($userresult)){

				$username = $row['user_name'];
				//echo "Uploaded By: $username <br/>";
				//echo "<style background-color: green;>";
				echo "<div style=\"background-color: #2793E7; padding:10px;\" class=\"uploadedby\">Uploaded By: $username </div>";
				//echo "</style>";


				$authorid = $row['author_id'];

				$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE author_id = $authorid") or die(mysqli_error($con));	
				// LIMIT 3

				while($row = mysqli_fetch_array($result)){
						
					$filename =  $row['filename'];
					$title =  $row['title'];
					$id =  $row['id'];
					
					echo "\n<div class=\"thumb\">";
					echo "\n\t<a href=\"display.php?id=$id\"><img src=\"images/thumbs-square/$filename\" class=\"img-thumbnail\"></a>";
					echo "<div class=\"thumb-title\">$title</div>";
					echo "\n</div>";		
				}
				
				echo "<br style=\"clear:both\"><br /><br /><br />";
				//echo "<br>";
			}

			// =========================

		?>
		
		<br style="clear:both">
	</div>
	
</div>

<?php
	include ("includes/footer.php");
?>
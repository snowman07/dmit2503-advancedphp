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
		</h1>
		
		<?php 
			//==========template
			// $result = mysqli_query($con, "SELECT * FROM lab2_mugallery") or die(mysqli_error($con));

			// while($row = mysqli_fetch_array($result)){
					
			// 	$filename =  $row['filename'];
			// 	$title =  $row['title'];
			// 	$id =  $row['id'];
			// 	echo "\n<div class=\"thumb\">";
			// 	echo "\n\t<a href=\"display.php?id=$id\"><img src=\"images/thumbs-square/$filename\" class=\"img-thumbnail\"></a>";
			// 	echo "<div class=\"thumb-title\">$title</div>";
			// 	echo "\n</div>";		
			// }
			//==========template



			$result = mysqli_query($con, "SELECT * FROM lab2_mugallery") or die(mysqli_error($con));	//JOIN lab2_users

			while($row = mysqli_fetch_array($result)){
					
				$filename =  $row['filename'];
				$title =  $row['title'];
				$id =  $row['id'];
				echo "\n<div class=\"thumb\">";
				echo "\n\t<a href=\"display.php?id=$id\"><img src=\"images/thumbs-square/$filename\" class=\"img-thumbnail\"></a>";
				echo "<div class=\"thumb-title\">$title</div>";
				echo "\n</div>";		
			}

		?>


		<br style="clear:both">
	</div>
	
</div>

<?php
	include ("includes/footer.php");
?>
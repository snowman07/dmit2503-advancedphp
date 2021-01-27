<?php

include ("includes/header.php");

?>
<div class="row">
	<div class="col-md-12 clearfix">
		<h1>Gallery</h1>
		
		<?php 


		$result = mysqli_query($con, "SELECT * FROM lab2_mugallery") or die(mysqli_error($con));

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
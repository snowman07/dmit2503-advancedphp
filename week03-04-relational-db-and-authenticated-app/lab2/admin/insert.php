<?php


	require_once('../login/classes/Login.php');

	$login = new Login();



	if($login->isUserLoggedIn() == true) {

		include("../includes/header.php");
		echo "Logged in as " . $_SESSION['user_name'] . " . ID is " . $_SESSION['user_id'];

		//Lets create a new variable which will be the author of this blog post.

		$author_id = $_SESSION['user_id'];


	} else {

		//echo "NOT logged in";
		$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
		header("Location:../login/index.php");
	}





	$pageTitle = "Insert";
	//include("../includes/header.php");
	include("../includes/_functions.php");

	if (isset($_POST['submit'])) {
		$originalsFolder = "../images/originals/"; 
		$thumbsFolder = "../images/thumbs/";
		$thumbsSquareFolder = "../images/thumbs-square/";
		$thumbsSquareSmallFolder = "../images/thumbs-square-small/";
		$displayFolder = "../images/display/";

		$boolValidateOK = 1;


		$title = $_POST['title'];
	  	$description = $_POST['description'];

		if((strlen($title ) < 2) || (strlen($title ) > 50)){
			$boolValidateOK = 0;
			$valTitle = "Please fill in a proper Title from 2 to 50 characters.<br>";
		}

	

		if((strlen($description ) < 10) || (strlen($description ) > 1000)){
			$boolValidateOK = 0;
			$valDescription = "Please fill in a proper description from 10 to 1000 characters.<br>";
		}




		if (($_FILES["myfile"]["type"] == "image/jpeg")||($_FILES["myfile"]["type"] == "image/pjpeg"))
		{
			
		}else{
			$strValidationMessage .= "Not a jpeg file<br />";
			
			$boolValidateOK = 0;
		}


		if(!($_FILES["myfile"]["size"] < 4000000)) {
			$strValidationMessage .= "File is too big<br />";
			$boolValidateOK = 0;
		}
		


		   if ($boolValidateOK == 1){
		      move_uploaded_file($_FILES["myfile"]["tmp_name"], $originalsFolder   . $_FILES["myfile"]["name"]);
		      
			  $thisFile = $originalsFolder . $_FILES["myfile"]["name"];

			

		 	 createSquareImageCopy($thisFile, $thumbsSquareFolder, 175);
		 	 $thumbToShow = createSquareImageCopy($thisFile, $thumbsSquareSmallFolder, 50);
		  	resizeImage($thisFile, $thumbsFolder, 150);
		  	resizeImage($thisFile, $displayFolder, 750);


				
			  
			 
		
			 $filename = $_FILES["myfile"]["name"];
			  
			  
			  mysqli_query($con,"INSERT INTO lab2_mugallery (filename, title, description, author_id) VALUES ('$filename','$title', '$description', '$author_id')") or die(mysqli_error($con));

			  $title = "";
  			$description = "";


			 // $last_id = mysqli_insert_id($con);// this works !

			  $strValidationMessage =  "Your file " . $_FILES["myfile"]["name"] . " has been uploaded.";
			 
		}
	}//end if submit
?>


<h2>Insert</h2>
<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title:</label>
		<input type="text" name="title" class="form-control" value="<?php echo $title ?>">
		<?php
		if($valTitle != ""){
			echo "<div class=\"alert alert-danger\">$valTitle</div>";
		} 
		?>
	</div>
	<div class="form-group">
		<label for="description">Description:</label>
		<textarea name="description" class="form-control"><?php echo $description; ?></textarea>
		<?php
		if($valDescription != ""){
			echo "<div class=\"alert alert-danger\">$valDescription</div>";
		} 
		?>
	</div>
	<div class="form-group">
		<label for="description">Image:</label>
		<input type="file" name="myfile">
	</div>
	<div class="form-group">
		<label for="submit">&nbsp;</label>
		<input type="submit" name="submit" class="btn btn-info" value="Submit">
		<!-- <a class="btn btn-danger pull-right" href="../login/index.php">Logout</a> -->
		<!-- <a href="index.php?logout" class="btn btn-danger pull-right">Logout</a>  -->
	</div>

	<?php 
		if($strValidationMessage){
			if($boolValidateOK == 1){
			echo "<div class=\"alert alert-info\"><p><i class=\"fas fa-check-circle fa-3x fa-pull-left\"></i> $strValidationMessage <img src=\"$thumbToShow\" width=\"50\" height=\"50\" class=\"img-thumbnailX\"> </p></div>";
			}else{
				echo "<div class=\"alert alert-danger\"><p><i class=\"fas fa-exclamation-triangle fa-2x fa-pull-left\"></i> $strValidationMessage </p></div>";	
			}
		}
	?>
</form>

<?php
	include("../includes/footer.php");
?>
<?php

	//include("../includes/header.php");

	require_once('../login/classes/Login.php');

	//include("../includes/_functions.php");

	$login = new Login();

	if($login->isUserLoggedIn() == true) {

		include("../includes/header.php");
		echo "Logged in as " . $_SESSION['user_name'] . " . ID is " . $_SESSION['user_id'];

		//Lets create a new variable which will be the author of this blog post.

		$author_id = $_SESSION['user_id'];

	} else {

		//echo "NOT logged in";
		header("Location:../login/index.php");
	}


	// //******************from mub**********/
	// // retrieve the query string variable that decides which character we are editing. This is MOST important !!!

	// $gallery_ID = $_GET['id'];

	// if(!isset($gallery_ID )){
	// 	//$char_ID = 1;// assign	a default value in case no query string value; this is important for later DB queries

	// 	$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE author_id = '$author_id' LIMIT 1") or die(mysqli_error($con));
	// 	while($row = mysqli_fetch_array($result)){
	// 		$gallery_ID  = $row['id'];
	// 	}
	// }

	// echo $gallery_ID;
	// //****************************/









	// retrieve the query string variable that decides which character we are editing. This is MOST important !!!

	$pageid = $_GET['id'];
	// this is mission critical, so in case $char_id has no value, we need to give it a default value
	if(!isset($pageid)){
		$default = mysqli_query($con, "SELECT id FROM lab2_mugallery LIMIT 1") or die(mysqli_error($con));
		while($row = mysqli_fetch_array($default)){
			$pageid = $row['id']; 
		}
	}



	// //======== Check Owner - Security against URL hacks. (dmit 2503 week 03-04)

	// // This is one good way of checking for URL hacking in a page like edit. 

	// // we could use this in edit: Put after we get the header, $pageid, and the author_id
	// require_once("../includes/_functions.php");
	
	// $tmp = checkOwner($con, $pageid, $author_id);

	// if(!$tmp){

	// 	// what to do with a hacker: In this case, I just redirect them to the root. They will not have access to edit/delete anything.
		
	// 	header("Location:" . BASE_URL . "index.php"); // kick out the hackers

	// 	//echo "<script>document.location ='" . BASE_URL . "'</script>";// poor man's redirect if the true PHP redirect above is not available

	// }





	// UPDATE
	// Step 3:
	if (isset($_POST['submit'])) {
		
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

		//************************* */ SUCCESS:If $boolValidateOK == 1, then validation has passed
		if($boolValidateOK == 1){ // SUCCESS
			
			$title = $_POST['title'];
			$description = $_POST['description'];
			

			mysqli_query($con, "UPDATE lab2_mugallery SET 
				title = '$title',
				description = '$description'
				WHERE id = '$pageid'")or die(mysqli_error($con));

			//**************from mub */
			$valSuccess = "Gallery Updated";
			//**************from mub */
		}
	}//end if submit


	///////**********from mub */
	if(isset($_POST['delete'])){
		//echo "delete";
		mysqli_query($con, "DELETE FROM mublog WHERE bid = '$blog_ID'") or die(mysqli_error($con));
		$valSuccess = "Gallery Deleted";
		header("Location:edit.php");
	}
	///////**********from mub */


	//	CREATE NAV LINKS
	//*********************** */ Step 1: Create a list of links so that the user can select which entry they wish to edit.
	$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE author_id = '$author_id' " ) or die(mysqli_error($con));

	while($row = mysqli_fetch_array($result)){
			
			$filename =  $row['filename'];
			$title =  $row['title'];
			$id =  $row['id'];
			$navLinks .=  "\n<div class=\"thumb-small\">";
			$navLinks .= "\n\t<a href=\"edit.php?id=$id\"><img src=\"../images/thumbs-square-small/$filename\" class=\"img-thumbnail\"></a>";
			//$navLinks .= "\n\t<div class=\"thumb-titlex\">$title</div>";
			$navLinks .= "\n</div>";		
	}





// STEP 2: RETRIEVE DATA FOR SELECTED ITEM AND PREPOPULATE THE FORM BELOW

	

	

	$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE id = '$pageid'") or die(mysqli_error($con));

	while($row = mysqli_fetch_array($result)){
		$filename = $row['filename'];
		$title =  $row['title'];
		
		$description =  $row['description'];
		
		//echo "$fname, $lname";
	}

// \ Step 2

?>

<div class="row">
	<div class="col-sm-6">
		<h2>Edit - <?php echo $title  ?></h2>

		<!-- <h2>Edit - 
			<?php 
				if ($navLinks != "") {
					  
				} else {
					echo $title;
				}
			?>
		</h2> -->

		<?php
		
			if($valSuccess != ""){
				echo "<div class=\"alert alert-success\">$valSuccess</div>";
			} 
		?>
	

		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">

			<div class="form-group">
				<!-- <label for="title"><b></b></label> -->
				<?php 
					$thisImage = "../images/thumbs-square/" . $filename;
					echo "<br><img src=\"$thisImage\" class=\"img-thumbnail\">";
				?>

				<!-- <?php 
					$author_id = $row['author_id'];
					$filename = $row['filename'];
					$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE author_id = '$author_id' AND filename = '$filename'" ) or die(mysqli_error($con));

					while($row = mysqli_fetch_array($result)) {
						$thisImage = "../images/thumbs-square/" . $filename;
						echo "<br><img src=\"$thisImage\" class=\"img-thumbnail\">";
					}
				?> -->


			</div>

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
			<!-- <div class="form-group">
				<label for="description">Image:</label>
				<input type="file" name="myfile">
			</div> -->
			<div class="form-group">
				<label for="submit">&nbsp;</label>
				<input type="submit" name="submit" class="btn btn-info" value="Submit">
				<a href="delete.php?id=<?php echo $pageid; ?>" class="btn btn-danger pull-center" onclick="return confirm('Are you sure?')">Delete</a>
				<a class="btn btn-danger pull-right" href="../login/index.php">Logout</a>

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
	
	</div><!-- \ left col -->

 	<div class="col-sm-6">
 		<h3>Select an Image to Edit</h3>
 		
		<?php 
 			echo $navLinks ;
 		?>

 	</div><!-- \ right col -->
 
</div>



<?php
	include("../includes/footer.php");
?>
<?php

// integrate the auth (Login) script



require_once('../login/classes/Login.php');

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

//exit(); // CAREFUL. DONT FORGET YOU PUT THIS IN





if(isset($_POST['submit'])){
	// trim(): removes spaces before or after a string

	$title = strip_tags(trim($_POST['title']));
	$entry = strip_tags(trim($_POST['entry']));

	//echo "$fname, $lname, $description";

	// assume the form is filled out correctly, and set a boolean
	$boolValidateOK = 1;
	$strValidationMessage = "";

	// VALIDATION RULES

	// Name

	if((strlen($title ) < 2) || (strlen($title ) > 50)){
		$boolValidateOK = 0;
		$valTitle = "Please fill in a proper Title from 2 to 50 characters.<br>";
	}

	

	if((strlen($entry ) < 10) || (strlen($entry ) > 1000)){
		$boolValidateOK = 0;
		$valEntry = "Please fill in a proper Entry from 10 to 1000 characters.<br>";
	}

	


	// check for validation boolean. If its still 1, then user has passed.
	if($boolValidateOK == 1){ // SUCCESS !!!

		mysqli_query($con, "INSERT INTO mublog (title, message, author_id) VALUES ('$title','$entry','$author_id')") or die(mysqli_error($con));


		$valSuccess= "Entry Added";
		
		$title = "";
		$entry = "";

		
	}// \ $boolValidateOK == 1
}// \ if submit


?>
<div class="row">
	<div class="col-md-6">
<h2>Insert</h2>


	<div class="panel panel-default">
		  <div class="panel-heading">New Blog Entry</div>
		  <div class="panel-body">
		  

	<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="form-control" value="<?php echo $title ?>">
			<?php
			if($valTitle != ""){
				echo "<div class=\"alert alert-danger\">$valTitle</div>";
			} 
			?>
		</div>		
		<div class="clearfix">
			<div class="form-group">
				<label for="entry">Entry:</label>
				<textarea name="entry" class="form-control"><?php echo $entry; ?></textarea>
				<?php
				if($valEntry != ""){
					echo "<div class=\"alert alert-danger\">$valEntry</div>";
				} 
				?>
			</div>
			<div id="emoticons" class="pull-right">
				<a href="javascript:emoticon(':D')"><img src="../emoticons/icon_biggrin.gif" alt="" width="15" height="15" border="0"></a> 
				<a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif" alt="" width="15" height="15" border="0"></a>
		 		<a href="javascript:emoticon(':(')"><img src="../emoticons/icon_sad.gif" alt="" width="15" height="15" border="0"></a>
				<a href="javascript:emoticon(':shock')"><img src="../emoticons/icon_surprised.gif" alt="" width="15" height="15" border="0"></a>
			</div>
		</div>


		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
		</div>
	</form>

	</div>
</div><!-- /panel -->

<?php
if($valSuccess != ""){
	echo "<div class=\"alert alert-warning\">$valSuccess</div>";
} 
?>
	</div>
</div><!-- / row -->



<?php
	include("../includes/footer.php");
?>
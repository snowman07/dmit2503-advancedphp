<?php

include ("../includes/header.php");


// retrieve the query string variable that decides which character we are editing. This is MOST important !!!

$blog_ID = $_GET['bid'];

if(!isset($blog_ID )){
	//$char_ID = 1;// assign	a default value in case no query string value; this is important for later DB queries

	$result = mysqli_query($con, "SELECT * FROM mublog LIMIT 1") or die(mysqli_error($con));
	while($row = mysqli_fetch_array($result)){
		$blog_ID  = $row['bid'];
	}

}


// echo $blog_ID ;


// Step 3: 
if(isset($_POST['submit'])){

	$newTitle = strip_tags(trim($_POST['title']));
	$newEntry = strip_tags(trim($_POST['entry']));
	
	$boolValidateOK = 1; 
	$strValidationMessage = "";

	if((strlen($newTitle ) < 2) || (strlen($newTitle ) > 50)){
		$boolValidateOK = 0;
		$valTitle = "Please fill in a proper Title from 2 to 50 characters.<br>";
	}

	

	if((strlen($newEntry ) < 10) || (strlen($newEntry ) > 1000)){
		$boolValidateOK = 0;
		$valEntry = "Please fill in a proper Entry from 10 to 1000 characters.<br>";
	}


	// SUCCESS:If $boolValidateOK == 1, then validation has passed
	if($boolValidateOK == 1){ // SUCCESS

		/*$newFname = $_POST['fname'];
		$newLname = $_POST['lname'];
		$newDesc= $_POST['description'];*/

		mysqli_query($con, "UPDATE mublog SET 
			title = '$newTitle', 
			message = '$newEntry' WHERE bid = '$blog_ID'") or die(mysqli_error($con));

		$valSuccess = "Entry Updated";	
	}

}// \if submit

if(isset($_POST['delete'])){
	//echo "delete";
	mysqli_query($con, "DELETE FROM mublog WHERE bid = '$blog_ID'") or die(mysqli_error($con));
	$valSuccess = "Entry Deleted";
	header("Location:edit.php");
}


// Step 1: Create a list of links so that the user can select which entry they wish to edit.

	$result = mysqli_query($con, "SELECT * FROM mublog") or die(mysqli_error($con));

		while($row = mysqli_fetch_array($result)){
			
			$titlelink =  $row['title'];
			//$entrylink =  $row['message'];
			$bid =  $row['bid'];
		

			$allLinks .= "\n\t\t<a href=\"edit.php?bid=$bid\">$titlelink</a><br>";

			$thisPage = $_SERVER['PHP_SELF']."?bid=".$bid;
			if($blog_ID == $bid){
				$thisLink .= "\n<option value=\"$thisPage\" selected=\"selected\">$titlelink</option>\n";
			}else {
				$thisLink .= "\n<option value=\"$thisPage\">$titlelink</option>\n";
			}

		}// \ loop

// Step 2: retrieve data for the selected character only; use this to prepopulate the form


$result2 = mysqli_query($con, "SELECT * FROM mublog WHERE bid = '$blog_ID '") or die(mysqli_error($con));

		while($row = mysqli_fetch_array($result2)){
			
			$title =  $row['title'];
			$entry =  $row['message'];
			
			//$cid =  $row['cid'];
		
			/*echo "$title | $entry";*/
			

		}// \ loop




?>
<div class="row">
	<div class="col-md-6">
		<h2>Edit</h2>
		<!-- Nav Select Form -->

		<div class="panel panel-default">
		  <div class="panel-heading">Select a Blog Entry to Edit</div>
		  <div class="panel-body">
		  
		  	<form>
				<!-- <label for="entryselect">Select a Blog Entry to Edit</label> -->
				<select name="entryselect" class="form-control" onchange="go()">

					<?php echo $thisLink; ?>
				</select>
			</form>


		  </div>
		</div>

		<!-- \Nav Select Form -->


<div class="panel panel-default">
		  <div class="panel-heading">Edit Blog Entry</div>
		  <div class="panel-body">


		
		<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

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
					<input type="submit" onclick="return confirm('Are you sure?')" name="delete" class="btn btn-danger" value="Delete">
				</div>

		</form>
		<?php
		if($valSuccess != ""){
			echo "<div class=\"alert alert-warning\">$valSuccess</div>";
		} 
		?>


</div>
</div><!-- /panel -->



		</div><!-- \col-md-6 -->


		


	<div class="col-md-6">
		<!-- <h3>Select a Character to Edit</h3> -->
		<?php 
		//echo $allLinks;
		 ?>
	</div>

</div>

<?php

include ("../includes/footer.php");
?>
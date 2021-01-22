<?php

	require_once('login/classes/Login.php');

	$login = new Login();

	include ("includes/header.php");
	include ("includes/_functions.php");//addEmoticons & makeClickableLinks here
?>
<div class="row">
	<div class="col-md-12">
		<h1>
			<?php echo APP_NAME; // see includes/mysql_connect for this constant ?>
		</h1>

		<?php

			//////////// pagination
			$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM mublog");
			$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
			$limit = 3;
			if($postnum > $limit){
				
				$tagend = round($postnum % $limit,0);
				$splits = round(($postnum - $tagend)/$limit,0);

				if($tagend == 0){
					$num_pages = $splits;
				}else{
					$num_pages = $splits + 1;
				}

				if(isset($_GET['pg'])){
					$pg = $_GET['pg'];
				}else{
					$pg = 1;
				}
				$startpos = ($pg*$limit)-$limit;
				$limstring = "LIMIT $startpos,$limit";

			}else{
				$limstring = "LIMIT 0,$limit";
			}

			// MySQLi upgrade: we need this for mysql_result() equivalent
			function mysqli_result($res, $row, $field=0) { 
				$res->data_seek($row); 
				$datarow = $res->fetch_array(); 
				return $datarow[$field]; 
			}



			$result = mysqli_query($con, "SELECT * FROM mublog JOIN users ON users.user_id = mublog.author_id ORDER BY bid DESC $limstring");
		?>

		<?php while($row = mysqli_fetch_array($result)): ?>
			<!-- Go ahead and do some HTML/CSS styling in here...I dare you! -->

			<?php $blog_id = $row['bid']; ?>

			<div class="blog-entry">
				<div class="row">
					<div class="col-md-6">
						<h3 class="title"><?php echo $row['title'];?></h3>
					</div>
					<div class="col-md-6">
						<div class="timedate pull-right">
							<?php 
								$date = strtotime($row['timedate']);/* fixes niggly MySQL to PHP date problem */
								echo date("F j, Y - g:i a", $date);
							?>
							<br>
								by <em><b><?php echo $row['user_name']; ?></b></em>
						</div>
					</div>
				</div> <!--END of row-->
				<!-- In this PHP block, we make calls to functions stored elsewhere in our code. 
				If we like using certain functions in our projects, let's make an include out of them, and move them to /includes/ folder.
				-->

				<div class="message">
					<?php echo nl2br(addEmoticons($row['message']));?>
				</div>

				<!-- Comments block -->

				<h4>Comments</h4>
				<?php

					$thisBlogPost = $row['bid'];
					
					//On your own../ retrieve and write the comments for this blog post.
					//nested query and loop to grab the comments for this blog post.
					$result2 = mysqli_query($con, "SELECT * FROM mucomments JOIN users ON users.user_id = mucomments.commentor_id WHERE blog_id = '$thisBlogPost'");

				?>

				<?php while ($row = mysqli_fetch_array($result2)): ?>
					<p style="border:1px solid #ccc; padding: 4px; margin-left:20px; border-radius:3px">
						<?php echo $row['comments']; ?>
						<em class="pull-right"><?php echo $row['user_name']; ?></em>
					</p>
				<?php endwhile; ?>

				<?php // form to add a comment for this blog post ?>
				
				<?php if($login->isUserLoggedIn() == true): ?>	<!--ternary operator or alternate syntax-->

					<!-- <p>Logged in, so can comment</p> -->
					
					<form action="<?php echo BASE_URL . "admin/comment.php" ?>" method="post">
						<input type="text" name="comment">
						<input type="submit" name="submit" class="submit">
						<input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
					</form>
				<?php endif; ?>
			</div> <!--END of blog-entry-->
		<?php endwhile; ?>

		<div class="pagination-block">
			<?php 
				///////////////// pagination links
				// if you don't like the formatting, feel free to change. Look into Bootstrap Pagination
				if($postnum > $limit){

					echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
					$n = $pg + 1;
					$p = $pg - 1;
					$thisroot = $_SERVER['PHP_SELF'];
					
					if($pg > 1){
						echo "<a href=\"$thisroot?pg=$p\"><< prev</a>&nbsp;&nbsp;";
					}
					for($i=1; $i<=$num_pages; $i++){
						if($i!= $pg){
							echo "<a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
						}else{
							echo "$i&nbsp;&nbsp;";
						}
					}
					
					if($pg < $num_pages){
						echo "<a href=\"$thisroot?pg=$n\">next >></a>";
					}

					echo "&nbsp;&nbsp;";
				}
				////////////// end pagination
			?>
		</div><!-- / pagination -->
	</div><!--  / col-md-12 -->
</div><!-- / row -->


<?php
	include ("includes/footer.php");
?>
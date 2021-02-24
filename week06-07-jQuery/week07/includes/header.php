<?php
include("mysql_connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title>Blog</title>

	<link rel="stylesheet" type="text/css" href="includes/style.css">
	
	<!--  jQuery goes here -->

	<!-- This is from https://developers.google.com/speed/libraries , >> jquery >> 3.x snippet OR google "jquery cdn" -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

	<!-- script tag -->
	<script type="text/javascript">
	
		$(document).ready(function(){
			//console.log("ready...");

			$(".commenttext").hide(); //hide ALL the text boxes by default
			
			$(".commentlink").click(function(e){ // show /hide the correct text box

				//$(".commenttext").hide();	//OPTIONAL

				//console.log("clicked");

				var commentText = "#" + $(this).attr("data-x");
				//console.log(commentText);
				$(commentText).toggle();


				e.preventDefault(); //without this, console will show clicked then refresh the page which is not good
			});

			$(".commentform").submit(function(e){
				
				var thisOne = $(this).children("input").attr("id"); //which textbox has the comment
				var textVal = $("#" + thisOne).val(); //lets grab the comment
				var post_id = $(this).attr("data-x"); // which blog post is this comment about

				//console.log(post_id);

				//// lets go for our AJ!!!
				$.ajax({

					type: "POST",
					url: "admin/comment.php",
					data:{
						'comment': textVal,
						'post_id': post_id
					},
					success: function(response){
						location.reload();
					}

				});

				e.preventDefault(); //without this, console will show submitted then refresh the page which is not good
			});





		});

	</script>
 
</head>
<body>
	<div id="container">
	<div id="banner"> 
	Blog
	</div>

	<div id="content">
	<a href="index.php">All Posts</a>

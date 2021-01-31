<?php 

	function resizeImage($file, $folder, $newwidth) {
		list($width, $height) = getimagesize($file);
		if($newwidth >= $width){// hack for images smaller than our resize
			$newwidth = $width;
		}
		$imgRatio = $width/$height;
		$newheight = $newwidth / $imgRatio;
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		$source = imagecreatefromjpeg($file);
		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	


		$newFileName = $folder .  basename($file);// get original filename for dest filename

		imagejpeg($thumb,$newFileName,80);
		imagedestroy($thumb); 
		imagedestroy($source); 
	}

	function createSquareImageCopy($file, $folder, $newWidth){
		$thumb_width = $newWidth;
		$thumb_height = $newWidth;// tweak this for ratio
		list($width, $height) = getimagesize($file);
		$original_aspect = $width / $height;
		$thumb_aspect = $thumb_width / $thumb_height;
		if($original_aspect >= $thumb_aspect) {
		// If image is wider than thumbnail (in aspect ratio sense)
		$new_height = $thumb_height;
		$new_width = $width / ($height / $thumb_height);
		} else {
		// If the thumbnail is wider than the image
		$new_width = $thumb_width;
		$new_height = $height / ($width / $thumb_width);
		}
		$source = imagecreatefromjpeg($file);
		$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
		// Resize and crop

		imagecopyresampled($thumb,
						$source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
						0 - ($new_height - $thumb_height) / 2, // Center the image vertically
						0, 0,
						$new_width, $new_height,
						$width, $height);
		

		$newFileName = $folder. "/" .basename($file);
		imagejpeg($thumb, $newFileName, 80);
		return $newFileName;
	}


	//======== Check Owner - Security against URL hacks. (dmit 2503 week 03-04)

	function checkOwner($con, $pageid, $author_id){ // we need to pass the connection here as functions do not have access to anything outside them.

		$result = mysqli_query($con, "SELECT * FROM lab2_mugallery WHERE author_id = '$author_id' AND id = 

			'$pageid'") or die(mysqli_error($con));



		if(mysqli_num_rows($result) > 0){

			return true;

		}else{

			return false;

		}

	}







?>
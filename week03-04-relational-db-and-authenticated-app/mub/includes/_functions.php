<?php  
function makeClickableLinks($text)
 {
	$text = " " . $text; // fixes problem of not linking if no chars before the link
	 $text = preg_replace('/(((f|ht){1}tp:\/\/)[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
						   '<a href="\\1">\\1</a>', $text);
	 $text = preg_replace('/([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&\/\/=]+)/i',
						   '\\1<a href="http://\\2">\\2</a>', $text);
	 $text = preg_replace('/([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})/i',
						   '<a href="mailto:\\1">\\1</a>', $text);
	 return trim($text);
 } // end makeClickableLinks

function addEmoticons($thisMessage){
  	$thisEmoticon = "<img src=\"emoticons/icon_biggrin.gif\" />";
  	$thisMessage =  str_replace(":D",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_smile.gif\" />";
  	$thisMessage =  str_replace(":)",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_sad.gif\" />";
  	$thisMessage =  str_replace(":(",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_eek.gif\" />";
  	$thisMessage =  str_replace(":shock",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_redface.gif\" />";
  	$thisMessage =  str_replace(":oops",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_cry.gif\" />";
  	$thisMessage =  str_replace(":cry",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_lol.gif\" />";
  	$thisMessage =  str_replace(":lol",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_rolleyes.gif\" />";
  	$thisMessage =  str_replace(":roll",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_evil.gif\" />";
  	$thisMessage =  str_replace(":evil",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_wink.gif\" />";
  	$thisMessage =  str_replace(":wink",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_question.gif\" />";
  	$thisMessage =  str_replace(":?",$thisEmoticon,$thisMessage);
	
	$thisEmoticon = "<img src=\"emoticons/icon_idea.gif\" />";
  	$thisMessage =  str_replace(":idea",$thisEmoticon,$thisMessage);
	
	
	return $thisMessage;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>AJAX Login Demo</title>
</head>
<script type="text/javascript">
	function resetConfirm() {
		if (confirm("Are you sure you want to setup/reset the DB table?")) {
          document.location = "reset.php";   
       }
	}
</script>
<style type="text/css">

body {
	font-family: verdana;
	font-size: 13px;
}
#container {
	width: 500px;
	margin-left: auto;
	margin-right: auto;
}
</style>
<body>

<div id="container">
<h2>Admin Section</h2>
	<div id="nav">
		<a href="../index.php">Public Section</a> | 
		<a href="list.php">List Users/Passwords </a> | 
		<a href="javascript:resetConfirm()">Setup/Reset DB table </a> | 
	</div>


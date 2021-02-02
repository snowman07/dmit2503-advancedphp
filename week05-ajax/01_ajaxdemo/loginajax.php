<?php
include("includes/header.php")
?>
<!-- This will be completed in class. -->
<script type="text/javascript">


</script>
</head>
<body>
<p>The new way of doing it. <br />Info is sent to processing page, while user waits at this page.</p>
<h2> Please login (AJAX style)</h2>
<form action="" name="myform" method="post">
Login: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="submit"><br>
</form>
<div id="message"><!-- HERE WE USE AJAX FROM ANOTHER PAGE TO DYNAMICALLY WRITE SOMETHING TO THE USER -->
</div>
<?php
include("includes/footer.php")
?>

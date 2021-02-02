<?php
include("includes/header.php")
?>
<p>The old way of doing it. <br />User is redirected to the processing page.</p>
<h2> Please login</h2>
<form action="loginprocess.php" name="myform" method="post">
Login: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="submit"><br>
</form>

<?php
include("includes/footer.php")
?>

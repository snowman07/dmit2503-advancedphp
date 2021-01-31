<!-- if you need user information, just put them into the $_SESSION variable and output them here -->
<h1>
    Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
</h1><br />
<!-- Try to close this browser tab and open it again. Still logged in! ;) -->
<div>
    <a class="btn btn-primary" href="<?php echo BASE_URL ?>admin/insert.php">INSERT image</a>
</div><br />
<div>
    <a class="btn btn-primary" href="<?php echo BASE_URL ?>admin/edit.php">EDIT image</a>
</div><br />
<!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
<a class="btn btn-danger" href="index.php?logout">Logout from this account</a>


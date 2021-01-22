<?php
    require_once('login2020/classes/Login.php');

    $login = new Login();

    if($login->isUserLoggedIn() == true) {
        echo "Logged in as " . $_SESSION['user_name'] . " . ID is " . $_SESSION['user_id'];
    } else {
        //echo "NOT logged in";
        header("Location:login2020/index.php");
    }

?>
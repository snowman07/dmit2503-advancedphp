<?php

    // integrate the auth (Login) script

    require_once('../login/classes/Login.php');

    $login = new Login();



    if($login->isUserLoggedIn() == true) {

        include("../includes/mysql_connect.php");
        //echo "Logged in as " . $_SESSION['user_name'] . " . ID is " . $_SESSION['user_id'];

        //Lets create a new variable which will be the author of this blog post.

        $commentor_id = $_SESSION['user_id'];

    } else {
        //echo "NOT logged in";
        header("Location:../login/index.php");
    }


    $comment = trim($_POST['comment']);
    $blog_id = $_POST['blog_id'];

    //echo "Commentor: $commentor_id , Comment: $comment, Blog Post: $blog_id";

    if(isset($_POST['submit'])){

        //On your own... create a mysql query that INSERT's this into your DB... and test

        mysqli_query($con, "INSERT INTO mucomments (comments, blog_id, commentor_id) VALUES ('$comment', '$blog_id', '$commentor_id')") or die(mysqli_error($con));

        header("Location: ../index.php");
    }

?>
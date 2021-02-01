<?php

    // integrate the auth (Login) script

    require_once('../login/classes/Login.php');

    $login = new Login();

    if($login->isUserLoggedIn() == true) {

        include("../includes/header.php");
        echo "Logged in as " . $_SESSION['user_name'] . " . ID is " . $_SESSION['user_id'];

        //Lets create a new variable which will be the author of this blog post.
        $author_id = $_SESSION['user_id'];

    } else {

        //echo "NOT logged in";
        //$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
        header("Location:../login/index.php");
    }







    $imageid = $row['picture_id'];
    $user_id = $row['rater_id'];

    $rating = mysqli_query($con,"SELECT * FROM lab2_ratings WHERE picture_id = '$imageid' AND rater_id = $user_id");
    
    $rowcount=mysqli_num_rows($rating);

    if($rowcount == 0){
        if (isset($_SESSION['user_id'])){
            include("ratingsform.php");
        }

    } else {

        echo "<p>You have already rated this picture</p>";
    }



    $rating = trim($_POST['rating']);


    if(isset($_POST['submit'])){

        //On your own... create a mysql query that INSERT's this into your DB... and test

        mysqli_query($con, "INSERT INTO lab2_ratings (rating) VALUES ('$rating')") or die(mysqli_error($con));

        header("Location: ../index.php");
    }


?>

<form action=""></form>

<h1>Ratings</h1>
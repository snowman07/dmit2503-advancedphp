<?php
    require("mysql_connect.php");

    //DEFAULT QUERY: RETRIEVE EVERYTHING
    $result = mysqli_query($con, "SELECT * FROM lab3_main_content") or die(mysqli_error($con));

    //FILTERING THE DB

    $displayby = $_REQUEST['displayby'];
    $displayvalue = $_REQUEST['displayvalue'];


    if (isset($displayby) && isset($displayvalue)) {

        $result = mysqli_query($con, "SELECT * FROM lab3_main_content WHERE $displayby LIKE '$displayvalue'") or die (mysqli_error($con));
    }

    while ($row = mysqli_fetch_array($result)) {
        $title = ($row['title']);
		$content = ($row['content']);

        echo "<h2>" . $title . "</h2>" ;

        echo $content;
    }

?>
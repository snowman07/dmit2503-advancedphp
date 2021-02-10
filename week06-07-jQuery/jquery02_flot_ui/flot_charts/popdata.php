<?php

    include("mysql_connect.php");


    /*
    
    "usa": {
				label: "USA",
				data: [[1988, 483994], [1989, 479060], [1990, 457648], [1991, 401949], [1992, 424705], [1993, 402375], [1994, 377867], [1995, 357382], [1996, 337946], [1997, 336185], [1998, 328611], [1999, 329421], [2000, 342172], [2001, 344932], [2002, 387303], [2003, 440813], [2004, 480451], [2005, 504638], [2006, 528692]]
			},
    
    */

    $result = mysqli_query($con, "SELECT * FROM jquery_populations");

    while($row = mysqli_fetch_array($result)){
        $country = $row['country'];
        //echo $country;
        $p1950 = $row['1950'];
        $p1955 = $row['1955'];
        $p1960 = $row['1960'];
        $p1965 = $row['1965'];
        $p1970 = $row['1970'];
        $p1975 = $row['1975'];
        $p1980 = $row['1980'];

        $thisCountryData = "\n\"$country\": {";
        $thisCountryData .= "\nlabel: \"$country\",";
        $thisCountryData .= "data: [";
        $thisCountryData .= "[1950, $p1950],";
        $thisCountryData .= "[1955, $p1955],";
        $thisCountryData .= "[1960, $p1960],";
        $thisCountryData .= "[1965, $p1965],";
        $thisCountryData .= "[1970, $p1970],";
        $thisCountryData .= "[1975, $p1975],";
        $thisCountryData .= "[1980, $p1980]";
        $thisCountryData .= "] \n},";

        //echo $thisCountryData;
        $allCountriesData .= $thisCountryData;
    } // end loop

    echo substr($allCountriesData, 0, -1);  // substring
?>
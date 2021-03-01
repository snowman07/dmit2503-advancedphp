<?php

$con = mysqli_connect("localhost", "adomingo4","PDsbNesMr3sSS79","adomingo4_dmit2503");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//This stops SQL Injection in POST vars
foreach ($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($con, $value);
}

//This stops SQL Injection in GET vars
foreach ($_GET as $key => $value) {
    $_GET[$key] = mysqli_real_escape_string($con, $value);
}

$result = mysqli_query($con, "SELECT * from lab4_flot_chart");

while ($row = mysqli_fetch_array($result)) {
    $continent = $row['continent'];
    //echo $continent;
    $c1980 = $row['1980'];
    $c1985 = $row['1985'];
    $c1990 = $row['1990'];
    $c1995 = $row['1995'];
    $c2000 = $row['2000'];
    $c2005 = $row['2005'];
    $c2010 = $row['2010'];
    $c2015 = $row['2015'];

    $thisContinent = "\n\"$continent\": {";
    $thisContinent .= "\nlabel: \"$continent\",";
    $thisContinent .= "\ndata: [";
    $thisContinent .= "[1980, $c1980],";
    $thisContinent .= "[1985, $c1985],";
    $thisContinent .= "[1990, $c1990],";
    $thisContinent .= "[1995, $c1995],";
    $thisContinent .= "[2000, $c2000],";
    $thisContinent .= "[2005, $c2005],";
    $thisContinent .= "[2010, $c2010],";
    $thisContinent .= "[2015, $c2015]";
    $thisContinent .= "] \n},";

    //echo $thisprovince;
    $allContinents .= $thisContinent;
}

echo substr($allContinents, 0, -1);

?>

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

$result = mysqli_query($con, "SELECT * from lab4_covid_vaccine");

while ($row = mysqli_fetch_array($result)) {
    $province = $row['province'];
    $feb17_2021 = $row['feb17_2021'];
    $feb18_2021 = $row['feb18_2021'];
    $feb19_2021 = $row['feb19_2021'];
    $feb22_2021 = $row['feb22_2021'];
    $feb23_2021 = $row['feb23_2021'];
    $feb24_2021 = $row['feb24_2021'];
    $feb25_2021 = $row['feb25_2021'];
    $feb26_2021 = $row['feb26_2021'];

    $thisprovince = "\n\"$province\": {";
    $thisprovince .= "\nlabel: \"$province\",";
    $thisprovince .= "\ndata: [";
    $thisprovince .= "[feb17_2021, $feb17_2021],";
    $thisprovince .= "[feb18_2021, $feb18_2021],";
    $thisprovince .= "[feb19_2021, $feb19_2021],";
    $thisprovince .= "[feb22_2021, $feb22_2021],";
    $thisprovince .= "[feb23_2021, $feb23_2021],";
    $thisprovince .= "[feb24_2021, $feb24_2021],";
    $thisprovince .= "[feb25_2021, $feb25_2021],";
    $thisprovince .= "[feb26_2021, $feb26_2021]";
    $thisprovince .= "] \n},";

    $allprovince .= $thisprovince;
}

echo substr($allprovince, 0, -1);

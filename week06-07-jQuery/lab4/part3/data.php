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

$result = mysqli_query($con, "SELECT * from flot_smartphones");

while ($row = mysqli_fetch_array($result)) {
    $manufacturer = $row['manufacturer'];
    $m2007 = $row['2007'];
    $m2009 = $row['2009'];
    $m2011 = $row['2011'];
    $m2013 = $row['2013'];
    $m2015 = $row['2015'];
    $m2017 = $row['2017'];
    $m2019 = $row['2019'];
    $m2021 = $row['2021'];

    $thisManufacturerData = "\n\"$manufacturer\": {";
    $thisManufacturerData .= "\nlabel: \"$manufacturer\",";
    $thisManufacturerData .= "\ndata: [";
    $thisManufacturerData .= "[2007, $m2007],";
    $thisManufacturerData .= "[2009, $m2009],";
    $thisManufacturerData .= "[2011, $m2011],";
    $thisManufacturerData .= "[2013, $m2013],";
    $thisManufacturerData .= "[2015, $m2015],";
    $thisManufacturerData .= "[2017, $m2017],";
    $thisManufacturerData .= "[2019, $m2019],";
    $thisManufacturerData .= "[2021, $m2021]";
    $thisManufacturerData .= "] \n},";

    $allManufacturersData .= $thisManufacturerData;
}

echo substr($allManufacturersData, 0, -1);

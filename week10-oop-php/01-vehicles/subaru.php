<?php 

    // subaru.php 

    include("classes/vehicle.class.php"); // first, we include the class file. 

    $myCar = new vehicle; 
    $myCar ->brand = "Subaru"; 
    $myCar ->price = 35000; 
    $myCar ->shape = "SUV"; 
    $myCar ->color = "blue"; 
    $myCar ->num_doors = "5"; 
    $myCar ->power = 250; 
    $myCar ->weight = 3600; 

    echo "<h1>Subaru</h1>";
    echo "Overview: " . $myCar->showSpecs(); 
    echo "Expected performance: " . $myCar->showPerformance(); 

?>
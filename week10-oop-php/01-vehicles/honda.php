<?php 

    include("classes/vehicle.class.php"); // first, we include the class file. 

    $myCar = new vehicle; 
    $myCar ->brand = "Honda"; 
    $myCar ->price = 15000; 
    $myCar ->shape = "Sedan"; 
    $myCar ->color = "white"; 
    $myCar ->num_doors = "4"; 
    $myCar ->power = 250; 
    $myCar ->weight = 900; 

    echo "<h1>Honda</h1>";
    echo "Overview: " . $myCar->showSpecs(); 
    echo "Expected performance: " . $myCar->showPerformance(); 

?>
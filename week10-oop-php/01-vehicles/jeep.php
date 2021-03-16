<?php 

    include("classes/vehicle.class.php"); // first, we include the class file. 

    $myCar = new vehicle; 
    $myCar ->brand = "Jeep"; 
    $myCar ->price = 25000; 
    $myCar ->shape = "SUV"; 
    $myCar ->color = "white"; 
    $myCar ->num_doors = "5"; 
    $myCar ->power = 250; 
    $myCar ->weight = 1300; 

    echo "<h1>Jeep</h1>";
    echo "Overview: " . $myCar->showSpecs(); 
    echo "Expected performance: " . $myCar->showPerformance(); 

?>
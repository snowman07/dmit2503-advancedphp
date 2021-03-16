<?php 

    // harley.php 
    include("classes/vehicle.class.php"); 
    include("classes/motorcycle.class.php"); 

    $myCar = new motorcycle; 
    $myCar->brand = "Harley Davidson"; 
    $myCar->price = 45000; 
    $myCar->shape = "roadster"; 
    $myCar->color = "black"; 
    $myCar->num_doors = "none"; 
    $myCar->power = 180; 
    $myCar->weight = 1500; 
    $myCar->category = "cruiser"; 
    $myCar->handlebars = "ape hangers"; 

    echo "<h1>Harley</h1>"; 
    echo "Overview: " . $myCar->showSpecs(); 
    echo "Expected performance: " . $myCar->showPerformance(); 
    echo "Motorcycle info: " . $myCar->motorCycleInfo(); 

?>
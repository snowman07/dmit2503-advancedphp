<?php

    class vehicle{ 
        
        public $color; 
        public $num_doors; 
        public $price; 
        public $shape; 
        public $brand; 
        public $power; 
        public $weight; 

        public function __construct() { 
            echo "<p> A vehicle is a mobile machine that transports passengers or cargo.</p>"; 
            echo "<p> About this vehicle</p>"; 
        }

        public function showPrice() { 
            echo "This vehicle costs ". $this->price . "<br>"; 
        }

        public function showSpecs() { 
            
            if((!$this->brand) || (!$this->num_doors)|| (!$this->shape)) { 
                return "Sorry, but we do not have enough data to show the specs."; 
            } 
            else { 
                if($this->price < 25000) { 
                    $expense = "a cheap"; 
                } elseif ($this->price > 25000 && $this->price < 50000) { 
                    $expense = "a mid priced"; 
                } elseif ($this->price > 50000) { 
                    $expense = "an expensive"; 
                } 
                
                if($this->num_doors == "2") { 
                    $sport = "sporty"; 
                } elseif($this->num_doors == "4") { 
                        $sport = "family"; 
                } else { 
                    $sport = ""; 
                } 
                    
                return "This car is ". $expense . " ". $sport . " ". $this->color. " " . $this->shape . ".<br>"; 
            } 
        }


        public function showPerformance() { 

            if((!$this->weight) || (!$this->power)) { 
                return "Sorry, but we do not have enough data to estimate performance."; 
            } else { 
                $ratio = round($this->power/$this->weight,2); 
                $acceleration = round(($this->weight/$this->power)/2, 2); 
                return "This vehicle has a Power-to-Weight Ratio of ". $ratio ." hp/lb, and should have a 0 - 100 km/hr time of ". $acceleration . " seconds<br>"; 
            } 
        }



    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $myCar = new vehicle; // here we create a new object 
        $myCar ->color = "red";  
        $myCar ->num_doors = "2";  
        $myCar ->price = 65000; 
        $myCar ->shape = "SUV";
        $myCar ->brand = "Porsche";
        $myCar ->power = 450; 
        $myCar ->weight = 3600;

        $myCar -> showPrice();

        echo "Vehicle description: " . $myCar->showSpecs();

        echo "Expected performance: " . $myCar->showPerformance();

    ?>   
    
</body>
</html>
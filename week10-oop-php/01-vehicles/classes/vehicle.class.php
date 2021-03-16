<?php

    class vehicle { 
        public $color; 
        public $num_doors; 
        public $price;  // integer please 
        public $shape;     // coupe, sedan, van, etc. 
        public $brand; 
        public $power;  // hp integer
        public $weight;    // lbs integer

        public function __construct() { 
            echo "<h1> A vehicle is a mobile machine that transports passengers or cargo.</h1>"; 
            echo "<h3> About this vehicle</h3>"; 
        }

        public function basicInfo(){ 
            return $this->brand . " - " . $this->shape . " - $" . $this->price ; 
        }

        public function showSpecs() { 
            if((!$this->brand) || (!$this->num_doors)|| (!$this->shape)) { 
                return "Sorry, but we do not have enough data to show the specs."; 
            } 
            else 
            { 
                
                if($this->price < 25000) { 
                    $expense = "a cheap"; 
                } elseif($this->price > 25000 && $this->price < 50000){ 
                    $expense = "a mid priced"; 
                }elseif($this->price > 50000){ 
                    $expense = "an expensive"; 
                } 
                
                if($this->num_doors == "2") { 
                    $type = "sporty"; 
                } elseif($this->num_doors == "4") { 
                    $type = "family"; 
                } elseif($this->num_doors == "5") { 
                    $type = "utilitarian"; 
                } else { 
                    $type = ""; 
                } 

                return "This car is ". $expense . " ". $type . " ". $this->color. " " . $this->shape . ".<br>" ; 
            } 
        }

        public function showPerformance() { 
            
            if((!$this->weight) || (!$this->power)){ 
                return "Sorry, but we do not have enough data to estimate performance."; 
            } 
            else
            { 
                $ratio = round($this->power/$this->weight,2); $acceleration = round(($this->weight/$this->power)/2, 2); 
                return "This vehicle has a Power-to-Weight Ratio of ". $ratio ." hp/lb, and should have a 0 - 100 km/hr time of ". $acceleration . " seconds<br>"; 
            } 
        }


    }
    // END OF vehicle
?>
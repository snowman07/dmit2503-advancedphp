<?php 

    // motorcycle.class.php 
    class motorcycle extends vehicle { 
        
        /*** the number of side cars ***/ 
        
        public $category;   // roadster, racing, dirtbike 
        
        public $handlebars;     // clubman, cruiser, ape hangers 
        
        public function motorCycleInfo(){ 
            return $this->category . " with ". $this->handlebars . " type handlebars."; 
        } 

    } 
    /*** end of class ***/ 
        
?>
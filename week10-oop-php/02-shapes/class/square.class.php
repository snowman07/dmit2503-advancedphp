<?php

class myShape { 
    var $shape_height = 100; 
    var $shape_width = 100; 
    var $shape_color = '#EC0000'; 

    function setHeight($value){ 
        $this->shape_height=$value; 
    } 
    function setWidth($value){ 
        $this->shape_width=$value; 
    } 
    function setColor($value){
        $this->shape_color=$value; 
    }

    function displaysquare(){ 
        $squareToDisplay = "\n<div style=\"height:" . $this->shape_height . "px;"; 
        $squareToDisplay .= "width:" . $this->shape_width . "px;"; 
        $squareToDisplay .= "background-color:" . $this->shape_color . "\"" . "> </div>"; 
        
        echo $squareToDisplay ; 
    }
}

?>
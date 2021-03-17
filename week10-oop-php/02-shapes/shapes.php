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

        function displayrectangle(){ 
            $rectangleToDisplay = "\n<div style=\"height:" . $this->shape_height . "px;"; 
            $rectangleToDisplay .= "width:" . $this->shape_width . "px;"; 
            $rectangleToDisplay .= "background-color:" . $this->shape_color . "\"" . "> </div>"; 
            
            echo $rectangleToDisplay ; 
        }

        function displaycircle(){ 
            $circleToDisplay = "\n<div style=\"height:" . $this->shape_height . "px;";
            $circleToDisplay .= "width:" . $this->shape_width . "px;"; 
            $circleToDisplay .= "border-radius:50%;"; 
            $circleToDisplay .= "background-color:" . $this->shape_color . "\"" . "> </div>"; 
            
            echo $circleToDisplay ; 
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
    <h1>OOP Shapes</h1>

    <?php
    
        //---------START square---------//
        echo "Square Shape<br/>";
        $square1 = new myShape();
        $square1->setHeight(300); 
        $square1->setWidth(300); 
        $square1->setColor('#00F');

        $square1->displaysquare();
        //---------END square---------//
        
        echo "<br/>";

        //---------START rectangle---------//
        echo "Rectangle Shape<br/>";
        $rectangle1 = new myShape();
        $rectangle1 ->setHeight(300); 
        $rectangle1 ->setWidth(600);
        $rectangle1 ->setColor('green');

        $rectangle1 ->displayrectangle();
        //---------END rectangle---------//

        echo "<br/>";

        //---------START circle---------//
        echo "Circle Shape<br/>";
        $circle1=new myShape(); 
        $circle1->setHeight(300); 
        $circle1->setWidth(300); 
        $circle1->setColor('#f00'); 
        
        $circle1->displaycircle();
        //---------END circle---------//

    ?>
    
</body>
</html>
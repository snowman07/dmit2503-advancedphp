<?php
    include("class/square.class.php"); // first, we include the class file. 
    
    //---------START square---------//
    echo "<h1>Square Shape</h1><br/>";
    $square1 = new myShape();
    $square1->setHeight(300); 
    $square1->setWidth(300); 
    $square1->setColor('aquamarine');

    $square1->displaysquare();
    //---------END square---------//

?>
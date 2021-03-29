<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2><?php echo $heading; ?></h2> <!-- each array item in the controller become a PHP variable in the view--> 
    <div class="whatever">
        <?php 
            echo $message; 
            // echo "<img src=\"\" alt=\"\">";
        ?>
        <img src="<?php echo base_url('img/birds/$picture') ?>" alt="bird">
    </div>


</body>
</html>
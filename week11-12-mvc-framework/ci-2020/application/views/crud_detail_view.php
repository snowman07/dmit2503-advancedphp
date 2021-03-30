

<h1><?php echo $heading?></h1> 

<?php if(($results)) : ?> 
    <?php foreach($results as $row): ?> 
        <div class="well"> 
            <h3><?php echo $row->animal_name ?></h3> 
            <p><?php echo $this->typography->nl2br_except_pre($row->description); ?></p> 
        </div> 
    <?php endforeach;?> 

<?php else:?> 
    <p>No results</p> 
<?php endif; ?>
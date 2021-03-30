

<h1><?php echo $heading?></h1> 

<?php if(($results)) : ?> 
    
    <?php foreach($results as $row): ?> 

        <div class="whatever"> 
            <h4><?php echo $row->animal_name ?></h4> 
            <button> <a href="">Read more</a> </button>
        </div> 

    <?php endforeach;?> 
    
<?php endif;?>
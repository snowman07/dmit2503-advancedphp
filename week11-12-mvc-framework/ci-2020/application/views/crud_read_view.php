

<h1><?php echo $heading?></h1> 

<?php if(($results)) : ?> 
    
    <?php foreach($results as $row): ?> 

        <div class="whatever"> 
            <h4><?php echo $row->animal_name ?></h4> 
            <a href="<?php echo base_url() . "crud/detail/" .$row->animal_id; ?>" class="btn btn-primary btn-sm">Read more</a>
        </div> 

    <?php endforeach;?> 
    
<?php endif;?>
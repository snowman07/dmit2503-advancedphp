

<h1><?php echo $heading?></h1> 

<?php if(($results)) : ?> 
    <?php foreach($results as $row): ?> 
        <div class="well"> 
            <h3><?php echo $row->animal_name ?></h3> 
            <p><?php echo $this->typography->nl2br_except_pre($row->description); ?></p> 
            <a href="<?php echo base_url() ."crud/edit/" .$row->animal_id;?>" class="btn btn-primary btn-sm"> 
            <i class="material-icons">edit</i>Edit</a> 
            <a href="<?php echo base_url() ."crud/delete/" .$row->animal_id;?>" class="btn btn-danger btn-sm" 
            onClick="return confirm('Are you sure to delete data?')"> 
            <i class="material-icons">delete</i>Delete</a>

            
            <p>echo "added by " . $query;</p>
        </div> 
    <?php endforeach;?> 

<?php else:?> 
    <p>No results</p> 
<?php endif; ?>
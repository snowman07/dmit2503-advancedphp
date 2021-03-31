    
    
    
    <h1>New Animal</h1> 

    <?php 
    if($results){ 
        foreach($results as $row){ 
            $animal_name = $row->animal_name; 
            $description = $row->description; 
            $id = $row->animal_id; 
            echo $animal_name; //just to test 
        } 
    } 
    ?>

    <?php echo form_open_multipart("crud/edit/$id"); ?>
        <div class="form-group"> 
            <label for="animal_name">Animal Name</label>

            <input type="text" name="animal_name" 
                class="form-control form-width" 
                value="<?php echo set_value('animal_name',$animal_name); ?>"
            /> 
                
            <?php echo form_error('animal_name'); ?> 
        </div> 
                
        <div class="form-group"> 
            <label for="description">Description</label> 
            <textarea name="description" class="form-control form-width textarea-height">
                <?php echo set_value('description',$description); ?>
            </textarea> 
            
            <?php echo form_error('description'); ?> 
        </div> 
        <div class="form-group"><input type="submit" value="Submit" class="btn" />
        
        </div> 
    </form>



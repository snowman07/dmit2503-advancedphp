

    <h1>New Animal</h1> 
    <?php echo form_open_multipart('crud/write'); ?> 
        <div class="form-group"> 
            <label for="animal_name">Animal Name</label>

            <input type="text" name="animal_name" 
                class="form-control form-width" 
                value="<?php echo set_value('animal_name'); ?>"
            /> 
                
            <?php echo form_error('animal_name'); ?> 
        </div> 
                
        <div class="form-group"> 
            <label for="description">Description</label> 
            <textarea name="description" class="form-control form-width textarea-height">
                <?php echo set_value('description'); ?>
            </textarea> 
            
            <?php echo form_error('description'); ?> 
        </div> 
        <div class="form-group"><input type="submit" value="Submit" class="btn" />
        
        </div> 
    </form>
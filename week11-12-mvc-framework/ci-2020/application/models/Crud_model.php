<?php class Crud_model extends CI_Model { 
    
    function __construct() { 
        // Call the Model constructor 
        parent::__construct(); 
    } 
    
    function get_animals(){ 
        $query = $this->db->get('ci_animals'); 
        
        if ( $query->num_rows() > 0 ){ 
            return $query->result(); 
        }else{ 
            return FALSE; 
        } 
    } 
}
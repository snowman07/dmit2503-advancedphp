<?php 

    class Crud_model extends CI_Model { 
        
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

        function get_animal_detail($id){ 
            $this->db->where('animal_id', $id); 
            $query = $this->db->get('ci_animals'); 
            
            if ( $query->num_rows() > 0 ){ 
                return $query->result(); 
            }else{ 
                return FALSE; 
            } 
        }
        
        function insert_animal($data){ 
            $this->db->insert('ci_animals', $data); 
        }

        function edit_animal($data,$id){ 
            $this->db->where('animal_id', $id); 
            $this->db->update('ci_animals', $data); 
        }
        
        //------------------------------------//
        //----- START OF DELETE FUNCTION -----//

        function delete_animal($id) {
            $this->db->query('animal_id', $id);
        } 
        
        // reference: https://www.studentstutorial.com/codeigniter/delete-data-codeigniter
        //------ END OF DELETE FUNCTION ------//
        //------------------------------------//
    }
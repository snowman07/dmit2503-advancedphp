<?php 
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    
    class Crud extends CI_Controller { 
        
        function __construct() { 
            parent::__construct(); 
            
            $this->load->helper('form'); // loading this for the entire class/controller 
            $this->load->library('form_validation'); // loading this for the entire class/controller 
            $this->load->database(); // ummm…ditto 
        } 
        
        // public function index() { 
        //     echo "CRUD"; 
        // } 

        public function index(){ 
            $data['heading'] = "Reading from a DB"; 
            $this->load->model('crud_model'); 
            $data['results'] = $this->crud_model->get_animals(); 
            
            // echo "<pre>"; 
            // print_r($data); 
            // echo "</pre>"; 

            $this->load->view('includes/header', $data); 
            $this->load->view('crud_read_view',$data); 
            $this->load->view('includes/footer');
        }


        public function detail($id) { 
            /* We need to add some security and a "graceful exit: in case of a URL manipulation or other error that prevents us from getting the required $id */ 
            if(!is_numeric($id)){ 
                /* if this parameter is missing, or wrong format...*/ 
                /* best to just redirect*/ 
                redirect('/', 'location'); 
            } 
            $this->load->library('typography'); 
            $data['heading'] = "Reading from a DB"; 
            $this->load->model('crud_model'); 
            $data['results'] = $this->crud_model->get_animal_detail($id); 
            
            $this->load->view('includes/header',$data); 
            $this->load->view('crud_detail_view',$data);
            $this->load->view('includes/footer'); 
        }// ENDOF detail
    }
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_session extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            $this->load->helper('test/test_helper');
            
            // Load library
            
            // Load model
            
            // Do filter
            
        }
        
        function index(){
            
            $data = $this->session->userdata();
            
            foreach($data as $k => $v){
                echo $k.'  :  '.($v).'<br/>';
            }
            
        }
        
        function flashdata(){
            $this->session->set_userdata('op', 'adsd');
            echo $this->session->mark_as_flash('op');
        }
        
        
    }
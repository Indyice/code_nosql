<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            // $this->load->model('M_achievement');

        }

        function output($view, $data = null){
            $this->load->view('template/header');
            $this->load->view($view, $data);
            $this->load->view('template/js');
            $this->load->view('template/footer');
        }

        function show_dashboard(){
            $this->output('v_dashboard');           
        }
        
    }
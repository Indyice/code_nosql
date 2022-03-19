<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Achievement extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_achievement');

        }

        function output($view, $data = null){
            $this->load->view('template/header');
            $this->load->view($view, $data);
            $this->load->view('template/js');
            $this->load->view('template/footer');
        }

        function show_list()
        {
            $data['ach'] = $this->M_achievement->get_achievement_list();
            $this->output('v_achievement_show_list', $data);
            // $this->load->view('test');
        }
        
        function update($_id){
            $data['ach'] = $this->M_achievement->get_achievement($_id);
            $this->load->view('v_achievement_update', $data);
        }
    }
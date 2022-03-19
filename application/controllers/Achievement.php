<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Achievement extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_achievement');

        }
        function show_list()
        {
            $data['act'] = $this->M_achievement->get_activity_list();
            $this->load->view('v_achievement_show_list', $data);
        }
        function update($_id){
            $data['act'] = $this->M_achievement->get_activity($_id);
            $this->load->view('v_achievement_update', $data);
        }
    }
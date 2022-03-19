<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Activity extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_activity');

        }
        function show_list()
        {
            $data['act'] = $this->M_activity->get_activity_list();
            $this->load->view('v_activity_show_list', $data);
        }
        function update($_id){
            $data['act'] = $this->M_activity->get_activity($_id);
            $this->load->view('v_activity_update', $data);
        }
    }
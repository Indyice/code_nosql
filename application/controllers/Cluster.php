<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Cluster extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_cluster');
            $this->load->model('M_achievement');
            $this->load->model('M_activity');
        }

        function output($view, $data = null){
            $data['clu'] = $this->M_cluster->get_cluster("6241c0bd3a6f6448ed2cd4e6");
            $_SESSION['clu_point'] = $data['clu']->clu_point;
            $this->load->view('template/header');
            $this->load->view($view, $data);
            $this->load->view('template/js');
            $this->load->view('template/footer');
        }
           
    }
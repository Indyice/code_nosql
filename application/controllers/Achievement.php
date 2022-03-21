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
        
        function create(){
            if($this->input->post('submit')){
                $this->form_validation->set_rules('ach_name','Name achievement', 'trim|required');
                $this->form_validation->set_rules('ach_point','Point', 'trim|required');

                if($this->form_validation->run() !== false){
                    $result = $this->M_achievement->create_achievement($this->input->post('ach_name'), $this->input->post('ach_point'));
                        if($result === true){
                            redirect('Achievement/show_list');
                        }else{
                            $data['error'] = 'Error occurred during updating data';
                            $this->output('v_achievement_create', $data);
                        }  
                }else{
                    $data['error'] = 'เกิดปัญหา กรุณาตรวจสอบข้อมูลที่บันทึก';
                    $this->output('v_achievement_create', $data);
                }
            }else{
                $this->output('v_achievement_create');
            }
        }
    }
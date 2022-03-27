<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Activity extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_activity');
            $this->load->model('M_achievement');
        }

        function output($view, $data = null){
            $this->load->view('template/header');
            $this->load->view($view, $data);
            $this->load->view('template/js');
            $this->load->view('template/footer');
        }

        function show_list(){ 
            session_start();
            $_SESSION['menu'] = 'activity_show_list';
            
            $data['act'] = $this->M_activity->get_activity_list();
            $this->output('v_activity_show_list', $data);
        }

        function create(){
            session_start();
            $_SESSION['menu'] = 'activity_create';
            
            if($this->input->post('submit')){
                $this->form_validation->set_rules('act_name','Name activity', 'trim|required');
                $this->form_validation->set_rules('act_point','Point', 'trim|required');

                if($this->form_validation->run() !== false){
                    $result = $this->M_activity->create_activity($this->input->post('act_name'), $this->input->post('act_point'));
                        if($result === true){
                            redirect('Activity/show_list');
                        }else{
                            $data['error'] = 'Error occurred during updating data';
                            $this->output('v_activity_create', $data);
                        }  
                }else{
                    $data['error'] = 'เกิดปัญหา กรุณาตรวจสอบข้อมูลที่บันทึก';
                    $this->output('v_activity_create', $data);
                }
            }else{
                $this->output('v_activity_create');
            }
        }

        function update($_id){
            session_start();
            $_SESSION['menu'] = 'activity_update';

            if($this->input->post('submit')){
                $this->form_validation->set_rules('act_name','Name achievement', 'trim|required');
                $this->form_validation->set_rules('act_point', 'Point', 'trim|required');

                if($this->form_validation->run() !== false){
                    $result = $this->M_activity->update_activity($_id, $this->input->post('act_name'), $this->input->post('act_point'));
                        if($result === true){
                            redirect('Activity/show_list');
                        }else{
                            $data['error'] = 'Error occurred during updating data';
                            $this->output('v_activity_update', $data);
                        }  
                }else{
                    $data['error'] = 'เกิดปัญหา กรุณาตรวจสอบข้อมูลที่บันทึก';
                    $this->output('v_activity_update', $data);
                }
            }else{
                $data['act'] = $this->M_activity->get_activity($_id);
                $this->output('v_activity_update', $data);
            }
        }
        
        function delete($_id){
            if($_id){
                $this->M_activity->delete_activity($_id);
            }
            redirect('Activity/show_list');
        }

       
    }
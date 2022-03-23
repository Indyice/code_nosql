<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Achievement extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_achievement');
            $this->load->model('M_activity');

        }

        function output($view, $data = null){
            $this->load->view('template/header');
            $this->load->view($view, $data);
            $this->load->view('template/js');
            $this->load->view('template/footer');
        }

        function show_list()
        {
            session_start();
            $_SESSION['menu'] = 'achievement_show_list';

            $data['ach'] = $this->M_achievement->get_achievement_list();
            $this->output('v_achievement_show_list', $data);
            // $this->load->view('test');
        }
        
        function create(){
            session_start();
            $_SESSION['menu'] = 'achievement_create';
            
            if($this->input->post('submit')){
                $this->form_validation->set_rules('act_name','Name achievement', 'trim|required');
                $this->form_validation->set_rules('act_point','Point', 'trim|required');

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

        function update($_id){
            session_start();
            $_SESSION['menu'] = 'achievement_update';

            if($this->input->post('submit')){
                $this->form_validation->set_rules('ach_name','Name achievement', 'trim|required');
                $this->form_validation->set_rules('ach_point', 'Point', 'trim|required');

                if($this->form_validation->run() !== false){
                    $result = $this->M_achievement->update_achievement($_id, $this->input->post('ach_name'), $this->input->post('ach_point'));
                        if($result === true){
                            redirect('Achievement/show_list');
                        }else{
                            $data['error'] = 'Error occurred during updating data';
                            $this->output('v_achievement_update', $data);
                        }  
                }else{
                    $data['error'] = 'เกิดปัญหา กรุณาตรวจสอบข้อมูลที่บันทึก';
                    $this->output('v_achievement_update', $data);
                }
            }else{
                $data['ach'] = $this->M_achievement->get_achievement($_id);
                $this->output('v_achievement_update', $data);
            }
        }
        
        function delete($_id){
            if($_id){
                $this->M_achievement->delete_achievement($_id);
            }
            redirect('Achievement/show_list');
        }

        function get_act_by_id($id_ach){
            session_start();
            $_SESSION['menu'] = 'achievement_detail';
            // $id_ach = "623a2bfaa5470000e30078c5";
            $data['ach'] = $this->M_achievement->get_achievement($id_ach);
            
            $id_act = $data['ach']->act_id;
            // echo '<pre>';
            // print_r($id_act);
            // echo '</pre>';
            if(isset($id_act)){
                $data['act'] = [];
                foreach($id_act as $value){
                    $data_act = $this->M_activity->get_activity($value);
                    array_push($data['act'], $data_act);
                }   
                $this->output('v_achievement_detail', $data);
            }else{
                $this->output('v_achievement_detail');
            }
                    
        }
    }
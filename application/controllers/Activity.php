<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Activity extends CI_Controller{
        function __construct()
        {
            parent :: __construct();
            $this->load->model('M_cluster');
            $this->load->model('M_achievement');
            $this->load->model('M_activity');

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
            $data['act'] = $this->M_activity->get_activity($_id);
            if($_id){
                $this->M_activity->delete_activity($_id);
            }
            redirect('Activity/show_list');
        }
        function pending_activity($id_act){
            session_start();
            $_SESSION['menu'] = 'achievement_detail';
            $this->M_activity->update_status_activity($id_act,0);
            $data['act'] = $this->M_activity->get_activity($id_act);
            $data['ach'] = $this->M_achievement->get_achievement($data['act']->ach_id);
    
            // echo '</pre>';
            if(isset($data['ach']->act_id)){
                $id_act = $data['ach']->act_id;
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
        function success_activity($id_act){
            session_start();
            $_SESSION['menu'] = 'achievement_detail';
            $id_clu = "6241c0bd3a6f6448ed2cd4e6";
            $this->M_activity->update_status_activity($id_act,1);
            $data['clu'] = $this->M_cluster->get_cluster($id_clu);
            $data['act'] = $this->M_activity->get_activity($id_act);
            $data['ach'] = $this->M_achievement->get_achievement($data['act']->ach_id);
            $total_point = $data['clu'] -> clu_point + $data['act'] -> act_point;
            $this->M_cluster->update_point_cluster($id_clu,$total_point);

            // echo '</pre>';
            if(isset($data['ach']->act_id)){
                $id_act = $data['ach']->act_id;
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
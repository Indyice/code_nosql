<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Achievement extends CI_Controller{
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

        public function get_act_by_id($id_ach){
            session_start();
            $_SESSION['menu'] = 'achievement_detail';
            // $id_ach = "623a2bfaa5470000e30078c5";
            $data['ach'] = $this->M_achievement->get_achievement($id_ach);
            
            
            // echo '<pre>';
            // print_r($id_act);
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

        function pending_achievement($id_ach){
            if($id_ach){
                $this->M_achievement->update_status_achievement($id_ach,0);
            }
            redirect('Achievement/show_list');
            
        }
        function success_achievement($id_ach){
            session_start();
            $_SESSION['menu'] = 'achievement_show_list';
            $id_clu = "6241c0bd3a6f6448ed2cd4e6";
            $data['clu'] = $this->M_cluster->get_cluster($id_clu);
            $data['ach'] = $this->M_achievement->get_achievement($id_ach);
            
            if(isset($data['ach']->act_id)){
                $check_status = 0;
                $id_act = $data['ach']->act_id;
                $data['act'] = [];
                foreach($id_act as $value){
                    $data_act = $this->M_activity->get_activity($value);
                    array_push($data['act'], $data_act);
                    if($data_act->act_status==1){
                        $check_status++;
                    }
                    // print_r($check_status);
         
                }
                $total = count((array)$data['act']);
                // print_r($total);
                
                if($check_status == $total){
                    $this->M_achievement->update_status_achievement($id_ach,1);
                    $total_point = $data['clu'] -> clu_point + $data['ach'] -> ach_point;
                    $this->M_cluster->update_point_cluster($id_clu,$total_point);
                }                 
                redirect('Achievement/show_list');
            }else{
                redirect('Achievement/show_list');
            }

  
                
 
            
            
        }

    }
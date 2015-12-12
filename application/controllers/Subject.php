<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();

        if (is_not_logged_in()) {
            redirect('login');
            exit;
        }

        $this->load->model('subject_model');

        $this->data['header'] = "Firstmark School Management System";
        $this->data['title'] = "Dashboard";
        $this->data['username'] = $this->session->userdata('username');
        $this->data['userlevel'] = $this->session->userdata('userlevel');

        $this->session->set_flashdata('curr_menu_item', 'academics');
    }

    public function index() {

        $this->_subjectList();

        $this->form_validation->set_rules('subject_name', 'Subject Name', 'required', array('required' => 'You must provide a {field}'));
        $this->form_validation->set_rules('subject_code', 'Subject Code', 'required', array('required' => 'You must provide a {field}'));

        $this->form_validation->set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');

        if ($this->form_validation->run() === FALSE) {
            $this->_manage_subject_view();
        } else {

            if (null != $this->subject_model->insertSubject()) :
                $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'One Subject added succesfully!');
                redirect(current_url());

            else:
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Adding new subject failed!');
            endif;
        }
    }

    public function edit($subjectId) {
        $subject = json_encode($this->subject_model->getSubject($subjectId));
        echo $subject;
    }

    public function update() {
        if ($this->subject_model->updateSubject()) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg', 'One Subject updated succesfully!');
            redirect('subject');
        }
    }

    public function delete($subject_id) {
        if ($this->subject_model->deleteSubject($subject_id)) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg', 'One Subject deleted succesfully!');
            redirect('subject');
        }
    }
      
    //PRIVATE FUNCTIONS
   private function _subjectList() {
      $this->data['subject_list'] = $this->subject_model->getSubject();
   }   
  
   private function _manage_subject_view(){
      $this ->load->view ('templates/header', $this ->data);
      $this ->load->view('templates/offcanvas-left',$this ->data);
      $this->load->view('admin/view_manage_subject',$this ->data);
      $this ->load->view ('templates/navigation', $this ->data);
      $this ->load->view ('templates/offcanvas-right', $this ->data);
      $this ->load->view ('templates/footer');
  }
  
}
   
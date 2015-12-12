<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Teacher extends CI_Controller {

     public function __construct () {
        parent::__construct();

        //CHECKING LOGGED IN OR NOT
        if ( is_not_logged_in() ) {
           redirect('login');
           exit;
        }
        //LOADING MODELS
        $this -> load -> model('teacher_model');
        $this -> load -> model('documents_model');

        $this -> data['header'] = "Firstmark School Management System";
        $this -> data['title'] = "Teacher";

        $this -> session -> set_flashdata('curr_menu_item', 'teacher');
     }

     //VIEW ALL TEACHER
     public function index () {
        $this -> data['teacher_list'] = $this -> teacher_model -> getTeacher();

        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/teacher/view_all_teacher', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     public function view ( $teacher_id = NULL ) {

        if ( $teacher_id === NULL ) {
           $this -> index();
           return;
        }

        $this -> data['teacher']= $this -> teacher_model -> getTeacher($teacher_id);
        $this -> data['documents'] = $this -> documents_model -> getDocuments($this -> data['teacher'] -> reg_id);
        $this -> _view_single_teacher();
     }

     public function edit ( $teacher_id ) {
        $this -> data['active_tab'] = 'teacher';
        $this -> data['teacher'] = $this -> teacher_model -> getTeacher($teacher_id);
        $this -> _edit_teacher_form();
     }

     public function update () {
        if ( $this -> teacher_model -> updateTeacher() ) {
           if ( $this -> input -> post('hidden_action') == 'editDocument' ) {
              $this -> session -> set_userdata('reg_id', $this ->input-> post('teacher_id'));
              $this -> session -> set_userdata('referer', 'teacher');
              redirect('documents/edit');
           } else {
              $this -> session -> set_flashdata('status', 'success');
              $this -> session -> set_flashdata('msg', 'Teacher Information saved succesfully!');
              redirect('teacher/edit'.'/'.str_pad($this ->input-> post('teacher_id'), 4, '0', STR_PAD_LEFT));
           }
        }
     }

     public function delete ( $teacher_id ) {
        if ( $this -> teacher_model -> deleteTeacher($teacher_id) ) {
           $this -> session -> set_flashdata('status', 'success');
           $this -> session -> set_flashdata('msg', 'One Student deleted succesfully!');
           redirect('teacher');
        }
     }

     public function add () {
        $this -> data['active_tab'] = 'teacher';
        $this -> data['new_reg_no'] = $this -> teacher_model -> nextRegNo();

        $this -> form_validation -> set_rules('entry_date', 'Entry Date', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('first_name', 'First Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('last_name', 'Last Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('gender', 'Gender', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('d_o_b', 'Date of Birth', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('phone', 'Phone Number', 'required|numeric', array( 'required' => '{field} cannot be left blank.', 'numeric' => '{field} must only have numbers.' ));
        $this -> form_validation -> set_rules('alt_phone', 'Alternate Phone Number', 'numeric', array( 'numeric' => '{field} must only have numbers.' ));
        $this -> form_validation -> set_rules('email', 'Email Address', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('address', 'Address', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('teacher_depart_id', 'Department', 'required', array( 'required' => 'You must select a {field}' ));
        $this -> form_validation -> set_rules('teacher_position', 'Position', 'required', array( 'required' => 'You must select a {field}' ));
        $this -> form_validation -> set_rules('blood_group', 'Blood Group', 'required', array( 'required' => 'You must select a {field}' ));
        $this -> form_validation -> set_rules('qualification', 'Qualification', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('experience', 'Experience', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('experience_details', 'Experience Details', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('marital_status', 'Marital Status', 'required', array( 'required' => 'You must select a {field}' ));
        $this -> form_validation -> set_rules('father_name', 'Father Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('mother_name', 'Mother Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('nationality', 'Nationality', 'required', array( 'required' => 'You must select a {field}' ));
        $this -> form_validation -> set_rules('image_name', 'Photo', 'callback_file_selected', array( 'required' => 'You must provide a {field}' ));

        $this -> form_validation -> set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');

        if ( $this -> form_validation -> run() === FALSE ) {

           $this -> _add_teacher_form();
        } else {

           if ( null != $this -> teacher_model -> insertTeacher() ) :
              $this -> session -> set_userdata('reg_id', $this -> data['new_reg_no']);
              $this -> session -> set_userdata('referer', 'teacher');
              redirect('documents/add');

           else :
              $this -> session -> set_flashdata('status', 'danger');
              $this -> session -> set_flashdata('msg', 'Error While Adding Teacher');
              redirect('teacher/add');
           endif;
        }
     }

     //FUNCTIONS RENDERS ADD TEACHER FORM
     private function _add_teacher_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/teacher/view_add_teacher', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     private function _edit_teacher_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/teacher/view_edit_teacher', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }
     
     private function _view_single_teacher () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/teacher/view_single_teacher', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     // HELPER FUNCTIONS
     public function file_selected () {
        $this -> form_validation -> set_message('file_selected', 'Please upload an Image.');
        if ( empty($_FILES['image_name']['name']) ) {
           return false;
        } else {
           return true;
        }
     }

  }
  
<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Student extends CI_Controller {

     protected $data = array();

     public function __construct () {
        parent::__construct();

        if ( is_not_logged_in() ) {
           redirect('login');
           exit;
        }
        //LOADING MODELS
        $this -> load -> model('student_model');
        $this -> load -> model('class_model');
        $this -> load -> model('section_model');
        $this -> load -> model('parents_model');
        $this -> load -> model('documents_model');

        $this -> data['header'] = "Firstmark School Management System";
        $this -> data['title'] = "Dashboard";

        $this -> session -> set_flashdata('curr_menu_item', 'student');
        $this -> data['class_list'] = $this -> class_model -> getClass();
        $this -> data['section_list'] = $this -> section_model -> getSection();
     }

     public function index () {

        $this -> data['student_list'] = $this -> student_model -> getStudent();

        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/student/view_all_students', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     public function add () {

        
        
        $this -> data['active_tab'] = 'student';
        $this -> data['new_reg_no'] = $this -> student_model -> nextRegNo();

        $this -> form_validation -> set_rules('admission_date', 'Admission Date', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('first_name', 'First Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('last_name', 'Last Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('d_o_b', 'Date of Birth', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('blood_group', 'Blood Group', 'required', array( 'required' => 'You must select a {field}.' ));
        $this -> form_validation -> set_rules('gender', 'Gender', 'required', array( 'required' => 'You must select a {field}.' ));
        $this -> form_validation -> set_rules('class_id', 'Class', 'required', array( 'required' => 'You must select a {field}.' ));
        $this -> form_validation -> set_rules('section_id', 'Section', 'required', array( 'required' => 'You must select a {field}.' ));
        $this -> form_validation -> set_rules('roll_no', 'Roll No.', 'required|numeric', array( 'required' => '{field} cannot be left blank.', 'numeric' => '{field} must only have numbers.' ));
        $this -> form_validation -> set_rules('phone', 'Phone Number', 'required|numeric', array( 'required' => '{field} cannot be left blank.', 'numeric' => '{field} must only have numbers.' ));
        $this -> form_validation -> set_rules('alt_phone', 'Alternate Phone Number', 'numeric', array('numeric' => '{field} must only have numbers.' ));
        $this -> form_validation -> set_rules('email', 'Email Address', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('address', 'Address', 'required', array( 'required' => '{field} cannot be left blank.' ));
        $this -> form_validation -> set_rules('image_name', 'Photo', 'callback_file_selected', array( 'required' => 'You must provide a {field}.' ));

        $this -> form_validation -> set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');

        if ( $this -> form_validation -> run() === FALSE ) {
           $this -> _add_student_form();
        } else {

           if ( null != $this -> student_model -> insertStudent() ) :
              $this -> session -> set_userdata('reg_id', $this -> data['new_reg_no']);
              redirect('parent/add');

           else :
              $this -> session -> set_flashdata('status', 'danger');
              $this -> session -> set_flashdata('msg', 'Error While Adding Student');
              redirect('student/add');
           endif;
        }
     }

     public function edit ( $student_id ) {
        $this -> data['active_tab'] = 'student';
        $this -> data['student'] = $this -> student_model -> getStudent($student_id);
        $this -> _edit_student_form();
     }

     public function view ( $student_id = NULL ) {

        if ( $student_id === NULL ) {
           $this -> index();
           return;
        }
        $this -> data['student'] = $this -> student_model -> getStudent($student_id);
        $this -> data['parent'] = $this -> parents_model -> getParent($this -> data['student'] -> parent_id);
        $this -> data['documents'] = $this -> documents_model -> getDocuments($this -> data['student'] -> reg_id);
        $this -> _view_single_student();
     }

     public function update () {
        if ( $this -> student_model -> updateStudent() ) {
           if ( $this -> input -> post('hidden_action') == 'editParent' ) {
              $this -> session -> set_userdata('reg_id', $this ->input-> post('student_id'));
              redirect('parent/edit');
           } else {
              $this -> session -> set_flashdata('status', 'success');
              $this -> session -> set_flashdata('msg', 'Student Information saved succesfully!');
              redirect('student/edit'.'/'.str_pad($this ->input-> post('student_id'), 4, '0', STR_PAD_LEFT));
           }
        }
     }

     public function delete ( $student_id ) {
        if ( $this -> student_model -> deleteStudent($student_id) ) {
           $this -> session -> set_flashdata('status', 'success');
           $this -> session -> set_flashdata('msg', 'One Student deleted succesfully!');
           redirect('student/view');
        }
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

     //PRIVATE FUNCTIONS
     //FUNCTIONS RENDERS ADD STUDENT FORM
     private function _add_student_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/student/view_add_student', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     private function _view_single_student () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/student/view_single_student', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     private function _edit_student_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/student/view_edit_student', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

  }
  
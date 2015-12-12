<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Parents extends CI_Controller {

     public function __construct () {
        parent::__construct();

        if ( is_not_logged_in() OR NULL === $this -> session -> userdata('reg_id') ) {
           redirect('login');
           exit;
        }

        $this -> load -> model('parents_model');
        $this -> load -> model('student_model');

        $this -> data['header'] = "Firstmark School Management System";
        $this -> data['title'] = "Dashboard";
        $this -> data['username'] = $this -> session -> userdata('username');
        $this -> data['userlevel'] = $this -> session -> userdata('userlevel');

        $this -> session -> set_flashdata('curr_menu_item', 'student');
     }

     public function add () {

        $this -> data['active_tab'] = 'parent';

        if ( $this -> input -> post('existing_parent') ) {
           $this -> _insertParents($this -> input -> post('existing_parent'));
        } else {
           $this -> form_validation -> set_rules('father_name', 'Father\'s Name', 'required', array( 'required' => '{field} cannot be left blank.' ));
           if ( !$this -> input -> post('student_contact') ) {
              $this -> form_validation -> set_rules('phone', 'Phone Number', 'required|numeric', array( 'required' => '{field} cannot be left blank.', 'numeric' => '{field} must only have numbers.' ));
              $this -> form_validation -> set_rules('email', 'Email Address', 'required', array( 'required' => '{field} cannot be left blank.' ));
              $this -> form_validation -> set_rules('address', 'Address', 'required', array( 'required' => '{field} cannot be left blank.' ));
           }

           $this -> form_validation -> set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');

           if ( $this -> form_validation -> run() === FALSE ) {
              $this -> _add_parent_form();
           } else {
              $this -> _insertParents();
           }
        }
     }

     public function search () {
        $result = json_encode($this -> parents_model -> searchParent());
        echo $result;
     }

     public function edit () {
        $this -> data['student'] = $this -> student_model -> getStudent($this -> session -> userdata('reg_id'));
        $this -> data['active_tab'] = 'parent';
        $this -> data['parent'] = $this -> parents_model -> getParent($this -> data['student'] -> parent_id);

        $this -> _edit_parent_form();
     }

     public function update () {
        if ( $this -> input -> post('existing_parent') ) {
           if ( null != $this -> parents_model -> insertParents($this -> input -> post('existing_parent')) ) {
              $this ->  _redirect_afer_Update();
           }
        } else {

           if ( $this -> parents_model -> updateParent() ) {
              $this ->  _redirect_afer_Update();
           }
        }
     }

     public function create () {
        $this -> add();
     }

     //
     ////PRIVATE FUNCTIONS
     //FUNCTIONS RENDERS ADD PARENT FORM
     private function _add_parent_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/parents/view_add_parent', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     private function _edit_parent_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/parents/view_edit_parent', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

     private function _insertParents ( $parent_id = NULL ) {
        if ( null != $this -> parents_model -> insertParents($parent_id) ) :
           $this -> session -> set_userdata('referer', 'student');
           redirect('documents/add');
        else :
           $this -> session -> set_flashdata('status', 'danger');
           $this -> session -> set_flashdata('msg', 'Error While Adding Parents');
           redirect('parent/add');
        endif;
     }

     private function _redirect_afer_Update () {
        if ( $this -> input -> post('hidden_action') == 'editDocuments' ) {
           $this -> session -> set_userdata('referer', 'student');
           redirect('documents/edit');
        } else {
           $this -> session -> set_flashdata('status', 'success');
           $this -> session -> set_flashdata('msg', 'Parent Information updated succesfully!');
           redirect('parent/edit');
        }
     }

  }
  
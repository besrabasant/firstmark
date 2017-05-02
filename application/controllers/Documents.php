<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Documents extends CI_Controller {

     public function __construct () {
        parent::__construct();

        if ( is_not_logged_in() OR NULL === $this -> session -> userdata('referer') ) {
           redirect('login');
           exit;
        }


        $this -> load -> model('documents_model');
        $this -> load -> model('student_model');
        $this -> load -> model('teacher_model');

        $this -> data['header'] = "Firstmark School Management System";
        $this -> data['title'] = "Dashboard";
        $this -> data['username'] = $this -> session -> userdata('username');
        $this -> data['userlevel'] = $this -> session -> userdata('userlevel');
        $this -> session -> set_flashdata('curr_menu_item', $this -> session -> userdata('referer'));
     }

     public function add () {
        $this -> data['active_tab'] = 'document';

        if ( empty($_FILES) ) {
           $this -> _add_document_form();
        } else {
           if ( null != $this -> documents_model -> insertDocuments() ) :
              $url=$this -> session -> userdata('referer');
              $this -> session -> unset_userdata('reg_id');
              $this -> session -> unset_userdata('referer');
              redirect($url.'/view/'.explode('/',$this ->input->post('reg_no'))[3]);
           else :
              $this -> session -> set_flashdata('status', 'danger');
              $this -> session -> set_flashdata('msg', 'Error While Uploading Documents');
              redirect('documents/add');
           endif;
        }
     }
     
     public function edit () {
        $this -> data['active_tab'] = 'document';
        if($this -> session -> userdata('referer')=='student'){
           $this -> data['user'] = $this -> student_model -> getStudent($this -> session -> userdata('reg_id'));
        }
        if($this -> session -> userdata('referer')=='teacher'){
           $this -> data['user'] = $this -> teacher_model -> getTeacher($this -> session -> userdata('reg_id'));
        }
        $this -> data['documents'] = $this -> documents_model -> getDocuments($this -> data['user']->reg_id);
        $this -> _edit_document_form();
     }
     
     public function delete ($documentId=NULL){
        if(NULL != $this->documents_model->deleteDocument($documentId)){
            $this -> session -> set_flashdata('status', 'success');
            $this -> session -> set_flashdata('msg', 'Document Deleted Successfully');
        } else {
           $this -> session -> set_flashdata('status', 'danger');
           $this -> session -> set_flashdata('msg', 'Error While Deleting Documents');
        }
        redirect('documents/edit');
     }
     
     public function update () {
        
        if ( !empty($_FILES) ){
           $this -> documents_model -> insertDocuments();
        }
        if(NULL != $this -> documents_model -> updateDocuments()){
           $this -> session -> set_flashdata('status', 'success');
           $this -> session -> set_flashdata('msg', 'Documents Updated Successfully');
        }
        if ( $this -> input -> post('hidden_action') == 'viewTeacher' ){
           $url=$this -> session -> userdata('referer');
           $this -> session -> unset_userdata('reg_id');
           $this -> session -> unset_userdata('referer');
           $this -> session -> set_flashdata('msg', 'Student Updated Successfully');
           redirect($url.'/view/'.explode('/',$this ->input->post('reg_no'))[3]);
        } else {
           redirect('documents/edit');
        }
        
     }
     

     //PRIVATE FUNCTIONS
     //
    //FUNCTIONS RENDERS ADD DOCUMENT FORM
     private function _add_document_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/document/view_add_document', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }
     
     private function _edit_document_form () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('admin/document/view_edit_document', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

  }
  
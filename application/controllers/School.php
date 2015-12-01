<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class School extends CI_Controller {
   
   protected $data = array();
   
   public function __construct () {
     parent::__construct();
     
     if(null==$this ->session->userdata('id')){
       redirect('login');
       exit;
     }
     
      $this->load->model('school_model');
     
      $this -> data['header']="Firstmark School Management System";
      $this -> data['title'] = "Dashboard";
      $this -> data['username'] = $this ->session->userdata('username');
      $this -> data['userlevel'] = $this ->session->userdata('userlevel');
     
      $this ->session->set_flashdata('curr_menu_item','school');
   }
   
   
      public function manage_class() {

         $this -> _classList();

         $this->form_validation->set_rules('class_name', 'Class Name', 'required',array('required' => 'You must provide a {field}'));    
         $this->form_validation->set_rules('room_no', 'Room Number', 'required',array('required' => 'You must provide a {field}'));

         $this->form_validation->set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');

         if ($this->form_validation->run() === FALSE)
         {
             $this ->  _manage_class_view();
         } else {

           if( null != $this->school_model->insertClass() ) :
             $this->session->set_flashdata('status','success');
             $this->session->set_flashdata('msg', 'One Class added succesfully!');
             redirect(current_url());

           else:
             $this->session->set_flashdata('status','danger');
             $this->session->set_flashdata('msg','Adding new class failed!');
           endif;
         }
      }
      
      
      public function edit_class( $classId ) {
        $class = json_encode($this ->school_model->getClass($classId));
        echo $class;
      }
      
      public function update_class() {
        if($this ->school_model->updateClass()){
          $this->session->set_flashdata('status','success');
          $this->session->set_flashdata('msg', 'One Class updated succesfully!');
          redirect('school/manage_class');
        }
        
      }
      
      public function delete_class($class_id) {
         if($this ->school_model->deleteClass($class_id)){
          $this->session->set_flashdata('status','success');
          $this->session->set_flashdata('msg', 'One Class deleted succesfully!');
          redirect('school/manage_class');
         }
      }
      
      
      
    //PRIVATE FUNCTIONS
   private function _classList() {
      $this->data['class_list'] = $this->school_model->getClass();
   }
   
  
   private function _manage_class_view(){
      $this ->load->view ('templates/header', $this ->data);
      $this ->load->view('templates/offcanvas-left',$this ->data);
      $this->load->view('admin/view_manage_class',$this ->data);
      $this ->load->view ('templates/navigation', $this ->data);
      $this ->load->view ('templates/offcanvas-right', $this ->data);
      $this ->load->view ('templates/footer');
  }
 
  
  
}
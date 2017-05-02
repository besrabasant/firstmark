<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

 class Section extends CI_Controller {
   
   protected $data = array();
   
   public function __construct () {
     parent::__construct();
     
     if( is_not_logged_in()){
       redirect('login');
       exit;
     }

      $this->load->model('section_model');
     
      $this -> data['header']="Firstmark School Management System";
      $this -> data['title'] = "Dashboard";
      $this -> data['username'] = $this ->session->userdata('username');
      $this -> data['userlevel'] = $this ->session->userdata('userlevel');
     
      $this ->session->set_flashdata('curr_menu_item','school');
   }
   public function index() {

         $this -> _sectionList();
         
         $this->form_validation->set_rules('section_name', 'Section Name', 'required',array('required' => 'You must provide a {field}'));
         
         $this->form_validation->set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');

         if ($this->form_validation->run() === FALSE)
         {
             $this ->  _manage_section_view();
         } else {

           if( null != $this->section_model->insertSection() ) :
             $this->session->set_flashdata('status','success');
             $this->session->set_flashdata('msg', 'One Section added succesfully!');
             redirect(current_url());

           else:
             $this->session->set_flashdata('status','danger');
             $this->session->set_flashdata('msg','Adding new section failed!');
           endif;
         }
      }
      
      public function edit($sectionId) {
        $section = json_encode($this ->section_model->getSection($sectionId));
        echo $section;
      }
            
      public function update() {
        if($this ->section_model->updateSection()){
          $this->session->set_flashdata('status','success');
          $this->session->set_flashdata('msg', 'One Section updated succesfully!');
          redirect('section');
        }
        
      }
      
      public function delete($section_id) {
         if($this ->section_model->deleteSection($section_id)){
          $this->session->set_flashdata('status','success');
          $this->session->set_flashdata('msg', 'One Section deleted succesfully!');
          redirect('section');
         }
      }       
      
    //PRIVATE FUNCTIONS
   private function _sectionList() {
      $this->data['section_list'] = $this->section_model->getSection();
   }   
  
   private function _manage_section_view(){
      $this ->load->view ('templates/header', $this ->data);
      $this ->load->view('templates/offcanvas-left',$this ->data);
      $this->load->view('admin/view_manage_section',$this ->data);
      $this ->load->view ('templates/navigation', $this ->data);
      $this ->load->view ('templates/offcanvas-right', $this ->data);
      $this ->load->view ('templates/footer');
  }
  
}

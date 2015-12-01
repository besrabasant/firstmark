<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Parent extends CI_Controller {
   
   protected $data = array();
   
   public function __construct () {
     parent::__construct();
     
     if(null==$this ->session->userdata('id')){
       redirect('login');
       exit;
     }
     
      $this->load->model('parent_model');  
     
      $this -> data['header']="Firstmark School Management System";
      $this -> data['title'] = "Dashboard";
      $this -> data['username'] = $this ->session->userdata('username');
      $this -> data['userlevel'] = $this ->session->userdata('userlevel');
     
      $this ->session->set_flashdata('curr_menu_item','parent');
   }
   
   
   public function index() {
      $this ->load->view ('templates/header', $this ->data);
      $this ->load->view('templates/offcanvas-left',$this ->data);
      $this->load->view('admin/view_all_students',$this ->data);
      $this ->load->view ('templates/navigation', $this ->data);
      $this ->load->view ('templates/offcanvas-right', $this ->data);
      $this ->load->view ('templates/footer');
  }
  
  public function add() {
        
    $this->form_validation->set_rules('first_name', 'First Name', 'required',array('required' => 'You must provide a {field}'));    
    $this->form_validation->set_rules('last_name', 'Last Name', 'required',array('required' => 'You must provide a {field}'));
    $this->form_validation->set_rules('gender', 'Gender', 'required',array('required' => 'You must provide a {field}'));
    $this->form_validation->set_rules('d_o_b', 'Date of Birth', 'required',array('required' => 'You must provide the {field}'));
    $this->form_validation->set_rules('blood_group', 'Blood Group', 'required',array('required' => 'You must select a {field}'));
    $this->form_validation->set_rules('phone', 'Phone Number', 'required',array('required' => 'You must provide a {field}'));
    $this->form_validation->set_rules('email', 'Email Address', 'required',array('required' => 'You must provide an {field}'));
    $this->form_validation->set_rules('address', 'Address', 'required',array('required' => 'You must provide an {field}'));
    $this->form_validation->set_rules('father_name', 'Father Name' , 'required',array('required' => 'You must provide {field}'));
    $this->form_validation->set_rules('mother_name', 'Mother Name', 'required',array('required' => 'You must provide {field}'));
    $this->form_validation->set_rules('religion', 'Religion', 'required',array('required' => 'You must select a {field}'));
    $this->form_validation->set_rules('class_id', 'Class', 'required',array('required' => 'You must select a {field}'));
    $this->form_validation->set_rules('section_id', 'Section', 'required',array('required' => 'You must select a {field}'));
    $this->form_validation->set_rules('transport_id', 'Transport', 'required',array('required' => 'You must select a {field}'));
    $this->form_validation->set_rules('dormitory_id', 'Dormitory', 'required',array('required' => 'You must select a {field}'));
    $this->form_validation->set_rules('image_name', 'Photo', 'callback_file_selected',array('required' => 'You must provide a {field}'));
    
    $this->form_validation->set_error_delimiters('<span class="help-block" style="color:#f00; opacity:1;">*&nbsp;', '</span>');
    
      if ($this->form_validation->run() === FALSE)
      {
         $this->_add_student_form();
      } else {
             
          if( null != $this->student_model->insertStudent() ) :         

              $this->session->set_flashdata('msg', '<div class="alert alert-success fade in" role="alert">'
              . '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'
              . '<strong>One</strong> student added succesfully!.</div>');
              redirect(current_url());

          else :
              $this->session->set_flashdata('msg', $this->student_model->isCreated());
          endif;
      }
  }
  
  public function view (){
    $this ->  index();
  }
  
  
  // HELPER FUNCTIONS
  
  public function file_selected(){
    $this->form_validation->set_message('file_selected', 'You must provide an Image.');
    if (empty($_FILES['image_name']['name'])) {
            return false;
        }else{
            return true;
        }
    }
  
  
  //PRIVATE FUNCTIONS
  
  //FUNCTIONS RENDERS ADD STUDENT FORM
  private function _add_student_form(){
      $this ->load->view ('templates/header', $this ->data);
      $this ->load->view('templates/offcanvas-left',$this ->data);
      $this->load->view('admin/view_add_student',$this ->data);
      $this ->load->view ('templates/navigation', $this ->data);
      $this ->load->view ('templates/offcanvas-right', $this ->data);
      $this ->load->view ('templates/footer');
  }
  
  
  
}
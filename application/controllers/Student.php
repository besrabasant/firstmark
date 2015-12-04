<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Student extends CI_Controller {
   
   protected $data = array();
   
   public function __construct () {
     parent::__construct();
     
     if(  is_not_logged_in()){
       redirect('login');
       exit;
     }
     //LOADING MODELS
      $this->load->model('student_model');
      $this->load->model('school_model');
     
      $this -> data['header']="Firstmark School Management System";
      $this -> data['title'] = "Dashboard";
      $this -> data['username'] = $this ->session->userdata('username');
      $this -> data['userlevel'] = $this ->session->userdata('userlevel');
     
      $this ->session->set_flashdata('curr_menu_item','student');
   }
   
   
   public function index() {
     
     $this ->data['student_list']=$this ->student_model->getStudent();
     $this ->data['class_list'] = $this->school_model->getClass();
     
      $this ->load->view ('templates/header', $this ->data);
      $this ->load->view('templates/offcanvas-left',$this ->data);
      $this->load->view('admin/view_all_students',$this ->data);
      $this ->load->view ('templates/navigation', $this ->data);
      $this ->load->view ('templates/offcanvas-right', $this ->data);
      $this ->load->view ('templates/footer');
  }
  
  public function add() {
    
    $this ->data['class_list'] = $this->school_model->getClass();
        
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
              . '<a href="#" class=" pull-right btn ink-reaction btn-icon-toggle btn-primary close" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a>'
              . '<strong>One</strong> student added succesfully!.</div>');
              redirect(current_url());

          else :
              $this->session->set_flashdata('msg', $this->student_model->insertStudent());
          endif;
      }
  }
  
  public function view ($student_id=NULL){
    
    if($student_id===NULL){
      $this ->  index();
      return;
    }
    
    
    $student = json_encode($this->student_model->getStudent($student_id));
    echo $student;
  }
  
  public function update() {
    if($this ->student_model->updateStudent()){
      $this->session->set_flashdata('status','success');
      $this->session->set_flashdata('msg', 'One Student updated succesfully!');
      redirect('student/view');
    }

  }
  
    public function delete($student_id){
        if($this ->student_model->deleteStudent($student_id)){
          $this->session->set_flashdata('status','success');
          $this->session->set_flashdata('msg', 'One Student deleted succesfully!');
          redirect('student/view');
         }
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
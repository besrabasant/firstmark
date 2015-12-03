<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Login extends CI_Controller {
   
   protected $data=array();
   
   public function __construct () {
     parent::__construct();
     
     $this->load->model('login_model');
     
     $this->data['title']="Firstmark Admin System";
     $this->data['header'] = "FIRSTMARK SCHOOL LOGIN";
     
   }
   
   
   public function index() {
     
     // CHECK IF USER IS LOGGED IN - SEND HIM TO DASHBOARD;
     if(  is_logged_in() ){
        redirect('dashboard');
        exit;
     }
     
     $this->form_validation->set_rules('username', 'Username', 'required',array('required' => 'You must provide a {field}'));
     $this->form_validation->set_rules('password', 'Password', 'required',array('required' => 'You must provide a {field}'));
     
     $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
     
     if ($this->form_validation->run() === FALSE)
      {
          
          $this ->load->view ('login/view_login',  $this ->data);
      }
      else
      {
          if($this->login_model->isValidUser()){
            
            if(null!=$this ->session->userdata('id')){
              redirect('dashboard');
              exit;   // if valid redirect to Dashboard
            }
            redirect('login');
             exit;
          } else {
            $this->data['error'] = "Please provide valid login details.";
            $this ->load->view ('login/view_login',$this->data);               // if not valid redirect to login
          }
          
      }
  }
  
  public function logout(){
    $this ->session->sess_destroy();
    redirect('dashboard');
    exit;
  }
   
 }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Dashboard extends CI_Controller {
   
   protected $data = array();
   
   public function __construct () {
     parent::__construct();
     
     if(null==$this ->session->userdata('id')){
       redirect('login');
       exit;
     }
     
      $this->data['header']="Firstmark School Management System";
      $this->data['title'] = "Dashboard";
      $this->data['username'] = $this ->session->userdata('username');
      $this->data['userlevel'] = $this ->session->userdata('userlevel');
     
     
     $this ->session->set_flashdata('curr_menu_item','dashboard');
   }


   public function index () {
      $this ->load->view ('templates/header', $this->data);
      $this ->load->view('templates/offcanvas-left',$this->data);
      $this->load->view('admin/view_dashboard',$this->data);
      $this ->load->view ('templates/navigation', $this->data);
      $this ->load->view ('templates/offcanvas-right', $this->data);
      $this ->load->view ('templates/footer');
         
  }

 }
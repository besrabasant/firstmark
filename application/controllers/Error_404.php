<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Error_404 extends CI_Controller {

     public function __construct () {
        parent::__construct();

        if ( is_not_logged_in() ) {
           redirect('login');
           exit;
        }

        $this -> data['header'] = "Firstmark School Management System";
        $this -> data['title'] = "Dashboard";
        $this -> data['username'] = $this -> session -> userdata('username');
        $this -> data['userlevel'] = $this -> session -> userdata('userlevel');
     }

     public function index () {
        $this -> load -> view('templates/header', $this -> data);
        $this -> load -> view('templates/offcanvas-left', $this -> data);
        $this -> load -> view('errors/error_404', $this -> data);
        $this -> load -> view('templates/navigation', $this -> data);
        $this -> load -> view('templates/offcanvas-right', $this -> data);
        $this -> load -> view('templates/footer');
     }

  }
  
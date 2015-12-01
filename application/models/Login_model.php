<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Login_model extends CI_Model {
   
   public function __construct () {
     parent::__construct();
   }
   
   public function isValidUser() {   //Checking if user is valid.
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
      
      $result = $this->db->get_where('users',array('username'=>$username, 'password'=>$password),1);
      
      if($result->num_rows()==1){
        $this ->session->set_userdata(array(
          'id' => $result->row()->id,
          'username' => $result->row()->username,
          'userlevel' => $result->row()->user_level,
        ));        
        return true;
      }
      return false;
   }
   
}

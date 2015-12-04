<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('is_logged_in')){
  
  function is_logged_in(){
    
    $ci = get_instance();
    
    if(null!=$ci ->session->userdata('id')){
      return TRUE;
    } else {
      return FALSE;
    }
    
  }
}

if(!function_exists('is_not_logged_in')){
  
  function is_not_logged_in(){
    
    $ci = get_instance();
    
    if(null==$ci ->session->userdata('id')){
      return TRUE;
    } else {
      return FALSE;
    }
    
  }
}

if(!function_exists('insert_Login_Credentials')){
  
  function insert_Login_Credentials(){
    
    $ci = get_instance();
    
    if(null==$ci ->session->userdata('id')){
      return TRUE;
    } else {
      return FALSE;
    }
    
  }
}


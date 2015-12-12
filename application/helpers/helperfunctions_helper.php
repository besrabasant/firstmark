<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('is_logged_in')){
  
  function is_logged_in(){
    
    $ci = get_instance();
    
    if(null!=$ci ->session->userdata('user_id')){
      return TRUE;
    } else {
      return FALSE;
    }
    
  }
}

if(!function_exists('is_not_logged_in')){
  
  function is_not_logged_in(){
    
    $ci = get_instance();
    
    if(null==$ci ->session->userdata('user_id')){
      return TRUE;
    } else {
      return FALSE;
    }
    
  }
}

if(!function_exists('insert_Login_Credentials')){
  
  function insert_Login_Credentials($user_id,$password,$userlevel,$id){
    
    $ci = get_instance();
    
    $data = array(
          'username' => $user_id,
          'password' => md5( $ci->config->item('salt').$password.$ci->config->item('salt2') ),
          'user_level' => $userlevel,
          'user_id' => $id,
       );
    
    $result = $ci->db->insert('users',$data);
    return $result;
    
  }
}

if(!function_exists('is_curr_user_role')){
  
  function is_curr_user_role($user_role){
    
    $ci = get_instance();
    
    $user= FALSE;
    
    switch($user_role){
      case 'admin' : $user = ($ci ->session->userdata('user_level')=='1')? TRUE:FALSE; break;
      case 'teacher' : $user = ($ci ->session->userdata('user_level')=='2')? TRUE:FALSE; break;
      case 'student' : $user = ($ci ->session->userdata('user_level')=='3')? TRUE:FALSE; break;
      case 'parent' : $user = ($ci ->session->userdata('user_level')=='4')? TRUE:FALSE; break;
    }
    return $user;
    
  }
}

if(!function_exists('generate_Password')){
  
  function generate_Password(){
    
    $ci = get_instance();
    return random_string('alnum', 10);
    
  }
}

if(!function_exists('generate_loginId')){
  
  function generate_loginId(){
    
    $ci = get_instance();
    return random_string('alpha', 10);
    
  }
}


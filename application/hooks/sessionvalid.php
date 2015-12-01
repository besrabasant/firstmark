<?php defined('BASEPATH') OR exit('No direct script access allowed');

  /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('id');
    if (isset($user)) { 
      redirect(current_url());
      } else {
    redirect('login'); }
}
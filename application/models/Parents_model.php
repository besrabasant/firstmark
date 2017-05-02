<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Parents_model extends CI_Model {

     private $tableName = 'parent', $userlevel = 4;

     public function __construct () {
        parent::__construct();
     }

     public function insertParents ( $parent_id = NULL ) {

        if ( $parent_id != NUll ) {
           $query = $this -> db -> update('student', array( 'parent_id' => $parent_id ), array( 'reg_id' => $this -> input -> post('reg_no') ));
           return $query;
        }

        $student;
        if ( $this -> input -> post('student_contact') ) {
           $query = $this -> db -> select('phone, alt_phone, email, address')
           -> where('reg_id', $this -> input -> post('reg_no'))
           -> get('student');
           $student = $query -> row();
        }
        $login_id = $this -> _nextParentId();
        $password = generate_Password();

        $data = array(
           'login_id' => $login_id,
           'father_name' => $this -> input -> post('father_name'),
           'father_occp' => $this -> input -> post('father_occp'),
           'father_d_o_b' => $this -> input -> post('father_d_o_b'),
           'mother_name' => $this -> input -> post('mother_name'),
           'mother_occp' => $this -> input -> post('mother_occp'),
           'mother_d_o_b' => $this -> input -> post('mother_d_o_b'),
           'gaurdian_name' => $this -> input -> post('gaurdian_name'),
           'gaurdian_rel' => $this -> input -> post('gaurdian_rel'),
           'gaurdian_occp' => $this -> input -> post('gaurdian_occp'),
           'phone' => ($student -> phone != NULL) ? $student -> phone : $this -> input -> post('phone'),
           'alt_phone' => ($student -> alt_phone != NULL) ? $student -> alt_phone : $this -> input -> post('alt_phone'),
           'ofc1_phone' => $this -> input -> post('ofc1_phone'),
           'ofc2_phone' => $this -> input -> post('ofc2_phone'),
           'email' => ($student -> email != NULL) ? $student -> email : $this -> input -> post('email'),
           'alt_email' => $this -> input -> post('alt_email'),
           'address' => ($student -> address != NULL) ? $student -> address : $this -> input -> post('address'),
           'alt_address' => $this -> input -> post('alt_address'),
           'password' => $password,
        );

        $result = $this -> db -> insert($this -> tableName, $data);
        if ( $this -> db -> update('student', array( 'parent_id' => $this -> db -> insert_id() ), array( 'reg_id' => $this -> input -> post('reg_no') )) ) {
           if ( insert_Login_Credentials($login_id, $password, $this -> userlevel, $this -> db -> insert_id()) ) {
              return $result;
           }
        }
     }
     
     public function updateParent () {
      
        $data = array(
           'father_name' => $this -> input -> post('father_name'),
           'father_occp' => $this -> input -> post('father_occp'),
           'father_d_o_b' => $this -> input -> post('father_d_o_b'),
           'mother_name' => $this -> input -> post('mother_name'),
           'mother_occp' => $this -> input -> post('mother_occp'),
           'mother_d_o_b' => $this -> input -> post('mother_d_o_b'),
           'gaurdian_name' => $this -> input -> post('gaurdian_name'),
           'gaurdian_rel' => $this -> input -> post('gaurdian_rel'),
           'gaurdian_occp' => $this -> input -> post('gaurdian_occp'),
           'phone' => $this -> input -> post('phone'),
           'alt_phone' => $this -> input -> post('alt_phone'),
           'ofc1_phone' => $this -> input -> post('ofc1_phone'),
           'ofc2_phone' => $this -> input -> post('ofc2_phone'),
           'email' => $this -> input -> post('email'),
           'alt_email' => $this -> input -> post('alt_email'),
           'address' => $this -> input -> post('address'),
           'alt_address' => $this -> input -> post('alt_address'),
        );
      $this -> db -> where('parent_id', $this -> input -> post('parent_id'));
      $result = $this -> db -> update($this -> tableName, $data);
      return $result;
    }

     public function searchParent () {
        $search_param = ($this -> input -> post('search_param') != NULL) ? $this -> input -> post('search_param') : 'default';
        $search_value = $this -> input -> post('search_value');

        switch ( $search_param ) {
           case 'student':
              $query = $this -> db -> select('student.reg_id,parent.*')
              -> from('parent')
              -> join('student', 'student.parent_id=parent.parent_id')
              -> where('student.reg_id', $search_value)
              -> get();
              return $query -> result();
              break;
           case 'email':
              $query = $this -> db -> select('student.reg_id,parent.*')
              -> from('parent')
              -> join('student', 'student.parent_id=parent.parent_id')
              -> where('parent.email', $search_value)
              -> or_where('parent.alt_email', $search_value)
              -> get();
              return $query -> result();
              break;
           case 'phone':
              $query = $this -> db -> select('student.reg_id,parent.*')
              -> from('parent')
              -> join('student', 'student.parent_id=parent.parent_id')
              -> where('parent.phone', $search_value)
              -> or_where('parent.alt_phone', $search_value)
              -> or_where('parent.ofc1_phone', $search_value)
              -> or_where('parent.ofc2_phone', $search_value)
              -> get();
              return $query -> result();
              break;
           case 'default':
              $query = $this -> db -> select('student.reg_id,parent.*')
              -> from('parent')
              -> join('student', 'student.parent_id=parent.parent_id')
              -> get();
              return $query -> result();
              break;
        }
     }

     public function getParent ( $id = NULL ) {
        if ( $id === NULL ) {
           $query = $this -> db -> get($this -> tableName);
           return $query -> result();
        }

        $query = $this -> db -> get_where($this -> tableName, array( 'parent_id' => $id ));
        return $query -> row();
     }

     public function isEdited ( $id ) {
        
     }

     public function isDeleted ( $id ) {
        $result = $this -> db -> get_where($this -> tableName, array( 'student_id' => $id ));

        if ( $result -> num_rows() == 1 ) {
           unlink("./uploads/student/photo/" . $result -> row() -> image_name);
           $this -> db -> delete($this -> tableName, array( 'student_id' => $id ));
           return $this -> db -> affected_rows();
        }
     }

     public function getStudent () {
        $query = $this -> db -> get($this -> tableName);
        return $query -> result();
     }

     private function _nextParentId () {
        $reg_year = date('Y');
        $this -> db -> select_max('parent_id', 'max_id');
        $query = $this -> db -> get($this -> tableName);
        $row = $query -> row();
        $max_id = ($row -> max_id == NULL) ? 1 : $row -> max_id + 1;
        $reg_no = str_pad($max_id, 4, '0', STR_PAD_LEFT);
        $reg_id = "FMS/PR/" . $reg_year . "/" . $reg_no;
        return $reg_id;
     }

  }
  
<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Teacher_model extends CI_Model {

     private $tableName = 'teacher', $config, $userlevel = 2;

     public function __construct () {
        parent::__construct();

        $this -> config['upload_path'] = './uploads/teacher/photo';
        $this -> config['allowed_types'] = 'gif|jpg|png';
        $this -> config['max_size'] = '1024';
        $this -> config['encrypt_name'] = true;
        $this -> load -> library('upload', $this -> config);
     }

     public function insertTeacher () {

        /// UPLOADING IMAGE
        if ( !$this -> upload -> do_upload('image_name') ) {
           $error = array( 'error' => $this -> upload -> display_errors() );
           return $error;
        } else {
           $image_data = $this -> upload -> data('file_name');
           $reg_id = $this -> input -> post('reg_no');
           $password = generate_Password();

           $data = array(
              'reg_id' => $reg_id,
              'entry_date' => $this -> input -> post('entry_date'),
              'first_name' => $this -> input -> post('first_name'),
              'middle_name' => $this -> input -> post('middle_name'),
              'last_name' => $this -> input -> post('last_name'),
              'gender' => $this -> input -> post('gender'),
              'd_o_b' => $this -> input -> post('d_o_b'),
              'birth_place' => $this -> input -> post('birth_place'),
              'address' => $this -> input -> post('address'),
              'phone' => $this -> input -> post('phone'),
              'alt_phone' => $this -> input -> post('alt_phone'),
              'email' => $this -> input -> post('email'),
              'department_id' => $this -> input -> post('teacher_depart_id'),
              'position' => $this -> input -> post('teacher_position'),
              'blood_group' => $this -> input -> post('blood_group'),
              'qualification' => $this -> input -> post('qualification'),
              'experience' => $this -> input -> post('experience'),
              'experience_details' => $this -> input -> post('experience_details'),
              'marital_status' => $this -> input -> post('marital_status'),
              'children_count' => $this -> input -> post('children_count'),
              'father_name' => $this -> input -> post('father_name'),
              'mother_name' => $this -> input -> post('mother_name'),
              'spouse_name' => $this -> input -> post('spouse_name'),
              'nationality' => $this -> input -> post('nationality'),
              'religion' => $this -> input -> post('religion'),
              'image_name' => $image_data,
              'password' => $password,
           );

           $result = $this -> db -> insert($this -> tableName, $data);
           if ( insert_Login_Credentials($reg_id, $password, $this -> userlevel, $this -> db -> insert_id()) ) {
              return $result;
           }
        }
     }

     public function updateTeacher () {

        $teacher_id = $this -> input -> post('teacher_id');
        $image_data = $this -> input -> post('prev_image_name');

        if ( $this -> upload -> do_upload('image_name') ) {
           $image_data = $this -> upload -> data('file_name');
           unlink("./uploads/teacher/photo/" . $this -> input -> post('prev_image_name'));
        }

        $data = array(
           'first_name' => $this -> input -> post('first_name'),
           'middle_name' => $this -> input -> post('middle_name'),
           'last_name' => $this -> input -> post('last_name'),
           'gender' => $this -> input -> post('gender'),
           'd_o_b' => $this -> input -> post('d_o_b'),
           'address' => $this -> input -> post('address'),
           'phone' => $this -> input -> post('phone'),
           'alt_phone' => $this -> input -> post('alt_phone'),
           'email' => $this -> input -> post('email'),
           'department_id' => $this -> input -> post('teacher_depart_id'),
           'position' => $this -> input -> post('teacher_position'),
           'blood_group' => $this -> input -> post('blood_group'),
           'qualification' => $this -> input -> post('qualification'),
           'experience' => $this -> input -> post('experience'),
           'experience_details' => $this -> input -> post('experience_details'),
           'marital_status' => $this -> input -> post('marital_status'),
           'children_count' => $this -> input -> post('children_count'),
           'father_name' => $this -> input -> post('father_name'),
           'mother_name' => $this -> input -> post('mother_name'),
           'spouse_name' => $this -> input -> post('spouse_name'),
           'nationality' => $this -> input -> post('nationality'),
           'religion' => $this -> input -> post('religion'),
           'image_name' => $image_data,
        );
        $this -> db -> where('teacher_id', $teacher_id);
        $result = $this -> db -> update($this -> tableName, $data);
        return $result;
     }

     public function deleteTeacher ( $id ) {
        $this -> db -> set('status', '0');
        $this -> db -> where('teacher_id', $id);
        return $this -> db -> update($this -> tableName);
     }

     public function getTeacher ( $id = NULL ) {
        if ( $id === NULL ) {
           $this -> db -> where('status', '1');
           $query = $this -> db -> get($this -> tableName);
           return $query -> result();
        }

        $query = $this -> db -> get_where($this -> tableName, array( 'teacher_id' => $id ));
        return $query -> row();
     }

     public function nextRegNo () {
        $reg_year = date('Y');
        $this -> db -> select_max('teacher_id', 'max_id');
        $query = $this -> db -> get($this -> tableName);
        $row = $query -> row();
        $max_id = ($row -> max_id == NULL) ? 1 : $row -> max_id + 1;
        $reg_no = str_pad($max_id, 4, '0', STR_PAD_LEFT);
        ;
        $reg_id = "FMS/TR/" . $reg_year . "/" . $reg_no;
        return $reg_id;
     }

  }
  
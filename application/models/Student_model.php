<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Student_model extends CI_Model {

    private $tableName = 'student', $config, $userlevel = 3;

    public function __construct () {
      parent::__construct();
      $this -> config['upload_path'] = './uploads/student/photo';
      $this -> config['allowed_types'] = 'gif|jpg|png';
      $this -> config['max_size'] = '1024';
      $this -> config['encrypt_name'] = true;
      $this -> load -> library('upload', $this -> config);
    }

    public function insertStudent () {

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
          'admission_date' => $this -> input -> post('admission_date'),
          'first_name' => $this -> input -> post('first_name'),
          'middle_name' => $this -> input -> post('middle_name'),
          'last_name' => $this -> input -> post('last_name'),
          'gender' => $this -> input -> post('gender'),
          'd_o_b' => $this -> input -> post('d_o_b'),
          'birth_place' => $this -> input -> post('birth_place'),
          'blood_group' => $this -> input -> post('blood_group'),
          'religion' => $this -> input -> post('religion'),
          'nationality' => $this -> input -> post('nationality'),
          'class_id' => $this -> input -> post('class_id'),
          'section_id' => $this -> input -> post('section_id'),
          'roll_no' => $this -> input -> post('roll_no'),
          'transport_id' => $this -> input -> post('transport_id'),
          'dormitory_id' => $this -> input -> post('dormitory_id'),
          'phone' => $this -> input -> post('phone'),
          'alt_phone' => $this -> input -> post('alt_phone'),
          'email' => $this -> input -> post('email'),
          'address' => $this -> input -> post('address'),
          'image_name' => $image_data,
          'password' => $password,
        );

        $result = $this -> db -> insert($this -> tableName, $data);
        if ( insert_Login_Credentials($reg_id, $password, $this -> userlevel, $this->db->insert_id() ) ) {
          return $result;
        }
      }
    }

    public function updateStudent () {
      $student_id = $this -> input -> post('student_id');
      $image_data = $this -> input -> post('prev_image_name');


      if ( $this -> upload -> do_upload('image_name') ) {
        $image_data = $this -> upload -> data('file_name');
        unlink("./uploads/student/photo/" . $this -> input -> post('prev_image_name'));
      }


      $data = array(
        'first_name' => $this -> input -> post('first_name'),
        'middle_name' => $this -> input -> post('middle_name'),
        'last_name' => $this -> input -> post('last_name'),
        'gender' => $this -> input -> post('gender'),
        'd_o_b' => $this -> input -> post('d_o_b'),
        'birth_place' => $this -> input -> post('birth_place'),
        'blood_group' => $this -> input -> post('blood_group'),
        'religion' => $this -> input -> post('religion'),
        'nationality' => $this -> input -> post('nationality'),
        'class_id' => $this -> input -> post('class_id'),
        'section_id' => $this -> input -> post('section_id'),
        'roll_no' => $this -> input -> post('roll_no'),
        'transport_id' => $this -> input -> post('transport_id'),
        'dormitory_id' => $this -> input -> post('dormitory_id'),
        'phone' => $this -> input -> post('phone'),
        'alt_phone' => $this -> input -> post('alt_phone'),
        'email' => $this -> input -> post('email'),
        'address' => $this -> input -> post('address'),
        'image_name' => $image_data,
      );
      $this -> db -> where('student_id', $student_id);
      $result = $this -> db -> update($this -> tableName, $data);
      return $result;
    }

    public function deleteStudent ( $id ) {
      $this -> db -> set('status', '0');
      $this -> db -> where('student_id', $id);
      return $this -> db -> update($this -> tableName);
    }

    public function getStudent ( $id = NULL ) {
      if ( $id === NULL ) {
        $this -> db -> where('status', '1');
        $query = $this -> db -> get($this -> tableName);
        return $query -> result();
      }

      $query = $this -> db -> get_where($this -> tableName, array( 'student_id' => $id ));
      return $query -> row();
    }

    public function nextRegNo () {
      $reg_year = date('Y');
      $this -> db -> select_max('student_id', 'max_id');
      $query = $this -> db -> get($this -> tableName);
      $row = $query -> row();
      $max_id = ($row -> max_id == NULL) ? 1 : $row -> max_id + 1;
      $reg_no = str_pad($max_id, 4, '0', STR_PAD_LEFT);
      $reg_id = "FMS/ST/" . $reg_year . "/" . $reg_no;
      return $reg_id;
    }

    //private functions
  }
  
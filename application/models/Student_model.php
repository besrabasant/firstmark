<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Student_model extends CI_Model {
     
     private  $tableName = 'student',$config;
     
     public function __construct () {
       parent::__construct();
        $this->config['upload_path'] = './uploads/student/photo';
        $this->config['allowed_types'] = 'gif|jpg|png';
        $this->config['max_size']	= '1024';
        $this->config['encrypt_name'] = true;
        $this->load->library('upload', $this->config);
     }
   
   
     public function insertStudent(){
       
      /// UPLOADING IMAGE
      if ( ! $this->upload->do_upload('image_name')){		
        $error = array('error' => $this->upload->display_errors());
        return $error;
      }
      else{		
        $image_data = $this->upload->data('file_name');
        
        $data = array(
          'first_name' => $this->input->post('first_name'),
          'middle_name' => $this->input->post('middle_name'),
          'last_name' => $this->input->post('last_name'),
          'gender' => $this->input->post('gender'),
          'd_o_b' => mdate('%Y-%m-%d',strtotime($this->input->post('d_o_b'))),
          'blood_group' => $this->input->post('blood_group'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'address' => $this->input->post('address'),
          'religion' => $this->input->post('religion'),
          'class_id' => $this->input->post('class_id'),
          'section_id' => $this->input->post('section_id'),
          'transport_id' => $this->input->post('transport_id'),
          'dormitory_id' =>  $this->input->post('dormitory_id'),
          'image_name' => $image_data,
       );

        $result = $this->db->insert($this->tableName,$data); 
        return $result;
      }      
     }

     public function updateStudent(){
       $student_id = $this->input->post('student_id');
       $image_data= $this->input->post('prev_image_name');
       
       
        if ( $this->upload->do_upload('image_name')){		
          $image_data = $this->upload->data('file_name');
          unlink("./uploads/student/photo/".$this->input->post('prev_image_name'));
        }
      
       
       $data = array(
          'first_name' => $this->input->post('first_name'),
          'middle_name' => $this->input->post('middle_name'),
          'last_name' => $this->input->post('last_name'),
          'gender' => $this->input->post('gender'),
          'd_o_b' => mdate('%Y-%m-%d',strtotime($this->input->post('d_o_b'))),
          'blood_group' => $this->input->post('blood_group'),
          'phone' => $this->input->post('phone'),
          'email' => $this->input->post('email'),
          'address' => $this->input->post('address'),
          'religion' => $this->input->post('religion'),
          'class_id' => $this->input->post('class_id'),
          'section_id' => $this->input->post('section_id'),
          'transport_id' => $this->input->post('transport_id'),
          'dormitory_id' =>  $this->input->post('dormitory_id'),
          'image_name' => $image_data,
       );
       $this->db->where('student_id', $student_id);
       $result = $this->db->update($this->tableName, $data);
       return $result;
       

     }

     public function deleteStudent($id){
        $this->db->set('status', '0');
        $this->db->where('student_id', $id);
        return $this->db->update($this->tableName);
     }



     public function getStudent( $id=NULL){
       if($id===NULL){
         $this->db->where('status','1');
         $query = $this->db->get($this->tableName);
         return $query->result();
       }

       $query = $this->db->get_where($this->tableName,array('student_id' => $id));
       return $query->result();

     }
   
 }


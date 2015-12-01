<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Student_model extends CI_Model {
     
     private  $tableName = 'student';
     
     public function __construct () {
     parent::__construct();
   }
   
   
   public function insertStudent(){         
    $config['upload_path'] = './uploads/student/photo';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024';
    $config['encrypt_name'] = true;

		$this->load->library('upload', $config);
    
    /// UPLOADING IMAGE
		if ( ! $this->upload->do_upload('image_name')){		
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}
		else{		
			$image_data = array('upload_data' => $this->upload->data());
      //$d_o_b = str_replace('/', '-', $this->input->post('d_o_b'));
                        
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
        'image_name' => $image_data['upload_data']['file_name'],
     );
      
      $result = $this->db->insert($this->tableName,$data); 
      return $result;
		}      
   }
    
   public function getStudentByID($id){       
       
       
   }
   
   public function isEdited($id){
       
   }
   
   public function isDeleted($id){
       $result = $this->db->get_where($this->tableName,array('student_id'=>$id));
       
       if($result->num_rows()==1){
           unlink("./uploads/student/photo/".$result->row()->image_name);
           $this->db->delete($this->tableName, array('student_id' => $id)); 
           return $this->db->affected_rows();
       }
      
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


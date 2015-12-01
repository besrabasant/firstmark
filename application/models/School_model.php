<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class School_model extends CI_Model {
     
     private  $tableName = 'class';
     
   public function __construct () {
     parent::__construct();
   }
   
   public function insertClass(){
     
     $data = array(
        'class_name' => $this->input->post('class_name'),
        'room_no' => $this->input->post('room_no'),
     );
     
     $result = $this->db->insert('class',$data); 
     return $result;
     
     
   }
   
   public function getClass( $id=NULL ) {
     
     if($id===NULL){
        $query = $this->db->get('class');
        return $query->result();
       
     }
     $query = $this->db->get_where('class',array('class_id' => $id));
     return $query->result();
      
   }
   
   public function updateClass() {
     $class_id = $this->input->post('class_id');
     
     $data = array(
        'class_name' => $this->input->post('class_name'),
        'room_no' => $this->input->post('room_no'),
     );
     
     $this->db->where('class_id', $class_id);
     $result = $this->db->update('class', $data);
     return $result;
   }
   
   public function deleteClass($id){
     return $this->db->delete('class', array('class_id' => $id));
   }
  
 }


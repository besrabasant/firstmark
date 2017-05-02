<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

    private $tableName = 'subject';

    public function __construct() {
        parent::__construct();
    }
    
    public function insertSubject() {

        $data = array(
            'subject_name' => $this->input->post('subject_name'),
            'subject_code' => $this->input->post('subject_code'),
        );

        $result = $this->db->insert('subject', $data);
        return $result;
    }
    
    public function getSubject($id = NULL) {

        if ($id === NULL) {
            $query = $this->db->get('subject');
            return $query->result();
        }
        $query = $this->db->get_where('subject', array('subject_id' => $id));
        return $query->row();
    }
    
    public function updateSubject() {
        $subject_id = $this->input->post('subject_id');

        $data = array(
            'subject_name' => $this->input->post('subject_name'),
            'subject_code' => $this->input->post('subject_code'),
        );

        $this->db->where('subject_id', $subject_id);
        $result = $this->db->update('subject', $data);
        return $result;
    }
   
    public function deleteSubject($id) {
        return $this->db->delete('subject', array('subject_id' => $id));
    }
    
}

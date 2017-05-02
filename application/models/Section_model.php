<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model {

    private $tableName = 'section';

    public function __construct() {
        parent::__construct();
    }
    
    public function insertSection() {

        $data = array(
            'section_name' => $this->input->post('section_name'),
        );

        $result = $this->db->insert('section', $data);
        return $result;
    }
    
    public function getSection($id = NULL) {

        if ($id === NULL) {
            $query = $this->db->get('section');
            return $query->result();
        }
        $query = $this->db->get_where('section', array('section_id' => $id));
        return $query->row();
    }
    
    public function updateSection() {
        $section_id = $this->input->post('section_id');

        $data = array(
            'section_name' => $this->input->post('section_name'),
        );

        $this->db->where('section_id', $section_id);
        $result = $this->db->update('section', $data);
        return $result;
    }
   
    public function deleteSection($id) {
        return $this->db->delete('section', array('section_id' => $id));
    }
    
}

<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Documents_model extends CI_Model {

     private $tableName = 'documents', $config;

     public function __construct () {
        parent::__construct();

        $this -> config['upload_path'] = './uploads/' . $this -> session -> userdata('referer') . '/documents';
        $this -> config['allowed_types'] = 'gif|jpg|png';
        $this -> config['max_size'] = '5120';
        $this -> config['encrypt_name'] = true;
        $this -> load -> library('upload', $this -> config);
     }

     public function insertDocuments () {
        $files = $_FILES;
        print_r($files);
        $num_of_docs = count($_FILES['document_file']['name']);
        $document_names = $this -> input -> post('document_name[]');
        $reg_no = $this -> input -> post('reg_no');

        for ( $i = 0; $i < $num_of_docs; $i++ ) {
           echo $_FILES['files']['name'] = $files['document_file']['name'][$i];
           echo $_FILES['files']['type'] = $files['document_file']['type'][$i];
           echo $_FILES['files']['tmp_name'] = $files['document_file']['tmp_name'][$i];
           echo $_FILES['files']['error'] = $files['document_file']['error'][$i];
           echo $_FILES['files']['size'] = $files['document_file']['size'][$i];

           if ( !$this -> upload -> do_upload('files') ) {
              $error = array( 'error' => $this -> upload -> display_errors() );
              return $error;
           } else {
              $image_data = $this -> upload -> data('file_name');
              $data = array(
                 'document_name' => $document_names[$i],
                 'file_name' => $image_data,
                 'related_to' => $reg_no,
              );
              $result = $this -> db -> insert($this -> tableName, $data);
           }
        }
        return $result;
     }

     public function getDocuments ( $id = NULL ) {
        if ( $id === NULL ) {
           $query = $this -> db -> get($this -> tableName);
           return $query -> result();
        }

        $query = $this -> db -> get_where($this -> tableName, array( 'related_to' => $id ));
        return $query -> result();
     }

     public function updateDocuments () {
        $document_id = $this -> input -> post('document_id[]');
        $document_names = $this -> input -> post('prev_document_name[]');
        foreach ( $document_id as $i => $id ) {
           $data = array(
              'document_name' => $document_names[$i],
           );
           $this -> db -> where('document_id', $id);
           $result = $this -> db -> update($this -> tableName, $data);
        }
        return $result;
     }

     public function deleteDocument ( $id ) {
        if ( $id == NULL ) {
           return NULL;
        }

        $query = $this -> db -> get_where($this -> tableName, array( 'document_id' => $id ));
        unlink($this -> config['upload_path'] . '/' . $query -> row() -> file_name);
        $result = $this -> db -> delete($this -> tableName, array( 'document_id' => $query -> row() -> document_id ));
        return $result;
     }

  }
  
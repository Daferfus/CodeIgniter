<?php

class Catalogo_model extends CI_Model {
    function __construct( ) {
        parent::__construct();
        $this->load->database();
    }
    public function getAllRecords() {
        $sql = 'SELECT * FROM productos';
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getRecordById($id) {
        $this->db->where('id',$id);
        $producto = $this->db->get('productos');
        return $producto->row();
    }
}
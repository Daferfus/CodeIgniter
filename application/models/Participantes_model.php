<?php

class Participantes_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function countAllRecords() {
        $query = $this->db->query("SELECT COUNT(*) as cant FROM `participantes`");
        return $query->result()[0]->cant;
    }

    public function getRecordsByPage($desde, $cant) {
        $sql = "SELECT * FROM participantes ORDER BY Apellidos LIMIT $desde, $cant";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
}

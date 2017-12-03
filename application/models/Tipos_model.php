<?php
/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 26/11/2017
 * Time: 13:14
 */

class Tipos_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function get_tipos(){
        $this->db->order_by('tipo_descripcion');
        $query = $this->db->get('tipos');
        return $query->result_array();
    }

    public function create_tipo(){
        $data = array(
            'tipo_descripcion' => $this->input->post('nombre')
        );
        return $this->db->insert('tipos', $data);
    }

    public function delete_tipo($tipo_id){
        $this->db->where('tipo_id', $tipo_id);
        $this->db->delete('tipos');
        return true;
    }

    public function get_tipo($evento_tipo){
        $query = $this->db->get_where('tipos', array('tipo_id' => $evento_tipo));
        return $query->row();
    }
}
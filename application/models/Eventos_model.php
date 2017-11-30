<?php

/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 12/11/2017
 * Time: 22:27
 */
class Eventos_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    public function get_eventos($evento_id = FALSE, $limit = FALSE, $offset = FALSE){

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($evento_id === FALSE){
            $this->db->order_by("str_to_date(evento_fecha, '%Y-%c-%d')");
            $where = 'evento_fecha > date("'.date("Y-m-d").'")';
            $query = $this->db->get_where('eventos', $where);
            return $query->result_array();
        }

        $query = $this->db->get_where('eventos', array('evento_id' => $evento_id));
        return $query->row_array();
    }

    public function get_resultados($evento_id = FALSE, $limit = FALSE, $offset = FALSE){

        if($limit){
            $this->db->limit($limit, $offset);
        }

        if($evento_id === FALSE){
            $this->db->order_by("str_to_date(evento_fecha, '%Y-%c-%d')");
            $where = 'evento_fecha <= date("'.date("Y-m-d").'")';
            $query = $this->db->get_where('eventos', $where);
            return $query->result_array();
        }

        $query = $this->db->get_where('eventos', array('evento_id' => $evento_id));
        return $query->row_array();
    }

    public function create_evento($evento_cartel, $evento_reglamento){

        $data = array(
            'evento_tipo' => $this->input->post('tipo'),
            'evento_cartel' => $evento_cartel,
            'evento_fecha' => $this->input->post('fecha'),
            'evento_hora' => $this->input->post('hora'),
            'evento_descripcion' => $this->input->post('titulo'),
            'evento_poblacion' => $this->input->post('poblacion'),
            'evento_provincia' => $this->input->post('provincia'),
            'evento_organizador' => $this->input->post('organizador'),
            'evento_reglamento' => $evento_reglamento,
            'evento_distancia' => $this->input->post('distancia'),
            'evento_salida' => $this->input->post('salida'),
            'evento_meta' => $this->input->post('meta'),
            'evento_activa' => $this->input->post('activa'),
        );

        return $this->db->insert('eventos',$data);
    }

    public function delete_evento($evento_id){
        $this->db->where('evento_id', $evento_id);
        $this->db->delete('eventos');
        return true;
    }

    public function update_evento($evento_cartel, $evento_reglamento){
        $data = array(
            'evento_tipo' => $this->input->post('tipo'),
            'evento_cartel' => $evento_cartel,
            'evento_fecha' => $this->input->post('fecha'),
            'evento_hora' => $this->input->post('hora'),
            'evento_descripcion' => $this->input->post('titulo'),
            'evento_poblacion' => $this->input->post('poblacion'),
            'evento_provincia' => $this->input->post('provincia'),
            'evento_organizador' => $this->input->post('organizador'),
            'evento_reglamento' => $evento_reglamento,
            'evento_distancia' => $this->input->post('distancia'),
            'evento_salida' => $this->input->post('salida'),
            'evento_meta' => $this->input->post('meta'),
            'evento_activa' => $this->input->post('activa'),
        );
        print_r($data);
        $this->db->where('evento_id', $this->input->post('id'));
        return $this->db->update('eventos',$data);
    }

    public function get_tipos(){
        $this->db->order_by('tipo_descripcion');
        $query = $this->db->get('tipos');
        return $query->result_array();
    }

    public function get_eventos_by_tipo($evento_tipo, $limit = FALSE, $offset = FALSE){
        if($limit){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('eventos.evento_id', 'DESC');
        $this->db->join('tipos', 'tipos.tipo_id = eventos.evento_tipo');
        $query =  $this->db->get_where('eventos', array('evento_tipo' => $evento_tipo));
        return $query->result_array();
    }
}
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

        //Los datos son ordenados y recogidos por fecha en función de la fecha actual.
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

        //Se recogen y se ordenan los eventos anteriores a la fecha actual.
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

    public function inscripcion_participante($evento_id){
        $data = array(
            'participante_evento_id' => $evento_id,
            'participante_categoria' => $this->input->post('categoria'),
            'participante_nombre' => $this->input->post('nombre'),
            'participante_apellidos' => $this->input->post('apellidos'),
            'participante_nif' => $this->input->post('nif'),
            'paricipante_sexo' => $this->input->post('sexo'),
            'participante_poblacion' => $this->input->post('poblacion'),
            'participante_cp' => $this->input->post('cp'),
            'participante_pais' => $this->input->post('pais'),
            'participante_telefono' => $this->input->post('telefono'),
            'participante_email' => $this->input->post('email'),
            'participante_fechaNac' => $this->input->post('fechaNaci'),
            'participante_club' => $this->input->post('club'),
        );

        return $this->db->insert('participantes', $data);
    }

    public function sendMail($from1, $from2, $to, $subject, $message, $attach = null, $cc = null, $bcc = null){
        $config['protocol'] = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.live.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'david95999@hotmail.es';
        $config['smtp_pass']    = 'ThisIsTheNight1@';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = "html";

        $this->email->initialize($config);

        $this->email->clear(true);
        //From1 es el email que envia from2 es un alias del email
        $this->email->from($from1, $from2);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($attach!=null) $this->email->attach($attach);
        if ($cc!=null) $this->email->cc($cc);
        if ($bcc!=null) $this->email->bcc($bcc);
        if (!$this->email->send()){
            print_r($this->email);
            echo "ERROR EN EL ENVIO DEL MENSAJE";
        }
    }
}
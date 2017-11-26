<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_news($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('news');
            return $query->result_array();
        }
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news() {
        $this->load->helper('text');//Para emplear el convert_accented_characters (quitar acentos al slug)
        $this->load->helper('url');//Para generar el slug a partir del titulo
        //$this->input->post es como $_POST pero mas seguro para evitar inyeccion sql
        $titulo = $this->input->post('title');
        //El slug lo generaremos mediante un helper a partir del titulo
        $slug = convert_accented_characters(url_title($titulo, 'dash', true));
        $text = $this->input->post('text');
        $data = array(
            'title' => $titulo,
            'slug' => $slug,
            'text' => $text
        );
        $this->db->insert('news', $data);
    }

}

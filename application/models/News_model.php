<?php

class News_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($noticia_id = FALSE, $limit = FALSE, $offset = FALSE)
    {

        if ($limit) {
            $this->db->limit($limit, $offset);
        }

        if ($noticia_id === FALSE) {
            $this->db->order_by("str_to_date(noticia_fecha, '%Y-%c-%d')");
            $query = $this->db->get_where('noticias');
            return $query->result_array();
        }

        $query = $this->db->get_where('noticias', array('noticia_id' => $noticia_id));
        return $query->row_array();
    }

    public function set_news($noticia_imagen)
    {

        $data = array(
            'noticia_titulo' => $this->input->post('titulo'),
            'noticia_imagen' => $noticia_imagen,
            'noticia_fecha' => $this->input->post('fecha'),
            'noticia_texto' => $this->input->post('texto'),
        );

        return $this->db->insert('noticias', $data);
    }

    public function delete_news($noticia_id)
    {
        $this->db->where('noticia_id', $noticia_id);
        $this->db->delete('noticias');
        return true;
    }

    public function update_news($noticia_imagen)
    {
        $data = array(
            'noticia_titulo' => $this->input->post('titulo'),
            'noticia_imagen' => $noticia_imagen,
            'noticia_fecha' => $this->input->post('fecha'),
            'noticia_texto' => $this->input->post('texto'),
        );
        $this->db->where('noticia_id', $this->input->post('id'));
        return $this->db->update('noticias', $data);
    }
}

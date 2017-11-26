<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form', 'url');
    }

    function index() {
        $this->cargar_vista(array('error' => ''),'upload_form');
    }

    function do_upload() {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max-width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());     
            $this->cargar_vista('upload_form');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->cargar_vista($data,'upload_success');
        }
    }

    private function cargar_vista($datos, $vista = "") {
        $this->load->view('templates/header');
        $this->load->view("upload/$vista", $datos);
        $this->load->view("templates/footer");
    }

}

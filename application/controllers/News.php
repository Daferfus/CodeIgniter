<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index() {
        $data['news'] = $this->news_model->get_news();
        $data['titulo'] = "Noticias";
        $data['title'] = "Noticias";

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($slug = NULL) {
        $data['news_item'] = $this->news_model->get_news($slug);
        if (empty($data['news_item'])) {
            show_404();
        }
        $data['title'] = $data['news_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = "Creacion de noticia";
        $this->form_validation->set_rules('title', 'Titulo', 'required');
        $this->form_validation->set_rules('text', 'Texto', 'required');
        $this->load->view('templates/header', $data);
        if (!$this->form_validation->run()) {
            $this->load->view('news/create', $data);
        } else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
        $this->load->view('templates/footer', $data);
    }

}

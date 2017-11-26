<?php

class WebApp extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
       $this->loadView('home');
    }

    public function loadView($view) {
        $this->load->view('webapp/template/header.php');
        $this->load->view("webapp/$view");
        $this->load->view('webapp/template/footer.php');
    }
}
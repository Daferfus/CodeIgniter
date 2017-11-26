<?php

class Catalogo extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('catalogo_model');
        $this->load->library('cart');
        $this->load->library('session');
    }

    public function index() { 
        $datos['productos'] = $this->catalogo_model->getAllRecords();  
        $this->mostrarVista("catalogo",$datos);       
    }

    public function addCart($producto) {
        $cantidad = 1;
        $data = array(
            'id' => $producto->id,
            'qty' => $cantidad,
            'price' => $producto->precio,
            'name' => $producto->nombre,
            'coupon' => ''
        );
        $this->cart->insert($data);
    }

    public function agregarProducto($id) {        
        $producto = $this->catalogo_model->getRecordById($id);    
        $this->addCart($producto);    
        $this->session->set_flashdata('agregado','El producto fue agregado correctamente');
        redirect('catalogo', 'refresh');
    }
    public function displayCart() {
        return $this->cart->contents();
    }
    public function mostrarVista($vista, $datos) {
        $datos['titulo'] = 'Catalogo';
        $this->load->view('templates/header',$datos);
        $this->load->view("catalogo/$vista",$datos); 
        $this->load->view('templates/footer');
    }
}
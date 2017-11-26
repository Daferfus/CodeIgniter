<?php
/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 26/11/2017
 * Time: 13:00
 */

class Tipos extends CI_Controller
{
    public function index(){
        $data['titulo'] = 'Tipos';

        $data['tipos'] = $this->Tipos_model->get_tipos();

        $this->load->view('templates/header');
        $this->load->view('tipos/index', $data);
        $this->load->view('templates/footer');

    }
    public function create(){

        if(!$this->session->userdata(logged_in)){
            redirect('usuarios/login');
        }

        $data['titulo'] = "Crear Tipo";
        $this->form_validation->set_rules('nombre', 'nombre', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('tipos/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tipos_model->create_tipo();

            $this->session->set_flashdata('tipo_creado', 'El tipo de evento ha sido creado con éxito');

            redirect('tipos');
        }
    }

    public function eventos($evento_tipo){
        $data['titulo'] = $this->Tipos_model->get_tipo($evento_tipo)->tipo_descripcion;
        $data['eventos'] = $this->Eventos_model->get_eventos_by_tipo($evento_tipo);

        $this->load->view('templates/header');
        $this->load->view('eventos/index', $data);
        $this->load->view('templates/footer');
    }



}
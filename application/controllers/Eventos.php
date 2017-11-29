<?php

/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 12/11/2017
 * Time: 15:55
 */
class Eventos extends CI_Controller{
    public function index($offset = 0){

        $config['base_url'] = base_url() . "eventos/index";
        $config['total_rows'] = $this->db->count_all('eventos');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $data['titulo'] = 'Próximos Eventos';
        $data['eventos'] = $this->Eventos_model->get_eventos(FALSE, $config['per_page'], $offset);
        $this->load->view('templates/header');
        $this->load->view('eventos/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($evento_id = NULL){
        $data['evento'] = $this->Eventos_model->get_eventos($evento_id);
        if(empty($data['evento'])){
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('eventos/view', $data);
        $this->load->view('templates/footer');
    }

    public function create(){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $data['titulo'] = 'Crear Evento';

        $data['tipos'] = $this->Eventos_model->get_tipos();

        $this->form_validation->set_rules("titulo", "titulo", "required");
        $this->form_validation->set_rules("tipo", "tipo", "required");
        $this->form_validation->set_rules("activa", "activa", "required");

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('eventos/create', $data);
            $this->load->view('templates/footer');
        }else{
            //Configuración de la imágen subida.
            $config['upload_path'] = './assets/imagenes/eventos';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                $evento_cartel = 'donde-esta-la-imagen.jpg';
            }else{
                $data = array('upload_data' => $this->upload->data());
                $evento_cartel = $_FILES['userfile']['name'];
            }
            $this->Eventos_model->create_evento($evento_cartel);

            $this->session->set_flashdata('evento_creado', 'El evento ha sido creado');

            redirect('eventos');
        }
    }
    public function delete($evento_id){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $this->Eventos_model->delete_evento($evento_id);

        $this->session->set_flashdata('evento_eliminado', 'El evento ha sido eliminado');

        redirect('eventos');
    }

    public function edit($evento_id){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $data['evento'] = $this->Eventos_model->get_eventos($evento_id);
        $data['tipos'] = $this->Eventos_model->get_tipos();

        if(empty($data['evento'])){
            show_404();
        }

        $data['titulo'] = "Editar Evento";

        $this->load->view('templates/header');
        $this->load->view('eventos/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $this->Eventos_model->update_evento();

        $this->session->set_flashdata('evento_actualizado', 'El evento ha sido actualizado');

        redirect('eventos');
    }

    public function resultados($offset = 0){

        $config['base_url'] = base_url() . "eventos/resultados";
        $config['total_rows'] = $this->db->count_all('eventos');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $data['titulo'] = 'Resultados de los Eventos';
        $data['eventos'] = $this->Eventos_model->get_resultados(FALSE, $config['per_page'], $offset);
        $this->load->view('templates/header');
        $this->load->view('eventos/resultados', $data);
        $this->load->view('templates/footer');
    }
}
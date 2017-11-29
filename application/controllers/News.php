<?php

class News extends CI_Controller {

    public function index($offset = 0){

        $config['base_url'] = base_url() . "news/index";
        $config['total_rows'] = $this->db->count_all('noticias');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $data['titulo'] = 'Noticias';
        $data['noticias'] = $this->News_model->get_news(FALSE, $config['per_page'], $offset);
        $this->load->view('templates/header');
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($noticia_id = NULL){
        $data['noticia'] = $this->News_model->get_news($noticia_id);
        if(empty($data['noticia'])){
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create(){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $data['titulo'] = 'Crear Noticia';

        $this->form_validation->set_rules("titulo", "titulo", "required");
        $this->form_validation->set_rules("texto", "texto", "required");

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        }else{
            //Configuración de la imágen subida.
            $config['upload_path'] = './assets/imagenes/eventos';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '500';
            $config['max_height'] = '1000';

            $this->load->library('upload', $config);

            if($this->upload->do_upload()){
                $errors = array('error' => $this->upload-display_errors());
                $noticia_imagen = 'donde-esta-la-imagen.jpg';
            }else{
                $data = array('upload_data' => $this->upload->data());
                $noticia_imagen = $_FILES['userfile']['name'];
            }
            $this->News_model->set_news($noticia_imagen);

            $this->session->set_flashdata('noticia_creada', 'La noticia ha sido creada');

            redirect('noticias');
        }
    }
    public function delete($noticia_id){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $this->News_model->delete_news($noticia_id);

        $this->session->set_flashdata('noticia_eliminada', 'La noticia ha sido eliminada');

        redirect('noticias');
    }

    public function edit($noticia_id){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $data['noticia'] = $this->News_model->get_news($noticia_id);

        if(empty($data['noticia'])){
            show_404();
        }

        $data['titulo'] = "Editar Noticia";

        $this->load->view('templates/header');
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update(){

        if(!$this->session->userdata('logueado')){
            redirect('usuarios/login');
        }

        $this->Eventos_model->update_evento();

        $this->session->set_flashdata('noticia_actualizada', 'La noticia ha sido actualizada');

        redirect('noticias');
    }
}

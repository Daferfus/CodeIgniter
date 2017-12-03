<?php

/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 12/11/2017
 * Time: 15:55
 */
class Eventos extends CI_Controller{
    public function index($offset = 0){

        //Configurando la paginación de la sección Próximos Eventos.
        $config['base_url'] = base_url() . "eventos/index";
        $config['total_rows'] = $this->db->count_all('eventos');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        //Se inicializa la configuración.
        $this->pagination->initialize($config);

        //Se recoge el título y los datos de eventos que se mostrarán en Próximos Eventos.
        $data['titulo'] = 'Próximos Eventos';
        $data['eventos'] = $this->Eventos_model->get_eventos(FALSE, $config['per_page'], $offset);

        //Se procede a cargar los datos en la vista.
        $this->load->view('templates/header');
        $this->load->view('eventos/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($evento_id = NULL){

        //Se recogen los datos de un determinado evento a partir de su número de identificación.
        $data['evento'] = $this->Eventos_model->get_eventos($evento_id);
        if(empty($data['evento'])){
            show_404();
        }

        //Se cargan los datos recogidos en la vista de dicho evento.
        $this->load->view('templates/header');
        $this->load->view('eventos/view', $data);
        $this->load->view('templates/footer');
    }

    public function create(){

        //Se comprueba que el usuario logueado sea administrador u organizador. En caso de que no, lo redirecciona a la pantalla de logueo.
        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 3) {

            //Se pasa el titulo del formulario y los nombres de tipos a elegir al formulario.
            $data['titulo'] = 'Crear Evento';

            $data['tipos'] = $this->Eventos_model->get_tipos();

            $this->form_validation->set_rules("titulo", "titulo", "required");
            $this->form_validation->set_rules("tipo", "tipo", "required");
            $this->form_validation->set_rules("activa", "activa", "required");

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('eventos/create', $data);
                $this->load->view('templates/footer');
            } else {

                //Restricciones y caracteristicas por las que debe pasar la imágen subida.
                $config['upload_path'] = 'assets/imagenes/eventos';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                //Se carga la libreria y se inicializa la configuración.
                $this->load->library('upload');
                $this->upload->initialize($config);

                //En caso de que no se haya subido una imágen o haya habido un error con esta se mete una imágen por defecto.
                if (!$this->upload->do_upload('evento_cartel')) {
                    $errors = array('error' => $this->upload->display_errors());
                    print_r($errors);
                    $evento_cartel = 'donde-esta-la-imagen.jpg';
                } else {
                    //De lo contrario se pasa la imágen a una variable.
                    $data = array('upload_data' => $this->upload->data());
                    print_r($data);
                    $evento_cartel = $_FILES['evento_cartel']['name'];
                }


                //Restricciones y caracteristicas por las que debe pasar el documento subido.
                $config2['upload_path'] = 'assets/reglamentos/eventos';
                $config2['allowed_types'] = 'pdf';

                //Se inicializa la configuración. La libreria ya esta cargada por lo que el volverla a cargar es inecesario.
                $this->upload->initialize($config2);

                //En caso de que no se haya subido un documento o haya habido un error con este se mete al campo NULL.
                if (!$this->upload->do_upload('evento_reglamento')) {
                    $errors = array('error' => $this->upload->display_errors());
                    print_r($errors);
                    $evento_reglamento = NULL;
                } else {
                    //De lo contrario se pasa el documento a una variable.
                    $data = array('upload_data' => $this->upload->data());
                    print_r($data);
                    $evento_reglamento = $_FILES['evento_reglamento']['name'];
                }

                //Se pasa la imágen y el documento al modelo para su inserción en la base de datos.
                $this->Eventos_model->create_evento($evento_cartel, $evento_reglamento);

                //Se muestra un mensaje en el caso de que la cosa haya ido bien y se redirecciona a Próximos Eventos.

                $this->session->set_flashdata('evento_creado', 'El evento ha sido creado');

                redirect('eventos');
            }
        }else{
                redirect('usuarios/login');

        }
    }
    public function delete($evento_id){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 3) {

            //Se pasa la id del evento al modelo para su eliminación de la base de datos.
            $this->Eventos_model->delete_evento($evento_id);

            $this->session->set_flashdata('evento_eliminado', 'El evento ha sido eliminado');

            redirect('eventos');
        }else{
            redirect('usuarios/login');
        }
    }

    public function edit($evento_id){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 3) {


            //Se recogen los datos del evento a editar y los tipos para pasarlos al formulario.
            //Así el usuario podra ver los datos introducidos anteriormente y saber que modificar.
            $data['evento'] = $this->Eventos_model->get_eventos($evento_id);
            $data['tipos'] = $this->Eventos_model->get_tipos();

            if(empty($data['evento'])){
                show_404();
            }

            $data['titulo'] = "Editar Evento";

            $this->load->view('templates/header');
            $this->load->view('eventos/edit', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('usuarios/login');
        }
    }

    public function update(){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1 || $this->session->userdata('usuario_rol_id') == 3) {

            //Se recicla el código de la función "create" a la hora de recoger la imágen y el documento.
            $config['upload_path'] = 'assets/imagenes/eventos';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('evento_cartel')) {
                $errors = array('error' => $this->upload->display_errors());
                print_r($errors);
            } else {
                $data = array('upload_data' => $this->upload->data());
                print_r($data);
                $evento_cartel = $_FILES['evento_cartel']['name'];
            }

            $config2['upload_path'] = 'assets/reglamentos/eventos';
            $config2['allowed_types'] = 'pdf';

            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('evento_reglamento')) {
                $errors = array('error' => $this->upload->display_errors());
                print_r($errors);
                $evento_reglamento = 'NULL';
            } else {
                $data = array('upload_data' => $this->upload->data());
                print_r($data);
                $evento_reglamento = $_FILES['evento_reglamento']['name'];
            }

            //Al igual que en "create" los datos se pasan al modelo para su inserción en la base de datos.
            $this->Eventos_model->update_evento($evento_cartel, $evento_reglamento);

            $this->session->set_flashdata('evento_actualizado', 'El evento ha sido actualizado');

            redirect('eventos');
        }else{
            redirect('usuarios/login');
        }
    }

    public function resultados($offset = 0){

        //Paginación y datos para la sección de Resultados.

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

    public function inscripcion($evento_id)
    {
        //Datos y requisitos del formulario de insercción de participantes.
        $data['titulo'] = 'Inscripción';
        $data['evento'] = $this->Eventos_model->get_eventos($evento_id);

        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('fechaNaci', 'Fecha de Nacimiento', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('eventos/inscripcion', $data);
            $this->load->view('templates/footer');
        } else {
            //Los datos introducidos se emplean para insertar al participante en una tabla
            $this->Eventos_model->inscripcion_participante($evento_id);
            //y también para mandarle un correo para que sepa que el proceso ha ocurrido sin ningún problema.
            $this->Eventos_model->sendMail("david95999@hotmail.es", "David F.F.", $this->input->post('email'), $this->input->post('nombre'), "La inscripció ha sigut completada") ;
            $this->session->set_flashdata('participante_inscrito', 'Consulta tu correo electrónico para comprobar si tu inscripción ha sido un éxito');
            redirect('eventos');
        }
    }
}
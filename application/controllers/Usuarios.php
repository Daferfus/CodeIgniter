<?php
/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 26/11/2017
 * Time: 17:59
 */

class Usuarios extends CI_Controller{

    public function listar(){
        $data['titulo'] = "Gestor de Usuarios";
        $data['usuarios'] = $this->Usuarios_model->listar();
        $this->load->view('templates/header');
        $this->load->view('usuarios/usuarios', $data);
        $this->load->view('templates/footer');
    }
    public function registro()
    {
        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1) {

            $data['titulo'] = "Registrar Usuario";

            $this->form_validation->set_rules('nombre', 'nombre', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('contraseña', 'contraseña', 'required');
            $this->form_validation->set_rules('contraseña2', 'Confirmar Contraseña', 'matches[contraseña]');


            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('usuarios/registro', $data);
                $this->load->view('templates/footer');
            } else {
                $contra_encript = md5($this->input->post('contraseña'));
                $this->Usuarios_model->registro($contra_encript);

                $this->session->set_flashdata('usuario_registrado', 'El registro se ha completado con éxito');
                redirect('eventos');
            }
        }else{
            redirect('usuarios/login');
        }
    }
    public function login(){
        $data['titulo'] = "Loguearse";

        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('usuarios/login', $data);
            $this->load->view('templates/footer');
        } else {

            $nombreusuario = $this->input->post('nombre');

            $contraseña = md5($this->input->post('contraseña'));


            $rol_usuario = $this->Usuarios_model->rol($nombreusuario);

            $usuario_id = $this->Usuarios_model->login($nombreusuario, $contraseña);

            if($usuario_id){

                $usuario_data = array(
                    'usuario_id' => $usuario_id,
                    'usuario_nombre' => $nombreusuario,
                    'usuario_rol_id' => $rol_usuario,
                    'logueado' => true
                );

                $this->session->set_userdata($usuario_data);

                $this->session->set_flashdata('usuario_logueado', 'Has accedido a tu cuenta');
                    redirect('eventos');
                } else {
                $this->session->set_flashdata('login_fallado', 'Las credenciales no coinciden');
                redirect('eventos');
            }

        }
    }

    public function delete($usuario_id){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1){

            $this->Usuarios_model->usuario_delete($usuario_id);

            $this->session->set_flashdata('usuario_borrado', 'Tu usuario ha sido borrado');
            redirect('usuarios');
        }else{
            redirect('usuarios/login');
        }
    }

    public function edit($usuario_id){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1) {

            $data['usuario'] = $this->Usuarios_model->get_usuarios_by_id($usuario_id);
            $data['roles'] = $this->Usuarios_model->get_roles();

            if (empty($data['usuario'])) {
                show_404();
            }

            $data['titulo'] = "Editar Usuario";

            $this->load->view('templates/header');
            $this->load->view('usuarios/edit', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('usuarios/login');
        }
    }

    public function update(){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1) {

            $contra_encript = md5($this->input->post('contraseña'));
            $this->Usuarios_model->update_usuario($contra_encript);

            $this->session->set_flashdata('usuario_actualizado', 'El usuario ha sido actualizado');

            redirect('usuarios');
        }else{
            redirect('usuarios/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('logueado');
        $this->session->unset_userdata('usuario_nombre');
        $this->session->unset_userdata('usuario_id');

        $this->session->set_flashdata('usuario_deslogueado', 'Has salido de tu cuenta');
        redirect('usuarios/login');
    }

    public function check_username_exists($nombreusuario){
        $this->form_validation->set_message('check_username_exists', 'El nombre de usuario ya existe. Por favor, pruebe con otro');

        if ($this->Usuarios_model->check_username_exists($nombreusuario)) {
            return true;
        } else {
            return false;
        }
    }

    public function roles_create(){

        if($this->session->userdata('logueado') && $this->session->userdata('usuario_rol_id') == 1) {

            $data['titulo'] = "Crear Roles";

            $this->form_validation->set_rules('nombre', 'nombre');
            $this->form_validation->set_rules('nivel', 'nivel', 'required');


            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('usuarios/roles_create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Usuarios_model->roles_create();

                $this->session->set_flashdata('rol_insertado', 'La inserción del rol ha sido completada con éxito');
                redirect('usuarios');
            }
        }else{
            redirect('usuarios/login');
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Michael Soft
 * Date: 26/11/2017
 * Time: 17:59
 */

class Usuarios extends CI_Controller{
    public function registro()
    {
        $data['titulo'] = "Registrarse";

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
    }
        public function login()
        {
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

                $usuario_id = $this->Usuarios_model->login($nombreusuario, $contraseña);

                if($usuario_id){

                    $usuario_data = array(
                        'usuario_id' => usuario_id,
                        'usuario_nombre' => $nombreusuario,
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

        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('usuario_nombre');
            $this->session->unset_userdata('usuario_id');

            $this->session->set_flashdata('usuario_deslogueado', 'Has salido de tu cuenta');
            redirect('usuarios/login');
        }

        public function check_username_exists($nombreusuario)
        {
            $this->form_validation->set_message('check_username_exists', 'El nombre de usuario ya existe. Por favor, pruebe con otro');

            if ($this->Usuarios_model->check_username_exists($nombreusuario)) {
                return true;
            } else {
                return false;
            }
        }
}
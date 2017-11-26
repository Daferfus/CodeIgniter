<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('participantes_model');
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->library('pagination');
        $this->load->model('mail_model');
        $this->load->library('ftp');
    }

    public function slider() {
        $crud = new Grocery_CRUD();
        $crud->set_table('slider');
        $crud->set_field_upload('slider_image', 'assets/plantilla_slider/images');
        $datos = $crud->render();
        $this->load->view('dashboard/panel', $datos);
    }

    public function pruebaFTP() {
        $config['hostname'] = 'db709253691.db.1and1.com';
        $config['username'] = 'dbo709253691';
        $config['password'] = 'David_2017';
        $config['debug'] = true;
        $this->ftp->connect($config);
        $this->ftp->upload('/home/llorca338/Escriptori/FileZilla_3.28.0_x86_64-linux-gnu.tar.bz2','cosa2.tar.bz2');
        $this->ftp->close();
    }

    public function encriptar() {
        $plain_text = 'asd1234asd';
        $textoCifrado = $this->encryption->encrypt($plain_text);
        echo $textoCifrado;
        $textoDesencriptado = $this->encryption->decrypt($textoCifrado);
    }

    private function estaLogeado() {
        if (empty($this->session->email)) {
            redirect('');
        }
    }

    public function index() {
        $this->estaLogeado();
        $this->load->view('dashboard/index.php');
    }

    public function login() {
        if (empty($this->session->email)) {
            $this->load->view('dashboard/login.php');
        } else {
            redirect('dashboard', 'refresh');
        }
    }

    public function validate_usser() {
        $user = $this->input->post('username');
        $passwd = $this->input->post('password');
        $sql = "SELECT * FROM users WHERE user_login = ? ";
        $query = $this->db->query($sql, array($user));
        $row = $query->row();

        if (isset($row)) {
            //print_r($row);
            $user_name = $row->user_name;
            $user_passwd = $row->user_passwd;
            $user_passwd = $this->encryption->decrypt($user_passwd);
            $user_rol = $row->user_rol;

            if ($passwd === $user_passwd) {
                $variablesSesion = array(
                    'username' => $user_name,
                    'email' => $user,
                    'logged_in' => true,
                    'rol' => $user_rol
                );
                $this->session->set_userdata($variablesSesion);
                //Para recuperarla:
                // $email = $this->session->email;
                redirect('dashboard', 'refresh');
            } else {
                redirect('login', 'refresh');
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    public function users() {
        $crud = new Grocery_CRUD();
        $crud->set_table('users');
        $crud->set_subject('Usuario');
        $crud->field_type('user_passwd', 'password');
        //Indicas que el campo user_image se almacenará en assets/uploads/files
        $crud->set_field_upload('user_image', 'assets/uploads/files');

        //Relacionar a nivel de aplicación dos tablas user_rol de la 
        //tabla users se relaciona con la tabla rols y muestra rol_name en su lugar
        $crud->set_relation('user_rol', 'rols', 'rol_name');
        $crud->callback_before_insert(array($this, 'encrypt_password_callback'));
        $datos = $crud->render();
        print_r($datos);
        $this->cargar_vista($datos);
    }    

    function encrypt_password_callback($post_array) {
        $post_array['user_passwd'] = $this->encryption->encrypt($post_array['password']);
        return $post_array;
    }

    public function logout() {
        $elementosBorrar = ['username', 'email', 'logged_in', 'rol'];
        $this->session->unset_userdata($elementosBorrar);
        redirect('', 'refresh');
    }

    public function copia_seg() {
        //https://www.codeigniter.com/userguide3/database/utilities.html#usage-example
        $this->load->dbutil();
        $backup = $this->dbutil->backup();
        $this->load->helper('file');
        write_file('./assets//mybackup.gz', $backup);
        $this->load->helper('download');
        force_download('mybackup.gz', $backup);
    }

    public function participantes() {        
        $config['base_url'] = base_url()."dashboard/participantes";
        $config['total_rows'] =    $this->participantes_model->countAllRecords();
        $desde = $this->uri->segment(3,0);
        $config['per_page'] = 50;
        $config['prefix'] = "<a class='btn btn-info'>";
        $config['sufix'] = '</a>';
        $config['cur_tag_open'] = "<a class='btn btn-success'>";
        $config['cur_tag_close'] = '</a>';
        $config['num_links'] = 5;
        $config['first_link'] = "Primero";
        $config['last_link'] = "Ultimo";
        $this->pagination->initialize($config);  
        $datos['participantes'] = $this->participantes_model->getRecordsByPage($desde,$config['per_page']);
        $datos['titulo'] = "Listado de participantes";       
        $this->load->view('templates/header', $datos);
        $this->load->view('dashboard/participantes', $datos);
        $this->load->view('templates/footer');
    }
    
    public function pruebaCorreo() {
        $this->mail_model->sendMail("david95999@hotmail.es", "David F.F.", "david95950@gmail.com", "David F.F.", "Ola k Ase") ;
    }

}

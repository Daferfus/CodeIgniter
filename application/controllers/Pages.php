<?php
//Es recomendable nombrar a los Modulos en plural

//Cualquier controlador tendrá que heredar de CI_Controller
class Pages extends CI_Controller {

    //Para acceder a esta funcion pondremos ruta/pages/view/$page
    public function view($page = 'home') {
        //Si no existe la vista, muestra error 404
        //APPPATH es una variable de codeIgniter
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }
        //Guardamos en un array el titulo que será la página en mayúsculas
        $data['title'] = ucfirst($page);
        //Para evitarnos escribir en cada view el header y el footer, los creamos y los cargamos
        //header y footer las creamos en /views/templates
        //pages/nombreVista lo creamos dentro también en /views/pages
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['eventos/create'] = 'eventos/create';
$route['eventos/update'] = 'eventos/update';
$route['eventos/(:any)'] = 'eventos/view/$1';
$route['eventos'] = 'eventos/index';

$route['noticias'] = 'noticias/index';

$route['default_controller'] = 'pages/view';

$route['tipos'] = 'tipos/index';
$route['tipos/create'] = 'tipos/create';
$route['tipos/eventos/(:any)'] = 'tipos/eventos/$1';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

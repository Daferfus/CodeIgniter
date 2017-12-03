<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Rutas relacionadas con las secciones de Eventos.

$route['eventos/index'] = 'eventos/index';
$route['eventos/resultados'] = 'eventos/resultados';
$route['eventos/create'] = 'eventos/create';
$route['eventos/update'] = 'eventos/update';
$route['eventos/(:any)'] = 'eventos/view/$1';
$route['eventos'] = 'eventos/index';

//Rutas relacionadas con la sección de Noticias.

$route['noticias/index'] = 'news/index';
$route['noticias/create'] = 'news/create';
$route['noticias/update'] = 'news/update';
$route['noticias/(:any)'] = 'news/view/$1';
$route['noticias'] = 'news/index';


$route['default_controller'] = 'pages/view';

$route['usuarios'] = 'usuarios/listar';
//Rutas relacionadas con la sección Eventos por Tipo.

$route['tipos'] = 'tipos/index';
$route['tipos/create'] = 'tipos/create';
$route['tipos/eventos/(:any)/(:any)'] = 'tipos/eventos/$1/$2';


$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
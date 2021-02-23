<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['register/(:any)'] = 'users/register/$1';
$route['student/dashboard'] = 'Student_panel/index';
$route['login/(:any)'] = 'users/login/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

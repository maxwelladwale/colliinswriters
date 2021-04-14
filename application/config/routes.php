<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['student/index'] = 'students/studentindex';
$route['student/create'] = 'students/create';
$route['student/timeline'] = 'students/timeline';
$route['student/singleproject'] = 'students/singleproject';
$route['student/finishedproject'] = 'students/finishedproject';

$route['freelancer/index'] = 'freelancer/freelancerindex';
$route['freelancer/singleproject'] = 'freelancer/singleproject';
$route['freelancer/timeline'] = 'freelancer/timeline';

$route['projects'] = 'posts/projects';
$route['projects/updatepost'] = 'posts/updatepost';
$route['projects/myprojects'] = 'posts/myprojects';
$route['projects/timeline'] = 'posts/timeline';
$route['download/(:any'] = "freelancer/download/$id";
// $route['freelancer/(:any)'] = 'posts/view/$1';
// $route['projects/(:any)'] = 'posts/view/$1';

$route['default_controller'] = 'pages/view';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
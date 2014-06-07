<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "main_controller";

$route['login'] = "main_controller/login";
$route['logout'] = "main_controller/logout";

$route['students'] = "pages_controller/all_students";
$route['materii'] = "pages_controller/all_materii";
$route['profs'] = "pages_controller/all_profs";

$route['student/add'] = "pages_controller/add_student";


$route['404_override'] = 'main_controller/error_404';

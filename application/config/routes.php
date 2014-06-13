<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "main_controller";

$route['login'] = "main_controller/login";
$route['logout'] = "main_controller/logout";

$route['add/(:any)'] = "pages_controller/add_user/$1";

$route['students'] = "students_controller/all_students";
$route['students/delete/(:num)'] = "students_controller/delete_student/$1";
$route['students/edit/(:num)'] = "pages_controller/edit_user/$1/student";

$route['profs'] = "profs_controller/all_profs";
$route['prof/delete/(:num)'] = "profs_controller/delete_prof/$1";
$route['prof/edit/(:num)'] = "pages_controller/edit_user/$1/professor";

$route['classes'] = "classes_controller/all_classes";
$route['class/add'] = "classes_controller/add_class";
$route['class/edit/(:num)'] = "classes_controller/edit_class/$1";
$route['class/delete/(:num)'] = "classes_controller/delete_class/$1";

$route['404_override'] = 'main_controller/error_404';
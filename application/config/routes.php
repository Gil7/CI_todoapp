<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//$route['api/v1'] = 'api/api';
$route['api/tasks/delete_task']['post'] = 'api/tasks/delete_task';
$route['api/tasks/show/(:num)']['get'] = 'api/tasks/show/$1';
$route['default_controller'] = 'todos';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['api/tests'] = 'api/tests';

// api routes


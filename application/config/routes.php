<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['default_route'] = 'admin/dashboard';
$route['admin'] = 'admin/dashboard';
$route['logout'] = 'Users/logout';
$route['success/login'] = 'Users/success_login';
$route['success/register'] = 'Users/success_register';
$route['register'] = 'Users/register';
$route['create'] = 'Shop/create';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

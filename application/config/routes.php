<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;




$route['athens'] = 'Welcome/athens';


$route['admin'] = 'admin/Login_Controller/sign_in';
$route['admin/login'] = 'admin/Login_Controller/sign_in';
$route['admin/logout'] = 'admin/Login_Controller/logout';
$route['admin/validate-email'] = 'admin/Login_Controller/validate_email';
$route['admin/validate-admin'] = 'admin/Login_Controller/validate_login';
$route['admin/dashboard'] = 'admin/Dashboard_Controller/index';
$route['admin/forgot-password'] = 'admin/Login_Controller/forgot_password';

// Brands Routes
$route['admin/brands'] = 'admin/Brands_controller/brand_list';
$route['admin/404'] = 'admin/Admin_controller/error404';
$route['admin/blank'] = 'admin/Admin_controller/blank';
$route['admin/utilities-other'] = 'admin/Admin_controller/utilities_other';
$route['admin/utilities-color'] = 'admin/Admin_controller/utilities_color';
$route['admin/utilities-border'] = 'admin/Admin_controller/utilities_border';
$route['admin/utilities-animation'] = 'admin/Admin_controller/utilities_animation';
$route['admin/tables'] = 'admin/Admin_controller/tables';
$route['admin/cards'] = 'admin/Admin_controller/cards';
$route['admin/buttons'] = 'admin/Admin_controller/buttons';
$route['admin/charts'] = 'admin/Admin_controller/charts';
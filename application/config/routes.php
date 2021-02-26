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
$route['portugal'] = 'Welcome/portugal';
$route['hong-kong'] = 'Welcome/hong_kong';
$route['amsterdam'] = 'Welcome/amsterdam';
$route['san-francisco'] = 'Welcome/san_francisco';
$route['london'] = 'Welcome/london';
$route['paris'] = 'Welcome/paris';
$route['contact-us'] = 'Welcome/contact_us';
$route['brand'] = 'Welcome/brand';
$route['event'] = 'Welcome/event';
$route['brand-diractory'] = 'Welcome/brand_diractory';


$route['admin'] = 'admin/Login_Controller/sign_in';
$route['admin/login'] = 'admin/Login_Controller/sign_in';
$route['admin/logout'] = 'admin/Login_Controller/logout';
$route['admin/validate-email'] = 'admin/Login_Controller/validate_email';
$route['admin/validate-admin'] = 'admin/Login_Controller/validate_login';
$route['admin/dashboard'] = 'admin/Dashboard_Controller/index';
$route['admin/forgot-password'] = 'admin/Login_Controller/forgot_password';

$route['admin/profile'] = 'admin/Dashboard_Controller/admin_profile';
$route['admin/update-profile'] = 'admin/Dashboard_Controller/save_admin_profile';

$route['admin/change-password'] = 'admin/Dashboard_Controller/change_password';

// Brands Routes
$route['admin/brands'] = 'admin/Brands_Controller/brand_list';
$route['admin/brands/(:num)'] = 'admin/Brands_Controller/brand_list/$1';
$route['admin/add-brands'] = 'admin/Brands_Controller/add_brand';
$route['admin/edit-brands/(:num)'] = 'admin/Brands_Controller/edit_brand/$1';
$route['admin/delete-brand'] = 'admin/Brands_Controller/delete_brand';

// Users Routes
$route['admin/users'] = 'admin/Users_Controller/users_list';
$route['admin/users/(:num)'] = 'admin/Users_Controller/users_list/$1';
$route['admin/add-users'] = 'admin/Users_Controller/add_users';
$route['admin/edit-users/(:num)'] = 'admin/Users_Controller/edit_users/$1';
$route['admin/check-username'] = 'admin/Users_Controller/check_username';
$route['admin/delete-user'] = 'admin/Users_Controller/delete_user';

// Brands Routes
$route['admin/leads'] = 'admin/Lead_controller/lead_list';
$route['admin/leads/(:num)'] = 'admin/Lead_controller/lead_list/$1';
$route['admin/add-leads'] = 'admin/Lead_controller/add_lead';
$route['admin/save-leads'] = 'admin/Lead_controller/save_lead';
$route['admin/edit-leads/(:num)'] = 'admin/Lead_controller/edit_lead/$1';
$route['admin/update-leads'] = 'admin/Lead_controller/update_lead';
$route['admin/delete-lead'] = 'admin/Lead_Controller/delete_lead';
$route['admin/change-status'] = 'admin/Event_Controller/change_lead_status';

// Events routes
$route['admin/events'] = 'admin/Event_Controller/events_list';
$route['admin/events/(:num)'] = 'admin/Event_Controller/events_list/$1';
$route['admin/add-events'] = 'admin/Event_Controller/add_events';
$route['admin/edit-events/(:num)'] = 'admin/Event_Controller/edit_events/$1';
$route['admin/delete-event'] = 'admin/Event_Controller/delete_event';
$route['admin/change-status'] = 'admin/Event_Controller/change_event_status';
$route['admin/event-details'] = 'admin/Event_Controller/get_event_details';

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
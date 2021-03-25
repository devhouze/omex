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



$route['whatsnew/(:any)'] = 'Welcome/whatsnew/$1';
$route['athens'] = 'Welcome/athens';
$route['portugal'] = 'Welcome/portugal';
$route['hong-kong'] = 'Welcome/hong_kong';
$route['amsterdam'] = 'Welcome/amsterdam';
$route['san-francisco'] = 'Welcome/san_francisco';
$route['london'] = 'Welcome/london';
$route['paris'] = 'Welcome/paris';
$route['privacy-policy'] = 'Welcome/privacy_policy';
$route['term-conditions'] = 'Welcome/term_conditions';
$route['contact-us'] = 'Welcome/contact_us';
$route['brand/(:any)'] = 'Welcome/brand/$1';
$route['event'] = 'Welcome/event';
$route['event-details/(:any)'] = 'Welcome/event_details/$1';
$route['brand-directory'] = 'Welcome/brand_directory';
//$1=> category, $2=>limit
$route['brand-directory/(:any)/(:any)'] = 'Welcome/brand_directory/$1/$2';
$route['brand-directory/(:any)'] = 'Welcome/brand_directory/$1';
$route['search-brand'] = 'Welcome/search_brand';
$route['sign-up'] = 'Welcome/sign_up';
$route['register-in-event'] = 'Welcome/register';
$route['whats-new-register'] = 'Welcome/register_whats_new';
$route['get-brands'] = "Welcome/get_brands";
$route['get-brands-like'] = "Welcome/get_brands_like";


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
$route['admin/brands/(:num)/(:any)/(:any)'] = 'admin/Brands_Controller/brand_list/$1/$2/$3';
$route['admin/add-brands'] = 'admin/Brands_Controller/add_brand';
$route['admin/edit-brands/(:num)'] = 'admin/Brands_Controller/edit_brand/$1';
$route['admin/delete-brand'] = 'admin/Brands_Controller/delete_brand';
$route['admin/brand-details'] = 'admin/Brands_Controller/get_brand_details';
$route['admin/get-sub-category'] = 'admin/Brands_Controller/get_sub_category';


// Brand Offer routes
$route['admin/brand-offer'] = 'admin/Brands_Controller/brand_offer_list';
$route['admin/brand-offer/(:num)'] = 'admin/Brands_Controller/brand_offer_list/$1';
$route['admin/brand-offer/(:num)/(:any)/(:any)'] = 'admin/Brands_Controller/brand_offer_list/$1/$2/$3';
$route['admin/add-brands-offer'] = 'admin/Brands_Controller/add_brand_offer';
$route['admin/edit-brand-offer/(:num)'] = 'admin/Brands_Controller/edit_brand_offer/$1';
$route['admin/edit-brands-offer/(:num)'] = 'admin/Brands_Controller/edit_brand_offer/$1';
$route['admin/delete-brand-offer'] = 'admin/Brands_Controller/delete_brand_offer';
$route['admin/change-brand-status'] = 'admin/Brands_Controller/change_brand_status';
$route['admin/change-brand-offer-status'] = 'admin/Brands_Controller/change_brand_offer_status';
$route['admin/offer-details'] = 'admin/Brands_Controller/get_offer_details';

// Users Routes
$route['admin/users'] = 'admin/Users_Controller/users_list';
$route['admin/users/(:num)'] = 'admin/Users_Controller/users_list/$1';
$route['admin/users/(:num)/(:any)/(:any)'] = 'admin/Users_Controller/users_list/$1/$2/$3';
$route['admin/add-users'] = 'admin/Users_Controller/add_users';
$route['admin/edit-users/(:num)'] = 'admin/Users_Controller/edit_users/$1';
$route['admin/check-username'] = 'admin/Users_Controller/check_username';
$route['admin/delete-user'] = 'admin/Users_Controller/delete_user';
$route['admin/change-user-status'] = 'admin/Users_Controller/change_user_status';

// Lead Routes
$route['admin/leads'] = 'admin/Lead_controller/lead_list';
$route['admin/leads/(:num)'] = 'admin/Lead_controller/lead_list/$1';
$route['admin/leads/(:num)/(:any)/(:any)'] = 'admin/Lead_controller/lead_list/$1/$2/$3';
$route['admin/get-message'] = 'admin/Lead_controller/get_message';
$route['admin/export-leads'] = 'admin/Lead_controller/exportCSV';


// Events routes
$route['admin/events'] = 'admin/Event_Controller/events_list';
$route['admin/events/(:num)'] = 'admin/Event_Controller/events_list/$1';
$route['admin/events/(:num)/(:any)/(:any)'] = 'admin/Event_Controller/events_list/$1/$2/$3';
$route['admin/add-events'] = 'admin/Event_Controller/add_events';
$route['admin/edit-events/(:num)'] = 'admin/Event_Controller/edit_events/$1';
$route['admin/delete-event'] = 'admin/Event_Controller/delete_event';
$route['admin/change-event-status'] = 'admin/Event_Controller/change_event_status';
$route['admin/event-details'] = 'admin/Event_Controller/get_event_details';

// What's new page routes
$route['admin/add-whats-new'] = "admin/WhatsNew_Controller/add_whats_new";
$route['admin/edit-whats-new/(:num)'] = "admin/WhatsNew_Controller/edit_whats_new/$1";
$route['admin/whats-new'] = "admin/WhatsNew_Controller/whats_new";
$route['admin/whats-new/(:num)'] = "admin/WhatsNew_Controller/whats_new/$1";
$route['admin/whats-new/(:num)/(:any)/(:any)'] = "admin/WhatsNew_Controller/whats_new/$1/$2/$3";
$route['admin/whats-new-gallery'] = "admin/WhatsNew_Controller/whats_new_gallery";
$route['admin/change-whats-new-status'] = 'admin/WhatsNew_Controller/change_whats_new_status';
$route['admin/delete-whats-new'] = 'admin/WhatsNew_Controller/delete_whats_new';
$route['admin/whats-new-details'] = 'admin/WhatsNew_Controller/whats_new_details';

$route['admin/whats-new-gallery-details'] = 'admin/WhatsNew_Controller/whats_new_gallery_details';
$route['admin/whats-new-gallery'] = 'admin/WhatsNew_Controller/whats_new_gallery';
$route['admin/whats-new-gallery/(:num)'] = 'admin/WhatsNew_Controller/whats_new_gallery/$1';
$route['admin/whats-new-gallery/(:num)/(:any)/(:any)'] = 'admin/WhatsNew_Controller/whats_new_gallery/$1/$2/$3';
$route['admin/add-whats-new-gallery'] = 'admin/WhatsNew_Controller/add_whats_new_gallery';
$route['admin/edit-whats-new-gallery/(:num)'] = 'admin/WhatsNew_Controller/edit_whats_new_gallery/$1';
$route['admin/delete-whats-new-gallery'] = 'admin/WhatsNew_Controller/delete_whats_new_gallery';
$route['admin/change-whats-new-gallery-status'] = 'admin/WhatsNew_Controller/change_whats_new_gallery_status';

// Banners routes
$route['admin/add-banners'] = "admin/Banner_Controllers/add_banners";
$route['admin/edit-banners/(:num)'] = "admin/Banner_Controllers/edit_banners/$1";
$route['admin/banners'] = "admin/Banner_Controllers/banner_list";
$route['admin/banners/(:num)'] = "admin/Banner_Controllers/banner_list/$1";
$route['admin/banners/(:num)/(:any)/(:any)'] = "admin/Banner_Controllers/banner_list/$1/$2/$3";
$route['admin/delete-banner'] = 'admin/Banner_Controllers/delete_banner';
$route['admin/change-banner-status'] = 'admin/Banner_Controllers/change_banner_status';
$route['admin/get-banner-details'] = "admin/Banner_Controllers/get_banner_details";
$route['admin/get-link-data'] = "admin/Banner_Controllers/get_linking_data";

// Gallery routes
$route['admin/gallery'] = 'admin/Gallery_Controller/gallery_list';
$route['admin/gallery/(:num)'] = 'admin/Gallery_Controller/gallery_list/$1';
$route['admin/gallery/(:num)/(:any)/(:any)'] = 'admin/Gallery_Controller/gallery_list/$1/$2/$3';
$route['admin/add-gallery'] = 'admin/Gallery_Controller/add_gallery';
$route['admin/edit-gallery/(:num)'] = 'admin/Gallery_Controller/edit_gallery/$1';
$route['admin/change-gallery-status'] = 'admin/Gallery_Controller/change_gallery_status';
$route['admin/delete-media'] = 'admin/Gallery_Controller/delete_media';
$route['admin/get-sequence'] = 'admin/Gallery_Controller/get_sequence';
$route['admin/gallery-details'] = 'admin/Gallery_Controller/get_gallery_details';

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
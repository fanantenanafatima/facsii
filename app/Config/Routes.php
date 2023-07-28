<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/Home', 'Home::index');
$routes->get('/Home/login', 'Home::login');
// Admin
//get
$routes->get('/Admin', 'Admin::index');
$routes->get('/Admin/create_a_count', 'Admin::create_a_count');
$routes->get('/Admin/login', 'Admin::login');
$routes->get('/Admin/topics', 'Admin::topics');
$routes->get('/Admin/logout', 'Admin::logout');

$routes->get('/Topics/new_topic', 'Topics::new_topic');
$routes->get('/Topics/insert_topic', 'Topics::insert_topic');
$routes->post('/Topics/insert_topic', 'Topics::insert_topic');
$routes->post('/Topics', 'Topics::topics');

$routes->get('/Topics', 'Topics::topics');
$routes->get('/Topics/update_topic/(:num)', 'Topics::update_topic/$1');
$routes->get('/Topics/delete_topic/(:num)', 'Topics::delete_topic/$1');
$routes->post('/Topics/update_it/(:num)', 'Topics::update_it/$1');




//post
$routes->post('/Admin/login_validation', 'Admin::login_validation');
$routes->post('/Admin/save_a_count', 'Admin::save_a_count');



//Users Home/show_a_art/
//get

$routes->get('/Home/create_a_count', 'Home::create_a_count');
$routes->get('/Home/save_count', 'Home::save_count');
$routes->get('/Home/log_out', 'Home::log_out');

$routes->get('/Home/show_a_art/', 'Home::show_a_art');
//post
$routes->post('/Home/login', 'Home::login');
$routes->post('/Home/save_count', 'Home::save_count');
$routes->post('/Home/login_validation', 'Home::login_validation');
$routes->post('/Home/comment/(:num)', 'Home::comment/$1');


$routes->get('/Home/show_a_art(:num)', 'Home::show_a_art/$1');


$routes->get('/Office/', 'Office::index');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

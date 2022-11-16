<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Route::login');
$routes->get('login', 'Route::login');

$routes->add('forgot', 'Route::forgot');
$routes->post('forgotPassword', 'User::forgotPassword');
$routes->add('resetPassword', 'Route::reset_password');
$routes->add('dashboard', 'Route::dashboard');
$routes->add('addstudent', 'Route::addstudent');
$routes->add('inventory', 'Route::inventory');
$routes->add('addstaff', 'Route::addstaff');
$routes->add('addcoach', 'Route::addcoach');
$routes->add('', 'Route::addcoach');
$routes->add('noticeboard', 'Route::noticeboard');

$routes->resource('route');
$routes->resource('user');
$routes->resource('login');
$routes->resource('staff');
$routes->resource('coach');
$routes->resource('student');
// $routes->resource('inventory');
$routes->add('student/update', 'Student::update');
$routes->add('staff/update', 'Staff::update');
$routes->add('coach/update', 'Coach::update');
$routes->add('noticeboard/index', 'Noticeboard::index');
$routes->add('noticeboard/create', 'Noticeboard::create');
$routes->add('noticeboard/update', 'Noticeboard::update');
$routes->add('noticeboard/delete', 'Noticeboard::delete');
$routes->add('noticeboard/timePast', 'Noticeboard::timePast');
$routes->add('inventory/index', 'Inventory::index');
$routes->add('inventory/create', 'Inventory::create');
$routes->add('inventory/update', 'Inventory::update');
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

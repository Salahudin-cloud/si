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
$routes->setDefaultController('Auth');
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

// login 
$routes->get('/', 'Auth::index');

// login process 
$routes->post('auth/login', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');

/** Admin */
//view
// dashboard  
$routes->get('/dashboard', 'Admin::index');

//employees ( management employess )
$routes->get('/employees', 'Admin::employeesManagerView');
$routes->get('employees/new', 'Admin::addEmployeeView');
$routes->get('employees/update/(:any)', 'Admin::updateEmployeeView/$1');

// handdle all process in admin
// process employees ( management employess )
$routes->post('employees/new/proccess' , 'Admin::addEmployeeProcess');
$routes->put('employees/update/proccess', 'Admin::updateEmployeeProcess');
$routes->delete('employees/delete/proccess/(:num)', 'Admin::deleteEmployeeProcess/$1'); 
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

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'HomeController::index');
$routes->get('product', 'HomeController::product');

$routes->get('auth', 'AuthController::index');
$routes->get('admin', 'AuthController::index');
$routes->post('doLogin', 'AuthController::doLogin');
$routes->get('logout', 'AuthController::logout');

$routes->get('dashboard', 'DashController::index');

$routes->get('kategori', 'DashController::kategori');
$routes->get('addkategori', 'DashController::addkategori');
$routes->post('kategoriadd', 'DashController::kategoriadd');
$routes->get('hapuskategori/(:num)', 'DashController::hapuskategori/$1');


$routes->get('productadd', 'DashController::productadd');
$routes->get('tambahproduct', 'DashController::tambahproduct');
$routes->post('dotambahproduct', 'DashController::dotambahproduct');
$routes->get('hapusproduct/(:num)', 'DashController::hapusproduct/$1');


$routes->get('clientadd', 'DashController::clientadd');
$routes->get('addclient', 'DashController::addclient');
$routes->post('doaddclient', 'DashController::doaddclient');
$routes->get('hapusclient/(:num)', 'DashController::hapusclient/$1');


$routes->get('karyawan', 'KaryawanController::index');
$routes->get('tambahkaryawan', 'KaryawanController::tambahkaryawan');
$routes->post('dotambahkaryawan', 'KaryawanController::dotambahkaryawan');
$routes->get('hadir/(:num)', 'KaryawanController::hadir/$1');
$routes->get('izin/(:num)', 'KaryawanController::izin/$1');
$routes->get('tidakhadir/(:num)', 'KaryawanController::tidakhadir/$1');


$routes->get('absensi', 'KaryawanController::absensi');
$routes->get('addlembur/(:num)', 'KaryawanController::addlembur/$1');
$routes->get('hapuslembur', 'KaryawanController::hapuslembur/$1');
$routes->get('hapuslembur/(:num)', 'KaryawanController::hapuslembur/$1');






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

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

//https://ilmucoding.com/middleware-filters-codeigniter-4/
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->setAutoRoute(true); // ex. gak perlu didaftaran di route index.php/pages/about

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//https://www.petanikode.com/codeigniter4-controller/
//$routes->get('/', 'Home::index'); //Home -> conntroller, index->method

//tamban
$routes->get('/about', 'Halaman::about');
$routes->get('/contact', 'Halaman::contact');
$routes->get('/faqs', 'Halaman::faqs');

$routes->get('/berita', 'Berita::index');
//https://www.petanikode.com/codeigniter4-crud
$routes->get('/berita/(:any)', 'Berita::lihatBerita/$1');//ambil param pertama


//https://ilmucoding.com/middleware-filters-codeigniter-4/
$routes->group('ngatmin', ['filter' => 'cektoken'], function($routes){ //cek apakah dah login
	$routes->get('email', 'EmailAdmin::index');
	$routes->get('berita/(:segment)/lihat', 'BeritaAdmin::lihat/$1');
    $routes->add('email/baru', 'EmailAdmin::buat'); //bisa get view dan post data
	$routes->add('email/(:segment)/edit', 'EmailAdmin::edit/$1'); //bisa get view dan post data
	$routes->add('email/(:segment)/reset', 'EmailAdmin::reset/$1'); //bisa get view dan post data
	$routes->get('email/(:segment)/hapus', 'EmailAdmin::hapus/$1');
});


//https://ilmucoding.com/middleware-filters-codeigniter-4/
//tidak ngecek di tiap halaman tapi di route nya
$routes->get('login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
/*$routes->get('/home', 'Home::index', ['filter' => 'ceklogin']);*/
$routes->get('/logout', 'Login::logout', ['filter' => 'cektoken']);

$routes->get('/login/token/(:any)', 'Login::prosesToken/$1');//ambil param pertama


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

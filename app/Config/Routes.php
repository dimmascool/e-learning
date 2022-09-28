<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Learning');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Universal
$routes->get('/', 'Learning::index');
$routes->get('/logout', 'Learning::logout');


// Pelajar
$routes->get('/register', 'Learning::register');
$routes->get('/login', 'Learning::login');
$routes->get('/learning', 'Learning::information');
$routes->get('/learning/information', 'Learning::information');
$routes->get('/learning/materi', 'Learning::materi');
$routes->get('/learning/materi/(:segment)', 'Learning::detailMateri/$1');
$routes->get('/learning/tugas', 'Learning::tugas');
$routes->get('/learning/tugas/(:segment)', 'Learning::detailTugas/$1');
$routes->get('/learning/latihan/', 'Learning::latihan');
$routes->get('/learning/latihan/(:segment)', 'Learning::pertanyaanLatihan/$1');

// Guru
$routes->get('/loginguru', 'Learning::loginGuru');
$routes->get('/halamanguru', 'Learning::halamanGuru');
$routes->get('/guru/buat_materi', 'Learning::buatMateri');
$routes->get('/guru/materi', 'Learning::materiGuru');
$routes->get('/guru/materi/(:segment)', 'Learning::detailMateriGuru/$1');
$routes->get('/guru/edit_materi/(:segment)', 'Learning::editMateri/$1');
$routes->get('/guru/hapus_materi/(:segment)', 'Learning::hapus_materi/$1');
$routes->get('/guru/latihan', 'Learning::latihanGuru');
$routes->get('/guru/latihan_soal/(:segment)', 'Learning::latihanSoal/$1');
$routes->get('/guru/buat_soal', 'Learning::buatSoalBaru');
$routes->get('/guru/tugas', 'Learning::tugasGuru');
$routes->get('/guru/tugas/(:segment)', 'Learning::detailTugasGuru/$1');
$routes->get('/guru/buat_tugas', 'Learning::tambahTugas');
$routes->get('/guru/menu_penilaian_tugas', 'Learning::menuNilaiTugas');
$routes->get('/guru/penilaian_tugas/(:segment)', 'Learning::NilaiTugas/$1');
$routes->get('/guru/penilaian_tugas/', 'Learning::NilaiTugas');
$routes->get('/guru/nilai_tugas/(:segment)', 'Learning::ngasihNilaiTugas/$1');





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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

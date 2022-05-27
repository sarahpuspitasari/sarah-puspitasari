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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');
$routes->get('/kamar', 'Home::kamar');
$routes->get('/fasilitaskamar', 'Home::kamar');
$routes->get('/fasilitashotel', 'Home::fasilitashotel');
$routes->get('/reservasi', 'Home::reservasi');
$routes->post('/reservasi', 'Home::reservasiSimpan');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index', ['filter' => 'otentifikasi']);
$routes->get('/login', 'PetugasController::login');

$routes->get('/petugas', 'PetugasController::index');
$routes->post('/login', 'PetugasController::login');
$routes->get('/logout', 'PetugasController::logout');
$routes->get('/petugas/dashboard', 'Dashboardpetugas::index', ['filter' => 'otentifikasi']);

// route CRUD Kamar
$routes->get('/kamar/tampil', 'PetugasController::tampilKamar', ['filter' => 'otentifikasi']);
$routes->get('/kamar/tambah', 'PetugasController::tambahKamar', ['filter' => 'otentifikasi']);
$routes->post('/kamar/simpan', 'PetugasController::simpanKamar', ['filter' => 'otentifikasi']);
$routes->get('/kamar/edit/(:num)', 'PetugasController::editKamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/kamar/editfoto/(:num)', 'PetugasController::editFoto/$1', ['filter' => 'otentifikasi']);
$routes->post('/kamar/update', 'PetugasController::updateKamar', ['filter' => 'otentifikasi']);
$routes->post('/kamar/updatefoto', 'PetugasController::updateFoto', ['filter' => 'otentifikasi']);
$routes->get('/kamar/hapus/(:num)', 'PetugasController::hapusKamar/$1', ['filter' => 'otentifikasi']);

// route CRUD Fasilitas Kamar
$routes->get('/fasilitas/tampil', 'FasilitasController::tampilFasilitas', ['filter' => 'otentifikasi']);
$routes->get('/fasilitas/tambah', 'FasilitasController::tambahFasilitas', ['filter' => 'otentifikasi']);
$routes->post('/fasilitas/simpan', 'FasilitasController::simpanFasilitas', ['filter' => 'otentifikasi']);
$routes->get('/fasilitas/edit/(:num)', 'FasilitasController::editFasilitas/$1', ['filter' => 'otentifikasi']);
$routes->post('/fasilitas/update', 'FasilitasController::updateFasilitas', ['filter' => 'otentifikasi']);
$routes->get('/fasilitas/hapus/(:num)', 'FasilitasController::hapusFasilitas/$1', ['filter' => 'otentifikasi']);

// route CRUD Fasilitas Hotel
$routes->get('/hotel/tampil', 'FasilitasHotelController::tampilHotel', ['filter' => 'otentifikasi']);
$routes->get('/hotel/tambah', 'FasilitasHotelController::tambahHotel', ['filter' => 'otentifikasi']);
$routes->post('/hotel/simpan', 'FasilitasHotelController::simpanHotel', ['filter' => 'otentifikasi']);
$routes->get('/hotel/edit/(:num)', 'FasilitasHotelController::editHotel/$1', ['filter' => 'otentifikasi']);
$routes->post('/hotel/update', 'FasilitasHotelController::updateHotel', ['filter' => 'otentifikasi']);
$routes->get('/hotel/editfoto/(:num)', 'FasilitasHotelController::editFotoHotel/$1', ['filter' => 'otentifikasi']);
$routes->post('/hotel/updatefoto', 'FasilitasHotelController::updateFotoHotel', ['filter' => 'otentifikasi']);
$routes->get('/hotel/hapus/(:num)', 'FasilitasHotelController::hapusHotel/$1', ['filter' => 'otentifikasi']);

// route CRUD Reservasi
$routes->get('/reservasi/tampil', 'ReservasiController::tampilReservasi', ['filter' => 'otentifikasi']);
// $routes->get('/reservasi/tambah', 'ReservasiController::tambahReservasi', ['filter' => 'otentifikasi']);
// $routes->post('/reservasi/simpan', 'ReservasiController::simpanReservasi', ['filter' => 'otentifikasi']);
// $routes->get('/reservasi/edit/(:num)', 'ReservasiController::editReservasi/$1', ['filter' => 'otentifikasi']);
// $routes->post('/reservasi/update', 'ReservasiController::updateReservasi', ['filter' => 'otentifikasi']);
// $routes->get('/reservasi/hapus/(:num)', 'ReservasiController::hapusReservasi/$1', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/checkin/(:num)', 'ReservasiController::cekin/$1', ['filter' => 'otentifikasi']);
$routes->get('/reservasi/checkout/(:num)', 'ReservasiController::cekout/$1', ['filter' => 'otentifikasi']);

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

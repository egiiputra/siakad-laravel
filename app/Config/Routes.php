<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// <?php


// $routes = Services::routes();

// if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
//     require SYSTEMPATH . 'Config/Routes.php';
// }

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthController');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'AuthController::login');
$routes->get('/auth/login', 'AuthController::login');
$routes->post('/auth/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/pendaftaran', 'PendaftaranController::index');
$routes->post('/pendaftaran/save', 'PendaftaranController::save');
$routes->post('/pendaftaran/delete/(:num)', 'PendaftaranController::delete/$1');

$routes->get('/reports/mahasiswa', 'ReportsController::mahasiswa');
$routes->get('/reports/akademik', 'ReportsController::akademik');
$routes->get('/reports/pemasukan', 'ReportsController::pemasukan');
$routes->get('/reports/keuangan', 'ReportsController::keuangan');
$routes->get('/reports/siakad-to-feeder', 'ReportsController::siakadToFeeder');
$routes->get('/reports/download-excel/(:segment)', 'ReportsController::downloadExcel/$1');

$routes->get('/settings/semester', 'SettingsController::semester');
$routes->get('/settings/her-registrasi', 'SettingsController::herRegistrasi');
$routes->get('/settings/buat-tagihan', 'SettingsController::buatTagihan');
$routes->get('/settings/buat-tagihan-mhs', 'SettingsController::buatTagihanMhs');
$routes->get('/settings/item-pembayaran', 'SettingsController::itemPembayaran');
$routes->get('/settings/jadwal-kuliah', 'SettingsController::jadwalKuliah');
$routes->get('/settings/dosen-wali', 'SettingsController::dosenWali');

$routes->get('/dashboard', 'DashboardController::index');

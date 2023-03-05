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
$routes->get('/dashboard', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->get('/simple', 'Home::simpleSearch');
$routes->post('/simple/getAll', 'Home::getAll');
$routes->post('/simple/getAllPerson', 'Home::getAllPerson');

$routes->get('/siswa', 'Siswa::index');
$routes->post('/siswa/getAll', 'Siswa::getAll');
$routes->post('/siswa/getOne', 'Siswa::getOne');
$routes->post('/siswa/add', 'Siswa::add');
$routes->post('/siswa/edit', 'Siswa::edit');
$routes->post('/siswa/remove', 'Siswa::remove');
$routes->get('/siswa/updatelulus/(:num)', 'Siswa::updatelulus/$1');



$routes->get('/kelassiswa', 'Kelassiswa::index');
$routes->post('/kelassiswa/getAll', 'Kelassiswa::getAll');
$routes->post('/kelassiswa/getOne', 'Kelassiswa::getOne');

$routes->post('/kelassiswa/add', 'Kelassiswa::add');
$routes->post('/kelassiswa/edit', 'Kelassiswa::edit');
$routes->post('/kelassiswa/remove', 'Kelassiswa::remove');

$routes->get('/kegiatan', 'Kegiatan::index');
$routes->post('/kegiatan/getAll', 'Kegiatan::getAll');
$routes->post('/kegiatan/getOne', 'kegiatan::getOne');
$routes->post('/kegiatan/add', 'Kegiatan::add');
$routes->post('/kegiatan/edit', 'Kegiatan::edit');
$routes->post('/kegiatan/remove', 'Kegiatan::remove');


$routes->get('/peminatan', 'Peminatan::index');
$routes->post('/peminatan/getAll', 'Peminatan::getAll');
$routes->post('/peminatan/add', 'Peminatan::add');
$routes->post('/peminatan/edit', 'Peminatan::edit');
$routes->post('/peminatan/remove', 'Peminatan::remove');


$routes->get('/tp', 'Tp::index');
$routes->post('/tp/getAll', 'Tp::getAll');
$routes->post('/tp/getOne', 'Tp::getOne');
$routes->post('/tp/add', 'Tp::add');
$routes->post('/tp/edit', 'Tp::edit');
$routes->post('/tp/remove', 'Tp::remove');

$routes->get('/kelas', 'Kelas::index');
$routes->post('/kelas/getAll', 'Kelas::getAll');
$routes->post('/kelas/getOne', 'Kelas::getOne');
$routes->post('/kelas/add', 'Kelas::add');
$routes->post('/kelas/edit', 'Kelas::edit');
$routes->post('/kelas/remove', 'Kelas::remove');

$routes->get('/alumni/pekerjaan', 'Pekerjaan::index');
$routes->post('/alumni/pekerjaan/getAll', 'Pekerjaan::getAll');
$routes->post('/alumni/pekerjaan/getOne', 'Pekerjaan::getOne');
$routes->post('/alumni/pekerjaan/add', 'Pekerjaan::add');
$routes->post('/alumni/pekerjaan/edit', 'Pekerjaan::edit');
$routes->post('/alumni/pekerjaan/remove', 'Pekerjaan::remove');

$routes->get('/alumni/pendidikanAlumni', 'PendidikanAlumni::index');
$routes->post('/alumni/pendidikanAlumni/getAll', 'PendidikanAlumni::getAll');
$routes->post('/alumni/pendidikanAlumni/getOne', 'PendidikanAlumni::getOne');
$routes->post('/alumni/pendidikanAlumni/add', 'PendidikanAlumni::add');
$routes->post('/alumni/pendidikanAlumni/edit', 'PendidikanAlumni::edit');
$routes->post('/alumni/pendidikanAlumni/remove', 'PendidikanAlumni::remove');


$routes->get('/alumni', 'Alumni::index');
$routes->post('/alumni/getAll', 'Alumni::getAll');
$routes->post('/alumni/getOne', 'Alumni::getOne');
$routes->post('/alumni/add', 'Alumni::add');
$routes->post('/alumni/edit', 'Alumni::edit');
$routes->post('/alumni/remove', 'Alumni::remove');
$routes->post('/alumni/upload', 'Alumni::upload');
$routes->get('/alumni/kembalikan/(:num)', 'Alumni::Kembalikan/$1');
$routes->get('/alumni/login_alumni', 'Alumni::login_alumni');
$routes->post('/alumni/auth', 'Alumni::auth');
$routes->get('/alumni/dashboard', 'Alumni::dashboard',['filter' => 'auth']);
$routes->get('/alumni/logout', 'Alumni::logout');
$routes->post('/alumni/getOne_alumni', 'Alumni::getOne_alumni');
$routes->post('/alumni/edit_alumni', 'Alumni::edit_alumni');
$routes->post('/alumni/edit_password', 'Alumni::edit_password');

$routes->match(['get', 'post'], 'kelassiswa/ajaxSearch', 'Kelassiswa::ajaxSearch');



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

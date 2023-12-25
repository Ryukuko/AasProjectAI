<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'TestController::index');
$routes->post('/', 'TestController::index');

$routes->get('admin/login', 'Admin\Login::index');

$routes->post('admin/authentication/login', 'Admin\Authentication::login');
$routes->get('admin/authentication/logout', 'Admin\Authentication::logout');

$routes->get('admin/dashboard', 'Admin\Dashboard::index');

$routes->get('admin/penyakit', 'Admin\Penyakit::index');
$routes->get('admin/penyakit/create', 'Admin\Penyakit::create');
$routes->post('admin/penyakit/add', 'Admin\Penyakit::add');
$routes->post('admin/penyakit/update', 'Admin\Penyakit::update');
$routes->get('admin/penyakit/edit/(:num)', 'Admin\Penyakit::edit/$1');
$routes->get('admin/penyakit/delete/(:num)', 'Admin\Penyakit::delete/$1');

$routes->get('admin/gejala', 'Admin\Gejala::index');
$routes->get('admin/gejala/create', 'Admin\Gejala::create');
$routes->post('admin/gejala/add', 'Admin\Gejala::add');
$routes->post('admin/gejala/update', 'Admin\Gejala::update');
$routes->get('admin/gejala/edit/(:num)', 'Admin\Gejala::edit/$1');
$routes->get('admin/gejala/delete/(:num)', 'Admin\Gejala::delete/$1');

$routes->get('admin/histori', 'Admin\Histori::index');
$routes->get('admin/histori/delete/(:num)', 'Admin\Histori::delete/$1');

$routes->get('admin/users', 'Admin\Users::index');
$routes->get('admin/users/create', 'Admin\Users::create');
$routes->post('admin/users/add', 'Admin\Users::add');
$routes->post('admin/users/update', 'Admin\Users::update');
$routes->get('admin/users/edit/(:num)', 'Admin\Users::edit/$1');
$routes->get('admin/users/delete/(:num)', 'Admin\Users::delete/$1');

$routes->get('admin/rules', 'Admin\Rules::index');
$routes->get('admin/rules/create', 'Admin\Rules::create');
$routes->post('admin/rules/add', 'Admin\Rules::add');
$routes->post('admin/rules/update', 'Admin\Rules::update');
$routes->get('admin/rules/edit/(:num)', 'Admin\Rules::edit/$1');
$routes->get('admin/rules/delete/(:num)', 'Admin\Rules::delete/$1');


$routes->get('user/dashboard', 'User\Dashboard::index');
$routes->get('user/diagnosa/diagnosaPasien', 'User\Diagnosa::index');
$routes->post('user/diagnosa/diagnosaPasien/create', 'User\Diagnosa::hitungCf');
$routes->get('user/Auth/login', 'User\Login::login');
$routes->get('user/Auth/register', 'User\Register::register');
$routes->post('user/Auth/register/create', 'User\Register::proses_register');
$routes->post('user/Auth/login/proses', 'User\Login::proses_login');
$routes->get('user/Auth/logout', 'User\login::Logout');
$routes->get('user/profile', 'User\Profile::index');
$routes->get('user/profile/edit', 'User\Profile::editProfile');
$routes->post('user/profile/editPassword', 'User\Profile::ganti_password_aksi');



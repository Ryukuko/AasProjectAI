<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
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
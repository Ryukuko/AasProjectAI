<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\Dashboard::index');
$routes->get('admin/authentication/login', 'Admin\Authentication::login');
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

$routes->get('admin/users', 'Admin\Users::index');
$routes->get('admin/users/create', 'Admin\Users::create');

$routes->get('admin/rules', 'Admin\Rules::index');
$routes->get('admin/rules/create', 'Admin\Rules::create');
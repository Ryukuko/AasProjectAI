<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/authentication/login', 'Admin\Authentication::login');
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('admin/penyakit', 'Admin\Penyakit::index');
$routes->get('admin/gejala', 'Admin\Gejala::index');
$routes->get('admin/rules', 'Admin\Rules::index');
$routes->get('admin/histori', 'Admin\Histori::index');
$routes->get('admin/users', 'Admin\Users::index');

$routes->get('admin/gejala/create', 'Admin\Gejala::create');
$routes->get('admin/penyakit/create', 'Admin\Penyakit::create');
$routes->get('admin/users/create', 'Admin\Users::create');
$routes->get('admin/rules/create', 'Admin\Rules::create');

$routes->get('admin/penyakit/edit/(:num)', 'Admin\Penyakit::edit/$1');
$routes->get('admin/penyakit/delete/(:num)', 'Admin\Penyakit::delete/$1');



$routes->post('admin/penyakit/add', 'Admin\Penyakit::add');
$routes->post('admin/penyakit/update', 'Admin\Penyakit::update');

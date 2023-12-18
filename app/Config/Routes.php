<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('admin/penyakit', 'Admin\Penyakit::index');
$routes->get('admin/gejala', 'Admin\Gejala::index');
$routes->get('admin/rules', 'Admin\Rules::index');
$routes->get('admin/histori', 'Admin\Histori::index');
$routes->get('admin/users', 'Admin\Users::index');

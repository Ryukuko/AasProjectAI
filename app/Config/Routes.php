<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('penyakit', 'Penyakit::index');
$routes->get('gejala', 'Gejala::index');

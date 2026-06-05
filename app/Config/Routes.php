<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'Home::dashboard');
$routes->get('produk', 'Home::produk');
$routes->get('keranjang', 'Home::keranjang');
$routes->get('detail-mlbb', 'Home::detailMlbb');
$routes->get('payment', 'Home::payment');

// Legacy aliases for older links
$routes->get('v_produk', 'Home::produk');
$routes->get('v_keranjang', 'Home::keranjang');
$routes->get('v_detail_mlbb', 'Home::detailMlbb');
$routes->get('v_payment', 'Home::payment');
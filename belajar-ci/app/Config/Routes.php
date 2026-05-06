<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/v_produk', 'ProdukController::index');
$routes->get('/v_keranjang', 'TransaksiController::index');
$routes->get('/v_detail_mlbb', 'ProdukController::detail_mlbb');
$routes->get('/v_payment', 'ProdukController::payment');
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
$routes->get('detail-valorant', 'Home::detailValorant');
$routes->get('detail-ff', 'Home::detailFf');
$routes->get('detail-mcgg', 'Home::detailMcgg');
$routes->get('payment', 'Home::payment');
$routes->get('login', 'Home::login');
$routes->post('login', 'Home::authenticate');
$routes->post('register', 'Home::register');
$routes->post('checkout', 'Home::checkout');
$routes->post('payment/complete', 'Home::paymentComplete');
$routes->get('profile', 'Home::profile');
$routes->get('profile/download', 'Home::downloadHistory');
$routes->get('logout', 'Home::logout');

// Legacy aliases for older links
$routes->get('v_produk', 'Home::produk');
$routes->get('v_keranjang', 'Home::keranjang');
$routes->get('v_detail_mlbb', 'Home::detailMlbb');
$routes->get('v_payment', 'Home::payment');

// Admin routes (protected by auth filter)
$routes->group('admin', function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('dashboard', 'AdminController::index');
    
    // Games (Produk) CRUD
    $routes->get('games', 'AdminController::games');
    $routes->get('games/create', 'AdminController::gamesCreate');
    $routes->post('games/store', 'AdminController::gamesStore');
    $routes->get('games/edit/(:num)', 'AdminController::gamesEdit/$1');
    $routes->post('games/update/(:num)', 'AdminController::gamesUpdate/$1');
    $routes->get('games/delete/(:num)', 'AdminController::gamesDelete/$1');
    
    // Items (Nominal) CRUD
    $routes->get('items', 'AdminController::items');
    $routes->get('items/create/(:num)', 'AdminController::itemsCreate/$1');
    $routes->post('items/store', 'AdminController::itemsStore');
    $routes->get('items/edit/(:num)', 'AdminController::itemsEdit/$1');
    $routes->post('items/update/(:num)', 'AdminController::itemsUpdate/$1');
    $routes->get('items/delete/(:num)', 'AdminController::itemsDelete/$1');
    
    // Payment Methods CRUD
    $routes->get('payments', 'AdminController::payments');
    $routes->get('payments/create', 'AdminController::paymentsCreate');
    $routes->post('payments/store', 'AdminController::paymentsStore');
    $routes->get('payments/edit/(:num)', 'AdminController::paymentsEdit/$1');
    $routes->post('payments/update/(:num)', 'AdminController::paymentsUpdate/$1');
    $routes->get('payments/delete/(:num)', 'AdminController::paymentsDelete/$1');
    
    // Transactions
    $routes->get('transactions', 'AdminController::transactions');
    $routes->get('transactions/detail/(:num)', 'AdminController::transactionDetail/$1');
    $routes->post('transactions/update-status/(:num)', 'AdminController::transactionUpdateStatus/$1');
    $routes->get('transactions/delete/(:num)', 'AdminController::transactionDelete/$1');
    
    // Users
    $routes->get('users', 'AdminController::users');
    $routes->get('users/delete/(:num)', 'AdminController::userDelete/$1');
});
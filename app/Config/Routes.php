<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route (redirect to login page)
$routes->get('/', 'Auth::login');

// Authentication
$routes->get('login', 'Auth::login');       
$routes->post('login', 'Auth::loginPost');  
$routes->get('logout', 'Auth::logout');     

// Dashboards
$routes->get('admin/dashboard', 'Admin::index', ['filter' => 'authGuard:admin']);
$routes->get('staff/dashboard', 'Staff::index', ['filter' => 'authGuard:staff']);
$routes->get('customer/dashboard', 'Customer::index', ['filter' => 'authGuard:customer']);
 
// Admin Management Pages
$routes->group('admin', ['filter' => 'authGuard:admin'], static function (RouteCollection $routes) {
    $routes->get('users', 'Admin::users');
    $routes->get('users/add', 'Admin::addUser');
    $routes->post('users/add', 'Admin::addUser');
    
    $routes->get('orders', 'Admin::orders');
    $routes->get('orders/(:num)/generate-barcode', 'BarcodeController::generateOrderBarcode/$1');
    
    $routes->get('inventory', 'Admin::inventory');
    $routes->get('inventory/add', 'Admin::addInventoryItem');
    $routes->post('inventory/add', 'Admin::addInventoryItem');
    $routes->get('inventory/edit/(:num)', 'Admin::updateInventoryItem/$1');
    $routes->post('inventory/edit/(:num)', 'Admin::updateInventoryItem/$1');
    $routes->get('inventory/delete/(:num)', 'Admin::deleteInventoryItem/$1');
    
    $routes->get('complaints', 'Admin::complaints');
    $routes->get('complaints/resolve/(:num)', 'Admin::resolveComplaint/$1');
});

// Staff Pages
$routes->group('staff', ['filter' => 'authGuard:staff'], static function (RouteCollection $routes) {
    $routes->get('orders', 'Staff::orders');
    $routes->get('orders/(:num)/status', 'Staff::updateStatus/$1');
    $routes->post('orders/(:num)/status', 'Staff::updateStatusPost/$1');
    $routes->get('orders/(:num)/generate-barcode', 'BarcodeController::generateOrderBarcode/$1');

    $routes->get('issues/report', 'Staff::reportIssue');
    $routes->post('issues/report', 'Staff::reportIssuePost');
});

// Customer Pages
$routes->group('customer', ['filter' => 'authGuard:customer'], static function (RouteCollection $routes) {
    $routes->get('orders', 'Customer::orders');
    $routes->get('orders/(:num)', 'Customer::orderDetail/$1');
    $routes->get('orders/(:num)/generate-barcode', 'BarcodeController::generateOrderBarcode/$1');
    
    $routes->get('complaint', 'Customer::complaint');
    $routes->post('complaint', 'Customer::complaintPost');
});

// Barcode routes
$routes->get('barcode/order/(:num)', 'BarcodeController::generateOrderBarcode/$1');
$routes->get('barcode/scan', 'BarcodeController::scanBarcode');
$routes->post('barcode/process', 'BarcodeController::processBarcode');

// Chat routes
$routes->get('chat', 'ChatController::index');
$routes->post('chat/send', 'ChatController::sendMessage');
$routes->get('chat/messages', 'ChatController::getMessages');
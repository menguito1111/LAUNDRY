<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route (redirect to login page)
$routes->get('/', 'Auth::login');

// Authentication
$routes->get('login', 'Auth::login');       // show login form
$routes->post('login', 'Auth::loginPost');  // process login
$routes->get('logout', 'Auth::logout');     // logout

// Dashboards
$routes->get('admin/dashboard', 'Admin::index', ['filter' => 'authGuard:admin']);
$routes->get('staff/dashboard', 'Staff::index', ['filter' => 'authGuard:staff']);
$routes->get('customer/dashboard', 'Customer::index', ['filter' => 'authGuard:customer']);
 
// Admin Management Pages
$routes->group('admin', ['filter' => 'authGuard:admin'], static function (RouteCollection $routes) {
    $routes->get('users', 'Admin::users');
    $routes->get('orders', 'Admin::orders');
    $routes->get('inventory', 'Admin::inventory');
    $routes->get('complaints', 'Admin::complaints');
});

// Staff Pages
$routes->group('staff', ['filter' => 'authGuard:staff'], static function (RouteCollection $routes) {
    $routes->get('orders', 'Staff::orders');
    $routes->get('orders/(:num)/status', 'Staff::updateStatus/$1');
    $routes->post('orders/(:num)/status', 'Staff::updateStatusPost/$1');

    $routes->get('issues/report', 'Staff::reportIssue');
    $routes->post('issues/report', 'Staff::reportIssuePost');
});

// Customer Pages
$routes->group('customer', ['filter' => 'authGuard:customer'], static function (RouteCollection $routes) {
    $routes->get('orders', 'Customer::orders');
    $routes->get('orders/(:num)', 'Customer::orderDetail/$1');
    $routes->get('complaint', 'Customer::complaint');
    $routes->post('complaint', 'Customer::complaintPost');
});
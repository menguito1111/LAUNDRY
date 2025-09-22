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
 
// Admin Management Pages
$routes->group('admin', ['filter' => 'authGuard:admin'], static function (RouteCollection $routes) {
    $routes->get('users', 'Admin::users');
    $routes->get('orders', 'Admin::orders');
    $routes->get('inventory', 'Admin::inventory');
    $routes->get('complaints', 'Admin::complaints');
});
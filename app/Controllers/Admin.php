<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/dashboard', ['title' => 'Admin Dashboard']);
    }

    public function users()
    {
        return view('admin/users', ['title' => 'Manage Users']);
    }

    public function orders()
    {
        return view('admin/orders', ['title' => 'Orders']);
    }

    public function inventory()
    {
        return view('admin/inventory', ['title' => 'Inventory']);
    }

    public function complaints()
    {
        return view('admin/complaints', ['title' => 'Complaints']);
    }
}

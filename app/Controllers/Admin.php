<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/dashboard', ['title' => 'Admin Dashboard']);
    }
}

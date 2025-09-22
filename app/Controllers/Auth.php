<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // just load the login view
        return view('auth/login'); // your file is Views/auth/login.php
    }

    public function loginPost()
    {
        helper(['form']);
        $session = session();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role'],
                'isLoggedIn' => true
            ]);

            if ($user['role'] === 'admin') {
                return redirect()->to(site_url('admin/dashboard'));
            } elseif ($user['role'] === 'staff') {
                return redirect()->to(site_url('staff/dashboard'));
            } elseif ($user['role'] === 'customer') {
                return redirect()->to(site_url('customer/dashboard'));
            }
        }

        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->to(site_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}

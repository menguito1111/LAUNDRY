<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        if ($arguments) {
            // Support multiple roles in a single filter usage, e.g., authGuard:admin,staff
            $allowedRoles = is_array($arguments) ? $arguments : [$arguments];
            if (!in_array($session->get('role'), $allowedRoles, true)) {
                return redirect()->to('/');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing needed here
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'   => 'admin',
                'password'   => password_hash('123456', PASSWORD_BCRYPT),
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username'   => 'staff',
                'password'   => password_hash('123456', PASSWORD_BCRYPT),
                'role'       => 'staff',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
                'name' => 'admin',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'auditee',
                'guard_name' => 'web',
            ]
        );

        Role::create([
                'name' => 'auditor',
                'guard_name' => 'web',
            ]
        );
    }
}

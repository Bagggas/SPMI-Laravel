<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin1',
            'email' => 'admin@admin.com',
            'fakultas' => 'Teknik',
            'prodi' => 'Sistem Informasi',
            'password' => bcrypt('admin123')
        ]);

        $admin->assignRole('admin');

        $auditee1 = User::create([
            'name' => 'Sistem Informasi',
            'email' => 'si@si.com',
            'fakultas' => 'Teknik',
            'prodi' => 'Sistem Informasi',
            'password' => bcrypt('user123')
        ]);

        $auditee1->assignRole('auditee');

        $auditee2 = User::create([
            'name' => 'Teknik Informatika',
            'email' => 'ti@ti.com',
            'fakultas' => 'Teknik',
            'prodi' => 'Teknik Informatika',
            'password' => bcrypt('user123')
        ]);

        $auditee2->assignRole('auditee');

        $auditor = User::create([
            'name' => 'auditor1',
            'email' => 'auditor@auditor.com',
            'fakultas' => 'Teknik',
            'prodi' => 'Sistem Informasi',
            'password' => bcrypt('auditor123')
        ]);

        $auditor->assignRole('auditor');

    }
}

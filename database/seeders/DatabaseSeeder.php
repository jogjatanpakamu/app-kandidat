<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jabatan;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'SENIOR HRD',
            'email' => 'senior@example.com',
            'username' => 'superadmin',
            'level' => 'superadmin',
            'password' => bcrypt('superadmin'),
        ]);
        \App\Models\User::factory()->create([
            'name' => ' HRD',
            'email' => 'junior@example.com',
            'username' => 'admin',
            'level' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}

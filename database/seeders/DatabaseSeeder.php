<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'id_admin' => 'ADM-001',
            'nama_admin' => 'Admin',
            'email_admin' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Admin::create([
            'username' => 'AdminLotoMada',
            'password' => Hash::make('LotoMadaAdmin'),
        ]);
    }
}

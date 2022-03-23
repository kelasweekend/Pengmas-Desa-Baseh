<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Fauzan Admin",
            'email' => "admin@admin.com",
            'no_rt' => 99,
            'no_rw' => 99,
            'password' => Hash::make("fauzan123"),
            'role' => "admin"
        ]);
    }
}

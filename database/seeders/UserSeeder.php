<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'Huda Admin',
            'email'             => 'huda@gmail.com',
            'email_verified_at' => now(),
            'password'          => '12345678',
            'created_at'        => now(),
        ]);
    }
}

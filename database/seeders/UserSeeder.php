<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create(['username' => 'testExample', 'password' => bcrypt('password'), 'email' => 'test@example.nl', 'premium' => 1]);

        User::factory()->count(10)->create();
    }
}

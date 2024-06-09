<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => env('API_AUTH_USER'),
                'email' => env('API_AUTH_USER') . '@' . env('API_AUTH_USER') . '.com',
                'password' => bcrypt(env('API_AUTH_PASSWORD')),
            ],
        ]);
    }
}

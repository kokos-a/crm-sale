<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'access_level' => 2,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'editor',
                'email' => 'editor@editio',
                'access_level' => 1,
                'password' => Hash::make('12345678')
            ]
        ]);
    }
}

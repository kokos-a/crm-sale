<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'organisation' => 'test organisation',
                'firstname' => 'test firstname',
                'lastname' => 'test lastname',
                'title' => 'Test title',
                'address' => 'Test address',
                'email' => 'test@test.com',
                'tel' => '12344566',
                'comment' => 'test comment',
            ],
            ]);
    }
}

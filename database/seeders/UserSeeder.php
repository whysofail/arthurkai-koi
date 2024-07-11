<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

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
            'name' => 'arthur',
            'username' => 'arthur', 
            'email' => 'arthur@email.com',
            'password' => bcrypt('arthur!234'),
        ]);
    }
}

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
                'name'      => 'Nataly',
                'email'     => '111@inbox.ru',
                'password'  => Hash::make('11111111')
            ],
            [
                'name'      => 'Vadim',
                'email'     => '222@gmail.com',
                'password'  => Hash::make('22222222')
            ]
        ]);
    }
}

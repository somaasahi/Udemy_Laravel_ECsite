<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'aaa',
            'email' => 'aaa@test.com',
            'password' => Hash::make('testaaaa'),
            'created_at' => '2020/01/01',

        ]);
    }
}

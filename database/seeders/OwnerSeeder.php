<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
            'name' => 'aaa',
            'email' => 'aaa@test.com',
            'password' => Hash::make('testaaaa'),
            'created_at' => '2020/01/01',
            ],
            [
                'name' => 'bbb',
                'email' => 'bbb@test.com',
                'password' => Hash::make('testaaaa'),
                'created_at' => '2020/01/01',
            ],
            [
                'name' => 'ccc',
                'email' => 'ccc@test.com',
                'password' => Hash::make('testaaaa'),
                'created_at' => '2020/01/01',
            ],
            [
                'name' => 'ccc1',
                'email' => 'ccc1@test.com',
                'password' => Hash::make('testaaaa'),
                'created_at' => '2020/01/01',
            ],
            [
                'name' => 'ccc2',
                'email' => 'ccc2@test.com',
                'password' => Hash::make('testaaaa'),
                'created_at' => '2020/01/01',
            ],
            [
                'name' => 'ccc3',
                'email' => 'ccc3@test.com',
                'password' => Hash::make('testaaaa'),
                'created_at' => '2020/01/01',
            ],
            [
                'name' => 'ccc4',
                'email' => 'ccc4@test.com',
                'password' => Hash::make('testaaaa'),
                'created_at' => '2020/01/01',
            ]

        ]);
    }
}

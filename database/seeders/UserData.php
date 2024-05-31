<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'password' => bcrypt('kosan123'),
                'level' => 1,
                'email' => 'admindikos@gmail.com'
            ],
            [
                'name' => 'Nathalie Aurora',
                'password' => bcrypt('kosan123'),
                'level' => 1,
                'email' => 'aurora@gmail.com'
            ],
            [
                'name' => 'Penghuni',
                'password' => bcrypt('penghuni'),
                'level' => 0,
                'email' => 'penghuni@gmail.com'
            ],
        ];

        // Gunakan fasad DB untuk memasukkan data ke dalam database
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    private $users = [
        [
            'name' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@election.daw',
            'role' => 'administrator',
        ],
        [
            'name' => 'manager',
            'lastname' => 'manager',
            'email' => 'manager@election.daw',
            'role' => 'manager',
        ],
        [
            'name' => 'supervisor',
            'lastname' => 'supervisor',
            'email' => 'supervisor@election.daw',
            'role' => 'supervisor',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'role' => $user['role'],
            ]);
        }
    }
}

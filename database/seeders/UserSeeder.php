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
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@election.daw',
            'role' => 'administrator'
        ],
        [
            'name' => 'Manager',
            'lastname' => 'Manager',
            'email' => 'manager@election.daw',
            'role' => 'manager'
        ],
        [
            'name' => 'Supervisor',
            'lastname' => 'Supervisor',
            'email' => 'supervisor@election.daw',
            'role' => 'supervisor'
        ],
        [
            'name' => 'User',
            'lastname' => 'User',
            'email' => 'user@election.daw',
            'role' => 'user'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $item) {
            DB::table('users')->insert([
                'name' => $item['name'],
                'lastname' => $item['lastname'],
                'email' => $item['email'],
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
                'role' => $item['role'],
            ]);
        }
    }
}

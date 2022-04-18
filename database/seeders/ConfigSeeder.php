<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'id' => 1,
            'title' => 'Electronic Voting System',
            'logo' => 'img/apli/logo-example.png',
            'icon' => 'img/apli/icon-example.png',
            'seats' => 100,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    private $countries = [
        [
            'name' => 'European Union',
            'logo' => 'img/apli/EuropeanUnion.png',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->countries as $item) {
            DB::table('countries')->insert([
                'name' => $item['name'],
                'logo' => $item['logo'],
            ]);
        }
    }
}

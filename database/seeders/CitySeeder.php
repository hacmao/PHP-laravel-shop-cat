<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            'name' => 'Ha Noi',
            'code' => 'HN'
        ]);
        DB::table('city')->insert([
            'name' => 'Ho Chi Minh',
            'code' => 'HCM'
        ]);
        DB::table('city')->insert([
            'name' => 'Da Nang',
            'code' => 'DN'
        ]);
    }
}

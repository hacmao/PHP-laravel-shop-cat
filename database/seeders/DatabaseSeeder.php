<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cat;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
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
        DB::table('cat_types')->insert([
            'name' => 'meo ba tu',
            'img' => 'https://fridaycat.com.vn/top-20-dieu-thu-vi-ve-meo-muop-it-nguoi-biet/'
        ]);
        DB::table('cat_types')->insert([
            'name' => 'meo mun',
            'img' => 'https://fridaycat.com.vn/top-20-dieu-thu-vi-ve-meo-muop-it-nguoi-biet/'
        ]);
        Cat::factory(20)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('cats')->insert([
//            'name' => Str::Random(10),
//            'type' => 'meo mun',
//            'location' => 'hanoi',
//            'age' => 1,
//            'price' => 1000000
//        ]);
//
//        DB::table('cats')->insert([
//            'name' => Str::Random(10),
//            'type' => 'meo ba tu',
//            'img' => '',
//            'location' => 'hanoi',
//            'age' => 2,
//            'state' => 1,
//            'price' => 2000000
//        ]);

        Cat::factory(20)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developers')->truncate();
        DB::table('developers')->insert(['developer' => 'DEV1', 'time' => '1', 'difficulty_level' => '1', 'created_at' => '2022-08-17 11:14:11']);
        DB::table('developers')->insert(['developer' => 'DEV2', 'time' => '1', 'difficulty_level' => '2', 'created_at' => '2022-08-17 11:14:11']);
        DB::table('developers')->insert(['developer' => 'DEV3', 'time' => '1', 'difficulty_level' => '3', 'created_at' => '2022-08-17 11:14:11']);
        DB::table('developers')->insert(['developer' => 'DEV4', 'time' => '1', 'difficulty_level' => '4', 'created_at' => '2022-08-17 11:14:11']);
        DB::table('developers')->insert(['developer' => 'DEV5', 'time' => '1', 'difficulty_level' => '5', 'created_at' => '2022-08-17 11:14:11']);
    }
}

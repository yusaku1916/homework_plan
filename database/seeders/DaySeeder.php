<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'day' => '日曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('days')->insert([
            'day' => '月曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('days')->insert([
            'day' => '火曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('days')->insert([
            'day' => '水曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('days')->insert([
            'day' => '木曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('days')->insert([
            'day' => '金曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('days')->insert([
            'day' => '土曜日',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 1,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 2,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 3,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 4,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 5,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 6,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('plans')->insert([
            'content' => '遊ぶ',
            'day_id' => 7,
            'student_id' => 1,
            'work_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //
    }
}

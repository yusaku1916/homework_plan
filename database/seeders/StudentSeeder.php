<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => 'お試し太郎',
            'grade' => '中2',
            'gender' => '男',
            'teacher_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        
        DB::table('students')->insert([
            'name' => 'お試し次郎',
            'grade' => '小2',
            'gender' => '男',
            'teacher_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('students')->insert([
            'name' => 'お試し花子',
            'grade' => '中1',
            'gender' => '女',
            'teacher_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //
    }
}

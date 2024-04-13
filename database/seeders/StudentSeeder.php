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
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //
    }
}

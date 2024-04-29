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
            'grade' => '5',
            'gender' => 'male',
            'email' => 'aaa@ddd',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'users_id' => 0,
            ]);
        
        DB::table('students')->insert([
            'name' => 'お試し次郎',
            'grade' => '1',
            'gender' => 'male',
            'email' => 'bbb@ddd',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'users_id' => 0,
            ]);
            
        DB::table('students')->insert([
            'name' => 'お試し花子',
            'grade' => '3',
            'gender' => 'female',
            'email' => 'ccc@ddd',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'users_id' => 0,
            ]);
        //
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => '田中太郎',
            'email' => 'abc@ddd',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'users_id' => 0,
            ]);
            
        DB::table('teachers')->insert([
            'name' => '鈴木次郎',
            'email' => 'abc@ddd',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'users_id' => 0,
            ]);
        
        //
    }
}

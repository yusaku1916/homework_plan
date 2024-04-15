<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('works')->insert([
            'content' => '数学',
            'coment' => 'がんばれー',
            'teacher_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('works')->insert([
            'content' => '国語',
            'coment' => 'がんばれー',
            'teacher_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        DB::table('works')->insert([
            'content' => '英語',
            'coment' => 'がんばれー',
            'teacher_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
            
        //
    }
}

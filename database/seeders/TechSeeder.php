<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technologies')->insert([
            'name' => 'PHP',
        ]);
        DB::table('technologies')->insert([
            'name' => 'MySQL',
        ]);
        DB::table('technologies')->insert([
            'name' => 'Laravel',
        ]);
        DB::table('technologies')->insert([
            'name' => 'Theory',
        ]);
    }
}
